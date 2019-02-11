<?php include 'inc/header.php'; ?>

<?php

if (!isset($_REQUEST['pageid']) || $_REQUEST['pageid']==null) {
    
   header("Location:404.php");
}else{
    $id=$_GET['pageid'];
}

?>
<?php
$value=$db->getById("tbl_page","*","id='$id'");
if ($value) { ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $value['name']; ?></h2>
	
				<p><?php echo $value['body']; ?></p>
				
				
	</div>

		</div>
			<?php
}else{
	header("Location:404.php");
}
?>
		
<?php include 'inc/sidebar.php'; ?>		
<?php include "inc/footer.php";?>