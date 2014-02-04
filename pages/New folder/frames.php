<article id="frames" class="parallax-frame" title="Frames"  data-frame-options-type="slide"
         data-frame-options-in-direction="top">
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg4.jpg" />
    <div class="parallax-frame-content">
        <div class="text-center">
            <div class="center">
                <img data-parallax-src="./media/images/plogoi.png" class="plogo max50p"/>
            </div>
        </div>
        <div class="whitebg shadow text-center black small-padding-top small-padding-bottom">
            <h3>jQuery Plugin to Revolutionize Site Scrolling</h3>
        </div>
        <div class="blackbg shadow white text-center small-padding-top small-padding-bottom">
            <h4>The Frames</h4>
        </div>
        <div class="row-fluid">
            <div class="span10 offset1 small-margin-top shadow whitebg black padding rounded5 parallax-scroll text-center">
                <div class="row-fluid">
                    <div class="span4 offset4 shadow text-center" id="frames_target">
                        <div class="frame-frames med-padding">
                            <div class="frame-frame">
                                <h2>Fade In</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/1.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Slide from TOP</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/2.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Slide from BOTTOM</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/3.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Slide from LEFT</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/4.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Slide from RIGHT</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/5.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Rotate RIGHT</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/6.jpg" />
                            </div>
                            <div class="frame-frame">
                                <h2>Rotate LEFT</h2>
                                <img class="rounded5" data-parallax-src="./media/images/backgrounds/small/8.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $prev = '#123';
                $next = '#321';
                include( dirname(__FILE__) . '/playbar.php');
                ?>
            </div>
        </div>
    </div>
</article>