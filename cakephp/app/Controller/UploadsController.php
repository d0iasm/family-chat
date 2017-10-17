<?php
    App::uses('AppController', 'Controller');
    class UploadsController extends AppController
    {
        public function add()
        {   
            $user = $this->Auth->user();
            $this->loadModel('Family');
            $options = array('conditions' => array('member' => $user['username']));
            $detail = $this->Family->find('first', $options);

            if ($this->request->is('post')) {
            $this->loadModel('Upload');
            $tmp = $this->request->data['Upload']['file']['tmp_name'];
            //画像ファイルは自動的に一時的な名前(=tmp_name)をつけられて、送信されてきます。ランダムな文字列

            if(is_uploaded_file($tmp)) {
                //画像ファイルは一時的なファイル名で、一時的にサーバにアップロードされます。
                //なので名前をつけ変えましょう。
                //ここでは、idの番号と同じファイル名にしようと思います（のちのち取り出す際に楽＋名前が重複しないので）

                ////$file_name = basename($this->request->data['Upload']['file']['name']);
                
                //ーーーーここから名前の変更です。
                $lastCreated = $this->Upload->find('first',array(
                    'order'=> array('Upload.id' => 'desc')
                    //降順の１番目＝つまり１番大きなidのレコード(直前に登録されたデータ)を取り出す。
                ));
                if(!empty($lastCreated))
                {
                    $file_name = $lastCreated['Upload']['id'];
                }
                else
                {
                    $file_name = 0;
                }
                $file_name++;
                //これで$file_nameはデータベースに挿入される際のidと同じ値となっています。
                //けれどファイル形式がついていない名前にしたらファイルが壊れるので、名前の語尾に正しい形式をつなげましょう。
                $file_type = $this->request->data['Upload']['file']['type']; 
                // typeは"image/png"のような形で送信されてきます。
                //"image/"を取りのぞいて、ファイル名にくっつけましょう。
                $file_type = ltrim($file_type, 'image/'); 

                $file_name = $file_name.'.'.$file_type;
                
                //ltrim()関数は第一引数の文字列の先頭から、第二引数で指定した文字列を取りのぞいてくれる関数。
                //これで$file_nameが理想的なファイル名になりました。
                //ーーーーここまで名前の変更です。

                $file = WWW_ROOT.'files'.DS.$file_name;
                //これがwebroot内のfilesフォルダに保存するための、ファイルのパスになります。


                if (move_uploaded_file($tmp, $file)) {
                    //ファイルの保存が可能なパスかのチェックだと思われます。
                    $this->Upload->create();
                    $this->request->data['Upload']['file'] = $file_name;

                    $this->request->data['Upload']['pass'] = $detail['Family']['pass'];
                    if ($this->Upload->save($this->request->data)) {
                        //これでwebroot内のfilesフォルダに、ちゃんと保存されました。
                        $this->redirect('index');
                        //Uploadのindex.ctpにリダイレクトします。
                    } else {
                        $this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
                    }
                }
            }
            }
        }

        public function index()
        {
            $user = $this->Auth->user();
            $this->loadModel('Family');
            //自分が所属しているグループ探す
            $options = array('conditions' => array('member' => $user['username']));
            $group = $this->Family->find('first', $options);
            $this->set('detail', $group);

            if(!empty($group))
            {
                $this->loadModel('Upload');
            //メンバーの画像だけを取る
            $options = array('conditions' => array('pass' => $group['Family']['pass']),
                'order' => array('created' => 'desc')
                );

            $file = $this->Upload->find('all', $options);
            $this->set('file', $file);

            }
        }
    }
?>