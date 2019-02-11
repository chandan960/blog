<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<?php
$id=1;
$value=$db->getById("tbl_theme","*","id='$id'");
if($value==true){
	if ($value['theme']=='default') {
		?>
		<link rel="stylesheet" href="theme/default.css">
		<?php
	}elseif($value['theme']=='green') {
		?>
		<link rel="stylesheet" href="theme/green.css">
		<?php
	}elseif($value['theme']=='red'){
		?>
		<link rel="stylesheet" href="theme/green.css">
		<?php
	}
}
?>

