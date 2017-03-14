<?php
/* Smarty version 3.1.30, created on 2017-03-11 19:53:34
  from "E:\domains\homeworks\SMARTY\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c42b8ebc0ea9_52695307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1457145f699b6609901a07b5c3ff1001a6a52474' => 
    array (
      0 => 'E:\\domains\\homeworks\\SMARTY\\templates\\index.tpl',
      1 => 1489250940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:log.tpl' => 1,
  ),
),false)) {
function content_58c42b8ebc0ea9_52695307 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'login') {?>
        <?php $_smarty_tpl->_subTemplateRender("file:log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php }?>
</div><!-- /.container -->

</body>
</html>
<?php }
}
