<?php
/* Smarty version 3.1.30, created on 2017-03-14 14:00:38
  from "E:\domains\homeworks\smarty\templates\file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7cd5665c450_39345859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eef7942b8bbf12edebe275ebbd7efa3385688ab' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\file.tpl',
      1 => 1489489232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c7cd5665c450_39345859 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из списка файлов</h2>
<table class="table table-bordered">
    <tr>
        <th>Название файла</th>
        <th>Фотография</th>
        <th>Действия</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fileTable']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
        <td><img width="200" height="200" src="<?php echo $_smarty_tpl->tpl_vars['photos']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" alt=""></td>
        <td>
            <a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=delphoto&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
">Удалить аватарку пользователя</a>
        </td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<?php }
}
