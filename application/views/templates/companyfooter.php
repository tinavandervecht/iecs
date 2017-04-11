<!-- FOOTER FOR THE COMPANIES PAGE ON THE CMS. IS UNIQUE FOR THE AJAX -->

<script src="<?php echo base_url('js/ie.js');?>"></script>
<script src="<?php echo base_url('js/vendor/jquery.js');?>"></script>
<script src="<?php echo base_url('js/vendor/what-input.js');?>"></script>
<script src="<?php echo base_url('js/vendor/foundation.js');?>"></script>
<script src="<?php echo base_url('js\vendor\greensock\TweenLite.min.js');?>"></script>
<script src="<?php echo base_url('js\vendor\greensock\CSSPlugin.min.js');?>"></script>
<script src="<?php echo base_url('js/classList.js');?>"></script><!--Polyfill for IE-->
<script src="<?php echo base_url('js/app.js');?>"></script>
<script src="<?php echo base_url($jsLink);?>"></script>
<!-- THE FOLLOWING VARIABLEs ARE HERE FOR THE AJAX.JS FUNCTIONS, THIS WAY AJAX KNOWS WHERE TO LOOK -->

<script>var base_url = '<?php echo site_url();?>';
var img_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url('js/companyajax.js');?>"></script>
</body>
</html>
