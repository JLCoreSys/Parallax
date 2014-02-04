<div class="packages-form vacations-form form-wrapper">
    <form class="form form-horizontal" id="ctPackagesForm" action="javascript:void(0);" method="post">
        <input type="hidden" id="_ctPreventSubmit" value="0" />
        <div class="float-left-50p">

            <div class="control-group">
                <label class="control-label" for="ctPackageFrom">From :</label>
                <div class="controls">
                    <input id="ctPackageFrom" name="ctPackageFrom" type="text" placeholder="Enter City or Airport" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctPackageTo">To :</label>
                <div class="controls">
                    <input id="ctPackageTo" name="ctPackageTo" type="text" placeholder="Enter City or Airport" class="input-xlarge">

                </div>
            </div>

            <div class="row-fluid">
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctPackagesDepartureDate">Depart :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctPackagesDepartureDate" name="ctPackagesDepartureDate" class="input-xlarge" value="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y')) ); ?>" placeholder="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d'),date('Y')) ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="span6" style="margin: 0;">
                    <div class="control-group">
                        <label class="control-label" for="ctPackagesReturnDate">Return :</label>
                        <div class="controls">
                            <div class="input-append">
                                <input id="ctPackagesReturnDate" name="ctPackagesReturnDate" class="input-xlarge" value="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')) ); ?>" placeholder="<?php echo date( 'm/d/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')) ); ?>" type="text">
                                <span class="add-on cal small"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="ctPackagesTravelers">Travelers :</label>
                <div class="controls">
                    <select name="ctPackagesTravelers" class="input-xlarge" id="ctPackagesTravelers">
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
            <?php $type = 'Packages'; include( 'adv_list.php' ); ?>
        </div>
    </form>

</div>