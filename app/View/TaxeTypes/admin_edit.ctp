<div class="taxeTypes form">
<?php echo $this->Form->create('TaxeType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Taxe Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TaxeType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TaxeType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Taxe Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
