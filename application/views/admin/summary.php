<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('admin/estimates');?>" class="tabTitle">&#10092; DESIGN SUMMARY</a>
                  <div id="cardsbox" class="clearfix row">



                    <!-- the below will most likely me queried from the database, no? so we can pull down the individual # associated with each block -->
                    <?php include 'application/views/quotes/partials/summary.php'; ?>
                  
                <a href="#" class="greenButton email" id="saveit">EMAIL</a>
                <div id="myModal" class="modal">
                <div class="modal-content clearfix">
                  <span class="close">&times;</span>
                  <h2 style="font-family: opensans-bold;">EMAIL CLIENT: <?php echo "DUMMY CLIENT" ;?></h2>
                  <label>Subject:</label><br>
                  <input id="subject" name="subject">
                  <br><br>
                  <label>Message:</label><br>
                  <textarea id="textarea" name="message"></textarea>

                  <a href="#" class="greenButton email" id="sendit">SEND</a>

                </div>
              </div>
            </div>
        </section>
</main>
<script>
  var id = <?php echo $id; ?>;
  var base_url = "<?php echo site_url();?>";
</script>
