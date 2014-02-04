<style>
    .jllogo {width: 212px;height: 125px;margin: 0 auto;background: transparent url(images/logo.png) no-repeat center center; }
    .jlname {margin: -28px auto 0 auto;font-weight: bold;text-align: center;display: block;color: #FFF;background: rgba(0,0,0,.75);}
    .jlname h1 { font-size: 32px; }
    .jlscrolldown { width:100px; height: 45px; margin: 10px auto 20px auto; background: transparent url(images/arrow.png) no-repeat top center; color: #fff; text-align: center; padding-top: 50px; }
    .jldots { width: 20px; height: 50px; margin: 0 auto; background: transparent url(images/dot.png) repeat-y top center; }
    .jlpresents { margin: 50px auto 10px auto;font-weight: bold;font-size:46px;color:#FFF;text-align:center;text-shadow: 0px 0px 6px #000; }
    .jlparallax { margin: 10px auto; font-size: 80px;text-shadow: 0px 0px 6px #000; text-align:center; }
    .blink { text-decoration: blink; }
    .blackbg { background-color: rgba(0,0,0,.75); }
    .whitebg { background-color: rgba(255,255,255,.75); }
    .padding10 { padding: 10px; }
    .border5,
    .rounded5 { border-radius: 5px; -moz-border-radius: 5px; -o-border-radius: 5px; -webkit-border-radius: 5px; }
    .inline-block { display: inline-block; }

    @media only screen and (max-width:480px){
        .jllogo {width: 159px;height: 94px;background-size: 100% 100%; }
        .jlname {margin: -18px auto 0 auto;}
        .jlname h1 { font-size: 24px; }
        .jlscrolldown { height: 25px; margin: 10px auto 20px auto; background: transparent url(images/arrow.png) no-repeat top center; color: #fff; text-align: center; padding-top: 50px; }
        .jldots { display: none; }
        .jlpresents { margin: 10px auto 5px auto; font-size: 24px; }
        .jlparallax { margin: 5px auto; font-size: 46px; }
    }
</style>
<article id="parallax-item-demo1" class="parallax-item"
        data-parallax-css='{"background-color":"black"}'
        data-parallax-in-duration="1000"
        data-parallax-pause-duration="4500"
        data-parallax-out-duration="2000"
    >
    <header class="parallax-item-title">Demo1</header>
    <img src="images/backgrounds/demos/1.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content">
        <div class="jllogo"></div>
        <div class="jlname"><h1>Core Systems</h1></div>
        <div class="jlscrolldown">
            <div class="jldots"></div>
            <span id="sd1" class="blink parallax-sprite"
			data-parallax='[{
				"start":{
					"offsetType":"out",
					"offset":0
				},
				"end":{
					"offsetType":"complete",
					"opacity":0.5
				}
			}]'
			>Scroll Down</span>
        </div>
        <div id="demo1-presents" class="jlpresents parallax-sprite"
            data-parallax='[
                {
                    "start": {
                        "offsetType":"pause",
                        "left":"-{ww}",
                        "opacity":0
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":500
                    }
                },{
                    "start": {
                        "offsetType":"pause",
                        "offset":4000
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":4500,
                        "left":"{ww}",
                        "opacity":0
                    }
                }
            ]'
            >Presents</div>
        <div class="jlparallax parallax-sprite"
             data-parallax='[
                {
                    "start": {
                        "offsetType":"pause",
                        "offset":1000,
                        "rotation":-180,
                        "opacity":0
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":1500
                    }
                },
                {
                    "start": {
                        "offsetType":"pause",
                        "offset":3500
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":4000,
                        "rotation":180,
                        "opacity":0
                    }
                }
            ]'
            ><strong>PARALLAX</strong></div>
        <div class="text-center padding10 parallax-sprite">
            <span class="parallax-sprite blackbg padding10 rounded5"
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
            ]'
            >
            Scroll down through the site to view all the features
                </span>
        </div>
    </div>
