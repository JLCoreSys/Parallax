<article id="test" title="Test" class="parallax-frame"
    data-frame-options-pause-duration="0"
    >
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg1.jpg" />
    <div class="parallax-frame-content no-overflow">
        <?php include('pages/header.php'); ?>
        <div class="center text-center med-margin-top">
            <img src="./media/images/plogo2.png" class="plogo2" />
            <div id="welcome_scroll" class="jlscrolldown pointer parallax-sprite   text-center center large" onclick="$('#auto-scroll').click();"
                 data-sprite-animations='[{
                "start": {
                    "offset_type":"out"
                },
                "end": {
                    "offset":800,
                    "left":"-{ww}/2",
                    "opacity":0
                }
            }]'
                >
                Scroll Down
            </div>
        </div>
    </div>
</article>