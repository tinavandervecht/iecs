<h2><?php echo $title; ?></h2>

<?php foreach ($tbl_company as $company): ?>

        <h3><?php echo $company['estimate_date']; ?></h3>
        <div class="main">
                <?php echo $company['estimate_location']; ?>
                <?php echo $company['estimate_status']; ?>
        </div>
<?php endforeach; ?>
