<div class="cars-form form-wrapper">
    <form class="form form-horizontal" id="ctCarsForm" action="javascript:void(0);" method="post">
        <input type="hidden" id="_ctPreventSubmit" value="0" />
        <div class="float-left-50p">

            <div class="control-group">
                <label class="control-label" for="ctCityFrom">From :</label>
                <div class="controls">
                    <input id="ctCityFrom" name="ctCityFrom" type="text" placeholder="Enter City or Airport" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctCityTo">To :</label>
                <div class="controls">
                    <input id="ctCityTo" name="ctCityTo" type="text" placeholder="Enter City or Airport" class="input-xlarge">
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctFromDate">Pickup :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctFromDate" name="ctFromDate" class="input-xlarge"  value="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y')) ); ?>" placeholder="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y')) ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <div class="controls time">
                            <select id="ctFromTime" name="ctFromTime" class="select2" title="Pickup Time">
                                <?php for($i = 0;$i<=23;$i++): ?>
                                    <?php
                                        $o = $i;
                                        $ampm = 'am';
                                        if( $i >= 12 ) {
                                            $ampm = 'pm';
                                            $i -= 12;
                                        } else {
                                            $ampm = 'am';
                                        }
                                        if( $i < 10 ) {
                                            $i = '0' . $i;
                                        } elseif( $i == 0 ) {
                                            $i = 12;
                                        }
                                    ?>
                                    <?php for( $j = 0; $j <= 45; $j += 15 ): ?>
                                        <?php $j = $j == 0 ? '00' : $j; ?>
                                        <?php $selected = $o == 9 && $j == '00' ? 'selected' : ''; ?>
                                        <option value="<?php echo $o . ':' . $j; ?>" <?php echo $selected; ?>><?php echo $i . ':' . $j . ' ' . $ampm; ?></option>
                                    <?php endfor; ?>
                                    <?php $i = $o; ?>
                                <?php endfor; ?>
                            </select>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctToDate">Return :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctToDate" name="ctFromDate" class="input-xlarge" value="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')) ); ?>" placeholder="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')) ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <div class="controls time">
                            <select id="ctToTime" name="ctToTime" class="select2" title="Return Time">
                                <?php for($i = 0;$i<=23;$i++): ?>
                                    <?php
                                    $o = $i;
                                    $ampm = 'am';
                                    if( $i >= 12 ) {
                                        $ampm = 'pm';
                                        $i -= 12;
                                    } else {
                                        $ampm = 'am';
                                    }
                                    if( $i < 10 ) {
                                        $i = '0' . $i;
                                    } elseif( $i == 0 ) {
                                        $i = 12;
                                    }
                                    ?>
                                    <?php for( $j = 0; $j <= 45; $j += 15 ): ?>
                                        <?php $j = $j == 0 ? '00' : $j; ?>
                                        <?php $selected = $o == 18 && $j == '00' ? 'selected' : ''; ?>
                                        <option value="<?php echo $o . ':' . $j; ?>" <?php echo $selected; ?>><?php echo $i . ':' . $j . ' ' . $ampm; ?></option>
                                    <?php endfor; ?>
                                    <?php $i = $o; ?>
                                <?php endfor; ?>
                            </select>

                        </div>
                    </div>
                </div>
            </div>

            <?php include( './signup_box.php' ); ?>

            <div class="check-rates" id="ctFormSubmit">

            </div>

        </div>

        <div class="float-left-5px white-grad height100p"></div>
        <div class="float-right-45p">
            <?php $type = 'Cars'; include( 'adv_list.php' ); ?>
        </div>
    </form>

</div>