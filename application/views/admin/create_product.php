<main>
    <h2 class="hidden">Create Product</h2>
    <section class="row expanded" id="cmsDashboard">
        <div class="row" id="dashTab1">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered" id="createProductForm">
                <a href="#" class="tabTitle">Create New Product</a>

                <div class="tabDiv" id="graph">
                    <div id="calculator" class="clearfix">
                        <?php $attributes = array('novalidate' => 'novalidate');
                        echo form_open('/admin/create_product', $attributes);?>
                            <div class="columns small-12 medium-6 medium-pull-6 large-pull-0">
                                <label for="product_name">
                                    <h5 class="unit">Product Name</h5>
                                </label>
                                <input id="product_name" name="product_name"
                                    value="<?php if (isset($_POST['product_name'])) :
                                        echo $_POST['product_name'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_name', '<p class="error">', '</p>');?>

                                <label for="product_b">
                                    <h5 class="unit">Product b</h5>
                                </label>
                                <input id="product_b" name="product_b"
                                    value="<?php if (isset($_POST['product_b'])) :
                                        echo $_POST['product_b'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_b', '<p class="error">', '</p>');?>

                                <label for="product_hB">
                                    <h5 class="unit">Product hB</h5>
                                </label>
                                <input id="product_hB" name="product_hB"
                                    value="<?php if (isset($_POST['product_hB'])) :
                                        echo $_POST['product_hB'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_hB', '<p class="error">', '</p>');?>

                                <label for="product_Ws">
                                    <h5 class="unit">Product Ws</h5>
                                </label>
                                <input id="product_Ws" name="product_Ws"
                                    value="<?php if (isset($_POST['product_Ws'])) :
                                        echo $_POST['product_Ws'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_Ws', '<p class="error">', '</p>');?>
                            </div>

                            <div class="columns small-12 medium-6 medium-pull-6 large-pull-0">
                                <label for="product_number">
                                    <h5 class="unit">Product Number</h5>
                                </label>
                                <input id="product_number" name="product_number"
                                    value="<?php if (isset($_POST['product_number'])) :
                                        echo $_POST['product_number'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_number', '<p class="error">', '</p>');?>

                                <label for="product_bT">
                                    <h5 class="unit">Product bT</h5>
                                </label>
                                <input id="product_bT" name="product_bT"
                                    value="<?php if (isset($_POST['product_bT'])) :
                                        echo $_POST['product_bT'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_bT', '<p class="error">', '</p>');?>

                                <label for="product_W">
                                    <h5 class="unit">Product W</h5>
                                </label>
                                <input id="product_W" name="product_W"
                                    value="<?php if (isset($_POST['product_W'])) :
                                        echo $_POST['product_W'];
                                    endif; ?>"
                                />
                                <?php echo form_error('product_W', '<p class="error">', '</p>');?>
                            </div>

                            <div class="columns small-12">
                                <button type="submit" class="greenButton">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
