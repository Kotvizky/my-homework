<?php
/* Smarty version 3.1.30, created on 2017-03-14 13:24:10
  from "E:\domains\homeworks\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7c4ca1e0a73_86114545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdab157d953dc8f328df755be96db18a1f0a5ac3' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\index.tpl',
      1 => 1489487047,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:warn.tpl' => 1,
    'file:reg.tpl' => 1,
    'file:users.tpl' => 1,
    'file:prof.tpl' => 1,
    'file:file.tpl' => 1,
    'file:log.tpl' => 1,
    'file:js.tpl' => 1,
  ),
),false)) {
function content_58c7c4ca1e0a73_86114545 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
    <?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php if ($_smarty_tpl->tpl_vars['warning']->value != '') {?> <?php $_smarty_tpl->_subTemplateRender("file:warn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
    <div class="container">
        <?php if ($_smarty_tpl->tpl_vars['indexAction']->value == 'reg') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:reg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php } elseif ($_smarty_tpl->tpl_vars['indexAction']->value == 'users') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php } elseif ($_smarty_tpl->tpl_vars['indexAction']->value == 'prof') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:prof.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php } elseif ($_smarty_tpl->tpl_vars['indexAction']->value == 'file') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:file.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender("file:log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php }?>
    </div><!-- /.container -->
    <?php $_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
