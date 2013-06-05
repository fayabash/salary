<div class="taxeTypes view">
<h2><?php  echo __('Taxe Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taxeType['TaxeType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($taxeType['TaxeType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taxe Type'), array('action' => 'edit', $taxeType['TaxeType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taxe Type'), array('action' => 'delete', $taxeType['TaxeType']['id']), null, __('Are you sure you want to delete # %s?', $taxeType['TaxeType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxe Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxe Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Taxes'); ?></h3>
	<?php if (!empty($taxeType['Tax'])): ?>
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
		foreach ($taxeType['Tax'] as $tax): ?>
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
