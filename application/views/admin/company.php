<main>
<h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsCompanyProfile">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
            <a href="<?php echo site_url('admin/companies');?>" class="tabTitle">&#10092; COMPANY PROFILE</a>
            <div id="cardsbox" class="row">
              <div id="companyInfo" class="small-12 large-4 columns">
                  <h2 class="hidden">Company Info</h2>
                  <div id="company">
                      <?php if($companyInfo['company_avatar']): ?>
                          <div class="profilePicLarge _bg" style="background:url(<?php echo base_url($companyInfo['company_avatar'])?>)">
                          </div>
                      <?php else: ?>
                          <img src="<?php echo base_url('img/default_dude_img.png') ;?>" alt="Profile Picture">
                      <?php endif; ?>
                    <div class="title">
                      <h3><?php echo $companyInfo['company_name'];?></h3>
                      <a href="mailto:<?php echo $companyInfo['company_email'];?>" style="text-decoration: none; color:white;"><h4><?php echo $companyInfo['company_email'];?></h4></a>
                    </div>
                    <div class="bottom">
                      <p class="username">Contact Name: <span class="value"><?php echo $companyInfo['company_contactName'];?></span></p>
                      <p class="username">Company: <span class="value"><?php echo $companyInfo['company_name'];?></span></p>
                      <p class="username">City: <span class="value"><?php echo is_null($companyInfo['company_city']) ? 'N/A' : $companyInfo['company_city'];?></span></p>
                      <p class="phone">Phone Number: <span class="value"><?php echo $companyInfo['company_phone'];?></span></p>
                      <p class="email">Email: <span class="value"><?php echo $companyInfo['company_email'];?></span></p>
                      <p class="approved">
                          <?php if ($companyInfo['company_approved'] == 1): ?>
                              <a href="/profile/deny/<?php echo $companyInfo['company_id']; ?>">Disable Company Access</a>
                          <?php else: ?>
                              <a href="/profile/approve/<?php echo $companyInfo['company_id']; ?>">Approve Company Access</a>
                          <?php endif; ?>
                      </p>
                    </div>
                  </div>
              </div>
              <div id="companyEstimates" class="small-12 large-8 columns">
                <h2 class="hidden">Company Designs</h2>
                <section id="cmsEstimates">
                  <?php foreach ($company as $estimate):?>
                  <div class="estiimat clearfix">
                    <div class="title">
                      <h3><?php echo $estimate['company_name'];?></h3>
                      <h4><?php echo $estimate['estimate_name'];?></h4>
                    </div>
                    <p><span class="edit">Date Created: <?php echo substr($estimate['estimate_createdDate'],0,10);?></span></p>
                    <p><span class="edit">Last Edited: <?php echo substr($estimate['estimate_modifiedDate'],0,10);?></span></p>
                    <p><a href="<?php echo site_url('admin/summary/'.$estimate['estimate_id']);?>" class="reviewButton greyButton">Review</a></p>
                  </div>
                <?php endforeach;?>
                <?php if (empty($estimate)): ?>
                    <h2>No designs created by this company.</h2>
                <?php endif; ?>
                </section>
              </div>
          </div>
      </div>

  </section>

    </section>
</main>
