<?php
class Controller_Sample1 extends Controller
{
public function action_index()
 {
 //認証していなかったら
 if(!Auth::check())
 {
 //ログインページへ移動
 Response::redirect('sample1/login');
 }else{
 //データベース接続
 $query = DB::select()->from('users')->execute();
 //ビュークラスのforgeメソッドの呼び出し
 $view=View::forge('sample1/index');
 //データベース情報の引き渡し
 $view->set_global('query',$query->as_array());
 //基本データのセット
 $view->set_global('title','WinRoad徒然草');
 $view->set_global('description','FuelPHPのテストサイトです');
 //ビューファイルのネスト
 $view->header=View::forge('sample1/header');
 $view->content=View::forge('sample1/content');
 $view->footer=View::forge('sample1/footer');
 return $view;
 }
 }
 
public function action_login()
 {
 $data = array();
  //認証が失敗したときの処理
    $data['username'] = '';
    $data['login_error'] = '';
    
 if ($_POST){
    // Authのインスタンス化
    $auth = Auth::instance();
    // 資格情報の確認
    if ($auth->login($_POST['username'],$_POST['password']))
    {
    // 認証OKならトップページへ
    Response::redirect('sample1/');
    }
    else
    {
    //認証が失敗したときの処理
    $data['username'] = $_POST['username'];
    $data['login_error'] = 'ユーザー名かパスワードが違います。再入力して下さい。';
    }
 }

// ログインフォームの表示
 echo View::forge('sample1/login',$data);
 }
 
 

public function action_add_user()
 {
 if ($_POST) {
 //POSTデータを受け取る
 $username=Input::post('username');
 $password=Input::post('password');
 $email=Input::post('email');
 // Authのインスタンス化
 $auth = Auth::instance();
 //ユーザー登録
 $auth->create_user($username,$password,$email);
 }
 
 // 登録フォームの表示
 echo View::forge('sample1/add_user');
 }
 
 public function action_logout()
 {
 //ログアウト
 Auth::logout();
 //ログアウト画面の表示
 echo View::forge('sample1/logout');
 }
 
 public function action_sendmail()
 {
 //インスタンスの作成
 $email=Email::forge();
 //メール情報の設定
 $email->from('d-endo@v-m.co.jp','wonderテスト');
 $email->to('daijiro.endo@gmail.com','遠藤様');
 $email->subject('テストメール');
 $email->body('これはテストメールです');
//メール送信
 $email->send();
 //メール送信後のビュー表示
 return Response::forge(View::forge('sample1/sendmail'));
 }
 
}