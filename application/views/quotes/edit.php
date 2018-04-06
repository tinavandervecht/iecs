<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator');
      echo form_open('quotes/editQuote/'.$estimate['estimate_id'], $attributes);?>

        <section class="pagnation-page current" id="1">
            <?php include 'application/views/quotes/partials/project_information.php'; ?>
            <?php include 'application/views/quotes/partials/flow_velocity.php'; ?>
        </section>

        <section class="pagnation-page" id="2">
            <?php include 'application/views/quotes/partials/slope.php'; ?>
            <?php include 'application/views/quotes/partials/flow_blocks.php'; ?>
        </section>

          <section class="pagnation-page" id="3">
            <div class="row">
              <div id="channelSpecs">
              <div class="columns small-12">
              <h3 class="sectionTitle">Channel Specifications</h3>
            </div>
          <div class="columns small-12 medium-6">
            <!-- <img src="<?php echo base_url('img/channel_specifications.jpg');?>" class="calcDiagram"  alt=""> -->
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
          </div>
              <div class="columns small-12 medium-6">

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
              <div class="summaryEntry" id="sum_block">
                <h4 class="entryTitle">Block Usage<a href="#" class="edit" data-pag="2"><span class="hide-for-mobile">Edit</span><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a></h4>
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