</article>
<style>
    .browser-icons-container { width: 315px; height: 90px; margin: 10px auto; }
    .browser-icons-container>div { width: 60px;height: 90px; margin: 0;padding: 0; display:inline-block;border:none;}
    .icon-chrome { background: transparent url(images/browsers/chrome.png) no-repeat center center; }
    .icon-firefox { background: transparent url(images/browsers/firefox.png) no-repeat center center; }
    .icon-opera { background: transparent url(images/browsers/opera.png) no-repeat center center; }
    .icon-ie { background: transparent url(images/browsers/ie.png) no-repeat center center; }
    .icon-safari { background: transparent url(images/browsers/safari.png) no-repeat center center; }
    span { position: relative; display: block; }
    .black { color: black; }
    .white { color: white; }
    .size32 { font-size: 32px; }
    .width100p { width: 100%; }
    .margin-top-10 { margin-top: 10px; }
    .top10 { top: 10px; }
    .top15 { top: 15px; }
    ul.list, ul.list li { list-style: none; margin: 0; padding: 0; }

    @media only screen and (max-width:480px){
        .browser-icons-container { height: 80px; margin: 5px auto 0px auto; }
        .size32 { font-size: 24px; }
        .margin-top-10 { margin-top: 5px; }
        .padding10 { padding: 5px; }
        .top15 { top: 5px; }
        .top10 { top: 0px; }
        ul.list li { margin: 0 2px; padding: 0 !important; line-height: 16px; }
        ul.list li strong { font-size: 16px; font-weight: normal; }
    }
</style>
<article id="parallax-item-demo2" class="parallax-item"
         data-parallax-css='{"background-color":"black"}'
         data-parallax-in-duration="1000"
         data-parallax-pause-duration="4000"
         data-parallax-out-duration="2000"
         data-parallax-in-direction="bottom"
    >
    <header class="parallax-item-title">Demo2</header>
    <img src="images/backgrounds/demos/2.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content">
        <div class="text-center whitebg"><span class="size32 parallax-sprite black"
                data-parallax='[
                {
                    "start":{
                        "offsetType":"in",
                        "opacity":0,
                        "top":-100
                    },
                    "end":{
                        "offsetType":"in",
                        "offset":500
                    }
                }
                ]'
                ><strong>Developed and Tested in:</strong></span></div>
        <div class="browser-icons-container">
            <div class="icon-chrome parallax-sprite"
                data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":-500,
                        "top":-200
                    },
                    "end":{
                        "offsetType":"pause"
                    }
                }
                ]'
                ></div>
            <div class="icon-firefox parallax-sprite"
                 data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":-100,
                        "top":-200
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":400
                    }
                }
                ]'></div>
            <div class="icon-opera parallax-sprite"
                 data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":300,
                        "top":-200
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":800
                    }
                }
                ]'></div>
            <div class="icon-safari parallax-sprite"
                 data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":700,
                        "top":-200
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":1200
                    }
                }
                ]'></div>
            <div class="icon-ie parallax-sprite"
                 data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":1100,
                        "top":-200
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":1600
                    }
                }
                ]'></div>
        </div>
        <div class="padding10 text-center">
            <div class="jlscrolldown width100p">
                <strong class="margin-top-10 top15 rounded5 whitebg black padding10">KEEP SCROLLING DOWN</strong>
            </div>
        </div>
        <div class="text-center size32">
            <ul class="list parallax-sprite"
                data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":3500
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":4000,
                        "opacity":0,
                        "top":"-{wh}"
                    }
                    }]'>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":500
                    }
                    }]'
                    ><strong>HTML5 and/or JS Controlled</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":400,
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":900
                    }
                    }]'><strong>New Way to Scroll Through a Site</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":800,
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":1300
                    }
                    }]'><strong>Frames that SLIDE or FADE</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":1200,
                        "left":"-{ww}"
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":1700
                    }
                    }]'><strong>Slide up, Slide down, Slide left, Slide right</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":1600,
                        "left":"{ww}"
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":2100
                    }
                    }]'><strong>Custom backgrounds for each frame</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":2000,
                        "rotation":-180,
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":2500,
                        "rotation":0
                    }
                    }]'><strong>Animated Sprites</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":2400,
                        "top":"-{wh}",
                        "left":"-{ww}",
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":2900
                    }
                    }]'><strong>Fade, slide, rotate, and more</strong></li>
                <li class="parallax-sprite"
                    data-parallax='[{
                    "start":{
                        "offsetType":"pause",
                        "offset":2400,
                        "top":"{wh}",
                        "left":"{ww}",
                        "opacity":0
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":2900
                    }
                    }]'><strong>Control the timeline</strong></li>
            </ul>
        </div>
    </div>
