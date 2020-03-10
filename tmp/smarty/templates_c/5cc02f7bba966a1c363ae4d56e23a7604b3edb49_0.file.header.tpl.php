<?php
/* Smarty version 3.1.33, created on 2019-08-11 15:20:43
  from 'W:\domains\magazine\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d50081bab4378_35286500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cc02f7bba966a1c363ae4d56e23a7604b3edb49' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\header.tpl',
      1 => 1565526041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d50081bab4378_35286500 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header class="main-header">
        <nav class="main-nav">
            <div class="main-nav_line container">
                <div class="main-nav_logo">
                    <div class="top_logo"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/top-logo.png" alt="Shade of spring magazine logo" /></div>
                </div>
                <div class="main-nav_menu-list">
                    <ul class="main-nav_list">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li><a class="main-nav_list-item" href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <li><a class="main-nav_list-item" href="/about/">About</a></li>
                    </ul>
                    <div class="main-nav_icon"><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span></div>
                </div>
                <div class="main-nav_account-buttons">
                    <ul class="main-nav_list-account">
                        <li class="main-nav_list-item__user" id="main-nav_login"><object type="images/svg+xml" data="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/author_man.svg" width="11" height="17"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/author_man.png" width="11" height="17" alt="image format png" /></object>
                            <?php if ($_smarty_tpl->tpl_vars['rsUser']->value) {?><a href="/account/" class="main-nav_sign">Hi, <?php echo $_smarty_tpl->tpl_vars['rsUser']->value['displayName'];?>
</a><a href="/user/logout/" class="main-nav_logout"> (logout)</a><?php } else { ?><p class="main-nav_authorize-text">Log In</p><?php }?>
                        </li>
                        <li class="main-nav_list-item__user" id="main-nav_basket"><object type="images/svg+xml" data="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/author_cart.svg" width="17" height="17"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/author_cart.png" width="17" height="17" alt="image format png" /></object>
                            <p class="main-nav_authorize-text">Basket (<span id="cartCntItems"><?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>0<?php }?></span>)</p>
                        </li>
                    </ul>
                    <div class="main-nav_login-container hidden">
                        <form class="main-nav_login-form">
                            <div class="main-nav_input-container"><label for="login">LogIn</label><input type="email" name="login" placeholder="email" id="login" /></div>
                            <div class="main-nav_input-container"><label for="login">Password</label><input type="password" name="password" placeholder="password" id="password" /></div>
                        </form>
                        <button class="main-nav_login" onclick="login();">LogIn</button>
                        <a href="/createaccount/">not yet registered?</a>
                    </div>
                    <div class="main-nav_basket hidden">
                        <div class="main-nav_basket-container">
                            <ul class="main-nav_basket-list">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsSession']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <li class="main-nav_basket-item" data-id ="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                    <img class="main-nav_basket-image" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="" />
                                    <p class="main-nav_basket-name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                                    <p class="main-nav_basket-cost"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</p>
                                    <button class="button_basket-delete" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">x</button>
                                </li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                            <div class="main-nav_basket-bottom">
                                <p class="main-nav_basket-subtotal">Subtotal
                                    <span class="main-nav_basket-subtotal__cost"><?php echo $_smarty_tpl->tpl_vars['rsSessionPrice']->value;?>
</span>
                                </p><a href="/cart/" class="chekout button_mail">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-nav_search"><input class="main-nav_search-area" type="search" name="search" placeholder="Search something..." /><button class="button_search"><object type="images/svg+xml" data="images/nav-loop.svg" width="16px" height="16px"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/nav-loop.png" width="17" height="17" alt="image format png" /></object></button></div>
            </div>
            <div class="main-nav_mobile-menu">
                <ul class="main-nav_mobile-list">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                  <li><a class="main-nav_list-item" href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <li><a class="main-nav_list-item" href="/about/">About</a></li>
              </ul>
          </div>
      </nav>
  </header>
  <template class="main-nav_basket-template">
    <li class="main-nav_basket-item" data-id ="">
        <img class="main-nav_basket-image" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/author_man.svg" alt="" />
        <p class="main-nav_basket-name">FLORAL PLIMSOLL</p>
        <p class="main-nav_basket-cost">€99,95</p>
        <button class="button_basket-delete" onclick="">x</button>
    </li>
</template>
<template class="main-nav_account-template">
    <a href="/account/" class="main-nav_sign">Hi,</a>
    <a href="/user/logout/" class="main-nav_logout"> (logout)</a>
</template><?php }
}
