<div class="home_header">
    <div id="" class="logo parallax-sprite2"></div>
    <div class="name"><h1 id="about_sprite_name" class="parallax-sprite3">Core Systems</h1></div>
</div>
<div style="width:80%;max-width:650px;min-height:200px;margin:0 auto;border-radius:10px;">
    <div id="wave_anim" style="width:600px;height:450px;margin: 0 auto;border-radius:10px;overflow:hidden;box-shadow:2px 2px 12px #333;"
        class="parallax-sprite"
        data-parallax='[
        {
                "start": {
                    "offsetType": "in",
                    "opacity":0
                    },
                "end": {
                    "offsetType":"pause",
                    "opacity":1
                }
            },
            {
                "start":{
                    "offsetType":"pause",
                    "frames":[
                    <?php
                        $frames = array();
                        for($i = 0; $i <= 70; $i++) {
                            $idx = $i < 10 ? '0' . $i : $i;
                            $img = $idx . '.jpg';
                            $frames[] = '"' . $img . '"';
                        }
                        echo implode(',',$frames);
                    ?>
                    ],
                    "animFolder":"images/vid/",
                    "opacity": 1
                },
                "end":{
                    "offsetType":"pause",
                    "offset": 7000,
                    "opacity": 1
                }
            },{
                "start": {
                    "offsetType": "pause",
                    "offset": 7000,
                    "opacity": 1
                    },
                "end": {
                    "offsetType":"out",
                    "opacity":0
                }
            }
        ]'
        >

    </div>
</div>
<div style="color:#000;margin-top:20px;text-align:center;background:#fff;border:1px solid #000;box-shadow:0px 0px 8px #333;">
    <h2 class="text-center">Images Courtesy of <a href="http:/journey.lifeofpimovie.com">Life of Pi Movie</a></h2>
</div>