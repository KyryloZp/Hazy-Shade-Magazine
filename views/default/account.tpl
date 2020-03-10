    <section class="account container">
        <div class="account_content">
            <div class="account_page-title">
                <h2 class="account_title h2">Hi Michal,</br>this is your Order history</h2>
            </div>
            <div class="account_edit"><a href="/editaccount/" class="button_account-edit">edit your account</a></div>
            <div class="account_order-history">
                {foreach $rsUserOrders as $item}
                <div class="account_history-line">
                    <p class="account_order-number">order no</p>
                    <p class="account_order-date">order date</p>
                    <p class="account_products">products</p>
                    <p class="account_order-status">status</p>
                    <p class="account_ship-date">ship date</p>
                    <p class="account_total-amount">total amount</p>
                </div>
                <div class="account_history-line">
                    <p class="account_order-number">#{$item['id']}</p>
                    <p class="account_order-date">{$item['date_created']}</p>
                    <div class="account_product-column">
                        {foreach $item['children'] as $product}
                        <div class="account_products">
                            <div class="account_product-img"><img src="{$templateWebPath}images/{$product['image']}" alt="#" /></div>
                            <div class="account_product-description"><a class="account_product-name" href="/product/{$product['product_id']}/">{$product['name']}</a>
                                <p class="account_product-ref">Ref. {$product['id']}</p>
                            </div>
                        </div>
                        {/foreach}
                    </div>
                    <p class="account_order-status">open</p>
                    <p class="account_ship-date">22/05/2014</p>
                    <p class="account_total-amount">{$item['full_price']}</p>
                </div>
                {/foreach}
            </div>
            <div class="account_more-history"><button class="button_account-history">Show me more items</button></div>
        </div>
    </section>