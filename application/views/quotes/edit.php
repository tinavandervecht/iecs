<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator', 'novalidate' => 'novalidate');
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
            <?php include 'application/views/quotes/partials/channel.php'; ?>
            <?php include 'application/views/quotes/partials/environment.php'; ?>
        </section>

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
