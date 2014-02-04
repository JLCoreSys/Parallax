$(document).ready(function(){
    var $win = $(window);
    $('.loader .cover .content').css('height',$win.height()+'px');
    $('.loader').fadeIn(1000);
    $('.loader .percent').fadeIn(500);
    var total = $('img[data-psrc]').length;
    var index = 0;
    var delay = 0;
    $('img[data-psrc]').each(function(){
        setTimeout(function(){
            var src = $(this).attr('data-psrc');
            $(this).attr('src',src);
            index++;
            var perc = index / total * 100;
            perc = Math.round( perc );
            if( perc >= 100 ) perc = 100;
            $('.loader .percent').html(perc+'%');
            $('.loader .cover').css('height',perc+'%');
            if(perc >= 100) {
                $('.loader .percent').fadeOut(1000);
            }
            if(index >= total) {
                $('.loader .scroll-arrow').css('opacity', 1);
                var top = $('.loader .dots').offset().top;
                var height = $win.height() - top;
                $('.loader .dots').css('height',height+'px');
            }
        },delay);
        delay += 10;
    });
    $win.resize(function(){
        $('.loader .cover .content').css('height',$win.height()+'px');
        var top = $('.loader .dots').offset().top;
        var height = $win.height() - top;
        $('.loader .dots').css('height',height+'px');
    });
});