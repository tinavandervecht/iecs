<div class="row">
    <div id="channelSpecs">
        <div class="columns small-12">
            <h3 class="sectionTitle">Channel Specifications</h3>
        </div>

        <!-- <div class="columns small-12 medium-6 medium-push-6 large-pull-0">
            <img src="<?php echo base_url('img/channel_specifications.jpg');?>" class="calcDiagram"  alt="">
        </div> -->

        <div class="columns small-12 medium-6 medium-pull-6 large-pull-0" id="channel_inputs">
            <div id="channelLength"  class="multi_input clearfix">
                <h4 class="title">Chute/Channel Length</h4>
                <label for="channelMeters">
                        <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in meters.</span>?</a>
                        <h5 class="unit">Meters</h5>
                </label>
                <input id="channelMeters" type="number" class="convert metric" name="channelMeters"
                    min="0"
                    value="<?php if (isset($_POST['channelMeters'])) :
                        echo $_POST['channelMeters'];
                    elseif (isset($estimate)) :
                        echo $estimate['estimate_channelLength'];
                    endif; ?>"
                />
                <?php echo form_error('channelMeters', '<p class="error">', '</p>');?>

                <label for="channelFeet">
                    <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in feet.</span>?</a>
                    <h5 class="unit">Feet</h5>
                </label>
                <input id="channelFeet" type="number" name="channelFeet" class="convert imperial"
                    min="0"
                    value="<?php if(isset($_POST['channelFeet'])){echo $_POST['channelFeet'] ;} ?>"
                />
                <?php echo form_error('channelMeters', '<p class="error">', '</p>');?>
            </div>

            <div id="channelDepth"  class="multi_input clearfix">
                <h4 class="title">Channel Depth</h4>
                <label for="depthMeters">
                    <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in meters.</span>?</a>
                    <h5 class="unit">Meters</h5>
                </label>
                <input id="depthMeters" type="number" class="convert metric" name="depthMeters"
                    min="0"
                    value="<?php if (isset($_POST['depthMeters'])) :
                        echo $_POST['depthMeters'];
                    elseif (isset($estimate)) :
                        echo $estimate['estimate_channelDepth'];
                    endif; ?>"
                />
                <?php echo form_error('depthMeters', '<p class="error">', '</p>');?>

                <label for="depthFeet">
                    <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in feet.</span>?</a>
                    <h5 class="unit">Feet</h5>
                </label>
                <input id="depthFeet" type="number" name="depthFeet" class="convert imperial"
                    min="0"
                    value="<?php if(isset($_POST['depthFeet'])){echo $_POST['depthFeet'] ;} ?>"
                />
                <?php echo form_error('depthMeters', '<p class="error">', '</p>');?>
            </div>

            <div id="topWidth"  class="multi_input clearfix">
                <h4 class="title">Top Width of Channel</h4>
                <label for="topMeters">
                    <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in meters.</span>?</a>
                    <h5 class="unit">Meters</h5>
                </label>
                <input id="topMeters" type="number" class="convert metric" name="topMeters"
                    min="0"
                    value="<?php if (isset($_POST['topMeters'])) :
                        echo $_POST['topMeters'];
                    elseif (isset($estimate)) :
                        echo $estimate['estimate_topWidth'];
                    endif; ?>"
                />
                <?php echo form_error('topMeters', '<p class="error">', '</p>');?>

                <label for="topFeet">
                    <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in feet.</span>?</a>
                    <h5 class="unit">Feet</h5>
                </label>
                <input id="topFeet" type="number" name="topFeet" class="convert imperial"
                    min="0"
                    value="<?php if(isset($_POST['topFeet'])){echo $_POST['topFeet'] ;} ?>"
                />
            </div>
        </div>
    </div>
</div>