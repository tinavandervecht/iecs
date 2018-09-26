<div class="row">
    <div class="columns small-12">
        <h3 class="sectionTitle">Slopes</h3>
    </div>

    <div class="columns small-12 medium-6 medium-push-6 large-6 large-pull-0">
        <div class="calcDiagram" id="svg1">
            <?php
                $arrContextOptions=array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );

                $response = file_get_contents(base_url('img/iso_slope.svg'), false, stream_context_create($arrContextOptions));

                echo $response;
            ?>
        </div>
    </div>

    <div id="slope_inputs" class="columns small-12 medium-6 medium-pull-6 large-6 large-pull-0">
        <div id="bedSlope" class="clearfix input">
            <h4 class="title">Channel Bed Slope</h4>
            <label for="bedSlopePercent">
                <a href="#" class="tip"><span class="tooltip">Enter the bed slope of the spillway/channel in decimal form.</span>?</a>
                <h5 class="unit">Decimal</h5>
            </label>
            <input type="number" id="bedSlopeDecimal"  class="convert D required" name="bedSlopeDecimal"
                min="0"
                value="<?php if (isset($_POST['bedSlopeDecimal'])) :
                    echo $_POST['bedSlopeDecimal'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_bedSlope'];
                else:
                    echo '0.000';
                endif; ?>"
            />
            <?php echo form_error('bedSlopeDecimal', '<p class="error">', '</p>');?>
        </div>

        <div id="sideSlope" class="clearfix input">
            <h4 class="title">Channel Side Slope</h4>
            <label for="sideSlopePercent">
                <a href="#" class="tip"><span class="tooltip">Enter channel side slope in "1:Z" format - entering "Z" below</span>?</a>
                <h5 class="unit">Ratio 1:Z</h5>
            </label>
            <input type="number" id="sideSlopeDecimal"  class="convert D required" name="sideSlopeDecimal"
                min="0"
                value="<?php if (isset($_POST['sideSlopeDecimal'])) :
                    echo $_POST['sideSlopeDecimal'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_sideSlope'];
                else:
                    echo '0.000';
                endif; ?>"
            />
            <?php echo form_error('sideSlopeDecimal', '<p class="error">', '</p>');?>
        </div>

        <div id="frictionAngle"  class="input clearfix">
            <h4 class="title">
                Friction Angle in Degrees
                <br />
                <a href="#"
                    disabled="disabled"
                    class="modalButton"
                    data-reveal-id="frictionAngleModal"
                >
                    What does this mean?
                </a>
            </h4>
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

<div id="frictionAngleModal" class="custom-modal text-center">
    <div class="modalHeader">
        <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
    </div>
    <h2 id="modalTitle">What Does Friction Angle Mean?</h2>
    <img src="<?php echo base_url('img/friction-angle.png'); ?>" />
    <p>When a block placed on the surface is just on the point of sliding then in that condition the angle between applied force and normal force is called the angle of friction. If phi is angle of friction, tan (phi)= mu, the coefficient of friction. Angle of friction is defined in the context of motion on inclined plane.</p>
</div>
<div id="overlay"></div>