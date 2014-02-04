;(function($,window,document,undefined){
    var $window = $(window),
        $body = $('body'),
        lastScrTop = 0,
        lastScrDir = 'forward',
        webkitCSS = document.body.style[ 'webkitTransform' ] !== undefined,
        mozCSS = document.body.style[ 'MozTransform'    ] !== undefined,
        msCSS = document.body.style[ 'msTransform'     ] !== undefined;

    $.Parallax = function(el,options) {
        var container = this,
            defaults = {
                loader: false,
                loader_cls: '.parallax-loader',
                loader_background: null,
                loader_css: {},
                loader_content_cls: '.parallax-loader-content',
                loader_content_background: null,
                loader_content_css: {},
                loader_percent_cls: '.parallax-loader-percent',
                loader_percent_css: {},
                item_type: 'article',
                item_cls: '.parallax-item',
                debug: false,
                scroller_cls: '.parallax-scroller',
                onLoaded: null,
                onLoaderInit: null,
                onLoaderComplete: null,
                onScrollerInit: null,
                onScrollerComplete: null,
                onItemsInitComplete: null,
                onScroll: null,
                onResize: null,
                scrollRatio: 1,
                nav: true,
                nav_type: 'ul',
                nav_wrapper_cls: '.parallax-nav-wrapper',
                nav_cls: '.parallax-nav',
                nav_item_cls: '.parallax-nav-item',
                nav_item_type: 'li',
                scrollto_cls: '.parallax-scrollto',
                play_cls: '.parallax-play'
            },
            element = el,
            $element = $(element),
            $items = [],
            $loader = null,
            $loaderContent = null,
            $loaderPercent = null,
            $scroller = null,
            $nav = null,
            $nav_ul = null,
            $nav_pull = null,
            loaderSteps = 0,
            loaderStep = 0,
            loaded = false;

        container.settings = {};

        container.log = function(msg) { if(container.settings.debug === true) { console.log( msg ); } };
        function log( msg ) { container.log( msg ); };

        container.getElement = function() { return $element; };

        container.initNav = function() {
            if(container.settings.nav===true) {
                $nav = $('<nav class="' + (container.settings.nav_wrapper_cls.replace('.','')) + ' minimal"></nav>');
                $nav_ul = $('<' + container.settings.nav_type + ' class="' + (container.settings.nav_cls.replace('.','')) + ' minimal">');
                $nav.append($nav_ul);
                $('body').append($nav);
                var width = 0;
                $items.each(function(ix){
                    var item = $(this).data('parallax_item'),
                        title = item.title,
                        $nitem = $('<' + container.settings.nav_item_type + ' class="' + (container.settings.nav_item_cls.replace('.','')) + ' minimal">');
                    $nitem.append('<a href="javascript:void(0);">' + title + '</a>');
                    $nav_ul.append($nitem);
                    var $temp = $('<div style="visibility:none;opacity:0;display:inline-block;">' + title + '</div>');
                    $element.before($temp);
                    var tw = title.length * 8.2;
                    width += ( tw <= 100 ? 100 : Math.round( tw ) );
                    $temp.remove();
                    item.getElement().addClass('with-nav');
                    $nitem.click(function(){
                        container.scrollTo(ix,true);
                    });
                });
                $element.addClass('with-nav');
                $nav_ul.css({'width':(width + 18) +'px'});
                $nav_pull = $('<a href="javascript:void(0);" id="pull" class="pull">Menu</a>');
                $nav_ul.after($nav_pull);

                $nav_pull.click(function(e){
                    e.preventDefault();
                    container.navPullClick();
                });

                $nav.append($('<div class="clear"></div>'));

                var cnt = $items.length,
                    height = parseInt( (cnt + 1) / 2) * 36;
                $nav.css({'height':height+'px'});
                $nav_ul.css({'height':height+'px'});

                $nav.css($.fn.ParallaxTranslateProperties({top:-height,left:0}));
            }
            container.incLoader();
        };

        container.scrollTo = function(ix,menu,full) {
            menu = menu === true;
            full = full === true;
            var $item = container.getItem(ix);
            if($item !== undefined && $item !== null) {
                var top = $item.markers.paused.start,
                    dist = Math.abs( top - $window.scrollTop()),
                    dur = Math.round(dist/5);
                if(full === true) {
                    dur *= 5;
                }
                $('html,body').animate({'scrollTop':top},dur);
                if(menu) {
                    if(container.settings.nav === true) {
                        container.navPullClick();
                    }
                }
            }
        };

        container.navPullClick = function() {
            if(container.settings.nav === true) {
                if($nav_pull.is(':visible')) {
                    if($nav.hasClass('minimal')) {
                        var nav_height = $nav.data('slidetop') || 0,
                            height = $nav.height();
                        if($nav.data('slidetop') >= -2 ) {
                            $nav.css($.extend({}, $.fn.ParallaxTranslateProperties({'top':-height,left:0})));
                            $nav.data('slidetop',-height);
                        } else {
                            $nav.css($.extend({}, $.fn.ParallaxTranslateProperties({'top':0,left:0})));
                            $nav.data('slidetop',0);
                        }
                    }
                }
            }
        };

        container.initScrollTo = function() {
            var $links = $element.find(container.settings.scrollto_cls);
            $links.each(function(ix){
                var href = $(this).attr('href'),
                    index = container.getItemIndexById(href),
                    data = $(this).data(),
                    full = data.parallaxFull || true,
                    full = full === true || full == 'true' || full == '1' || full == 1,
                    item = container.getItem(index);
                if( undefined !== item && item !== null) {
                    $(this).attr('title', 'Click to go to ' + item.title + ' page' );
                    $(this).unbind('click');
                    $(this).click(function(e){
                        e.preventDefault();
                        container.scrollTo(index,false,full);
                    });
                }
            });
            container.initPlayLinks();
        };

        container.initPlayLinks = function() {
            var $links = $element.find(container.settings.play_cls);

            $links.each(function(ix){
                var $item = $(this).parents(container.settings.item_type + container.settings.item_cls),
                    item = $item.data('parallax_item'),
                    data = $(this).data(),
                    speed = data.parallaxSpeed || 1,
                    speed = parseFloat( speed );

                if( undefined !== item && item !== null) {
                    $(this).attr('title', 'Click to play ' + item.title + ' frame' );
                    $(this).unbind('click');
                    $(this).click(function(e){
                        e.preventDefault();
                        var scrTop = $window.scrollTop(),
                            start = item.markers.paused.start,
                            top = item.markers.out.start - 1,
                            dur = Math.abs( Math.round( speed * (top - start) ) );

                        window.scrollTo(0,start);
                        setTimeout(function(){$('html,body').animate({'scrollTop':top},dur);},500);
                    });
                }
            });
        };

        container.getItemIndexById = function(id) {
            id = id.replace('.','').replace('#','');
            var index = null;
            $items.each(function(ix){
                if($(this).attr('id') == id) {
                    index = ix;
                }
            });
            return index;
        };

        container.init = function() {
            container.settings = $.extend({},defaults,options);
            container.settings.scrollRatio = parseFloat( container.settings.scrollRatio );
            $items = $element.find(container.settings.item_type + container.settings.item_cls);

            $element.on('loaderComplete', function() { container.onLoaderComplete(); } );
            $element.on('loaded', function() { container.onLoaded(); } );
            $element.on('itemInitComplete', function() { container.onItemInitComplete() });

            container.initLoader();
            container.initItems();
            container.initNav();
            container.initScrollTo();

            $window.scroll(
                function() { container.onScroll(); }
            ).resize(
                function() { container.onResize(); }
            );

            setTimeout(function(){container.initSize();container.onScroll();},750);
        };

        container.onLoaded = function() {
            container.initScroller();
            $('html, body').animate({scrollTop:1}, 10, 'swing', function(){
                window.scrollTo(0,0);
                if(typeof container.settings.onLoaded  == 'function') {
                    container.settings.onLoaded();
                }
            });
        };

        container.onItemInitComplete = function() {
            if(container.settings.loader === false) {
                $element.trigger( 'loaded' );
            }
            if( typeof container.settings.onItemsInitComplete == 'function' ) {
                container.settings.onItemsInitComplete();
            }
        };

        container.onLoaderComplete = function() {
            if(container.settings.loader === true ) {
                container.completeLoader();
            }
        };

        container.initScroller = function() {
            var lastIdx = $items.length - 1,
                item = $items.eq(lastIdx).data('parallax_item');

            window.scrollTo(0,0);

            if( typeof container.settings.onScrollerInit == 'function' ) {
                container.settings.onScrollerInit();
            }

            window.scrollTo(0,0);

            if( item !== null && item !== undefined ) {
                $scroller = $('<div class="' + ( container.settings.scroller_cls.replace('.','') ) + '"></div>');
                $scroller.css('height',item.markers.complete.start + 2000 + 'px');
                $element.before($scroller);
            }

            if( typeof container.settings.onScrollerComplete == 'function' ) {
                container.settings.onScrollerComplete();
            }
            window.scrollTo(0,0);
        };

        container.incLoader = function() {
            if( container.settings.loader === true ) {
                loaderStep++;
                var perc = loaderStep / loaderSteps,
                    perc = Math.round( perc * 100 ),
                    perc = perc <= 0 ? 0 : ( perc >= 100 ? 100 : perc );

                if( perc >= 100 ) {
                    $loaderContent.css('height','100%');
                    $loaderPercent.html( '100%' );
                    $element.trigger( 'loaderComplete' );
                } else {
                    $loaderContent.css('height',perc+'%');
                    $loaderPercent.html( perc + '%' );
                    loaded = false;
                }
            }
        };

        container.completeLoader = function() {
            setTimeout(function(){
                loaded = true;
                var wh = $window.height(),
                    top = 0;

                function moveLoader(top) {
                    if( top <= wh ) {
                        top += 10;
                        var perc = 1 - parseFloat( top / wh );
                        $loader.css($.extend({opacity:perc},$.fn.ParallaxTranslateProperties({top:-top,left:0})));
                        setTimeout(function(){moveLoader(top);},10);
                    } else {
                        $loader.detach();
                        $element.trigger( 'loaded' );
                    }
                }

                moveLoader(0);
            },1000);
        };

        container.initLoader = function() {
            if(container.settings.loader === true) {

                if( typeof container.settings.onLoaderInit == 'function' ) {
                    container.settings.onLoaderInit();
                }

                $loader = $('<div class="' + ( container.settings.loader_cls.replace('.','') ) + '"></div>'),
                $loaderContent = $('<div class="' + ( container.settings.loader_content_cls.replace('.','') ) + '"></div>'),
                $loaderPercent = $('<div class="' + ( container.settings.loader_percent_cls.replace('.','') ) + '">0%</div>');

                $loader.append( $loaderContent );
                $loaderContent.append( $loaderPercent );
                $('body').append( $loader );

                loaderSteps = ( $items.length * 2 ) + 1;
                loaderStep = 0;

                $loaderPercent.html( '0%' );
            } else {
                loaded = true;
                $element.trigger('loaderComplete');
            }
        };

        container.initSize = function() {};

        container.initItems = function() {
            $items.each(function(ix){
                if(undefined === $(this).data('parallax_item')) {
                    var item = new $.ParallaxItem(container,$(this),$.extend({},options.item_options || {},{order:ix}));
                    $(this).data('parallax_item',item);
                    container.incLoader();
                    item.preload();
                    container.incLoader();
                }
            });
            $element.trigger('itemInitComplete');
        };

        container.onScroll = function() {
            var scrTop = $window.scrollTop();
            lastScrDir = ( scrTop - lastScrTop ) < 0 ? 'reverse' : 'forward';

            $items.each(function(){
                if(undefined !== $(this).data('parallax_item')) {
                    $(this).data('parallax_item').onScroll(scrTop);
                }
            });

            lastScrTop = scrTop;

            if( typeof container.settings.onScroll == 'function' ) {
                container.settings.onScroll(container);
            }
        };

        container.onResize = function() {
            container.initSize();
            $items.each(function(ix){
                if(undefined !== $(this).data('parallax_item')) {
                    $(this).data('parallax_item').onResize();
                }
            });
            if( typeof container.settings.onResize == 'function' ) {
                container.settings.onResize(container);
            }
        };

        container.getLastItemIndex = function() {
            return $items.length - 1;
        };

        container.getItem = function(ix) {
            var li = container.getLastItemIndex;
            if(ix < 0 || ix > li) return null;
            var $item = $items.eq(ix);
            if( $item !== null && $item !== undefined) {
                var item = $item.data('parallax_item');
                return item !== undefined ? item : null;
            }
            return null;
        };

        container.init();

    };

    $.ParallaxItem = function(container, element, options) {
        var item = this,
            defaults = {
                sprite_cls: '.parallax-sprite',
                title_cls: '.parallax-item-title',
                content_cls: '.parallax-item-content',
                background_cls: '.parallax-item-bg',
                waiting_z_index: 0,
                in_z_index: 1500,
                paused_z_index: 2000,
                out_z_index: 1000,
                complete_z_index: 0,
                debug: false,
                ajax: false,
                ajaxThreshold: 2000,
                ajaxLoaded: false,
                ajaxMarker: 0,
                ajaxUrl: null,
                onInit: null,
                onInitComplete: null,
                onScroll: null,
                onResize: null,
                onInStart: null,
                onInEnd: null,
                onPauseStart: null,
                onPauseEnd: null,
                onOutStart: null,
                onOutEnd: null,
                onCompleteStart: null,
                onDetach: null,
                onAttach: null
            },
            element = element,
            $element = $(element),
            $sprites = [];

        item.container = null;
        item.$container = null;
        item.settings = {};
        item.order = 0;
        item.detached = false;
        item.state = 'WAITING';
        item.data = $element.data();
        item.title = null;
        item.$background = null;
        item.markers = null;
        item.first = false;
        item.last = false;
        item.ajaxLoaded = false;

        item.getElement = function() { return $element; };
        item.log = function( msg ) { if(item.settings.debug) console.log(msg); };
        function log(msg) { item.log( msg ); };

        item.init = function(fromAjax) {
            fromAjax = fromAjax || false;
            fromAjax = fromAjax === true;

            if(fromAjax) {
                item.ajaxLoaded = true;
            }

            item.settings = $.extend({},defaults,options);
            item.order = item.settings.order || 0;
            item.container = container;
            item.$container = item.container.getElement();
            item.data = $element.data();
            $sprites = $element.find(item.settings.sprite_cls);
            console.log($sprites);
            item.detached = false;
            log( 'Initializing item: ' + $element.attr( 'id' ) );

            if( typeof item.settings.onInit == 'function' ) {
                item.settings.onInit(item);
            }

            item.title = $element.find(item.settings.title_cls).html().replace('_',' ').replace('-',' ');

            item.first = item.order == 0;
            item.last  = item.order == item.container.getLastItemIndex();
            item.data.defaults = {
                type: 'slide',
                inDirection: 'bottom',
                inDuration: 2000,
                pauseDuratio: 1000,
                outDirection: 'top',
                outDuration: 1000
            };

            item.initDataSettings();
            item.initBackground();
            item.initMarkers();
            item.initPreviousItem();
            item.initSprites();

            if( !item.ajaxLoaded ) {
                item.initAjax();
            }

            if( item.order > 0 ) {
                item.detach();
            }

            log( item.data.parallax );
            log( item.markers );

            log( 'Completed item initialization' );
            log( ' ' );

            item.checkSize();

            if( typeof item.settings.onInitComplete == 'function' ) {
                item.settings.onInitComplete(item);
            }
        };

        item.preload = function() {
            $element.find('img').each(function(){
                var img = new Image();
                img.src = $(this).attr('src');
            });

            $sprites.each(function(){
                $(this).data('parallax_sprite').preload();
            });
        };

        item.checkSize = function() {
            if(item.$background !== undefined && item.$background !== null && item.$background.length) {
                if( item.$background.width() === undefined || item.$background.width() === null || item.$background.width() == 0 ) {
                    var $img = item.$background;
                    $("<img/>") // Make in memory copy of image to avoid css issues
                        .attr("src", $img.attr("src"))
                        .load(function() {
                            var width = this.width,
                                height = this.height,
                                hr = height / width,
                                wr = width / height,
                                data = item.$background.data();

                            log( 'Background Original Width: ' + width );
                            log( 'Background Original Height: ' + height );
                            item.$background.width( width + 'px' );
                            item.$background.height( height + 'px' );
                            data.width = width;
                            data.height = height;
                            data.wr = wr;
                            data.hr = hr;

                            item.checkSize();
                        });
                } else {
                    /* lets check to see if the background image properly fits within the window */
                    var ww = $window.width(),
                        wh = $window.height(),
                        height = Math.round( ww * item.$background.data('hr'));

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

        item.initSprites = function() {
            $sprites.each(function(ix){
                if(undefined === $(this).data('parallax_sprite')) {
                    var sprite = new $.ParallaxSprite(item,$(this), $.extend({},{order:ix},options.sprite_options||{}));
                    $(this).data('parallax_sprite',sprite);
                }
            });
        };

        item.initPreviousItem = function() {
            /* the previous items out animation MUST match the current animation */
            /* both direction and duration */
            /* we will ensure the out is opposite the in, and at least 100 longer than the in */
            var previous = item.getPreviousItem();
            if(previous !== null && previous !== undefined) {
                var in_direction = item.data.parallax.inDirection,
                    out_direction = 'top',
                    in_duration = item.data.parallax.inDuration,
                    out_duration = in_duration * 2,
                    reInit = false;

                switch(in_direction) {
                    case 'top': out_direction = 'bottom'; break;
                    case 'bottom': out_direction = 'top'; break;
                    case 'left': out_direction = 'right'; break;
                    case 'right': out_direction = 'left'; break;
                }

                if( item.data.parallax.inType == 'fade' ) {
                    log( 'CURRENT FADE' );
                    /* not much to do here, because directions do not matter with fades */
                    log( 'Changed ' + previous.getElement().attr('id') + ' out type from ' + previous.data.parallax.outType + ' to fade' );
                    previous.data.parallax.outType = 'fade';
                    reInit = false;
                } else {
                    log( 'CURRENT: ' + item.data.parallax.inType );
                    /* check the directionn */
                    if( previous.data.parallax.outDirection != out_direction ) {
                        reInt = true;
                        log( 'Changed ' + previous.getElement().attr('id') + ' out dir from ' + previous.data.parallax.outDirection + ' to ' + out_direction );
                        previous.data.parallax.outDirection = out_direction;
                    }

                    if( previous.data.parallax.outDuration <= out_duration ) {
                        reInit = true;
                        log( 'Changed ' + previous.getElement().attr('id') + ' out dur from ' + previous.data.parallax.outDuration + ' to ' + out_duration );
                        previous.data.parallax.outDuration = out_duration;
                    }

                    if( previous.data.parallax.outType != 'slide' ) {
                        log( 'Changed ' + previous.getElement().attr('id') + ' out type from ' + previous.data.parallax.outType + ' to slide' );
                        previous.data.parallax.outType = 'slide';
                    }
                }

                if(reInit === true) {
                    previous.initMarkers();
                    item.initMarkers();
                }
            }
        };

        item.initMarkers = function() {
            /* the markers are for determining the transition states for the scrollTop */
            var markers = {
                waiting: {start:0,end:0},
                'in': {start:0,end:0},
                paused: {start:0,end:0},
                out: {start:0,end:0},
                complete: {start:0}
                },
                p = item.getPreviousItem(),
                offset = p !== null ? p.markers.out.start : 0;

            markers.waiting.end = offset - 1;
            markers['in'].start = markers.waiting.end;
            markers['in'].end = markers['in'].start + parseInt( item.data.parallax.inDuration ) - 1;

            if(item.first) {
                markers['in'].start = markers['in'].end = markers.waiting.end = -1;
            }

            markers.paused.start = markers['in'].end + 1;
            markers.paused.end = markers.paused.start + parseInt( item.data.parallax.pauseDuration - 1 );
            markers.out.start = markers.paused.end + 1;
            markers.out.end = markers.out.start + parseInt( item.data.parallax.outDuration ) - 1;
            markers.complete.start = markers.out.end + 1;

            if(item.last === true) {
                markers.out.start = markers.paused.end;
                markers.out.end = markers.out.start;
                markers.complete.start = markers.out.end;
            }

            item.markers = markers;
        };

        item.initDataSettings = function() {
            item.initHtml5Settings();
            item.initJsSettings();

            if( item.data.parallax.type == 'fade' ) {
                item.data.parallax.inType = 'fade';
                item.data.parallax.outType = 'fade';
            } else {
                item.data.parallax.inType = 'slide';
                item.data.parallax.outType = 'slide';
            }

            /* we can apply the css now */
            $element.css(item.data.parallax.css || {});
        };

        item.initHtml5Settings = function() {
            /* option1 is to pull the full parallax options */
            item.data.parallax = item.data.parallax || {};
            log( item.data.parallax );
            item.data.parallax.type = item.data.parallax.type || 'slide';
            item.data.parallax.inDirection = item.data.parallax.inDirection || 'bottom';
            item.data.parallax.outDirection = item.data.parallax.outDirection || 'top';
            item.data.parallax.inDuration = parseInt( item.data.parallax.inDuration || 1000 );
            item.data.parallax.outDuration = parseInt( item.data.parallax.outDuration || 1000 );
            item.data.parallax.pauseDuration = parseInt( item.data.parallax.pauseDuration || 2000 );
            item.data.parallax.ajax = item.data.parallax.ajax || false;
            item.data.parallax.ajaxThreshold = item.data.parallax.ajaxThreshold || 2000;
            item.data.parallax.ajaxUrl = item.data.parallax.ajaxUrl || null;
            item.data.parallax.css = item.data.parallax.css || {};

            /* option2 is to pull each individual options */
            /* Individual options override the group parallax options */
            item.data.parallax.type = item.data.parallaxType || item.data.parallax.type;
            item.data.parallax.inDuration = item.data.parallaxInDuration || item.data.parallax.inDuration;
            item.data.parallax.inDirection = item.data.parallaxInDirection || item.data.parallax.inDirection;
            item.data.parallax.outDuration = item.data.parallaxOutDuration || item.data.parallax.outDuration;
            item.data.parallax.outDirection = item.data.parallaxOutDirection || item.data.parallax.outDirection;
            item.data.parallax.pauseDuration = item.data.parallaxPauseDuration || item.data.parallax.pauseDuration;
            item.data.parallax.ajax = item.data.parallaxAjax  || item.data.parallax.ajax;
            item.data.parallax.ajaxThreshold = item.data.parallaxAjaxThreshold || item.data.parallax.ajaxThreshold;
            item.data.parallax.ajaxUrl = item.data.parallaxAjaxUrl || item.data.parallax.ajaxUrl;
            item.data.parallax.css = item.data.parallaxCss || item.data.parallax.css;

            item.data.parallax.ajax = item.data.parallax.ajax === true || item.data.parallax.ajax == 'true' || item.data.parallax.ajax == 1 || item.data.parallax.ajax == '1';

            log( item.data.parallax );

            /* remove the optiosn from the data */
            delete item.data.parallaxType;
            delete item.data.parallaxInDirection;
            delete item.data.parallaxInDuration;
            delete item.data.parallaxOutDirection;
            delete item.data.parallaxOutDuration;
            delete item.data.parallaxPauseDuration;
            delete item.data.parallaxAjax;
            delete item.data.parallaxAjaxUrl;
            delete item.data.parallaxAjaxThreshold;

            item.settings.ajax = item.data.parallax.ajax;
            item.settings.ajaxThreshold = item.data.parallax.ajaxThreshold;
            item.settings.ajaxUrl = item.data.parallax.ajaxUrl;
        };

        item.initJsSettings = function() {
            /* if there are settings in the options for the items, these will override any HTML5 options */
            /* if there are settings in the options for the items, these will override any HTML5 options */
            var id = $element.attr('id'),
                options = item.settings.items || {},
                data = options[ id ] || {};

            item.data.parallax.type = data.type || item.data.parallax.type;
            item.data.parallax.inDirection = data.inDirection || item.data.parallax.inDirection;
            item.data.parallax.inDuration = data.inDuration || item.data.parallax.inDuration;
            item.data.parallax.outDirection = data.outDirection || item.data.parallax.outDirection;
            item.data.parallax.outDuration = data.outDuration || item.data.parallax.outDuration;
            item.data.parallax.pauseDuration = data.pauseDuration || item.data.parallax.pauseDuration;
            item.data.parallax.css = data.css || item.data.parallax.css;
            item.data.parallax.ajax = data.ajax || item.data.parallax.ajax;
            item.data.parallax.ajaxThreshold = data.ajaxThreshold || item.data.parallax.ajaxThreshold;
            item.data.parallax.ajaxUrl = data.ajaxUrl || item.data.parallax.ajaxUrl;
        };

        item.initBackground = function() {
            item.$background = $element.find(item.settings.background_cls);
            if(item.$background !== undefined) {
                var src = item.$background.attr('src');
                log( 'Found background: ' + src );
                $element.css(
                    {
                        'background-image': 'url(' + src + ')',
                        'background-repeat': 'no-repeat',
                        'background-position': 'center center'
                    }
                );
                item.$background.detach();
            }
        };

        item.initAjax = function() {
            if(item.settings.ajax === true) {
                var threshold = parseInt( item.settings.ajaxThreshold),
                    ajaxMarker = item.markers['in'].start - threshold;
                threshold = threshold <= 0 ? 0 : threshold;
                item.settings.ajaxMarker = ajaxMarker;
                log( 'Ajax threshold = ' + item.settings.ajaxThreshold );
                log( 'Ajax Marker = ' + item.settings.ajaxMarker );

                if(item.settings.ajaxUrl === undefined || item.settings.ajaxUrl === null || item.settings.ajaxUrl.length <= 1) {
                    /* we cannot have ajax without an ajax url */
                    item.settings.ajax = false;
                    item.settings.ajaxLoaded = false;
                } else {
                    item.onScrollAjax();
                }
            }
        };

        item.detach = function() {
            if( !item.detached ) {
                log( 'DETACHING: ' + $element.attr( 'id' ) );
                $element.detach();
                item.detached = true;
                if( typeof item.settings.onDetach == 'function' ) {
                    item.settings.onDetach(item);
                }
            }
        };

        item.attach = function() {
            if( item.detached ) {
                log( 'ATTACHING: ' + $element.attr( 'id' ) );
                item.$container.append( $element );
                item.detached = false;
                container.initScrollTo();
                if( typeof item.settings.onAttach == 'function' ) {
                    item.settings.onAttach(item.getElement().attr('id'),item.getElement(),item);
                }
            }
        };

        item.onScroll = function(scrTop) {
            item.onScrollAjax(scrTop);
            item.determineState(scrTop);
            item.moveToState(scrTop);

            $sprites.each(function(ix){
                log( 'SPRITE SCROLL ' + ix );
                if(undefined !== $(this).data('parallax_sprite')) {
                    $(this).data('parallax_sprite').onScroll(scrTop);
                }
            });

            if( typeof item.settings.onScroll == 'function' ) {
                item.settings.onScroll(item);
            }
        };

        item.onScrollAjax = function(scrTop) {
            scrTop = scrTop || $window.scrollTop();
            if(item.settings.ajax === true) {
                if(item.settings.ajaxLoaded === false) {
                    if(scrTop >= item.settings.ajaxMarker) {
                        $.ajax({
                            url: item.settings.ajaxUrl,
                            success: function(res) {
                                $element.find(item.settings.content_cls).html(res);
                                setTimeout(function(){
                                    $sprites = $element.find( item.settings.sprite_cls );
                                    item.initSprites();
                                    container.initScrollTo();
                                },500);
                                item.settings.ajaxLoaded = true;
                                item.ajaxLoaded = true;
                            }
                        });
                    }
                }
            };
        };

        item.onResize = function() {
            /* items are self adjusting */
            item.onScroll($window.scrollTop());
            item.checkSize();

            if( typeof item.settings.onResize == 'function' ) {
                item.settings.onResize(item);
            }
        };

        item.addStateClass = function() {
            $element.removeClass('waiting');
            $element.removeClass('in');
            $element.removeClass('paused');
            $element.removeClass('out');
            $element.removeClass('complete');
            $element.addClass(item.state.toLowerCase());
        };

        item.determineState = function(scrTop) {
            scrTop = scrTop || $window.scrollTop();
            if(scrTop >= item.markers.waiting.start && scrTop <= item.markers.waiting.end) {
                if(item.state == 'IN') {
                    if( typeof item.settings.onInEnd == 'function' ) {
                        item.settings.onInEnd(item);
                    }
                }
                item.state = 'WAITING';
            } else if(scrTop >= item.markers['in'].start && scrTop <= item.markers['in'].end) {
                if(item.state != 'IN' ) {
                    if( typeof item.settings.onInStart == 'function' ) {
                        item.settings.onInStart(item);
                    }
                }
                item.state = 'IN';
            } else if(scrTop >= item.markers.paused.start && scrTop <= item.markers.paused.end) {
                if(item.state == 'IN' ) {
                    if( typeof item.settings.onInEnd == 'function' ) {
                        item.settings.onInEnd(item);
                    }
                    if( typeof item.settings.onPauseStart == 'function' ) {
                        item.settings.onPauseStart(item);
                    }
                } else if( item.state == 'OUT' ) {
                    if( typeof item.settings.onOutEnd == 'function' ) {
                        item.settings.onOutEnd(item);
                    }
                    if( typeof item.settings.onPauseStart == 'function' ) {
                        item.settings.onPauseStart(item);
                    }
                }
                item.state = 'PAUSED';
            } else if(scrTop >= item.markers.out.start && scrTop <= item.markers.out.end) {
                if(item.state == 'PAUSED' ) {
                    if( typeof item.settings.onPauseEnd == 'function' ) {
                        item.settings.onPauseEnd(item);
                    }
                    if( typeof item.settings.onOutStart == 'function' ) {
                        item.settings.onOutStart(item);
                    }
                } else if(item.state == 'COMPLETE') {
                    if( typeof item.settings.onOutStart == 'function' ) {
                        item.settings.onOutStart(item);
                    }
                }
                item.state = 'OUT';
            } else if(scrTop >= item.markers.complete.start) {
                if( item.state != 'COMPLETE') {
                    if( typeof item.settings.onOutEnd == 'function' ) {
                        item.settings.onOutEnd(item);
                    }
                    if( typeof item.settings.onCompleteStart == 'function' ) {
                        item.settings.onCompleteStart(item);
                    }
                }
                item.state = 'COMPLETE';
            } else {
                item.state = 'UNKNOWN';
            }

            if(item.first) {
                if(item.state == 'WAITING' || item.state == 'IN' || item.state == 'UNKNWON') {
                    /* the first item cannot have a waiting or in state */
                    item.state = 'PAUSED';
                }
            }

            if(item.last) {
                if(item.state == 'COMPLETE' || item.state == 'UNKNOWN' || item.state == 'OUT' ) {
                    /* the last item cannot have an out or complete state */
                    item.state = 'PAUSED';
                }
            }

            item.addStateClass();
        };

        item.moveToState = function(scrTop) {
            scrTop = scrTop || $window.scrollTop();
            switch(item.state) {
                case 'WAITING': item.moveToWaiting(); break;
                case 'IN': item.moveToIn(scrTop); break;
                case 'PAUSED': item.moveToPaused(); break;
                case 'OUT': item.moveToOut(); break;
                case 'COMPLETE': item.moveToComplete(); break;
            }
        };

        item.moveToWaiting = function() {
            $element.css($.extend({zIndex:item.settings.waiting_z_index},$.fn.ParallaxTranslateProperties({top:0,left:0})));
            item.detach();
        };

        item.moveToIn = function(scrTop) {
            item.attach();
            $element.css({zIndex:item.settings.in_z_index});

            scrTop = scrTop || $window.scrollTop();

            var ww = $window.width(),
                wh = $window.height(),
                scrOffset = scrTop - item.markers['in'].start,
                scrRange = item.markers['in'].end - item.markers['in'].start,
                scrPerc = parseFloat( scrOffset / scrRange),
                dir = item.data.parallax.inDirection || 'top',
                vertical = dir == 'top' || dir == 'bottom',
                horizontal = dir == 'left' || dir == 'right',
                type = item.data.parallax.inType;

            if( type == 'slide' ) {
                var top = 0, left = 0;
                if(vertical) {
                    top = Math.round( scrPerc * wh);
                    if(dir == 'bottom') {
                        top = wh - top;
                    } else {
                        top = -wh + top;
                    }
                } else if(horizontal) {
                    left = Math.round( scrPerc * ww);
                    if( dir == 'right' ) {
                        left = ww - left;
                    } else {
                        left = -ww + left;
                    }
                } else {
                    /* do nothing */
                }

                $element.css($.fn.ParallaxTranslateProperties({top:top,left:left}));
            } else if(type == 'fade') {
                $element.css(
                    $.extend({},{opacity:scrPerc},$.fn.ParallaxTranslateProperties({top:0,left:0}))
                );
            } else {
                /* do nothing */
            }
        };

        item.moveToPaused = function() {
            item.attach();
            var zi = item.last ? 5000 : item.settings.paused_z_index;
            $element.css($.extend({zIndex:zi},$.fn.ParallaxTranslateProperties({top:0,left:0})));
        };

        item.moveToOut = function(scrTop) {
            if( item.last ) {
                item.moveToPaused();
                return;
            }
            item.attach();
            $element.css({zIndex:item.settings.out_z_index});

            scrTop = scrTop || $window.scrollTop();

            var ww = $window.width(),
                wh = $window.height(),
                scrOffset = scrTop - item.markers.out.start,
                scrRange = item.markers.out.end - item.markers.out.start,
                scrPerc = parseFloat( scrOffset / scrRange),
                dir = item.data.parallax.outDirection || 'top',
                vertical = dir == 'top' || dir == 'bottom',
                horizontal = dir == 'left' || dir == 'right',
                type = item.data.parallax.outType;

            if( type == 'slide' ) {
                var top = 0, left = 0;
                if(vertical) {
                    top = Math.round( scrPerc * wh);
                    if(dir == 'bottom') {
                        top = top;
                    } else {
                        top = -top;
                    }
                } else if(horizontal) {
                    left = Math.round( scrPerc * ww);
                    if( dir == 'right' ) {
                        left = left;
                    } else {
                        left = -left;
                    }
                } else {
                    /* do nothing */
                }

                $element.css($.fn.ParallaxTranslateProperties({top:top,left:left}));
            } else if(type == 'fade') {
                $element.css(
                    $.extend({},{opacity:1},$.fn.ParallaxTranslateProperties({top:0,left:0}))
                );
            } else {
                /* do nothing */
            }
        };

        item.moveToComplete = function() {
            if( item.last ) {
                item.moveToPaused();
                return;
            }
            $element.css($.extend({zIndex:item.settings.complete_z_index},$.fn.ParallaxTranslateProperties({top:0,left:0})));
            item.detach();
        };

        item.hasPreviousItem = function() {
            var previous = item.getPreviousItem();
            return previous !== null && previous !== undefined;
        };

        item.getPreviousItem = function() {
            return container.getItem( item.order - 1 );
        };

        item.getNextItem = function() {
            return container.getItem( item.order + 1 );
        };

        item.hasNextItem = function() {
            var next = item.getNextItem();
            return next !== null && next !== undefined;
        };

        item.init();
    };

    $.ParallaxSprite = function(item, element, options) {
        var sprite = this,
            defaults = {
                debug: false,
                animated_cls: '.parallax-sprite-animated',
                default_offset_type: 'paused'
            },
            element = element,
            $element = $(element),
            animations = [];

        sprite.item = item;
        sprite.settings = {};
        sprite.order = 0;
        sprite.data = null;
        sprite.defaultStyle = null;
        sprite.type = 'normal';
        sprite.frames = [];
        sprite.hasRotations = false;

        sprite.getElement = function() { return $element; };
        sprite.log = function(msg) { if(sprite.settings.debug) console.log(msg); }
        function log(msg) { sprite.log(msg); }

        sprite.init = function() {
            sprite.settings = $.extend({},defaults,options);
            sprite.data = $element.data();
            sprite.defaultStyle = $element.attr('style');
            sprite.order = sprite.settings.order;
            sprite.initId();
            log( 'Initialize sprite ' + $element.attr('id') );

            sprite.type = sprite.data.parallaxType || 'normal';
            if($element.hasClass( sprite.settings.animated_cls.replace( '.', '' ) ) ) {
                sprite.type = 'animated';
                sprite.frames = sprite.data.parallaxFrames || [];
            }

            sprite.initDataSettings();
            sprite.initImages();

            sprite.onScroll();

            log( 'Complete init' );
            log( ' ' );
        };

        sprite.preload = function() {
            $.each(animations, function(ix,anim) {
                /* we only need to preload animations with frames */
                if(anim.start.frames !== undefined && anim.start.frames !== null) {
                    if( anim.start.frames.length > 0 ) {
                        var base = anim.start.animFolder || 'images/';
                        $.each(anim.start.frames, function(fix,frame){
                            var src = base + frame,
                                image = new Image();
                            image.src = src;
                        });
                    }
                }
            });
        };

        sprite.initImages = function() {
            return;
            var containerWidth = $element.width(),
                containerHeight = $element.height(),
                widthAnim = false,
                heightAnim = false;

            $.each(sprite.data.parallax,function(ix,anim){
                if( (anim.end.width - anim.start.width) != 0 ) {
                    widthAnim = true;
                }
                if( (anim.end.height - anim.start.height) != 0 ) {
                    heightAnim = true;
                }
            });

            if( widthAnim || heightAnim ) {

                $element.find('img').each(function(){

                    var $img = $(this);
                    $("<img/>") // Make in memory copy of image to avoid css issues
                        .attr("src", $img.attr("src"))
                        .load(function() {
                            var width = this.width,
                                height = this.height,
                                widthPercent = width / containerWidth * 100,
                                heightPercent = height / containerHeight * 100,
                                newWidth = Math.round( widthPercent * 100 ) / 100,
                                newHeight = Math.round( heightPercent * 100 ) / 100;

                            if( widthAnim)
                                $img.css({width: newWidth + '%'});
                            if( heightAnim)
                                $img.css({height: newHeight + '%'});
                        });

                });

            }
        };

        sprite.initId = function() {
            var id = $element.attr('id');
            if(id === undefined) {
                id = 'sprite_' + sprite.item.getElement().attr('id') + '_' + sprite.order;
                $element.attr('id',id);
            }
        };

        sprite.initDataSettings = function() {
            sprite.data.defaults = {
                offsetType: sprite.settings.default_offset_type,
                width: $element.width(),
                height: $element.height(),
                top: 0,
                left: 0,
                opacity: 1,
                rotation: 0
            };
            log( $element.attr( 'id' ) );
            sprite.initHtml5Settings();
            sprite.initJsSettings();
            sprite.initDataSettingsComplete();
        };

        sprite.initPresets = function( anim ) {};

        sprite.initDataSettingsComplete = function() {
            var waiting_offset = item.markers.waiting.end,
                in_offset = item.markers['in'].start,
                pause_offset = item.markers.paused.start,
                out_offset = item.markers.out.start,
                complete_offset = item.markers.complete.start;

            sprite.data.parallax = sprite.data.parallax || [];

            $.each(sprite.data.parallax,function(ix,anim){
                /* start */
                anim.start = anim.start || {};
                anim.start.offsetType = anim.start.offsetType || 'in';
                anim.start.offset = parseInt( anim.start.offset || 0 );
                if(anim.start.offsetType == 'in') {
                    anim.start.offset += parseInt( in_offset );
                } else if(anim.start.offsetType == 'pause' || anim.start.offsetType == 'paused') {
                    anim.start.offset += parseInt( pause_offset );
                } else if(anim.start.offsetType == 'out') {
                    anim.start.offset += parseInt( out_offset );
                } else if(anim.start.offsetType == 'complete' || anim.start.offsetType == 'completed') {
                    anim.start.offset += parseInt( complete_offset );
                }

                /* end */
                anim.end = anim.end || {};
                anim.end.offsetType = anim.end.offsetType || 'in';
                anim.end.offset = parseInt( anim.end.offset || 0 );
                if(anim.end.offsetType == 'in') {
                    anim.end.offset += parseInt( in_offset );
                } else if(anim.end.offsetType == 'pause' || anim.end.offsetType == 'paused') {
                    anim.end.offset += parseInt( pause_offset );
                } else if(anim.end.offsetType == 'out') {
                    anim.end.offset += parseInt( out_offset );
                } else if(anim.end.offsetType == 'complete' || anim.end.offsetType == 'completed') {
                    anim.end.offset += parseInt( complete_offset );
                }

                if( anim.end.rotation - anim.start.rotation != 0 ) {
                    sprite.hasRotations = true;
                    anim.hasRotations = true;
                }
            });
        };

        sprite.initHtml5Settings = function() {
            sprite.initHtml5SettingsWhole();
            sprite.initHtml5SettingsParts();
            sprite.initHtml5SettingsPieces();
        };

        sprite.initHtml5SettingsWhole = function() {
            sprite.data.parallax = sprite.data.parallax || [];
            log( 'Initial Parallax' );
            log( sprite.data.parallax );

            /* process the actual parallax data */
            if( sprite.data.parallax.length > 0 ) {
                $.each(sprite.data.parallax,function(ix,anim){
                    /* start */
                    log( anim.start );
                    anim.start = anim.start || {};
                    anim.start = $.extend({},sprite.data.defaults,anim.start);
                    anim.start.offsetType = anim.start.offsetType.toLowerCase().replace(' ', '');
                    anim.start.offsetType = anim.start.offsetType == 'waiting' ||
                        anim.start.offsetType == 'in' || anim.start.offsetType == 'pause' ||
                        anim.start.offsetType == 'out' || anim.start.offsetType == 'complete' ? anim.start.offsetType : 'in';
                    log( 'start' );
                    log( anim.start );

                    /* end */
                    anim.end = anim.end || {};
                    log( anim.end );
                    anim.end = $.extend({},sprite.data.defaults,anim.end);
                    anim.end.offsetType = anim.end.offsetType.toLowerCase().replace(' ', '');
                    anim.end.offsetType = anim.end.offsetType == 'waiting' ||
                        anim.end.offsetType == 'in' || anim.end.offsetType == 'pause' ||
                        anim.end.offsetType == 'out' || anim.end.offsetType == 'complete' ? anim.end.offsetType : 'in';

                    log( 'end' );
                    log( anim.end );

                    sprite.data.parallax[ix] = anim;
                });
            }

            sprite.type = sprite.data.parallaxType || 'normal';
        };

        sprite.initHtml5SettingsParts = function() {
            /* process the individual anim data */
            /* first lets match the # of anims in the parallax data */
            var len = animations.length;
            for(var i = 0; i < len; i++ ) {
                var key = 'parallax' + i,
                    skey = key + 'Start',
                    ekey = key + 'End';

                if(undefined != sprite.data[key]) {
                    sprite.data[key].start = sprite.data[key].start || {};
                    sprite.data[key].end = sprite.data[key].end || {};

                    var anim = sprite.data.parallax[i];
                    anim = anim || {};

                    anim.start = anim.start || {};
                    anim.start = $.extend({}, anim.start, sprite.data[key].start);

                    anim.end = anim.end || {};
                    anim.end = $.extend({}, anim.end, sprite.data[key].end);

                    sprite.data.parallax[i] = anim;
                }

                if(undefined != sprite.data[skey]) {
                    sprite.data[skey] = sprite.data[skey] || {};
                    var start = sprite.data.parallax[i].start;
                    start = start || {};
                    start = $.extend({},start,sprite.data[skey]);
                    sprite.data.parallax[i].start = start;
                }

                if(undefined != sprite.data[ekey]) {
                    sprite.data[ekey] = sprite.data[ekey] || {};
                    var end = sprite.data.parallax[i].end;
                    end = end || {};
                    end = $.extend({},end,sprite.data[ekey]);
                    sprite.data.parallax[i].end = end;
                }
            }

            /* are there any more? */
            for(var i = len; i >= len; i++) {
                var hasA = false,
                    hasB = false,
                    hasC = false,
                    key = 'parallax' + i,
                    skey = key + 'Start',
                    ekey = key + 'End';

                if(undefined !== sprite.data[key]) {
                    hasA = true;
                    sprite.data[key].start = sprite.data[key].start || {};
                    sprite.data[key].end = sprite.data[key].end || {};

                    var anim = sprite.data.parallax[i];
                    anim = anim || {};

                    anim.start = anim.start || {};
                    anim.start = $.extend({}, anim.start, sprite.data[key].start);

                    anim.end = anim.end || {};
                    anim.end = $.extend({}, anim.end, sprite.data[key].end);

                    sprite.data.parallax[i] = anim;
                }

                if(undefined !== sprite.data[skey]) {
                    hasB = true;
                    sprite.data[skey] = sprite.data[skey] || {};
                    var start = sprite.data.parallax[i].start;
                    start = start || {};
                    start = $.extend({},start,sprite.data[skey]);
                    sprite.data.parallax[i].start = start;
                }

                if( undefined !== sprite.data[ekey]) {
                    hasC = true;
                    sprite.data[ekey] = sprite.data[ekey] || {};
                    var end = sprite.data.parallax[i].end;
                    end = end || {};
                    end = $.extend({},end,sprite.data[ekey]);
                    sprite.data.parallax[i].end = end;
                }

                if( !hasA && !hasB && !hasC ) break;
            }
        };

        sprite.initHtml5SettingsPieces = function() {
            /* first we will try the ones already in teh animations */
            var len = sprite.data.parallax.length;
            for(var i = 0; i < len; i++) {
                var skey_base = 'parallax' + i + 'Start',
                    ekey_base = 'parallax' + i + 'End',
                    sarr = {},
                    earr = {},
                    items = ['OffsetStart','Offset','Top','Left','Opacity','Width','Height','Rotation'];

                $.each(items,function(idx,item){
                    var skey = skey_base + item,
                        ekey = ekey_base + item;

                    if(undefined !== sprite.data[skey]) {
                        sarr[item.toLowerCase()] = sprite.data[skey];
                    }

                    if(undefined !== sprite.data[ekey]) {
                        earr[item.toLowerCase()] = sprite.data[ekey];
                    }
                });

                sprite.data.parallax[i].start = $.extend({}, sprite.data.parallax[i].start, sarr );
                sprite.data.parallax[i].end = $.extend({}, sprite.data.parallax[i].end, earr );
            }

            var base = {offsetType: 'in', offset: 0, top: 0, left: 0, width: sprite.data.defaults.width, height: sprite.data.defaults.height, opacity: 1};

            /* are there any more? */
            for(var i = len; i >= len; i++) {
                var hasA = false,
                    hasB = false,
                    skey_base = 'parallax' + i + 'Start',
                    ekey_base = 'parallax' + i + 'End',
                    sarr = {},
                    earr = {},
                    items = ['OffsetStart','Offset','Top','Left','Opacity','Width','Height','Rotation'];

                $.each(items,function(idx,item){
                    var skey = skey_base + item,
                        ekey = ekey_base + item;

                    if(undefined !== sprite.data[skey]) {
                        hasA = true;
                        sarr[item.toLowerCase()] = sprite.data[skey];
                    }

                    if(undefined !== sprite.data[ekey]) {
                        hasB = true;
                        earr[item.toLowerCase()] = sprite.data[ekey];
                    }
                });

                if(!hasA && !hasB) {
                    break;
                } else {
                    sprite.data.parallax[i] = sprite.data.parallax[i] || {};
                    sprite.data.parallax[i].start = sprite.data.parallax[i].start || $.extend({},base);
                    sprite.data.parallax[i].end = sprite.data.parallax[i].end || $.extend({},base);
                    sprite.data.parallax[i].start = $.extend({}, sprite.data.parallax[i].start, sarr );
                    sprite.data.parallax[i].end = $.extend({}, sprite.data.parallax[i].end, earr );
                }
            }
        };

        sprite.initJsSettings = function() {
            /* now lets see if we have anything more to override from the js options */
            var anims = sprite.settings.sprites || [],
                anims = anims[$element.attr('id')] || [],
                len = anims.length;

            log( anims );

            var base = $.extend({},{offsetType: 'in',offset: 0,top: 0,left: 0,opacity: 1,rotation: 0},sprite.data.defaults);

            sprite.data.parallax = sprite.data.parallax || [];
            log( 'Base Parallax' );
            log( sprite.data.parallax );

            for(var i = 0; i < len; i++) {
                var anim = anims[i] || {};
                $.each(['start','end'],function(ix,key){
                    var animp = anim[key];
                    animp = animp || {};
                    log(key);
                    log(animp);
                    animp = $.extend({},base,animp);
                    anim[key] = animp;
                    log(animp);

                    if( key == 'start' ) {
                        if( animp.frames !== undefined ) {
                            /* do some more calculations on the frames to use */
                            animp.animFolder = animp.animFolder || null;
                            animp.animFolder = animp.frameFolder || 'images/';
                            log( animp );
                            log( 'FRAME FOLDER: ' + animp.animFolder );
                        }
                    }
                });

                sprite.data.parallax[i] = sprite.data.parallax[i] || {};
                sprite.data.parallax[i] = $.extend({},sprite.data.parallax[i],anim);
            }
            log( sprite.data.parallax );
        };

        sprite.onScroll = function(scrTop) {
            scrTop = scrTop || $window.scrollTop();
            var first = null, last = null, match = null;
            $.each(sprite.data.parallax,function(ix,anim){
                anim.start = $.extend({}, sprite.data.defaults, anim.start);
                anim.end = $.extend({}, sprite.data.defaults, anim.end);
                if( scrTop >= anim.start.offset && scrTop <= anim.end.offset ) {
                    sprite.moveToAnim(scrTop,anim);
                } else if( last !== null ) {
                    if( scrTop < anim.start.offset && scrTop > last.end.offset ) {
                        match = last;
                    }
                }
                if(first === null) first = anim;
                last = anim;
            });

            if( first !== null && last !== null ) {
                if(scrTop < first.start.offset) {
                    sprite.moveToAnim(scrTop,first,false,true);
                } else if(scrTop > last.end.offset) {
                    log( 'LAST' );
                    log( last );
                    sprite.moveToAnim(scrTop,last,true,false);
                }
            }

            if( match !== null ) {
                sprite.moveToAnim( scrTop, match );
            }
        };

        sprite.moveToAnim = function( scrTop, anim, last, first) {
            last = last === true || false;
            first = first === true || false;
            if( anim !== undefined ) {
                scrTop = scrTop || $window.scrollTop();
                var scrOffset = scrTop - anim.start.offset,
                    scrRange = anim.end.offset - anim.start.offset,
                    scrPerc = Math.round( parseFloat( scrOffset / scrRange) * 100 ) / 100,
                    scrPerc = scrPerc <= 0 ? 0 : ( scrPerc >= 1 ? 1 : scrPerc ),


                    leftEnd = anim.end.left + ' ',
                    leftStart = anim.start.left + ' ',
                    leftEnd = eval( leftEnd.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    leftStart = eval( leftStart.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    leftRange = leftEnd - leftStart,

                    topEnd = anim.end.top + ' ',
                    topStart = anim.start.top + ' ',
                    topEnd = eval( topEnd.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    topStart = eval( topStart.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    topRange = topEnd - topStart,

                    widthEnd = anim.end.width + ' ',
                    widthStart = anim.start.width + ' ',
                    widthEnd = eval( widthEnd.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    widthStart = eval( widthStart.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    widthRange = widthEnd - widthStart,

                    heightEnd = anim.end.height + ' ',
                    heightStart = anim.start.height + ' ',
                    heightEnd = eval( heightEnd.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    heightStart = eval( heightStart.replace( '{ww}', $window.width()).replace('{wh}', $window.height()).replace('{width}',$element.width())),
                    heightRange = heightEnd - heightStart,

                    opacityRange = anim.end.opacity - anim.start.opacity,
                    top = topStart + Math.round( scrPerc * topRange),
                    left = leftStart + Math.round( scrPerc * leftRange),
                    opacity = 1,

                    width = widthStart + Math.round( scrPerc * widthRange),
                    height = heightStart + Math.round( scrPerc * heightRange),

                    rotRange = anim.end.rotation - anim.start.rotation,
                    rotPerc = scrPerc + 0.1,
                    rotPerc = rotPerc <= 0 ? 0 : ( rotPerc >= 1 ? 1 : rotPerc ),
                    rot = anim.start.rotation + Math.round( rotPerc * rotRange),

                    frames = anim.start.frames || [];

                log( 'TOP' );
                log( 'TOP RANGE: ' + topRange + ':' + top );

                if( last || first ) {
                    log( 'THIS IS THE LAST FOR: ' + $element.attr('id') );
                    rot = anim.end.rotation;
                    if( first ) {
                        log( 'THIS IS THE FIRST FOR: ' + $element.attr( 'id' ) );
                        rot = anim.start.rotation;
                    }
                }

                if( frames.length > 0 ) {
                    sprite.onScrollAnimation(scrTop,anim);
                    return;
                }

                var props = {
                    opacity: opacity,
                    width: width + 'px',
                    height: height + 'px'
                };

                if( opacityRange != 0 ) {
                    if( opacityRange < 0 ) {
                        /* fading out */
                        props.opacity = 1 - scrPerc;
                    } else {
                        /* fading in */
                        props.opacity = scrPerc;
                    }
                }

                props = $.extend({}, props, $.fn.ParallaxTranslateProperties({top:top,left:left}));

                if( sprite.hasRotations && anim.hasRotations ) {
                    if( rot != 0 && !isNaN(rot) ) {
                        props = $.extend({}, props, $.fn.ParallaxRotationProperties(rot,props));
                    } else {
                        props = $.extend({}, props, $.fn.ParallaxRotationProperties(0,props));
                    }
                }

                if( topRange == 0 ) {
                    delete props.top;
                }
                if( leftRange == 0 ) {
                    delete props.left;
                }
                if( heightRange == 0 ) {
                    delete props.height;
                }
                if( widthRange == 0 ) {
                    delete props.width;
                }

                $element.css(props);

                if( last ) log( props );
            }
        };

        sprite.onScrollAnimation = function( scrTop, anim ) {
            var scrOffset = scrTop - anim.start.offset,
                scrRange = anim.end.offset - anim.start.offset,
                scrPerc = Math.round( parseFloat( scrOffset / scrRange) * 100 ) / 100,
                scrPerc = scrPerc <= 0 ? 0 : ( scrPerc >= 1 ? 1 : scrPerc ),
                frames = anim.start.frames || [],
                animFolder = anim.start.animFolder,
                animFolder = animFolder || anim.start.frameFolder,
                animFolder = animFolder || 'images/';

            log( 'Sprite Animation' );
            log( 'Sprite Animation' );
            log( anim );
            log( frames.length );
            log( frames );

            var frameIndex = Math.round( scrPerc * ( frames.length - 1) ),
                frame = frames[ frameIndex ];
            log( frameIndex );
            log( animFolder + frame );

            /* the element must be completely visible */
            $element.css( 'opacity', 1 );

            var baseId = $element.attr( 'id' ) + '_frame_';
            for( var i = 0; i < frames.length; i++ ) {
                var iid = baseId + i,
                    img = $element.find('#' + iid);

                if(img.length == 0 || img === undefined || img === null ) {
                    img = $('<img />');
                    img.attr('id', iid);
                    img.attr( 'src', animFolder + frames[i] );
                    img.css({position:'absolute',top:0,left:0});
                    $element.append( img );
                }

                if( i <= frameIndex ) {
                    img.show();
                } else {
                    img.hide();
                }
            }

        };

        sprite.onResize = function() {

        };

        sprite.init();
    };

    $.fn.ParallaxTranslateProperties = function( props ) {
        if( props.top!=null || props.left!=null ){
            if( webkitCSS ){
                props.webkitTransform = 'translate3d(' + ( props.left || 0 ) + 'px, ' + ( props.top || 0 ) + 'px, 0)';

                if( null != props.top  ){ props.top  = 0; }
                if( null != props.left ){ props.left = 0; }
            }

            if( mozCSS || msCSS ){
                props[ mozCSS ? 'MozTransform' : 'msTransform' ] = ( props.top ? 'translateY(' + props.top + 'px)' : '' ) + ( props.left ? 'translateX(' + props.left + 'px)' : '' );

                if( null != props.top  ){ props.top  = 0; }
                if( null != props.left ){ props.left = 0; }
            }
        }

        return props;
    };

    $.fn.ParallaxRotationProperties = function(deg,props) {
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
        return $(this).each(function(){
            if(undefined == $(this).data('parallax')) {
                var p = new $.Parallax($(this),options);
                $(this).data('parallax',p);
            }
        });
    };
})(jQuery,window,document,undefined);