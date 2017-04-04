<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator');
      echo form_open('quotes/editQuote/'.$estimate['estimate_id'], $attributes);?>

          <section class="pagnation-page current" id="1">
            <div class="row">
              <h3 class="hidden">Project Information</h3>
              <div id="projectName" class="columns small-12 medium-6">
                  <label for="name">
                    <h4 class="title">Project Name:</h4>
                      <a href="#" class="tip"><span class="tooltip">Required. Give Your Project a Name!</span>?</a>
                      <?php echo form_error('name', '<span class="error">', '</span>');?>
                  </label>
                  <input type="text" id="name" name="name" value="<?php echo $estimate['estimate_name'];?>"/>
              </div>
              <div id="date" class="columns small-12 medium-6">
                <label for="d">
                  <h4 class="title">Projected Start Date for Project:</h4>
                  </label>
                  <input type="date" id="d" name="projectedDate" value="<?php echo $estimate['estimate_projectedDate'];?>"/>
              </div>
              <div id="projectLocation" class="columns small-12 medium-6">
                  <label for="cityProv">
                    <h4 class="title">City  &amp; State/Province:</h4>
                    <a href="#" class="tip"><span class="tooltip">The projected location of this project.</span>?</a>

                  </label>
                  <input type="text" id="cityProv" name="cityProv" value="<?php echo $estimate['estimate_location'];?>" />
              </div>


              <div id="projectAddress" class="columns small-12 medium-6">
                  <label for="addr">
                    <h4 class="title">Address:</h4>
                    <a href="#" class="tip"><span class="tooltip">The address of this job. Not Required.</span>?</a>

                  </label>
                  <input type="text" id="addr" name="addr" value="<?php echo $estimate['estimate_address'];?>"/>
              </div>

              <div id="engineer" class="columns small-12 medium-6">
                  <label for="engineerName">
                    <h4 class="title">Engineer Name:</h4>
                    <a href="#" class="tip"><span class="tooltip">Name of the Engineer undertaking this project.</span>?</a>

                  </label>
                  <input type="text" id="engineerName" name="engineerName" value="<?php echo $estimate['estimate_engineer'];?>"/>
              </div>
              <div class="columns small-12 medium-6">
                <label for="measurement">
                  <h4 class="title">Measurement:</h4>
                  <a href="#" class="tip"><span class="tooltip">Will you be filling out this form in Metric or Imperial?</span>?</a>

                </label>
              <div id="hideTheMetric">
                <h4 class="label">Metric</h4>
                <div class="checkbox">
                  <input id="hideMetric" type="checkbox" checked>
                  <label for="hideMetric"></label>
                </div>
              </div>

              <div id="hideTheImperial">
                <h4 class="label">Imperial</h4>
                <div class="checkbox">
                <input id="hideImperial" type="checkbox" checked>
                <label for="hideImperial"></label>
              </div>
              </div>
            </div>
          </div>
          <!--End Project Info-->
          <!--==================================================================-->
              <div class="row">
                <div class="columns small-12">
                  <h3 class="sectionTitle">Flow and Velocity</h3>
                </div>
              <div id="flow"  class="clearfix columns small-12 medium-6">
                  <h4 class="title">Maximum Expected Flow</h4>
                  <label for="flowMeters">
                    <a href="#" class="tip"><span class="tooltip">Ensure the highest design flows are entered in cubic metres per second.</span></span>?</a>
                      <h5 class="unit">Cubic m/s</h5>
                      <?php echo form_error('flowMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="flowMeters" class="convert metric" name="flowMeters" value="<?php echo $estimate['estimate_expectedFlow'];?>"/>
                  <label for="flowFeet">
                      <a href="#" class="tip"><span class="tooltip">Ensure the highest design flows are entered in cubic feet per second.</span>?</a><h5 class="unit">Cubic ft/s</h5>
                      <?php echo form_error('flowMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="flowFeet"  class="convert imperial" />
              </div>

              <div id="velocity"  class="clearfix columns small-12 medium-6">
                  <h4 class="title">Maximum Expected Velocity</h4>
                  <label for="velocityMeters">
                      <a href="#" class="tip"><span class="tooltip">Input the pre-determined max velocity in m/s</span>?</a><h5 class="unit">Meters per Second</h5>
                      <?php echo form_error('velocityMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="velocityMeters" class="convert metric"  name="velocityMeters" value="<?php echo $estimate['estimate_expectedVelocity'];?>"/>
                  <label for="velocityFeet">
                      <a href="#" class="tip"><span class="tooltip">Input the pre-determined max velocity in f/s</span>?</a><h5 class="unit">Feet per Second</h5>
                      <?php echo form_error('velocityMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="velocityFeet"  class="convert imperial" />
              </div>
                </div>
          </section>

          <!--end flow and velocity-->
          <!--==================================================================-->










          <!--==================================================================-->
          <section class="pagnation-page" id="2">
            <div class="row">
              <div class="columns small-12">
                <h3 class="sectionTitle">Slopes</h3>
              </div>
              <div class="columns small-12 medium-6">
                <img src="<?php echo base_url('img/isometric_slope2.png');?>" class="calcDiagram" alt="">
              </div>
            <div class="columns small-12 medium-6">
              <div id="bedSlope"  class="clearfix">
                  <h4 class="title">Channel Bed Slope</h4>
                  <label for="bedSlopePercent">
                      <a href="#" class="tip"><span class="tooltip">Enter the bed slope of the spillway/channel in percentage form.</span>?</a><h5 class="unit">Percent (%)</h5>
                      <?php echo form_error('bedSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedSlopePercent" class="convert P" />
                  <label for="bedSlopeDecimal">
                      <a href="#" class="tip"><span class="tooltip">Enter the bed slope of the spillway/channel in decimal form.</span>?</a><h5 class="unit">Decimal</h5>
                      <?php echo form_error('bedSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedSlopeDecimal"  class="convert D" name="bedSlopeDecimal" value="<?php echo $estimate['estimate_bedSlope'];?>"/>
              </div>
              <div id="sideSlope"  class="clearfix">
                  <h4 class="title">Channel Side Slope</h4>
                  <label for="sideSlopePercent">
                    <?php echo form_error('sideSlopeDecimal', '<span class="error">', '</span>');?>
                      <a href="#" class="tip"><span class="tooltip">Enter channel side slope in H:V ‘ratio’ format – “Cot side slope”.</span>?</a><h5 class="unit">Percent (%)</h5>
                  </label>
                  <input id="sideSlopePercent" class="convert P"  />
                  <label for="sideSlopeDecimal">
                      <a href="#" class="tip"><span class="tooltip">Enter channel side slope in H:V ‘ratio’ format – “Cot side slope”.</span>?</a><h5 class="unit">Decimal</h5>
                      <?php echo form_error('sideSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="sideSlopeDecimal"  class="convert D" name="sideSlopeDecimal" value="<?php echo $estimate['estimate_sideSlope'];?>"/>
              </div>
              <div id="frictionAngle"  class="clearfix">
                  <h4 class="title">Friction Angle in Degrees</h4>
                  <label for="frAngle">
                      <a href="#" class="tip"><span class="tooltip">Enter a custom Friction Angle, if it applies - defaults to 30.</span>?</a><h5 class="unit">Degrees</h5>
                  </label>
                  <input id="frAngle" class=""  value="30"/>
              </div>
            </div>
            <div class="columns small-12 medium-6 medium-clear">
              <h3 class="sectionTitle">Types of Flow</h3>
              <div id="type"  class="clearfix">
                  <h4 class="title">Choose Type of Flow:</h4>
                  <label for="flowType">
                    <h5 class="unit">(normal, overtopping, etc.)</h5>
                      <?php echo form_error('flowType', '<span class="error">', '</span>');?>
                  </label>
                  <select id="flowType" name="flowType">
                    <option value="0" <?php if ($estimate['estimate_flowType'] == 0) {echo "selected";}?>>Normal</option>
                    <option value="1" <?php if ($estimate['estimate_flowType'] == 1) {echo "selected";}?>>Overtopping</option>
                    <option value="2" <?php if ($estimate['estimate_flowType'] == 2) {echo "selected";}?>>Sub Critical</option>
                    <option value="3" <?php if ($estimate['estimate_flowType'] == 3) {echo "selected";}?>>Hydraulic</option>
                    <option value="4" <?php if ($estimate['estimate_flowType'] == 4) {echo "selected";}?>>Jump</option>
                    <option value="5" <?php if ($estimate['estimate_flowType'] == 5) {echo "selected";}?>>Impinging</option>
                    <option value="6" <?php if ($estimate['estimate_flowType'] == 6) {echo "selected";}?>>Bridge/Culvert</option>
                    <option value="7" <?php if ($estimate['estimate_flowType'] == 7) {echo "selected";}?>>Undulating Trans Critical</option>
                  </select>
              </div>

              <div id="designComponent"  class="clearfix">
                  <label>
                  <h4 class="title">Type of Block</h4>
                      <a href="#" class="tip"><span class="tooltip">ADD TOOL TIP</span>?</a>
                  </label>
                  <select name="blockType">
                    <option value="0" <?php if ($estimate['estimate_blockType'] == 0) {echo "selected";}?>>Same Block for Both</option>
                    <option value="1" <?php if ($estimate['estimate_blockType'] == 1) {echo "selected";}?>>Different Block for each</option>
                  </select>
              </div>

                <div id="designComponent"  class="clearfix">
                  <label>
                  <h4 class="title">Use block on...</h4>
                  </label>
                  <select name="blockUse">
                    <option value="0"  <?php if ($estimate['estimate_blockUse'] == 0) {echo "selected";}?>>Both Bed and Side</option>
                    <option value="1" <?php if ($estimate['estimate_blockUse'] == 1) {echo "selected";}?>>Bed Only</option>
                    <option value="2" <?php if ($estimate['estimate_blockUse'] == 2) {echo "selected";}?>>Side Only</option>
                  </select>
              </div>
            </div>
              <div class="columns small-12 medium-6 end">
                  <h3 class="sectionTitle">Bed Width and Alignment</h3>
              <div id="bedWidth"  class="clearfix">
                  <h4 class="title">Bed Width</h4>
                  <label for="bedMeters">
                      <a href="#" class="tip"><span class="tooltip">Enter least bed width in meters (m).</span>?</a><h5 class="unit">Meters</h5>
                      <?php echo form_error('bedMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedMeters" class="convert metric" name="bedMeters" value="<?php echo $estimate['estimate_bedWidth'];?>"/>
                  <label for="bedFeet">
                      <a href="#" class="tip"><span class="tooltip">Enter least bed width in feet (f).</span>?</a><h5 class="unit">Feet</h5>
                      <?php echo form_error('bedMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedFeet"  class="convert imperial" />
              </div>
              <div id="alignment"  class="clearfix">
                  <h4 class="title">Alignment</h4>
                  <label for="alignType">
                      <a href="#" class="tip hidden"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">(straight, moderate, severe, extreme)</h5>
                      <?php echo form_error('alignType', '<span class="error">', '</span>');?>
                  </label>
                  <select id="alignType" name="alignType">
                    <option value="0" <?php if ($estimate['estimate_alignment'] == 0) {echo "selected";}?>>Straight</option>
                    <option value="1" <?php if ($estimate['estimate_alignment'] == 1) {echo "selected";}?>>Moderate</option>
                    <option value="2" <?php if ($estimate['estimate_alignment'] == 2) {echo "selected";}?>>Severe</option>
                    <option value="3" <?php if ($estimate['estimate_alignment'] == 3) {echo "selected";}?>>Extreme</option>
                  </select>
              </div>
              <div id="crestRadius"  class="clearfix">
                  <h4 class="title">Radius at the Crest</h4>
                  <label for="crestMeters">
                      <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a><h5 class="unit">Meters</h5>
                      <?php echo form_error('crestMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="crestMeters" class="convert metric" name="crestMeters" value="<?php echo $estimate['estimate_crestRadius'];?>"/>
                  <label for="crestFeet">
                      <a href="#" class="tip"><span class="tooltip">Enter value of Radius of curvature / Top width of channel (R/B). * “R” can be obtained from topographic maps or aerial photographs. “B” should be an actual field measurement or known quantity.</span>?</a><h5 class="unit">Feet</h5>
                      <?php echo form_error('crestMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="crestFeet"  class="convert imperial" />
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
          <div class="columns small-12 medium-6">
            <img src="<?php echo base_url('img/channel_specifications.jpg');?>" class="calcDiagram"  alt="">
          </div>
              <div class="columns small-12 medium-6">
              <div id="channelLength"  class="clearfix">
              <h4 class="title">Chute/Channel Length</h4>
              <label for="channelMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in meters.</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('channelMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="channelMeters" class="convert metric" name="channelMeters" value="<?php echo $estimate['estimate_channelLength'];?>"/>
              <label for="channelFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the total length of the protected area in feet.</span>?</a><h5 class="unit">Feet</h5>
                <?php echo form_error('channelMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="channelFeet"  class="convert imperial" />
              </div>

              <div id="channelDepth"  class="clearfix">
              <h4 class="title">Channel Depth</h4>
              <label for="depthMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in meters.</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('depthMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="depthMeters" class="convert metric" name="depthMeters" value="<?php echo $estimate['estimate_channelDepth'];?>"/>
              <label for="depthFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the channel water depth at design capacity in feet.</span>?</a><h5 class="unit">Feet</h5>
                <?php echo form_error('depthMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="depthFeet"  class="convert imperial" />
              </div>

              <div id="topWidth"  class="clearfix">
              <h4 class="title">Top Width of Channel</h4>
              <label for="topMeters">
                <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in meters.</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('topMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="topMeters" class="convert metric" name="topMeters" value="<?php echo $estimate['estimate_topWidth'];?>"/>
              <label for="topFeet">
                <a href="#" class="tip"><span class="tooltip">Enter the top width of the channel in feet.</span>?</a><h5 class="unit">Feet</h5>
              </label>
                <input id="topFeet"  class="convert imperial" />
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
                <?php echo form_error('sourceType', '<span class="error">', '</span>');?>
              </label>
                <select id="sourceType" name="sourceType">
                  <option value="0" <?php if ($estimate['estimate_outLetSource'] == 0) {echo "selected";}?>>River</option>
                  <option value="1" <?php if ($estimate['estimate_outLetSource'] == 1) {echo "selected";}?>>Manhole</option>
                  <option value="2" <?php if ($estimate['estimate_outLetSource'] == 2) {echo "selected";}?>>Pond</option>
                  <option value="3" <?php if ($estimate['estimate_outLetSource'] == 3) {echo "selected";}?>>Weir</option>
                  <option value="3" <?php if ($estimate['estimate_outLetSource'] == 4) {echo "selected";}?>>Other</option>
                </select>
              </div>
              <img src="<?php echo base_url('img/outlet_source.jpg');?>" class="calcDiagram hide-for-medium"  alt="">
              <div id="soil"  class="clearfix">
              <h4 class="title">Soil Type and Related Conditions</h4>
              <label for="soilType">
                <?php echo form_error('soilType', '<span class="error">', '</span>');?>
              </label>
                <select id="soilType" name="soilType">
                  <option value="0" <?php if ($estimate['estimate_soilType'] == 0) {echo "selected";}?>>Top Soil</option>
                  <option value="1" <?php if ($estimate['estimate_soilType'] == 1) {echo "selected";}?>>Clay</option>
                  <option value="2" <?php if ($estimate['estimate_soilType'] == 2) {echo "selected";}?>>Sand</option>
                  <option value="3" <?php if ($estimate['estimate_soilType'] == 3) {echo "selected";}?>>Silt</option>
                  <option value="3" <?php if ($estimate['estimate_soilType'] == 4) {echo "selected";}?>>Other</option>
                </select>
              </div>
            </div>
            <div class="columns small-12 medium-6">

              <div id="comments"  class="clearfix">
                <h4 class="title">Comments</h4>
                <label for="commentsBox">
                </label>
                <textarea id="commentsBox" name="commentsBox"><?php echo $estimate['estimate_comments'];?></textarea>
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
