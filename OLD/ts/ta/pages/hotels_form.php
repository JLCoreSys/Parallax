<div class="hotels-form form-wrapper med">
    <form id="ctHotelsForm" class="form form-horizontal med" action="javascript:void(0);" method="post">
        <div class="float-left-50p">
            <input type="hidden" id="_ctPreventSubmit" value="0" />
            <div class="control-group">
                <label for="ctHotelsCity" class="control-label">City</label>
                <div class="controls">
                    <input type="text" name="ctHotelsCity" id="ctHotelsCity" class="input-xlarge input" placeholder="City" />
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctHotelsDateCheckIn">Checkin :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctHotelsDateCheckIn" name="ctHotelsDateCheckIn" class="input-xlarge" value="<?php echo date( 'm/d/Y' ); ?>" placeholder="<?php echo date( 'm/d/Y' ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctHotelsDateCheckOut">Checkout :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctHotelsDateCheckOut" name="ctHotelsDateCheckOut" class="input-xlarge" value="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')) ); ?>" placeholder="<?php echo date( 'm/d/Y' ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctHotelsGuests">Guests :</label>
                        <div class="controls">
                            <select name="ctHotelsGuests" id="ctHotelsGuests">
                                <?php for($i = 1; $i <= 10; $i++ ): ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?> Guest<?php echo $i > 1 ? 's' : ''; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctHotelsRooms">Rooms :</label>
                        <div class="controls">
                            <select id="ctHotelsRooms" name="ctHotelsRooms">
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?> Room<?php echo $i > 1 ? 's' : ''; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <?php include( 'signup_box.php' ); ?>

            <div class="check-rates" id="ctFormSubmit">

            </div>

        </div>
        <div class="float-left-5px white-grad height100p"></div>
        <div class="float-right-45p">
            <?php $type = 'Hotels'; include( 'adv_list.php' ); ?>
        </div>
    </form>

</div>