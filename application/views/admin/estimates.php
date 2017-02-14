<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimates">
          <?php //echo $estimates[0]['estimate_modifiedDate'];?>
           <?php //echo strtotime($estimates[0]['estimate_modifiedDate']);?>
            <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
                  <a href="<?php echo site_url('/admin');?>" class="tabTitle">&#10092; ESTIMATES</a>
                  <div id="cardsbox">

                  <?php echo form_open('/admin/estimates');?>
                  <select id="sort" name="sort">
                        <option value="1">Most Recent</option>
                        <option value="2">Oldest First</option>
                        <option value="3">Alphabetical (A-Z)</option>
                        <option value="4">Alphabetical (Z-A)</option>
                  </select>
                  <input type="search" placeholder="Search" name="search" id="search">
                  <input type="submit" name="submit" value="submit">
                </form>
                  <div class="centerIt">
                <?php if(count($estimates)>=4): ?>
                <?php for ($i=0; $i < 4; $i++): ?>

                  <div class="estiimat clearfix">
                    <div class="title">
                      <h3><?php echo $estimates[$i]['company_name'];?></h3>
                      <h4><?php echo $estimates[$i]['estimate_name'];?></h4>
                    </div>
                    <p><span class="edit">Date Edited: <?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></span></p>
                    <p><span class="block">Recommended Block: CC35</span></p>
                    <p><span class="factor">Safety Factor: 2.3</span></p>
                    <p><a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton greyButton">Review</a></p>
                  </div>

                  <?php endfor; ?>
                <?php else: ?>
                  <?php for ($i=0; $i < count($estimates); $i++): ?>

                    <div class="estiimat clearfix">
                      <div class="title">
                        <h3><?php echo $estimates[$i]['company_name'];?></h3>
                        <h4><?php echo $estimates[$i]['estimate_name'];?></h4>
                      </div>
                      <p><span class="edit">Date Edited: <?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></span></p>
                      <p><span class="block">Recommended Block: CC35</span></p>
                      <p><span class="factor">Safety Factor: 2.3</span></p>
                      <p><a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton greyButton">Review</a></p>
                    </div>

                    <?php endfor; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>

        </section>

        <section id="comp" class="row expanded">
          <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
          <table class="fluidTable">
            <thead>
              <tr>
                <th class="text-center">NEW</th>
                <th>COMPANY</th>
                <th>PROJECT</th>
                <th>DATE EDITED</th>
                <th>REC. BLOCK SIZE</th>
                <th>SAFETY FACTOR</th>
                <th>REVIEW</th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($estimates)>=12): ?>
              <?php for ($i=4; $i < 12; $i++): ?>
              <tr class="new">
                <td><?php if(($_SESSION['admin_lastLogin']-18000)>(strtotime($estimates[0]['estimate_modifiedDate']))){echo "<span class='dot'></span>";}?></td>
                <td><?php echo $estimates[$i]['company_name'];?></td>
                <td><?php echo $estimates[$i]['estimate_name'];?></td>
                <td><?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></td>
                <td>BLOCK SIZE</td>
                <td>Factoids</td>
                <td>
                  <a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton">REVIEW</a>
                </td>
              </tr>
            <?php endfor; ?>
          <?php elseif((count($estimates)<12)&&(count($estimates)>4)): ?>
              <?php for ($i=4; $i < count($estimates); $i++): ?>
              <tr class="new">
                <td><?php if(($_SESSION['admin_lastLogin']-18000)>(strtotime($estimates[0]['estimate_modifiedDate']))){echo "<span class='dot'></span>";}?></td>
                <td><?php echo $estimates[$i]['company_name'];?></td>
                <td><?php echo $estimates[$i]['estimate_name'];?></td>
                <td><?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></td>
                <td>BLOCK SIZE</td>
                <td>Factoids</td>
                <td>
                  <a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton">REVIEW</a>
                </td>
              </tr>
            <?php endfor; ?>
          <?php endif; ?>
            </tbody>
          </table>
        </div>
      </section>

</main>
