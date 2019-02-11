<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<?php
if (!isset($_GET['search']) || $_GET['search']==null) {
	header("Location:404.php");
}
else{
	$search=$_GET['search'];
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			$post=$db->getAllCondition("tbl_post","*","title LIKE '%$search%' OR body LIKE '%$search%' OR author LIKE '%$search%' OR tags LIKE '%$search%'");
			if($post){
				foreach($post as $value){
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h2>
				<h4><?php echo $fm->formatDate($value['date']); ?>, By <a href="post.php?id=<?php echo $value['id']; ?>"><?php echo $value['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['image']; ?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($value['body']); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $value['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } //end foreach loop
			?>
		
			<div>
				
		</div>

			<?php

		}else{ ?>
				<P>Your Search Query Not Found !!!</P>
			<?php } ?>

		</div>
<?php include 'inc/sidebar.php'; ?>		
<?php include "inc/footer.php";?>
