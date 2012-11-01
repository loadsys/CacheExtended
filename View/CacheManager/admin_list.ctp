<h2>
	<?php echo $config; ?>
</h2>
<ul>
	<?php foreach ($cache['items'] as $key => $value): ?>
		<?php $key = substr($key, strlen($prefix)); ?>
		<li>
			<?php echo $key; ?>
			(
				<?php echo $this->Html->link('view', array(
					'action' => 'view',
					$config,
					$key
				)); ?>
			)
			(
				<?php echo $this->Html->link(
					'delete',
					array(
						'action' => 'delete',
						$config,
						$key
					),
					array(
						'confirm' => 'Are you sure you want to clear the ' . $config . ' cache?'
					)
				); ?>
			)
		</li>
	<?php endforeach; unset($key, $value); ?>
</ul>