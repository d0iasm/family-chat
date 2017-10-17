<?php echo $this->Html->css('resister'); ?>

<h2>group</h2>

<div id="group">
	<?php
	echo $this->Form->create('Family');
	echo $this->Form->input(
		'name', array(
			'label' =>  'グループ名',
		)
	);
	echo $this->Form->hidden('member',array('value' => $user["username"]));
	echo $this->Form->input(
		'pass', array(
			'label' =>  '合言葉',
		)
	);
	echo $this->Form->hidden('member',array('value' => $user["username"]));
	echo $this->Form->hidden('no',array('value' => '3'));
	?>
</div>

<div id="resister">
	<?php echo $this->Form->end('CREATE'); ?>	
</div>
