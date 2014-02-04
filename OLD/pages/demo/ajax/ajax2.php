<style>
    .codeview { background: rgba(255, 255, 255, .8); width: 80%; height: 400px; overflow: auto; padding: 10px; margin: 10px auto 2px auto; box-shadow: 0 0 8px #333; color: #000; }
    div.center { width: 60%; min-width: 320px; height: auto; }
</style>
<div class="padding10">&nbsp;</div>
<div class="padding10 whitebg black text-center parallax-sprite"
     data-parallax='[
            {
                "start": {
                    "offsetType":"in",
                    "offset":500,
                    "left":"-{ww}"
                },
                "end": {
                    "offsetType":"pause"
                }
            },{
            "start":{
                "offsetType":"pause",
                "offset":3000
            },
            "end":{
                "offsetType":"pause",
                "offset":3500,
                "opacity":0
            }
            }
            ]'
    >
    Easy to use
</div>
<div class="padding10 white blackbg text-center parallax-sprite"
     data-parallax='[
            {
                "start": {
                    "offsetType":"pause",
                    "left":"{ww}"
                },
                "end": {
                    "offsetType":"pause",
                    "offset":500
                }
            },{
            "start":{
                "offsetType":"pause",
                "offset":3000
            },
            "end":{
                "offsetType":"pause",
                "offset":3500,
                "opacity":0
            }
            }
            ]'>
    jQuery Plugin
</div>
<div class="padding10 whitebg black text-center parallax-sprite"
     data-parallax='[
            {
                "start": {
                    "offsetType":"pause",
                    "offset":500,
                    "left":"-{ww}"
                },
                "end": {
                    "offsetType":"pause",
                    "offset":1000
                }
            },{
            "start":{
                "offsetType":"pause",
                "offset":3000
            },
            "end":{
                "offsetType":"pause",
                "offset":3500,
                "opacity":0
            }
            }
            ]'>
    Use HTML5 To control your page
</div>
<div class="padding10 white blackbg text-center parallax-sprite"
     data-parallax='[
            {
                "start": {
                    "offsetType":"pause",
                    "offset":1500,
                    "opacity":0
                },
                "end": {
                    "offsetType":"pause",
                    "offset":2000
                }
            },{
            "start":{
                "offsetType":"pause",
                "offset":3000
            },
            "end":{
                "offsetType":"pause",
                "offset":3500,
                "opacity":0
            }
            }
            ]'>
    Or use options in the jQuery plugin
</div>
<div class="border5 codeview parallax-sprite nooverflow"
     data-parallax='[
            {
                "start": {
                    "offsetType":"pause",
                    "offset":2000,
                    "height":0,
                    "opacity":0
                },
                "end": {
                    "offsetType":"pause",
                    "offset":2500
                }
            },{
            "start":{
                "offsetType":"pause",
                "offset":3000
            },
            "end":{
                "offsetType":"pause",
                "offset":3500,
                "opacity":0
            }
        }
            ]'>
    <div class="text-center"><strong>Sample Initialization</strong></div>
    <br>
    &lt;script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">&lt;/script><br>
    &lt;script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js">&lt;/script><br>
    &lt;script src="parallax.js">&lt;/script><br>
    &lt;script type="text/javascript"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;/* DO NOT USE ON READY */<br>
    &nbsp;&nbsp;&nbsp;&nbsp;$('section#parallax-container').parallax({});<br>
    &lt;/script><br>
    <div class="text-center"><strong>Sample HTML5 Frame</strong></div>
    <br>
    &lt;section class="parallax-container"<br>
    &nbsp;&nbsp;&nbsp;&lt;article class="parallax-item" id="frame1"<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-type="fade"&nbsp;&nbsp;&lt;!-- optional(default=slide) can be fade or slide --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-inDuration="1000"&nbsp;&nbsp;&lt;!-- optional(default=1000) #scroll ticks for the in transition --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-inDirection="top"&nbsp;&nbsp;&lt;!-- optional(default=bottom) Direction the frame will come in from --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-pauseDuration="1000"&nbsp;&nbsp;&lt;!-- optional(default=2000) #scroll ticks for the pause transition --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-outDuration="1000"&nbsp;&nbsp;&lt;!-- optional(default=1000) #scroll ticks for the out transition --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;data-parallax-css="1000"&nbsp;&nbsp;&lt;!-- optional({}) Custom css to add to the frame after load --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;header>Frame title&lt;/header>&nbsp;&nbsp;&lt;!-- hidden by default --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img class="parallax-item-bg" src="path/to/background.jpg" />&nbsp;&nbsp;&lt;!-- hidden by default --><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="parallax-item-content"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!-- YOUR FRAME CONTENT --><br>
    &nbsp;&nbsp;&nbsp;&lt;/article><br>
    &lt;/section>
</div>
<div class="center op0 rounded5 shadow white blackbg padding10 parallax-sprite"
        data-parallax='[{
            "start":{
                "offsetType":"pause",
                "offset":3000,
                "opacity":0
            },
            "end":{
                "offsetType":"pause",
                "offset":3500
            }
        }]'
    >
    <div class="text-center size32">THANK YOU</div>
    <div class="padding10"></div>
    <div class="margin-top-10 text-center">
        To view more demos:<br><br>
        <a href="demos/noconfig" target="_blank">No Configuration Demo</a><br>
        <a href="demos/frames" target="_blank">Frames Demo</a><br>
        <a href="demos/sprites" target="_blank">Sprites Demo</a><br>
        <a href="demos/simple" target="_blank">simple Demo</a><br>
        This page is the Complex Demo.<br>
        <a class="viewsrc" href="javascript:void(0);" target="_blank">View the source</a> to see how it was done.
        <br><br><br>
        This script is not for the light of heart. <br>It can be as simple or as complex as you want it to be.<br>
        For full documentation and configuration settings<br>
        <a href="docs">Documentation</a>
        <br>
    </div>
</div>
<script type="text/javascript">
    function makeCenter() {
        var ww = $(window).width(),
            wh = $(window).height();
        $('.center').each(function(){
            $(this).css({
                top: Math.round( ( wh / 2 ) - ( $(this).height() / 2 ) ) + 'px',
                left: Math.round( ( ww / 2 ) - ( $(this).width() / 2 ) ) + 'px',
                position: 'absolute'
            });
        });
    }
    $(document).ready(function(){
        $('.viewsrc').attr('href', "view-source:" + window.location.href);
        console.log( $('.viewsrc').attr('href') );
        makeCenter();
        $(window).resize(function(){makeCenter();});
    })
</script>