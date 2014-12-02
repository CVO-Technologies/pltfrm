<p>
	Hello <?php echo h($contact['name']); ?>,
</p>

<p>
	<?php echo h(__d('pltfrm', 'Your webhosting package has been created.')); ?>
</p>

<p>
	Login details:
<table>
	<tbody>
	<?php if (isset($details['username'])): ?>
		<tr>
			<th><?php echo h(__d('pltfrm', 'Username')); ?></th>
			<td><?php echo h($details['username']); ?></td>
		</tr>
	<?php endif; ?>
	<?php if (isset($details['password'])): ?>
		<tr>
			<th><?php echo h(__d('pltfrm', 'Password')); ?></th>
			<td><?php echo h($details['password']); ?></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
</p>
<?php if (isset($details['panel_url'])): ?>
	<p>
		<?php echo h(__d('pltfrm', 'You can manage your webhosting package at: %1$s', $details['panel_url'])); ?>
	</p>
<?php endif; ?>
