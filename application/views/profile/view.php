<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
      <div class="columns small-12">
        <h2>Profile</h2>
      </div>
      <div class="columns small-12 medium-3">
        <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>">
      </div>
      <div class="columns small-12 large-4">
        <div class="field">
          <h3 class="title">Contact Name</h3>
          <a href="#" class="value"><?php echo $userInfo['company_contactName'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
        </div>
        <div class="field">
          <h3 class="title">Company</h3>
          <a href="#" class="value"><?php echo $userInfo['company_name'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
        </div>
        <div class="field">
          <h3 class="title">Position</h3>
          <a href="#" class="value">Engineer<img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
        </div>
      </div>
      <div class="columns small-12 large-4 end">
        <div class="field">
          <h3 class="title">Phone Number</h3>
          <a href="#" class="value"><?php echo $userInfo['company_phone'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
        </div>
        <div class="field">
          <h3 class="title">Email</h3>
          <a href="#" class="value"><?php echo $userInfo['company_email'];?><img src="<?php echo base_url('img/pencil_icon.svg');?>"/></a>
        </div>
        <a id="saveProfile" class="greenButton" href="#">Save Changes</a>
      </div>
    </section>
  </main>
