<div class="graph-list clearfix">
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