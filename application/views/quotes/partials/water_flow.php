<div class="row" id="water_flow_inputs">
    <div class="columns small-12">
        <h3 class="sectionTitle"></h3>
    </div>

    <div id="flow"  class="clearfix columns small-12 medium-6">
        <h4 class="title">Design Flow</h4>
        <label for="designFlow">
            <h5 class="unit">m3/s</h5>
        </label>
        <input type="number" id="designFlow" class="convert metric required convert_to_in" name="designFlow"
            min="10.000"
            value="<?php if (isset($_POST['designFlow'])) :
                echo $_POST['designFlow'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_designFlow'];
            else:
                echo '10.000';
            endif; ?>"
        />
        <?php echo form_error('designFlow', '<p class="error">', '</p>');?>
    </div>

    <div id="velocity" class="clearfix columns small-12 medium-6">
        <h4 class="title">Bend Factor</h4>
        <label for="bendFactor">
            <h5 class="unit">Bed, straight</h5>
        </label>
        <input type="number" id="bendFactor" class="convert metric required convert_to_in" name="bendFactor"
            min="1.00"
            value="<?php if (isset($_POST['bendFactor'])) :
                echo $_POST['bendFactor'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_bendFactor'];
            else:
                echo '1.0';
            endif; ?>"
        />
        <?php echo form_error('bendFactor', '<p class="error">', '</p>');?>
    </div>
</div>