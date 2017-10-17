<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?> / ログインするだけのサイト</title>
    <?php echo $this->Html->css('main'); ?>
    <?php echo $this->Html->css('clearfix'); ?>

    <?php echo $this->Html->script('jquery-1.11.3.min'); ?>
    <?php echo $this->Html->script('main'); ?>
  </head>
  <body class="clearfix">
    <header>
      <h1><?php echo $this->Html->image('h1.png'); ?></h1>
    </header>
    <div id="menu" class="clearfix">
      <?php
        if(isset($user)):?>
          <div class="leftMenu clearfix">
            <span id="chatMenu">
	    		<span id="chat"><p>chat</p></span>
             	<?php echo $this->Html->link($this->Html->image('01.png'), array('controller'=>'chats','action'=>'index'),array('escape'=>false)); ?>
            </span>
            <span id="scheduleMenu">
              <?php echo $this->Html->link($this->Html->image('02.png'), array('controller'=>'schedules','action'=>'index'),array('escape'=>false)); ?>
              <span id="schedule"><p>schedule</p></span>
            </span>
            <span id="albumMenu">
              <?php echo $this->Html->link($this->Html->image('03.png'), array('controller'=>'uploads','action'=>'index'),array('escape'=>false)); ?>
              <span id="album"><p>album</p></span>
            </span>
          </div>
          <div class="bottomMenu clearfix">
            <span id="profileMenu">
              <?php echo $this->Html->link($this->Html->image('04.png'), array('controller'=>'users','action'=>'index'),array('escape'=>false)); ?>
              <span id="profile"><p>profile</p></span>
            </span>
            <span id="logoutMenu">
              <?php echo $this->Html->link($this->Html->image('05.png'), array('controller'=>'users','action'=>'logout'),array('escape'=>false)); ?>
              <span id="logout"><p>logout</p></span>
            </span>
          </div>
        <?php  
        else:
        ?>
          <div class="leftMenu clearfix">
            <span id="loginMenu">
              <?php echo $this->Html->link($this->Html->image('05.png'), array('controller'=>'users','action'=>'login'),array('escape'=>false)); ?>
              <span id="login"><p>login</p></span>
            </span>
            <span id="resisterMenu">
              <?php echo $this->Html->link($this->Html->image('06.png'), array('controller'=>'users','action'=>'register'),array('escape'=>false)); ?>
              <span id="resister"><p>resister</p></span>
            </span>
            <span>
              <?php echo $this->Html->image('01_2.png');?>
            </span>
          </div>
          <div class="bottomMenu clearfix">
            <span>
              <?php echo $this->Html->image('03_2.png');?>
            </span>
            <span>
              <?php echo $this->Html->image('04_2.png');?>
            </span>
          </div>
        <?php
        endif;
      ?>
    </div>
    <div id="content">
      <?php echo $this->fetch('content'); ?>
    </div>
  </body>
</html>
