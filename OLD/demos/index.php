<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax Frames</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="J&L Core Systems, experienced web design and development to suit all your needs. No job too hard, too small or too large.">
    <meta name="keywords" content="J&L Core Systems,symfony,zend,zend frameword,html5,css,js,javascript,jquery,extjs,wordpress,photoshop,victoria,bc,canada,design">
    <meta name="author" content="J&L Core Systems">

    <link href="../css/mini.php?files=bootstrap.min,bootstrap-responsive.min,parallax" rel="stylesheet">
    <link href="./frames/css/style.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="../js/mini.php?files=html5"></script>
    <![endif]-->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.js"></script>
</head>
<body data-spy="scroll">

<section id="parallax-container" class="parallax-container">
<article id="welcome" class="parallax-item">
    <header class="parallax-item-title">Welcome</header>
    <img class="parallax-item-bg" src="frames/images/bg3.jpg" />
    <div class="parallax-item-content">
        <div id="welcome_logo" class="parallax-sprite">
            <div class="center margintop10 text-center"><a href="http://www.jlcoresystems.com"><img src="./images/logo.png" /></a></div>
            <div class="center jlname negmargintop25 text-center"><a class="jlname" href="http://www.jlcoresystems.com">Core Systems</a></div>
        </div>
        <div id="welcome_plogo" class="center margintop10 plogo op0 parallax-sprite"></div>
        <div id="welcome_bar" class="margintop10 padding10 whitebg black text-center op0 parallax-sprite">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling<br>
                <span class="size24 blink">Keep scrolling down to view the site</span>
            </div>
        </div>
        <div id="welcome_scroll" class="jlscrolldown op0 parallax-sprite">
            Scroll Down
            <div id="welcome_dots" class="jldots center parallax-sprite"></div>
        </div>
        <div id="welcome_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="about" class="parallax-item" data-parallax-pause-duration="2500">
    <header class="parallax-item-title">About</header>
    <img class="parallax-item-bg" src="frames/images/bg1.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 border5 w60p center padding10 whitebg-full black text-center">
            <div class="pbg parallax-sprite" data-parallax='[{"start":{"offset":1000,"opacity":0},"end":{"offset":2000,"opacity":"0.4"}}]'></div>
            <div class="zi100">
                <h2>J&amp;L Core Systems <strong>presents</strong> <u>Parallax</u></h2>
                A custom jQuery plugin to change the way your site scrolls. Frames (or Items) can slide into view from any angle or fade in over the existing frame.<br>
                You have complete control over how long these transitions last, how long the frame is displayed, and much more.<br><br>
                Animated sprites with chainable animations<br><br>
                Controlled through Javascript or HTML5 attribute settings.<br>
                Accessible and overridable CSS3<br><br>
                Works on Desktop and Mobile devices<br><br>
                <strong>Keep scrolling down to see what Parallax can do.</strong>
                <br><br>
                <div class="center text-center">
                    <img src="./images/chrome.png" class="op0 parallax-sprite" id="browser_chrome" data-parallax='[{"start":{"offset":500,"opacity":0,"top":-200},"end":{"offset":1000}}]' />
                    <img src="./images/safari.png" class="op0 parallax-sprite" id="browser_safari" data-parallax='[{"start":{"offset":750,"opacity":0,"top":-200},"end":{"offset":1250}}]' />
                    <img src="./images/firefox.png" class="op0 parallax-sprite" id="browser_firefox" data-parallax='[{"start":{"offset":1000,"opacity":0,"top":-200},"end":{"offset":1500}}]' />
                    <img src="./images/opera.png" class="op0 parallax-sprite" id="browser_opera" data-parallax='[{"start":{"offset":1250,"opacity":0,"top":-200},"end":{"offset":1750}}]' />
                    <img src="./images/ie9.png" class="op0 parallax-sprite" id="browser_ie" data-parallax='[{"start":{"offset":1500,"opacity":0,"top":-200},"end":{"offset":2000}}]' />
                </div>
            </div>
            <a class="parallax-play play-frame zi100" href="javascript:void(0);" data-parallax-speed="1.5"></a>
            <a class="parallax-scrollto prev-frame zi100" href="#welcome"></a>
            <a class="parallax-scrollto next-frame zi100" href="#frames"></a>
        </div>
        <div id="about_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="frames" class="parallax-item" data-parallax-pause-duration="3000">
    <header class="parallax-item-title">Frames</header>
    <img class="parallax-item-bg" src="frames/images/bg2.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
            <h2>Parallax Frames (aka items)</h2>
            Frames are the main component of a Parallax site. Each frame consists of a page or a section of a website.<br>
            These frames can be controlled through html5 attributes or through the options in javascript.<br><br>
            Frames can slide or fade into view.<br><br>
            <div class="frame-target text-center black">
                <div class="parallax-sprite border5 shadow" data-parallax='[{"start":{"left":"-{ww}/2","opacity":0},"end":{"offset":500}},{"start":{"offset":900},"end":{"offset":1400,"left":"-{ww}/2","opacity":0}}]'>
                    <img src="./images/bg3-small.jpg">Slide in From the LEFT
                    </div>
                <div class="parallax-sprite shadow" data-parallax='[{"start":{"offset":500,"left":"{ww}/2","opacity":0},"end":{"offset":1000}},{"start":{"offset":1400},"end":{"offset":1900,"top":"-{wh}/2","opacity":0}}]'>
                    <img src="./images/bg4-small.jpg">Slide in From the RIGHT
                </div>
                <div class="parallax-sprite shadow" data-parallax='[{"start":{"offset":1000,"top":"{wh}/2","opacity":0},"end":{"offset":1500}},{"start":{"offset":1900},"end":{"offset":2400,"top":"{wh}/2","opacity":0}}]'>
                    <img src="./images/bg5-small.jpg">Slide in From the BOTTOM
                </div>
                <div class="parallax-sprite shadow" data-parallax='[{"start":{"offset":1500,"top":"-{wh}/2","opacity":0},"end":{"offset":2000}},{"start":{"offset":2400},"end":{"offset":2900,"opacity":0}}]'>
                    <img src="./images/bg1-small.jpg">Slide in From the TOP
                </div>
                <div class="parallax-sprite shadow" data-parallax='[{"start":{"offset":2000,"opacity":0},"end":{"offset":2500}}]'>
                    <img src="./images/bg2-small.jpg">FADE in
                </div>
            </div>
            <a class="parallax-play play-frame zi100" href="javascript:void(0);" data-parallax-speed="1.5"></a>
            <a class="parallax-scrollto prev-frame zi100" href="#about" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#sprites" data-parallax-full="true"></a>
        </div>
        <div id="frames_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="sprites" class="parallax-item">
    <header class="parallax-item-title">Sprites</header>
    <img class="parallax-item-bg" src="frames/images/bg4.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogoi2"></div>
        <div class="margintop10 padding10 white blackbg text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
            <h2>Animated Sprites</h2>
            Control opacity, top, left, width, height and rotations.
            <br><br>
            Chainable Animations
            <br><br>
            <div class="sprite-target center text-center">
                <div id="sprites_fade" class="sprite-item border5 parallax-sprite">Fade In/Out</div>
                <div id="sprites_slide" class="sprite-item border5 parallax-sprite">Slide In/Out</div>
                <div id="sprites_rotate" class="sprite-item border5 parallax-sprite">Rotate</div>
                <div id="sprites_width" class="sprite-item border5 parallax-sprite">Adjust Width</div>
                <div id="sprites_height" class="sprite-item border5 parallax-sprite">Adjust Height</div>
                <div id="sprites_chained" class="sprite-item border5 parallax-sprite">Multiple with Chained Animations</div>
            </div>
            <br><br>
            <a class="parallax-play play-frame zi100" href="javascript:void(0);" data-parallax-speed="1.5"></a>
            <a class="parallax-scrollto prev-frame zi100" href="#frames" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#cool_stuff" data-parallax-full="true"></a>
        </div>
        <div id="sprites_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="cool_stuff" class="parallax-item" data-parallax-pause-duration="10000">
    <header class="parallax-item-title">Cool Stuff</header>
    <img class="parallax-item-bg" src="frames/images/bg5.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
            <div id="video_frame" class="video-frame parallax-sprite nooverflow">
                <h2>We have also added video clip style animations.</h2>
                <div class="video-target round5 shadow">
                    <?php
                        $frames = array();
                        for($i = 1; $i <= 150; $i++) {
                            $index = $i < 10 ? '00' . $i : ( $index < 100 ? '0' . $i : $i );
                            $index = $index == '0100' ? '100' : $index;
                            $img = $index . '.jpg';
                            $frames[] = '"' . $img . '"';
                        }
                    ?>
                    <div id="video-frames" class="round5 video-frames parallax-sprite"
                        data-parallax='[{
                            "start":{
                                "animFolder": "../images/im3/",
                                "frames":[<?php echo implode(',',$frames); ?>]
                            },
                            "end":{
                                "offset":10000
                            }
                        }]'
                        ></div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="cool_frame" class="cool-frame parallax-sprite">
                <h2>What can be done with these sprites?</h2>
                <div class="cool-target">

                </div>
            </div>
            <br><br>
            <a class="parallax-play play-frame zi100" href="javascript:void(0);" data-parallax-speed="1"></a>
            <a class="parallax-scrollto prev-frame zi100" href="#sprites" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#html5" data-parallax-full="true"></a>
        </div>
        <div id="cool_stuff_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="html5" class="parallax-item">
    <header class="parallax-item-title">HTML5</header>
    <img class="parallax-item-bg" src="frames/images/bg6.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">

            <a class="parallax-scrollto prev-frame zi100" href="#cool_stuff" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#javascript" data-parallax-full="true"></a>
        </div>
        <div id="html5_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="javascript" class="parallax-item">
    <header class="parallax-item-title">Javascript</header>
    <img class="parallax-item-bg" src="frames/images/bg7.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
            <a class="parallax-scrollto prev-frame zi100" href="#html5" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#settings" data-parallax-full="true"></a>
        </div>
        <div id="javascript_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="settings" class="parallax-item">
    <header class="parallax-item-title">Settings</header>
    <img class="parallax-item-bg" src="frames/images/bg8.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogoi2"></div>
        <div class="margintop10 padding10 white blackbg text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
            <a class="parallax-scrollto prev-frame zi100" href="#javascript" data-parallax-full="true"></a>
            <a class="parallax-scrollto next-frame zi100" href="#links" data-parallax-full="true"></a>
        </div>
        <div id="settings_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>

