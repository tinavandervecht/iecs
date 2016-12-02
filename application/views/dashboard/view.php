<main>
      <h2 class="hidden">Main Content</h2>
      <section class="row expanded" id="mainDashboard">
        <div class="row">
          <div class="columns small-12 medium-6 card left">
            <h3>Welcome <span class="name"><?php echo $userInfo['company_contactName'];?></span></h3>
            <img class="right-person" src="<?php echo base_url('img/default_dude_img.png');?>"/>
            <p class="welcomeText">Half-Blood Prince Invisibility Cloak cauldron cakes, hiya Harry! Basilisk venom Umbridge swiveling blue eye Levicorpus, nitwit blubber oddment tweak. Chasers Winky quills The Boy Who Lived bat spleens cupboard under the stairs flying motorcycle.</p>
          </div>
          <div class="columns small-12 medium-6 card right">
            <h3>About Cable Concrete</h3>
            <p>Cable Concrete&reg; is an Articulating­ Concrete­ Block (ACB) system connected by cables allowing each individual block to be flexible and form to the terrain of the ground. This interconnected block system is available in four different thicknesses to provide the required stability for each project economically. </p>
          </div>
        </div>
        <div class="row border-top">
          <div class="columns small-12 medium-6 card left">
            <h3>Most Recent Quote</h3><img class="icon" src="<?php echo base_url('img/paper_icon_black.svg');?>">
            <?php if($estimatesInfo != false):?>
            <div class="quote">
              <h4 class="title"><?php echo $estimatesInfo[0]['estimate_name'];?></h4>
              <h5 class="dateModified">DATE MODIFIED: <span class="date"><?php echo $estimatesInfo[0]['estimate_modifiedDate'];?></span></h5>
              <p class="desc"> Sirius Black Holyhead Harpies, you’ve got dirt on your nose. Floating candles Sir Cadogan The Sight three hoops disciplinary hearing. Grindlewald pig’s tail Sorcerer's Stone biting teacup. Side-along dragon-scale suits Filch 20 points, Mr. Potter. .</p>
                <div class="buttons clearfix">
                  <div class="leftButton">
                    <a href="<?php echo base_url('/quotes/editQuote/'.$estimatesInfo[0]['estimate_id']);?>" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/pencil_icon.svg');?>">
                      <span class="text">EDIT</span>
                    </a>
                  </div>
                  <div class="rightButton">
                    <a href="#" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/trash_icon.svg');?>">
                    <span class="text">DISCARD</span>
                  </a>
                  </div>
                </div>
            </div>
            <?php endif ?>
          </div>
          <div class="columns small-12 medium-6 card right" id="quotes">
            <h3>History</h3><img class="icon" src="<?php echo base_url('img/history_icon_black.svg');?>">
            <div id="scrollWrapper">
              <!-- ========================================================================= -->
              <?php if($estimatesInfo != false):?>
              <?php foreach ($estimatesInfo as $estimate): ?>
              <div class="quote <?php if($estimate['estimate_id'] != $estimatesInfo[0]['estimate_id']){echo "closed";}?>">
                <div class="statusbox">
                  <?php if($estimate['estimate_status'] == 1):?>
                  <img class="icon" src="<?php echo base_url('img/complete_icon.svg');?>"/>
                  <div class="status">
                    <p>STATUS:</p>
                    <span>COMPLETE</span>
                  </div>
              <?php else: ?>
                <img class="icon" src="<?php echo base_url('img/not_complete.svg');?>"/>
                <div class="status">
                  <p>STATUS:</p>
                  <span>INCOMPLETE</span>
                </div>
                <?php endif; ?>
                </div>
                <h4 class="title"><?php echo $estimate['estimate_name'];?></h4>
                <h5 class="dateModified">DATE CREATED: <span class="date"><?php echo $estimate['estimate_date'];?></span></h5>
                  <div class="buttons clearfix">
                    <div class="leftButton">
                      <a href="<?php echo base_url('/quotes/editQuote/'.$estimate['estimate_id']);?>" class="clearfix">
                      <img class="centered" src="<?php echo base_url('img/pencil_icon.svg');?>">
                        <span class="text">EDIT</span>
                      </a>
                    </div>
                    <div class="rightButton">
                      <a href="#" class="clearfix">
                      <img class="centered" src="<?php echo base_url('img/trash_icon.svg');?>">
                      <span class="text">DISCARD</span>
                    </a>
                    </div>
                  </div>
              </div>
            <?php endforeach; ?>
          <?php endif ?>
          </div>          <!-- end scrollWrapper -->
        </div>
        </div>
      </section>
    </main>
