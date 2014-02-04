(function($){
    var $window = $(window);
    $.fn.parallax = function(options) {
        return this.each(function(){
            var $section = {
                name: 'Parallax Section',
                version: '0.0.1',
                $this: $(this),
                $window: $(window),
                IE: navigator.userAgent.match(/msie/i),
                isTouch: document.createTouch !== undefined,
                isQuery: function(obj) {return obj && obj.hasOwnProperty && obj instanceof $;},
                isString: function(str) {return str && $.type(str) === "string";},
                isPercentage: function(str) {return this.isString(str) && str.indexOf('%') > 0;},
                isScrollable: function(el) {return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));},
                getScalar: function(orig, dim) {var value = parseInt(orig, 10) || 0;if (dim && this.isPercentage(orig)) {value = this.getViewport()[ dim ] / 100 * value;}return Math.ceil(value);},
                getValue: function(value, dim) {return this.getScalar(value, dim) + 'px';},
                articles: new $.fn.PIterable(),
                log: function(msg) {
                    if(this.settings.log) {
                        console.log(msg);
                    }
                },
                load: function(element,options) {
                    this.settings = $.extend({}, $.fn.parallax.section_defaults, options);
                    this.$container = $(element);
                    this._init();
                },
                _init: function() {
                    this._init_articles();
                },
                _init_articles: function() {
                    var idx = 0, th = 0, zi = 999999;
                    this.$container.find('article'+this.settings.article_class).each(function() {
                        var $article = $(this).parallaxArticle($section.$this, $.extend({},options,{order:idx}));
                        $section.articles.push($article);
                        th += $article.settings.height || 100;
                        th += $article.oData.praxDuration || 1000;

                        if(idx > 0 ) {
                            switch($article.oData.praxDirection)
                            {
                                case 0: $article.translate(0,$window.height(),0); break;
                                case 1: $article.translate(- $window.width(),0,0); break;
                                case 2: $article.translate(0,- $window.height(),0); break;
                                case 3: $article.translate($window.width(),0,0); break;
                                default: $article.translate(0,'100%',0); break;
                            }
                        } else {
                            $article.translate(0,0,0);
                        }
                        idx++;
                        $article.$this = $(this);
//                        zi -= 1000;
//                        $(this).css({'position':'absolute','z-index':zi});
                    });
                    var elem;
                    while(null !== ( elem = this.articles.next() ) )
                    {
                        this.log( elem );
                    }
                    this._init_scroller(th);
                    this.articles.rewind();
                    this.$window.scroll(this.onScroll);
                },
                _init_scroller: function(height) {
                    this.log( 'Initializing Scroller to ' + height + 'px' );
                    var $scroller = $('<div class="prax-scroll"></div>');
                    $scroller.height(height);
                    this.$container.before($scroller);
                    this.$scroller = $scroller;
                },
                translateArticle: function($article,x,y,z) {
                    x = this.isPercentage(x) ? x : x + 'px';
                    y = this.isPercentage(y) ? y : y + 'px';
                    z = this.isPercentage(z) ? z : z + 'px';
                    $article.translate(x,y,z);
                },
                onScroll: function() {
                    for(var i = 0; i < $section.articles.count(); i++ )
                    {
                        var article = $section.articles.get(i);
                        article.onScroll();
                    }
                }
            };
            $section.load($(this),options);
        });
    };

    $.fn.parallaxArticle = function(container, options) {
        var $article = {
            name: 'Parallax Article',
            id: null,
            version: '0.0.1',
            $this: $(this),
            IE: navigator.userAgent.match(/msie/i),
            isTouch: document.createTouch !== undefined,
            isQuery: function(obj) {return obj && obj.hasOwnProperty && obj instanceof $;},
            isString: function(str) {return str && $.type(str) === "string";},
            isPercentage: function(str) {return this.isString(str) && str.indexOf('%') > 0;},
            isScrollable: function(el) {return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));},
            getScalar: function(orig, dim) {var value = parseInt(orig, 10) || 0;if (dim && this.isPercentage(orig)) {value = this.getViewport()[ dim ] / 100 * value;}return Math.ceil(value);},
            getValue: function(value, dim) {return this.getScalar(value, dim) + 'px';},
            $this: $(this),
            order: 0,
            oData: {},
            log: function(msg) {
                if(this.settings.log) {
                    console.log(msg);
                }
            },
            load: function(container,element,options) {
                this.settings = $.extend({}, $.fn.parallax.article_defaults, options );
                this.oData = this.$this.data();
                this._init();
            },
            _init: function() {
                this.order = this.settings.order;
                this.oData.praxDirection = this.oData.praxDirection || 0;
                this.oData.praxSpeed = this.oData.praxSpeed || 1;
                this.oData.praxDuration = this.oData.praxDuration || 1000;
                this.oData.praxOrder = this.oData.praxOrder || this.order;

                this.settings.height = this.oData.praxDirection == 0 || this.oData.praxDirection == 2 ?
                    this.$this.height() : this.$this.width();

                this.settings.height += this.oData.praxDuration;
                this.$this.css('height',this.settings.height);

                /* deal with the article background image */
                var $bg_image = this.$this.find('img'+this.settings.image_background_class);
                if(typeof $bg_image !== 'undefined') {
                    this.oData.praxBg = {
                        src: $bg_image.attr('src'),
                        width: $bg_image.attr('data-prax-width') || '100%',
                        position: $bg_image.attr('data-prax-position') || 'center top',
                        size: $bg_image.attr('data-prax-size') || '100% auto'
                    };
                    $bg_image.css({
                        position: $bg_image.css('position'),
                        top: 0,
                        left: 0,
                        width: '100%'
                    });
                } else {
                    this.oData.praxBg = {src: null,width: null,position: null,size: null};
                }

                /**
                 * deal with the article header
                 */
                var $header = this.$this.find('header'+this.settings.header_class);
                if(typeof $header !== 'undefined') {
                    this.oData.praxTitle = $header.html();
                    $header.css('display','none');
                    this.title = this.oData.praxTitle;
                }

                /**
                 * Give this article a unique ID
                 */
                var id = 'praxArticle' + this.settings.order;
                this.$this.attr('id',id);
                this.settings.id = id;
                this.id = id;
            },
            onScroll: function() {
                var scrTop = $window.scrollTop(),
                    speed = $article.oData.praxSpeed,
                    lastScrTop = $article.lastScrTop || 0,
                    scrDiff = scrTop - lastScrTop,
                    offset = - ( scrDiff / speed ),
                    lastX = $article.lastX,
                    lastY = $article.lastY,
                    newX = lastX,
                    newY = lastY + offset;

                console.log( scrTop );
                console.log( speed );
                console.log( lastScrTop );
                console.log( scrDiff );
                console.log( offset );
                console.log( lastX );
                console.log( lastY );
                console.log( newX );
                console.log( newY );

                $article.lastScrTop = scrTop;
                $article.translate(newX, newY, 0);

            },
            translate: function(x, y, z) {
                this.lastX = x;
                this.lastY = y;
                this.lastZ = z;
                x = this.isPercentage(x) ? x : x + 'px';
                y = this.isPercentage(y) ? y : y + 'px';
                z = this.isPercentage(z) ? z : z + 'px';
                console.log('translate');
                console.log(this.$this);
                var a = "translate3d(" + x + ", " + y + ", " + z + " )";
                console.log(a);
                this.$this.css({
                    '-webkit-transform': a,
                    'color': '#FFF'
                });
            }
        }
        $article.load( container, $(this), options );
        return $article;
    }

    $.fn.PIterable = function(collection) {
        var position = 0,
            array = new Array();
        for(var i in collection) {
            array.push( collection[i] );
        }
        this.get = function(key) { return array[ key ]; }
        this.rewind = function() { position = 0; };
        this.current = function() { return array[ position ]; };
        this.key = function() { return position; };
//        this.next = function() { if(this.hasNext()) { ++position; } };
        this.hasNext = function() { ++position; var ret = this.valid(); --position; return ret; };
//        this.prev = function() { if(this.hasPrev()) { --position; } };
        this.hasPrev = function() { --position; var ret = this.valid(); ++position; return ret; };
        this.valid = function() { return typeof array[ position ] !== 'undefined'; };
        this.push = function(item) { array.push(item); };
        this.count = function() { return array.length; };
        this.next = function() {
            if(this.hasNext()) {
                position++;
                return this.current();
            }
            return null;
        };
        this.prev = function() {
            if(this.hasPrev()) {
                position--;
                return this.current();
            }
            return null;
        }
    };

    $.fn.parallax.section_defaults = {
        log: true,
        article_class: '.prax'
    };

    $.fn.parallax.article_defaults = {
        order: 0,
        log: true,
        header_class: '',
        image_background_class: '.prax-bg'
    };
})(jQuery);