
<div class="row">
<div class="span6 offset3">
<h2 style="text-align:center">新規ユーザ登録</h2>
<?php echo Form::open(array('name'=>'create','method'=>'post','class'=>'form-horizontal')); ?>
<?php echo '<div class="alert-error">'.Session::get_flash('error').'</div>'?>
<div class="control-group">
 <label class="control-label" for="username">ユーザー名</label>
 <div class="controls">
 <?php echo Form::input('username',Input::post('username'));?>
 </div>
</div>
<div class="control-group">
<label class="control-label" for="email">Eメール</label>
<div class="controls">
<?php echo Form::input('email',Input::post('email'));?>
</div>
</div>
<div class="control-group">
<label class="control-label" for="password">パスワード</label>
<div class="controls">
<?php echo Form::password('password');?>
</div>
</div>
<div class="form-actions">
<?php echo Form::submit('submit','新規登録',array('class' => 'btn btn-primary span3'));?>
</div>
<?php //echo Form::hidden('group','-1');?>
<!--　hiddenでgroupの数値をPOSTするのは危険ですので削除します -->
<?php echo Form::close();?>
</div><!--/span4 offset2-->
</div><!--/row-->