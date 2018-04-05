<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator', 'novalidate' => 'novalidate');
      echo form_open('quotes/newQuote', $attributes);?>

        <section class="pagnation-page current" id="1">
            <?php include 'application/views/quotes/partials/project_information.php'; ?>
            <?php include 'application/views/quotes/partials/flow_velocity.php'; ?>
        </section>

          <section class="pagnation-page" id="2">
            <div class="row">
              <div class="columns small-12">
                <h3 class="sectionTitle">Slopes</h3>
              </div>
              <div class="columns small-12 medium-6 medium-push-6 large-6 large-pull-0">
                <div class="calcDiagram" id="svg1">
                  <?php echo file_get_contents(base_url('img/iso_slope.svg')); ?>
                </div>
              </div>
            <div class="columns small-12 medium-6 medium-pull-6 large-6 large-pull-0">
              <div id="bedSlope"  class="clearfix">
                  <label for="bedSlopePercent">
                    <h4 class="title">Channel Bed Slope</h4>
                      <a href="#" class="tip"><span class="tooltip">Enter the bed slope of the spillway/channel in percentage or decimal form.</span>?</a><h5 class="unit">Percent (%)</h5>
                  </label>
                  <input type="number" id="bedSlopePercent" name="bedSlopePercent" class="convert P required" value="<?php echo isset($_POST['bedSlopePercent']) ? $_POST['bedSlopePercent'] : '0.00'; ?>"/>
                  <?php echo form_error('bedSlopeDecimal', '<p class="error">', '</p>');?>
                  <label for="bedSlopeDecimal">
                    <h5 class="unit">Decimal</h5>
                  </label>
                  <input type="number" id="bedSlopeDecimal"  class="convert D required" name="bedSlopeDecimal" value="<?php echo isset($_POST['bedSlopeDecimal']) ? $_POST['bedSlopeDecimal'] : '0.00'; ?>"/>
                  <?php echo form_error('bedSlopeDecimal', '<p class="error">', '</p>');?>
              </div>
              <div id="sideSlope"  class="clearfix">

                  <label for="sideSlopePercent">
                    <h4 class="title">Channel Side Slope</h4>
                      <a href="#" class="tip"><span class="tooltip">Enter channel side slope in H:V ‘ratio’ format – “Cot side slope”</span>?</a><h5 class="unit">Percent (%)</h5>
                  </label>
                  <input type="number" id="sideSlopePercent" class="convert P required" name="sideSlopePercent" value="<?php echo isset($_POST['sideSlopePercent']) ? $_POST['sideSlopePercent'] : '0.00'; ?>" />
                  <?php echo form_error('sideSlopeDecimal', '<p class="error">', '</p>');?>
                  <label for="sideSlopeDecimal">
                    <h5 class="unit">Decimal</h5>
                  </label>
                  <input type="number" id="sideSlopeDecimal"  class="convert D required" name="sideSlopeDecimal" value="<?php echo isset($_POST['sideSlopeDecimal']) ? $_POST['sideSlopeDecimal'] : '0.00'; ?>"/>
                  <?php echo form_error('sideSlopeDecimal', '<p class="error">', '</p>');?>
              </div>
              <div id="frictionAngle"  class="clearfix">
                  <h4 class="title">Friction Angle in Degrees</h4>
                  <label for="frAngle">
                      <a href="#" class="tip"><span class="tooltip">Enter a custom Friction Angle, if it applies - defaults to 30.</span>?</a><h5 class="unit">Degrees</h5>
                  </label>
                  <input type="number" id="frAngle" class="" name="friction" value="30" value="<?php if(isset($_POST['friction'])){echo $_POST['friction'] ;} ?>"/>
              </div>

            </div>
            <div class="columns small-12 medium-6 medium-clear">
              <h3 class="sectionTitle">Types of Flow</h3>
              <div id="type"  class="clearfix">
                  <h4 class="title">Choose Type of Flow:</h4>
                  <label for="flowType">
                    <h5 class="unit">(normal, overtopping, etc.)</h5>
                  </label>
                  <select id="flowType" name="flowType">
                    <option value="0" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 0) { echo 'selected="true"';} ?>>Normal</option>
                    <option value="1" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 1) { echo 'selected="true"';} ?>>Overtopping</option>
                    <option value="2" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 2) { echo 'selected="true"';} ?>>Sub Critical</option>
                    <option value="3" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 3) { echo 'selected="true"';} ?>>Hydraulic</option>
                    <option value="4" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 4) { echo 'selected="true"';} ?>>Jump</option>
                    <option value="5" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 5) { echo 'selected="true"';} ?>>Impinging</option>
                    <option value="6" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 6) { echo 'selected="true"';} ?>>Bridge/Culvert</option>
                    <option value="7" <?php if (isset($_POST['flowType']) && $_POST['flowType'] == 7) { echo 'selected="true"';} ?>>Undulating Trans Critical</option>
                  </select>
                  <?php echo form_error('flowType', '<p class="error">', '</p>');?>
              </div>
              <div id="designComponent"  class="clearfix">
                  <h4 class="title">Type of Block</h4>
                  <label for="blockType">
                      <!-- <a href="#" class="tip"><span class="tooltip">ADD TOOL TIP</span>?</a> -->
                  </label>
                  <select name="blockType">
                    <option value="0" <?php if (isset($_POST['blockType']) && $_POST['blockType'] == 0) { echo 'selected="true"';} ?>>Same Block for Both</option>
                    <option value="1" <?php if (isset($_POST['blockType']) && $_POST['blockType'] == 1) { echo 'selected="true"';} ?>>Different Block for each</option>
                  </select>
              </div>

                <div id="designComponentTwo"  class="clearfix">
                  <h4 class="title">Use block on...</h4>
                  <label for="blockUse">
                    <!-- <a href="#" class="tip"><span class="tooltip">ADD TOOL TIP</span>?</a> -->
                  </label>
                  <select name="blockUse">
                    <option value="0" <?php if (isset($_POST['blockUse']) && $_POST['blockUse'] == 0) { echo 'selected="true"';} ?>>Both Bed and Side</option>
                    <option value="1" <?php if (isset($_POST['blockUse']) && $_POST['blockUse'] == 1) { echo 'selected="true"';} ?>>Bed Only</option>
                    <option value="2" <?php if (isset($_POST['blockUse']) && $_POST['blockUse'] == 2) { echo 'selected="true"';} ?>>Side Only</option>
                  </select>
              </div>
            </div>
              <div class="columns small-12 medium-6 end">
                  <h3 class="sectionTitle">Bed Width and Alignment</h3>
              <div id="bedWidth"  class="clearfix">
                  <h4 class="title">Bed Width</h4>
                  <label for="bedMeters">
                      <a href="#" class="tip"><span class="tooltip">Enter least bed width in meters (m).</span>?</a><h5 class="unit">Meters</h5>
                  </label>
                  <input type="number" id="bedMeters" class="convert metric required" name="bedMeters" value="<?php if(isset($_POST['bedMeters'])){echo $_POST['bedMeters'] ;} ?>"/>
                  <?php echo form_error('bedMeters', '<p class="error">', '</p>');?>
                  <label for="bedFeet">
                      <a href="#" class="tip"><span class="tooltip">Enter least bed width in feet (f).</span>?</a><h5 class="unit">Feet</h5>
                  </label>
                  <input type="number" id="bedFeet" name="bedFeet" class="convert imperial required" value="<?php if(isset($_POST['bedFeet'])){echo $_POST['bedFeet'] ;} ?>" />
                  <?php echo form_error('bedMeters', '<p class="error">', '</p>');?>
              </div>
              <div id="alignment"  class="clearfix">
                  <h4 class="title">Alignment</h4>
                  <label for="alignType">
                      <a href="#" class="tip hidden"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">(straight, moderate, severe, extreme)</h5>
                  </label>
                  <select id="alignType" name="alignType">
                    <option value="0" <?php if (isset($_POST['alignType']) && $_POST['alignType'] == 0) { echo 'selected="true"';} ?>>Straight</option>
                    <option value="1" <?php if (isset($_POST['alignType']) && $_POST['alignType'] == 1) { echo 'selected="true"';} ?>>Not Straight</option>
                  </select>
                  <?php echo form_error('alignType', '<p class="error">', '</p>');?>
              </div>
              <div id="crestRadius"  class="clearfix">
                  <h4 class="title">Radius at the Crest</h4>
                  <label for="crestMeters">
                      <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a><h5 class="unit">Meters</h5>
                  </label>
                  <input type="number" id="crestMeters" class="convert metric" name="crestMeters" value="<?php if(isset($_POST['crestMeters'])){echo $_POST['crestMeters'] ;} ?>" />
                  <?php echo form_error('crestMeters', '<p class="error">', '</p>');?>
                  <label for="crestFeet">
                      <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a><h5 class="unit">Feet</h5>
                  </label>
                  <input type="number" id="crestFeet" name="crestFeet" class="convert imperial" value="<?php if(isset($_POST['crestFeet'])){echo $_POST['crestFeet'] ;} ?>" />
                  <?php echo form_error('crestMeters', '<p class="error">', '</p>');?>
              </div>
            </div>
          </div>
          </section>
          <!--==================================================================-->











          <!--==================================================================-->
          <section class="pagnation-page" id="3">
            <div class="row">
              <div id="channelSpecs">
              <div class="columns small-12">
              <h3 class="sectionTitle">Channel Specifications</h3>
            </div>
          <!-- <div class="columns small-12 medium-6 medium-push-6 large-pull-0">
            <img src="<?php echo base_url('img/channel_specifications.jpg');?>" class="calcDiagram"  alt="">
          </div> -->
              <div class="columns small-12 medium-6 medium-pull-6 large-pull-0">
              <div id="channelLength"  class="clearfix">
              <h4 class="title">Chute/Channel Length</h4>
              <label for="channelMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in meters.</span>?</a><h5 class="unit">Meters</h5>
              </label>
                <input id="channelMeters" class="convert metric" name="channelMeters" value="<?php if(isset($_POST['channelMeters'])){echo $_POST['channelMeters'] ;} ?>"/>
                <?php echo form_error('channelMeters', '<p class="error">', '</p>');?>
              <label for="channelFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in feet.</span>?</a><h5 class="unit">Feet</h5>
              </label>
                <input id="channelFeet" name="channelFeet" class="convert imperial" value="<?php if(isset($_POST['channelFeet'])){echo $_POST['channelFeet'] ;} ?>"/>
                <?php echo form_error('channelMeters', '<p class="error">', '</p>');?>
              </div>

              <div id="channelDepth"  class="clearfix">
              <h4 class="title">Channel Depth</h4>
              <label for="depthMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in meters.</span>?</a><h5 class="unit">Meters</h5>
              </label>
                <input id="depthMeters" class="convert metric" name="depthMeters" value="<?php if(isset($_POST['depthMeters'])){echo $_POST['depthMeters'] ;} ?>"/>
                <?php echo form_error('depthMeters', '<p class="error">', '</p>');?>
              <label for="depthFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in feet.</span>?</a><h5 class="unit">Feet</h5>
              </label>
                <input id="depthFeet" name="depthFeet" class="convert imperial" value="<?php if(isset($_POST['depthFeet'])){echo $_POST['depthFeet'] ;} ?>" />
                <?php echo form_error('depthMeters', '<p class="error">', '</p>');?>
              </div>

              <div id="topWidth"  class="clearfix">
              <h4 class="title">Top Width of Channel</h4>
              <label for="topMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in meters.</span>?</a><h5 class="unit">Meters</h5>
              </label>
                <input id="topMeters" class="convert metric" name="topMeters" value="<?php if(isset($_POST['topMeters'])){echo $_POST['topMeters'] ;} ?>"/>
                <?php echo form_error('topMeters', '<p class="error">', '</p>');?>
              <label for="topFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in feet.</span>?</a><h5 class="unit">Feet</h5>
              </label>
                <input id="topFeet" name="topFeet" class="convert imperial" value="<?php if(isset($_POST['topFeet'])){echo $_POST['topFeet'] ;} ?>" />
              </div>
            </div>
          </div>

            <div class="columns small-12">
            <h3 class="sectionTitle">Environment</h3>
          </div>
          <div class="columns small-12 medium-6">
              <div id="source"  class="clearfix">
              <h4 class="title">Outlet Source</h4>
              <label for="sourceType">
                <h5 class="unit">(river, manhole, etc.)</h5>
              </label>
                <select id="sourceType" name="sourceType">
                  <option value="0" <?php if (isset($_POST['sourceType']) && $_POST['sourceType'] == 0) { echo 'selected="true"';} ?>>River</option>
                  <option value="1" <?php if (isset($_POST['sourceType']) && $_POST['sourceType'] == 1) { echo 'selected="true"';} ?>>Manhole</option>
                  <option value="2" <?php if (isset($_POST['sourceType']) && $_POST['sourceType'] == 2) { echo 'selected="true"';} ?>>Pond</option>
                  <option value="3" <?php if (isset($_POST['sourceType']) && $_POST['sourceType'] == 3) { echo 'selected="true"';} ?>>Weir</option>
                  <option value="4" <?php if (isset($_POST['sourceType']) && $_POST['sourceType'] == 4) { echo 'selected="true"';} ?>>Other</option>
                </select>
                <?php echo form_error('sourceType', '<p class="error">', '</p>');?>
              </div>
              <img src="<?php echo base_url('img/outlet_source.jpg');?>" class="calcDiagram hide-for-medium"  alt="">
              <div id="soil"  class="clearfix">
              <h4 class="title">Soil Type and Related Conditions</h4>
              <label for="soilType">
              </label>
                <select id="soilType" name="soilType">
                  <option value="0" <?php if (isset($_POST['soilType']) && $_POST['soilType'] == 0) { echo 'selected="true"';} ?>>Top Soil</option>
                  <option value="1" <?php if (isset($_POST['soilType']) && $_POST['soilType'] == 1) { echo 'selected="true"';} ?>>Clay</option>
                  <option value="2" <?php if (isset($_POST['soilType']) && $_POST['soilType'] == 2) { echo 'selected="true"';} ?>>Sand</option>
                  <option value="3" <?php if (isset($_POST['soilType']) && $_POST['soilType'] == 3) { echo 'selected="true"';} ?>>Silt</option>
                  <option value="4" <?php if (isset($_POST['soilType']) && $_POST['soilType'] == 4) { echo 'selected="true"';} ?>>Other</option>
                </select>
                <?php echo form_error('soilType', '<p class="error">', '</p>');?>
              </div>
            </div>
            <div class="columns small-12 medium-6">

              <div id="comments"  class="clearfix">
                <h4 class="title">Comments</h4>
                <label for="commentsBox">
                </label>
                <textarea id="commentsBox" name="commentsBox"><?php if(isset($_POST['commentsBox'])){echo $_POST['commentsBox'] ;} ?></textarea>
              </div>

            </div>
          </div>
          </section>
          <!--==================================================================-->













          <!--==================================================================-->
          <section class="pagnation-page" id="4">
            <div class="row">
              <div class="columns small-12">
              <a href="#" id="goBack" data-pag="3" class="sectionTitle">&lt;&nbsp;Input Review</a>
            </div>
            <div class="columns small-12 medium-6">
              <div class="summaryEntry" id="sum_details">
                <h4 class="entryTitle">PROJECT DETAILS<a href="#" class="edit" data-pag="1"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_flow">
                <h4 class="entryTitle">Flow and velocity<a href="#" class="edit" data-pag="1"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_slopes">
                <h4 class="entryTitle">Slopes<a href="#" class="edit" data-pag="2"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_type">
                <h4 class="entryTitle">Types of Flow<a href="#" class="edit" data-pag="2"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
          </div>
          <div class="columns small-12 medium-6">
            <div class="summaryEntry" id="sum_bed">
              <h4 class="entryTitle">Bed width and alignment<a href="#" class="edit" data-pag="2"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_channel">
              <h4 class="entryTitle">Channel Specifications<a href="#" class="edit" data-pag="3"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_environment">
              <h4 class="entryTitle">Environment<a href="#" class="edit" data-pag="3"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_comments">
              <h4 class="entryTitle">Comments<a href="#" class="edit" data-pag="3"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
        </div>
          </div>
          </section>
          <!--==================================================================-->
          <section class="pagnation-page" id="5">
            <h3 class="hidden">Calculated</h3>
          </section>
          <!--==================================================================-->
          <div class="row">
          <div class="columns small-12 expanded">
            <a href="#" class="continueButton greenButton">CONTINUE</a>
            <div id="calc" class="hidden">
              <!--set up as a form submit to allow for use of post method. not sure if this was necessary.-->
              <input id="calculateit" name="submit" type="submit" class="greenButton" value="Calculate">
            </div>
          </div>
        </div>


      </form>
    </section>
  </main>
