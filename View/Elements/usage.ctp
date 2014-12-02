<strong><?php echo h($title); ?></strong>
<div class="progress">
	<?php
	if ($available === 'unlimited'):
		$available = $used;
	endif;
	if ($allocated === 0):
		$allocated = $used;
	endif;
	if ($available !== 0):
		$usedPercentage = $used / $available * 100;
	else:
		$usedPercentage = 0;
	endif;

	$allocatedPercentage = $allocated / $available * 100;
	?>
	<div class="bar bar-danger" style="width: <?php echo h($usedPercentage); ?>%;"><?php echo h($used); ?></div>
	<div class="bar bar-warning" style="width: <?php echo h($allocatedPercentage - $usedPercentage); ?>%;"><?php echo h($allocated - $used); ?></div>
	<div class="bar bar-success" style="width: <?php echo h(100 - $allocatedPercentage); ?>%;"><?php echo h($available - $allocated); ?></div>
</div>
