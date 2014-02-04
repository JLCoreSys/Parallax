<article id="sprites" class="parallax-frame" title="Sprites"  data-frame-options-type="slide"
         data-frame-options-in-direction="left">
    <img class="parallax-frame-bg" src="./media/images/backgrounds/orig/bg5.jpg" />
    <div class="parallax-frame-content">
        <div class="text-center">
            <div class="center">
                <img data-parallax-src="./media/images/plogo.png" class="plogo max50p"/>
            </div>
        </div>
        <div class="whitebg shadow text-center black small-padding-top small-padding-bottom">
            <h3>jQuery Plugin to Revolutionize Site Scrolling</h3>
        </div>
        <div class="blackbg shadow white text-center small-padding-top small-padding-bottom">
            <h4>The Sprites</h4>
        </div>
        <div class="row-fluid">
            <div class="sprites-target span10 offset1 small-margin-top shadow whitebg black padding rounded5 parallax-scroll text-center">
                <div class="row-fluid">
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Fade IN</div>
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Fade OUT</div>
                </div>
                <div class="row-fluid">
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Translate Right</div>
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Translate Left</div>
                </div>
                <div class="row-fluid">
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Scale Width</div>
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Scale Height</div>
                </div>
                <div class="row-fluid">
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Rotate Right</div>
                    <div class="span6 line-height30 shadow blackbg rounded5 small-margin-bottom white">Rotate Left</div>
                </div>
                <div class="row-fluid">
                    <div class="span12 line-height30 shadow blackbg rounded5 small-margin-bottom white">Multiple Animations</div>
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