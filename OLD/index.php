<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="J&L Core Systems, experienced web design and development to suit all your needs. No job too hard, too small or too large.">
    <meta name="keywords" content="J&L Core Systems,symfony,zend,zend frameword,html5,css,js,javascript,jquery,extjs,wordpress,photoshop,victoria,bc,canada,design">
    <meta name="author" content="J&L Core Systems">

    <link href="./css/mini.php?files=bootstrap.min,bootstrap-responsive.min,site,parallax" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/mini.php?files=html5"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.ui.js"></script>
</head>
<body data-spy="scroll">

<section id="parallax-container" class="parallax-container">
    <?php include( 'pages/demo/demos.php' ); ?>
</section>

<div class="copyright">
    Copyright &copy; 2013 <a href="http://jlcoresystems.com">J&amp;L Core Systems</a><br>
    All Rights Reserved.
</div>
<div class="scroll-down" title="KEEP SCROLLING DOWN, Click to AutoScroll the site" onclick="javascript:autoScroll();"></div>

<script type="text/javascript" src="js/mini.php?files=cufon-yui,Copse_400.font<?php echo $body_js_files; ?>"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<script type="text/javascript">
    /* DO NOT USE ON READY */
    $('section#parallax-container').parallax({
        scrollRatio: 1.5,
        nav: true,
        debug: false,
        item_options: {
            debug: false,
            items: {},
            sprite_options: {
                debug: false,
                start_offset: 'in', /* waiting, in, paused, out, complete */
                sprites: {}

            }
        },
        onLoaded: function() {
            $(document).ready(function(){
                setTimeout(function(){
//                    $('html, body').animate({scrollTop:2100}, 5000);
//                    $('html, body').animate({scrollTop:40000}, 10);
                },750);
            });
        }
    });

    var stop = true;function autoScroll() {if( stop ) {stop = false;$("html, body").animate({ scrollTop: $(document).height() }, $(document).height() - $(window).scrollTop());} else {stop = true;$("html,body").clearQueue().stop();}}
</script>
<div class="clear" id="end"></div>
</body>
</html>

