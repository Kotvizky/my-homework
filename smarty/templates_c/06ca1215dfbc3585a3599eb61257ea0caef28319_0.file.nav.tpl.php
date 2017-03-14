<?php
/* Smarty version 3.1.30, created on 2017-03-14 10:16:54
  from "E:\domains\homeworks\smarty\templates\nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c798e66386d2_49734781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06ca1215dfbc3585a3599eb61257ea0caef28319' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\nav.tpl',
      1 => 1489475808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c798e66386d2_49734781 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" data-action = "<?php if ($_smarty_tpl->tpl_vars['menuAction']->value != '') {
echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['menuAction']->value;
} else {
echo $_smarty_tpl->tpl_vars['homepage']->value;
}?>">
            <ul id="main-menu" class="nav navbar-nav">
                <li ><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
">Авторизация</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['reg'];?>
">Регистрация</a></li>
                <?php if ($_smarty_tpl->tpl_vars['login']->value != '') {?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['prof'];?>
">Профиль</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['user'];?>
">Пользователи</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['file'];?>
">Файлы</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=<?php echo $_smarty_tpl->tpl_vars['linkAction']->value['logoff'];?>
">Выход</a></li>
                <?php }?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php }
}
