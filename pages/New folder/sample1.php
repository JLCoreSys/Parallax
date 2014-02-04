<article id="sample1" class="parallax-frame" title="Sample 1"
         data-frame-options-type="fade"
         data-frame-options-pause-duration="7000"
    >
    <img class="parallax-frame-bg" data-parallax-src="./media/images/backgrounds/orig/bg2.jpg" />
    <div class="parallax-frame-content parallax-no-scroll">
    <?php include( 'pages/header.php' ); ?>
        <div class="text-center small-padding-top small-padding-bottom browser-icons">
            <img data-parallax-src="./media/images/chrome.png" class="parallax-sprite"
                 data-sprite-animations='[
                {"start":{"top":-200,"opacity":0,"offset":-500},"end":{"offset":0}},
                {"start":{"top":0,"opacity":1,"offset":6500},"end":{"offset":7000,"opacity":0,"top":-200}}
                ]' />
            <img data-parallax-src="./media/images/firefox.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-400},"end":{"offset":100}},
                 {"start":{"top":0,"opacity":1,"offset":6700},"end":{"offset":7200,"opacity":0,"top":-200}}
                 ]' />
            <img data-parallax-src="./media/images/safari.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-300},"end":{"offset":200}},
                 {"start":{"top":0,"opacity":1,"offset":6900},"end":{"offset":7400,"opacity":0,"top":-200}}
                 ]' />
            <img data-parallax-src="./media/images/opera.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-200},"end":{"offset":300}},
                 {"start":{"top":0,"opacity":1,"offset":7100},"end":{"offset":7600,"opacity":0,"top":-200}}
                 ]' />
            <img data-parallax-src="./media/images/ie9.png" class="parallax-sprite"
                 data-sprite-animations='[
                 {"start":{"top":-200,"opacity":0,"offset":-100},"end":{"offset":400}},
                 {"start":{"top":0,"opacity":1,"offset":7300},"end":{"offset":7800,"opacity":0,"top":-200}}

                 ]' />
        </div>
        <div class="text-center center showcase-container white padding margin-top">
            <div id="mobile-friendly" class="showcase-item parallax-sprite"
                data-sprite-animations='[
                {
                    "start":{
                        "left":"-{ww}/2",
                        "opacity":0
                    },
                    "end":{
                        "offset":500
                    }
                },{
                    "start":{
                        "offset":600
                    },
                    "end":{
                        "offset":1100,
                        "opacity":0
                    }
                }
                ]'
                >
                <h1 class="showcase-padding"><span class="blackbg white rounded5 med-padding">Mobile Friendly</span></h1>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":1700,
                        "opacity":0
                    },
                    "end":{
                        "offset":2200
                    }
                },{
                    "start":{
                        "offset":2500
                    },
                    "end":{
                        "offset":3000,
                        "top":"{wh}/4",
                        "opacity":0
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/1.jpg" />
                <span class="blackbg white rounded5 med-padding">Fade Out</span>
            </div>
            <div class="showcase-item parallax-sprite"
                data-sprite-animations='[{
                    "start":{
                        "offset":1100,
                        "opacity":0
                    },
                    "end":{
                        "offset":1600
                    }
                },{
                    "start":{
                        "offset":1700
                    },
                    "end":{
                        "offset":2200,
                        "opacity":0
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/7.jpg" />
                <span class="blackbg white rounded5 med-padding">Fade In</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":2300,
                        "opacity":0,
                        "top":"-{wh}/2"
                    },
                    "end":{
                        "offset":2800
                    }
                },{
                    "start":{
                        "offset":3100
                    },
                    "end":{
                        "offset":3600,
                        "opacity":0,
                        "top":"-{wh}/4"
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/3.jpg" />
                <span class="blackbg white rounded5 med-padding">Slide From TOP</span>
            </div>
            <div class="showcase-item parallax-sprite"
                       data-sprite-animations='[{
                    "start":{
                        "offset":2900,
                        "opacity":0,
                        "top":"{wh}/2"
                    },
                    "end":{
                        "offset":3400
                    }
                },{
                    "start":{
                        "offset":3700
                    },
                    "end":{
                        "offset":4200,
                        "opacity":0,
                        "left":"{ww}/4"
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/4.jpg" />
                <span class="blackbg white rounded5 med-padding">Slide From BOTTOM</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":3500,
                        "opacity":0,
                        "left":"-{ww}/2"
                    },
                    "end":{
                        "offset":4000
                    }
                },{
                    "start":{
                        "offset":4300
                    },
                    "end":{
                        "offset":4800,
                        "opacity":0,
                        "left":"-{ww}/4"
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/5.jpg" />
                <span class="blackbg white rounded5 med-padding">Slide From LEFT</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":4100,
                        "opacity":0,
                        "left":"{ww}/2"
                    },
                    "end":{
                        "offset":4600
                    }
                },{
                    "start":{
                        "offset":4900
                    },
                    "end":{
                        "offset":5400,
                        "opacity":0
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/6.jpg" />
                <span class="blackbg white rounded5 med-padding">Slide From RIGHT</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":4700,
                        "opacity":0,
                        "rotation":-180
                    },
                    "end":{
                        "offset":5200
                    }
                },{
                    "start":{
                        "offset":5500
                    },
                    "end":{
                        "offset":6000,
                        "opacity":0
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/8.jpg" />
                <span class="blackbg white rounded5 med-padding">Rotate Clockwise</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":5300,
                        "opacity":0,
                        "rotation":180
                    },
                    "end":{
                        "offset":5800
                    }
                },{
                    "start":{
                        "offset":6100
                    },
                    "end":{
                        "offset":6600,
                        "opacity":0
                    }
                }]'
                >
                <img class="rounded5 shadow"   data-parallax-src="./media/images/backgrounds/small/2.jpg" />
                <span class="blackbg white rounded5 med-padding">Rotate Counter-Clockwise</span>
            </div>
            <div class="showcase-item parallax-sprite"
                 data-sprite-animations='[{
                    "start":{
                        "offset":5900,
                        "opacity":0
                    },
                    "end":{
                        "offset":6400
                    }
                }]'
                >
                <h1 class="showcase-padding"><span class="blackbg white rounded5 med-padding">Endless Possibilities</span></h1>

            </div>
        </div>
    </div>
</article>