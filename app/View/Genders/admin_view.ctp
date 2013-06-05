<div class="genders view">
<h2><?php  echo __('Gender'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gender['ParentGender']['name'], array('controller' => 'genders', 'action' => 'view', $gender['ParentGender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gender'), array('action' => 'edit', $gender['Gender']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gender'), array('action' => 'delete', $gender['Gender']['id']), null, __('Are you sure you want to delete # %s?', $gender['Gender']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($gender['Employee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Avs Number'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gender['Employee'] as $employee): ?>
		<tr>
			<td><?php echo $employee['id']; ?></td>
			<td><?php echo $employee['gender_id']; ?></td>
			<td><?php echo $employee['name']; ?></td>
			<td><?php echo $employee['lastname']; ?></td>
			<td><?php echo $employee['avs_number']; ?></td>
			<td><?php echo $employee['address']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'employees', 'action' => 'delete', $employee['id']), null, __('Are you sure you want to delete # %s?', $employee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Genders'); ?></h3>
	<?php if (!empty($gender['ChildGender'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gender['ChildGender'] as $childGender): ?>
		<tr>
			<td><?php echo $childGender['id']; ?></td>
			<td><?php echo $childGender['name']; ?></td>
			<td><?php echo $childGender['parent_id']; ?></td>
			<td><?php echo $childGender['lft']; ?></td>
			<td><?php echo $childGender['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'genders', 'action' => 'view', $childGender['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'genders', 'action' => 'edit', $childGender['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'genders', 'action' => 'delete', $childGender['id']), null, __('Are you sure you want to delete # %s?', $childGender['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Taxes'); ?></h3>
	<?php if (!empty($gender['Tax'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Holder Id'); ?></th>
		<th><?php echo __('Taxe Type Id'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gender['Tax'] as $tax): ?>
		<tr>
			<td><?php echo $tax['id']; ?></td>
			<td><?php echo $tax['name']; ?></td>
			<td><?php echo $tax['rate']; ?></td>
			<td><?php echo $tax['holder_id']; ?></td>
			<td><?php echo $tax['taxe_type_id']; ?></td>
			<td><?php echo $tax['gender_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'taxes', 'action' => 'view', $tax['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'taxes', 'action' => 'edit', $tax['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'taxes', 'action' => 'delete', $tax['id']), null, __('Are you sure you want to delete # %s?', $tax['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
