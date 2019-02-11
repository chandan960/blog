<div class="slidersection templete clear">
        <div id="slider">
    <?php
	$data=$db->getAll("tbl_slider","*");
	if ($data==true) {
		foreach($data as $value){
	?>
     <a href="#"><img src="admin/<?php echo $value['image'];?>" alt="no slider" title="<?php echo $value['title'];?>" /></a>
    <?php 	}}?>
        </div>
</div>
