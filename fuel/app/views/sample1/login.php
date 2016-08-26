<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>ログイン</title>
</head>
<body>
<form name="form1" method="post" action="">
<h2>ログインページ</h2>

<?php echo $login_error?>
<br>
■ログイン
<table width="300" border="1">
 <tr>
 <th scope="row">ユーザー名</th>
 <td><label for="username"></label>
 <input name="username" type="text" id="username" value="<?=$username?>"></td>
 </tr>
 <tr>
 <th scope="row">パスワード</th>
 <td><label for="password"></label>
 <input type="password" name="password" id="password"></td>
 </tr>
 <tr>
 <th colspan="2" scope="row"><input type="submit" name="button" id="button" value="送信"></th>
 </tr>
 </table>
</form>
<br>
■新規登録はこちら
<p><a href="add_user">新規登録</a></p>

    
</body>
</html>