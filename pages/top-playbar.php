<style>
    .parallax-frame-playbar { position: relative; width: 100px; height: auto; margin: 0 auto; text-align: center; padding: 0; top: -8px; }
    .parallax-frame-playbar * { position: relative; display: inline-block; width: 25px; margin: 0; padding: 0;  }
</style>
<div class="parallax-frame-playbar">
    <div class="parallax-prev-btn<?php echo isset($show_prev) && !$show_prev === true ? ' hidden':' '; ?>"></div>
    <div class="parallax-play-btn<?php echo isset($show_pay) && !$show_play === true ? ' hidden':' '; ?>"></div>
    <div class="parallax-next-btn<?php echo isset($show_next) && !$show_next === true ? ' hidden':' '; ?>"></div>
    <div class="clearfix"></div>
</div>