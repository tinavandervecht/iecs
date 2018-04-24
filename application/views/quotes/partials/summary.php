<div class="columns small-12 large-12 card">
<?php foreach($blocks as $key => $block):?>
  <div class="block" id=<?php echo $key . '-' . $block['product_name']; ?>>
    <!--start block-->
      <a href="#" class="blockbox clearfix">
          <div class="blocktype small-4 medium-2">
              <p><?php echo $block['product_name']; ?></p>
              <p class="smaller">(<?php echo $block['product_number']; ?> LB/SF)</p>
          </div>
          <!-- <img src="img/cc45-block.svg" alt="Block Size" class="blockdiagram"> -->
          <div class="factor row">
              <div class="slimshady-wrapper small-8 medium-10">
                  <div class="columns small-12 medium-6 overturning">
                      <h3 class="small-6 medium-12 columns">Overturning <span class="hide-for-small show-for-medium">Safety Factors</span></h3>
                      <p class="safety">Bed: <span class="num bed"></span></p>
                      <p class="safety">Side: <span class="num side"></span></p>
                  </div>
                  <div class="column small-12 medium-6 sliding">
                      <h3 class="small-6 medium-12 columns">Sliding <span class="hide-for-small show-for-medium">Safety Factors</span></h3>
                      <p class="safety">Bed: <span class="num bed"></span></p>
                      <p class="safety">Side: <span class="num side"></span></p>
                  </div>
                  <img class="arrow" src="img/arrow_icon.svg" alt="arrow">
              </div>
          </div>
      </a>
      <div class="more clearfix row">
          <div class="column small-12">
              <h4>Design Details</h4>
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