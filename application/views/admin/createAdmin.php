<main class="clearfix">
    <h2 class="hidden">Main Content</h2>
    <section class="row expanded" id="mainProfile">
        <?php echo form_open('/admin/createAdmin');?>
            <div class="columns small-12">
                <h2>Create Admin</h2>
            </div>

            <div class="columns small-12 large-3">
                <img class="profilePicLarge" src="<?php echo base_url('img/default_dude_img.png')?>" alt="Profile Picture">
            </div>

            <div class="columns small-12 large-4">
                <div class="field">
                    <h3 class="title">Username</h3>
                    <input class="value" name="username">
                    <?php echo form_error('username', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Name</h3>
                    <input class="value" name="name">
                    <?php echo form_error('name', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Email</h3>
                    <input class="value" name="email">
                    <?php echo form_error('email', '<span class="error">', '</span>');?>
                </div>
            </div>

            <div class="columns small-12 large-4 end">
                <div class="field">
                    <h3 class="title">Password</h3>
                    <input class="value" type="password" name="new_password">
                    <?php echo form_error('new_password', '<span class="error">', '</span>');?>
                </div>

                <div class="field">
                    <h3 class="title">Confirm Password</h3>
                    <input class="value" type="password" name="confirm_new_password">
                    <?php echo form_error('confirm_new_password', '<span class="error">', '</span>');?>
                </div>

                <input id="saveProfile" class="greenButton"
                    name="submit" type="submit" value="Create Admin"
                />
            </div>
        </form>
    </section>
</main>