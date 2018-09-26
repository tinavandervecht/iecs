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
    </div>

  <div id="formCont">
    <?php echo validation_errors(); ?>
    <?php $attributes = array('class' => 'clearfix', 'id' => 'signUpForm');
    echo form_open('profile/create', $attributes);?>
        <label for="company_email">Your Email:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_email" type="email" placeholder="Enter your email." title="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true"
            value="<?php echo isset($_POST['company_email']) ? $_POST['company_email'] : ''; ?>"
        />
        <?php echo form_error('company_email', '<p class="error">', '</p>');?>

        <label for="company_pw">Password:</label>
        <small>Password must contain no spaces and be between 6 &amp; 30 characters.</small>
        <img src="<?php echo base_url('img/lock_edit.svg" class="icon');?>">
        <input name="company_pw" type="password" placeholder="Enter your Password"  title="Password with no spaces and between 6 &amp; 30 characters." pattern="[A-Za-z0-9\S]{6,30}" required="true"
            value="<?php echo isset($_POST['company_pw']) ? $_POST['company_pw'] : ''; ?>"
        />
        <?php echo form_error('company_pw', '<p class="error">', '</p>');?>

        <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
        <input id="signUpPassConfirm" type="password" name="passwordconf" placeholder="Re-Enter your Password"  title="Re-enter password with no spaces and between 6 &amp; 30 characters." required="true"
            value="<?php echo isset($_POST['passwordconf']) ? $_POST['passwordconf'] : ''; ?>"
        />
        <?php echo form_error('passwordconf', '<p class="error">', '</p>');?>

        <label for="company_name">Company Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_name" type="input" placeholder="Enter your Company name." required="true"
            value="<?php echo isset($_POST['company_name']) ? $_POST['company_name'] : ''; ?>"
        />
        <?php echo form_error('company_name', '<p class="error">', '</p>');?>

        <label for="company_contactName">Your Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_contactName" type="input" placeholder="Enter your name." required="true"
            value="<?php echo isset($_POST['company_contactName']) ? $_POST['company_contactName'] : ''; ?>"
        />
        <?php echo form_error('company_contactName', '<p class="error">', '</p>');?>

        <input type="submit" name="submit" value="Request Account" id="register">
        <small>Submitting this form will send your request to a Cable Concrete representative. If your request is approved, you'll receive an email with instructions on how to login.</small>
    </form>
  </div>
    <div id="onNoAccountShouldYou" class="small-12">
      <span id="dont">Log-In to your account.</span>
      <a id="signUp" href="<?php echo site_url('profile/login');?>">Sign In</a>
    </div>
  </div>
</section>
</main>
