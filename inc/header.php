<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
<?php
  $db=new Database;
  $fm=new Format;
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'scripts/meta.php'; ?>
	<?php include 'scripts/css.php'; ?>
	<?php include 'scripts/js.php'; ?>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<?php
				$data=$db->getAll("tbl_title_slogan","*","id='1'");
				if($data==true){
					foreach($data as $value){
				?>
				<img src="admin/<?php echo $value['image'] ?>" alt="Logo"/>
				<h2><?php echo $value['title'] ?></h2>
				<p><?php echo $value['slogan'] ?></p>
				<?php } }?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php
				$data=$db->getAll("tbl_social","*","id='1'");
				if($data==true){
					foreach($data as $value){
				?>
				<a href="<?php echo $value['fb'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $value['tw'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $value['ln'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $value['gp'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php } }?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	
	<ul>
		<li><a 
			<?php if($fm->active()=='index'){echo 'id="active"';} ?> 
			href="index.php">Home</a></li>
		<?php 
		$page=$db->getAll("tbl_page","*");
		if($page){
			foreach($page as $value){ ?>
			<li><a 

				<?php
				if (isset($_REQUEST['pageid']) && $_REQUEST['pageid']==$value['id']) {
					echo 'id="active"';
				}
				?>

				href="page.php?pageid=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
     <?php
			}
		}

		?>
		<li><a <?php if($fm->active()=='contact'){echo 'id="active"';} ?>  href="contact.php">Contact Us</a></li>
	</ul>
</div>