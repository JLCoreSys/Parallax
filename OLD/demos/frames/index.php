<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax Frames</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="J&L Core Systems, experienced web design and development to suit all your needs. No job too hard, too small or too large.">
    <meta name="keywords" content="J&L Core Systems,symfony,zend,zend frameword,html5,css,js,javascript,jquery,extjs,wordpress,photoshop,victoria,bc,canada,design">
    <meta name="author" content="J&L Core Systems">

    <link href="../../css/mini.php?files=bootstrap.min,bootstrap-responsive.min,parallax" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../js/mini.php?files=html5"></script>
    <![endif]-->
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.ui.js"></script>
</head>
<body data-spy="scroll">

<?php
    $get = isset( $_GET ) ? $_GET : null;
    $reverse = false;
    if(!empty($get)) {
        $reverse = isset($get['reverse'])? $get['reverse'] : false;
        $reverse = $reverse === true || $reverse == 'true' || $reverse == '1' || $reverse == 1;
    }
    $pstring = null;
    if($reverse) {
        $pstring = ' data-parallax-type="slide" data-parallax-in-direction="top"';
    }
?>

<nav>
    <input type="checkbox" id="toggle" />
    <label for="toggle" class="toggle"></label>
    <ul class="menu">
        <li><a href="#">Google</a></li>
        <li><a href="#">Yahoo</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">YouTube</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">HTML5 Config</a></li>
        <li><a href="#">Javascript Config</a></li>
        <li><a href="#">States</a></li>
        <li><a href="#">Transitions</a></li>
    </ul>
</nav>

<section id="parallax-container" class="parallax-container">
    <article id="home" class="parallax-item" data-parallax-pause-duration="1">
        <header class="parallax-item-title">Home</header>
        <img class="parallax-item-bg" src="images/bg1.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 padding10 blackbg white text-center">
                This Demo Shows Different Frame Settings<br>
                <strong>This demo page uses FRAME/ITEM settings only</strong>
            </div>
            <div class="jlscrolldown">
                Scroll Down
            </div>
        </div>
    </article>

    <article id="slide_left" class="parallax-item"
        data-parallax-in-direction="left"
        >
        <header class="parallax-item-title">Slide Left</header>
        <img class="parallax-item-bg" src="images/bg2.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <h2>Slides in from the LEFT</h2><br><br>HTML5 settings<br><br>
                <code>
                    <?php echo htmlentities( '<article id="slide_left" class="parallax-item" data-parallax-in-direction="left">...</article>' ); ?>
                </code>
                <br><br>
            </div>
        </div>
    </article>

    <article id="slide_right" class="parallax-item">
        <header class="parallax-item-title">Slide Right</header>
        <img class="parallax-item-bg" src="images/bg3.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <h2>Slides in from the RIGHT</h2><br><br>Javascript settings<br><br>
                    <code class="w60p text-left">
                        <?php echo htmlentities( 'item_options: {' ); ?><br/>
                        <?php echo str_repeat('&nbsp;',4) . htmlentities( 'items: {' ); ?><br/>
                        <?php echo str_repeat('&nbsp;',8) . htmlentities( 'slide_right: {' ); ?><br/>
                        <?php echo str_repeat('&nbsp;',12) . htmlentities( 'inDirection: \'right\'' ); ?><br/>
                        <?php echo str_repeat('&nbsp;',8) . htmlentities( '}' ); ?><br/>
                        <?php echo str_repeat('&nbsp;',4) . htmlentities( '}' ); ?><br/>
                        <?php echo htmlentities( '}' ); ?>
                    </code>
                <br><br>
            </div>
        </div>
    </article>

    <article id="fade_html5" class="parallax-item"
            data-parallax-type="fade"
        >
        <header class="parallax-item-title">HTML5 Fade In</header>
        <img class="parallax-item-bg" src="images/bg4.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 white blackbg text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <h2>HTML5 FADE in</h2><br><br>HTML5 settings<br><br>
                <code>
                    <?php echo htmlentities( '<article id="fade_html5" class="parallax-item"data-parallax-type="fade">...</article>' ); ?>
                </code>
                <br><br>
            </div>
        </div>
    </article>

    <article id="javascript_fade" class="parallax-item">
        <header class="parallax-item-title">JS Fade In</header>
        <img class="parallax-item-bg" src="images/bg5.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 white blackbg text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <h2>Javascript FADE in</h2><br><br>Javascript settings<br><br>
                <code class="w60p text-left">
                    <?php echo htmlentities( 'item_options: {' ); ?><br/>
                    <?php echo str_repeat('&nbsp;',4) . htmlentities( 'items: {' ); ?><br/>
                    <?php echo str_repeat('&nbsp;',8) . htmlentities( 'javascript_fade: {' ); ?><br/>
                    <?php echo str_repeat('&nbsp;',12) . htmlentities( 'type: \'fade\'' ); ?><br/>
                    <?php echo str_repeat('&nbsp;',8) . htmlentities( '}' ); ?><br/>
                    <?php echo str_repeat('&nbsp;',4) . htmlentities( '}' ); ?><br/>
                    <?php echo htmlentities( '}' ); ?>
                </code>
                <br><br>
            </div>
        </div>
    </article>

    <article id="full-html5" class="parallax-item"
            data-parallax='{"type": "slide","inDuration": "1000","pauseDuration": "2000","outDuration": "1000","inDirection": "top"}'
            data-parallax-type="slide"
            data-parallax-in-duration="1000"
            data-parallax-pause-duration="2000"
            data-parallax-out-duration="1000"
            data-parallax-in-direction="top"
        >
        <header class="parallax-item-title">Full HTML5 Settings</header>
        <img class="parallax-item-bg" src="images/bg6.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <pre><strong>For setting durations, types, directions in Javascript..</strong></pre>
                <h2>Full HTML5 Settings</h2>
                <code class="w60p text-left">
