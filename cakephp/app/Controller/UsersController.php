<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{

  public $components = array('Session', 'Auth');

  public function beforeFilter()
  {
    parent::beforeFilter();

    $this->Auth->allow('register', 'login');
  }

  public function index(/*$name*/)
  {
    //$options = array('conditions' => array('username' => $name));
    //条件を指定する 
    //$detail = $this->User->find('all', $options);
    //findがデータベースから値とる
    //$this->set('detail', $detail);
  }

  public function register()
  {
    if($this->request->is('post') && $this->User->save($this->request->data))
    {
      $this->Auth->login();
      $this->redirect('index');
    }
  }

  public function login()
  {
    if($this->request->is('post'))
    {
      if($this->Auth->login())
      {
        $user = $this->Auth->user();
        return $this->redirect('index/'.$user['username']);
      }
      else
      {
        $this->Session->setFlash('ログイン失敗');
      }
    }
  }

  public function logout()
  {
    $this->Auth->logout();
    $this->redirect('login');
  }
}