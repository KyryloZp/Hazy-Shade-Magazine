<?php
/* Smarty version 3.1.33, created on 2019-08-07 11:11:56
  from 'W:\domains\magazine\views\admin\adminProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4a87cc39fca8_86908296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b4dfd251878c3a13cb054da211b64fd8b2487ba' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\admin\\adminProducts.tpl',
      1 => 1565164798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4a87cc39fca8_86908296 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h2>
<table border="1" cellpadding="1" cellspacing="1" id="addProduct">
	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Главная категория</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Сохранить</th>
	</tr>
	<tr>
		<td>
			<input type="edit" id="newItemName" value="" name="itemName" />
		</td>
		<td>
			<input type="edit" id="newItemPrice" value="" name="itemPrice" />
		</td>
		<td>
			<select id="newItemParentCatId" name="mainCat">
				<option value="0">Главная категория</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>

		</td>
		<td>
			<select id="newItemCatId" name="itemCat">
				<option value="0">Подкатегории отсутствуют</option>
			</select>
		</td>
		<td>
			<textarea id="newItemDesc" name="itemDesc"></textarea>
		</td>
		<td>
			<input type="button" value="Сохранить" onclick="addProduct();" />
		</td>
	</tr>
</table>

<table border="1" cellspacing="1" cellpadding="1" id="editProduct">
	<caption>Редактировать товар</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Родительская категория</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Размеры</br>(Например: X,XS,XLL..)</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Изображение в галлерею</th>
		<th>Сохранить</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
	<tr>
		<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
		<td>
			<input type="edit" name="itemName" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
		</td>
		<td>
			<input type="edit" name="itemPrice" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
		</td>
		<td>
			<select name="mainCat" id="itemParentCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<option value="0">Главная категория</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemParentCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemParentCat']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['itemParentCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['itemParentCat']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['itemParentCat']->value['name'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</td>
		<td>
			<select name="itemCat" id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<option value="0">подкатегория категория</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsAllCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['id'] == $_smarty_tpl->tpl_vars['item']->value['category_id']) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsAllCategories']->value, 'rsCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rsCat']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['parent_id'] == $_smarty_tpl->tpl_vars['rsCat']->value['parent_id']) {?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['rsCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['rsCat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['rsCat']->value['name'];?>
</option>
				<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</td>
		<td>
			<textarea name="itemDesc" id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

			</textarea>
		</td>
		<td>
			<textarea name="itemSize" id="itemSize_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['item']->value['size'];?>

			</textarea>
		</td>
		<td>
			<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?> checked="checked" }<?php }?> name="itemStatus">
		</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
			<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" />
			<?php }?>
			<form action="/admin/upload/" method="post" enctype="multipart/form-data">
				<input type="file" name="filename" />
				<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
				<input type="submit" value="Загрузить">
			</form>
		</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['catalog_img']) {?>
			<?php $_smarty_tpl->_assignInScope('charprice', explode(",",((string)$_smarty_tpl->tpl_vars['item']->value['catalog_img'])));?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['charprice']->value, 'itemGallery', false, NULL, 'itemGallery', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemGallery']->value) {
?>
			<form action="/admin/deletegalleryimg/" method="post" enctype="multipart/form-data">
				<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['itemGallery']->value;?>
" width="100" />
				<input type="hidden" name="imgName" value="<?php echo $_smarty_tpl->tpl_vars['itemGallery']->value;?>
" />
				<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
				<input type="submit" value="Удалить">
			</form>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
			<form action="/admin/uploadgallery/" method="post" enctype="multipart/form-data">
				<input type="file" name="filename" />
				<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
				<input type="submit" value="Загрузить">
			</form>
		</td>
		<td>
			<input type="button" value="Сохранить" onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
			<input type="button" value="Удалить товар" onclick="deleteProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
		</td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
