<!-- MOBILE NAV ON THE FRONT END, INCLUDING A DISCLAIMER FOOTER BAR AT THE BOTTOM -->

<footer id="mobileMenu">
      <nav id="secondaryNav" class="four">
          <h3 class="hidden">Mobile Navigation</h3>
          <ul>
            <li><a href="<?php echo site_url('/dashboard');?>" class="<?php if($current == "dashboard"){echo "current";}?>"><img src="<?php echo base_url('img/home_icon.svg');?>" class="navIcon"/><span class="navText">Home</span></a></li>
            <li><a href="<?php echo site_url('/profile');?>" class="<?php if($current == "profile"){echo "current";}?>"><img src="<?php echo base_url('img/profile_icon.svg');?>" class="navIcon"/><span class="navText">Profile</span></a></li>
            <li><a href="<?php echo site_url('/quotes');?>" class="<?php if($current == "quotes"){echo "current";}?>"><img src="<?php echo base_url('img/paper_icon.svg');?>" class="navIcon"/><span class="navText">Designs</span></a></li>
            <li><a href="<?php echo site_url('/acbDesignFiles');?>" class="<?php if($current == "acbDesignFiles"){echo "current";}?>"><img src="<?php echo base_url('img/settings_icon.svg');?>" class="navIcon"/><span class="navText">ACB Desi...</span></a></li>
            <li><a href="<?php echo site_url('/ccDetails');?>" class="<?php if($current == "ccDetails"){echo "current";}?>"><img src="<?php echo base_url('img/settings_icon.svg');?>" class="navIcon"/><span class="navText">AutoCA...</span></a></li>
            <li><a href="http://iecs.com/cable-concrete/" target="_blank"><img src="<?php echo base_url('img/tip_icons.svg');?>" class="navIcon"/><span class="navText">Cable Conc...</span></a></li>
            <li><a href="<?php echo site_url('/help');?>" class="<?php if($current == "help"){echo "current";}?>"><img src="<?php echo base_url('img/help_icon.svg');?>" class="navIcon"/><span class="navText">FAQs</span></a></li>
            <li><a href="<?php echo site_url('/contact');?>" class="<?php if($current == "contact"){echo "current";}?>"><img src="<?php echo base_url('img/pencil_icon_white.svg');?>" class="navIcon"/><span class="navText">Contact Us</span></a></li>
          </ul>
      </nav>
    </footer>
    <footer id="desktopInfo">
      <div class="left">
        22295 Hoskins Lin, Rodney, ON, CA - N0L 2C0 &nbsp;&nbsp;|&nbsp;&nbsp;
        <span>Phone:</span> 1-800-821-7462&nbsp;&nbsp;|&nbsp;&nbsp;
        <span>Fax:</span> 1-866-496-1990&nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?php echo site_url('/disclaimer');?>">Disclaimer</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="http://iecs.com" target="_blank">IECS Homepage</a>
      </div>
      <div class="right">&copy; <?php echo date("Y")?> International Erosion Control Systems</div>
    </footer>
