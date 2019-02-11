	</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<?php 
		$page=$db->getAll("tbl_page","*");
		if($page){
			foreach($page as $value){ ?>
			<li><a href="page.php?pageid=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
<?php
			}
		}

		?>
			<li><a href="contact.php">Contact</a></li>
			
		</ul>
	  </div>
	  <?php
				$data=$db->getAll("tbl_footer","*","id='1'");
				if($data==true){
					foreach($data as $value){
				?>
	  <p>&copy; <?php echo $value['text'] ?><?php echo date('Y'); ?></p>
	  <?php } }?>
	</div>
	<div class="fixedicon clear">
		<?php
				$data=$db->getAll("tbl_social","*","id='1'");
				if($data==true){
					foreach($data as $value){
				?>
		<a href="<?php echo $value['fb'] ?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $value['tw'] ?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $value['ln'] ?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $value['gp'] ?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php } }?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>