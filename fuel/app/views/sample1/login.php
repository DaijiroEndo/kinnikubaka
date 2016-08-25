<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>ログイン</title>
</head>
<body>
<form name="form1" method="post" action="">
<?php echo $login_error?>
 <table width="100%" border="1">
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
</body>
</html>