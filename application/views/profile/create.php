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

    <?php if(isset($accountRequested) && $accountRequested): ?>
        <div class="alert alert-success">
            You have successfully requested an account. A Cable Concrete representative will be in touch shortly!
        </div>
    <?php endif; ?>

  <div id="formCont">
    <?php echo validation_errors(); ?>
    <?php $attributes = array('class' => 'clearfix', 'id' => 'signUpForm');
    echo form_open('profile/create', $attributes);?>
        <label for="company_email">Your Email:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_email" type="email" placeholder="Enter your email." title="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true"
            value="<?php echo isset($_POST['company_email']) && !isset($accountRequested) ? $_POST['company_email'] : ''; ?>"
        />
        <?php echo form_error('company_email', '<p class="error">', '</p>');?>

        <label for="company_pw">Password:</label>
        <small>Password must contain no spaces and be between 6 &amp; 30 characters.</small>
        <img src="<?php echo base_url('img/lock_edit.svg" class="icon');?>">
        <input name="company_pw" type="password" placeholder="Enter your Password"  title="Password with no spaces and between 6 &amp; 30 characters." pattern="[A-Za-z0-9\S]{6,30}" required="true"
            value="<?php echo isset($_POST['company_pw']) && !isset($accountRequested) ? $_POST['company_pw'] : ''; ?>"
        />
        <?php echo form_error('company_pw', '<p class="error">', '</p>');?>

        <img src="<?php echo base_url('img/lock_edit.svg');?>" class="icon">
        <input id="signUpPassConfirm" type="password" name="passwordconf" placeholder="Re-Enter your Password"  title="Re-enter password with no spaces and between 6 &amp; 30 characters." required="true"
            value="<?php echo isset($_POST['passwordconf']) && !isset($accountRequested) ? $_POST['passwordconf'] : ''; ?>"
        />
        <?php echo form_error('passwordconf', '<p class="error">', '</p>');?>

        <label for="company_name">Company Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_name" type="input" placeholder="Enter your Company name." required="true"
            value="<?php echo isset($_POST['company_name']) && !isset($accountRequested) ? $_POST['company_name'] : ''; ?>"
        />
        <?php echo form_error('company_name', '<p class="error">', '</p>');?>

        <label for="company_contactName">Your Name:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_contactName" type="input" placeholder="Enter your name." required="true"
            value="<?php echo isset($_POST['company_contactName']) && !isset($accountRequested) ? $_POST['company_contactName'] : ''; ?>"
        />
        <?php echo form_error('company_contactName', '<p class="error">', '</p>');?>

        <label for="company_city">Company City:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_city" type="input" placeholder="Enter your company city." required="true"
            value="<?php echo isset($_POST['company_city']) && !isset($accountRequested) ? $_POST['company_city'] : ''; ?>"
        />
        <?php echo form_error('company_city', '<p class="error">', '</p>');?>

        <label for="company_phone">Phone Number:</label>
        <img src="<?php echo base_url('img/user_icon_edit.svg');?>" class="icon">
        <input name="company_phone" type="input" placeholder="Enter your phone number." required="true"
            value="<?php echo isset($_POST['company_phone']) && !isset($accountRequested) ? $_POST['company_phone'] : ''; ?>"
        />
        <?php echo form_error('company_phone', '<p class="error">', '</p>');?>

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
