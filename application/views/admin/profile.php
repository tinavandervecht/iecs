<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
        <?php echo form_open('/admin/profile');?>
            <div class="columns small-12">
                <h2>Profile</h2>
            </div>

            <div class="columns small-12 large-3">
                <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>" alt="Profile Picture">
            </div>

            <div class="columns small-12 large-4">
                <div class="field">
                    <h3 class="title">Username</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['admin_username'];?>
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="username" value="<?php echo $userInfo['admin_username'];?>">
                    <?php echo form_error('username', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Name</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['admin_name'];?>
                        </span>
                    <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="name" value="<?php echo $userInfo['admin_name'];?>">
                    <?php echo form_error('name', '<span class="error">', '</span>');?>
                </div>
            </div>

            <div class="columns small-12 large-4 end">
                <div class="field">
                    <h3 class="title">Current Password</h3>
                    <a href="#" class="value">
                        <span class="text">
                            ****
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="current_password">
                    <?php if (isset($passwordError)): ?>
                        <span class="error">Please input the correct password.</span>
                    <?php endif; ?>
                </div>

                <div class="field">
                    <h3 class="title">New Password</h3>
                    <a href="#" class="value">
                        <span class="text">
                            ****
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="new_password">
                    <?php echo form_error('new_password', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Confirm New Password</h3>
                    <a href="#" class="value">
                        <span class="text">
                            ****
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="confirm_new_password">
                    <?php echo form_error('confirm_new_password', '<span class="error">', '</span>');?>
                </div>

                <input id="saveProfile" class="greenButton <?php echo validation_errors() == false ? 'hidden' : ''; ?>"
                    name="submit" type="submit" value="Save Changes"
                />
            </div>
        </form>
    </section>
</main>