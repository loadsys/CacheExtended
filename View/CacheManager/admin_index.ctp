<h2>Cache Configs</h2>
<ul>
	<?php foreach ($configs as $config): ?>
		<li>
			<?php echo $config; ?>
			(
				<?php echo $this->Html->link('list', array(
					'action' => 'list',
					$config
				)); ?>
			)
			(
				<?php echo $this->Html->link(
					'clear',
					array(
						'action' => 'clear',
						$config
					),
					array(
						'confirm' => 'Are you sure you want to clear the ' . $config . ' cache?'
					)
				); ?>
			)
		</li>
	<?php endforeach; unset($config); ?>
</ul>
