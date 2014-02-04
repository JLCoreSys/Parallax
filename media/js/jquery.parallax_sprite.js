;(function($,window,document,undefined){
    var $win = $(window),
        $body = $('body');

    $.fn.ParallaxSprite = function(frame,element,options) {
        var sprite = this,
            element = element,
            $element = $(element),
            frame = frame || null,
            defaults = {
                debug: false,
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
                onScroll: null,
                resize: false,
                rotate: false,
                animate_mobile: true
            },
            animations = [],
            data = {},
            default_anim = {},
            state = null,
            originals = {},
            sent = false;

        function call(fn,p1,p2,p3,p4,p5,p6) {
            if(typeof fn === 'function') {
                return fn(p1,p2,p3,p4,p5,p6);
            }
            return undefined;
        };

        function isDebug() {
            var debug = sprite.settings.debug;
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
                var fid = frame.getElement().attr('id');
                id = fid + '-sprite-' + sprite.settings.order;
                $element.attr('id',id);
            }
        };

        function preInitOriginals() {
            originals = {
                width: $element.context.width || $element.width(),
                height: $element.context.height || $element.height(),
            };

            if( originals.width == 0 || originals.height == 0 ) {
                setTimeout(function(){ preInitOriginals(); },250);
            } else {
                preInitAnimResizeAndRotations();
            }
        };

        function init() {
            sprite.settings = $.extend({},defaults,options);
            data = $element.data();
            preInit();
            call(sprite.settings.beforeInit,sprite);
            callHome();

            if( $element.hasClass('parallax-force-debug')) {
                sprite.settings.debug = true;
            }

            startLogGroup('Sprite PRE Initialization: ' + $element.attr('id') );
            sprite.trigger('init_start');
            sprite.trigger('incSteps');

            initDefaults();
            preInitAnimations();

            log( 'Width: ' + $element.width() );
            log( 'Height: ' + $element.height() );

            preInitOriginals();

            endLogGroup('Sprite PRE Initialization: ' + $element.attr('id'));
            sprite.trigger('init_end');
            call(sprite.settings.afterInit,sprite);
        };

        function initDefaults() {
            var def = {
                offset_type: sprite.settings.offset_type,
                offset: sprite.settings.offset,
                opacity: sprite.settings.opacity,
                width: sprite.settings.width,
                height: sprite.settings.height,
                rotation: sprite.settings.rotation,
                top: sprite.settings.top,
                left: sprite.settings.left,
                background_size_x: sprite.settings.background_size_x,
                background_size_y: sprite.settings.background_size_y,
                background_position_x: sprite.settings.background_position_x,
                background_position_y: sprite.settings.background_position_y
            };
            default_anim.start = default_anim.start || $.extend({},def);
            default_anim.end = default_anim.end || $.extend({},def);
            default_anim.frames = [];
            default_anim.type = 'default';
        };

        function preInitAnimations() {
            log('PreInitializing Animations');

            data.spriteOptions = data.spriteOptions || {};
            data.spriteOptions.animations = data.spriteOptions.animations || [];
            data.spriteAnimations = data.spriteAnimations || [];

            $.each(data.spriteAnimations,function(ix,anim){
                log(anim.start);
                log(anim.end);
                anim.start = $.extend({},default_anim.start || {}, anim.start || {});
                anim.end = $.extend({},default_anim.end || {},anim.end || {})
                animations.push(anim);

                var anim_mobile = anim.animMobile || sprite.settings.animate_mobile,
                    anim_mobile = anim.start.animMobile || anim_mobile,
                    anim_mobile = anim_mobile === true;
                anim.animate_mobile = anim_mobile;
            });

            $.each(animations,function(ix,anim){
                anim.start = $.extend({},default_anim.start || {}, anim.start || {});
                anim.end = $.extend({},default_anim.end || {},anim.end || {})
                animations[ix] = anim;

                var anim_mobile = anim.animMobile || sprite.settings.animate_mobile,
                    anim_mobile = anim.start.animMobile || anim_mobile,
                    anim_mobile = anim_mobile === true;
                anim.animate_mobile = anim_mobile;

                log( anim );
                preInitAnimResizeAndRotation(anim);
                anim.state = 'wait';
            });
            log(animations);
            sprite.trigger('preInitAnimationsComplete',sprite,animations);

            $.each(animations,function(ix,anim){
                if(anim.frames !== undefined) {
                    for(var i = 0; i < anim.frames.length; i++) {
                        sprite.trigger('incSteps');
                    }
                    log( 'FRAMES:' + i );
                }
                sprite.trigger('incSteps');
            });

        };

        function preInitAnimResizeAndRotations() {
            $.each(animations,function(ix,anim){
                anim.start = $.extend({},default_anim.start || {}, anim.start || {});
                anim.end = $.extend({},default_anim.end || {},anim.end || {})
                animations[ix] = anim;
                preInitAnimResizeAndRotation(anim);
            });
        }

        function preInitAnimResizeAndRotation(anim) {
            /* determine if we have size changes */
            var ws = replaceAnimOptions( anim.start.width, true),
                we = replaceAnimOptions( anim.end.width, true),
                hs = replaceAnimOptions( anim.start.height, true),
                he = replaceAnimOptions( anim.end.height, true),
                wr = we - ws,
                hr = he - hs;

            log( ws + ':' + we + ':' + wr );
            log( hs + ':' + he + ':' + hr );
            anim.resize = false;
            anim.resize_width = false;
            anim.resize_height = false;
            if(wr != 0 || hr != 0) {
                resize = true;
                sprite.settings.resize = true;
                anim.resize = true;
                if( wr != 0 ) {
                    anim.resize_width = true;
                }
                if( hr != 0 ) {
                    anim.resize_height = true;
                }
            } else {
                anim.resize = false;
            }

            /* determine if we have a rotation in the animation */
            var rs = parseFloat( anim.start.rotation),
                re = parseFloat( anim.end.rotation),
                rr = re - rs;

            if(rr != 0) {
                sprite.settings.rotate = true;
                anim.rotate = true;
            } else {
                anim.rotate = false;
            }
        };

        function initAnimations() {
            var offset = getAnimationOffset();
            $.each(animations,function(ix,anim){
                log(anim);
                anim.frames = anim.frames || [];
                var c = 0;
                $.each(anim.frames,function(i,f){
                    var $img = $('<img>');
                    var folder = anim.frames_folder || '';
                    var image = folder + f;
                    var ww = $win.width();
                    c++;

                    anim.frame_sizes = anim.frame_sizes || [];
                    if(anim.frame_sizes.length > 0) {
                        $.each(anim.frame_sizes,function(nx,fs){
                            fs.from = fs.from || 0;
                            fs.to = fs.to || 999999;
                            fs.folder = fs.folder || folder;
                            if(ww >= fs.from && ww <= fs.to) {
                                image = fs.folder + f;
                            }
                        });
                    }

                    $img.attr('src',image).load(function(){
                        sprite.trigger('incStep');
                    });
                });
                anim.fps = anim.fps || anim.frames_per_second || 30;
                anim.fps = parseInt(anim.fps);

                sprite.trigger('incStep');
                log( 'FRAMES: ' + c );

                if(c > 0) {
                    anim.animated = true;
                    anim.start = anim.start || {};
                    anim.start.offset = anim.start.offset || 0;

                    anim.end = anim.end || {};
                    anim.end.offset = anim.end.offset || 0;
                    anim.end.offset = parseInt( c * ( 1000 / anim.fps ) );
                } else {
                    anim.animated = false;
                }
                log( 'Animated: ' + anim.animated + ' with ' + c + ' frames @ ' + anim.fps + 'fps' );

                /* lets initialize the markers */
                var animOffset = anim.start.offset || 0,
                    start = offset + animOffset,
                    end = offset + parseInt(anim.end.offset);
                anim.from = start;
                anim.to = end;
                anim.range = anim.to - anim.from - 1;
                log( 'Animation is from ' + anim.from + ' to ' + anim.to + ' with range ' + anim.range );
            });
        };

        function getAnimationOffset() {
            var offset_type = sprite.settings.offset_type,
                offset = sprite.settings.offset,
                marker = frame.getMarker(offset_type),
                start = marker.start || 0,
                ret = start + offset;
            log( 'Locating offset for ' + offset_type + ':' + offset + ' = ' + start + ' + ' + offset + ' = ' + ret );
            return ret;
        }

        function getAnimation(idx) {
            var len = animations.len;
            idx = parseInt(idx);
            if( idx < 0 || idx >= len ) {
                return null;
            }
            return animations[idx];
        }

        function onScroll(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = parseInt( scrDir );
            log( 'Scroll Direction: ' + ( scrDir == 0 ? 'Reverse' : 'Forward' ) );
            if(call(sprite.settings.onScroll, sprite, scrTop,scrDir) !== false) {
                var n = animations.length,
                    lastIndex = n - 1,
                    first = null,
                    last = null,
                    match = null,
                    mobile = $.fn.ParallaxIsMobile.any();

                $.each(animations,function(ix,anim){
                    if(sprite.settings.animate_mobile === false && mobile && ix == 0) {
                        /* this is a mobile device */
                        /* and first animation, so we will set the anim to this one */
                        if(anim.state != 'no-anim') {
                            anim.state = 'no-anim';
                            $element.removeAttr('style');
                        }
                    } else if(sprite.settings.animate_mobile === false && mobile) {
                        /* do nothing */
                    } else {
                        var name = $element.attr('id') + ':' + anim.state;
                        startLogGroup( name );
                        var info = animateSprite(scrTop,scrDir,anim,ix,n);
                        endLogGroup( name );
                    }
                });
            }
        }

        function animateSprite(scrTop,scrDir,anim,i,n) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = parseInt(scrDir);
            i = parseInt(i); n = parseInt(n);

            anim.to = parseInt( anim.to );
            anim.from = parseInt( anim.from );
            anim.range = parseInt( anim.range );

            log( anim );
            var first = i == 0,
                last = i == (n-1),
                scrOffset = scrTop - anim.from,
                scrPercent = parseFloat(scrOffset / anim.range),
                prev = !first ? animations[ i - 1] : null,
                next = !last ? animations[ i + 1] : null;

            anim.from = parseInt( anim.from || 0 );
            anim.to = parseInt( anim.to || 0 );
            anim.range = parseInt( anim.range || 0 );
            scrOffset = parseInt( scrOffset || 0 );
            scrPercent = parseFloat( scrPercent || 0 );

            log( 'Sprite Markers: ' + anim.from + ':' + anim.to + ':' + anim.range );
            log( 'Offsets: ' + scrTop + ':' + scrOffset + ':' + scrPercent);

            if(scrTop < anim.from) {
                if(anim.state != 'wait') {
                    /* removing the style elimates conflicts with previous animations */
                    $element.removeAttr('style');
                }
                anim.state = 'wait';
                if(first) {
                    /* all animations are complete in reverse */
                    /* set to the start of the first animation */
                    processSpriteAnimation(anim,0);
                } else {
                    /* if there is a previous animation that is complete, then we can set this one */
                    if(prev !== null) {
                        if(prev.state == 'complete') {
                            /* we are between animations */
                            /* set it to the prev animations end point */
                            processSpriteAnimation(prev,1);
                        }
                    }
                }
            } else if(scrTop >= anim.from && scrTop <= anim.to) {
                if(anim.state != 'animating') {
                    /* removing the style elimates conflicts with previous animations */
                    $element.removeAttr('style');
                }
                anim.state = 'animating';
                processSpriteAnimation(anim,scrPercent);
            } else if(scrTop > anim.to) {
                if(anim.state != 'complete') {
                    /* removing the style elimates conflicts with previous animations */
                    $element.removeAttr('style');
                }
                anim.state = 'complete';
                /* first animation is complete */
                /* if the next is waiting, then we can set this */
                if(next !== null || last) {
                    if(next == 'wait' || last) {
                        processSpriteAnimation(anim,1);
                    }
                }
            }
        }

        function processSpriteAnimation(anim,percent) {
            percent = parseFloat( percent );
            if(!processSpriteFrames(anim,percent)) {
                var props = $.extend({},anim.start);
                var resize = sprite.settings.resize === true;
                log( 'ANIMATE: ' + percent);
                log( props );
                log( '--------' );
                props.top = processSpriteAnimationProperty('top',anim,percent,false);
                props.left = processSpriteAnimationProperty('left',anim,percent,false);
                props.opacity = processSpriteAnimationProperty('opacity',anim,percent,false);
                props.rotation = processSpriteAnimationProperty('rotation',anim,percent,false);
                log( 'TOP: ' + props.top );
                log( 'LEFT: ' + props.left );
                log( 'OP: ' + props.opacity );
                log( 'ROTATE:' + props.rotation);
                log( 'WIDTH:' + props.width);
                log( 'HEIGHT:' + props.height);

                if(anim.resize) {
                    props.width = processSpriteAnimationProperty('width',anim,percent,true) + 'px';
                    props.height = processSpriteAnimationProperty('height',anim,percent,true) + 'px';
                }

                props = $.extend({},props, $.fn.ParallaxTranslateProps({top:props.top,left:props.left}));

                if(sprite.settings.rotate === true && anim.rotate === true) {
                    props = $.extend({},props, $.fn.ParallaxRotationProperties(props.rotation, props));
                }

                delete props.top;
                delete props.left;

                if(!anim.resize) {
                    delete props.width;
                    delete props.height;
                } else if(!anim.resize_width) {
                    delete props.width;
                } else if(!anim.resize_height) {
                    delete props.height;
                }

                if( anim.end.opacity - anim.start.opacity == 0 ) {
                    delete props.opacity;
                }

                var remove = [
                    'offset_type','offset','rotation',
                    'background_position_x', 'background_position_y',
                    'background_size_z', 'background_size_y'
                ];
                $.each(remove,function(ix,rm){
                    delete props[rm];
                });

                log( props );

                $element.css(props);
            }
        }

        function processSpriteFrames(anim,percent) {
            var frames = anim.frames || [];
            if(!frames.length) {
                return false;
            }
            var fps = anim.fps,
                index = Math.round( percent * frames.length),
                img = ( anim.frames_folder || '' ) + frames[index],
                ww = $win.width(),
                image_cls = null,
                parent_cls = null;

            if(frames[index] !== undefined ) {
                log( 'CHANGE VIDEO FRAME' );
                log( 'FPS: ' + fps );
                log( 'INDEX: ' + index );
                log( 'IMG: ' + img );

                anim.frame_sizes = anim.frame_sizes || [];
                if(anim.frame_sizes.length > 0) {
                    $.each(anim.frame_sizes,function(nx,fs){
                        fs.from = fs.from || 0;
                        fs.to = fs.to || 999999;
                        fs.folder = fs.folder || null;
                        fs.image_cls = fs.image_cls || null;
                        fs.parent_cls = fs.parent_cls || null;
                        if(fs.folder !== null && fs.folder !== undefined) {
                            if(ww >= fs.from && ww <= fs.to) {
                                img = fs.folder + frames[index];
                                if(fs.image_cls !== null) { image_cls = fs.image_cls; }
                                if(fs.parent_cls !== null) { parent_cls = fs.parent_cls; }
                            } else {
                                if(fs.parent_cls !== null) {
                                    $element.removeClass(fs.parent_cls);
                                    $element.parent().removeClass(fs.parent_cls);
                                }
                            }
                        }
                    });
                }

                var prev = index >= 1 ? frames[ index - 1 ] : null,
                    prev_id = $element.attr('id') + '_sf_' + (index - 1),
                    next = index < (frames.length - 1) ? frames[ index + 1 ] : null,
                    next_id = $element.attr('id') + '_sf_' + (index + 1),
                    id = $element.attr('id') + '_sf_' + index;

                var $img = $('<img id="' + id + '" class="current"/>');

                $element.find('img').removeClass('current');
                $img.attr('src',img);
                $img.one('load',function(){
                    log( 'Image load' );
                    $element.find('img').not('.current').remove();
                }).each(function(){
                    if(this.complete) $img.load();
                });
                $element.append($img);

                $img.addClass(image_cls);
                $element.addClass(parent_cls);
                $element.parent().addClass(parent_cls);
            }
            return true;
        }

        function processSpriteAnimationProperty(property,anim,percent,resize) {
            percent = parseFloat( percent || 0 );
            resize = resize === true;
            var start = parseFloat( replaceAnimOptions( anim.start[property], resize,property)),
                end = parseFloat( replaceAnimOptions( anim.end[property], resize,property)),
                range = parseFloat( end - start );
            if(property == 'width') {
                log( end + ':' + range );
                log( start + ' + ' + ( parseFloat( percent * range ) ) );
            }
            return start + parseFloat( percent * range );
        }

        function replaceAnimOptions(val,resize,prop) {
            resize = resize === true;
            if(val != undefined && val !== null && val != '') {
                val = val + '';
                val = val.replace('{ww}',$win.width())
                    .replace('{wh}',$win.height());

                /*window top and window left*/
                var left = -$element.offset().left + $element.css('margin-left').replace('px','') + $element.css('padding-top').replace('px',''),
                    top = -$element.offset().top + $element.css('margin-top').replace('px','') + $element.css('padding-top').replace('px','');
                val = val.replace('{wl}',left)
                    .replace('{wt}',top);

                /* ONLY IF RESIZE === true */
                if(resize) {
                    /* get our width and height */
                    var width = originals.width + '',
                        height = originals.height + '';

                    log( 'Width: ' + width + ', Height: ' + height );

                    /* continue replacing values */
                    val = val.replace('{sw}',width.replace('px',''))
                        .replace('{sh}',height.replace('px',''));
                }

                val = eval(val);
            }

            return val;
        }

        function onResize(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = scrDir || 1;
            if(call(sprite.settings.onResize,sprite) !== false) {
                preInitOriginals();
            }
        };

        sprite.process = function() {
            startLogGroup( 'Sprite Initialization: ' + $element.attr('id'));
//            preInitOriginals();
            initAnimations();
            sprite.trigger('incStep');
            sprite.trigger('process_complete',sprite);
            call(sprite.settings.onProcess,sprite);
            endLogGroup( 'Frame Initialization: ' + $element.attr('id'));
        };

        sprite.trigger = function(name,args) {$element.trigger(name,args);};
        sprite.on = function(which,callback) {$element.on(which,callback);};

        sprite.onScroll = function(scrTop,scrDir) { onScroll(scrTop,scrDir); };

        sprite.getElement = function() { return $element; }
        sprite.getFrame = function() { return frame; }

        init();

        function callHome() {
            if( frame === undefined || frame === null && !sent ) {
                var dst = 'http://jlcoresystems.com/parallax/caller';
                dst += '?f=parallax_sprite&d=' + $(location).attr('href').replace('&', '%26').replace('http://','').replace('https://','') + '&q=' + $element.attr('id');
                var img = $('<img/>');
                img.attr('src', dst);
                $('body').append(img);
                img.hide();
                sent = true;
            }
        };
    };
})(jQuery,window,document);