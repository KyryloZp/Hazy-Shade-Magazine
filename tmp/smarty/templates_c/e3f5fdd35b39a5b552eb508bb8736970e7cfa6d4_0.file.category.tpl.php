<?php
/* Smarty version 3.1.33, created on 2019-08-11 14:17:27
  from 'W:\domains\magazine\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4ff947bf7fc1_80191300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3f5fdd35b39a5b552eb508bb8736970e7cfa6d4' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\category.tpl',
      1 => 1565522246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4ff947bf7fc1_80191300 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section class="category container">
        <div class="category_content">
            <div class="category_title">
                <h2 class="h2"><?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h2>
                <p class="subtittle_small">All products.</p>
            </div>
            <div class="category_selected"><select class="category_selected-category">
                <option value="<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['id'];?>
" selected>All categories</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item');
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
            </select><select class="category_selected-price">
                <option value="0-1" selected>All Prices</option>
                <option value="20-30">20-30</option>
                <option value="30-50">30-50</option>
                <option value="50-100">50-100</option>
            </select><select class="category_selected-size">
                <option value="0" selected>All sizes</option>
            </select></div>
            <div class="category_products">
                <?php if ($_smarty_tpl->tpl_vars['rsProducts']->value) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <div class="category_item" id="itemCat_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <a class="category_item-link" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                        <img class="category_item-img" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" /></a>
                        <a class="category_item-link" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                            <div class="category_item-title">
                                <p class="category_item-name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                                <p class="category_item-cost">€ <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</p>
                            </div>
                        </a>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                    <h2 class="subtittle_small" style="text-align:center;width:100%;margin-bottom:100px;">No product on this category.</p>
                    <?php }?>

                    <div class="category_item__null"></div>
                    <div class="category_item__null"></div>
                    <div class="category_item__null"></div>
                </div>
                <div class="category_last-title feedback">
                    <p class="subtittle">Check our lookbook</p>
                </div>
            </section>

            <template id="item-template">
                <div class="category_item" id="" >
                    <a class="category_item-link" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                        <img class="category_item-img" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" /></a>
                        <a class="category_item-link" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                            <div class="category_item-title">
                                <p class="category_item-name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                                <p class="category_item-cost">€ <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</p>
                            </div>
                        </a>
                    </div>
                </template><?php }
}
