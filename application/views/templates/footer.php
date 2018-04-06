<!-- MAIN FOOTER TEMPLATE WITH ALL THE NECESSITY SCRIPT TAGS. IT INCLUDES THE DYNAMIC $jsLink WHICH IS UNIQUE FOR EACH PAGE AND DEFINED IN THE CONTROLLER -->
<script src="<?php echo base_url('js/ie.js');?>"></script>
<script src="<?php echo base_url('js/vendor/jquery.js');?>"></script>
<script src="<?php echo base_url('js/vendor/what-input.js');?>"></script>
<script src="<?php echo base_url('js/vendor/foundation.js');?>"></script>
<script src="<?php echo base_url('js\vendor\greensock\TweenLite.min.js');?>"></script>
<script src="<?php echo base_url('js\vendor\greensock\CSSPlugin.min.js');?>"></script>
<script src="<?php echo base_url('js\vendor\toastr.min.js');?>"></script>
<script src="<?php echo base_url('js\vendor\moment.js');?>"></script>
<script src="<?php echo base_url('js\vendor\pikaday.js');?>"></script>
<script>
    toastr.options = {
        "positionClass": "toast-bottom-right"
    };
</script>
<script src="<?php echo base_url('js/classList.js');?>"></script><!--Polyfill for IE-->
<script src="<?php echo base_url('js/app.js');?>"></script>
<script src="<?php echo base_url($jsLink);?>"></script>

<?php if (!empty($_SESSION['profile_edited'])) : ?>
    <script>toastr.success('Profile successfully saved.');</script>
    <?php unset($_SESSION['profile_edited']); ?>
<?php endif; ?>
</body>
</html>
