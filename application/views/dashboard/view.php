<main>
      <h2 class="hidden">Main Content</h2>
      <section class="row expanded" id="mainDashboard">
        <div class="row">
          <div class="columns small-12 medium-6 card left">
            <h3>Welcome <span class="name"><?php echo $userInfo['company_contactName'];?></span></h3>
            <img class="right-person" src="<?php echo base_url('img/default_dude_img.png');?>"/>
            <p class="welcomeText">This web application is a tool that allows contractors and engineers to calculate which Cable Concrete&reg; product will best suit their projects. You can preform these calculations yourself, as well as keep track and edit any calculations you make on this application.</p>
          </div>
          <div class="columns small-12 medium-6 card right">
            <h3>About IECS</h3>
            <p>Cable Concrete&reg; is an Articulating­ Concrete­ Block (ACB) system connected by cables allowing each individual block to be flexible and form to the terrain of the ground. This interconnected block system is available in four different thicknesses to provide the required stability for each project economically. </p>

            <!-- 22295 Hoskins Lin, Rodney, ON, CA - N0L 2C0<br>
            <span class="fade">Phone:</span> 1-800-821-7462<br>
            <span class="fade">Fax:</span> 1-866-496-1990<br>
            <a href="http://iecs.com" target="_blank">IECS Homepage</a> -->


          </div>
        </div>
        <div class="row border-top">
          <div class="columns small-12 medium-12 large-6 card left">
            <h3>Most Recent Quote</h3><img class="icon" src="<?php echo base_url('img/paper_icon_black.svg');?>">
            <?php if($estimatesInfo != false):?>
            <div class="quote">
              <h4 class="title"><?php echo $estimatesInfo[0]['estimate_name'];?></h4>
              <h5 class="dateModified">DATE MODIFIED: <span class="date"><?php echo $estimatesInfo[0]['estimate_modifiedDate'];?></span></h5>
              <p class="desc"><?php if ($estimatesInfo[0]['estimate_projectedDate']!="Not Specified"){
                echo "A calculation for a job ";
                if ($estimatesInfo[0]['estimate_location']!="Not Specified")
                  {
                    echo "at ".$estimatesInfo[0]['estimate_location']." ";
                  }
                 echo "on ".$estimatesInfo[0]['estimate_projectedDate'].". The Cable Concrete&reg; product recommended through the calculation is the CC70 with an average safety factor of 2.06.";
                 if ($estimatesInfo[0]['estimate_comments']!="") {
                   echo " Comments from the analysis author: ".$estimatesInfo[0]['estimate_comments'];
                 }
               }?></p>
                <div class="buttons clearfix">
                  <div class="leftButton">
                    <a href="<?php echo site_url('/quotes/summary/'.$estimatesInfo[0]['estimate_id']);?>" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/paper_icon_black.svg');?>">
                      <span class="text">VIEW</span>
                    </a>
                  </div>
                  <div class="centerButton">
                    <a href="<?php echo site_url('/quotes/editQuote/'.$estimatesInfo[0]['estimate_id']);?>" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/pencil_icon.svg');?>">
                      <span class="text">EDIT</span>
                    </a>
                  </div>
                  <div class="rightButton">
                    <a href="<?php echo site_url('/quotes/deleteQuote/'.$estimatesInfo[0]['estimate_id'].'/dashboard');?>" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/trash_icon.svg');?>">
                    <span class="text">DISCARD</span>
                  </a>
                  </div>
                </div>
            </div>
            <?php endif ?>
          </div>
          <div class="columns small-12 medium-12 large-6 card right" id="quotes">
            <h3>History</h3><img class="icon" src="<?php echo base_url('img/history_icon_black.svg');?>">
            <div id="scrollWrapper">
              <!-- ========================================================================= -->
              <?php if($estimatesInfo != false):?>
              <?php foreach ($estimatesInfo as $estimate): ?>
              <div class="quote <?php if($estimate['estimate_id'] != $estimatesInfo[0]['estimate_id']){echo "closed";}?>">
                <div class="statusbox">
                  <?php if($estimate['estimate_sent'] == 1):?>
                  <img class="icon" src="<?php echo base_url('img/complete_icon.svg');?>"/>
                  <div class="status">
                    <p>
                        STATUS:
                        <span>SUBMITTED</span>
                    </p>
                  </div>
              <?php else: ?>
                <img class="icon" src="<?php echo base_url('img/not_complete.svg');?>"/>
                <div class="status">
                    <p>
                        STATUS:
                        <span>UNSENT</span>
                    </p>
                </div>
                <?php endif; ?>
                </div>
                <h4 class="title"><?php echo $estimate['estimate_name'];?></h4>
                <h5 class="dateModified">DATE MODIFIED: <span class="date"><?php echo $estimate['estimate_modifiedDate'];?></span></h5>
                  <div class="buttons clearfix">
                    <div class="leftButton">
                      <a href="<?php echo site_url('/quotes/summary/'.$estimate['estimate_id']);?>" class="clearfix">
                      <img class="centered" src="<?php echo base_url('img/paper_icon_black.svg');?>">
                        <span class="text">VIEW</span>
                      </a>
                    </div>
                    <div class="centerButton">
                      <a href="<?php echo site_url('/quotes/editQuote/'.$estimate['estimate_id']);?>" class="clearfix">
                      <img class="centered" src="<?php echo base_url('img/pencil_icon.svg');?>">
                        <span class="text">EDIT</span>
                      </a>
                    </div>
                    <div class="rightButton">
                      <a href="<?php echo site_url('/quotes/deleteQuote/'.$estimate['estimate_id'].'/dashboard');?>" class="clearfix">
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
