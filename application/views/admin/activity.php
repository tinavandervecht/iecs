<main>
  <h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsActivity">
    <div class="row" id="dashTab1">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered" id="recentContent">
            <a href="<?php echo site_url('/admin');?>" class="tabTitle">&#10092; RECENT ACTIVITY</a>
        <!-- ================================ -->
        <?php foreach ($activity as $act): ?>
           <!-- GET THE ACTIVITIES FROM THE DATABASE AND PRINT OUT AN APPROPRIATE NUMBER OF ENTRIES HERE -->
        <a href="<?php echo site_url('/admin/company/'.$act['company_id']);?>" class="companyEntry <?php if($act['activity_id'] == $activity[0]['activity_id']){echo "first";}?> clearfix">
          <div class="dateOfUpdate">
            <p class="dateup"><?php echo substr($act['activity_date'],0,11);?></p>
            <p class="time"><?php echo substr($act['activity_date'], 11);?></p>
          </div>
          <img src="<?php echo base_url('img/fake_icon.png');?>" alt="Company Profile Pic" class="companyPic"><h3 class="companyName"><?php echo $act['company_name'];?></h3>
          <p class="companyUpdate"><?php echo $act['activity_desc'];?></p>
        </a>
      <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
