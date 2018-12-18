    <div id="background"><div class="darkOverlay"></div><div class="other"></div></div>
    <main class="no-top-margin">
      <h2 class="hidden">Main Content</h2>
    <section class="row expanded collapse" id="login">
      <h3 class="hidden">Login</h3>
      <div class="small-12 small-centered text-center">

        <div class="backface">
          <div class="content">
            <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
            <p>International Erosion Control Systems has been manufacturing and selling soil stabilizing erosion control products since 1984.</p>
            <img class="logo" id="ccLogo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
            <h4>Cable Concrete Calculator</h4>
          </div>
        </div>

        <?php if(isset($passwordReset) && $passwordReset): ?>
            <div class="alert alert-success">
                You have successfully reset your password. Please log in below with the password you just set.
            </div>
        <?php endif; ?>

        <?php if(isset($no_account)): ?>
            <div class="alert alert-success">
                <?php echo $no_account; ?>
            </div>
        <?php endif; ?>

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
            <input type="submit" name="submit" value="Log-In">
            <a href="/companypassword/forgot">Forgot your password?</a>
        </form>

      </div>
        <div id="onNoAccountShouldYou" class="small-12">
          <span id="dont">Don't have an account?</span>
          <a id="signUp" href="<?php echo site_url('profile/create');?>">Sign up</a>
        </div>
      </div>
    </section>
  </main>
