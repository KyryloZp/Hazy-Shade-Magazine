<?php
/* Smarty version 3.1.33, created on 2019-08-05 20:29:55
  from 'W:\domains\magazine\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d486793200737_35407189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34ef7222a21b51945dedfa5a75db3274f48cd4bd' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\product.tpl',
      1 => 1565008663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d486793200737_35407189 (Smarty_Internal_Template $_smarty_tpl) {
?>    <secion class="details container">
        <div class="details_image-container">
            <div class="details_image-slider">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCatalog_img']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"> 
                    <img class="details_image__img" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" alt="" />
                </a>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <div class="details_content">
            <h2 class="h2"><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h2>
            <p class="details_article">Article number: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
</p>
            <p class="details_cost">€ <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
</p>
            <p class="details_description"><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
            <div class="details_size-block">
                <span class="details_size-descr">Size</span>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsSize']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <div class="details_size-value"><input class="details_radio" type="radio" id="size-<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" name="size" value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" /><label for="size-<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"></label></div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="details_button-container"><button class="addToCart button_mail" id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить товар в корзину">add to cart</button></div>
        </div>
        <div class="details_bottom-line">
            <p class="subtittle">You may also like</p>
        </div>
    </secion><?php }
}
