<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
            <div class="columns small-12">
                <h2>Profile</h2>
            </div>

            <?php echo form_open_multipart('/profile/avatar/' . $userInfo['company_id']);?>
                <div class="columns small-12 large-3">
                    <?php if($userInfo['company_avatar']): ?>
                        <a href="/profile/clear_avatar/<?php echo $userInfo['company_id']; ?>" class="profilePicLarge _bg" style="background:url(<?php echo base_url($userInfo['company_avatar'])?>)">
                            <span class="clearProfilePic"><img src="<?php echo base_url('img/trash_icon.svg'); ?>" /></span>
                        </a>
                        <div class="field">
                            <input class="" name="avatar" type="file">
                        </div>
                        <button class="greyButton avatar" type="submit">Change Avatar</button>
                    <?php else: ?>
                        <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>" alt="Profile Picture">
                        <div class="field">
                            <input class="" name="avatar" type="file">
                        </div>
                        <button class="greyButton avatar" type="submit">Upload Avatar</button>
                    <?php endif; ?>
                </div>
            </form>

            <?php echo form_open('/profile');?>
            <div class="columns small-12 large-4">
                <div class="field">
                    <h3 class="title">Contact Name</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['company_contactName'];?>
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="contactName" value="<?php echo $userInfo['company_contactName'];?>">
                    <?php echo form_error('contactName', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Email</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['company_email'];?>
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="email" value="<?php echo $userInfo['company_email'];?>">
                    <?php echo form_error('email', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Company</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['company_name'];?>
                        </span>
                    <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="name" value="<?php echo $userInfo['company_name'];?>">
                    <?php echo form_error('name', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Phone Number</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['company_phone'];?>
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="phone" value="<?php echo $userInfo['company_phone'];?>">
                    <?php echo form_error('phone', '<span class="error">', '</span>');?>
                </div>
            </div>

            <div class="columns small-12 large-4 end">
                <div class="field">
                    <h3 class="title">City</h3>
                    <a href="#" class="value">
                        <span class="text">
                            <?php echo $userInfo['company_city'];?>
                        </span>
                        <img src="<?php echo base_url('img/pencil_icon.svg');?>" alt="Edit Icon"/>
                    </a>
                    <input class="value hidden" name="city" value="<?php echo $userInfo['company_city'];?>">
                    <?php echo form_error('city', '<span class="error">', '</span>');?>
                </div>

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