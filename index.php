<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<!-- pagenation start -->

			<?php
			$per_page=3;
			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page=1;
			}
			$start_form=($page-1)*$per_page;
			
			?>

			<!-- pagenation end -->


			<?php 
			$post=$db->getAllLimit("tbl_post","*","$start_form,$per_page");
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

			<!-- pagenation start -->

			<?php
			$post=$db->getAllRow("tbl_post","*");
			$total_rows=$post;
			$total_pages=ceil($total_rows/$per_page);
			?>
			<div>
			
			<?php
			echo "<span class= 'pagination'><a href='index.php?page=1'>".'First Page'."</a>";

			for ($i=2; $i<$total_pages; $i++) {

				echo "<a href='index.php?page=$i'>"."$i"."</a>";
			}

			echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a>";
			echo "</span>";
			?>
			</span>
		</div>

			<!-- pagenation end -->
			<?php

		}else{
				header("Location:404.php");
			} ?>

		</div>
<?php include 'inc/sidebar.php'; ?>		
<?php include "inc/footer.php";?>
