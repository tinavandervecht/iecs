<main>
<h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsCompanies">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
            <a href="cms_dashboard.html" class="tabTitle">&#10092; COMPANIES</a>
            <div id="cardsbox">
            <!-- ================================ -->

            <?php echo form_open('/admin/companies');?>
            <input id="sort_input" list="sort" value="Most Recent"/>
            <datalist id="sort">
                  <option value="Most Recent"></option>
                  <option value="Flagged for Review"></option>
                  <option value="Company (A-Z)"></option>
            </datalist>
            <input type="search" placeholder="Search" name="search" id="search">
            <input type="submit" name="submit" value="submit">
          </form>
            <!-- ================================ -->
            <div class="centerIt clearfix" id="row1">

              <?php foreach ($companies as $company): ?>
              <div class="companii clearfix">
                <img src="<?php echo base_url('img/default_dude_img.png');?>" alt="Profile Picture">
                <div class="title">
                  <h3><?php echo $company['company_name'];?></h3>
                  <h4><?php echo $company['company_contactName'];?></h4>
                </div>
                <div class="viewCallout clearfix">
                  <a href="<?php echo site_url('admin/company/'.$company['company_id']);?>" class="greenButton">View</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
      </div>

  </section>

    </section>
</main>
