<?php echo $this->Html->css('schedule'); ?>

<h2>schedule</h2>

<?php
for($i=1; $i<13; $i++)
{
	if(0<=$i && $i<=9)
	{
		$monthOpt['0'.$i] = '0'.$i;
	}
	else
	{
		$monthOpt[$i] = $i;
	}
}
for($i=1; $i<32; $i++)
{
	if(0<=$i && $i<=9)
	{
		$dayOpt['0'.$i] = '0'.$i;
	}
	else
	{
		$dayOpt[$i] = $i;
	}
}

if(!isset($detail['0']))
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
else
{
	echo '<h3>'.$detail['0']['Family']['name'].' 家</h3>';

?>
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

	if(!isset($schedule2))
	{
	}
	else
	{
		foreach ($schedule2 as $value) {
			?>
			<div id="mainMessage">
			<?php
			foreach ($value as $value2) {
				echo $value2['Schedule']['month'].'/'.$value2['Schedule']['day'].'<br>';
				break;
			}
			foreach ($value as $value2) {
				echo $value2['Schedule']['message'];
				echo '('.$value2['Schedule']['username'].')<br>';
			}
			?>
			</div>
			<?php
		}
	}
?>
<div id="sendMessage">
<?php
	//チャット送信
	echo $this->Form->create('Schedule');
	echo $this->Form->input(
		'message', array(
			'label' => false,
			'placeholder' => 'What is your schedule?'
		)
	);

	echo $this->Form->input(
	'month', array(
		'label' => 'When?',
		'type' => 'select',
		'options' => $monthOpt,
		'div' => false,
		)
	);
	echo '月';
	echo $this->Form->input(
		'day', array(
			'label' => false,
			'type' => 'select',
			'options' => $dayOpt,
			'div' => false,
		)
	);
	echo '日';

	echo $this->Form->hidden('username',array('value' => $user["username"]));
	echo $this->Form->end('送信');
}
?>
</div>