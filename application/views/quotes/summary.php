<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimateSummary">
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('/dashboard');?>" class="tabTitle">&#10092; ANALYSIS SUMMARY</a>
                  <a href="#" class="tabTitle">STANDARDS</a>
                  <div id="cardsbox" class="clearfix row">
                    <!-- <p>CC-TM = Cable Concrete Technical Memorandum<br>HEC = U.S, DOT HEC-23 Circular</p> -->
                    <div class="clumns small-12 medium-12 medium-centered large-11 large-centered"><p>Design of Cable Concrete Mats for Open Channels<br>Developed by Drs Alex McCorquodale and David Machina
    <br>This program has been prepared as an aid to determining the Factor of Safety for
    Cable Concrete mat in simple open channels.<br> Several typical design cases are presented. The user is asked to select the appropriate case.
    If the case is not represented then the user should contact IECS for technical information. THIS PROGRAM IS INTENDED AS A GUIDE TO THE DESIGN OF CABLE CONCRETE MATS. ALL FINAL DESIGNS SHOULD BE VERIFIED BY A LICENCED CIVIL ENGINEER.
    Version 2017.01<br>
    Copyright 2013-2017 by International Erosion Control Systems.<br>
    IECS Call 519-785-1420  or 800-821-7462<br>
<br>
     THIS PROGRAM CALCULATES THE SEPARATE SAFETY FACTORS FOR FAILURE BY OVERTURNING AND SLIDING OF CONCRETE BLOCK REVETMENT SYSTEMS. THIS PROGRAM USES THE OVERTURNING EQUATION IN: <br>"Articulating Concrete Block Revetment Design - Factor of Safety Method"-- National Concrete Masonry Association TEK 11-12 and "Bridge Scour and Stream Instability Countermeasures" -- U.S. Department of Transportation, Hydraulic Engineering Circular No. 23 (HEC-23).

<br>
IN ADDITION, THE PROGRAM COMPUTES THE FACTOR AGAINST FAILURE DUE TO SLIDING BASED ON THE THEORY OF DAMS IN: "Design of Small Dams", by U.S.Bureau of Reclamation
<br>The equations in this program are calibrated using laboratory studies conducted at:<br>
         University of Minnesota<br>
         Colorado State University<br>
         University of Windsor<br>
to derive the forces and moments in the Factors of Safety. See CC-TM.</p></div>

                    <!-- the below will most likely be queried from the database, no? so we can pull down the individual # associated with each block -->
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
                                      <div class="column small-12 medium-6 sliding">
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
                <a href="#" class="greenButton save" id="saveit">SAVE</a>
                <div class="popup clearfix" id="subforreview">
                    <div class="box clearfix">
                        <h4>Your results have been saved!</h4>
                        <p>Would you like to send your results to IECS for review?</p>
                        <a href="#" id="yes" class="greyButton">YES</a>
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
