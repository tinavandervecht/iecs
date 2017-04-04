<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('admin/estimates');?>" class="tabTitle">&#10092; ANALYSIS SUMMARY</a>
                  <div id="cardsbox" class="clearfix row">



                    <!-- the below will most likely me queried from the database, no? so we can pull down the individual # associated with each block -->
                    <?php $blocks = [["CCG2","25"], ["CC35","35"], ["CC45","45"], ["CC70","70"], ["CC90","90"]];?>
                  <div class="columns small-12 large-12 card">
                    <?php foreach($blocks as $block):?>
                      <div class="block" id=<?php echo $block[0];?>>
                          <!--start block-->
                          <a href="#" class="blockbox clearfix">
                              <div class="blocktype small-4 medium-2">
                                  <p><?php echo $block[0]; ?></p>
                                  <p class="smaller">(<?php echo $block[1]; ?> LB/SF)</p>
                              </div>
                              <!-- <img src="img/cc45-block.svg" alt="Block Size" class="blockdiagram"> -->
                              <div class="factor row">
                                  <div class="slimshady-wrapper small-8 medium-10">
                                      <div class="columns small-12 medium-6 overturning">
                                          <h3 class="small-6 medium-12 columns">Overturning <span class="hide-for-small show-for-medium">Safety Factors</span></h3>
                                          <p class="safety">Bed: <span class="num bed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                                          <p class="safety">Side: <span class="num side">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                                      </div>
                                      <div class="columns small-12 medium-6 sliding">
                                          <h3 class="small-6 medium-12 columns">Sliding <span class="hide-for-small show-for-medium">Safety Factors</span></h3>
                                          <p class="safety">Bed: <span class="num bed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                                          <p class="safety">Side: <span class="num side">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                                      </div>
                                      <img class="arrow" src="img/arrow_icon.svg" alt="arrow">
                                  </div>
                              </div>
                          </a>
                          <div class="more clearfix row">
                              <div class="column small-12">
                                  <h4>Analysis Details</h4>
                              </div>
                              <!--===========================-->
                              <section class="column small-12 large-6">
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Centroid Depth (mm)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor"> bB/2 (mm)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Half Diagonal Distance (mm)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Verical Position of Drag (mm)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">dZ Vertical Offset (mm)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Block Weight (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Block Mass (kg)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Submerged Block Weight (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Submerged Mass (kg)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Drag on Block [Bed] (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Drag on Block [Side] (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->

                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Lift on Block [Bed] (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                              </section>
                              <section class="columns small-12 large-6">
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Lift on Block [Side] (N)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Cotangent of Side Slope</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Angle of Side Slope (Degrees)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Angle of Side Slope (Theta)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Bed Slope (ft/ft)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Angle of Side Slope (Degrees)</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Lambda Degrees</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Beta Degrees</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Delta Degrees</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Froude Number</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                                  <!--===========================-->
                                  <div class="other clearfix">
                                      <div>
                                          <p class="factor">Manning's N</p>
                                          <div class="num">1.02</div>
                                      </div>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <!-- end block-->
                  <?php endforeach;?>
              </div><!-- END CARDSBOX -->
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
