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
                      <a href="<?php echo base_url('/quotes/editQuote/'.$estimate['estimate_id']);?>" class="clearfix">

                        <span class="text">EDIT</span>
                      </a>
                    </div>
                    <div class="rightButton">
                      <a href="#" class="clearfix">

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
            <p class="halfsies">Squashy armchairs dirt on your nose brass scales crush the Sopophorous bean with flat side of silver dagger, releases juice better than cutting. Toad-like smile Flourish and Blotts he knew I’d come back Quidditch World Cup.</p>
            <a id="newQuoteButton" class="greenButton" href="<?php echo site_url('/quotes/newQuote');?>">Start New quote</a>
        </div>
        </div>
      </section>
    </main>
