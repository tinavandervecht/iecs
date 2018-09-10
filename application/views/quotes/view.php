<main class="clearfix">
      <h2 class="hidden">Main Content</h2>
      <section class="row expanded" id="mainQuotes">
          <div class="columns small-12 card">
            <h3 class="display-block">New Design</h3>
            <p class="halfsies">To begin a new analysis, click the green button to the right. The process will ask you to input information relating to your project, and will return the recommended Cable Concrete block as well as a number of safety factors to suit your project.</p>
            <a id="newQuoteButton" class="greenButton" href="<?php echo site_url('/quotes/newQuote');?>">Start New Design</a>
        </div>
        <div class="row">
          <div class="columns small-12 card" id="quotes">
            <h3>Current Designs</h3><img class="icon" src="<?php echo base_url('img/history_icon_black.svg');?>">
            <div id="scrollWrapper" class="quotesPage <?php echo empty($estimatesInfo) ? 'noScroll' : ''; ?>">
              <!-- ========================================================================= -->
              <?php if (empty($estimatesInfo)): ?>
                  <h4 class="title">No designs to show.</h4>
              <?php endif; ?>
              <?php foreach ($estimatesInfo as $estimate): ?>
              <div class="quote closed clearfix">

                <h5 class="dateModified">DATE MODIFIED: <span class="date"> <?php echo $estimate['estimate_modifiedDate'];?></span></h5>
                <h5 class="dateCreated">DATE CREATED: <span class="date"> <?php echo $estimate['estimate_date'];?></span></h5>
                <h4 class="title"><?php echo $estimate['estimate_name'];?></h4>
                <p class="desc"><?php if ($estimate['estimate_projectedDate']!="Not Specified"){
                  echo "A calculation for a job ";
                  if ($estimate['estimate_location']!="Not Specified")
                    {
                      echo "at ".$estimate['estimate_location']." ";
                    }
                   echo "on ".$estimate['estimate_projectedDate'].".";
                   if ($estimate['estimate_comments']!="") {
                     echo " Comments from the analysis author: ".$estimate['estimate_comments'];
                   }
                 }?></p>
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
                    <a href="<?php echo site_url('/quotes/deleteQuote/'.$estimate['estimate_id'].'/quotes');?>" class="clearfix">
                    <img class="centered" src="<?php echo base_url('img/trash_icon.svg');?>">
                    <span class="text">DISCARD</span>
                  </a>
                  </div>
                </div>
              </div>
              <?php endforeach;?>

              <!-- ========================================================================= -->
          </div>          <!-- end scrollWrapper -->
        </div>
        </div>
      </section>
    </main>
