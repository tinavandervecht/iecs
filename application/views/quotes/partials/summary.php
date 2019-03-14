<div class="columns small-12 large-12">
    <div class="columns large-6">
        <p>
            Minimum FOS <strong>>1.0</strong>
            <br />
            Optimum FOS <strong>>1.5</strong>
        </p>
    </div>
    <?php if (isset($summaryInfo) && !empty(str_replace(" ", "", $summaryInfo['estimate_comments']))): ?>
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

<div class="columns large-12 card">
        <p>
            <strong>Input Parameters:</strong>
        </p>
        <div class="columns large-6">
            <p>
                <strong>Max Expected Flow:</strong><br />
                <?php echo $summaryInfo['estimate_expectedFlow']; ?>
            </p>
            <p>
                <strong>Max Expected Velocity:</strong><br />
                <?php echo $summaryInfo['estimate_expectedVelocity']; ?>
            </p>
            <p>
                <strong>Bed Slope:</strong><br />
                <?php echo $summaryInfo['estimate_bedSlope']; ?>
            </p>
            <p>
                <strong>Side Slope:</strong><br />
                <?php echo $summaryInfo['estimate_sideSlope']; ?>
            </p>
        </div>
        <div class="columns large-6">
            <p>
                <strong>Bed Width:</strong><br />
                <?php echo $summaryInfo['estimate_bedWidth']; ?>
            </p>
            <p>
                <strong>Type of Flow:</strong><br />
                <?php echo $summaryInfo['estimate_flowType_string']; ?>
            </p>
            <p>
                <strong>Alignment:</strong><br />
                <?php echo $summaryInfo['estimate_alignment_string']; ?>
            </p>
            <p>
                <strong>Channel Length:</strong><br />
                <?php echo $summaryInfo['estimate_channelLength']; ?>
            </p>
        </div>
</div>

<div id="sendSuggestion" class="hidden columns large-12 card">
    <div class="alert alert-success">
        Cable Concrete suggests sending your results to IECS for further review and consideration.
        (To send your results to IECS, please select "Save" at the bottom of this page.)
    </div>
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
              <!--===========================-->
              <div class="other clearfix" id="bedWidth">
                  <div>
                      <p class="factor">Bed Width (m)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="bedWidthDN">
                  <div>
                      <p class="factor">Flow Depth</p>
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
              <div class="other clearfix" id="manningsN">
                  <div>
                      <p class="factor">Manning's N</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <div class="other clearfix" id="verticalOffset">
                  <div>
                      <p class="factor">Vertical Offset dz (mm)</p>
                      <div class="num">--</div>
                  </div>
              </div>
              <!--===========================-->
              <div class="other clearfix">
                  <p class="factor"><strong>Step 6 - Net Drag & Lift</strong></p>
              </div>
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
          </section>
      </div>
  </div>
  <!-- end block-->
<?php endforeach;?>
</div><!-- END CARDSBOX -->

<div class="columns large-12 card">
        <p>
            <strong>Design Information:</strong>
        </p>
        <div class="columns large-6">
            <p>
                <strong>Company:</strong><br />
                <?php echo $summaryInfo['company_name']; ?>
            </p>
            <p>
                <strong>Project Name:</strong><br />
                <?php echo $summaryInfo['estimate_name']; ?>
            </p>
            <p>
                <strong>Projected Start Date For Project:</strong><br />
                <?php echo substr($summaryInfo['estimate_date'],0,10); ?>
            </p>
            <p>
                <strong>Engineer Name:</strong><br />
                <?php echo $summaryInfo['estimate_engineer']; ?>
            </p>
        </div>
        <div class="columns large-6">
            <p>
                <strong>City & State/Province:</strong><br />
                <?php echo empty($summaryInfo['estimate_location']) ? 'N/A' : $summaryInfo['estimate_location']; ?>
            </p>
            <p>
                <strong>Address:</strong><br />
                <?php echo empty($summaryInfo['estimate_address']) ? 'N/A' : $summaryInfo['estimate_address']; ?>
            </p>
        </div>
</div>
<?php foreach($blocks as $key => $block):?>
    <div id="<?php echo $block['product_number']; ?>-blockInformation" class="custom-modal text-enter">
        <div class="modalHeader">
            <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
        </div>

        <img class="block-img" src="<?php echo $block['product_name'] == 'G2'
            ? base_url('img/' . $block['product_name'] . '-block.png')
            : base_url('img/' . $block['product_name'] . '-block.svg') ?>" alt="<?php echo $block['product_name']; ?>" />
    </div>
<?php endforeach;?>