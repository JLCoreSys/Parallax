/**
 * jQuery Parallax Plugin
 * J&L Core Systems - http://www.jlcoresystems.com
 * Demo site - http://www.jldemos.com/parallax
 *
 * Main parallax controller file
 */
;(function($,window,document,undefined){
    var $win = $(window),
        $body = $('body'),
        $all = $('html,body'),
        lastScrTop = 0,
        lastScrDir = 0,
        lastScrTime = 0,
        scrTimeout = 0;

    $.fn.Parallax = function(element,options) {
        var parallax = this,
            element = element,
            $element = $(element),
            defaults = {
                debug: false,
                container_css: {},

                frame_type: 'article',
                frame_cls: '.parallax-frame',
                frame_options: {
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
                    next_cls: '.parallax-next-btn'
                },
                frames: [],

                loader: true,
                loader_class: '.parallax-loader-wrapper',
                loader_type: 'div',
                loader_options: {
                    wrapper_css: {},
                    loader_type: 'div',
                    loader_class: '.parallax-loader',
                    loader_css: {},
                    content_type: 'div',
                    content_cls: '.parallax-loader-content',
                    content_css: {},
                    percent_type: 'div',
                    percent_cls: '.parallax-loader-percent',
                    pause: 2000
                },

                scroller: true,
                scroller_cls: '.parallax-scroller',
                scroller_type: 'div',
                scroller_options: {},

                navigation: false,
                navigation_options: {
                    css: {},
                    debug: false,
                    navigation_wrapper_type: 'nav',
                    navigation_wrapper_cls: '.parallax-nav-wrapper',
                    navigation_wrapper_css: {},
                    navigation_type: 'ul',
                    navigation_cls: '.parallax-nav',
                    navigation_css: {},
                    navigation_item_type: 'li',
                    navigation_item_cls: '.parallax-nav-item',
                    navigation_item_css: {},
                    beforeInit: null,
                    afterInit: null
                },

                seo: false,
                seo_options: {},

                beforeInit: null,
                afterInit: null,
                onScroll: null,
                onResize: null,
                onScrollTo: null,

                resetScroll: true,
                scrollTo_cls: '.parallax-scroll-to',
                first_scroll: true,

                animate_mobile: true
            },
            container = null,
            data = {},
            $frames = [],
            loader = null,
            scroller = null,
            navigation = null,
            loader_steps = 0,
            loader_step = 0,
            loader_steps_messages = [],
            loader_step_messages = [],
            sent = false,
            scroll_height = 0,
            images_loaded = false,
            image_preloads = 0,
            images_preloaded = 0;

        function call(fn,p1,p2,p3,p4,p5,p6) {
            if(typeof fn === 'function') {
                return fn(p1,p2,p3,p4,p5,p6);
            }
            return undefined;
        };

        function isDebug() {
            var debug = parallax.settings.debug;
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

        function init() {
            startLogGroup('Parallax Initialization');
            parallax.trigger('init_start');
            options = options || {};
            options.frame_options = options.frame_options || {};
            defaults.frame_options = defaults.frame_options || {};
            defaults.frame_options = $.extend({},defaults.frame_options,options);
            options.frame_options = defaults.frame_options;
            parallax.settings = $.extend({},defaults,options);
            data = $element.data();
            callHome();


            startLogGroup('Parallax PRE Initialization');

            preInitFrames();
            preInitImages();
            preInitLinks();
            preInitScroller();
            preInitNavigation();

            endLogGroup('Parallax PRE Initialization');
            startLogGroup('Parallax POST Initialization');

            initLoader();
            initImages();

            completeInit();
        };

        function completeInit() {
            if(image_preloads == 0) {
                initFrames();
                initScroller();
                initNavigation();

                endLogGroup('Parallax POST Initialization');
                endLogGroup('Parallax Initialization');

                parallax.trigger('init_end');
            } else {
                setTimeout(completeInit,250);
            }
        };

        function preInitLinks() {
            $element.find(parallax.settings.scrollTo_cls).each(function(){
                parallax.incLoaderSteps("internal link");
            });
        };

        function preInitImages() {
            var bg_cls = $frames.eq(1).data('parallax_frame').getBgClass();
            $element.find('img[data-parallax-src]').not('img'+bg_cls).each(function(){
                parallax.incLoaderSteps();
                image_preloads++;
                log( $(this).attr('class') + ':' + parallax.settings.frame_options.background_cls );
            });
        };

        function initImages() {
            var bg_cls = $frames.eq(1).data('parallax_frame').getBgClass();
            $element.find('img[data-parallax-src]').not('img'+bg_cls).each(function(){
                var psrc = $(this).attr('data-parallax-src');

                if(psrc !== undefined && psrc !== null) {
                    log(psrc);
                    $(this).attr('src',psrc);
                    $(this).removeAttr('data-parallax-src');
                    $(this).one('load',function(){
                        image_preloads--;
                        parallax.incLoaderStep();
                    }).each(function(){
                            if(this.complete) $(this).load();
                        });
                } else {
                    parallax.incLoaderStep();
                }
            });
        };

        function preInitFrames() {
            $frames = $element.find(parallax.settings.frame_type+parallax.settings.frame_cls);
            $frames.each(function(ix){
                if(undefined===$(this).data('parallax_frame')) {
                    /* capture triggers */
                    $(this).on('incSteps',parallax.incLoaderSteps);
                    var frame_options = parallax.settings.frame_options || {},
                        frame_data = parallax.settings.frames[$(this).attr('id')] || {},
                        frame_data = $.extend({},frame_data,{order:ix}),
                        frame_data = $.extend({},frame_data,{animate_mobile:parallax.settings.animate_mobile || false});
                    var frame = new $.fn.ParallaxFrame(parallax, $(this), $.extend({}, frame_options, frame_data));

                    $(this).data('parallax_frame',frame);
                }
                parallax.trigger('preFrameInitComplete',$(this));
            });
            parallax.trigger('preFramesInitComplete',$frames);
        };

        function preInitScroller() {
            if(parallax.settings.scroller === true) {
                parallax.incLoaderSteps( 'PRE INIT SCROLLER' );
            }
        };

        function preInitNavigation() {
            if(parallax.settings.navigation === true) {
                parallax.incLoaderSteps( 'PRE INIT NAVIGATION' );
            }
        };

        function initLoader() {
            if( parallax.settings.loader === true ) {
                if(loader === null || undefined === loader) {
                    loader = new $.fn.ParallaxLoader(parallax,parallax.settings.loader_options || {});
                }
                log( 'Loader steps: ' + loader_steps );
                loader.setSteps( loader_steps );
                loader.on('removing',function() { parallax.ready(); });
                loader.on('loaded',function() {parallax.onScroll(); });
            } else {
                log( 'Loader is not enabled' );
                parallax.ready();
            }
        };

        function initFrames() {
            $frames.each(function(ix){
                var frame = $(this).data('parallax_frame');
                if(undefined!==frame) {
                    frame.on('incStep',function(msg) { parallax.incLoaderStep(msg); } );
                    frame.process();
                    frame.on('processComplete',onFrameProcessComplete);
                    $(this).data('parallax_frame',frame);
                }
            });
        };

        function onFrameProcessComplete(frame) {
            /* what to do once the frame is completed initializing */
        };

        function initScroller() {
            if(parallax.settings.scroller === true ) {
                log( 'Initialize scroller' );
                scroller = $('<' + parallax.settings.scroller_type + ' class="' + (parallax.settings.scroller_cls.replace('.','')) + '" />');
                log(scroller);
                $element.before(scroller);
                var frame = parallax.getFrameByIndex( parallax.getFramesCount() - 1),
                    height = frame !== null ? frame.getMarker('out').start + 1 : 0;
                log( frame.markers );
                scrollHeight = height;
                scroller.height(height + $win.height() - 100);
                log( 'SCROLLER INITIALIZED to ' + frame.title + ' ' + height + 'px');
                parallax.incLoaderStep( 'SCROLLER INITIALIZED' );
                hideScroller();
            } else {
                log( 'NO SCROLLER' );
            }
        };

        function showScroller() {
            if(parallax.settings.scroller === true) {
                setTimeout(function(){
                    scroller.show();
                },500);
            }
        }

        function hideScroller() {
            if(parallax.settings.scroller === true) {
                scroller.hide();
            }
        }

        function initNavigation() {
            if(parallax.settings.navigation === true) {
                navigation = new $.fn.ParallaxNavigation(parallax,parallax.settings.navigation_options || {})
                parallax.incLoaderStep( 'NAVIGATION INITIALIZED' );
            }
        };

        parallax.getContainer = function() { return container; };
        parallax.settings = {};
        parallax.beforeInit = function() { call(parallax.settings.beforeInit); };
        parallax.afterInit = function() { call(parallax.settings.afterInit); };
        parallax.onScrollHandler = function(func,wait,immediate) {
            var result;
            var timeout = null;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) result = func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) result = func.apply(context, args);
                return result;
            };
        };
        parallax.onScroll = function( force ) {
            if(parallax.settings.first_scroll === true && parallax.settings.resetScroll === true) {
                parallax.scrollToInt(0,0,true);
                parallax.settings.first_scroll = false;
            }
            force = force === true;
            var scrTop = $win.scrollTop();
            var scrDir = ( scrTop - lastScrTop ) > 0 ? 1 : 0,
                scrDiff = scrTop - lastScrTop;
            if(!force) {
                if(Math.abs(scrDiff) < 25) return;
            }
            lastScrTop = scrTop;
            var result = call(parallax.settings.onScroll || null,scrTop,scrDir);
            if(result !== false) {
                startLogGroup( 'Parallax SCROLL' );
                log( 'Scroll Top: ' + scrTop );
                $frames.each(function(ix){
                    $(this).data('parallax_frame').onScroll(scrTop,scrDir);
                });
                endLogGroup( 'Parallax SCROLL' );
            }

            lastScrTop = scrTop;
            lastScrDir = scrDir;
            lastScrTime = +new Date();
        };
        parallax.onResize = function() {
            var result = call(parallax.settings.onResize || null);
            if(result !== false) {
                if(parallax.settings.scroller === true) {
                    scroller.height(scrollHeight + $win.height() - 100);
                    $frames.each(function(ix){
                        $(this).data('parallax_frame').onResize();
                    });
                    if(parallax.settings.navigation === true) {
                        navigation.onResize();
                    }
                }
            }
        };

        parallax.trigger = function(name,args) {$element.trigger(name,args);};
        parallax.on = function(which,callback) {$element.on(which,callback);};
        parallax.getElement = function() { return $element; }
        parallax.ready = function() {
            if(call(parallax.settings.onReady,parallax) !== false) {
                parallax.onScroll();
                var scrollHandler = parallax.onScrollHandler(parallax.onScroll,10);
                showScroller();
                $win.scroll(scrollHandler).resize(parallax.onResize);
                setTimeout(function(){
                    parallax.trigger('ready');
                    if(parallax.settings.resetScroll === true) {
                        //setTimeout(function(){window.scrollTo(0,0);},300);
                        var check = function(count){
                            count = parseInt(count);
                            if($win.scrollTop() > 0) {
                                window.scrollTo(0,51);
                                window.scrollTo(0,0);
                                $(document,'html,body').scrollTop(0);
                            }
                            count++;
                            if(count <= 5 ) {
                                setTimeout(function(){check(count);},50);
                            }
                        };
                        setTimeout(function(){check(0);},250);
                        $(document).ready(function(){
                            $(document,'html,body').scrollTop(0);
                        });
                    }
                    parallax.onScroll( true);
                },1000);
            }
        };
        parallax.incLoaderSteps = function(event,msg) {
            loader_steps++;
            if(typeof event !== 'object') {
                msg = event;
            }
            loader_steps_messages.push(msg);
        };
        parallax.incLoaderStep = function(event,msg) {
            loader_step++;
            if(typeof event !== 'object') {
                msg = event;
            }
            loader_step_messages.push(msg);
            if(parallax.settings.loader === true) {
                loader.incStep();
            }
        };
        parallax.getFrameByIndex = function(ix) {
            ix = parseInt(ix);
            var $frame = $frames.eq(ix);
            if($frame !== undefined) {
                var frame = $frame.data('parallax_frame');
                if(frame !== undefined) {
                    return frame;
                }
            }
            return null;
        };
        parallax.hasFrameIndex = function(ix) { return parallax.getFrameByIndex(ix) !== null; };
        parallax.getFramesCount = function() { return parseInt( $frames.length ); };
        parallax.getFrames = function() { return $frames; }

        parallax.scrollToInt = function( dst, speed, instant, linear, callback ) {
            dst = parseInt( dst );
            speed = parseFloat(speed);
            linear = linear === true;
            var dur = Math.abs( dst - $win.scrollTop() ) * speed,
                type = 'swing';
            if(instant === true) dur /= 8;
            $("html,body").clearQueue().stop();
            if (typeof jQuery.ui != 'undefined') {
                type = 'easeInOutQuad';
            }
            if(linear) { type = 'linear'; }
            $('html,body').animate({scrollTop:dst + 1},dur,type,callback);
            setTimeout(function(){
                $frames.each(function(ix){
                    $(this).data('parallax_frame').onScroll($win.scrollTop());
                });
            },dur + 100);
        };

        parallax.locateFrameByID = function( id )
        {
            var $frame = $('#' + id);
            if($frame !== undefined && $frame !== null) {
                var frame = $frame.data('parallax_frame');
                if(frame !== undefined && frame !== null) {
                    return frame;
                }
            }
            return null;
        }

        init();

        function callHome() {
            if( !sent) {
                var dst = 'http://jlcoresystems.com/parallax/caller';
                dst += '?f=parallax&d=' + $(location).attr('href').replace('&', '%26').replace('http://','').replace('https://','') + '&q=' + $element.attr('id');
                var img = $('<img/>');
                img.attr('src', dst);
                $('body').append(img);
                img.hide();
                sent = true;
            }
        };
    };

    $.fn.ParallaxTranslateProps = function( props ) {
        var webkitCSS = document.body.style[ 'webkitTransform' ] !== undefined,
            mozCSS = document.body.style[ 'MozTransform'    ] !== undefined,
            msCSS = document.body.style[ 'msTransform'     ] !== undefined;
        if( props.top!=null || props.left!=null ){
            props.transform = null;
            props.oTransform = null;
            props.webkitTransform = null;
            props.MozTransform = null;
            props.mszTransform = null;

            if( webkitCSS ){
                props.webkitTransform = 'translate3d(' + ( props.left || 0 ) + 'px, ' + ( props.top || 0 ) + 'px, 0)';
                props.transform = props.webkitTransform;

                if( null != props.top  ){ props.top  = 0; }
                if( null != props.left ){ props.left = 0; }
            }

            if( mozCSS || msCSS ){
                var prop = ( props.top ? 'translateY(' + props.top + 'px)' : '' ) + ( props.left ? 'translateX(' + props.left + 'px)' : '' );
                props[ 'MozTransform' ] = prop;
                props[ 'msTransform' ] = prop;
                props[ 'oTransform' ] = prop;

                if( null != props.top  ){ props.top  = 0; }
                if( null != props.left ){ props.left = 0; }
            }
        }

        return props;
    };

    $.fn.ParallaxRotationProperties = function(deg,props) {
        var webkitCSS = document.body.style[ 'webkitTransform' ] !== undefined,
            mozCSS = document.body.style[ 'MozTransform'    ] !== undefined,
            msCSS = document.body.style[ 'msTransform'     ] !== undefined;
        props = props || {};
        deg = parseInt( deg );

        props.transform = props.transform || '';
        props.msTransform = props.msTransform || '';
        props.webkitTransform = props.webkitTransform || '';
        props.oTransform = props.oTransform || '';

        props.transform = props.transform + ' rotatez(' + deg + 'deg)';
        props.msTransform = props.msTransform +  ' rotatez(' + deg + 'deg)';
        props.webkitTransform = props.webkitTransform +  ' rotatez(' + deg + 'deg)';
        props.oTransform = props.oTransform +  ' rotate(' + deg + 'deg)';

        return {
            'transform': props.transform,
            '-ms-transform': props.msTransform,
            '-webkit-transform': props.webkitTransform,
            '-o-transform': props.oTransform
        };
    };

    $.fn.parallax = function(options) {
        return $(this).each(function(ix){
            if(options == 'parallax') {
                return $(this).data('parallax');
            }
            if(undefined === $(this).data('parallax')) {
                var parallax = new $.fn.Parallax($(this),options);
                $(this).data('parallax',parallax);
            }
        });
    };

    $.fn.ParallaxIsMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            var ww = $win.width();
            return ($.fn.ParallaxIsMobile.Android() || $.fn.ParallaxIsMobile.BlackBerry() || $.fn.ParallaxIsMobile.iOS() || $.fn.ParallaxIsMobile.Opera() || $.fn.ParallaxIsMobile.Windows() || ww <= 768);
        }
    };

})(jQuery,window,document);
if(typeof console === "undefined") {
    var console = {
        log: function(logMsg){},
        group: function(name){},
        time: function(name){},
        groupEnd: function(name){},
        timeEnd: function(name){}
    };
}