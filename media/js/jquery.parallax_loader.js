;(function($,window,document,undefined){
    var $win = $(window),
        $body = $('body');

    $.fn.ParallaxLoader = function(parallax,options) {
        var loader = this,
            parallax = parallax || null,
            defaults = {
                css: {},
                debug: false,
                loader_type: 'div',
                loader_cls: '.parallax-loader',
                loader_css: {},
                content_type: 'div',
                content_cls: '.parallax-loader-content',
                content_css: {},
                percent_type: 'div',
                percent_cls: '.parallax-loader-percent',
                beforeInit: null,
                afterInit: null,
                onIncProgress: null,
                onLoaded: null,
                remove_type: 'slide',
                remove_duration: 2000,
                pause: 2000,
                content_el: null,
                stall_delay: 2000
            },
            data = {},
            $loader = null,
            $content = null,
            $percent = null,
            steps = 0,
            step = 0,
            percent = 0,
            complete = false,
            $content_el = null,
            stall_timer = null;

        function call(fn,p1,p2,p3,p4,p5,p6) {
            if(typeof fn === 'function') {
                return fn(p1,p2,p3,p4,p5,p6);
            }
            return undefined;
        };

        function isDebug() {
            var debug = loader.settings.debug;
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
            loader.settings = $.extend({},defaults,options);
            call(loader.settings.beforeInit,loader);

            startLogGroup('Loader Initialization');

            initLoader();
            attach();

            endLogGroup('Loader Initialization');
            loader.trigger('init');
            call(loader.settings.afterInit,loader);
        };

        function initLoader() {
            initContent();
            if($loader === undefined || null === $loader) {
                var el = $(loader.settings.loader_type+loader.settings.loader_cls);
                if(undefined !== el && null !== el && el.length == 0) {
                    $loader = $('<' + loader.settings.loader_type + ' class="' + (loader.settings.loader_cls.replace('.','')) + '"></' + loader.settings.loader_type  + '>');
                } else {
                    /* the loader element already exists, detach it for use later */
                    $loader = el;
                }
                loader.settings.loader_css = loader.settings.loader_css || {};
                $loader.css(loader.settings.loader_css);
                $loader.append($content);
                log( 'Loader Element Created' );
                log( $loader );
            }
        };

        function initContent() {
            initPercent();
            if($content === undefined || null === $content) {
                var el = $(loader.settings.content_type+loader.settings.content_type);
                if(undefined !== el && null !== el && el.length == 0) {
                    $content = $('<' + loader.settings.content_type + ' class="' + (loader.settings.content_cls.replace('.','')) + '"></' + loader.settings.content_type  + '>');
                } else {
                    /* the content element already exists, detach it for use later */
                    $content = el;
                }
                loader.settings.content_css = loader.settings.content_css || {};
                $content.css(loader.settings.content_css);
                $content.append($percent);
                $content.detach();
                log( 'Content Element Created' );
                log( $content );

                if(loader.settings.content_el !== undefined && loader.settings.content_el !== null) {
                    $content_el = $(loader.settings.content_el);
                    if( $content_el.length ) {
                        var html = $content_el.html();
                        log(html);
                        $content.append(html);
                    }
                }
            }
        };

        function initPercent() {
            if($percent === undefined || null === $percent) {
                var el = $(loader.settings.percent_type+loader.settings.percent_cls);
                if(undefined !== el && null !== el && el.length == 0) {
                    $percent = $('<' + loader.settings.percent_type + ' class="' + (loader.settings.percent_cls.replace('.','')) + '">0%</' + loader.settings.percent_type  + '>');
                } else {
                    /* the percent element already exists, detach it for use later */
                    $percent = el;
                }
                loader.settings.percent_css = loader.settings.percent_css || {};
                $percent.css(loader.settings.percent_css);
                $percent.detach();
                log( 'Percent Element Created' );
                log( $percent );
            }
        };

        function onScroll(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = scrDir || 1;
            if(call(loader.settings.onScroll,loader,scrTop,scrDir) !== false) {

            }
        };

        function onResize(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = scrDir || 1;
            if(call(loader.settings.onResize,loader) !== false) {

            }
        };

        function removeLoader() {
            setTimeout(function(){
                loader.trigger('removing');
                if(loader.settings.remove_type == 'slide') {
                    removeLoaderSlide();
                } else if(loader.settings.remove_type == 'fade') {
                    removeLoaderFade()
                } else {
                    detach();
                    loader.trigger('loaded');
                }
            },loader.settings.pause || 1000);
        };

        function removeLoaderSlide() {
            $loader.css({'height':$win.height()+'px','opacity':1});
            $loader.animate({height:0+'px',opacity:0},loader.settings.remove_duration, 'swing', function() {
                detach();
                loader.trigger('loaded');
            });
        };

        function removeLoaderFade() {
            $loader.css({'opacity':0,height:$win.height()+'px'});
            $loader.animate({'opacity':0},loader.settings.remove_duration, 'swing', function() {
                detach();
                loader.trigger('loaded');
            });
        };

        function detach() {
//            $loader.detach();
        };

        function attach($el) {
            if( complete ) return;
            parallax = parallax || {};
            $el = $el || parallax.getElement();
            $el.after($loader);
            log( 'Attached loader' );
        };

        loader.process = function() {
            loader.trigger('process_complete',loader);
            call(loader.settings.onProcess,loader);
        };

        loader.trigger = function(name,args) {$loader.trigger(name,args);};
        loader.on = function(which,callback) {$loader.on(which,callback);};

        loader.getLoader = function() { return $loader; };
        loader.getContent = function() { return $content; };
        loader.getPercent = function() { return $percent; };
        loader.getFrame = function() { return parallax; };

        loader.setSteps = function(stps) { steps = parseInt(stps); loader.updateLoader(); };
        loader.incSteps = function() { steps++; loader.updateLoader(); };
        loader.setStep = function(stp) {step = parseInt(stp);loader.updateLoader(); };
        loader.incStep = function() {step++;loader.updateLoader();}
        loader.show = function($el) { attach($el); };
        loader.hide = function() { detach(); };

        loader.updateLoader = function() {
            var perc = parseFloat( step / steps);
            percent = Math.round( perc * 100 );

            clearTimeout(stall_timer);

            percent = percent <= 0 ? 0 : ( percent >= 100 ? 100 : percent );

            $percent.html(percent+'%');
            $content.css({height:percent+'%'});

            if( percent >= 100) {
                loader.trigger('complete');
                removeLoader();
                return;
            }

            stall_timer = setTimeout(function(){ location.reload(true); },loader.settings.stall_delay);
//            stall_timer = setTimeout(function(){ loader.incStep(); },loader.settings.stall_delay / 2);
        };

        init();
    };
})(jQuery,window,document);