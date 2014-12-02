<table class="table">
	<caption>Orders</caption>
	<thead>
	<tr>
		<th><?php echo h(__d('webshop_orders', 'Order')); ?></th>
		<th><?php echo h(__d('webshop_orders', 'Actions')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($webhostingPackages as $webhostingPackage): ?>
		<tr>
			<td><?php echo h($webhostingPackage['Host']['name']); ?></td>
			<td><?php echo $this->CroogoHtml->link('View', array('action' => 'view', $webhostingPackage['WebhostingPackage']['id']), array('button' => 'success')); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
