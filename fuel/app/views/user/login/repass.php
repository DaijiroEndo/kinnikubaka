
<!-- 16 -->
<div class="row">
 <div class="span7 offset2 hero-unit">
 <h2 style="text-align:center">
     <?php
     /** echo Asset::img('winlogo.png'); */
     ?>
 </h2><br>
 <p>パスワードの再発行を行いますので、新しいパスワードを入力して下さい。</p>
 <?php echo Form::open(array('name'=>'repass','method'=>'post','class'=>'form-horizontal')); ?>
 <?php echo '<div class="alert-error"><p>'.Session::get_flash('error').'</p></div>'?>
 

 

 <div class="control-group">
 <label class="control-label" for="username">お名前 </label>
 <div class="controls">
 <?php 
 echo Form::input('username',Input::post('username'));
 ?>
 </div>
  
 </div>
 <div class="control-group">
 <label class="control-label" for="email">登録メールアドレス</label>
 <div class="controls">
 <?php 
 echo Form::input('email',Input::post('email'));
 ?>
 </div>
 </div>
 
 
 <div class="control-group">
 <label class="control-label" for="password">新しいパスワード</label>
 <div class="controls">
 <?php echo Form::password('password',Input::post('password'));?>
 </div>
 <?php echo Session::get_flash('na');?>
 </div>
 <?php echo Form::submit('submit','パスワードの再発行',array('class' => 'btn btn-primary btn-large span7'));?>
 <?php echo Form::close();?>
 </div><!--/span7 offset2-->
 </div><!--/row-->
 

