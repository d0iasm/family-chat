<?php
    App::uses('AppController', 'Controller');
    class SchedulesController extends AppController
    {
        public function index()
        {
        	$this->loadModel('Family');
        	$user = $this->Auth->user();
        	$options = array('conditions' => array('member' => $user['username']));
		    $detail = $this->Family->find('all', $options);
		    //findがデータベースから値とる
		    $this->set('detail', $detail);
		    $this->set('user', $user);

		    //送信ボタンを押した == post  URLやlinkから == get 
		    if($this->request->is('post'))
		    {
		    	$this->request->data['Schedule']['date'] = $this->request->data['Schedule']['month'].$this->request->data['Schedule']['day'];
		    	$this->Schedule->save($this->request->data);
		  	}
		    //自分が所属しているグループ探す
			$options = array('conditions' => array('member' => $user['username']));
			$group = $this->Family->find('first', $options);
			if(!empty($group))
			{
				//グループのパスワードを元に、所属しているメンバーを探す
				$options = array('conditions' => array('pass' => $group['Family']['pass']));
				$member = $this->Family->find('all', $options);
				foreach ($member as $value) {
					$name[] = $value['Family']['member'];
	 			}

	 			//メンバーのチャットメッセージだけを取る
	 			$this->loadModel('Schedule');
	 			$options = array('conditions' => array('username' => $name),
	 				'order' => array('time' => 'desc')
	 			);

			    $schedule = $this->Schedule->find('all', $options);

			    foreach ($schedule as $value) {
			    	$date[] = $value['Schedule']['date'];
			    }

			    if(empty($date))
			    {
			    }
			    else
			    {

				    $date = array_unique($date);

				    foreach ($date as $value) {
				    	$options = array('conditions' => array('username' => $name, 'date' => $value));
				    	$schedule2[] = $this->Schedule->find('all', $options);
				    }

				    $this->set('schedule2', $schedule2);
				}
        	}
    	}
    }
?>