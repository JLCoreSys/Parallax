;(function($,window,document,undefined){
    var $win = $(window),
        $body = $('body');

    $.fn.ParallaxNavigation = function(parallax,options) {
        var navigation = this,
            parallax = parallax || null,
            defaults = {
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
                navigation_tab_wrapper_type: 'div',
                navigation_tab_wrapper_cls: '.parallax-nav-tab-wrapper',
                navigation_tab_wrapper_css: {},
                navigation_tab_type: 'div',
                navigation_tab_cls: '.parallax-nav-tab',
                navigation_tab_css: {},
                beforeInit: null,
                afterInit: null
            },
            data = {},
            $wrapper = null,
            $nav = null,
            $items = [],
            $tabWrapper = null,
            $tab;

        function call(fn,p1,p2,p3,p4,p5,p6) {
            if(typeof fn === 'function') {
                return fn(p1,p2,p3,p4,p5,p6);
            }
            return undefined;
        };

        function isDebug() {
            var debug = navigation.settings.debug;
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
            navigation.settings = $.extend({},defaults,options);
            call(navigation.settings.beforeInit,navigation);

            startLogGroup('Navigation Initialization');
            initNavigation();
            endLogGroup('Navigation Initialization');
            parallax.on('ready',function(){
                setTimeout(function(){ navigation.show(); },750);
            });

            navigation.trigger('init');
            call(navigation.settings.afterInit,navigation);
            onResize();
        };

        function initNavigation() {
            var wrapper_search = navigation.settings.navigation_wrapper_type + '' + navigation.settings.navigation_wrapper_cls,
                nav_search = navigation.settings.navigation_type + '' + navigation.settings.navigation_cls,
                tabWrapper_search = navigation.settings.navigation_tab_wrapper_type + '' + navigation.settings.navigation_tab_wrapper_cls,
                tab_search = navigation.settings.navigation_tab_type + '' + navigation.settings.navigation_tab_cls,
                wrapper = $(wrapper_search),
                nav = $(nav_search),
                tabWrapper = $(tabWrapper_search),
                tab = $(tab_search);

            if(!wrapper.length) {
                wrapper = $('<' + navigation.settings.navigation_wrapper_type + ' class="' + navigation.settings.navigation_wrapper_cls.replace('.','') + '" />');
            }
            if(!nav.length) {
                nav = $('<' + navigation.settings.navigation_type + ' class="' + navigation.settings.navigation_cls.replace('.','') + '" />');
            }
            if(!tabWrapper.length) {
                tabWrapper = $('<' + navigation.settings.navigation_tab_wrapper_type + ' class="' + navigation.settings.navigation_tab_wrapper_cls.replace('.','') + '" />');
            }
            if(!tab.length) {
                tab = $('<' + navigation.settings.navigation_tab_type + ' class="' + navigation.settings.navigation_tab_cls.replace('.','') + '" title="OPEN MENU" />');
            }

            $wrapper = wrapper;
            $nav = nav;
            $tabWrapper = tabWrapper;
            $tab = tab;

            $nav.detach();
            $wrapper.detach();
            $tabWrapper.detach();
            $tab.detach();

            $tab.click(navigation.tabClick);

            $nav.css(navigation.settings.navigation_css);
            $wrapper.css(navigation.settings.navigation_wrapper_css);
            $tabWrapper.css(navigation.settings.navigation_tab_wrapper_css);
            $tab.css(navigation.settings.navigation_tab_css);

            $wrapper.append( $nav );
            $wrapper.append( $tabWrapper );
            $tabWrapper.append($tab);
            $('body').append($wrapper);

            initNavigationItems();
            navigation.hide();
            postInitNavigation();
        }

        function initNavigationItems()
        {
            var n = parallax.getFramesCount(),
                n = n <= 0 ? 1 : n,
                width = 100 / n;
            for(var i = 0; i < n; i++) {
                var frame = parallax.getFrameByIndex(i);
                if(frame !== null && frame !== undefined) {
                    var $item = $('<' + navigation.settings.navigation_item_type + ' class="' + navigation.settings.navigation_item_cls.replace('.','') + '" />');
                    $item.data('parallax_frame', frame);
                    $item.css(navigation.settings.navigation_item_css);
//                    $item.width(width + '%');
                    $items.push($item);
                    $nav.append($item);

                    var $a = $('<a href="javascript:void(0);">' + frame.title + '</a>')
                    $item.append($a);

                    $item.click(function(e){e.preventDefault(); navigation.itemClick($(this)); });
                }
            }

            $nav.append($('<div class="clear"></div>'));
        }

        function postInitNavigation(instant) {
            instant = instant === true;
            /* here we alter the heights ..etc of the navigation items */
            var height = $wrapper.height(),
                props = $.extend({}, $.fn.ParallaxTranslateProps({top:-height,left:0}));
            $wrapper.animate({top:-height},instant ? 0 : 500);
            $tab.removeClass('active');
        }

        function onScroll(scrTop,scrDir) {
            scrTop = scrTop || $win.scrollTop();
            scrDir = scrDir || 1;
            if(call(navigation.settings.onScroll,navigation,scrTop,scrDir) !== false) {

            }
        };

        function onResize() {
            if(call(navigation.settings.onResize,navigation) !== false) {
//                var n = $items.length,
//                    ww = $win.width(),
//                    width = 100 / n;
//
//                log( 'n: ' + n );
//                log( 'ww: ' + ww );
//                log( 'width: ' + width );
//
//                if( width < 10 ) {
//                    if(ww <= 480) {
//                        width = 50;
//                    } else if(ww <= 768) {
//                        width = 33;
//                    } else if(ww < 960) {
//                        width = 25;
//                    }
//                }
//
//                log( 'width: ' + width );
//                log( 'Wrapper height: ' + $wrapper.height() );
//
//                $.each($items,function(ix,$item){ $item.width( width + '%' ); });
                postInitNavigation( true);
            }
        };

        navigation.process = function() {};
        navigation.trigger = function(name,args) {$wrapper.trigger(name,args);};
        navigation.on = function(which,callback) {$wrapper.on(which,callback);};

        navigation.tabClick = function() {
            var active = $tab.hasClass('active'),
                height = $wrapper.height();
            if(active) {
                height = -height;
                $tab.removeClass('active');
            } else {
                height = 0;
                $tab.addClass('active');
            }
            $wrapper.animate({top:height},500);
            log(height);
        };

        navigation.onScroll = function() { onScroll(); };
        navigation.onResize = function() { onResize(); };

        navigation.itemClick = function($item) {
            var frame = $item.data('parallax_frame'),
                pos = frame.getMarker('pause').start;
            parallax.scrollToInt(pos,.25,false,false);
            $tab.click();
        };

        navigation.hide = function() { $wrapper.hide(); }
        navigation.show = function() { $wrapper.show(); }


        init();
    };
})(jQuery,window,document);