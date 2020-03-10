<?php
/* Smarty version 3.1.33, created on 2019-08-03 14:26:28
  from 'W:\domains\magazine\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d456f649b7060_43544279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0121edc63933f38ee004c41bf1a4986089d3b5ed' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\admin\\admin.tpl',
      1 => 1564831568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d456f649b7060_43544279 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" id="newCategoryName" value="" />
	<div class="select-block">
		<label for="generalCatId">Является подкатегорией для</label>
		<select name="generalCatId">
			<option value="0">Главная категория</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</select>
	</div>
	<input type="button" onclick="newCategory();" value="Добавить категорию" />
</div><?php }
}
