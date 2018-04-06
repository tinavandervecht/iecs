<main id="newQuotePage">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="newQuote">
      <?php $attributes = array('class' => 'row expanded small-collapse', 'id' => 'calculator', 'novalidate' => 'novalidate');
      echo form_open('quotes/editQuote/'.$estimate['estimate_id'], $attributes);?>

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

          <!--==================================================================-->
          <section class="pagnation-page" id="5">
            <h3 class="hidden">Calculated</h3>
          </section>
          <!--==================================================================-->
          <div class="row">
          <div class="columns small-12 expanded">
            <a href="#" class="continueButton greenButton">CONTINUE</a>
            <div id="calc" class="hidden">
              <!--set up as a form submit to allow for use of post method. not sure if this was necessary.-->
              <input id="calculateit" name="submit" type="submit" class="greenButton" value="Calculate">
            </div>
          </div>
        </div>


      </form>
    </section>
  </main>
