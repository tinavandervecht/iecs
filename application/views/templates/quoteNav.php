<header id="mainHeader">
            <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
            <div class="pagnation-page-tracker">
              <div class="pages">
                  <a href="#" class="pageNo current" id="1">1</a>
                  <a href="#" class="pageNo" id="2">2</a>
                  <a href="#" class="pageNo" id="3">3</a>
                </div>
              </div>
        </header>

              <section id="sideBar">
                <h2 class="hidden">Sidebar</h2>
                <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
                <section id="profile" class="clearfix">
                  <img src="<?php echo base_url('img/default_dude_img.png');?>" class="profilepic"/>
                  <h3 class="name"><?php echo $userInfo['company_contactName'];?></h3>
                  <h4 class="title"><?php echo $userInfo['company_name'];?></h4>
                </section>
                <nav id="mainNav">
                    <h3 id="navTitle">Navigation</h3>
                    <ul>
                      <li><a href="<?php echo site_url('/dashboard');?>" class="<?php if($current == "dashboard"){echo "current";}?>"><img src="<?php echo base_url('img/home_icon.svg');?>" class="navIcon"/><span class="navText">Home</span></a></li>
                      <li><a href="<?php echo site_url('/quotes');?>" class="<?php if($current == "quotes"){echo "current";}?>"><img src="<?php echo base_url('img/paper_icon.svg');?>" class="navIcon"/><span class="navText">Quotes</span></a></li>
                      <li><a href="<?php echo site_url('/history');?>" class="<?php if($current == "history"){echo "current";}?>"><img src="<?php echo base_url('img/history_icon.svg');?>" class="navIcon"/><span class="navText">History</span></a></li>
                      <li><a href="<?php echo site_url('/profile');?>" class="<?php if($current == "profile"){echo "current";}?>"><img src="<?php echo base_url('img/profile_icon.svg');?>" class="navIcon"/><span class="navText">Profile</span></a></li>
                      <li><a href="<?php echo site_url('/tips');?>" class="<?php if($current == "tips"){echo "current";}?>"><img src="<?php echo base_url('img/tip_icons.svg');?>" class="navIcon"/><span class="navText">Tips</span></a></li>
                      <li><a href="<?php echo site_url('/help');?>" class="<?php if($current == "help"){echo "current";}?>"><img src="<?php echo base_url('img/help_icon.svg');?>" class="navIcon"/><span class="navText">FAQs</span></a></li>
                    </ul>
                </nav>
              </section>
