<?php
/* Smarty version 3.1.30, created on 2017-03-14 13:45:16
  from "E:\domains\homeworks\smarty\templates\prof.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7c9bc10d414_24555186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29d6297ba098d1e45f21b4e9e5d7ca935e10b9e3' => 
    array (
      0 => 'E:\\domains\\homeworks\\smarty\\templates\\prof.tpl',
      1 => 1489488283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c7c9bc10d414_24555186 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-container">
    <form class="form-horizontal" name="profile" enctype="multipart/form-data"  method="POST" >
        <div class="form-group">
            <label class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <h3><?php echo $_smarty_tpl->tpl_vars['userProf']->value['login'];?>
<h3>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['userProf']->value['photo'] != '') {?>
        <div class="form-group">
            <img src="<?php echo $_smarty_tpl->tpl_vars['photos']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userProf']->value['photo'];?>
" alt="">
        </div>
        <?php }?>
        <div class="form-group">
            <label for="userName" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name = "userName" class="form-control" id="userName" value="<?php echo $_smarty_tpl->tpl_vars['userProf']->value['name'];?>
" placeholder="Имя">
            </div>
        </div>
        <div class="form-group">
            <label for="bdate" class="col-sm-2 control-label">Дата рождения</label>
            <div class="col-sm-10">
                <input type="date" name = "age" class="form-control" id="bdate" value="<?php echo $_smarty_tpl->tpl_vars['userProf']->value['age'];?>
" placeholder="Дата рождения">
            </div>
        </div>
        <div class="form-group">
            <label for="descr" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <textarea rows="3" cols="45" name = "description" class="form-control" id="descr" ><?php echo $_smarty_tpl->tpl_vars['userProf']->value['description'];?>
</textarea>
            </div>
        </div>
        <div class="form-group">
            
            
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
            <input type="file" name = "userFile" hidden>

            
            
                
            
        <div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Записать</button>
            </div>
        </div>
    </form>
</div><?php }
}
