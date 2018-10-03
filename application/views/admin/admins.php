<main>
<h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsCompanies">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
            <a href="<?php echo site_url('/admin');?>" class="tabTitle">&#10092; Admins</a>
            <div id="cardsbox">
            <div class="clearfix">
                <a href="<?php echo site_url('admin/createAdmin');?>" class="greenButton">New Admin</a>
            </div>

            <div class="centerIt clearfix" id="row1">

              <?php foreach ($admins as $admin): ?>
              <div class="companii clearfix">
                  <img src="<?php echo base_url('img/default_dude_img.png') ;?>" alt="Profile Picture">
                <div class="title">
                  <h3><?php echo $admin['admin_name'];?></h3>
                </div>
                <div class="viewCallout clearfix">
                  <a href="<?php echo site_url('admin/deleteAdmin/'.$admin['admin_id']);?>" class="redButton">Delete</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
      </div>

  </section>

    </section>
</main>