</article>
<style>
    .titem { width: 50%; max-width: 500px; min-width: 240px; margin: 10px auto; display: block; background: rgba(0, 0, 0, .75); color: #FFF; text-align: center; font-size: 32px; }
    .op0 { opacity: 0; }
    .nooverflow { overflow: hidden; }
    .height100p { height: 100%; min-height: 1100px; }
    .height1200 { height: 1200px; }

    @media only screen and (max-width:480px){
        .titem { margin: 3px auto; font-size: 16px; line-height: 16px; }
    }
</style>
<article id="parallax-item-demo3" class="parallax-item"
         data-parallax-css='{"background-color":"black"}'
         data-parallax-in-duration="1000"
         data-parallax-pause-duration="7000"
         data-parallax-out-duration="2000"
         data-parallax-in-direction="right"
    >
    <header class="parallax-item-title">Demo3</header>
    <img src="images/backgrounds/demos/3.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content">
        <div class="padding10 text-center">
            <div class="jlscrolldown width100p">
                <strong class="margin-top-10 top15 rounded5 whitebg black padding10">KEEP SCROLLING DOWN</strong>
            </div>
        </div>
        <div class="parallax-sprite nooverflow height1200" data-parallax='[
                {
                    "start":{
                        "offsetType":"pause",
                        "offset":0,
                        "opacity":0,
                        "height":1200
                    },
                    "end":{
                        "offsetType":"pause",
                        "offset":500,
                        "height":1200
                    }
                },{
                    "start": {
                        "offsetType":"pause",
                        "offset":6000,
                        "height": 1200
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":6500,
                        "height":0
                    }
                }
                ]'>
            <div class="titem border5 padding10 parallax-sprite op0"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":500,
                    "opacity":0
                },
                "end":{
                    "offsetType":"pause",
                    "offset":1000
                }
                }]'
                ><strong>FADING IN</strong></div>
            <div class="titem border5 padding10 parallax-sprite"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":1000
                },
                "end":{
                    "offsetType":"pause",
                    "offset":1500,
                    "opacity":0
                }
                }]'><strong>FADING OUT</strong></div>
            <div class="titem border5 padding10 parallax-sprite"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":1500
                },
                "end":{
                    "offsetType":"pause",
                    "offset":2000,
                    "rotation":-180
                }
                }]'
                ><strong>ROTATING LEFT</strong></div>
            <div class="titem border5 padding10 parallax-sprite"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":2000
                },
                "end":{
                    "offsetType":"pause",
                    "offset":2500,
                    "rotation":180
                }
                }]'
                ><strong>ROTATING RIGHT</strong></div>
            <div class="titem border5 padding10 parallax-sprite op0"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":2500,
                    "opacity":0,
                    "left":"-{ww}"
                },
                "end":{
                    "offsetType":"pause",
                    "offset":3000
                }
                }]'><strong>SLIDING IN</strong></div>
            <div class="titem border5 padding10 parallax-sprite"
                 data-parallax='[{
                "start":{
                    "offsetType":"pause",
                    "offset":3000
                },
                "end":{
                    "offsetType":"pause",
                    "offset":3500,
                    "opacity":0,
                    "left":"{ww}"
                }
                }]'
                ><strong>SLIDING OUT</strong></div>
            <div class="titem border5 padding10 parallax-sprite op0"
                 data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":3500,
                            "opacity":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":4000
                        }
                    },{
                        "start":{
                            "offsetType":"pause",
                            "offset":4000,
                            "rotation":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":4500,
                            "rotation":-180
                        }
                    },{
                        "start":{
                            "offsetType":"pause",
                            "offset":4500,
                            "rotation":-180
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":5000
                        }
                    },{
                        "start":{
                            "offsetType":"pause",
                            "offset":5000,
                            "top": 0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":6000,
                            "top":"{wh}"
                        }
                    }
                 ]'
                ><strong>CHAINED ANIMATIONS</strong></div>
        </div>
        <div class="parallax-sprite whitebg black padding10" data-parallax='[
                {
                    "start": {
                        "offsetType":"pause",
                        "offset":6000,
                        "opacity":0
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":7000
                    }
                }
                ]'>
            <div class="size32 text-center">
                WAIT, THERES MORE<br>
                KEEP SCROLLING DOWN
                FOR THE REALLY COOL STUFF
            </div>
        </div>
    </div>
