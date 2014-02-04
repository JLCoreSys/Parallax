;(function($,window,document,undefined){
    $.ShermansTravel = function(element,options) {
        var st = this,
            defaults = {
                debug: false,
                menu_item: 'ul.menu li',
                menu_arrow: '.arrow',
                heading: 'h1.heading',
                headings: {},
                form_container: '.form-container'
            },
            element = element,
            $element = $(element),
            $menuItems = [];

        st.settings = {};
        st.menu_items = [];

        st.log = function(msg) {
          if(st.settings.debug === true) {
              console.log(msg);
          }
        };

        function log(msg) { st.log( msg ); }

        function init() {
            st.settings = $.extend({},defaults,options);
            $menuItems = $element.find(st.settings.menu_item);
            initMenuItems();
        };

        function initMenuItems() {
            $menuItems.each(function(ix){
                var item = $(this),
                    height = item.height() +
                        parseInt( item.css('padding-top').replace('px','').replace('%','') ) +
                        parseInt( item.css('padding-bottom').replace('px','').replace('%','') ) +
                        parseInt( item.css('margin-top').replace('px','').replace('%','') ) +
                        parseInt( item.css('margin-bottom').replace('px','').replace('%','') ),
                    border1 = parseInt( height / 2),
                    arrow = item.find(st.settings.menu_arrow);

                if(arrow !== undefined && arrow.length) {
                    arrow.css({'height':height+'px'});
                }

                if(item.data('st_form')===undefined) {
                    var cls = item.attr('class').replace('active','').replace(' ',''),
                        form = $element.find('.'+cls+'-form');
                    item.data('st_form',form);
                }

                item.click(function(e){
                    e.preventDefault();
                    st.clickMenuItem($(this));
                });

                if(ix == 0) {
                    item.click();
                }
            });
        };

        st.clickMenuItem = function(item) {
            var cls = item.attr('class').replace('active', '').replace(' ',''),
                headings = st.settings.headings || {},
                heading = headings[ cls ] || 'Unknown heading';

            $element.find(st.settings.heading).html(heading);
            $menuItems.removeClass('active');
            item.addClass('active');

            var container = $element.find(st.settings.form_container),
                form = item.data('st_form'),
                clone = form.clone();

            container.html('');
            container.append(clone);

            var background = $element.find('.background'),
                image = cls + '-bg.jpg',
                img = $('<img src="public/images/' + image + '" style="position:absolute;top:0;left:0;width:100%;height:100%;display:none;" />');

            background.append(img);

            img.fadeIn(1000,function(){
                if(background.find('img').length > 1) {
                    background.find('img').eq(0).remove();
                }
            });


        };

        init();
    };

    $.fn.ShermansTravel = function(options) {
        return $(this).each(function(){
            if($(this).data('sa-item') === undefined) {
                var sa = new $.ShermansTravel($(this),options);
                $(this).data('sa-item',sa);
            }
        });
    };
})(jQuery,window,document,undefined);