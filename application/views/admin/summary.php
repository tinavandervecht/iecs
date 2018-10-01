<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="#" class="tabTitle active">OUTPUT RESULTS</a>

                  <form id="pdf-data" class="tablTitleForm" method="POST" action="<?php echo '/quotes/pdf/'.$id; ?>" target="_blank">
                      <button type="submit" class="tabTitle">DOWNLOAD FILE</button>
                  </form>

                  <div id="cardsbox" class="clearfix row">



                    <!-- the below will most likely me queried from the database, no? so we can pull down the individual # associated with each block -->
                    <?php include 'application/views/quotes/partials/summary.php'; ?>

                <a href="#" class="greenButton email" id="saveit">EMAIL</a>
                <div id="myModal" class="modal"
                    style="<?php echo form_error('email_text', '<p class="error">', '</p>') != ''
                        || form_error('email_sub', '<p class="error">', '</p>') != ''
                        ? 'display:block;opacity:1'
                        : ''; ?>"
                >
                <div class="modal-content clearfix">
                  <span class="close">&times;</span>
                  <?php $attributes = array('novalidate' => 'novalidate');
                      echo form_open('/admin/summary/' . $summary['estimate_id'], $attributes);
                  ?>
                      <h2>EMAIL CLIENT: <?php echo $summary['company_name'] ;?></h2>
                      <label>Subject:</label><br>
                      <input id="subject" name="email_sub" value="<?php echo isset($_POST['email_sub']) && $_POST['email_sub'] ? $_POST['email_sub'] : ''; ?>">
                      <?php echo form_error('email_sub', '<p class="error">', '</p>');?>
                      <br><br>
                      <label>Message:</label><br>
                      <textarea id="textarea" name="email_text"><?php echo isset($_POST['email_text']) && $_POST['email_text'] ? $_POST['email_text'] : ''; ?></textarea>
                      <?php echo form_error('email_text', '<p class="error">', '</p>');?>

                      <button type="submit" class="greenButton email" id="sendit">SEND</a>
                  </form>

                </div>
              </div>
            </div>
        </section>
</main>


<script>
  var id = <?php echo $id; ?>;
  var base_url = "<?php echo site_url();?>";
</script>
