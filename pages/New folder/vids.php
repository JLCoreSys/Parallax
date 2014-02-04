<article id="video" class="parallax-frame" title="Video"
         data-frame-options-in-direction="right"
         data-frame-options-pause-duration="8000"
    >
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg7.jpg"/>
    <div class="parallax-frame-content parallax-no-scroll">
        <div class="text-center">
            <div class="center">
                <img data-parallax-src="./media/images/plogo.png" class="plogo3 max50p"/>
            </div>
        </div>
        <div class="blackbg shadow text-center white small-padding-top small-padding-bottom">
            <h3>jQuery Plugin to Revolutionize Site Scrolling</h3>
        </div>
        <div class="shadow whitebg text-center black small-padding-top small-padding-bottom browser-icons">
            We have also added video still playbacks
        </div>
        <style>
            .video-container {
                width: 640px;
                height: 266px;
            }
            .videos {
                width: 640px;
                height: 266px;
            }
            .videos img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .video-container.med,
            .videos.med {
                width: 480px;
                height: 200px;
                margin: 0 auto;
            }
            .video-container.small,
            .videos.small {
                width: 320px;
                height: 133px;
                margin: 0 auto;
            }
        </style>
        <?php
        $im_frames = array();
        for($i = 1; $i <= 120; $i++) {
            if($i < 10) {
                $img = '00' . $i . '.jpg';
            } else if($i < 100) {
                $img = '0' . $i . '.jpg';
            } else {
                $img = $i . '.jpg';
            }
            $im_frames[] = '"' . $img . '"';
        }
        $im_frames = implode(',',$im_frames);
        ?>
        <div class="video-container whitebg black med-margin-top center rounded5 shadow padding10">
            <div class="videos rounded5 parallax-sprite parallax-force-debug"
                data-sprite-animations='[{
                    "frames":[<?php echo $im_frames; ?>],
                    "frames_folder": "./media/images/im3/",
                    "frame_sizes": [
                        {"from":0,"to":480,"folder":"./media/images/im3/small/","image_cls":"small","parent_cls":"small"},
                        {"from":481,"to":640,"folder":"./media/images/im3/med/","image_cls":"med","parent_cls":"med"}
                    ],
                    "fps":15
                }]'
                >
                <img src="./media/images/im3/001.jpg" />
                <img src="./media/images/im3/002.jpg" />
                <img src="./media/images/im3/003.jpg" />
            </div>
        </div>

        <div class="whitebg black row-fluid padding-top padding-bottom margin-top">
            <div class="span8 offset2">
                <?php
                include( dirname(__FILE__) . '/playbar.php');
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="whitebg text-center black small-padding margin-top">Images copyright &copy; <a href="http://journey.lifeofpimovie.com" target="_blank">Life of Pi Movie</a></div>
    </div>
</article>