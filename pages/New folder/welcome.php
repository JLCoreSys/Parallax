<article id="welcome" class="parallax-frame" title="Welcome" data-frame-options-pause-duration="0">
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg1.jpg"/>
    <div class="parallax-frame-content">
        <?php include( 'pages/header.php' ); ?>
        <div id="welcome_scroll" class="jlscrolldown pointer parallax-sprite   text-center center large" onclick="$('#auto-scroll').click();"
            data-sprite-animations='[{
                "start": {
                    "offset_type":"out"
                },
                "end": {
                    "offset":1000,
                    "left":"-{ww}/2",
                    "top":-125,
                    "opacity":0
                }
            }]'
            >
            Scroll Down
        </div>
    </div>
</article>