<?php
    App::uses('AppController', 'Controller');
    class DatasController extends AppController
    {
        public function posts($name)
        {
            $options = array
            (
                'conditions' => array
                (
                    'name' => $name
                )
            );

            $datas = $this->Data->find('all', $options);

            $this->set('datas', $datas);
            $this->set('name', $name);
        }
    }
?>