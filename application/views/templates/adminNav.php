
    <header id="mainHeader">
        <img class="logo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
    </header>

      <section id="sideBar">
        <h2 class="hidden">Sidebar</h2>
        <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
        <section id="profile" class="clearfix">
          <img src="<?php echo base_url('img/default_dude_img.png');?>" class="profilepic"/>
          <h3 class="name">Admin</h3>
          <h4 class="title">IECS</h4>
        </section>
        <nav id="mainNav">
            <h3 id="navTitle">Navigation</h3>
            <ul>
              <li><a href="<?php echo site_url('/admin');?>" <?php if($current == "dashboard"){echo "class='current'";}?>><img src="<?php echo base_url('img/home_icon.svg');?>" class="navIcon"/><span class="navText">Dashboard</span></a></li>
              <li><a href="<?php echo site_url('/admin/activity');?>" <?php if($current == "activity"){echo "class='current'";}?>><img src="<?php echo base_url('img/history_icon.svg');?>" class="navIcon"/><span class="navText">Activity</span></a></li>
              <li><a href="<?php echo site_url('/admin/estimates');?>" <?php if($current == "estimates"){echo "class='current'";}?>><img src="<?php echo base_url('img/paper_icon.svg');?>" class="navIcon"/><span class="navText">Designs</span></a></li>
              <li><a href="<?php echo site_url('/admin/statistics');?>" <?php if($current == "statistics"){echo "class='current'";}?>><img src="<?php echo base_url('img/stats_icon.svg');?>" class="navIcon"/><span class="navText">Statistics</span></a></li>
              <li><a href="<?php echo site_url('/admin/companies');?>" <?php if($current == "companies"){echo "class='current'";}?>><img src="<?php echo base_url('img/company_icon.svg');?>" class="navIcon"/><span class="navText">Companies</span></a></li>

            </ul>
        </nav>
      </section>
