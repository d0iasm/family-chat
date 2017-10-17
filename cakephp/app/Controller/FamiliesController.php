<?php
    App::uses('AppController', 'Controller');
    class FamiliesController extends AppController
    {
        public function index()
        {

        }

        public function resister()
        {
        	$user = $this->Auth->user();
        	$this->set('user', $user);

        	if($this->request->is('post'))
        	{
        		if($this->request->data['Family']['no']==='1')
        		//チャットグループに合言葉で入る時
        		{
        			$options = array('conditions' => array('pass' => $this->request->data['Family']['pass']));
		    		$detail = $this->Family->find('first', $options);
		    		if(empty($detail))
		    		{
		    			$this->redirect('../chats/index');
		    		}
		    		else
		    		{
		    			//findがデータベースから値とる
		    			$this->request->data['Family']['name'] = $detail['Family']['name'];
		    		}
        		}
        		else if($this->request->data['Family']['no']==='2')
        		//チャットグループにID入力で人を招待する時
        		{	
        			$this->loadModel('User');
        			$options = array('conditions' => array('username' => $this->request->data['Family']['member']));
		    		$detail = $this->User->find('first', $options);
		    		if(empty($detail))
		    		{
		    			$this->redirect('../chats/index');
		    		}
		    		else
		    		{	

		    			$this->loadModel('Family');
		    			$options = array('conditions' => array('member' => $this->request->data['Family']['member']));
		    			$detail = $this->Family->find('first', $options);
		    			if(empty($detail))
		    			{
		    				$options = array('conditions' => array('member' => $this->request->data['Family']['id']));
			    			$group = $this->Family->find('first', $options);
			    			//findがデータベースから値とる
			    			$this->request->data['Family']['name'] = $group['Family']['name'];
			    			$this->request->data['Family']['pass'] = $group['Family']['pass'];
		    			}
		    			else
		    			{
		    				$this->redirect('../chats/index');
		    			}
		    		}
		    	}
		    	else if($this->request->data['Family']['no'] === '3')
		    	{

		    	}
        		$this->Family->save($this->request->data);
        		$this->redirect('../chats/index');
        	}
        }
    }
?>