<main>
<h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsCompanyProfile">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
            <a href="<?php echo site_url('admin/companies');?>" class="tabTitle">&#10092; COMPANY PROFILE</a>
            <div id="cardsbox" class="row">
              <div id="companyInfo" class="small-12 large-3 columns">
                  <h2 class="hidden">Company Info</h2>
                  <div id="company">
                    <img src="<?php echo base_url('img/default_dude_img.png');?>" alt="Profile Picture">
                    <div class="title">
                      <h3><?php echo $companyInfo['company_name'];?></h3>
                      <a href="mailto:<?php echo $companyInfo['company_email'];?>" style="text-decoration: none; color:white;"><h4><?php echo $companyInfo['company_email'];?></h4></a>
                    </div>
                    <div class="bottom">
                      <p class="username">Contact Name: <span class="value"><?php echo $companyInfo['company_contactName'];?></span></p>
                      <p class="username">Company: <span class="value"><?php echo $companyInfo['company_name'];?></span></p>
                      <p class="phone">Phone Number: <span class="value"><?php echo $companyInfo['company_phone'];?></span></p>
                      <p class="email">Email: <span class="value"><?php echo $companyInfo['company_email'];?></span></p>
                    </div>
                  </div>
              </div>
              <div id="companyEstimates" class="small-12 large-9 columns">
                <h2 class="hidden">Company Analyses</h2>
                <section id="cmsEstimates">
                  <?php foreach ($company as $estimate):?>
                  <div class="estiimat clearfix">
                    <div class="title">
                      <h3><?php echo $estimate['company_name'];?></h3>
                      <h4><?php echo $estimate['estimate_name'];?></h4>
                    </div>
                    <p><span class="edit">Date Edited: <?php echo substr($estimate['estimate_modifiedDate'],0,10);?></span></p>
                    <p><span class="block">Recommended Block: CC35</span></p>
                    <p><span class="factor">Safety Factor: 2.3</span></p>
                    <p><a href="<?php echo site_url('admin/summary/'.$estimate['estimate_id']);?>" class="reviewButton greyButton">Review</a></p>
                  </div>
                <?php endforeach;?>
                </section>
              </div>
          </div>
      </div>

  </section>

    </section>
</main>
