<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link type="text/css" rel="stylesheet" href="./media/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="./media/css/bootstrap-responsive.min.css" />
    <link type="text/css" rel="stylesheet" href="./media/css/bootstrap-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="./media/css/parallax.css" />
    <link type="text/css" rel="stylesheet" href="./media/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./media/css/margins.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="./media/js/html5shiv.js"></script>
    <script src="./media/js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="./media/js/jquery.min.js"></script>
    <script type="text/javascript" src="./media/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./media/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./media/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="./media/js/jquery.parallax_frame.js"></script>
    <script type="text/javascript" src="./media/js/jquery.parallax_sprite.js"></script>
    <script type="text/javascript" src="./media/js/jquery.parallax_loader.js"></script>
    <script type="text/javascript" src="./media/js/jquery.parallax_navigation.js"></script>

<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-44747110-1', 'joshmccreight.com');
        ga('send', 'pageview');

    </script>
</head>
<body>
<section id="parallax-container" class="parallax-container">
    <?php require_once('./pages/welcome.php'); ?>
    <?php require_once('./pages/about.php'); ?>
    <?php require_once('./pages/slide_top.php'); ?>
    <?php require_once('./pages/slide_right.php'); ?>
    <?php require_once('./pages/slide_bottom.php'); ?>
    <?php require_once('./pages/slide_left.php'); ?>
    <?php require_once('./pages/fade_in.php'); ?>
    <?php require_once('./pages/loader.php'); ?>
    <?php require_once('./pages/more.php'); ?>
</section>
<div id="loader-content" class="parallax-loader-el">
    <div class="center large-margin-top large-padding-top text-center">
        <br><br>
        <br><br>
        <br><br>
        <img src="./media/images/plogo.png" />
    </div>
</div>
<div class="copyright">
    Copyright &copy; 2013 <a href="http://jlcoresystems.com">J&amp;L Core Systems</a><br>
    All Rights Reserved.
</div>
<div id="auto-scroll" class="scroll-down" title="KEEP SCROLLING DOWN, Click to AutoScroll the site" onclick="javascript:autoScroll();"></div>
<div class="jllogosm border5">
    <a href="http://jlcoresystems.com" class="full"></a>
    <div class="totop" title="To TOP" onclick="autoScroll(true);"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#auto-scroll,.parallax-frame-progress').toggle(500);
        });

        var parallax = $('section.parallax-container').parallax({
            debug: false,
            frame_options: { debug: false},
            loader_options: {
                loader_css: {background:'#000 url(media/images/backgrounds/orig/bg0.jpg) no-repeat center center','background-size':'100% auto'},
                content_css: {background:'transparent'},
                percent_css: {color:'#FFF'},
                pause: 1000,
                content_el: '#loader-content'
            },
            navigation: true,
            resetScroll: true
        }).on('ready',function(){
                $('#auto-scroll').fadeIn(500);
//                $('html,body').animate({scrollTop:18501},2000);
            });
    parallax = parallax.data('parallax');
//    });
    var stop = true;
    function autoScroll(top) {
        top = top === true;
        if( stop ) {
            stop = false;
            if(top) {
                var dur = $(window).scrollTop() * .25;
//                $("html, body").animate({ scrollTop: 0 }, dur, 'linear', function(){stop=true;});
                parallax.scrollToInt(0,.25,false);
            } else {
                $("html, body").animate({ scrollTop: $(document).height() }, ( $(document).height() - $(window).scrollTop() ) * 1.2, 'linear', function(){stop=true;});
            }
        } else {
            stop = true;
            $("html,body").clearQueue().stop();
        }
    }
</script>
</body>
</html>