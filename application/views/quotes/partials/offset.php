<div class="row" id="flow_velocity_inputs">
    <div class="columns small-12">
        <h3 class="sectionTitle">Maximum Vertical Offset</h3>
    </div>

    <div id="offset"  class="multi_input clearfix columns small-12 medium-6">
        <h4 class="title">Offset</h4>
        <label for="offsetMeters">
            <h5 class="unit">mm</h5>
        </label>
        <input type="number" id="offsetMeters" class="convert metric required convert_to_in" name="offsetMeters"
            min="0"
            value="<?php if (isset($_POST['offsetMeters'])) :
                echo $_POST['offsetMeters'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_offset'];
            else:
                echo '12.7';
            endif; ?>"
        />
        <?php echo form_error('offsetMeters', '<p class="error">', '</p>');?>

        <label for="offsetFeet">
            <h5 class="unit">in.</h5>
        </label>
        <input type="number" id="offsetFeet" name="offsetFeet" class="convert imperial required convert_to_mm"
            min="0"
            value="<?php if(isset($_POST['offsetFeet'])){echo $_POST['offsetFeet'] ;} ?>"
        />
        <?php echo form_error('offsetMeters', '<p class="error">', '</p>');?>
    </div>
    <div class="clearfix columns small-12 medium-6">
    </div>
</div>