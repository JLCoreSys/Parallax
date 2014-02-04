<div class="flights-form form-wrapper">
    <form class="form form-horizontal" id="ctFlightsForm" action="javascript:void(0);" method="post">
        <input type="hidden" id="_ctPreventSubmit" value="0" />
        <div class="float-left-50p">
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <div class="row-fluid">
                        <div class="span6" style="margin: 0;">
                            <label class="radio inline-block" for="radios-0">
                                Round-Trip
                                <input type="radio" name="ctRoundTrip" id="ctRoundTrip-0" value="Round-Trip" checked="checked">
                            </label>
                        </div>
                        <div class="span6" style="margin: 0;">
                            <label class="radio inline-block" for="radios-1">
                                One-Way
                                <input type="radio" name="ctRoundTrip" id="ctRoundTrip-1" value="One-Way">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctAirportFrom">From :</label>
                <div class="controls">
                    <input id="ctAirportFrom" name="ctAirportFrom" type="text" placeholder="Enter City or Airport" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctAirportTo">To :</label>
                <div class="controls">
                    <input id="ctAirportTo" name="ctAirportTo" type="text" placeholder="Enter City or Airport" class="input-xlarge">

                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctDepartureDate">Depart :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctDepartureDate" name="ctDepartureDate" class="input-xlarge" value="<?php echo date('m/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y'))); ?>" placeholder="<?php echo date('m/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y'))); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctReturnDate">Return :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctReturnDate" name="ctReturnDate" class="input-xlarge" value="<?php echo date('m/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y'))); ?>" placeholder="<?php echo date('m/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y'))); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctTravelers">Travelers :</label>
                <div class="controls">
                    <select name="ctTravelers" class="input-xlarge" id="ctTravelers">
                        <option value="1">1 Traveler</option>
                        <option value="2">2 Traveler</option>
                        <option value="3">3 Traveler</option>
                        <option value="4">4 Traveler</option>
                        <option value="5">5 Traveler</option>
                        <option value="6">6 Traveler</option>
                        <option value="7">7 Traveler</option>
                        <option value="8">8 Traveler</option>
                        <option value="9">9 Traveler</option>
                        <option value="10">10 Traveler</option>
                    </select>
                </div>
            </div>

            <?php include( './signup_box.php' ); ?>

            <div class="check-rates" id="ctFormSubmit">

            </div>

        </div>

        <div class="float-left-5px white-grad height100p"></div>
        <div class="float-right-45p">
            <?php $type = 'Flights'; include( 'adv_list.php' ); ?>
        </div>
    </form>

</div>