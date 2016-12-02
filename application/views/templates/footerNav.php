<footer id="mobileMenu">
      <nav id="secondaryNav">
          <h3 class="hidden">Mobile Navigation</h3>
          <ul>
            <li><a href="<?php echo site_url('/dashboard');?>" <?php if($current == "dashboard"){echo "class='current'";}?>><img src="<?php echo base_url('img/home_icon.svg');?>" class="navIcon"/><span class="navText">Home</span></a></li>
            <li><a href="<?php echo site_url('/quotes');?>" <?php if($current == "quotes"){echo "class='current'";}?>><img src="<?php echo base_url('img/paper_icon.svg');?>" class="navIcon"/><span class="navText">Quotes</span></a></li>
            <li><a href="<?php echo site_url('/profile');?>" <?php if($current == "profile"){echo "class='current'";}?>><img src="<?php echo base_url('img/profile_icon.svg');?>" class="navIcon"/><span class="navText">Profile</span></a></li>
            <li><a href="<?php echo site_url('/tips');?>" <?php if($current == "tips"){echo "class='current'";}?>><img src="<?php echo base_url('img/tip_icons.svg');?>" class="navIcon"/><span class="navText">Tips</span></a></li>
            <li><a href="<?php echo site_url('/help');?>" <?php if($current == "help"){echo "class='current'";}?>><img src="<?php echo base_url('img/help_icon.svg');?>" class="navIcon"/><span class="navText">FAQs</span></a></li>

          </ul>
      </nav>
    </footer>
