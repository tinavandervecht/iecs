<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('/dashboard');?>" class="tabTitle">&#10092; DESIGN SUMMARY</a>
                  <a href="#" class="tabTitle active">STANDARDS</a>

                  <form id="pdf-data" class="tablTitleForm" method="POST" action="<?php echo '/quotes/pdf/'.$id; ?>" target="_blank">
                      <button type="submit" class="tabTitle">PDF</button>
                  </form>

                  <div id="cardsbox" class="clearfix row">
                    <p id="sumInfo">CC-TM = Cable Concrete Technical Memorandum<span style="margin-lefT: 30px;">HEC = U.S, DOT HEC-23 Circular</span></p>
                    <?php
                        $arrContextOptions=array(
                            "ssl"=>array(
                                "verify_peer"=>false,
                                "verify_peer_name"=>false,
                            ),
                        );

                        $response = file_get_contents(base_url('img/legend.svg'), false, stream_context_create($arrContextOptions));

                        echo $response;
                    ?>

                    <?php include 'application/views/quotes/partials/summary.php'; ?>
                <a href="#" class="greenButton save" id="saveit">SAVE</a>
                <div class="popup clearfix" id="subforreview">
                    <div class="box clearfix">
                        <h4>Your results have been saved!</h4>
                        <p style="padding-bottom: 0rem; margin-bottom: 0rem;">OPTIONAL:</p>
                        <p>Would you like to send your results to IECS for review?</p>
                        <a href="<?php echo site_url('/quotes/sendQuote/'.$id);?>" id="yes" class="greyButton">YES</a>
                        <a href="#" id="no" class="greyButton">NO</a>
                    </div>
                </div>
            </div>
        </section>


</main>
<script>
  var id = <?php echo $id; ?>;
  var base_url = "<?php echo site_url();?>"
</script>
