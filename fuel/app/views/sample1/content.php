<div class="content">
<h2>ようこそ<?=Auth::get_screen_name()?>さん</h2>
<p><?=$description?></p>
<table width="400" border="1">
 <tr>
 <th scope="col">ID</th>
 <th scope="col">ユーザー名</th>
 </tr>
<?php foreach ($query as $row): ?>
 <tr>
 <td><?=$row['id']?></td>
 <td><?=$row['username']?></td>
 </tr>
<?php endforeach;?>
</table>
<p><a href="sample1/logout">ログアウト</a></p>
<p><a href="sample1/login">ログイン</a></p>

</div>