<?php
  App::uses('AppModel', 'Model');

  class User extends AppModel
  {
    public $validate = array
    (
      'username' => array
      (
        array
        (
          'rule' => 'isUnique',
          'message' => 'すでに使用されている名前です'
        ),
        array
        (
          'rule' => 'alphaNumeric',
          'message' => '名前は半角英数字にしてください'
        ),
        array
        (
          'rule' => array('between', 2, 16),
          'message' => '名前は２文字以上１６文字以下にしてください'
        ),
        array
        (
          'rule' => 'notEmpty',
          'message' => '必須'
        )
      ),
      'password' => array
      (
        array
        (
          'rule' => 'alphaNumeric',
          'message' => 'パスワードは半角英数字にしてください'
        ),
        array
        (
          'rule' => array('between', 8, 16),
          'message' => 'パスワードは８文字以上１６文字以下にしてください'
        ),
        array
        (
          'rule' => 'notEmpty',
          'message' => '必須'
        )
      ),
      'firstname' => array
      (
        array
        (
          'rule' => 'notEmpty',
          'message' => '必須'
        )
      ),
      'familyname' => array
      (
        array
        (
          'rule' => 'notEmpty',
          'message' => '必須'
        )
      )
    );

    public function beforeSave($options = array())
    {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
      return true;
    }
  }
?>