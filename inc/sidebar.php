		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
			<?php 
			$category=$db->getAll("tbl_category","*");
			if($category){
				foreach($category as $value){
			?>
						<li><a href="posts.php?category=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>

						<?php
					}}else{?>
						<li>No Category Created</li>
						<?php
					}
						?>						
					
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<?php 
			$post=$db->getAllLimit("tbl_post ORDER BY id DESC","*","5");
			if($post){
				foreach($post as $value){
			?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['image']; ?>" alt="post image"/></a>
						<p><?php echo $fm->textShorten($value['body'],125); ?></p>	
					</div>

					<?php }}else{
						header("Location:404.php");
					}?>
	
			</div>
			
		</div>