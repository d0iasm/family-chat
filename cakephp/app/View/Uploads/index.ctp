<?php echo $this->Html->css('upload'); ?>

<h2>album</h2>

<div id="upload">
<?php

if(!empty($detail))
{
	echo '<h3>'.$detail['Family']['name'].' 家</h3>';

	foreach ($file as $value) {
	?>
	<div id="file">
		<?php echo $this->Html->image('../files/'.$value['Upload']['file']); ?>
		<!-- echo ' '.h(date('m/d H:i', strtotime($value['Upload']['created']))).'<br>'; -->
	</div>
	<?php
	}
	?>
	<div id="add">
		<?php echo $this->Html->link('Add Picture', array('controller'=>'uploads','action'=>'add'),array('escape'=>false)); ?>
	</div>
	<div id="invite">
<?php
	echo $this->Form->create(
		'Family',
		array(
			'url' => array(
					'controller' => 'Families',
					'action' => 'resister'
				)
			)
	);
	echo $this->Form->input(
		'member', array(
			'label' =>  false,
			'placeholder' => 'ID'
		)
	);
	echo $this->Form->hidden('id',array('value' => $user["username"]));
	echo $this->Form->hidden('no',array('value' => '2'));
	echo $this->Form->end('招待');
?>
</div>
<?php
}
else
{
	echo $this->Html->link('家族集合', '/families/resister');

	echo $this->Form->create(
		'Family',
		array(
			'url' => array(
					'controller' => 'Families',
					'action' => 'resister'
				)
			)
	);
	echo $this->Form->input(
		'pass', array(
			'label' =>  '合言葉',
		)
	);
	echo $this->Form->hidden('member',array('value' => $user["username"]));
	echo $this->Form->hidden('no',array('value' => '1'));
	echo $this->Form->end('参加');
}
?>
</div>