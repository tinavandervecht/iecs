<h2><?php echo $title; ?></h2>

<?php foreach ($tbl_company as $company): ?>

        <h3><?php echo $company['company_name']; ?></h3>
        <div class="main">
                <?php echo $company['company_email']; ?>
                <?php echo $company['company_contactName']; ?>
        </div>
<?php endforeach; ?>
