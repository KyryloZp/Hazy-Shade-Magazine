<?php
/* Smarty version 3.1.33, created on 2019-08-08 18:09:05
  from 'W:\domains\magazine\views\default\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4c3b116117e1_54626108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa94eab6043a4b93ef3526a66471d8f91b088eff' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\account.tpl',
      1 => 1565276943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4c3b116117e1_54626108 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section class="account container">
        <div class="account_content">
            <div class="account_page-title">
                <h2 class="account_title h2">Hi Michal,</br>this is your Order history</h2>
            </div>
            <div class="account_edit"><a href="/editaccount/" class="button_account-edit">edit your account</a></div>
            <div class="account_order-history">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <div class="account_history-line">
                    <p class="account_order-number">order no</p>
                    <p class="account_order-date">order date</p>
                    <p class="account_products">products</p>
                    <p class="account_order-status">status</p>
                    <p class="account_ship-date">ship date</p>
                    <p class="account_total-amount">total amount</p>
                </div>
                <div class="account_history-line">
                    <p class="account_order-number">#<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</p>
                    <p class="account_order-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</p>
                    <div class="account_product-column">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                        <div class="account_products">
                            <div class="account_product-img"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="#" /></div>
                            <div class="account_product-description"><a class="account_product-name" href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
                                <p class="account_product-ref">Ref. <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</p>
                            </div>
                        </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <p class="account_order-status">open</p>
                    <p class="account_ship-date">22/05/2014</p>
                    <p class="account_total-amount"><?php echo $_smarty_tpl->tpl_vars['item']->value['full_price'];?>
</p>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="account_more-history"><button class="button_account-history">Show me more items</button></div>
        </div>
    </section><?php }
}
