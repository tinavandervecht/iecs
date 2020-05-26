<div class="row" id="water_flow_inputs">
    <div class="columns small-12">
        <h3 class="sectionTitle"></h3>
    </div>

    <div id="velocity" class="clearfix columns small-12 medium-6">
        <h4 class="title">Bend Factor</h4>
        <label for="bendFactor">
            <a href="#" class="tip">
                <span class="tooltip img">
                    <img src="/img/bend-factor-explanation.png" width="300" alt="Bend Factor Explanation" />
                </span>
                ?
            </a>
            <h5 class="unit">Bed, straight</h5>
        </label>
        <input type="number" id="bendFactor" class="required" name="bendFactor"
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
    <div class="clearfix columns small-12 medium-6"></div>
</div>