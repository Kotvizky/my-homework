<?php
/* Smarty version 3.1.30, created on 2017-03-11 19:53:34
  from "E:\domains\homeworks\SMARTY\templates\log.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c42b8ebfd312_09989761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc220f6bbecaddd75fd08408a2e2532e6ccada9f' => 
    array (
      0 => 'E:\\domains\\homeworks\\SMARTY\\templates\\log.tpl',
      1 => 1489250699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c42b8ebfd312_09989761 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-container">
    <form class="form-horizontal" action="">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Войти</button>
                <br><br>
                Нет аккаунта? <a href="reg.html">Зарегистрируйтесь</a>
            </div>
        </div>
    </form>
</div>
<?php }
}
