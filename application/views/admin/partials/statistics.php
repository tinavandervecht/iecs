<div class="graph-list clearfix">
    <div class="clearfix">
        <div class="user-graph-wrapper">
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
        </div>

        <script>
            var yearUserGraphData = <?php echo json_encode($year_user_activity);?>;
        </script>
        <div class="year-user-graph-wrapper">
            <p>
                Number of Users per Month
            </p>
            <svg id="year-user-graph-svg" width="550" height="150"></svg>
        </div>
    </div>

    <?php if(isset($design_activity)): ?>
        <div class="clearfix design-breakdown">
            <p>
                Design Breakdown
            </p>
            <div class="item">
                <p class="text-center">
                    <span class="num"><?php echo $design_activity['total_designs']; ?></span>
                    <br />
                    Total Designs
                </p>
            </div>
        </div>
        <div class="clearfix design-breakdown by_area">
            <?php foreach($design_activity['area_designs'] as $designs): ?>
                <div class="item">
                    <p class="text-center">
                        <span class="num smaller"><?php echo sizeof($designs); ?></span>
                        <br />
                        # of <?php echo empty($designs[0]['estimate_location']) ? 'N/A' : $designs[0]['estimate_location']; ?> Designs
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>