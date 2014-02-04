<article id="sample2" class="parallax-frame" title="Sample 2"
         data-frame-options-in-direction="left"
         data-frame-options-pause-duration="8500"
    >
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg3.jpg"/>
    <div class="parallax-frame-content parallax-no-scroll">
        <?php include( 'pages/header.php' ); ?>
        <div class="shadow whitebg text-center black small-padding-top small-padding-bottom browser-icons">
            What else can be done?
        </div>
        <div class="whale-container whitebg black med-margin-top center rounded5 padding10 parallax-sprite" data-sprite-animations='[{"start": {"offset":3800},"end": {"offset":4800,"height":0,"opacity":0}}]'>
            <div class="first-whale rounded5 absolutetl shadow"></div>
            <div class="second-whale rounded5 absolutetl parallax-sprite shadow" data-sprite-animations='[{"start":{"width":0},"end":{"offset":1000}},{"start":{"offset":2800},"end":{"offset":3800,"height":0}}]'></div>
            <div class="third-whale rounded5 absolutetl  parallax-sprite shadow" data-sprite-animations='[{"start":{"offset":800,"width":0},"end":{"offset":1800}},{"start":{"offset":2000},"end":{"offset":3000,"height":0}}]'></div>
        </div>
        <div class="tiger-container whitebg black med-margin-top center rounded5 padding10 parallax-sprite" data-sprite-animations='[{"start": {"offset":3800,"height":0,"opacity":0},"end": {"offset":4800}}]'>>
            <div class="first-tiger rounded5 absolutetr shadow"></div>
            <div class="second-tiger rounded5 absolutetr parallax-sprite shadow" data-sprite-animations='[{"start":{"width":0,"offset":4800},"end":{"offset":5800}},{"start":{"offset":7500},"end":{"offset":8500,"height":0}}]'></div>
            <div class="third-tiger rounded5 absolutetr  parallax-sprite shadow" data-sprite-animations='[{"start":{"offset":5600,"width":0},"end":{"offset":6600}},{"start":{"offset":6700},"end":{"offset":7700,"height":0}}]'></div>
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