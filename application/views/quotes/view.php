<main class="clearfix">
      <h2 class="hidden">Main Content</h2>
      <section class="row expanded" id="mainQuotes">
        <div class="row">
          <div class="columns small-12 card" id="quotes">
            <h3>Current Quotes</h3><img class="icon" src="<?php echo base_url('img/history_icon_black.svg');?>">
            <div id="scrollWrapper" class="quotesPage">
              <!-- ========================================================================= -->
              <?php foreach ($estimatesInfo as $estimate): ?>
              <div class="quote closed clearfix">

                <h5 class="dateModified">DATE MODIFIED: <span class="date"> <?php echo $estimate['estimate_modifiedDate'];?></span></h5>
                <h5 class="dateCreated">DATE CREATED: <span class="date"> <?php echo $estimate['estimate_date'];?></span></h5>
                <h4 class="title"><?php echo $estimate['estimate_name'];?></h4>
                <p class="desc">Alohamora wand elf parchment, Wingardium Leviosa hippogriff, house dementors betrayal. Holly, Snape centaur portkey ghost Hermione spell bezoar Scabbers. Peruvian-Night-Powder werewolf, Dobby pear-tickle half-moon-glasses, Knight-Bus.</p>
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
              <?php endforeach;?>

              <!-- ========================================================================= -->
          </div>          <!-- end scrollWrapper -->
        </div>
          <div class="columns small-12 card">
            <h3 class="display-block">New Quote</h3>
            <p class="halfsies">To begin a new analysis, click the green button to the right. The process will ask you to input information relating to your project, and will return the recommended Cable Concrete block as well as a number of safety factors to suit your project.</p>
            <a id="newQuoteButton" class="greenButton" href="<?php echo site_url('/quotes/newQuote');?>">Start New quote</a>
        </div>
        </div>
      </section>
    </main>
