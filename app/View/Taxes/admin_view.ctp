<div class="taxes view">
<h2><?php  echo __('Tax'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tax['Holder']['name'], array('controller' => 'holders', 'action' => 'view', $tax['Holder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxe Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tax['TaxeType']['name'], array('controller' => 'taxe_types', 'action' => 'view', $tax['TaxeType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tax['Gender']['name'], array('controller' => 'genders', 'action' => 'view', $tax['Gender']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tax'), array('action' => 'edit', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tax'), array('action' => 'delete', $tax['Tax']['id']), null, __('Are you sure you want to delete # %s?', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holders'), array('controller' => 'holders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holder'), array('controller' => 'holders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxe Types'), array('controller' => 'taxe_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxe Type'), array('controller' => 'taxe_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
	</ul>
</div>
