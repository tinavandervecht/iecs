<div class="row">
    <div class="columns small-12 medium-6 medium-clear" id="flow_type_inputs">
        <h3 class="sectionTitle">Types of Flow</h3>
        <div id="type"  class="input clearfix">
            <h4 class="title">
                Choose Type of Flow:
            </h4>
            <label for="flowType">
                <h5 class="unit">(normal, overtopping, etc.)</h5>
            </label>
            <select id="flowType" name="flowType">
                <option value="0"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 0)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 0)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Normal
                </option>
                <option value="1"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 1)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 1)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Overtopping
                </option>
                <option value="2"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 2)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 2)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Sub Critical
                </option>
                <option value="3"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 3)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 3)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Hydraulic Jump
                </option>
                <option value="4"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 4)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 4)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Super Critical
                </option>
                <option value="5"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 5)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 5)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Impinging
                </option>
                <option value="6"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 6)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 6)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Bridge/Culvert
                </option>
                <option value="7"
                    <?php if ((isset($_POST['flowType']) && $_POST['flowType'] == 7)
                        || (isset($estimate) && $estimate['estimate_flowType'] == 7)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Undulating Trans Critical
                </option>
            </select>
            <?php echo form_error('flowType', '<p class="error">', '</p>');?>
        </div>

        <div id="designComponentTwo"  class="input clearfix">
            <h4 class="title">Use block on...</h4>
            <label for="blockUse">
                <a href="#"
                    disabled="disabled"
                    class="modalButton"
                    data-reveal-id="useBlockOnModal"
                >
                    What does this mean?
                </a>
            </label>
            <select name="blockUse">
                <option value="0"
                    <?php if ((isset($_POST['blockUse']) && $_POST['blockUse'] == 0)
                        || (isset($estimate) && $estimate['estimate_blockUse'] == 0)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Both Bed and Side
                </option>
                <option value="1"
                    <?php if ((isset($_POST['blockUse']) && $_POST['blockUse'] == 1)
                        || (isset($estimate) && $estimate['estimate_blockUse'] == 1)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Bed Only
                </option>
                <option value="2"
                    <?php if ((isset($_POST['blockUse']) && $_POST['blockUse'] == 2)
                        || (isset($estimate) && $estimate['estimate_blockUse'] == 2)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Side Only
                </option>
            </select>
        </div>

        <div id="type"  class="input clearfix">
            <h4 class="title">
                Channel Section
            </h4>
            <select id="channelSection" name="channelSection">
                <option value="0"
                    <?php if ((isset($_POST['channelSection']) && $_POST['channelSection'] == 0)
                        || (isset($estimate) && $estimate['estimate_channelSection'] == 0)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Trapezoidal
                </option>
                <option value="0"
                    <?php if ((isset($_POST['channelSection']) && $_POST['channelSection'] == 1)
                        || (isset($estimate) && $estimate['estimate_channelSection'] == 1)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Parabolic
                </option>
                <option value="0"
                    <?php if ((isset($_POST['channelSection']) && $_POST['channelSection'] == 2)
                        || (isset($estimate) && $estimate['estimate_channelSection'] == 2)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Rectangular
                </option>
                <option value="0"
                    <?php if ((isset($_POST['channelSection']) && $_POST['channelSection'] == 3)
                        || (isset($estimate) && $estimate['estimate_channelSection'] == 3)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Irregular
                </option>
            </select>
        </div>
    </div>

    <div class="columns small-12 medium-6 end" id="bed_type_alignment_inputs">
        <h3 class="sectionTitle">Bed Width and Alignment</h3>
        <div id="bedWidth"  class="multi_input clearfix">
            <h4 class="title">Bed Width</h4>
            <label for="bedMeters">
                <a href="#" class="tip"><span class="tooltip">Enter least bed width in meters (m).</span>?</a>
                <h5 class="unit">Meters</h5>
            </label>
            <input type="number" id="bedMeters" class="convert metric required" name="bedMeters"
                min="0"
                value="<?php if (isset($_POST['bedMeters'])) :
                    echo $_POST['bedMeters'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_bedWidth'];
                endif; ?>"
            />
            <?php echo form_error('bedMeters', '<p class="error">', '</p>');?>

            <label for="bedFeet">
                <a href="#" class="tip"><span class="tooltip">Enter least bed width in feet (f).</span>?</a>
                <h5 class="unit">Feet</h5>
            </label>
            <input type="number" id="bedFeet" name="bedFeet" class="convert imperial required"
                min="0"
                value="<?php if(isset($_POST['bedFeet'])){echo $_POST['bedFeet'] ;} ?>"
            />
            <?php echo form_error('bedMeters', '<p class="error">', '</p>');?>
        </div>

        <div id="alignment"  class="input clearfix">
            <h4 class="title">Alignment</h4>
            <label for="alignType">
                <a href="#" class="tip hidden"><span class="tooltip">insert tip here</span>?</a>
                <h5 class="unit">(straight, moderate, severe, extreme)</h5>
            </label>
            <select id="alignType" name="alignType">
                <option value="0"
                    <?php if ((isset($_POST['alignType']) && $_POST['alignType'] == 0)
                        || (isset($estimate) && $estimate['estimate_alignment'] == 0)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Straight
                </option>
                <option value="1"
                    <?php if ((isset($_POST['alignType']) && $_POST['alignType'] == 1)
                        || (isset($estimate) && $estimate['estimate_alignment'] == 1)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Not Straight
                </option>
                <!-- <option value="1" <.?php if ($estimate['estimate_alignment'] == 1) {echo "selected";}?>>Moderate</option>
                <option value="2" <.?php if ($estimate['estimate_alignment'] == 2) {echo "selected";}?>>Severe</option>
                <option value="3" <.?php if ($estimate['estimate_alignment'] == 3) {echo "selected";}?>>Extreme</option> -->
            </select>
            <?php echo form_error('alignType', '<p class="error">', '</p>');?>
        </div>

        <div id="crestRadius"  class="multi_input clearfix">
            <h4 class="title">Radius at the Crest</h4>
            <label for="crestMeters">
                <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a>
                <h5 class="unit">Meters</h5>
            </label>
            <input type="number" id="crestMeters" class="convert metric" name="crestMeters"
                min="0"
                value="<?php if (isset($_POST['crestMeters'])) :
                    echo $_POST['crestMeters'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_crestRadius'];
                endif; ?>"
            />
            <?php echo form_error('crestMeters', '<p class="error">', '</p>');?>

            <label for="crestFeet">
                <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a>
                <h5 class="unit">Feet</h5>
            </label>
            <input type="number" id="crestFeet" name="crestFeet" class="convert imperial"
                min="0"
                value="<?php if(isset($_POST['crestFeet'])){echo $_POST['crestFeet'] ;} ?>"
            />
            <?php echo form_error('crestMeters', '<p class="error">', '</p>');?>
        </div>
    </div>
</div>

<div id="useBlockOnModal" class="custom-modal">
    <div class="modalHeader">
        <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
    </div>
    <ul>
        <li>
            <p>
                <strong>Bed & Side</strong> - utilize Cable Concrete on the bed (slope) and side slope of the channel/out to protect from erosive forces.
            </p>
        </li>
        <li>
            <p>
                <strong>Bed Only</strong> - utilize Cable Concrete on the bed (slope) only of the channel/outlet. No armouring is required on the side slopes in this design.
            </p>
        </li>
        <li>
            <p>
                <strong>Side Only</strong> - utilize Cable Concrete on the side slopes of the channel/outlet.  No Cable Concrete is required on the bed (slope) in the design.
            </p>
        </li>
    </ul>
</div>