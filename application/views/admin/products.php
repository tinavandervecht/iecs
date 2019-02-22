<main>
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="cmsDashboard">
        <div class="row" id="dashTab1">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered" id="recentContent">
                <a href="<?php echo site_url('/admin/blocks');?>" class="tabTitle">PRODUCTS</a>
                <?php foreach ($blocks as $block): ?>
                    <a href="#"
                        class="companyEntry productEntry clearfix  <?php if($block['products_id'] == $blocks[0]['products_id']){echo "first";}?>"
                        disabled="disabled"
                        data-block-id="<?php echo $block['products_id']; ?>"
                        data-block-name="<?php echo $block['product_name']; ?>"
                        data-reveal-id="delete_product_modal"
                    >
                        <div class="dateOfUpdate">
                            <p class="dateup deleteOption">Click to Delete</p>
                        </div>
                        <h3 class="companyName">
                            <?php echo $block['product_name']; ?>
                            (Product Number: <?php echo $block['product_number']; ?>)
                        </h3>
                        <p class="companyUpdate">
                            b: <?php echo $block['product_b']; ?> |
                            bT: <?php echo $block['product_bT']; ?> |
                            hB: <?php echo $block['product_hB']; ?> |
                            W: <?php echo $block['product_W']; ?> |
                            Ws: <?php echo $block['product_Ws']; ?> |
                            Manning's N: <?php echo $block['product_manningsN']; ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <a href="<?php echo site_url('/admin/create_product');?>" class="greenButton">Add Product</a>
    <div id="delete_product_modal" class="custom-modal">
        <h2 id="modalTitle">Are you sure?</h2>
        <p class="lead">You're about to delete <span class="block_name"></span> permanently! Please double check.</p>
        <div class="buttons clearfix">
            <a class="leftButton redButton delete_button" href="#">Yes, delete</a>
            <a class="rightButton greyButton" aria-label="Close">Cancel</a>
        </div>
    </div>
    <div id="overlay"></div>
</main>
