<div class="home_header">
    <div id="about_sprite_logo" class="logo parallax-sprite2"></div>
    <div class="name"><h1 id="about_sprite_name" class="parallax-sprite2">Core Systems</h1></div>
</div>
<div style="width:80%;max-width:650px;min-height:200px;margin:0 auto">
    <div class="row-fluid">
        <div id="about_left_box" class="span6 parallax-sprite2" style="width:100% !important;margin:0 auto;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit ipsum et ipsum tristique varius. Phasellus libero justo, luctus at dapibus id, feugiat ac urna. Nullam fermentum porttitor pulvinar. Nunc vitae placerat tellus. Morbi lacinia sem mauris. Fusce quis sollicitudin metus. Proin lobortis tincidunt magna eu pellentesque. Nunc hendrerit pulvinar ipsum sed rhoncus. Aliquam consectetur sodales velit, sit amet consequat mi pretium nec. Nullam rutrum lorem tellus, ut cursus mi suscipit ut. Suspendisse urna tellus, bibendum et massa in, faucibus rutrum leo. Vivamus sed lacus sit amet arcu pellentesque aliquet. Etiam vitae risus sit amet libero auctor placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ac mauris congue, convallis turpis at, sagittis enim.
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="hscroll1" class="horiz-slide-box parallax-sprite" style="width:<?php echo ( 295 * 5 ); ?>px"
     data-parallax='[{
        "start":{
            "offsetType":"pause",
            "left":"{ww}"
        },
        "end":{
            "offsetType":"out",
            "left":"-1505"
        }
        }]'
    >
    <?php for( $i = 0; $i < 5; $i++ ): ?>
        <div class="box text-center" style="display:inline-block;width:250px;height:250px;background:#FFF;border:1px solid black;margin:10px;padding:10px;">DATA</div>
    <?php endfor; ?>
</div>