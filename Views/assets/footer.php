
	<!-- Primeiro jQuery, depois Popper.js, por ultimo Bootstrap JS -->
	<script src="<?php echo INCLUDE_PATH_ASSETS; ?>frameworks-plugins/jquery-3.5.1/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="<?php echo INCLUDE_PATH_ASSETS; ?>frameworks-plugins/bootstrap-4.5.3/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/ec8d70e5c7.js" crossorigin="anonymous"></script>
	<!-- MyJs -->
	<script src="<?php echo INCLUDE_PATH_ASSETS; ?>js/myjs.js"></script>
	<?php if (verifyValueUrl('myaccount')) { ?>
		<script src="<?php echo INCLUDE_PATH_ASSETS; ?>frameworks-plugins/helper-mask/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH_ASSETS; ?>js/mask.js"></script>
		<script src="<?php echo INCLUDE_PATH_ASSETS; ?>js/password-validation.js"></script>
	<?php } else if (!verifyValueUrl('campus')) { ?>
		<script src="<?php echo INCLUDE_PATH_ASSETS; ?>js/lesson.js"></script>
	<?php } ?>
</body>
</html>