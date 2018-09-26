<header id="mainHeader">
            <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
            <div class="pagnation-page-tracker">
              <div class="pages">
                  <a href="#" class="pageNo current" id="1">1</a>
                  <a href="#" class="pageNo" id="2">2</a>
                  <a href="#" class="pageNo" id="3">3</a>
                  <a href="#" class="pageNo" id="4">4</a>
                </div>
              </div>
        </header>

              <section id="sideBar">
                <h2 class="hidden">Sidebar</h2>
                <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
                <section id="profile" class="clearfix">
                <?php if($userInfo['company_avatar']): ?>
                    <div class="profilepic _bg" style="background:url(<?php echo base_url($userInfo['company_avatar'])?>)"></div>
                <?php else: ?>
                    <img src="<?php echo base_url('img/default_dude_img.png');?>" class="profilepic"/>
                <?php endif; ?>
                  <h3 class="name"><?php echo $userInfo['company_contactName'];?></h3>
                  <h4 class="title"><?php echo $userInfo['company_name'];?></h4>
                  <a href="<?php echo base_url('dashboard/logout'); ?>"><small>Logout</small></a>
                </section>
                <nav id="mainNav">
                    <h3 id="navTitle">Navigation</h3>
                    <ul>
                      <li><a href="<?php echo site_url('/dashboard');?>" class="<?php if($current == "dashboard"){echo "current";}?>"><img src="<?php echo base_url('img/home_icon.svg');?>" class="navIcon"/><span class="navText">Home</span></a></li>
                      <li><a href="<?php echo site_url('/quotes');?>" class="<?php if($current == "quotes"){echo "current";}?>"><img src="<?php echo base_url('img/paper_icon.svg');?>" class="navIcon"/><span class="navText">Project Designs</span></a></li>
                      <li><a href="<?php echo site_url('/acbDesignFiles');?>" class="<?php if($current == "acbDesignFiles"){echo "current";}?>"><img src="<?php echo base_url('img/settings_icon.svg');?>" class="navIcon"/><span class="navText">ACB Design Files</span></a></li>
                      <li><a href="<?php echo site_url('/profile');?>" class="<?php if($current == "profile"){echo "current";}?>"><img src="<?php echo base_url('img/profile_icon.svg');?>" class="navIcon"/><span class="navText">Profile</span></a></li>
                      <li><a href="http://iecs.com/cable-concrete/" target="_blank"><img src="<?php echo base_url('img/tip_icons.svg');?>" class="navIcon"/><span class="navText">Cable Concrete® an Articulated Concrete Block System</span></a></li>
                      <li><a href="<?php echo site_url('/help');?>" class="<?php if($current == "help"){echo "current";}?>"><img src="<?php echo base_url('img/help_icon.svg');?>" class="navIcon"/><span class="navText">FAQs</span></a></li>
                    </ul>
                </nav>
              </section>
