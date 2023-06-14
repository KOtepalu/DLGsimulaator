<?php
	$figure_1 = "pics/ms_neutral1.0.png";
	$figure_2 = "pics/pc_neutral1.0.png";
?>
<?php foreach ($answers as $answer): ?>
	<?php 
	$answer_score = $answer['answer_score']; 
	
	if ($answer_score >= 1){
		$figure_1 = '"pics/ms_happy1.0.png" alt="ms figure pos"';
		$figure_2 = '"pics/pc_happy1.0.png" alt="pc figure pos"';
	}
	if ($answer_score < 0){
		$figure_1 = '"pics/ms_negative1.0.png" alt="ms figure neg"';
		$figure_2 = '"pics/pc_happy1.0.png" alt="pc figure neg"';
	} else {
		$figure_1 = '"pics/ms_neutral1.0.png" alt="ms figure neut"';
		$figure_2 = '"pics/pc_neutral1.0.png" alt="pc figure neut"';
	}
		
	?>
<?php endforeach; ?>
<?php echo '<img src=' .$figure_1 .'>';?>
<?php echo $figure_2;?>