<?php echo str_repeat('&nbsp;',4) . htmlentities( '<article id="full-html5" class="parallax-item"'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax=\'{"type": "slide","inDuration": "1000","pauseDuration": "2000","outDuration": "1000","inDirection": "top"}\''); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax-type="slide"'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax-in-duration="1000"'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax-pause-duration="2000"'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax-out-duration="1000"'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'data-parallax-in-direction="top"'); ?><br>
<?php echo str_repeat('&nbsp;',4) . htmlentities( '>...</article>'); ?>
                </code>
                </div>
            </div>
        </div>
    </article>

    <article id="full_javascript" class="parallax-item">
        <header class="parallax-item-title">Full Javascript Settings</header>
        <img class="parallax-item-bg" src="images/bg7.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <pre><strong>For setting durations, types, directions in Javascript..</strong></pre>
                <h2>Full Javascript Settings</h2>
                <code class="w60p text-left">
<?php echo str_repeat('&nbsp;',1) . htmlentities( 'item_options: {'); ?><br>
<?php echo str_repeat('&nbsp;',4) . htmlentities( 'items: {'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'full_javascript: {'); ?><br>
<?php echo str_repeat('&nbsp;',12) . htmlentities( 'type: \'slide\','); ?><br>
<?php echo str_repeat('&nbsp;',12) . htmlentities( 'inDuration: 1000,'); ?><br>
<?php echo str_repeat('&nbsp;',12) . htmlentities( 'pauseDuration: 2000,'); ?><br>
<?php echo str_repeat('&nbsp;',12) . htmlentities( 'outDuration: 1000,'); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( 'inDirection: \'bottom\''); ?><br>
<?php echo str_repeat('&nbsp;',8) . htmlentities( '}'); ?><br>
<?php echo str_repeat('&nbsp;',4) . htmlentities( '}'); ?><br>
<?php echo str_repeat('&nbsp;',1) . htmlentities( '}'); ?><br>
                </code>
            </div>
        </div>
        </div>
    </article>

    <article id="events" class="parallax-item">
        <header class="parallax-item-title">Events</header>
        <img class="parallax-item-bg" src="images/bg8.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogoi2"></div>
            <div class="margintop10 padding10 white blackbg text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <h2 class="no-margin">Events</h2>
                There are a few events which are triggered on initialization.<br>
                <strong>loaderComplete: </strong>When using the loader, the loaderComplete trigger is fired<br>
                <strong>loaded: </strong>When all elements of the parallax script have been initialized, the loaded trigger is fired<br>
                <strong>itemsInitComplete: </strong>When all frames/items have been initializes, the itemsInitComplete trigger is fired<br>
            </div>
        </div>
    </article>

    <article id="callbacks" class="parallax-item">
        <header class="parallax-item-title">Callbacks</header>
        <img class="parallax-item-bg" src="images/bg9.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <h2 class="no-margin">Callbacks</h2>
                There are many callbacks available to override/extend.
                <h3 class="no-margin">Parallax</h3>
                    onLoaded, onLoaderInit, onLoaderComplete, onScrollerInit, onScrollerComplete, onItemsInitComplete, onScroll, onResize
                <h3 class="no-margin">Frames/Items</h3>
                    onInit, onInitComplete, onPreloadStart, onPreloadComplete, onScroll, onResize, onInStart, onInEnd, onPauseStart, onPauseEnd, onOutStart, onOutEnd, onCompleteStart, onDetach, onAttach
                </div>
            </div>
        </div>
    </article>
</section>
<ul class="parallax-nav" style='display:none'>
    <li class="parallax-nav-item">Link</li>
    <li class="parallax-nav-item">Link</li>
    <li class="parallax-nav-item">Link</li>
    <li class="parallax-nav-item">Link</li>
</ul>

<div class="copyright">
    Copyright &copy; 2013 <a href="http://jlcoresystems.com">J&amp;L Core Systems</a><br>
    All Rights Reserved.
</div>
<div class="scroll-down" title="KEEP SCROLLING DOWN, Click to AutoScroll the site" onclick="javascript:autoScroll();"></div>
<div class="topright">&nbsp;</div>
<script type="text/javascript" src="../../js/jquery.parallax.js"></script>
<script type="text/javascript">
    /* DO NOT USE ON READY */
    $('section#parallax-container').parallax({
        item_options: {
            items: {
                slide_right: {
                    inDirection: 'right'
                },
                javascript_fade: {
                    type: 'fade'
                },
                full_javascript: {
                    type: 'slide',
                    inDuration: 1000,
                    pauseDuration: 2000,
                    outDuration: 1000,
                    inDirection: 'bottom'
                }
            }
        }
    });
    var stop = true;function autoScroll() {if( stop ) {stop = false;$("html, body").animate({ scrollTop: $(document).height() }, $(document).height() - $(window).scrollTop());} else {stop = true;$("html,body").clearQueue().stop();}}
</script>
<div class="clear" id="end"></div>
</body>
</html>

