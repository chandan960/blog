<?php include 'inc/header.php'; ?>
<?php
if (!isset($_GET['id']) || $_GET['id']==null) {
	header("Location:404.php");
}
else{
	$id=$_GET['id'];
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			$value=$db->getById("tbl_post","*","id=$id");
			if($value){
				
			?>
			<div class="about">
				<h2><?php echo $value['title']; ?></h2>
				<h4><?php echo $fm->formatDate($value['date']); ?>, By <?php echo $value['author']; ?></h4>
				<img src="admin/<?php echo $value['image']; ?>" alt="post image"/>
				<p>
					<?php echo $value['body']; ?>
				</p>
                             
<!--disqus start-->

<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://chandan-blog-site-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
<!--disqus end-->
			
			<?php 
				$catid=$value['cat'];
				$relatedpost=$db->getAllLimitCondition("tbl_post","*","cat=$catid ORDER BY rand()","3");

				?> 	
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
					if($relatedpost){
					foreach($relatedpost as $value) {
						?>
					
					<a href="post.php?id=<?php echo $value['id'];?>"><img src="admin/<?php echo $value['image']; ?>" alt="post image"/></a>
					<?php }}else{
						echo "No Related post available !!";
					} ?>
					
				</div>

				<?php } else{
					header("Location:404.php");
				}
					?>
	</div>

		</div>

<!--disqus start-->

<script id="dsq-count-scr" src="//chandan-blog-site-1.disqus.com/count.js" async></script>

<!--disqus end-->


<?php include 'inc/sidebar.php'; ?>		
<?php include "inc/footer.php"; ?>
