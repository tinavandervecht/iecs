<main>
<h2 class="hidden">Main Content</h2>
  <section class="row expanded" id="cmsDashboard">
    <div class="row" id="dashTab1">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered" id="recentContent">
        <a href="<?php echo site_url('/admin/activity');?>" class="tabTitle">RECENT ACTIVITY</a>
    <!-- ================================ -->
    <?php if (empty($activity)) : ?>
        <a href="#" class="companyEntry first clearfix">
          <div class="dateOfUpdate">
            <p class="dateup"></p>
            <p class="time"></p>
          </div>
          <p class="companyUpdate">No activity to show.</p>
        </a>
    <?php endif; ?>
    <?php foreach ($activity as $act): ?>
    <a href="<?php echo site_url('/admin/company/'.$act['company_id']);?>" class="companyEntry <?php if($act['activity_id'] == $activity[0]['activity_id']){echo "first";}?> clearfix">
      <div class="dateOfUpdate">
        <p class="dateup"><?php echo substr($act['activity_date'],0,11);?></p>
        <p class="time"><?php echo substr($act['activity_date'], 11);?></p>
      </div>
      <img src="<?php echo base_url('img/fake_icon.png');?>" alt="Company Profile Pic" class="companyPic"><h3 class="companyName"><?php echo $act['company_name'];?></h3>
      <p class="companyUpdate"><?php echo $act['activity_desc'];?></p>
    </a>
  <?php endforeach; ?>

    <?php if(! empty($activity)): ?>
        <div class="more"><a href="<?php echo site_url('/admin/activity');?>">Show More <span class="rotate-90">&#187;</span></a></div>
    <?php endif; ?>
    </div>
    </div>

    <div class="row" id="dashTab2">
      <div class="columns small-12 medium-11 medium-centered large-11 large-centered" id="recentContent">
        <a href="#" class="tabTitle">STATISTICS</a>
            <div class="tabDiv">
                <?php include 'application/views/admin/partials/statistics.php'; ?>
            </div>
  </section>
</main>
