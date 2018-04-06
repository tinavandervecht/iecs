<div class="row" id="flow_velocity_inputs">
    <div class="columns small-12">
        <h3 class="sectionTitle">Flow and Velocity</h3>
    </div>

    <div id="flow"  class="multi_input clearfix columns small-12 medium-6">
        <h4 class="title">Maximum Expected Flow</h4>
        <label for="flowMeters">
            <a href="#" class="tip"><span class="tooltip">Ensure the highest design flows are entered in cubic metres per second.</span>?</a>
            <h5 class="unit">Cubic m/s</h5>
        </label>
        <input type="number" id="flowMeters" class="convert metric required" name="flowMeters"
            value="<?php if (isset($_POST['flowMeters'])) :
                echo $_POST['flowMeters'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_expectedFlow'];
            endif; ?>"
        />
        <?php echo form_error('flowMeters', '<p class="error">', '</p>');?>

        <label for="flowFeet">
            <a href="#" class="tip"><span class="tooltip">Ensure the highest design flows are entered in cubic feet per second.</span>?</a><h5 class="unit">Cubic ft/s</h5>
        </label>
        <input type="number" id="flowFeet" name="flowFeet" class="convert imperial required"
            value="<?php if(isset($_POST['flowFeet'])){echo $_POST['flowFeet'] ;} ?>"
        />
        <?php echo form_error('flowMeters', '<p class="error">', '</p>');?>
    </div>

    <div id="velocity" class="multi_input clearfix columns small-12 medium-6">
        <h4 class="title">Maximum Expected Velocity</h4>
        <label for="velocityMeters">
            <a href="#" class="tip"><span class="tooltip">Input the pre-determined max velocity in m/s</span>?</a><h5 class="unit">Meters per Second</h5>
        </label>
        <input type="number" id="velocityMeters" class="convert metric required"  name="velocityMeters"
            value="<?php if (isset($_POST['velocityMeters'])) :
                echo $_POST['velocityMeters'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_expectedVelocity'];
            endif; ?>"
        />
        <?php echo form_error('velocityMeters', '<p class="error">', '</p>');?>

        <label for="velocityFeet">
            <a href="#" class="tip"><span class="tooltip">Input the pre-determined max velocity in f/s</span>?</a><h5 class="unit">Feet per Second</h5>
        </label>
        <input type="number" id="velocityFeet" name="velocityFeet" class="convert imperial required"
            value="<?php if(isset($_POST['velocityFeet'])){echo $_POST['velocityFeet'] ;} ?>"
        />
        <?php echo form_error('velocityMeters', '<p class="error">', '</p>');?>
    </div>
</div>