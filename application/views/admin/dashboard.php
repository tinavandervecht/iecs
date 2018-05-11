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
                <div class="graph-list clearfix">
                    <div id="user-graph-svg"
                        data-prev-month-name="<?php echo $user_activity['prev_month_name']; ?>"
                        data-prev-month-count="<?php echo $user_activity['prev_month_count'] ;?>"
                        data-current-month-name="<?php echo $user_activity['current_month_name']; ?>"
                        data-current-month-count="<?php echo $user_activity['current_month_count'] ;?>"
                    >
                    </div>
                    <p id="user-graph-data">
                        <span class="count">+ <?php echo $user_activity['current_month_count']; ?></span>
                        <br />
                        LAST MONTH
                    </p>

                    <script>
                        var yearUserGraphData = <?php echo json_encode($year_user_activity);?>;
                    </script>
                    Number of Users per Month
                    <svg id="year-user-graph-svg" width="550" height="150"></svg>
                    <!-- <div id="year-user-graph-svg"
                        data-data="<?php echo json_encode($year_user_activity); ?>"
                    >
                    </div> -->
                </div>
              <img id="graph" src="<?php echo base_url('img/fake_graph.png');?>">
            </div>
  </section>
</main>
