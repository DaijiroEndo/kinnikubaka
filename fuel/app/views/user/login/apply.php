<!-- 8 -->

<div class="row">
 <div class="span7 offset2 hero-unit">
 <h2 style="text-align:center">
 
 <?php 
/* echo Asset::img('winlogo.png');*/
 ?>
 

 </h2><br>
 <p>パスワードの再発行手続きを行いますので、ご登録のEメールアドレスを入力して下さい。</p>
 <?php echo Form::open(array('name'=>'apply','method'=>'post','class'=>'form-horizontal')); ?>
 <?php echo '<div class="alert-error"><p>'.Session::get_flash('error').'</p></div>'?>

 <!--
 <div class="control-group">
 <label class="control-label" for="username">あなたのお名前</label>
 <div class="controls">
 
 <?php 
//echo Form::input('username',Input::post('username'));
 ?>
 -->

 </div>
 </div>
 <div class="control-group">
 <label class="control-label" for="email">メールアドレス</label>
 <div class="controls">
 <?php echo Form::input('email',Input::post('email'));?>
 </div>
 </div>
 <?php echo Form::submit('submit','再発行手続き',array('class' => 'btn btn-primary btn-large span7'));?>
 <?php echo Form::close();?>
 </div><!--/span7 offset2-->
 </div><!--/row-->
 