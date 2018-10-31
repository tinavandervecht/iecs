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
      <?php $attributes = array('class' => 'clearfix', 'id' => 'loginForm');
      echo form_open('companypassword/reset/' . $token, $attributes);?>
        <?php echo validation_errors(); ?>

        <label for="company_pw">Password:</label>
        <small>Password must contain no spaces and be between 6 &amp; 30 characters.</small>
        <img src="<?php echo base_url('img/lock_edit.svg" class="icon');?>">
        <input name="company_pw" type="password" placeholder="Enter your Password"  title="Password with no spaces and between 6 &amp; 30 characters." pattern="[A-Za-z0-9\S]{6,30}" required="true"/>
        <?php echo form_error('company_pw', '<p class="error">', '</p>');?>

        <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
        <input id="signUpPassConfirm" type="password" name="passwordconf" placeholder="Re-Enter your Password"  title="Re-enter password with no spaces and between 6 &amp; 30 characters." required="true"/>
        <?php echo form_error('passwordconf', '<p class="error">', '</p>');?>

        <input type="submit" name="submit" value="Reset Password">
    </form>
</section>
</main>
