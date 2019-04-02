<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <div id="overlay"></div>
        <div id="downloadFileOverlay"></div>
        <div id="downloadFileModal" class="modal no-margin">
            <div class="modal-content clearfix">
              <span class="close" id="closeDownloadFileModal">&times;</span>
              <form id="pdf-data" class="tablTitleForm" method="POST" action="<?php echo '/quotes/pdf/'.$id; ?>" target="_blank">
                  <h2>DOWNLOAD SPECIFIC BLOCK SIZE?</h2>
                  <select name="specific_block">
                      <option value="all">All blocks</option>
                      <?php foreach($blocks as $key => $block):?>
                          <option value="<?php echo $block['products_id']; ?>"><?php echo $block['product_name']; ?></option>
                      <?php endforeach;?>
                  </select>
                  <button type="submit" class="greenButton email" id="sendit">DOWNLOAD FILE</a>
              </form>
            </div>
        </div>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('/quotes/editQuote/' . $id);?>" class="tabTitle">PARAMETER INPUTS</a>
                  <a href="#" class="tabTitle active">OUTPUT RESULTS</a>

                  <a href="#" id="downloadFileBtn" class="tabTitle">DOWNLOAD FILE</a>

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
                        <div id="sendSuggestionModal" class="hidden">
                            <p>Cable Concrete suggests sending your results to IECS for further review and consideration.</p>
                        </div>
                        <div id="optionalSendSuggestionModal">
                            <p style="padding-bottom: 0rem; margin-bottom: 0rem;">OPTIONAL:</p>
                            <p>Would you like to send your results to IECS for review?</p>
                        </div>
                        <div id="initialSelection">
                            <button class="greyButton" id="yes">Yes</button>
                            <button href="#" id="no" class="greyButton">No</button>
                        </div>
                        <div id="regionSelection" class="hidden">
                            <form method="POST" action="<?php echo '/quotes/sendQuote/'.$id; ?>">
                                <div id="region"  class="input clearfix">
                                    <label for="region">Region</label>
                                    <select id="region" name="region">
                                        <option value="garvai@iecs.com">
                                            GTA/Eastern Ontario
                                        </option>
                                        <option value="dtalan@iecs.com">
                                            South Western Ontario
                                        </option>
                                        <option value="mmcarthur@iecs.com">
                                            Western Canada
                                        </option>
                                        <option value="larvai@iecs.com">
                                            International
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="greenButton">Send Results</button>
                                <button type="button" id="cancel" class="text-center">Nevermind</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


</main>
<script>
  var id = <?php echo $id; ?>;
  var base_url = "<?php echo site_url();?>"
</script>
