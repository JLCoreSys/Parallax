<article id="loader" class="parallax-frame" title="Loader" data-frame-options-in-direction="left" data-frame-options-pause-duration="2000">
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg9.jpg" />
    <div class="parallax-frame-content parallax-no-scroll">
        <?php include( 'pages/header.php' ); ?>
        <div class="med-margin-top blackbg white padding text-center">
            <h4>Parallax Loader</h4>
        </div>
        <div class="row-fluid">
            <div class="span8 offset2 med-margin-top blackbg white padding text-center parallax-sprite"
                data-sprite-animations='[{
                "start":{
                "opacity":0,
                "top":-180
                },
                "end":{
                    "offset":500
                }
                }]'
                >
                <p>There is an optional loader built into Parallax. This loader will preload all the frames, sprites, animations, animation frames, scrollers, and any specified images prior to displaying the site to the user.</p>
                <p>The loader uses triggers and callbacks to process information and is only updated on successful completion of each task.</p>
                <p>This is a true loader as it will wait for all components of your page to be downloaded before updating its status.</p>
                <br>
                <p>This demo page used the loader</p>
                <p>See the documentation on the loader for more information.</p>
            </div>
        </div>
    </div>
</article>