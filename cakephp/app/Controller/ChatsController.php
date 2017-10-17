<?php
    App::uses('AppController', 'Controller');
    class ChatsController extends AppController
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
		    	$this->Chat->save($this->request->data);
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
	 			$this->loadModel('Chat');
	 			$options = array('conditions' => array('username' => $name),
	 				'order' => array('time' => 'desc')
	 			);

			    $chat = $this->Chat->find('all', $options);
			    $this->set('chat', $chat);
			}
        }
    }
?>