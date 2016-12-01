<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator');
      echo form_open('quotes/newQuote', $attributes);?>

          <section class="pagnation-page current" id="1">
            <div class="row">
              <h3 class="hidden">Project Information</h3>
              <div id="projectName" class="columns small-12 medium-6">
                  <label for="name">
                    <h4 class="title">Project Name:</h4>
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>
                      <?php echo form_error('name', '<span class="error">', '</span>');?>
                  </label>
                  <input type="text" id="name" name="name" placeholder="" />
              </div>
              <div id="date" class="columns small-12 medium-6">
                <label for="d">
                  <h4 class="title">Projected Start Date for Project:</h4>
                    <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>
                  </label>
                  <input type="date" id="d" name="d"/>
              </div>
              <div id="projectLocation" class="columns small-12 medium-6">
                  <label for="cityProv">
                    <h4 class="title">City  &amp; State/Province:</h4>
                    <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>

                  </label>
                  <input type="text" id="cityProv" name="cityProv" />
              </div>


              <div id="projectAddress" class="columns small-12 medium-6">
                  <label for="addr">
                    <h4 class="title">Address:</h4>
                    <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>

                  </label>
                  <input type="text" id="addr" name="addr"/>
              </div>

              <div id="engineer" class="columns small-12 medium-6">
                  <label for="engineerName">
                    <h4 class="title">Engineer Name:</h4>
                    <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>

                  </label>
                  <input type="text" id="engineerName" name="engineerName"/>
              </div>
              <div class="columns small-12 medium-6">
                <label for="measurement">
                  <h4 class="title">Measurement:</h4>
                  <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>

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
                    <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a>
                      <h5 class="unit">Cubic m/s</h5>
                      <?php echo form_error('flowMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="flowMeters" class="convert metric" name="flowMeters" placeholder=""/>
                  <label for="flowFeet">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Cubic ft/s</h5>
                      <?php echo form_error('flowMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="flowFeet"  class="convert imperial" />
              </div>

              <div id="velocity"  class="clearfix columns small-12 medium-6">
                  <h4 class="title">Maximum Expected Velocity</h4>
                  <label for="velocityMeters">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters per Second</h5>
                      <?php echo form_error('velocityMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="velocityMeters" class="convert metric"  name="velocityMeters" placeholder=""/>
                  <label for="velocityFeet">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet per Second</h5>
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
              <div class="columns small-12 medium-6 medium-push-6 large-6 large-pull-0">
                <img src="<?php echo base_url('img/channel_slope.jpg');?>" class="calcDiagram" alt="">
              </div>
            <div class="columns small-12 medium-6 medium-pull-6 large-6 large-pull-0">
              <div id="bedSlope"  class="clearfix">
                  <h4 class="title">Channel Bed Slope</h4>
                  <label for="bedSlopePercent">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Percent (%)</h5>
                      <?php echo form_error('bedSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedSlopePercent" class="convert P" />
                  <label for="bedSlopeDecimal">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Decimal</h5>
                      <?php echo form_error('bedSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedSlopeDecimal"  class="convert D" name="bedSlopeDecimal" placeholder=""/>
              </div>
              <div id="sideSlope"  class="clearfix">
                  <h4 class="title">Channel Side Slope</h4>
                  <label for="sideSlopePercent">
                    <?php echo form_error('sideSlopeDecimal', '<span class="error">', '</span>');?>
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Percent (%)</h5>
                  </label>
                  <input id="sideSlopePercent" class="convert P"  />
                  <label for="sideSlopeDecimal">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Decimal</h5>
                      <?php echo form_error('sideSlopeDecimal', '<span class="error">', '</span>');?>
                  </label>
                  <input id="sideSlopeDecimal"  class="convert D" name="sideSlopeDecimal" placeholder=""/>
              </div>
            </div>
            <div class="columns small-12 medium-6 medium-clear">
              <h3 class="sectionTitle">Types of Flow</h3>
              <div id="type"  class="clearfix">
                  <h4 class="title">Choose Type of Flow:</h4>
                  <label for="flowType">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">(normal, overtopping, etc.)</h5>
                      <?php echo form_error('flowType', '<span class="error">', '</span>');?>
                  </label>
                  <input id="flowType" name="flowType" placeholder=""/>
              </div>
            </div>
              <div class="columns small-12 medium-6 end">
                  <h3 class="sectionTitle">Bed Width and Alignment</h3>
              <div id="bedWidth"  class="clearfix">
                  <h4 class="title">Bed Width</h4>
                  <label for="bedMeters">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters</h5>
                      <?php echo form_error('bedMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedMeters" class="convert metric" name="bedMeters" placeholder=""/>
                  <label for="bedFeet">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet</h5>
                      <?php echo form_error('bedMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="bedFeet"  class="convert imperial" />
              </div>
              <div id="alignment"  class="clearfix">
                  <h4 class="title">Alignment</h4>
                  <label for="alignType">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">(straight, moderate, severe, extreme)</h5>
                      <?php echo form_error('alignType', '<span class="error">', '</span>');?>
                  </label>
                  <input id="alignType" name="alignType" placeholder=""/>
              </div>
              <div id="crestRadius"  class="clearfix">
                  <h4 class="title">Radius at the Crest</h4>
                  <label for="crestMeters">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters</h5>
                      <?php echo form_error('crestMeters', '<span class="error">', '</span>');?>
                  </label>
                  <input id="crestMeters" class="convert metric" name="crestMeters" placeholder=""/>
                  <label for="crestFeet">
                      <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet</h5>
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
              <div class="columns small-12">
              <h3 class="sectionTitle">Channel Specifications</h3>
            </div>
          <div class="columns small-12 medium-6 medium-push-6 large-pull-0">
            <img src="<?php echo base_url('img/channel_specifications.jpg');?>" class="calcDiagram"  alt="">
          </div>
              <div class="columns small-12 medium-6 medium-pull-6 large-pull-0">
              <div id="channelLength"  class="clearfix">
              <h4 class="title">Chute/Channel Length</h4>
              <label for="channelMeters">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('channelMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="channelMeters" class="convert metric" name="channelMeters" placeholder=""/>
              <label for="channelFeet">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet</h5>
                <?php echo form_error('channelMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="channelFeet"  class="convert imperial" />
              </div>

              <div id="channelDepth"  class="clearfix">
              <h4 class="title">Channel Depth</h4>
              <label for="depthMeters">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('depthMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="depthMeters" class="convert metric" name="depthMeters" placeholder=""/>
              <label for="depthFeet">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet</h5>
                <?php echo form_error('depthMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="depthFeet"  class="convert imperial" />
              </div>

              <div id="topWidth"  class="clearfix">
              <h4 class="title">Top Width of Channel</h4>
              <label for="topMeters">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Meters</h5>
                <?php echo form_error('topMeters', '<span class="error">', '</span>');?>
              </label>
                <input id="topMeters" class="convert metric" name="topMeters" placeholder=""/>
              <label for="topFeet">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">Feet</h5>
              </label>
                <input id="topFeet"  class="convert imperial" />
              </div>
            </div>

            <div class="columns small-12">
            <h3 class="sectionTitle">Environment</h3>
          </div>
          <div class="columns small-12 medium-6">
              <div id="source"  class="clearfix">
              <h4 class="title">Outlet Source</h4>
              <label for="sourceType">
                <a href="#" class="tip"><span class="tooltip">insert tip here</span>?</a><h5 class="unit">(river, manhole, etc.)</h5>
                <?php echo form_error('sourceType', '<span class="error">', '</span>');?>
              </label>
                <input id="sourceType" name="sourceType" placeholder="" />
              </div>
              <img src="<?php echo base_url('img/outlet_source.jpg');?>" class="calcDiagram hide-for-medium"  alt="">
              <div id="soil"  class="clearfix">
              <h4 class="title">Soil Type and Related Conditions</h4>
              <label for="soilType">
                <?php echo form_error('soilType', '<span class="error">', '</span>');?>
              </label>
                <input id="soilType" name="soilType" placeholder=""/>
              </div>
            </div>
            <div class="columns small-12 medium-6">

              <div id="comments"  class="clearfix">
                <h4 class="title">Comments</h4>
                <label for="commentsBox">
                </label>
                <textarea id="commentsBox" name="commentsBox"></textarea>
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
                <h4 class="entryTitle">PROJECT DETAILS<a href="#" class="edit" data-pag="1">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_flow">
                <h4 class="entryTitle">Flow and velocity<a href="#" class="edit" data-pag="1">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_slopes">
                <h4 class="entryTitle">Slopes<a href="#" class="edit" data-pag="2">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
              <div class="summaryEntry" id="sum_type">
                <h4 class="entryTitle">Types of Flow<a href="#" class="edit" data-pag="2">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
                <p class="text"> Nothing here.</p>
              </div>
              <!-- end of summaryEntry -->
          </div>
          <div class="columns small-12 medium-6">
            <div class="summaryEntry" id="sum_bed">
              <h4 class="entryTitle">Bed width and alignment<a href="#" class="edit" data-pag="2">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_channel">
              <h4 class="entryTitle">Channel Specifications<a href="#" class="edit" data-pag="3">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_environment">
              <h4 class="entryTitle">Environment<a href="#" class="edit" data-pag="3">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
              <p class="text"> Nothing here.</p>
            </div>
            <!-- end of summaryEntry -->
            <div class="summaryEntry" id="sum_comments">
              <h4 class="entryTitle">Comments<a href="#" class="edit" data-pag="3">Edit<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
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
