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
    <article id="home" class="parallax-item" data-parallax-pause-duration="1" <?php echo $pstring; ?>>
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
                No Configuration, No Sprite Animation, All Default Settings<br>
                <strong>This demo page uses DEFAULT settings only</strong><br>
                <?php if($reverse): ?>
                    <a href="?reverse=0" title="Click to use default frame direction">REVERSE SLIDE ENABLED</a>
                <?php else: ?>
                    <a href="?reverse=1" title="Click to reverse frame direction">REVERSE SLIDE DISABLED</a>
                <?php endif; ?>
            </div>
            <div class="jlscrolldown">
                Scroll Down
            </div>
        </div>
    </article>

    <article id="states" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">States</header>
        <img class="parallax-item-bg" src="images/bg2.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <pre><strong>The frames have multiple states</strong></pre>
                <h2>STATES</h2>
                <strong>Waiting</strong> - The frame is in waiting when it is waiting to come into view (variable duration)<br>
                <strong>In</strong> - The frame is currently transitioning into view (default duration 1000)<br>
                <strong>Paused</strong> - The frame is currently the center of attention (default duration 2000)<br>
                <strong>Out</strong> - The frame is currently transitions out of view (default duration 1000)<br>
                <strong>Complete</strong> - The frame is not completely out of view (variable duration)<br>
                <pre>Both waiting and complete states, the frame is detached from the DOM</pre>
            </div>
        </div>
    </article>

    <article id="durations" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">Durations</header>
        <img class="parallax-item-bg" src="images/bg3.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 border5 w60p center padding10 whitebg black text-center">
                <pre><strong>The frames have multiple alterable durations</strong></pre>
                <h2>Durations</h2>
                <strong>Waiting</strong> - The duration for the waiting period cannot be set.<br>
                <strong>In</strong> - Default 1000. The time (in scroll-bar ticks) for the transition in to view.<br>
                <strong>Paused</strong> - Default 2000. The time (in scroll-bar ticks) for the frame to remain centered in the browser.<br>
                <strong>Out</strong> - The duration for the out period cannot be set.<br>
                <strong>Complete</strong> - The duration for the complete period cannot be set<br>
                <pre>*The first frame cannot have a waiting or in duration. First possible state is always "paused".<br>*The last frame cannot have an out or compete duration. Last possible state is always "paused".<br>*The out duration is auto set based upon the next frames in duration.</pre>
            </div>
        </div>
    </article>

    <article id="transitions" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">Transitions</header>
        <img class="parallax-item-bg" src="images/bg4.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogoi2"></div>
            <div class="margintop10 padding10 white blackbg text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <pre><strong>The frames have multiple transition options.</strong></pre>
                <h2>Transitions/Types</h2>
                Transitions are placed as a type, and an in-direction (for slides).<br>
                There are two types of transitions: <strong>SLIDE, and FADE</strong><br>
                <div>
                    <div class="float-left w50p code">
                        Type: <strong>SLIDE</strong><br>
                        <div class="code">
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;Top</strong> - the frame will slide in from the top<br>
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;Right</strong> - the frame will slide in from the right<br>
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;Left</strong> - the frame will slide in from the left<br>
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;Bottom</strong> - the frame will slide in from the bottom<br>
                        </div>
                    </div>
                    <div class="float-right w50p">
                        Type: <strong>FADE</strong><br>
                        The fade transition will fade in and out of view
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <pre>*The out transition will always match the next frames in transition. For fades, the frame will fade out as the new frame fades in. If the new frame is sliding in from the left, then the current frame will slide out the right (top/bottom, left/right, right/left, bottom/top).</pre>
            </div>
        </div>
    </article>

    <article id="html5" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">HTML5 Config</header>
        <img class="parallax-item-bg" src="images/bg5.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <pre><strong>For setting durations, types, directions in HTML5. Use the handy data attribute to set your parameters.</strong></pre>
                <h2>HTML5 Configuration</h2>
                <div>
                    <div class="float-left w50p text-left">
                        <strong>Grouped Attribute</strong><br>
                        <div class="code">
                            &lt;article id="frame_id" class="parallax-item"<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;data-parallax='{<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"type":"fade", &lt;!-- may be fade or slide (default slide) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"inDuration":1000, &lt;!-- # >= 0 (default 1000) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pauseDuration":1000, &lt;!-- # >= 0 (default 1000) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"inDirection":"bottom" &lt;!-- used with type:slide, may be top,bottom,left,right (default bottom) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;}'>...&lt;/article><br>
                        </div>
                        <pre>**Note: MUST use well formatted json.</pre>
                    </div>
                    <div class="float-right w50p text-left">
                        <strong>Single Attributes</strong><br>
                        <div class="code">
                            &lt;article id="frame_id" class="parallax-item"<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;data-parallax-type="fade" &lt;!-- may be fade or slide (default slide) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;data-parallax-in-duration="1000" &lt;!-- # >= 1 (default 1000) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;data-parallax-pause-duration="1000" &lt;!-- # >= 1 (default 1000) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;data-parallax-in-direction="bottom" &lt;!-- used with type:slide, may be top,bottom,left,right (default bottom) --><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;}'>...&lt;/article>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <pre>*The single item HTML data attributes will override the grouped json encoded single data attribute.
                To view the full list of HTML options, go to <a href="http://www.jldemos.com/parallax/docs">Docs</a></pre>
            </div>
        </div>
    </article>

    <article id="javascript" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">Javascript Configuration</header>
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
                <h2>Javascript Configuration</h2>
                <div class="text-left">
                    <div class="code">
                        $('section.parallax-container').parallax({<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;item_options: {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;frame_id: {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;type: "slide",<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inDuration: 1000,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pauseDuration: 2000,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inDirection: "bottom"<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        });
                    </div>
                    <div class="clear"></div>
                    <pre>*The javascript options will override any HTML attributes/options previously set
                    To view the full list options, go to <a href="http://www.jldemos.com/parallax/docs">Docs</a></pre>
                </div>
            </div>
        </div>
    </article>

    <article id="notes" class="parallax-item" <?php echo $pstring; ?>>
        <header class="parallax-item-title">Notes</header>
        <img class="parallax-item-bg" src="images/bg7.jpg" />
        <div class="parallax-item-content">
            <div class="center margintop10 plogo2"></div>
            <div class="margintop10 padding10 whitebg black text-center">
                <div class="size32 padding10">
                    jQuery Plugin to Revolutionize Site Scrolling
                </div>
            </div>
            <div class="margintop10 shadow border5 w60p center padding10 whitebg black text-center">
                <h2>Some additional notes on frames, and more options.</h2>
                <pre><strong>Title: </strong> can be set with a header element <span class="blackbg white">&ltheader class="parallax-item-title">Frame Title&lt/header></span>
                Titles are hidden by default, and are used when using the built in Navigation.</pre>

                <pre><strong>Backgrounds: </strong> can be set with <span class="blackbg white">&lt;img class="parallax-item-bg" src="path-to-image" /></span>
                Backgrounds are matched to the size of the screen resolution, so they are matched depending on width and/or height.
                Even when the screen is resized, Parallax will recalculate the best option to fill the frame with the background image.</pre>

            </div>
        </div>
    </article>

    <article id="events" class="parallax-item" <?php echo $pstring; ?>>
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

    <article id="callbacks" class="parallax-item" <?php echo $pstring; ?>>
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
    $('section#parallax-container').parallax({});
    var stop = true;function autoScroll() {if( stop ) {stop = false;$("html, body").animate({ scrollTop: $(document).height() }, $(document).height() - $(window).scrollTop());} else {stop = true;$("html,body").clearQueue().stop();}}
</script>
<div class="clear" id="end"></div>
</body>
</html>

