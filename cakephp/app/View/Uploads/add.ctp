<?php echo $this->Html->css('upload'); ?>

<?php echo $this->Form->create('Upload', array('action' => 'add', 'type' => 'file')); ?>

<fieldset>
<legend><?php echo __('画像アップロード'); ?></legend>
<?php echo $this->Form->file('file'); ?>
</fieldset>

<div id="submit">
	<?php echo $this->Form->end(__('送信'));?>
</div>