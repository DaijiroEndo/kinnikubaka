<!-- 12 -->
<?=$header?>

<h2><?php echo $username;?> 様</h2>
<p>パスワード再発行の依頼をお受けいたしました。
下記のリンクをクリックして、新しいパスワードを作成して下さい。</p>
<p><?php echo Html::anchor($anchor,'パスワードの再発行')?></p>
<p>WinRoad徒然草ユーザーによりパスワードの紛失手続きが取られましたので、
このメールを発行いたしました。
これは新しいパスワードを作成する手続きの一部です。
もしあなたが新しいパスワードの発行を依頼していないのであれば、
このメールを無視して下さい。
以前のパスワードのままでご利用になれます。</p>
<p>ありがとうございました。</p>

<?=$footer?>
