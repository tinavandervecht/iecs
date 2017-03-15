<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
      <?php echo form_open('/profile');?>
        <div class="columns small-12">
          <h2>Profile</h2>
        </div>
        <div class="columns small-12 large-3">
          <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>">
        </div>
        <div class="columns small-12 large-4">
          <div class="field">
            <h3 class="title">Contact Name</h3><?php echo form_error('contactName', '<span class="error">', '</span>');?>
            <a href="#" class="value"><?php echo $userInfo['company_contactName'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
            <input class="value hidden" name="contactName" value="<?php echo $userInfo['company_contactName'];?>">
          </div>
          <div class="field">
            <h3 class="title">Company</h3><?php echo form_error('name', '<span class="error">', '</span>');?>
            <a href="#" class="value"><?php echo $userInfo['company_name'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
            <input class="value hidden" name="name" value="<?php echo $userInfo['company_name'];?>">
          </div>
        </div>
        <div class="columns small-12 large-4 end">
          <div class="field">
            <h3 class="title">Phone Number</h3><?php echo form_error('phone', '<span class="error">', '</span>');?>
            <a href="#" class="value"><?php echo $userInfo['company_phone'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
            <input class="value hidden" name="phone" value="<?php echo $userInfo['company_phone'];?>">
          </div>
          <input id="saveProfile" class="greenButton hidden" name="submit" type="submit" value="Save Changes">
        </div>
      </form>
    </section>
  </main>
