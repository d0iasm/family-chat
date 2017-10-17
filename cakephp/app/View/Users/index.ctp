<?php echo $this->Html->css('profile'); ?>

<h2>profile</h2>

<div id="prof">

<div class="profLabel">
	<p>ID</p>
</div>
<p id="id"><?php echo h($user['username']); ?></p>

	<div class="profLabel">
		<p>名前</p>
	</div>
	<p id="familyName"><?php echo h($user['familyname']); ?></p>
	<p id="firstName"><?php echo h($user['firstname']); ?></p>
	<div class="profLabel">
		<p>役割</p>
	</div>
	<p id="role"><?php echo h($user['familyrole']); ?></p>
	<div class="profLabel">
		<p>年齢</p>
	</div>
	<p id="age"><?php echo h($user['age']); ?></p>
	<div class="profLabel">
		<p>誕生日</p>
	</div>
	<p id="birth">
		<?php echo h($user['month']); ?>
		<?php echo '月'; ?>
		<?php echo h($user['day']); ?>
		<?php echo '日'; ?>
	</p>
</div>
