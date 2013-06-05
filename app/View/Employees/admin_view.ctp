<div class="employees view">
<h2><?php  echo __('Employee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($employee['Gender']['name'], array('controller' => 'genders', 'action' => 'view', $employee['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avs Number'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['avs_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee'), array('action' => 'edit', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employee'), array('action' => 'delete', $employee['Employee']['id']), null, __('Are you sure you want to delete # %s?', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Salaries'); ?></h3>
	<?php if (!empty($employee['Salary'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Net Fee'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Company Cost'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($employee['Salary'] as $salary): ?>
		<tr>
			<td><?php echo $salary['id']; ?></td>
			<td><?php echo $salary['date']; ?></td>
			<td><?php echo $salary['net_fee']; ?></td>
			<td><?php echo $salary['employee_id']; ?></td>
			<td><?php echo $salary['company_cost']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'salaries', 'action' => 'view', $salary['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'salaries', 'action' => 'edit', $salary['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'salaries', 'action' => 'delete', $salary['id']), null, __('Are you sure you want to delete # %s?', $salary['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