</article>
<style>
    .im3-container {
        width: 640px;
        height: 266px;
        margin: 25px auto 25px auto;
        overflow: hidden;
        border: 10px solid #FFF;
    }
    .im3-video {
        width: 100%;
        height: 100%;
    }

    .overlay1-container { width: 900px; height: 400px; margin: 10px auto; overflow:hidden; }
    .overlay1-container .left { float: left;width: 600px; height: 400px; margin: 0; padding: 0; }
    .overlay1-container .right { float: right; width: 300px; height: 400px; margin: 0; padding: 0; }
    .overlay1-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
    .overlay1-container .whale1 { background: transparent url(images/whale/1.jpg) no-repeat top left; width: 100%; height: 100%; }
    .overlay1-container .whale2 { background: transparent url(images/whale/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
    .overlay1-container .whale3 { background: transparent url(images/whale/3.jpg) no-repeat top left; width: 5%; height: 100%; }
    .overlay1-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
    .overlay1-container .tiger1 { background: transparent url(images/tiger/1.jpg) no-repeat top right; width: 100%; height: 100%; }
    .overlay1-container .tiger2 { background: transparent url(images/tiger/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
    .overlay1-container .tiger3 { background: transparent url(images/tiger/3.jpg) no-repeat top right; width: 5%; height: 100%; }

    .overlay2-container { width: 600px; height: 266px; margin: 10px auto; overflow:hidden; }
    .overlay2-container .left { float: left;width: 400px; height: 266px; margin: 0; padding: 0; }
    .overlay2-container .right { float: right; width: 200px; height: 266px; margin: 0; padding: 0; }
    .overlay2-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
    .overlay2-container .whale1 { background: transparent url(images/whale/small/1.jpg) no-repeat top left; width: 100%; height: 100%; }
    .overlay2-container .whale2 { background: transparent url(images/whale/small/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
    .overlay2-container .whale3 { background: transparent url(images/whale/small/3.jpg) no-repeat top left; width: 5%; height: 100%; }
    .overlay2-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
    .overlay2-container .tiger1 { background: transparent url(images/tiger/small/1.jpg) no-repeat top right; width: 100%; height: 100%; }
    .overlay2-container .tiger2 { background: transparent url(images/tiger/small/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
    .overlay2-container .tiger3 { background: transparent url(images/tiger/small/3.jpg) no-repeat top right; width: 5%; height: 100%; }

    .overlay3-container { width: 413px; height: 184px; margin: 10px auto; overflow:hidden; }
    .overlay3-container .left { float: left;width: 275px; height: 184px; margin: 0; padding: 0; }
    .overlay3-container .right { float: right; width: 138px; height: 184px; margin: 0; padding: 0; }
    .overlay3-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
    .overlay3-container .whale1 { background: transparent url(images/whale/tiny/1.jpg) no-repeat top left; width: 100%; height: 100%; }
    .overlay3-container .whale2 { background: transparent url(images/whale/tiny/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
    .overlay3-container .whale3 { background: transparent url(images/whale/tiny/3.jpg) no-repeat top left; width: 5%; height: 100%; }
    .overlay3-container .tiger {  position: absolute; top: 0; right: 0; width: 300px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
    .overlay3-container .tiger1 { background: transparent url(images/tiger/tiny/1.jpg) no-repeat top right; width: 100%; height: 100%; }
    .overlay3-container .tiger2 { background: transparent url(images/tiger/tiny/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
    .overlay3-container .tiger3 { background: transparent url(images/tiger/tiny/3.jpg) no-repeat top right; width: 5%; height: 100%; }

    .overlay4-container { width: 290px; height: 130px; margin: 10px auto; overflow:hidden; }
    .overlay4-container .left { float: left;width: 194px; height: 130px; margin: 0; padding: 0; }
    .overlay4-container .right { float: right; width: 96px; height: 130px; margin: 0; padding: 0; }
    .overlay4-container .whale {  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333;    }
    .overlay4-container .whale1 { background: transparent url(images/whale/tiny/1.jpg) no-repeat top left; width: 100%; height: 100%; }
    .overlay4-container .whale2 { background: transparent url(images/whale/tiny/2.jpg) no-repeat top left; width: 10%;  height: 100%; }
    .overlay4-container .whale3 { background: transparent url(images/whale/tiny/3.jpg) no-repeat top left; width: 5%; height: 100%; }
    .overlay4-container .tiger {  position: absolute; top: 0; right: 0; width: 96px; height: 100%; background-size: 100% auto;box-shadow: 0px 0px 7px #333;-moz-box-shadow: 0px 0px 7px #333;-o-box-shadow: 0px 0px 7px #333;-webkit-box-shadow: 0px 0px 7px #333; }
    .overlay4-container .tiger1 { background: transparent url(images/tiger/tiny/1.jpg) no-repeat top right; width: 100%; height: 100%; }
    .overlay4-container .tiger2 { background: transparent url(images/tiger/tiny/2.jpg) no-repeat top right; width: 10%;  height: 100%; }
    .overlay4-container .tiger3 { background: transparent url(images/tiger/tiny/3.jpg) no-repeat top right; width: 5%; height: 100%; }

    .overlay1-container { display: none; }
    .overlay2-container { display: none; }
    .overlay3-container { display: none; }
    .overlay4-container { display: block; }

    @media only screen and (min-width:360px){
        /* styles for browsers larger than 960px; */
        .overlay1-container { display: none; }
        .overlay2-container { display: none; }
        .overlay3-container { display: none; }
        .overlay4-container { display: block; }
    }

    @media only screen and (min-width:480px){
        /* styles for browsers larger than 960px; */
        .overlay1-container { display: none; }
        .overlay2-container { display: none; }
        .overlay3-container { display: block; }
        .overlay4-container { display: none; }
    }
    @media only screen and (min-width:768px){
        /* styles for browsers larger than 960px; */
        .overlay1-container { display: none; }
        .overlay2-container { display: block; }
        .overlay3-container { display: none; }
        .overlay4-container { display: none; }
    }
    @media only screen and (min-width:960px){
        /* styles for browsers larger than 960px; */
        .overlay1-container { display: block; }
        .overlay2-container { display: none; }
        .overlay3-container { display: none; }
        .overlay4-container { display: none; }
    }

    .ad-container { width: 2860px; height: auto; padding: 10px; margin-top: 25px; }
    .ad-container .ad { float: left; width: 240px; margin: 10px; border: 3px solid black; background: #FFF; text-align: center; padding: 10px; }
    .shadow-bottom {
        box-shadow: 0px 3px 8px #000;
        -webkit-box-shadow: 0px 3px 8px #000;
        -o-box-shadow: 0px 3px 8px #000;
        -moz-box-shadow: 0px 3px 8px #000;
    }

    @media only screen and (max-width:480px){
        .im3-container {
            width: 290px !important;
            height: 121px !important;
        }

        .im3-container img { width: 100%; height: 100%; }

        .margin-top-10 { margin-top: 2px; }
        .padding10 { padding: 2px; }
    }

</style>
<article id="parallax-item-demo4" class="parallax-item"
         data-parallax-css='{"background-color":"black"}'
         data-parallax-in-duration="1000"
         data-parallax-pause-duration="20000"
         data-parallax-out-duration="2000"
         data-parallax-in-direction="left"
    >
    <header class="parallax-item-title">Demo4</header>
    <img src="images/backgrounds/demos/4.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content">
        <div class="nooverflow height1200 parallax-sprite" data-parallax='[{
            "start": {
                "offsetType":"pause",
                "offset":13000,
                "height":1200
            },
            "end": {
                "offsetType":"pause",
                "offset":14000,
                "height":0
            }
        }]'>
            <div class="margin-top-10 padding10 whitebg black text-center parallax-sprite"
                data-parallax='[
                {
                "start": {
                "offsetType":"in",
                "offset":500,
                "opacity": 0
                },
                "end": {
                "offsetType":"pause"
                }
                }
                ]'
                >
                <strong>How about scrollbar controlled video playback?<br>Sorry, no audio!</strong>
            </div>
            <div class="im3-container border5 parallax-sprite"
                 data-parallax='[
                        {
                            "start": {
                                "offsetType":"pause",
                                "opacity": 0
                            },
                            "end": {
                                "offsetType":"pause",
                                "offset":1000
                            }
                        }]'>
                <div class="im3-video parallax-sprite"
                     data-parallax='[
                        {
                            "start": {
                                "offsetType":"pause",
                                "offset":1000,
                                "frames":[
                                    <?php
                     $frames = array();
                     for( $i = 1; $i <= 204; $i++) {
                         $idx = $i;
                         if( $i < 10 ) $idx = '00' . $i;
                         else if( $i < 100) $idx = '0' . $i;
                         $img = $idx . '.jpg';
                         $frames[] = '"' . $img . '"';
                     }
                     echo implode( ',', $frames );
                     ?>
                                ],
                                "animFolder":"images/im3/"
                            },
                            "end": {
                                "offsetType":"pause",
                                "offset":13000
                            }
                        }
                        ]'
                    >
                    <img src="images/im3/001.jpg" />
                </div>
            </div>
            <div class="margin-top-10 padding10 blackbg white text-center">
                Animation Images Copyright &copy; Disney, Marvel, and Paramount Pictures
            </div>
            <div class="ad-container whitebg black parallax-sprite"
                 data-parallax='[
                {
                    "start": {
                        "offsetType":"in",
                        "offset":1000,
                        "left":"{ww}"
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":13000,
                        "left":-2900
                    }
                }
                ]'
                >
                <?php for( $i = 0; $i < 10; $i++ ): ?>
                <div class="ad">Sliding<br>Ad Space</div>
                <?php endfor; ?>
                <div class="clear"></div>
            </div>
            <div class="ad-container whitebg black parallax-sprite"
                 data-parallax='[
                {
                    "start": {
                        "offsetType":"in",
                        "offset":1000,
                        "left":-2900
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":13000,
                        "left":"{ww}"
                    }
                }
                ]'
                >
                <?php for( $i = 0; $i < 10; $i++ ): ?>
                    <div class="ad">Sliding<br>Ad Space</div>
                <?php endfor; ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="nooverflow height1200 parallax-sprite shadow-bottom" data-parallax='[{
            "start": {
                "offsetType":"pause",
                "offset":13000,
                "height":0
            },
            "end": {
                "offsetType":"pause",
                "offset":14000,
                "height":1200
            }
        },{
            "start":{
                "offsetType":"pause",
                "offset":17500
            },
            "end": {
                "offsetType":"pause",
                "offset":19000,
                "height":0
            }
        }
        ]'>
        <div class="margin-top-10 padding10 whitebg black text-center parallax-sprite"
             data-parallax='[
                {
                    "start": {
                        "offsetType":"in",
                        "offset":13000,
                        "opacity": 0
                    },
                    "end": {
                        "offsetType":"pause",
                        "offset":14000
                    }
                }
                ]'
            >
            <strong>Or, Image overlays?</strong>
        </div>

        <div class="overlay1-container">
            <div id="o1l" class="left">
                <div class="whale whale1 nooverflow"></div>
                <div class="whale whale2 nooverflow parallax-sprite"
                    data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":600
                        }
                    }
                    ]'
                    ></div>
                <div class="whale whale3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":600
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div id="o1r" class="right">
                <div class="tiger tiger1 nooverflow"></div>
                <div class="tiger tiger2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":300
                        }
                    }
                    ]'
                    ></div>
                <div class="tiger tiger3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":300
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="overlay2-container">
            <div id="o1l" class="left">
                <div class="whale whale1 nooverflow"></div>
                <div class="whale whale2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":400
                        }
                    }
                    ]'
                    ></div>
                <div class="whale whale3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":400
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div id="o1r" class="right">
                <div class="tiger tiger1 nooverflow"></div>
                <div class="tiger tiger2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":200
                        }
                    }
                    ]'
                    ></div>
                <div class="tiger tiger3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":200
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="overlay3-container">
            <div id="o1l" class="left">
                <div class="whale whale1 nooverflow"></div>
                <div class="whale whale2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":275
                        }
                    }
                    ]'
                    ></div>
                <div class="whale whale3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":275
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div id="o1r" class="right">
                <div class="tiger tiger1 nooverflow"></div>
                <div class="tiger tiger2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":138
                        }
                    }
                    ]'
                    ></div>
                <div class="tiger tiger3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":138
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="overlay4-container">
            <div id="o1l" class="left">
                <div class="whale whale1 nooverflow"></div>
                <div class="whale whale2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":194
                        }
                    }
                    ]'
                    ></div>
                <div class="whale whale3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":194
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div id="o1r" class="right">
                <div class="tiger tiger1 nooverflow"></div>
                <div class="tiger tiger2 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":14500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":16000,
                            "width":96
                        }
                    }
                    ]'
                    ></div>
                <div class="tiger tiger3 nooverflow parallax-sprite"
                     data-parallax='[
                    {
                        "start":{
                            "offsetType":"pause",
                            "offset":15500,
                            "width":0
                        },
                        "end":{
                            "offsetType":"pause",
                            "offset":17000,
                            "width":96
                        }
                    }
                    ]'
                    ></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="margin-top-10 padding10 blackbg white text-center">
            Images Copyright &copy; <a href="http://journey.lifeofpimovie.com" target="_blank">Life of Pi Movie</a>
        </div>
    </div>
    <div class="parallax-sprite padding10 whitebg black text-center"
        data-parallax='[
        {
            "start":{
                "offsetType":"pause",
                "offset":17500,
                "opacity": 0
            },
            "end": {
                "offsetType":"pause",
                "offset":19000,
                "rotation":360,
                "top":100
            }
        },{
            "start":{
                "offsetType":"out",
                "top":100
            },
            "end": {
                "offsetType":"complete",
                "opacity":0,
                "top":"{wh}"
            }
        }
        ]'
        >
        <strong>
        The possibilities are endless
        </strong>
    </div>
