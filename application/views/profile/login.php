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
          <?php $attributes = array('class' => 'clearfix', 'id' => 'loginForm');
          echo form_open('profile/login', $attributes);?>
          <?php echo validation_errors(); ?>
          <label for="company_email">Email:</label>
          <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
            <input type="input"  name="company_email" type="text" placeholder="Enter your email">
            <label for="company_pw">Password:</label>
            <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
            <input name="company_pw" type="password" placeholder="Enter your Password">
            <a id="forgot" href="#">Forgot Password</a>
            <input type="submit" name="submit" value="Log-In">
        </form>

      </div>
        <div id="onNoAccountShouldYou" class="small-12">
          <span id="dont">Don't have an account?</span>
          <a id="signUp" href="<?php echo site_url('profile/create');?>">Sign up</a>
        </div>
      </div>
    </section>
  </main>
