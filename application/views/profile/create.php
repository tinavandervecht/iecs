<div id="background"><div class="darkOverlay"></div><div class="other"></div></div>
<main class="no-top-margin">
  <h2 class="hidden">Main Content</h2>
<section class="row expanded collapse" id="login">
  <h3 class="hidden">Login</h3>
  <div class="small-12 small-centered text-center">

    <div class="backface">
      <div class="content">
        <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
        <img class="logo" id="ccLogo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
        <h4>Cable Concrete Calculator</h4>
      </div>
      <div class="darkOverlay"></div>
      <img class="back" src="<?php echo base_url('img/loginTop.jpg');?>">
      <img class="back" id="two" src="<?php echo base_url('img/loginTopTwo.jpg')?>">
    </div>

  <div id="formCont">
    <?php echo validation_errors(); ?>
    <?php $attributes = array('class' => 'clearfix', 'id' => 'signUpForm');
    echo form_open('profile/create', $attributes);?>
        <label for="company_email">Your Email:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_email" type="email" placeholder="Enter your email." title="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
        <label for="company_pw">Password:</label>
        <img src="<?php echo base_url('img/lock_edit.svg" class="icon');?>">
        <input name="company_pw" type="password" placeholder="Enter your Password"  title="Password with no spaces and between 6 &amp; 30 characters." pattern="[A-Za-z0-9\S]{6,30}" required="true">
        <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
        <input id="signUpPassConfirm" type="password" name="passwordconf" placeholder="Re-Enter your Password"  title="Re-enter password with no spaces and between 6 &amp; 30 characters." required="true">
        <label for="company_name">Company Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_name" type="input" placeholder="Enter your Company name." required="true">
        <label for="company_contactName">Your Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_contactName" type="input" placeholder="Enter your name." required="true">

        <input type="submit" name="submit" value="Sign Up" id="register">
    </form>
  </div>
    <div id="onNoAccountShouldYou" class="small-12">
      <span id="dont">Log-In to your account.</span>
      <a id="signUp" href="<?php echo site_url('profile/login');?>">Sign In</a>
    </div>
  </div>
</section>
</main>
