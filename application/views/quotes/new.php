<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
        <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator', 'novalidate' => 'novalidate');
        echo form_open('quotes/newQuote', $attributes);?>

            <section class="pagnation-page current" id="1">
                <?php include 'application/views/quotes/partials/project_information.php'; ?>
                <?php include 'application/views/quotes/partials/flow_velocity.php'; ?>
            </section>

            <section class="pagnation-page" id="2">
                <?php include 'application/views/quotes/partials/slope.php'; ?>
                <?php include 'application/views/quotes/partials/flow_blocks.php'; ?>
            </section>

            <section class="pagnation-page" id="3">
                <?php include 'application/views/quotes/partials/channel.php'; ?>
                <?php include 'application/views/quotes/partials/environment.php'; ?>
            </section>

            <section class="pagnation-page" id="4">
                <?php include 'application/views/quotes/partials/review.php'; ?>
            </section>

            <section class="pagnation-page" id="5">
                <?php include 'application/views/quotes/partials/calculated.php'; ?>
            </section>

            <?php include 'application/views/quotes/partials/continue_btn.php'; ?>

        </form>
    </section>
</main>
