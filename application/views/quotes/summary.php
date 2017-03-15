<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('/dashboard');?>" class="tabTitle">&#10092; ESTIMATE SUMMARY</a>
                  <div id="cardsbox" class="clearfix row">



                    <!-- the below will most likely me queried from the database, no? so we can pull down the individual # associated with each block -->
                    <?php $blocks = ["CCG2", "CC35", "CC45", "CC70", "CC90"];?>
                    <div class="columns small-12 large-12 card">
                    <?php foreach($blocks as $block):?>
                      <div class="block"><!--start block-->
                            <a href="#" class="blockbox clearfix">
                              <div class="blocktype">
                                <p><?php echo $block ?></p>
                                <p class="smaller">(<?php echo $block ?>LB/SF)</p>
                              </div>
                              <!-- <img src="img/cc45-block.svg" alt="Block Size" class="blockdiagram"> -->
                              <div class="factor">
                                <div id="overture">
                                  <p class="safety">Overturning Bed: <span class="num">0.2</span></p>
                                  <p class="safety">Overturning Side: <span class="num">0.2</span></p>
                                </div>
                                <div id="sliding">
                                  <p class="safety">Sliding for Bed: <span class="num">0.3</span></p>
                                  <p class="safety">Sliding for Bed: <span class="num">0.6</span></p>
                                </div>
                                <img class="arrow" src="img/arrow_icon.svg" alt="arrow">
                              </div>
                            </a>
                            <div class="more clearfix row">
                              <div class="column small-12">
                                <h4>Estimate Details</h4>
                              </div>
                              <!--===========================-->
                              <section class="column small-12 medium-6">
                              <div class="other clearfix"><div>
                                <p class="factor">Centroid Depth (mm)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor"> bB/2 (mm)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Half Diagonal Distance (mm)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Verical Position of Drag (mm)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">dZ Vertical Offset (mm)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Block Weight (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Block Mass (kg)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Submerged Block Weight (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Submerged Mass (kg)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Drag on Block [Bed] (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Drag on Block [Side] (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Lift on Block [Bed] (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                            </section>
                            <section class="columns small-12 medium-6">
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Lift on Block [Side] (N)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Cotangent of Side Slope</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Angle of Side Slope (Degrees)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Angle of Side Slope (Theta)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Bed Slope (ft/ft)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Angle of Side Slope (Degrees)</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Lambda Degrees</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Beta Degrees</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Delta Degrees</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Froude Number</p><div class="num">1.02</div>
                              </div></div>
                              <!--===========================-->
                              <div class="other clearfix"><div>
                                <p class="factor">Manning's N</p><div class="num">1.02</div>
                              </div></div>
                            </section>
                            </div>
                        </div><!-- end block-->
                  <?php endforeach;?>
              </div><!-- END CARDSBOX -->
                <a href="#" class="greenButton email" id="saveit">EMAIL</a>
            </div>
        </section>

</main>
