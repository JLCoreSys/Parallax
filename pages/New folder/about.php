<article id="about" class="parallax-frame" title="About"
         data-frame-options-type="fade"
         data-frame-options-pause-duration="2000"
    >
    <img class="parallax-frame-bg" src="./media/images/backgrounds/orig/bg2.jpg" />
    <div class="parallax-frame-content">
        <div class="text-center">
            <div class="center">
                <img src="./media/images/plogo.png" class="plogo max50p"/>
            </div>
        </div>
        <div class="blackbg shadow text-center white small-padding-top small-padding-bottom">
            <h3>jQuery Plugin to Revolutionize Site Scrolling</h3>
        </div>
        <div class="shadow whitebg text-center small-padding-top small-padding-bottom browser-icons">
            <img src="./media/images/chrome.png" class="parallax-sprite"
                data-sprite-animations='[
                {"start":{"top":-200,"opacity":0,"offset":-500},"end":{"offset":0}},
                {"start":{"top":0,"opacity":1,"offset":1500},"end":{"offset":2000,"opacity":0,"top":-200}}
                ]' />
            <img src="./media/images/firefox.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-400},"end":{"offset":100}},
                 {"start":{"top":0,"opacity":1,"offset":1700},"end":{"offset":2200,"opacity":0,"top":-200}}
                 ]' />
            <img src="./media/images/safari.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-300},"end":{"offset":200}},
                 {"start":{"top":0,"opacity":1,"offset":1900},"end":{"offset":2400,"opacity":0,"top":-200}}
                 ]' />
            <img src="./media/images/opera.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-200},"end":{"offset":300}},
                 {"start":{"top":0,"opacity":1,"offset":2100},"end":{"offset":2600,"opacity":0,"top":-200}}
                 ]' />
            <img src="./media/images/ie9.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-100},"end":{"offset":400}},
                 {"start":{"top":0,"opacity":1,"offset":2300},"end":{"offset":2800,"opacity":0,"top":-200}}

                 ]' />
        </div>
        <div class="parallax-scroll parallax-sprite"
            data-sprite-animations='[{"start":{"opacity":0,"offset":300},"end":{"offset":1000}}]'>
            <div class="row-fluid">
                <div class="span10 offset1 fullwhitebg white-container parallax-scroll text-center small-text-left">
                    <div class="pbgfull"></div>
                    <h3 class="underline text-center">J&amp;L Core Systems - <a href="http://en.wikipedia.org/wiki/Parallax" target="_blank">Parallax</a></h3>
                        <p>A custom jQuery plugin to change the way you scroll your site. The site consists of frames with sprites.</p>
                        <p>Frames can fade, slide and rotate into view.</p>
                        <p>Frames use a parallax effect when transitioning into view, where the rear frame moves at a slower speed.</p>
                        <p>There are also animated sprites which can scale, translate and rotate.</p>
                        <p>Use the scroll-bar like a time-line to control transitions and sprite animations.</p>
                        <p>Full control over settings through HTML5 attributes or through Javascript.</p>
                        <p>Works on desktops and mobile devices.</p>
                    <h4 class="text-center">Keep scrolling down for more examples.</h4>
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