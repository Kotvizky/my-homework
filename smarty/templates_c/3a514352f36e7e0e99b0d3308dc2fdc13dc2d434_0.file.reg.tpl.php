<?php
/* Smarty version 3.1.30, created on 2017-03-13 15:38:35
  from "E:\domains\homeworks\smarty\templates\reg.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c692cb5e73e0_85905774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a514352f36e7e0e99b0d3308dc2fdc13dc2d434' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\reg.tpl',
      1 => 1489408703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c692cb5e73e0_85905774 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-container">
    <form class="form-horizontal"  method="POST" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name = "password1" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
                <input type="password" name = "password2" class="form-control" id="inputPassword4" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                <br><br>
                Зарегистрированы? <a href=<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
>Авторизируйтесь</a>
            </div>
        </div>
    </form>
</div>
<?php }
}
