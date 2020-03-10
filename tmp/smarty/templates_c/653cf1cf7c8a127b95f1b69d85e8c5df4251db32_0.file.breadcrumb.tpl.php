<?php
/* Smarty version 3.1.33, created on 2019-08-11 13:13:55
  from 'W:\domains\magazine\views\default\breadcrumb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4fea6370df82_36729264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '653cf1cf7c8a127b95f1b69d85e8c5df4251db32' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\breadcrumb.tpl',
      1 => 1565518432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4fea6370df82_36729264 (Smarty_Internal_Template $_smarty_tpl) {
?>            <nav class="category_breadcrumb breadcrumb container">
                <ul class="details_nav-list breadcrumb-list">
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/">Home</a></li>
                    <?php if ($_smarty_tpl->tpl_vars['rsProduct']->value) {?>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/<?php echo $_smarty_tpl->tpl_vars['rsParentCategory']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['rsParentCategory']->value['name'];?>
</a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/<?php echo $_smarty_tpl->tpl_vars['rsCategoryProduct']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['rsCategoryProduct']->value['name'];?>
</a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/product/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</a></li>
                    <?php } elseif ($_smarty_tpl->tpl_vars['rsCategory']->value['parent_id'] != 0) {?>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['parent_id'];?>
/">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
if ($_smarty_tpl->tpl_vars['item']->value['id'] == $_smarty_tpl->tpl_vars['rsCategory']->value['parent_id']) {
echo $_smarty_tpl->tpl_vars['item']->value['name'];
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</a></li>
                    <?php } else { ?>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</a></li>
                    <?php }?>
                </ul>
            </nav><?php }
}
