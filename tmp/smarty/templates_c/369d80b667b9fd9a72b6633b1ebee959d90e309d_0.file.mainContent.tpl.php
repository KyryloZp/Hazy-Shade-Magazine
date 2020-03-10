<?php
/* Smarty version 3.1.33, created on 2019-08-11 12:36:39
  from 'W:\domains\magazine\views\default\mainContent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4fe1a78e32b0_35811898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '369d80b667b9fd9a72b6633b1ebee959d90e309d' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\mainContent.tpl',
      1 => 1565516189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4fe1a78e32b0_35811898 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <section class="first-screen container">
        <div class="first-screen_title-container">
            <h1 class="h1">Hazy Shade of spring</h1>
            <p class="first-screen_main-subtittle subtittle"> Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo.</p><button class="button_checkArrivals">check new arrivals</button>
        </div>
        <div class="first-screen_plate">
            <div class="plate">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <div class="plate_item">
                    <p class="plate_title"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                    <p class="plate_subtitle">€ <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</p>
                    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="button_plate"/>More...</a>
                    <img class="plate-img" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="" />
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>
    <div class="first-screen_mail-subscription">
        <div class="first-screen_mail-title">
            <h2 class="h2">Hazy Shade of spring</h2>
            <p class="first-screen_mail-subtittle subtittle_small">Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo.</p>
        </div>
        <form class="first-screen_mail-form"><input class="first-screen_mail-input" type="email" placeholder="Your emeil" /><button class="button_mail" type="submit">add</button></form>
    </div>
<?php }
}
