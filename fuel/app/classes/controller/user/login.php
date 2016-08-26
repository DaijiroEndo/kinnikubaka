<?php
 class Controller_User_Login extends Controller{
 //ログイン
    public function action_index(){

       //POST送信なら
       if(Input::method() == 'POST'){
               //Authのインスタンス化
               $auth=Auth::instance();
               //資格情報の取得
               if($auth->login(Input::post('username'),Input::post('password'))){
                    //禁止ユーザーならWithoutページへ
                    if(!$auth->has_access('user.index')){
                         //Withoutページへ
                         Response::redirect('user/login/without');
                    }
                    //認証OKならトップページへ
                    Response::redirect('user/index');
                }else{

                    //認証が失敗したときの処理
                    Session::set_flash('error', 'ユーザー名かパスワードが違います。');
                }
       }
       
       //return Model_User::theme('template','user/login');

        $view = View::forge('user/login');
        return $view;
    
    }
 

    
 
 //パスワードの再発行申請
 public function action_apply(){
     
    //POST送信なら
    if(Input::method() == 'POST'){
        //受信データの整理
        $username=Input::post('username');
        $email=Input::post('email');
        //登録ユーザーの有無の確認

        $result = DB::query('SELECT count(*) FROM users where email="'.$email.'"')->execute()->as_array();
//        $user_count[0];
        //$row = Model_User::find();
        //\Fuel\Core\Debug::dump( $user_count[0]);
        $user_count = $result[0]['count(*)'];
        
        //print_r();
        
      //  return;
        
        //->where('username',$username)->where('email',$email)
        //$user_count =       ->where('email',$email)
        //      ->count();

            //該当ユーザーがいれば
            if($user_count>0){

                //ユーザーの特定
                //$user=Model_User::find('first',array(
                //  'where'=>array('email'=>$email)));

                //ワンタイムパスワードの作成
                $onepass=md5(time());
                //ワンタイムパスワードの保存
                //$user->onepass=$onepass;

                //$user->save();
                //上書き
                //UPDATE テーブル名 SET カラム名=`値`[, カラム名=`値`, ... ] WHERE 条件式;
                $user_count = DB::query('UPDATE users SET onepass ="'.$onepass.'" where email="'.$email.'"')->execute();

                //送信データの整理
                $data['onepass']=$onepass;
                $data['username']=$username;
                $data['email']=$email;
                $data['anchor']='user/login/repass/'.$onepass;
                $body=View::forge('user/email/repass',$data);

                //Eメールのインスタンス化
                $sendmail=Email::forge();
                //メール情報の設定
                $sendmail->from('endo@hoge.co.jp','ローカルテスト');
                $sendmail->to($email,$username);
                $sendmail->subject('パスワードの再発行');
                $sendmail->html_body($body);
                //メールの送信
                $sendmail->send();

                //再発行案内ページへ移動
                //return Model_User::theme('template','user/login/repass-info');
                 $view=View::forge('user/login/repass-info');
                return $view;

            //該当ユーザーがいなければ
            }else{
                //エラー表示
                 Session::set_flash('error', '該当者がいません。');
            }
        }
        //テーマの表示
        //return Model_User::theme('template','user/login/apply');

        $view=View::forge('user/login/apply');
        return $view;

     }
 
     
//パスワードの再発行
 public function action_repass($onepass){
     
     
     
     $result = DB::query('SELECT count(*) FROM users where onepass="'.$onepass.'"')->execute()->as_array();
     $count = $result[0]['count(*)'];
     
     //ワンタイムパスワードが一致しなければ
    //    if(Model_User::find()->where('onepass',$onepass)->count()==0){
    //        
    //        //再発行手続き中止ページへ移動
    //         Response::redirect('user/login/without');
    //         
    //    }
     
     //$count = 0;
     
     
     
     if($count == "0"){
         //再発行手続き中止ページへ移動
         //Response::redirect('user/login/without');
          $view = View::forge('user/login/without');
          return $view;
     }
//     \Fuel\Core\Debug::dump($count);
//     return;
//     echo($onepass);
//     return $view;

   //POST送信なら
   if(Input::method() == 'POST'){
//     echo($onepass);
//     return ;
//        //バリデーションの初期化
//        $val = Model_User::validate('repass');
//        $val->add_field('email', 'Eメール', 'required|valid_email');
        
        //バリデーションOKなら
//        if($val->run()){
            //ユーザー情報の取得
            $Model = new Model_User();
            $user= $Model::find('first',array(
            'where'=>array('onepass'=>$onepass)));
            //'where'=>array('id'=>'1')));
            
//             print_r($user);
//             return;
            //受信データの整理
            $username=Input::post('username');
            
            $email=Input::post('email');
            $password=Input::post('password');
            
            //ユーザー名もメールアドレスも一致すれば
            if($email==$user['email']){
            
                //if($email==$user['email']){
                //
                    //ワンタイムパスワードの変更
                    $user->onepass=md5(time());
                    $user->save();


                    //パスワードの変更
                    $auth=Auth::instance();
                    //一旦パスワードをリセット
                    $old=$auth->reset_password($username);
                    //再度ユーザー申告のパスワードに変更
                    $auth->change_password($old,$password,$username);
                    
                    //ログインページへ移動
                    //$view = View::forge('user/index');
                    
                    $view = View::forge('user/login/passchangeok');
                    //Response::redirect('user/index');
                    return $view;
                    
                    //該当者がいなければ
//                }else{
//                    //エラー表示
//                    Session::set_flash('error', '該当者がいません。');
//                }
            
            }
//        //バリデーションNGなら
//        Session::set_flash('error', "<p>".$val->show_errors()."</p>");
    }
        //return Model_User::theme('template','user/login/repass');
        //テーマの表示
        $view = View::forge('user/login/repass');
        return $view;
        
    }
 
 }