</article>
<style>
    .max60p { width: 60%; margin: 0 auto; }
    .rose { width: auto; height: auto; -wekit-filter: blur(3px);
        box-shadow: 0px 0px 18px #F00;
        -webkit-box-shadow: 0px 0px 18px #F00;
        -o-box-shadow: 0px 0px 18px #F00;
        -moz-box-shadow: 0px 0px 18px #F00;
    }
</style>
<article id="parallax-item-demo5" class="parallax-item"
         data-parallax-css='{"background-color":"black"}'
         data-parallax-in-duration="1000"
         data-parallax-pause-duration="2500"
         data-parallax-out-duration="1000"
         data-parallax-in-direction="top"
         data-parallax-ajax="true"
         data-parallax-ajax-url="pages/demo/ajax/ajax1.php"
    >
    <header class="parallax-item-title">Demo5</header>
    <img src="images/backgrounds/demos/5.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content full-container">

    </div>
</article>

<article id="parallax-item-demo6" class="parallax-item"
         data-parallax-css='{"background-color":"black"}'
         data-parallax-type="fade"
         data-parallax-in-duration="1000"
         data-parallax-pause-duration="10000"
         data-parallax-out-duration="2000"
         data-parallax-ajax="true"
         data-parallax-ajax-url="pages/demo/ajax/ajax2.php"
    >
    <header class="parallax-item-title">Demo6</header>
    <img src="images/backgrounds/demos/6.jpg" class="parallax-item-bg" />
    <div class="parallax-item-content">

    </div>
</article>
<script>
    $(document).ready(function(){ blink(); });
    function blink() {
		var opacity = 1;
        $('.blink').each(function(){
            opacity = $(this).css('opacity');
            opacity = opacity == 0 ? 1 : 0;
            $(this).css('opacity',opacity);
        });
		setTimeout(function(){ blink(); }, opacity < 1 ? 500 : 1000 );
    }
</script>