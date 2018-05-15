<div class="row">
    <div class="columns small-12">
        <h3 class="sectionTitle">Slopes</h3>
    </div>

    <div class="columns small-12 medium-6 medium-push-6 large-6 large-pull-0">
        <div class="calcDiagram" id="svg1">
            <?php echo file_get_contents(base_url('img/iso_slope.svg')); ?>
        </div>
    </div>

    <div id="slope_inputs" class="columns small-12 medium-6 medium-pull-6 large-6 large-pull-0">
        <div id="bedSlope"  class="multi_input clearfix">
            <label for="bedSlopePercent">
                <h4 class="title">Channel Bed Slope</h4>
                <a href="#" class="tip"><span class="tooltip">Enter the bed slope of the spillway/channel in percentage or decimal form.</span>?</a>
                <h5 class="unit">Percent (%)</h5>
            </label>
            <input type="number" id="bedSlopePercent" name="bedSlopePercent" class="convert P required"
                min="0"
                value="<?php echo isset($_POST['bedSlopePercent']) ? $_POST['bedSlopePercent'] : '0.00'; ?>"
            />
            <?php echo form_error('bedSlopeDecimal', '<p class="error">', '</p>');?>

            <label for="bedSlopeDecimal">
                <h5 class="unit">Decimal</h5>
            </label>
            <input type="number" id="bedSlopeDecimal"  class="convert D required" name="bedSlopeDecimal"
                min="0"
                value="<?php if (isset($_POST['bedSlopeDecimal'])) :
                    echo $_POST['bedSlopeDecimal'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_bedSlope'];
                else:
                    echo '0.00';
                endif; ?>"
            />
            <?php echo form_error('bedSlopeDecimal', '<p class="error">', '</p>');?>
        </div>

        <div id="sideSlope"  class="multi_input clearfix">
            <label for="sideSlopePercent">
                <h4 class="title">Channel Side Slope</h4>
                <a href="#" class="tip"><span class="tooltip">Enter channel side slope in H:V ‘ratio’ format – “Cot side slope”</span>?</a>
                <h5 class="unit">Percent (%)</h5>
            </label>
            <input type="number" id="sideSlopePercent" class="convert P required" name="sideSlopePercent"
                min="0"
                value="<?php echo isset($_POST['sideSlopePercent']) ? $_POST['sideSlopePercent'] : '0.00'; ?>"
            />
            <?php echo form_error('sideSlopeDecimal', '<p class="error">', '</p>');?>

            <label for="sideSlopeDecimal">
                <h5 class="unit">Decimal</h5>
            </label>
            <input type="number" id="sideSlopeDecimal"  class="convert D required" name="sideSlopeDecimal"
                min="0"
                value="<?php if (isset($_POST['sideSlopeDecimal'])) :
                    echo $_POST['sideSlopeDecimal'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_sideSlope'];
                else:
                    echo '0.00';
                endif; ?>"
            />
            <?php echo form_error('sideSlopeDecimal', '<p class="error">', '</p>');?>
        </div>

        <div id="frictionAngle"  class="input clearfix">
            <h4 class="title">Friction Angle in Degrees</h4>
            <label for="frAngle">
                <a href="#" class="tip"><span class="tooltip">Enter a custom Friction Angle, if it applies - defaults to 30.</span>?</a>
                <h5 class="unit">Degrees</h5>
            </label>
            <input type="number" id="frAngle" class="" name="friction" value="30"
                min="0"
                value="<?php if (isset($_POST['friction'])) :
                    echo $_POST['friction'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_friction'];
                endif; ?>"
            />
        </div>
    </div>
</div>