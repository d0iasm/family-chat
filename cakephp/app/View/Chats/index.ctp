<?php echo $this->Html->css('chat'); ?>

<h2>chat</h2>

<?php
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
	//保存先と行き先を指定

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

	//チャット本文
	foreach ($chat as $value) {
		?>
		<div id="mainMessage">
		<?php
		echo $value['Chat']['message'];
		echo ' - '.$value['Chat']['username'];
		echo ' '.h(date('m/d H:i', strtotime($value['Chat']['time']))).'<br>';
		//h == 文字列として取り出す(htmlハイパーキャラ)
		?>
		</div>
		<?php
	}
?>

<div id="sendMessage">
<?php
	//チャット送信
	echo $this->Form->create('Chat');
	echo $this->Form->input(
		'message', array(
			'label' => false
		)
	);
	echo $this->Form->hidden('username',array('value' => $user["username"]));
	echo $this->Form->end('送信');
}
?>
</div>
