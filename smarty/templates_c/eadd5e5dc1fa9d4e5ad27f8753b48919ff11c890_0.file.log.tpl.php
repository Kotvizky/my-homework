<?php
/* Smarty version 3.1.30, created on 2017-03-13 15:04:00
  from "E:\domains\homeworks\smarty\templates\log.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c68ab0327e08_93728635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eadd5e5dc1fa9d4e5ad27f8753b48919ff11c890' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\log.tpl',
      1 => 1489406629,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c68ab0327e08_93728635 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-container">
    <form class="form-horizontal" action="http://homeworks/homework3.php"   method="POST" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text"  name = "login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password"   name = "password"  class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-lg-offset-2 col-sm-10 col-lg-10">
                <button type="submit" class="btn btn-default">Войти</button>
                <br><br>
                Нет аккаунта? <a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['reg'];?>
">Зарегистрируйтесь</a>
            </div>
        </div>
    </form>
</div>
<?php }
}
