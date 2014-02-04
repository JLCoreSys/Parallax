;(function($,window,document,undefined){
    var $win = $(window),
        $body = $('body');

    $.fn.ParallaxFrame = function(parallax,element,options) {
        var frame = this,
            element = element,
            $element = $(element),
            parallax = parallax || null,
            defaults = {
                debug: false,
                default_type: 'slide',
                default_in_duration: 1000,
                default_out_duration: 1000,
                default_pause_duration: 2000,
                default_scrollable_offset: 500,
                default_in_direction: 'bottom',
                default_out_direction: 'top',
                default_css: {},
                default_progress: false,
                default_progress_type: 'div',
                default_progress_cls: '.parallax-progress',
                default_progress_options: {},
                default_rotate_direction: 'right',
                default_rotate_times: 0.5,
                default_rotate_size: true,
                beforeInit: null,
                afterInit: null,
                beforePreload: null,
                afterPreload: null,
                onProcess: null,
                onDetach: null,
                onAttach: null,

                duration_offset: 1000,

                progress: true,
                progress_type: 'div',
                progress_cls: '.parallax-frame-progress',
                progress_options: {},

                sprite_cls: '.parallax-sprite',
                sprite_options: {
                    offset_type: 'pause',
                    offset: 0,
                    opacity: 1,
                    width: "{sw}",
                    height: "{sh}",
                    rotation: 0,
                    top: 0,
                    left: 0,
                    background_size_x: 'auto',
                    background_size_y: 'auto',
                    background_position_x: 'auto',
                    background_position_y: 'auto',
                    css: {},
                    animations: [],
                    beforeInit: null,
                    afterInit: null,
                    onProcess: null,
                    onResize: null,
                    onScroll: null
                },
                sprites: [],
                background_cls: '.parallax-frame-bg',
                content_cls: '.parallax-frame-content',
                play_cls: '.parallax-play-btn',
                prev_cls: '.parallax-prev-btn',
                next_cls: '.parallax-next-btn',
                animate_mobile: true
            },
            $sprites = [],
            data = {},
            $background,
            $progress,
            markers = {},
            loader_steps = 0,
            loader_step = 0;

        frame.detached = false;
        frame.title = null;
        frame.markers = {};

        function call(fn,p1,p2,p3,p4,p5,p6) {
            if(typeof fn === 'function') {
                return fn(p1,p2,p3,p4,p5,p6);
            }
            return undefined;
        };

        function isDebug() {
            var debug = frame.settings.debug;
            return debug === true;
        }

        function log(msg) {
            if(isDebug()) {
                console.log(msg);
            }
        }

        function startLogGroup(name) {
            if(isDebug()) {
                console.group(name);
                console.time(name);
            }
        };

        function endLogGroup(name) {
            if(isDebug()) { console.groupEnd(); console.timeEnd(name); }
        };

        function preInit() {
            var id = $element.attr('id');
            if(undefined===id || id===null) {
                var pid = parallax.getElement().attr('id');
                id = pid + '-frame-' + frame.settings.order;
                $element.attr('id',id);
            }
        };

        function init() {
            frame.settings = $.extend({},defaults,options);
            data = $element.data();

            if($element.hasClass('parallax-force-debug')) {
                frame.settings.debug = true;
            }

            preInit();
            callHome();

            startLogGroup('Frame PRE Initialization: ' + $element.attr('id') );
            frame.trigger('init_start');
            frame.trigger('incSteps', 'PRE Initialize ' + $element.attr('id') );

            preInitProgress();
            preInitSprites();
            preInitBackground();

            frame.trigger('init_end');
            endLogGroup('Frame PRE Initialization: ' + $element.attr('id'));
        };

        function preInitProgress() {
            if(frame.settings.progress === true) {
                frame.trigger('incSteps', 'PRE Initialize ' + $element.attr('id') + ' PROGRESS');
            }
        };

        function preInitBackground() {
            $background = $element.find(frame.settings.background_cls);
            if(undefined !== $background && $background !== null && $background.length) {
                frame.trigger('incSteps', 'PRE Initialize ' + $element.attr('id') + ' BACKGROUND');
            } else {
                $background = null;
            }
        };

        function preInitSprites() {
            log( 'PreInitializing sprites' );

            $sprites = $element.find(frame.settings.sprite_cls);
            log( $sprites );
            $sprites.each(function(ix){
                if(undefined===$(this).data('parallax_sprite')) {
                    $(this).on('incSteps',frame.incSteps);
                    $(this).on('incStep',frame.incStep);
                    var sprite_options = frame.settings.sprite_options || {},
                        sprite_data = frame.settings.sprites[$(this).attr('id')] || {},
                        sprite_data = $.extend({},sprite_data,{order:ix}),
                        sprite_data = $.extend({},sprite_data,{animate_mobile:frame.settings.animate_mobile || false}),
                        sprite = new $.fn.ParallaxSprite(frame, $(this), $.extend({}, sprite_options, sprite_data));
                    $(this).data('parallax_sprite',sprite);
                }
                parallax.trigger('preSpriteInitComplete',$(this));
            });
            parallax.trigger('preSpritesInitComplete',$sprites);
        };

        function initSprites() {
            $sprites.each(function(ix){
                var sprite = $(this).data('parallax_sprite');
                if(undefined!==frame) {
                    sprite.process();
                    sprite.on('processComplete',onSpriteProcessComplete);
                }
            });
        };

        function initLinks() {
            initScrollToLinks();
            initPlaybarLinks();
        };

        function initKeyCodes() {
            $(document).keydown(function(e){
                if(frame.settings.state == 'PAUSE' || frame.settings.state == 'PAUSED' || frame.settings.state == 'OUT') {
                    if(e.keyCode == 33) {
                        /* pageup */
                        e.preventDefault();
                        if(isFirst()) {
                            parallax.scrollToInt(0,.5,false);
                        } else {
                            scrollToPrevious();
                        }
                    } else if(e.keyCode == 34 || e.keyCode == 32) {
                        /* pagedown */
                        e.preventDefault();
                        if(isLast()) {
                            parallax.scrollToInt($(document).height(),.5,false);
                        } else {
                            scrollToNext();
                        }
                    }
                }
            });
        };

        function initScrollToLinks()
        {
            $element.find(parallax.settings.scrollTo_cls).each(function(){
                var target = $(this).attr('href').replace('.','').replace('#',''),
                    tframe = parallax.locateFrameByID(target);
                if(tframe !== null) {
                    $(this).click(function(e){
                        e.preventDefault();
                        var dst = tframe.getMarker('pause').start + 1;
                        parallax.scrollToInt( dst, 0.25, false );
                    });
                }
                frame.incStep("internal link");
            });
        };

        function initPlaybarLinks()
        {
            initPlaybarPlayLinks();
            initPlaybarPrevLinks();
            initPlaybarNextLinks();
        };

        function initPlaybarPlayLinks()
        {
            var hide = frame.settings.pause_duration <= 1;
            $element.find(frame.settings.play_cls).each(function(){
                var start = frame.getMarker('pause').start,
                    end = frame.getMarker('pause').end + 1;
                $(this).unbind('click');
                $(this).click(function(e){
                    e.preventDefault();
                    parallax.scrollToInt( start, 0.1, true);
                    setTimeout(function(){
                        parallax.scrollToInt( end, 1, false, true );
                    },100);
                });
                if(hide) {
                    $(this).css('visibility','hidden');
                    $(this).unbind('click');
                }
            });
        };

        function initPlaybarPrevLinks()
        {
            var hide = isFirst();
            $element.find(frame.settings.prev_cls).each(function(){
                var prev = frame.getPreviousFrame();
                if(prev !== null && prev !== undefined) {
                    var markers = prev.getMarker('pause') || {},
                        start = markers.start || 0;
                    $(this).click(function(e){
                        e.preventDefault();
                        parallax.scrollToInt( start,.5, false, false );
                    });
                } else {
                    hide = true;
                }
                if(hide) {
                    $(this).css('visibility','hidden');
                    $(this).unbind('click');
                }
            });
        };

        function scrollToPrevious()
        {
            var prev = frame.getPreviousFrame();
            if(prev !== null && prev !== undefined) {
                var markers = prev.getMarker('pause') || {},
                    start = markers.start || 0;
                    parallax.scrollToInt( start,.5, false, false );
            }
        }

        function initPlaybarNextLinks()
        {
            var hide = isLast();
            $element.find(frame.settings.next_cls).each(function(){
                var next = frame.getNextFrame();
                if(next !== null && next !== undefined) {
                    $(this).click(function(e){
                        e.preventDefault();
                        var start = next.getMarker('pause').start;
                        parallax.scrollToInt( start,.5, false, function(){} );
                    });
                } else {
                    hide = true;
                }
                if(hide) {
                    $(this).css('visibility','hidden');
                    $(this).unbind('click');
                }
            });
        };

        function scrollToNext()
        {
            var next = frame.getNextFrame();
            if(next !== null && next !== undefined) {
               var start = next.getMarker('pause').start;
               parallax.scrollToInt( start,.5, false, function(){} );
            }
        }

        function initBackground() {
            if($background !== null) {
                var psrc = $background.attr('data-parallax-src');
                if(psrc !== null && psrc !== undefined) {
                    $background.attr('src',psrc);
                    $background.removeAttr('psrc');
                }
                $background.load(function(){
                    $element.css({'background-image': 'url(' + $background.attr('src') + ')'});
                    frame.trigger('incStep', 'Initialize ' + $element.attr('id') + ' BACKGROUND');
                });

                checkSize();
            }
        };

        function initData() {
            data.frameOptions = data.frameOptions || {};
            log(data);
            log(data.frameOptions);
            var opts = [
                ["type","Type"],
                ["in_duration","InDuration"],
                ["out_duration","OutDuration"],
                ["pause_duration","PauseDuration"],
                ["in_direction","InDirection"],
                ["out_direction","OutDirection"],
                ["css","Css"],
                ["progress","Progress"],
                ["progress_type","ProgressType"],
                ["progress_cls","ProgressCls"],
                ["progress_options","ProgressOptions"],
                ["rotate_direction","RotateDirection"],
                ["rotate_times","RotateTimes"],
                ["rotate_size","RotateSize"],
                ["scrollable_offset","ScrollableOffset"]
            ];

            $.each(opts,function(ix,opt){
                var val1 = data.frameOptions[opt[0]],
                    val2 = data['frameOptions'+opt[1]],
                    val3 = frame.settings[opt[0]],
                    def = frame.settings['default_'+opt[0]];

                if(val3 === undefined) {
                    if(val2 !== undefined) {
                        frame.settings[opt[0]] = val2;
                    } else if(val1 !== undefined) {
                        frame.settings[opt[0]] = val1;
                    } else {
                        frame.settings[opt[0]] = def;
                    }
                }

                delete frame.settings['default_'+opt[0]];
            });

            if(frame.settings.type == 'rotate-right') {
                frame.settings.type = 'rotate';
                frame.settings.rotate_dir = 'right';
            } else if(frame.settings.type == 'rotate-left') {
                frame.settings.type = 'rotate';
                frame.settings.rotate_dir = 'left';
            }

            /* adjust for minimums */
            if(isFirst()) {
                if(frame.settings.pause_duration <= 100) {
                    frame.settings.pause_duration = 100;
                }
            }

            log( frame.settings );
        };

        function initProgress() {
            if(frame.settings.progress === true) {
                $progress = $('<' + frame.settings.progress_type + ' class="' + (frame.settings.progress_cls.replace('.','')) + '"/>');
                $element.append($progress);
                frame.trigger('incStep', 'PRE Initialize ' + $element.attr('id') + ' PROGRESS');
            }
        };

        function checkSize() {
            if($background !== undefined && $background !== null && $background.length) {
                if( $background.width() === undefined || $background.width() === null || $background.width() == 0 ) {
                    var $img = $background;
                    $("<img/>") // Make in memory copy of image to avoid css issues
                        .attr("src", $img.attr("src"))
                        .load(function() {
                            var width = this.width,
                                height = this.height,
                                hr = height / width,
                                wr = width / height,
                                data = $background.data();

                            log( 'Background Original Width: ' + width );
                            log( 'Background Original Height: ' + height );
                            $background.width( width + 'px' );
                            $background.height( height + 'px' );
                            data.width = width;
                            data.height = height;
                            data.wr = wr;
                            data.hr = hr;

                            checkSize();
                        });
                } else {
                    /* lets check to see if the background image properly fits within the window */
                    var ww = $win.width(),
                        wh = $win.height(),
                        height = Math.round( ww * $background.data('hr'));

                    if( height < wh ) {
                        $element.addClass( 'tall' );
                        $element.removeClass( 'wide' );
                    } else {
                        $element.addClass( 'wide' );
                        $element.removeClass( 'tall' );
                    }
                }
            }
        };

        function updateProgress(scrTop) {
            if(frame.settings.progress === true) {
                scrTop = scrTop || $win.scrollTop();
                if( $progress !== undefined && $progress !== null) {
                    log(frame.settings.state);
                    if(frame.settings.state.toLowerCase() == 'pause') {
                        if($progress.is(':hidden')) {
                            $progress.show();
                        }
                        var scrRange = Math.round( markers.pause.end - markers.pause.start),
                            scrOffset = parseInt( ( scrTop - markers.pause.start + 1 ) ),
                            scrPercent = parseFloat( scrOffset / scrRange ),
                            top = parseInt( $element.css('top').replace('px','').replace('%','') );
                            height = Math.round( scrPercent * $win.height()) - top,
                        log( scrTop + ':' + scrOffset + ':' + scrRange + ':' + scrPercent + ':' + height + ':' + top );
                        $progress.height(height);
                    } else {
                        if($progress.is(':visible')) {
                            $progress.hide();
                        }
                    }
                }
            };
        };

        function initMarkers() {
            var offset = 0,
                previous = frame.getPreviousFrame();
            log( previous );
            if(previous !== null && previous !== undefined && !isFirst()) {
                offset = previous.getMarker('out').start || 0;
            }

            startLogGroup( 'Initialize Markers' );
            log( 'Offset: ' + offset );
            markers = {};

            markers['wait'] = { end: isFirst() ? 0 : offset - 1 };
            log( 'WAIT: ' + markers[ 'wait' ].end );

            markers['in'] = {};
            markers['in'].start = markers['wait'].end == 0 ? 0 : markers['wait'].end + 1;
            markers['in'].end = markers['in'].start + parseInt(frame.settings.in_duration) - 1;
            markers['in'].end = isFirst() ? 0 : markers['in'].end;
            if(markers['wait'].end == 0 && !isFirst()) {
                markers['in'].start--;
//                markers['in'].end -= 2;
            }
            markers['in'].start = markers['in'].start <= 1 ? 1 : markers['in'].start;

            log( 'IN: ' + markers[ 'in'].start + ' - ' + markers['in'].end);

            markers['pause'] = {};
            markers['pause'].start = ( markers['in'].end > 0 ? (markers['in'].end + 1) : 0 );
            markers['pause'].start = isFirst() ? 0 : markers['pause'].start;
            markers['pause'].end = markers['pause'].start + parseInt(frame.settings.pause_duration) -1;
            markers['pause'].end = isFirst() ? parseInt(frame.settings.pause_duration) -1 : markers['pause'].end;
            markers['pause'].end = markers['pause'].end <= 1 ? 1 : markers['pause'].end;
            log( 'PAUSE: ' + markers[ 'pause'].start + ' - ' + markers['pause'].end);

            markers['out'] = {};
            markers['out'].start = (markers['pause'].end > 0 ? markers['pause'].end + 1 : 0);
            if(markers['pause'].end == 1) {
                markers['out'].start = 1;
                markers['out'].end = markers['out'].start + parseInt(frame.settings.out_duration) -2;
            } else {
                markers['out'].end = markers['out'].start + parseInt(frame.settings.out_duration) -1;
            }
            log( 'OUT: ' + markers[ 'out'].start + ' - ' + markers['out'].end);

            markers['complete'] = {};
            markers['complete'].start = markers['out'].end + 1;
            log( 'COMPLETE: ' + markers[ 'complete'].start + ' - ' + markers['complete'].end);

            log( 'Markers' );
            log( markers );
            frame.markers = markers;

            frame.settings.state = isFirst() ? 'PAUSE' : 'WAIT';

            endLogGroup( 'Initialize Markers' );
            markers['pause'].start--;

            /* now that the markers have been initializes */
            /* lets call the onScroll to place the frame */
            onScroll();
        };

        function isFirst() {
            return frame.settings.order == 0;
        };

        function isLast() {
            return frame.settings.order == (parallax.getFramesCount() - 1)
        }

        function initPreviousFrame() {
            if(frame.hasPreviousFrame()) {
                var prev = frame.getPreviousFrame();
                if(prev !== null) {
                    var dir = frame.settings.in_direction,
                        dur = frame.settings.in_duration,
                        dur_offset = frame.settings.duration_offset,
                        pdur = prev.getOutDuration(),
                        match = Math.round( dur + dur_offset );
                    /* verify the out duration is >= duration */
                    if( pdur <= match ) {
                        prev.setOutDuration( match );
                        var pmarkers = prev.getMarkers()['out'];
                        if(pmarkers !== undefined) {
                            pmarkers.start = pmarkers.start || 0;
                            pmarkers.end = pmarkers.start + match;
                            prev.setMarker('out',pmarkers);
                        }
                    }
                    /* ensure the out direction matches what we need */
                    if(frame.settings.type == 'fade' || frame.settings.type == 'rotate') {
                        /* theres nothing to do here */
                    } else {
                        switch(dir) {
                            case 'top': dir = 'bottom'; break;
                            case 'left': dir = 'right'; break;
                            case 'right': dir = 'left'; break;
                            case 'bottom': dir = 'top'; break;
                        }
                        prev.setOutDirection(dir);
                    }
                }
            }
        };

        function onSpriteProcessComplete() {

        };

        function onScroll(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            animate(scrTop,scrDir);
            if(!frame.detached) {
                $sprites.each(function(ix){
                    if(undefined !== $(this).data('parallax_sprite')) {
                        $(this).data('parallax_sprite').onScroll(scrTop,scrDir);
                    }
                });
                updateProgress(scrTop);
            }
        };

        function onResize(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            onScroll(scrTop);
            checkSize();
        };

        function animate(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            var state = frame.determineState(scrTop).toLowerCase();
            switch(state) {
                case 'wait': animateWait(scrTop); break;
                case 'in': animateIn(scrTop); break;
                case 'pause': animatePause(scrTop); break;
                case 'out': animateOut(scrTop); break;
                case 'complete': animateComplete(scrTop); break;
            }
        };

        function animateWait(scrTop) {
            if(frame.detached) return;
            if(isFirst()) { return animatePause(scrTop); }

            scrTop = scrTop || $win.scrollTop();
            var type = frame.settings.type || 'slide',
                props = $.extend({},{top:0,left:0,opacity:1}, $.fn.ParallaxTranslateProps({top:0,left:0}));
            if(type == 'fade') {
                props.opacity = 0;
            } else if(type == 'rotate') {
                props.opacity = 1;
            } else {
                var top = 0, left = 0,
                    dir = frame.settings.in_direction || frame.settings.default_in_direction;
                switch(dir) {
                    case 'top': top = -$win.height(); break;
                    case 'right': left = $win.width(); break;
                    case 'bottom': top = $win.height(); break;
                    case 'left': top = -$win.width(); break;
                }

                props = $.extend({},props, $.fn.ParallaxTranslateProps({top:top,left:left}));
            }
            $element.css(props);
            detach();
        };

        function animateIn(scrTop,rev) {
            if(frame.detached) attach(false);
            scrTop = scrTop || $win.scrollTop();
            var type = frame.settings.type || 'slide',
                props = $.extend({},{top:0,left:0,opacity:1}, $.fn.ParallaxTranslateProps({top:0,left:0})),
                dir = frame.settings.in_direction || frame.settings.default_in_direction,
                range = ( markers['in'].end - markers['in'].start ) - 1,
                scrOffset = scrTop - markers['in'].start,
                scrPercent = parseFloat( scrOffset / range );

            if(type == 'fade') {
                props.opacity = scrPercent;
                props = $.extend({},props, $.fn.ParallaxTranslateProps({top:0,left:0}));
            } else if(type == 'rotate') {
                var dir = frame.settings.rotate_direction == 'left' ? 1 : -1,
                    degrees = parseFloat( frame.settings.rotate_times || 1 ) * dir * 360,
                    degrees = degrees + ( scrPercent * degrees ),
                    top = 0, left = 0;

                props.opacity = scrPercent;

                if(frame.settings.rotate_size === true) {
                    var new_width = scrPercent * $win.width(),
                        new_height = scrPercent * $win.height(),
                        left = ($win.width()/2) - (new_width/2),
                        top = ($win.height()/2) - (new_height/2);
                    props.width = new_width + 'px';
                    props.height = new_height + 'px';
                }

                props = $.extend({}, props, $.fn.ParallaxTranslateProps({top:top,left:left}));
                props = $.extend({}, props, $.fn.ParallaxRotationProperties(degrees,props));


            } else if(type == 'rotate-left') {
                var rotRange = 180,
                    rotStart = 180,
                    rotEnd = 0,
                    rot = rotStart - parseFloat( scrPercent * rotRange),
                    props = {opacity:scrPercent};
                props = $.extend({}, props, $.fn.ParallaxTranslateProps({top:0,left:0}));
                props = $.extend({}, props, $.fn.ParallaxRotationProperties(rot,props));
            } else if(type == 'rotate-right') {
                var rotRange = 180,
                    rotStart = -180,
                    rotEnd = 0,
                    rot = rotStart + parseFloat( scrPercent * rotRange),
                    props = {opacity:scrPercent};
                props = $.extend({}, props, $.fn.ParallaxTranslateProps({top:0,left:0}));
                props = $.extend({}, props, $.fn.ParallaxRotationProperties(rot,props));
            } else {
                var top = 0,
                    left = 0,
                    ww = $win.width(),
                    wh = $win.height();
                switch(dir) {
                    case 'top':
                        top = -wh + Math.round( scrPercent * wh );
                        break;
                    case 'right':
                        left = ww - Math.round( scrPercent * ww );
                        break;
                    case 'bottom':
                        top = wh - Math.round( scrPercent * wh );
                        break;
                    case 'left':
                        left = -ww + Math.round( scrPercent * ww );
                }
                props = $.extend({},props, $.fn.ParallaxTranslateProps({top:top,left:left}));
            }

            $element.css(props);
        };

        function animatePause(scrTop) {
            scrTop = scrTop || $win.scrollTop();
            if(frame.detached) attach();
            var props = $.extend({},{opacity:1,top:0,left:0,width:'100%',height:'100%',transform:'',msTransform:'',oTransform:''}, $.fn.ParallaxTranslateProps({top:0,left:0}));
            $element.css(props);
        };

        function animateOut(scrTop) {
            scrTop = scrTop || $win.scrollTop();
            if(isLast()) { return animatePause(scrTop); }
            if(frame.detached) attach(true);
            var type = frame.settings.type || 'slide',
                props = $.extend({},{top:0,left:0,opacity:1}, $.fn.ParallaxTranslateProps({top:0,left:0})),
                dir = frame.settings.out_direction || frame.settings.default_out_direction,
                range = ( markers['out'].end - markers['out'].start ) - 1,
                scrOffset = scrTop - markers['out'].start,
                scrPercent = parseFloat( scrOffset / range),
                next = frame.getNextFrame();

            if( next !== null && next !== undefined) {
                var ptype = next.getType() || 'slide';
                type = ptype;
            }

            if(type == 'fade' || type == 'rotate') {
                return animatePause(scrTop);
            } else {
                var top = 0,
                    left = 0,
                    ww = $win.width(),
                    wh = $win.height();
                switch(dir) {
                    case 'top':
                        top = -Math.round( scrPercent * wh );
                        break;
                    case 'right':
                        left = Math.round( scrPercent * ww );
                        break;
                    case 'bottom':
                        top = Math.round( scrPercent * wh );
                        break;
                    case 'left':
                        left = -Math.round( scrPercent * ww );
                }
                props = $.extend({},props, $.fn.ParallaxTranslateProps({top:top,left:left}));
            }

            $element.css(props);
        };

        function animateComplete(scrTop) {
            if(isLast()) { return animatePause(scrTop); }
            if(frame.detached) return;
            scrTop = scrTop || $win.scrollTop();

            var props = $.extend({opacity:1,top:0,left:0,'z-index':0}, $.fn.ParallaxTranslateProps({top:0,left:0}));
            $element.css(props);
            detach();
        };

        function detach() {
            if(!frame.detached) {
                var result = call(frame.settings.onDetach || null);
                if(result !== null) {
                    $element.detach();
                    frame.detached = true;
                }
            }
        };

        function attach(pre) {
            pre = pre === true;
            if(frame.detached) {
                var result = call(frame.settings.onAttach || null);
                if(result !== null) {
                    if(pre) {
                        parallax.getElement().prepend($element);
                    } else {
                        parallax.getElement().append($element);
                    }
                    frame.detached = false;
                    $sprites.each(function(ix){
                        $(this).data('parallax_sprite').onScroll($win.scrollTop());
                    });
                    checkSize();
                }
            }
        }

        frame.determineState = function(scrTop) {
            scrTop = scrTop || $win.scrollTop();
            var scrollable = false;
            if(scrTop <= markers['wait'].end) {
                frame.settings.state = 'WAIT';
                if(isFirst()) { frame.settings.state = 'PAUSE'; };
            } else if(scrTop >= markers['in'].start && scrTop <= markers['in'].end) {
                frame.settings.state = 'IN';
                if(isFirst()) { frame.settings.state = 'PAUSE'; };
            } else if(scrTop >= markers['pause'].start && scrTop <= markers['pause'].end) {
                frame.settings.state = 'PAUSE';
                if(scrTop >= (markers['pause'].start + parseInt( frame.settings.scrollable_offset  ))) {
                    scrollable = true;
                }
            } else if(scrTop >= markers['out'].start && scrTop <= markers['out'].end) {
                frame.settings.state = 'OUT';
            } else if(scrTop >= markers['complete'].start) {
                frame.settings.state = 'COMPLETE';
            } else {
                frame.settings.state = 'UNKNOWN';
            }

            var cls = frame.settings.state.toLowerCase();
            log( $element.attr('id') + ': ' + cls );
            $element.removeClass('wait');
            $element.removeClass('in');
            $element.removeClass('pause');
            $element.removeClass('out');
            $element.removeClass('complete');
            $element.removeClass('scrollable');
            $element.addClass(cls);

            if( scrollable ) {
                $element.addClass( 'scrollable' );
            }

            return frame.settings.state;
        };

        frame.process = function() {
            startLogGroup( 'Frame Initialization: ' + $element.attr('id'));
            frame.title = $element.attr('title');
            $element.removeAttr('title');
            log('Frame title: ' + frame.title);

            initData();
            initMarkers();
            initProgress();

            initLinks();

            initSprites();
            initBackground();

            initPreviousFrame();
            initKeyCodes();

            frame.trigger('incStep', 'PRE Initialize ' + $element.attr('id') + ' COMPLETE');
            frame.trigger('process_complete',frame);
            endLogGroup( 'Frame Initialization: ' + $element.attr('id'));
        };
        frame.trigger = function(name,args) {$element.trigger(name,args);};
        frame.on = function(which,callback) {$element.on(which,callback);};
        frame.incSteps = function(msg) { frame.trigger('incSteps', msg); loader_steps++; };
        frame.incStep = function(msg) { frame.trigger('incStep', msg); loader_step++; };

        frame.onScroll = function(scrTop,scrDir) { onScroll(scrTop,scrDir); };
        frame.onResize = function(scrTop) { onResize(scrTop); };

        frame.getElement = function() { return $element; }
        frame.getParallax = function() { return parallax; }

        frame.getSprites = function() { return $sprites; };
        frame.getSpriteByIndex = function(ix) { return null; };
        frame.hasSpriteIndex = function(ix) { return frame.getSpriteByIndex(ix) !== null; };

        frame.getPreviousFrame = function() { return parallax.getFrameByIndex( frame.settings.order - 1 ); }
        frame.hasPreviousFrame = function() { return frame.getPreviousFrame() !== null; };
        frame.getNextFrame = function() { return parallax.getFrameByIndex( frame.settings.order + 1); };
        frame.hasNextFrame = function() { return frame.getNextFrame() !== null; };

        frame.getMarkers = function() { return markers; };
        frame.getMarker = function(name) { return markers[name]; };
        frame.setMarker = function(which,marker) { markers[which] = marker; }

        frame.setOutDirection = function(dir) {frame.settings.out_direction = dir;};
        frame.setOutDuration = function(dur) { frame.settings.out_duration = dur; };
        frame.getOutDuration = function() { return frame.settings.out_duration; };
        frame.getType = function() {return frame.settings.type; };

        frame.getBgClass = function() {return frame.settings.background_cls; };

        init();

        function callHome() {
            /* do nothing */
        };
    };
})(jQuery,window,document);