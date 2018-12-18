<main class="clearfix">
        <h2 class="hidden">Main Content</h2>

        <section class="row expanded" id="cmsEstimates">
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
                </form>
                  <div class="centerIt" id="centerIt">
                <?php if(count($estimates) == 0): ?>
                    <p>
                        No estimates to show.
                    </p>
                <?php else: ?>
                <?php if(count($estimates)>=4): ?>
                <?php for ($i=0; $i < 4; $i++): ?>

                  <div class="estiimat clearfix">
                    <div class="title">
                      <h3><?php echo $estimates[$i]['company_name'];?></h3>
                      <h4><?php echo $estimates[$i]['estimate_name'];?></h4>
                    </div>
                    <p><span class="edit">Date Created: <?php echo substr($estimates[$i]['estimate_createdDate'], 0, 10);?></span></p>
                    <p><span class="edit">Last Edited: <?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></span></p>
                    <p><a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton">Review</a></p>
                  </div>

                  <?php endfor; ?>
                <?php else: ?>
                  <?php for ($i=0; $i < count($estimates); $i++): ?>

                    <div class="estiimat clearfix">
                      <div class="title">
                        <h3><?php echo $estimates[$i]['company_name'];?></h3>
                        <h4><?php echo $estimates[$i]['estimate_name'];?></h4>
                      </div>
                      <p><span class="edit">Date Created: <?php echo substr($estimates[$i]['estimate_createdDate'], 0, 10);?></span></p>
                      <p><span class="edit">Last Edited: <?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></span></p>
                      <p><a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton greyButton">Review</a></p>
                    </div>

                    <?php endfor; ?>
                  <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>

        </section>

        <?php if (count($estimates) > 4): ?>
        <section id="comp" class="row expanded">
          <div class="columns small-12 medium-11 medium-centered large-11 large-centered">
          <table class="fluidTable">
            <thead>
              <tr>
                <th class="text-center">NEW</th>
                <th>COMPANY</th>
                <th>PROJECT</th>
                <th>DATE CREATED</th>
                <th>LAST EDITED</th>
                <th>REVIEW</th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($estimates)>=12): ?>
              <?php for ($i=4; $i < 12; $i++): ?>
              <tr class="new">
                <td><?php echo !isset($_SESSION['estimate_' . $estimates[$i]['estimate_id'] . '_seen']) ? "<span class='dot'></span>" : ''; ?></td>
                <td><?php echo $estimates[$i]['company_name'];?></td>
                <td><?php echo $estimates[$i]['estimate_name'];?></td>
                <td><?php echo substr($estimates[$i]['estimate_createdDate'], 0, 10);?></td>
                <td><?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></td>
                <td>
                  <a href="<?php echo site_url('admin/summary/'.$estimates[$i]['estimate_id']);?>" class="greyButton">REVIEW</a>
                </td>
              </tr>
            <?php endfor; ?>
          <?php elseif((count($estimates)<12)&&(count($estimates)>4)): ?>
              <?php for ($i=4; $i < count($estimates); $i++): ?>
              <tr class="new">
                <td><?php echo !isset($_SESSION['estimate_' . $estimates[$i]['estimate_id'] . '_seen']) ? "<span class='dot'></span>" : ''; ?></td>
                <td><?php echo $estimates[$i]['company_name'];?></td>
                <td><?php echo $estimates[$i]['estimate_name'];?></td>
                <td><?php echo substr($estimates[$i]['estimate_createdDate'], 0, 10);?></td>
                <td><?php echo substr($estimates[$i]['estimate_modifiedDate'], 0, 10);?></td>
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
      <?php endif; ?>

      <?php foreach($estimates as $estimate):
          $_SESSION['estimate_' . $estimate['estimate_id'] . '_seen'] = true;
      endforeach; ?>

</main>
