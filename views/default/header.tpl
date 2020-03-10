    <header class="main-header">
        <nav class="main-nav">
            <div class="main-nav_line container">
                <div class="main-nav_logo">
                    <div class="top_logo"><img src="{$templateWebPath}images/top-logo.png" alt="Shade of spring magazine logo" /></div>
                </div>
                <div class="main-nav_menu-list">
                    <ul class="main-nav_list">
                        {foreach $rsCategories as $item}
                        <li><a class="main-nav_list-item" href="/category/{$item['id']}/">{$item['name']}</a></li>
                        {/foreach}
                        <li><a class="main-nav_list-item" href="/about/">About</a></li>
                    </ul>
                    <div class="main-nav_icon"><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span><span class="main-nav_icon-line"></span></div>
                </div>
                <div class="main-nav_account-buttons">
                    <ul class="main-nav_list-account">
                        <li class="main-nav_list-item__user" id="main-nav_login"><object type="images/svg+xml" data="{$templateWebPath}images/author_man.svg" width="11" height="17"><img src="{$templateWebPath}images/author_man.png" width="11" height="17" alt="image format png" /></object>
                            {if $rsUser}<a href="/account/" class="main-nav_sign">Hi, {$rsUser['displayName']}</a><a href="/user/logout/" class="main-nav_logout"> (logout)</a>{else}<p class="main-nav_authorize-text">Log In</p>{/if}
                        </li>
                        <li class="main-nav_list-item__user" id="main-nav_basket"><object type="images/svg+xml" data="{$templateWebPath}images/author_cart.svg" width="17" height="17"><img src="{$templateWebPath}images/author_cart.png" width="17" height="17" alt="image format png" /></object>
                            <p class="main-nav_authorize-text">Basket (<span id="cartCntItems">{if $cartCntItems > 0}{$cartCntItems}{else}0{/if}</span>)</p>
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
                                {foreach $rsSession as $item}
                                <li class="main-nav_basket-item" data-id ="{$item['id']}">
                                    <img class="main-nav_basket-image" src="/images/products/{$item['image']}" alt="" />
                                    <p class="main-nav_basket-name">{$item['name']}</p>
                                    <p class="main-nav_basket-cost">{$item['price']}</p>
                                    <button class="button_basket-delete" onclick="removeFromCart({$item['id']})">x</button>
                                </li>
                                {/foreach}
                            </ul>
                            <div class="main-nav_basket-bottom">
                                <p class="main-nav_basket-subtotal">Subtotal
                                    <span class="main-nav_basket-subtotal__cost">{$rsSessionPrice}</span>
                                </p><a href="/cart/" class="chekout button_mail">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-nav_search"><input class="main-nav_search-area" type="search" name="search" placeholder="Search something..." /><button class="button_search"><object type="images/svg+xml" data="images/nav-loop.svg" width="16px" height="16px"><img src="{$templateWebPath}images/nav-loop.png" width="17" height="17" alt="image format png" /></object></button></div>
            </div>
            <div class="main-nav_mobile-menu">
                <ul class="main-nav_mobile-list">
                  {foreach $rsCategories as $item}
                  <li><a class="main-nav_list-item" href="/category/{$item['id']}/">{$item['name']}</a></li>
                  {/foreach}
                  <li><a class="main-nav_list-item" href="/about/">About</a></li>
              </ul>
          </div>
      </nav>
  </header>
  <template class="main-nav_basket-template">
    <li class="main-nav_basket-item" data-id ="">
        <img class="main-nav_basket-image" src="{$templateWebPath}images/author_man.svg" alt="" />
        <p class="main-nav_basket-name">FLORAL PLIMSOLL</p>
        <p class="main-nav_basket-cost">€99,95</p>
        <button class="button_basket-delete" onclick="">x</button>
    </li>
</template>
<template class="main-nav_account-template">
    <a href="/account/" class="main-nav_sign">Hi,</a>
    <a href="/user/logout/" class="main-nav_logout"> (logout)</a>
</template>