<div class="columns small-12 large-12">
    <div class="columns large-6">
        <p>
            Minimum FOS <strong>>1.0</strong>
            <br />
            Optimum FOS <strong>>1.5</strong>
        </p>
    </div>
    <?php if (!empty(str_replace(" ", "", $summaryInfo['estimate_comments']))): ?>
        <div class="columns large-6 card">
                <p>
                    <strong>Comments/Special Considerations:</strong>
                </p>
                <p>
                    <?php echo $summaryInfo['estimate_comments']; ?>
                </p>
        </div>
    <?php endif; ?>
</div>
<div class="columns small-12 large-12 card">
<?php foreach($blocks as $key => $block):?>
  <div class="block" id=<?php echo $key . '-' . $block['product_name']; ?>>
    <!--start block-->
      <a href="#" class="blockbox clearfix">
          <div class="blocktype small-4 medium-2">
              <p>
                  <?php echo $block['product_name']; ?>
                  <span class="tip arrow-wrapper">
                      <img class="arrow" src="<?php echo base_url('img/arrow_icon.svg'); ?>" alt="arrow">
                      <span class="tooltip">Click to expand design details</span>
                  </span>
              </p>
              <p class="smaller">(<?php echo $block['product_number']; ?> LB/SF)</p>
              <span class="modalButton"
              data-reveal-id="<?php echo $block['product_number']; ?>-blockInformation">Block Details</span>
          </div>
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
              </div>
          </div>
      </a>
      <div class="more clearfix row">
          <div class="column small-12">
              <h4>Design Details</h4>
          </div>
          <!--===========================-->
          <section class="column small-12 large-6">
              <!-- Block Variables -->
              <div class="other clearfix">
                  <div>
                      <p class="factor">Block b</p>
                      <div class="num"><?php echo $block['product_b']; ?></div>
                  </div>
              </div>
              <div class="other clearfix">
                  <div>
                      <p class="factor">Block bT</p>
                      <div class="num"><?php echo $block['product_bT']; ?></div>
                  </div>
              </div>
              <div class="other clearfix">
                  <div>
                      <p class="factor">Block hB</p>
                      <div class="num"><?php echo $block['product_hB']; ?></div>
                  </div>
              </div>
              <div class="other clearfix">
                  <div>
                      <p class="factor">Block Weight (N)</p>
                      <div class="num"><?php echo $block['product_W']; ?></div>
                  </div>
              </div>
              <div class="other clearfix">
                  <div>
                      <p class="factor">Submerged Block Weight (N)</p>
                      <div class="num"><?php echo $block['product_Ws']; ?></div>
                  </div>
              </div>
              <div class="other clearfix" id="blockNormalForceBed">
                  <div>
                      <p class="factor">Block Normal Bed Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="blockNormalForceSide">
                  <div>
                      <p class="factor">Block Normal Side Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="netBedDrag">
                  <div>
                      <p class="factor">Drag on Block [Bed] (N)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="netSideDrag">
                  <div>
                      <p class="factor">Drag on Block [Side] (N)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="netBedLift">
                  <div>
                      <p class="factor">Lift on Block [Bed] (N)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="netSideLift">
                  <div>
                      <p class="factor">Lift on Block [Side] (N)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="bedWidth">
                  <div>
                      <p class="factor">Bed Width (m)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="bedSlope">
                  <div>
                      <p class="factor">Bed Slope (Degree)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="sideSlope">
                  <div>
                      <p class="factor">Side Slope (Degree)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
          </section>
          <section class="columns small-12 large-6">
              <!--===========================-->
              <div class="other clearfix" id="shearStressBed">
                  <div>
                      <p class="factor">Shear Bed Stress</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="shearStressBedC">
                  <div>
                      <p class="factor">Shear Bed Stress Where Cb</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="shearStressSide">
                  <div>
                      <p class="factor">Shear Side Stress</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="shearDragBedForce">
                  <div>
                      <p class="factor">Shear Drag Bed Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="shearDragSideForce">
                  <div>
                      <p class="factor">Shear Drag Side Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="netBedNormalForces">
                  <div>
                      <p class="factor">Net Normal Bed Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="netSideNormalForces">
                  <div>
                      <p class="factor">Net Normal Side Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="liftForceBed">
                  <div>
                      <p class="factor">Lift Bed Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="liftForceSide">
                  <div>
                      <p class="factor">Lift Side Force</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="offsetN">
                  <div>
                      <p class="factor">Offset (n)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="offsetWhere">
                  <div>
                      <p class="factor">Offset (where,)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="offsetWhere2">
                  <div>
                      <p class="factor">Offset (where, #2)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="offsetNormalVelocity">
                  <div>
                      <p class="factor">Offset Normal Velocity</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix" id="manningsN">
                  <div>
                      <p class="factor">Manning's N</p>
                      <div class="num">--</div>
                  </div>
              </div>

              <div class="other clearfix" id="manningsCos">
                  <div>
                      <p class="factor">Manning's Cos</p>
                      <div class="num">--</div>
                  </div>
              </div>
          </section>
      </div>
  </div>
  <!-- end block-->
<?php endforeach;?>
</div><!-- END CARDSBOX -->

<?php foreach($blocks as $key => $block):?>
    <div id="<?php echo $block['product_number']; ?>-blockInformation" class="custom-modal text-enter">
        <img src="<?php echo base_url('img/' . $block['product_name'] . '-block.svg') ?>" alt="<?php echo $block['product_name']; ?>" />
    </div>
<?php endforeach;?>
<div id="overlay"></div>