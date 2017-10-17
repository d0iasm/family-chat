<?php echo $this->Html->css('resister'); ?>

<h2>新規登録</h2>

<?php

$familyrole = array(
	"father" => "父",
	"mother" => "母",
	"son" => "息子",
	"daughter" => "娘",
	"grandfa" => "祖父",
	"grandma" => "祖母",
	"pet" => "ペット",
	"other" => "その他",
);

for($i=1; $i<100; $i++)
{
	if(0<=$i && $i<=9)
	{
		$age['0'.$i] = '0'.$i;
	}
	else
	{
		$age[$i] = $i;
	}
}

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

echo $this->Form->create('User');

echo $this->Form->input(
	'username', array(
		'label' => 'ID',
	)
);

echo $this->Form->input(
	'password', array(
		'label' => 'パスワード',
	)
);

echo $this->Form->input(
	'firstname', array(
		'label' => '名前',
	)
);

echo $this->Form->input(
	'familyname', array(
		'label' => '名字',
	)
);

echo $this->Form->input(
	'familyrole', array(
		'label' =>  '役割',
		'type' => 'select',
		'options' => $familyrole,
	)
);

echo $this->Form->input(
	'age', array(
		'label' => '年齢',
		'type' => 'select',
		'options' => $age,
	)
);

echo $this->Form->input(
	'month', array(
		'label' => '誕生日',
		'type' => 'select',
		'options' => $monthOpt,
		'div' => false
	)
);

echo $this->Form->input(
	'day', array(
		'label' => false,
		'type' => 'select',
		'options' => $dayOpt,
		'div' => false
	)
);
?>

<p id="month">月</p>
<p id="day">日</p>

<div id="resister">
	<?php echo $this->Form->end('RESISTER'); ?>	
</div>
