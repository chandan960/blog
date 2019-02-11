	<?php 
if (isset($_REQUEST['pageid'])) {
	$pagetitleid=$_REQUEST['pageid'];
	$value=$db->getById("tbl_page","*","id='$pagetitleid'");
	if ($value) {
		$title=$db->getById("tbl_title_slogan","*","id='1'");
		if($title){
			?>
			<title><?php echo $value['name']; ?> - <?php echo $title['title']; ?></title>
			<?php

		}else{ ?>
           <title><?php echo $value['name']; ?></title>
		<?php }
	}
}
else if (isset($_REQUEST['id'])) {
	$pagetitleid=$_REQUEST['id'];
	$value=$db->getById("tbl_post","*","id='$pagetitleid'");
	if ($value) {
		$title=$db->getById("tbl_title_slogan","*","id='1'");
		if($title){
			?>
			<title><?php echo $value['title']; ?> - <?php echo $title['title']; ?></title>
			<?php

		}else{ ?>
           <title><?php echo $value['title']; ?></title>
		<?php }
	}
}
else if (isset($_REQUEST['category'])) {
	$pagetitleid=$_REQUEST['category'];
	$value=$db->getById("tbl_category","*","id='$pagetitleid'");
	if ($value) {
		$title=$db->getById("tbl_title_slogan","*","id='1'");
		if($title){
			?>
			<title><?php echo $value['name']; ?> - <?php echo $title['title']; ?></title>
			<?php

		}else{ ?>
           <title><?php echo $value['name']; ?></title>
		<?php }
	}
}
else{ 
	$title=$db->getById("tbl_title_slogan","*","id='1'");
	if($title){
	?>
<title><?php echo $fm->title(); ?> - <?php echo $title['title']; ?></title>
<?php
}else{
	?>
	<title><?php echo $fm->title(); ?></title>
	<?php
}
}
	?>
<!--	<title>Basic Website</title>-->
	<meta name="language" content="English">
	<!--mete tag description start-->
	<?php
	if (isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$data=$db->getById("tbl_post","*","id='$id'");
		if($data){ ?>
      <meta name="description" content="<?php echo $data['title'];?>">
		<?php
		} } 
	elseif(isset($_REQUEST['category'])){
		$cat=$_REQUEST['category'];
		$data=$db->getById("tbl_post INNER JOIN tbl_category ON tbl_post.cat=tbl_category.id","tbl_post.*,tbl_category.name","cat='$cat'");
		if($data){ ?>
		<meta name="description" content="<?php echo $data['title'];?>">
		<?php
	} }
	else{ ?>
		<meta name="description" content="<?php echo TITLE; ?>">
		<?php
		}
	?>
	<!--mete tag description end-->

	<!--mete tag keywords start-->
	<?php
	if (isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$data=$db->getById("tbl_post","*","id='$id'");
		if($data){ ?>
      <meta name="keywords" content="<?php echo $data['tags'];?>">
		<?php
		} } 
	elseif(isset($_REQUEST['category'])){
		$cat=$_REQUEST['category'];
		$data=$db->getById("tbl_post INNER JOIN tbl_category ON tbl_post.cat=tbl_category.id","tbl_post.*,tbl_category.name","cat='$cat'");
		if($data){ ?>
		<meta name="keywords" content="<?php echo $data['tags'];?>">
		<?php
	} }
	else{ ?>
		<meta name="keywords" content="<?php echo KEYWORDS; ?>">
		<?php
		}
	?>
	<!--mete tag keywords end-->
	<!--mete tag author start-->
	<?php
	if (isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$data=$db->getById("tbl_post","*","id='$id'");
		if($data){ ?>
      <meta name="author" content="<?php echo $data['author'];?>">
		<?php
		} } 
	elseif(isset($_REQUEST['category'])){
		$cat=$_REQUEST['category'];
		$data=$db->getById("tbl_post INNER JOIN tbl_category ON tbl_post.cat=tbl_category.id","tbl_post.*,tbl_category.name","cat='$cat'");
		if($data){ ?>
		<meta name="author" content="<?php echo $data['author'];?>">
		<?php
	} }
	else{ ?>
		<meta name="author" content="<?php echo AUTHOR; ?>">
		<?php
		}
	?>
	<!--mete tag author end-->