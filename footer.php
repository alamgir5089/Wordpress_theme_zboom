<?php global $alamgir;?>
<!--------------Footer--------------->
<footer>
<?php if($alamgir['opt-switch-button'] == 1) :?>
	<div class="wrap-footer zerogrid">
		<div class="row block09">

			<?php dynamic_sidebar('footer-widget');?>
			
		</div>
		<?php endif;?>

		<div class="row copyright">
			<p>&copy; <?php echo $alamgir['opt-copyright-field'];?><span> <a href="<?php echo $alamgir['opt-Developer-Url'];?>"><?php echo $alamgir['opt-Developer-name'];?> </a></span></p>
		</div>
	</div>
</footer>
<!--  js should deleted(for your understanding only) and you can find it the function.php 
	<script src="<?php echo esc_url (get_template_directory_uri());?>/js/jquery.min.js"></script>
	<script src="<?php echo esc_url (get_template_directory_uri());?>/js/responsiveslides.js"></script>
	<script src="<?php echo esc_url (get_template_directory_uri());?>/js/main.js"></script>
-->

<?php wp_footer() ;?>
</body>
</html>