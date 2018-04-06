<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
        <?php echo form_open('/profile');?>
            <div class="columns small-12">
                <h2>Profile</h2>
            </div>

            <div class="columns small-12 large-3">
                <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>" alt="Profile Picture">
            </div>

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
            </div>

            <div class="columns small-12 large-4 end">
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

                <input id="saveProfile" class="greenButton <?php echo validation_errors() == false ? 'hidden' : ''; ?>"
                    name="submit" type="submit" value="Save Changes"
                />
            </div>
        </form>
    </section>
</main>