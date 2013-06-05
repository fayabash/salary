<div class="taxes index">
	<h2><?php echo __('Taxes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('holder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('taxe_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($taxes as $tax): ?>
	<tr>
		<td><?php echo h($tax['Tax']['id']); ?>&nbsp;</td>
		<td><?php echo h($tax['Tax']['name']); ?>&nbsp;</td>
		<td><?php echo h($tax['Tax']['rate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tax['Holder']['name'], array('controller' => 'holders', 'action' => 'view', $tax['Holder']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tax['TaxeType']['name'], array('controller' => 'taxe_types', 'action' => 'view', $tax['TaxeType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tax['Gender']['name'], array('controller' => 'genders', 'action' => 'view', $tax['Gender']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tax['Tax']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tax['Tax']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tax['Tax']['id']), null, __('Are you sure you want to delete # %s?', $tax['Tax']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Holders'), array('controller' => 'holders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holder'), array('controller' => 'holders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxe Types'), array('controller' => 'taxe_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxe Type'), array('controller' => 'taxe_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
	</ul>
</div>
