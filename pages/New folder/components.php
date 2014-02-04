<article id="components" class="parallax-frame" title="Components"
         data-frame-options-pause-duration="7000"
         data-frame-options-type="slide"
         data-frame-options-in-direction="top">
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg5.jpg" />
    <div class="parallax-frame-content no-overflow">
        <div class="text-center">
            <div class="center">
                <img data-parallax-src="./media/images/plogo.png" class="plogo3 max50p"/>
            </div>
        </div>
        <div class="whitebg shadow text-center black small-padding-top small-padding-bottom">
            <h3>jQuery Plugin to Revolutionize Site Scrolling</h3>
        </div>
        <div class="blackbg shadow text-center white small-padding-top small-padding-bottom">
            <strong>Frames, Ajax, Sprites, Loader, Navigation, Progress Indicator</strong>
        </div>
        <div class="">
            <div class="row-fluid no-overflow parallax-sprite"
                    data-sprite-animations='[
                    {
                        "start":{
                            "offset":500
                        },
                        "end":{
                            "offset":1000,
                            "height":0,
                            "opacity":0,
                            "left":"{ww}/4"
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Frames </strong>
                    are <a href="#welcome" class="parallax-scroll-to">TEST</a> the main component to the Parallax plugin. Each frame consists of a page or section of your website.<br>
                    These frames can be controlled through HTML5 or Javascript options.
                    <h4 class="text-center">Keep scrolling down for frame examples.</h4>
                    <?php
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":500,
                            "opacity":0,
                            "height":0,
                            "left":"-{ww}/4"
                        },
                        "end":{
                            "offset":1000
                        }
                    },{
                        "start":{
                            "offset":1500
                        },
                        "end":{
                            "offset":2000,
                            "height":0,
                            "opacity":0,
                            "top":"{wh}/4"
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Ajax </strong>
                    is enabled for the Parallax plugin. Each frame has the option to be loaded via ajax. All the main site needs is the container, and the options set for the url to load. A threshold can be set to load the content prior to being shown. All sprites and settings contained in the ajaxed content will be processed and added to the page.
                    <h4 class="text-center">Keep scrolling down for ajax examples.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":1500,
                            "opacity":0,
                            "height":0,
                            "top":"-{wh}/4"
                        },
                        "end":{
                            "offset":2000
                        }
                    },{
                        "start":{
                            "offset":2500
                        },
                        "end":{
                            "offset":3000,
                            "height":0,
                            "opacity":0,
                            "left":"-{ww}/4"
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Sprites </strong>
                    are animated layers for spicing up your pages. They can be translated, rotated, faded, and scaled. Sprites are controlled via the scroll-bar used as a timeline. Each sprite can have multiple animations at specified key points in a frames transition state.
                    <h4 class="text-center">Keep scrolling down for sprite examples.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":2500,
                            "opacity":0,
                            "height":0,
                            "left":"{ww}/4"
                        },
                        "end":{
                            "offset":3000
                        }
                    },{
                        "start":{
                            "offset":3500
                        },
                        "end":{
                            "offset":4000,
                            "height":0,
                            "opacity":0,
                            "top":"-{wh}/4"
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Loader: </strong>
                    The loader is an optional setting which can be altered through javascript settings. Full css control through overriding the CSS or adding at load time through the plugin. The loader is a true loader and will preload the sites non-ajaxed frames, all the content and sprites. The loader will display until all component have been successfully loaded and available to the user.<br>
                    This demo page used the loader option.
                    <h4 class="text-center">Keep scrolling down for more.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":3500,
                            "opacity":0,
                            "height":0,
                            "top":"{wh}/4"
                        },
                        "end":{
                            "offset":4000
                        }
                    },{
                        "start":{
                            "offset":4500
                        },
                        "end":{
                            "offset":5000,
                            "height":0,
                            "opacity":0
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Navigation: </strong>
                    Much like the loader, this is an optional setting. Each frame has a title, which will be used for the navigation menu. The navigation menus CSS can be overridden or be altered at runtime through javascript. When enabled, the navigation will scroll to the selected part of the site, the time it takes depends on the distance the target frame is in the time-line. The time it takes to navigate is an option which can be set through the plugin.
                    This demo page uses the built in navigation menu. Try out the navigation menu.
                    <h4 class="text-center">Keep scrolling down for more.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":4500,
                            "opacity":0,
                            "height":0
                        },
                        "end":{
                            "offset":5000
                        }
                    },{
                        "start":{
                            "offset":5500
                        },
                        "end":{
                            "offset":6000,
                            "height":0,
                            "opacity":0,
                            "rotation":180
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Progress Indicator: </strong><br>
                    We have found that when a frame is in pause mode and not moving users were unsure if they were still scrolling or not. So we have added an optional progress indicator to show the current position in the paused state. As the users scrolls down, the progress indicator will show where they are in the state.<br>
                    The progress indicator on this site is to the left.
                    <h4 class="text-center">Keep scrolling down for more.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
            <div class="row-fluid no-overflow parallax-sprite"
                 data-sprite-animations='[
                    {
                        "start":{
                            "offset":5500,
                            "opacity":0,
                            "height":0,
                            "rotation":-180
                        },
                        "end":{
                            "offset":6000
                        }
                    }
                    ]'
                >
                <div class="span8 offset2 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <strong>Many Other Features: </strong>
                    <p>Frame backgrounds will auto adjust as your screen size changes and will determine the appropriate dimensions to use so that you will NEVER see any of those black bars on the top or sides.</p>
                    <p>There are several other features to the Parallax plugin. There are scroll-to options for manual navigation through the site.</p>
                    <p>There is a playbar with a previous frame button to go back one frame, a next frame button to go forward one frame, and a play button to play the current frame.</p>
                    <p>Automatic detection of internal site links by using a class on link tags.</p>
                    <p>There are many callbacks for additional scripting ( see DOCS for full details )</p>
                    <br>
                    <p>We are always looking for new ideas to add. Let us know what you would like to see added and we will see what we can do to add it to the next release.</p>
                    <h4 class="text-center">Keep scrolling down for EXAMPLES and DOCS.</h4>
                    <?php
                    $prev = '#123';
                    $next = '#321';
                    include( dirname(__FILE__) . '/playbar.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>