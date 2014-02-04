<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="J&L Core Systems, experienced web design and development to suit all your needs. No job too hard, too small or too large.">
    <meta name="keywords" content="J&L Core Systems,symfony,zend,zend frameword,html5,css,js,javascript,jquery,extjs,wordpress,photoshop,victoria,bc,canada,design">
    <meta name="author" content="J&L Core Systems">

    <link href="../css/mini.php?files=bootstrap.min,bootstrap-responsive.min,site,parallax" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="../js/mini.php?files=html5"></script><![endif]-->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.js"></script>

    <style>
        .jllogo {width: 212px;height: 125px;margin: 0 auto;background: transparent url(../images/logo.png) no-repeat center center; }
        .jlname {margin: -28px auto 0 auto;font-weight: bold;text-align: center;display: block;color: #FFF;background: rgba(0,0,0,.75);}
        .jlname h1 { font-size: 32px; }
        .jlscrolldown { width:100px; height: 45px; margin: 10px auto 20px auto; background: transparent url(images/arrow.png) no-repeat top center; color: #fff; text-align: center; padding-top: 50px; }
        .jldots { width: 20px; height: 50px; margin: 0 auto; background: transparent url(images/dot.png) repeat-y top center; }
        .jlpresents { margin: 50px auto 10px auto;font-weight: bold;font-size:46px;color:#FFF;text-align:center;text-shadow: 0px 0px 6px #000; }
        .jlparallax { margin: 10px auto; font-size: 80px;text-shadow: 0px 0px 6px #000; text-align:center; }
        .blink { text-decoration: blink; }
        .blackbg { background-color: rgba(0,0,0,.75); }
        .whitebg { background-color: rgba(255,255,255,.75); }
        .padding10 { padding: 10px; }
        .border5,
        .rounded5 { border-radius: 5px; -moz-border-radius: 5px; -o-border-radius: 5px; -webkit-border-radius: 5px; }
        .inline-block { display: inline-block; }

        @media only screen and (max-width:480px){
            .jllogo {width: 159px;height: 94px;background-size: 100% 100%; }
            .jlname {margin: -18px auto 0 auto;}
            .jlname h1 { font-size: 24px; }
            .jlscrolldown { height: 25px; margin: 10px auto 20px auto; background: transparent url(images/arrow.png) no-repeat top center; color: #fff; text-align: center; padding-top: 50px; }
            .jldots { display: none; }
            .jlpresents { margin: 10px auto 5px auto; font-size: 24px; }
            .jlparallax { margin: 5px auto; font-size: 46px; }
        }
    </style>
    <style>
        .browser-icons-container { width: 315px; height: 90px; margin: 10px auto; }
        .browser-icons-container>div { width: 60px;height: 90px; margin: 0;padding: 0; display:inline-block;border:none;}
        .icon-chrome { background: transparent url(images/browsers/chrome.png) no-repeat center center; }
        .icon-firefox { background: transparent url(images/browsers/firefox.png) no-repeat center center; }
        .icon-opera { background: transparent url(images/browsers/opera.png) no-repeat center center; }
        .icon-ie { background: transparent url(images/browsers/ie.png) no-repeat center center; }
        .icon-safari { background: transparent url(images/browsers/safari.png) no-repeat center center; }
        span { position: relative; display: block; }
        .black { color: black; }
        .white { color: white; }
        .size32 { font-size: 32px; }
        .width100p { width: 100%; }
        .margin-top-10 { margin-top: 10px; }
        .top10 { top: 10px; }
        .top15 { top: 15px; }
        ul.list, ul.list li { list-style: none; margin: 0; padding: 0; }

        @media only screen and (max-width:480px){
            .browser-icons-container { height: 80px; margin: 5px auto 0px auto; }
            .size32 { font-size: 24px; }
            .margin-top-10 { margin-top: 5px; }
            .padding10 { padding: 5px; }
            .top15 { top: 5px; }
            .top10 { top: 0px; }
            ul.list li { margin: 0 2px; padding: 0 !important; line-height: 16px; }
            ul.list li strong { font-size: 16px; font-weight: normal; }
        }
    </style>
    <style>
        .titem { width: 50%; max-width: 500px; min-width: 240px; margin: 10px auto; display: block; background: rgba(0, 0, 0, .75); color: #FFF; text-align: center; font-size: 32px; }
        .op0 { opacity: 0; }
        .nooverflow { overflow: hidden; }
        .height100p { height: 100%; min-height: 1100px; }
        .height1200 { height: 1200px; }

        @media only screen and (max-width:480px){
            .titem { margin: 3px auto; font-size: 16px; line-height: 16px; }
        }
    </style>
    <style>
        .im3-container {
            width: 640px;
            height: 266px;
            margin: 25px auto 25px auto;
            overflow: hidden;
            border: 10px solid #FFF;
        }
        .im3-video {
            width: 100%;
            height: 100%;
        }

        .overlay1-container { width: 900px; height: 400px; margin: 10px auto; overflow:hidden; }
        .overlay1-container .left { float: left;width: 600px; height: 400px; margin: 0; padding: 0; }
        .overlay1-container .right { float: right; width: 300px; height: 400px; margin: 0; padding: 0; }
        .overlay1-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
        .overlay1-container .whale1 { background: transparent url(images/whale/1.jpg) no-repeat top left; width: 100%; height: 100%; }
        .overlay1-container .whale2 { background: transparent url(images/whale/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
        .overlay1-container .whale3 { background: transparent url(images/whale/3.jpg) no-repeat top left; width: 5%; height: 100%; }
        .overlay1-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
        .overlay1-container .tiger1 { background: transparent url(images/tiger/1.jpg) no-repeat top right; width: 100%; height: 100%; }
        .overlay1-container .tiger2 { background: transparent url(images/tiger/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
        .overlay1-container .tiger3 { background: transparent url(images/tiger/3.jpg) no-repeat top right; width: 5%; height: 100%; }

        .overlay2-container { width: 600px; height: 266px; margin: 10px auto; overflow:hidden; }
        .overlay2-container .left { float: left;width: 400px; height: 266px; margin: 0; padding: 0; }
        .overlay2-container .right { float: right; width: 200px; height: 266px; margin: 0; padding: 0; }
        .overlay2-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
        .overlay2-container .whale1 { background: transparent url(images/whale/small/1.jpg) no-repeat top left; width: 100%; height: 100%; }
        .overlay2-container .whale2 { background: transparent url(images/whale/small/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
        .overlay2-container .whale3 { background: transparent url(images/whale/small/3.jpg) no-repeat top left; width: 5%; height: 100%; }
        .overlay2-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
        .overlay2-container .tiger1 { background: transparent url(images/tiger/small/1.jpg) no-repeat top right; width: 100%; height: 100%; }
        .overlay2-container .tiger2 { background: transparent url(images/tiger/small/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
        .overlay2-container .tiger3 { background: transparent url(images/tiger/small/3.jpg) no-repeat top right; width: 5%; height: 100%; }

        .overlay3-container { width: 413px; height: 184px; margin: 10px auto; overflow:hidden; }
        .overlay3-container .left { float: left;width: 275px; height: 184px; margin: 0; padding: 0; }
        .overlay3-container .right { float: right; width: 138px; height: 184px; margin: 0; padding: 0; }
        .overlay3-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
        .overlay3-container .whale1 { background: transparent url(images/whale/tiny/1.jpg) no-repeat top left; width: 100%; height: 100%; }
        .overlay3-container .whale2 { background: transparent url(images/whale/tiny/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
        .overlay3-container .whale3 { background: transparent url(images/whale/tiny/3.jpg) no-repeat top left; width: 5%; height: 100%; }
        .overlay3-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
        .overlay3-container .tiger1 { background: transparent url(images/tiger/tiny/1.jpg) no-repeat top right; width: 100%; height: 100%; }
        .overlay3-container .tiger2 { background: transparent url(images/tiger/tiny/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
        .overlay3-container .tiger3 { background: transparent url(images/tiger/tiny/3.jpg) no-repeat top right; width: 5%; height: 100%; }

        .overlay4-container { width: 290px; height: 130px; margin: 10px auto; overflow:hidden; }
        .overlay4-container .left { float: left;width: 194px; height: 130px; margin: 0; padding: 0; }
        .overlay4-container .right { float: right; width: 96px; height: 130px; margin: 0; padding: 0; }
        .overlay4-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
        .overlay4-container .whale1 { background: transparent url(images/whale/tiny/1.jpg) no-repeat top left; width: 100%; height: 100%; }
        .overlay4-container .whale2 { background: transparent url(images/whale/tiny/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
        .overlay4-container .whale3 { background: transparent url(images/whale/tiny/3.jpg) no-repeat top left; width: 5%; height: 100%; }
        .overlay4-container .tiger {  position: absolute; top: 0; right: 0; width: 96px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
        .overlay4-container .tiger1 { background: transparent url(images/tiger/tiny/1.jpg) no-repeat top right; width: 100%; height: 100%; }
        .overlay4-container .tiger2 { background: transparent url(images/tiger/tiny/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
        .overlay4-container .tiger3 { background: transparent url(images/tiger/tiny/3.jpg) no-repeat top right; width: 5%; height: 100%; }

        .overlay1-container { display: none; }
        .overlay2-container { display: none; }
        .overlay3-container { display: none; }
        .overlay4-container { display: block; }

        @media only screen and (min-width:360px){
            /* styles for browsers larger than 960px; */
            .overlay1-container { display: none; }
            .overlay2-container { display: none; }
            .overlay3-container { display: none; }
            .overlay4-container { display: block; }
        }

        @media only screen and (min-width:480px){
            /* styles for browsers larger than 960px; */
            .overlay1-container { display: none; }
            .overlay2-container { display: none; }
            .overlay3-container { display: block; }
            .overlay4-container { display: none; }
        }
        @media only screen and (min-width:768px){
            /* styles for browsers larger than 960px; */
            .overlay1-container { display: none; }
            .overlay2-container { display: block; }
            .overlay3-container { display: none; }
            .overlay4-container { display: none; }
        }
        @media only screen and (min-width:960px){
            /* styles for browsers larger than 960px; */
            .overlay1-container { display: block; }
            .overlay2-container { display: none; }
            .overlay3-container { display: none; }
            .overlay4-container { display: none; }
        }

        .ad-container { width: 2860px; height: auto; padding: 10px; margin-top: 25px; }
        .ad-container .ad { float: left; width: 240px; margin: 10px; border: 3px solid black; background: #FFF; text-align: center; padding: 10px; }
        .shadow-bottom {
            box-shadow: 0px 3px 8px #000;
            -webkit-box-shadow: 0px 3px 8px #000;
            -o-box-shadow: 0px 3px 8px #000;
            -moz-box-shadow: 0px 3px 8px #000;
        }

        @media only screen and (max-width:480px){
            .im3-container {
                width: 290px !important;
                height: 121px !important;
            }

            .im3-container img { width: 100%; height: 100%; }

            .margin-top-10 { margin-top: 2px; }
            .padding10 { padding: 2px; }
        }

    </style>
    <style>
        #parallax-item-demo5 { background: transparent url(images/backgrounds/demos/5.jpg) no-repeat center center; background-size: 100% auto; }
    </style>
</head>
<body data-spy="scroll">
<section class="parallax-container">
    <style>
        .max60p { width: 60%; margin: 0 auto; }
        .rose { width: auto; height: auto; -wekit-filter: blur(3px);
            box-shadow: 0px 0px 18px #F00;
            -webkit-box-shadow: 0px 0px 18px #F00;
            -o-box-shadow: 0px 0px 18px #F00;
            -moz-box-shadow: 0px 0px 18px #F00;
        }
    </style>
    <article id="parallax-item-demo5" class="parallax-item"
             data-parallax-css='{"background-color":"black"}'
             data-parallax-in-duration="1000"
             data-parallax-pause-duration="8000"
             data-parallax-out-duration="2000"
             data-parallax-in-direction="top"
        >
        <header class="parallax-item-title">Demo5</header>
        <img src="images/backgrounds/demos/5.jpg" class="parallax-item-bg" />
        <div class="parallax-item-content full-container">
            <div class="margin-top-10 whitebg black padding10 text-center size32">
                What about Ajax?
            </div>
            <div class="margin-top-10 whitebg black padding10 text-center">
                <h2 class=text-center">YUP! It does that too</h2>
            </div>
            <div class="margin-top-10 whitebg black padding10 text-center">
                <div class="max60p">
                This page was loaded via ajax.<br>
                The settings are set on an empty container, and when the page gets to a specified threshold the page is loaded in through ajax and initialized through the script.
                </div>
            </div>
            <div class="margin-top-10 padding10 text-center parallax-sprite"
                    data-parallax='[
                    {
                        "start": {
                            "offsetType":"pause",
                            "opacity": 0,
                            "width": 0,
                            "height": 0
                        },
                        "end": {
                            "offsetType":"pause"
                        }
                    }
                    ]'
                >
                <img class="rose rounded5" src="images/rose.jpg" />
            </div>
        </div>
    </article>
</section>
<script>
    function setRoseHeight() {
        var rose = $('.rose'),
            height = rose.height(),
            top = rose.offset().top,
            wh = $(window).height(),
            maxheight = wh - top - 100;
        rose.data().maxHeight = maxheight;
        rose.css( 'height', maxheight + 'px' );
    }
    setRoseHeight();
    $(window).resize(function(){setRoseHeight();});
</script>
</body>
</html>