<div class="taxes form">
<?php echo $this->Form->create('Tax'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Tax'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('rate');
		echo $this->Form->input('holder_id');
		echo $this->Form->input('taxe_type_id');
		echo $this->Form->input('gender_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Holders'), array('controller' => 'holders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holder'), array('controller' => 'holders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxe Types'), array('controller' => 'taxe_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxe Type'), array('controller' => 'taxe_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
	</ul>
</div>
