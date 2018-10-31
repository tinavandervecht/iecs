<div id="background"><div class="darkOverlay"></div><div class="other"></div></div>
<main class="no-top-margin">
  <h2 class="hidden">Main Content</h2>
<section class="row expanded collapse" id="login">
  <h3 class="hidden">Reset Password</h3>
  <div class="small-12 small-centered text-center">

    <div class="backface">
      <div class="content">
        <img class="logo" src="<?php echo base_url('img/iecslogo.png');?>">
        <p>International Erosion Control Systems has been manufacturing and selling soil stabilizing erosion control products since 1984.</p>
        <img class="logo" id="ccLogo" src="<?php echo base_url('img/CC-whiteLogo.svg');?>">
        <h4>Cable Concrete Calculator</h4>
      </div>
    </div>

    <div id="formCont">
        <?php if(isset($passwordReset) && $passwordReset): ?>
            <div class="alert alert-success">
                You have successfully requested an email to reset your password. Please keep an eye on your inbox!
            </div>
        <?php endif; ?>
        <?php if(isset($tokenExpired) && $tokenExpired): ?>
            <div class="alert alert-success">
                The link you just clicked has expired. Please request a new reset password email.
            </div>
        <?php endif; ?>
      <?php $attributes = array('class' => 'clearfix', 'id' => 'loginForm');
      echo form_open('adminpassword/forgot', $attributes);?>
      <?php echo validation_errors(); ?>
      <label for="admin_email">Email:</label>
      <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input type="input"  name="admin_email" type="text" placeholder="Enter your email">
        <input type="submit" name="submit" value="Reset Password">
    </form>
</section>
</main>
