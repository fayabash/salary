<div class="salaries form">
<?php echo $this->Form->create('Salary'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Salary'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('net_fee');
		echo $this->Form->input('employee_id');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Salaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
