<?php
/* Smarty version 3.1.30, created on 2017-03-14 13:51:49
  from "E:\domains\homeworks\smarty\templates\users.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7cb457ded16_35159793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '812390ebcedd5e4a5485c93d9c39efe8f560b665' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\users.tpl',
      1 => 1489488706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c7cb457ded16_35159793 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из базы данных</h2>
<table class="table table-bordered">
    <tr>
        <th>Пользователь(логин)</th>
        <th>Имя</th>
        <th>возраст</th>
        <th>описание</th>
        <th>Фотография</th>
        <th>Действия</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userTable']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['login'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>
</td>
            <td> <?php if ($_smarty_tpl->tpl_vars['v']->value['photo'] != '') {?>
                    <div class="form-group">
                        <img  width="200" height="200" src="<?php echo $_smarty_tpl->tpl_vars['photos']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
" alt="">
                    </div>
                <?php }?>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>
/?act=deluser&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">Удалить пользователя</a>
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