<article id="links" class="parallax-item">
    <header class="parallax-item-title">Links</header>
    <img class="parallax-item-bg" src="frames/images/bg9.jpg" />
    <div class="parallax-item-content">
        <div class="center margintop10 plogo2"></div>
        <div class="margintop10 padding10 whitebg black text-center">
            <div class="size32 padding10">
                jQuery Plugin to Revolutionize Site Scrolling
            </div>
        </div>
        <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">

            <a class="parallax-scrollto prev-frame zi100" href="#settings" data-parallax-full="true"></a>
        </div>
        <div id="links_progress" class="parallax-item-progress parallax-sprite"></div>
    </div>
</article>
</section>

<div class="copyright">
    Copyright &copy; 2013 <a href="http://jlcoresystems.com">J&amp;L Core Systems</a><br>
    All Rights Reserved.
</div>
<div class="scroll-down" title="KEEP SCROLLING DOWN, Click to AutoScroll the site" onclick="javascript:autoScroll();"></div>

<script type="text/javascript" src="../js/jquery.parallax.js"></script>
<script type="text/javascript">
    /* DO NOT USE ON READY */
    $('section#parallax-container').parallax({
        item_options: {
            items: {
                welcome: {
                    pauseDuration: 500
                },
                about: {

                },
                frames: {
                    type: 'fade'
                },
                sprites: {
                    pauseDuration: 6000,
                    inDirection: 'left'
                },
                html5: {
                    inDirection: 'right'
                },
                cool_stuff: {
                    pauseDuration: 13000
                },
                javascript: {
                    inDirection: 'top'
                },
                settings: {
                    type: 'fade'
                },
                links: {
                    inDirection: 'left'
                }
            },
            sprite_options: {
                default_offset_type: 'pause',
                sprites: {
                    welcome_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    about_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    html5_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    javascript_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    cool_stuff_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    frames_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    sprites_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    links_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    settings_progress: [{start:{height:0},end:{offsetType:'out',height:"{wh}-40"}}],
                    welcome_dots: [{start: {height:0},end: {offset:1000,height:300}}],
                    sprites_fade: [
                        {start: {opacity: 0},end: {offset: 500}},
                        {start: {offset: 1000},end: {offset: 1500,opacity: 0}}
                    ],
                    sprites_slide: [{start: { left: "-{ww}/2", opacity: 0, offset: 1000 },end: { offset: 1500 }},{start: { offset: 2000 },end: { offset: 2500, top: "-{wh}/2", left: "{ww}/2", opacity: 0 }}],
                    sprites_rotate: [{start: {offset: 2000},end: {offset: 2500,rotation:180}},{start: {offset:3000,rotation:-180},end: {offset:3500}}],
                    sprites_width: [{start:{offset:2500,width:0},end:{offset:3000}},{start:{offset:3500},end:{offset:4000,width:0}}],
                    sprites_height: [{start:{offset:3000,height:0},end:{offset:3500}},{start:{offset:4000},end:{offset:4500,height:0}}],
                    sprites_chained: [
                        {start: {offset: 3500,height: 20},end: {offset: 4000,width: 600,height: 20}},
                        {start: {offset: 4000,width: 600,height: 20},end: {offset: 4500,height: 50}},
                        {start: {offset: 4500,height: 50,rotation: 0},end: {offset: 5000,height: 20,rotation: -180}},
                        {start: {offset: 5500,height: 50,rotation: -180},end: {offset: 6000,height: 20,top: "-{wh}/2",opacity: 0,rotation: 0}}
                    ],
                    video_frame: [
                        {start:{offset:11000,opacity:1},end:{offset:12000,opacity:0,height:0}}
                    ],
                    cool_frame: [
                        {start:{offset:11000,opacity:0},end:{offset:12000}}
                    ]
                }
            }
        },
        onLoaded: function() {
//            $('html,body').animate({scrollTop:4900},5000);
        }
    });
    var stop = true;function autoScroll() {if( stop ) {stop = false;$("html, body").animate({ scrollTop: $(document).height() }, $(document).height() - $(window).scrollTop());} else {stop = true;$("html,body").clearQueue().stop();}}
</script>
<div class="clear" id="end"></div>
</body>
</html>

