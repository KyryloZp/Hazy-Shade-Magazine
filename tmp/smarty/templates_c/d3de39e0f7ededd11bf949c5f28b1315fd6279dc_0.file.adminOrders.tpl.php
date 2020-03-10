<?php
/* Smarty version 3.1.33, created on 2019-08-05 22:39:15
  from 'W:\domains\magazine\views\admin\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4885e36ab3b5_05215058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3de39e0f7ededd11bf949c5f28b1315fd6279dc' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\admin\\adminOrders.tpl',
      1 => 1565033866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4885e36ab3b5_05215058 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
/Раздел Заказов</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
<p>Нет заказов</p>
<?php } else { ?>
<table border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th>№</th>
		<th>Действие</th>
		<th>ID заказа</th>
		<th width="110">Статус</th>
		<th>Дата создания</th>
		<th>Дата оплаты</th>
		<th>Дополнительная информация</th>
		<th>Дата изменения заказа</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
	<tr>
		<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
		<td><a href="#"  id="itemLink_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показать товар заказа</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
		<td>
			<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?> checked="checked" <?php }?> onclick="updateOrderStatus('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" /><span name="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?> Закрыто <?php } else { ?> Открыто <?php }?></span>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
		<td>
			<input type="text" id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
" />
			<input type="button" value="Сохранить" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" />
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
	</tr>
	<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
		<td colspan="8">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
			<table border="1" cellspacing="1" cellpadding="1" width="100%">
				<tr>
					<th>№</th>
					<th>ID</th>
					<th>Название</th>
					<th>Цена</th>
					<th>Количество</th>
				</tr>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
				<tr>
					<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
					<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
				</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</table>
			<?php }?>
		</td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }
}
}
