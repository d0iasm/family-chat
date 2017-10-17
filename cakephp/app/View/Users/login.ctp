<?php echo $this->Html->css('login'); ?>

<h2>ログイン</h2>

<div id="idLogin">
	<?php
	echo $this->Form->create('User');

	echo $this->Form->input(
		'username', array(
			'label' => 'ID',
		)
	);
	?>
</div>

<div id="passLogin">
	<?php
	echo $this->Form->input(
		'password', array(
			'label' => 'PASSWORD',
		)
	);
?>
</div>

<div id="login">
	<?php echo $this->Form->end('LOGIN'); ?>
</div>