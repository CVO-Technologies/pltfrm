<?php $this->assign('title', $webhostingHost['WebhostingHost']['name']); ?>
<h1><?php echo h($this->fetch('title')); ?></h1>

<div class="row-fluid">
	<div class="span8">
		<strong>Part of group</strong> <?php echo h($webhostingHost['HostGroup']['name']); ?><br>
		<strong>Hosting packages</strong> <?php echo h(count($webhostingHost['Package'])); ?>
	</div>
	<div class="span4">
		<h2>Packages</h2>
		<?php foreach ($webhostingHost['Package'] as $package): ?>
			<div class="well">
				<?php echo $this->element('Pltfrm.webhosting_package_info', array(
					'package'  => $package,
					'customer' => $package['Customer'],
				)); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
