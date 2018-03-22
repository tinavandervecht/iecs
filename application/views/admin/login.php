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
        <h4>Admin Panel Log-In</h4></h4>
      </div>
      <!-- <div class="darkOverlay"></div>
      <img class="back" src="<?php echo base_url('img/loginTop.jpg');?>">
      <img class="back" id="two" src="<?php echo base_url('img/loginTopTwo.jpg')?>"> -->
    </div>

    <div id="formCont">
      <?php $attributes = array('class' => 'clearfix', 'id' => 'loginForm');
      echo form_open('admin/login', $attributes);?>
      <?php echo validation_errors(); ?>
      <label for="admin_user">Username:</label>
      <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input type="input"  name="admin_user" type="text" placeholder="Enter your Username">
        <label for="admin_pw">Password:</label>
        <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
        <input name="admin_pw" type="password" placeholder="Enter your Password">
        <input type="submit" name="submit" value="Log-In">
    </form>

  </div>
  </div>
</section>
</main>
