    <section class="shoping-cart container">
        <div class="shoping-cart_content">
            <div class="shoping-cart_content">
                <div class="shoping-cart_title block_tittle">
                    <h2 class="h2">Your Shopping Bag</h2>
                    <p class="subtittle_small">Items reserved for limited time only</p>
                </div>
                <div class="shoping-cart_category">
                    <div class="shoping-cart_row">
                        <div class="shoping-cart_category-names shoping-cart_product-name">Product</div>
                        <div class="shoping-cart_category-names shoping-cart_Description">Description</div>
                        <div class="shoping-cart_category-names shoping-cart_color">color</div>
                        <div class="shoping-cart_category-names shoping-cart_size">size</div>
                        <div class="shoping-cart_category-names shoping-cart_qty">qty</div>
                        <div class="shoping-cart_category-names shoping-cart_amount">amount</div>
                    </div>
                </div>
                <div class="shoping-cart_product">
                    {if $itemsIds}
                    {foreach $rsProducts as $item name=products}
                    <div class="shoping-cart_row">
                        <div class="shoping-cart_pruduct-properties shoping-cart_product-name"><img class="shoping-cart_img" src="/images/products/{$item['image']}" alt="" /></div>
                        <div class="shoping-cart_pruduct-properties shoping-cart_Description"><a class="shoping-cart_product-link" href="/product/{$item['id']}/">{$item['name']}</a><span class="shoping-cart_subtitle">Ref. {$item['id']}</span></div>
                        <div class="shoping-cart_pruduct-properties shoping-cart_color"><span class="shoping-cart_text-box">one color</span></div>
                        <div class="shoping-cart_pruduct-properties shoping-cart_size"><span class="shoping-cart_text-box">{$productSize[{$item['id']}]}</span></div>
                        <div class="shoping-cart_pruduct-properties shoping-cart_qty"><input class="shoping-cart_text-box" type="text" value="1" name="itemsCnt_{$item['id']}" readonly  />
                            <div class="shoping-cart_qty-buttons"><button class="button_qty-plus" onclick="addItemCnt(event); conversionPrice(event); return false">+</button><button class="button_qty-minus" onclick="minusItemCnt(event); conversionPrice(event); return false">-</button></div>
                        </div>
                        <div class="shoping-cart_pruduct-properties shoping-cart_amount"><span class="shoping-cart_amount-content" data-value ="{$item['price']}">{$item['price']}</span><button class="button_cart_delete">x</button></div>
                    </div>
                </div>
                {/foreach}
                {/if}
                <div class="shoping-cart_subtotal"> <span class="shoping-cart_subtotal-content">Subtotal:</span><span class="shoping-cart_subtotal-cost">{$rsSessionPrice}</span></div>
                <div class="shoping-cart_bottom-line"><a class="shoping-cart_continue" href="#">Continue Shopping</a><button class="order-now button_main" onclick="addToOrder(); return false;">Order now</button></div>
            </div>
        </div>
        <div class="shoping-cart_bottom-line__shape"><object type="image/svg+xml" data="images/shape.svg"></object></div>
        <div class="shoping-cart_form">
            <div class="shoping-cart_title block_tittle">
                <h2 class="h2">Shipping address</h2>
                <p class="subtittle_small">All fields are required</p>
            </div>
            <div class="shoping-cart_form-container">
                <form class="shoping-cart_billing-form">
                    <div class="shoping-cart_form-container">
                        <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">Select delivery method</span><select class="shoping-cart_method-delivery shoping-cart_input">
                            <option>DHL International - €15,00</option>
                            <option>UA International - €30,00</option>
                        </select></div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">First name</span><input class="shoping-cart_input__first-name shoping-cart_input" type="text" value="{$rsUser['name']}" name="name" /></div>
                        </div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">Last name</span><input class="shoping-cart_input__last-name shoping-cart_input" type="text" value="{$rsUser['second-name']}"  name="second-name"/></div>
                        </div>
                        <div class="shoping-cart_input-container">
                            <p class="shoping-cart_form-name">Address <span class="shoping-cart_form-name__descr">(line 1)</span></p><input class="shoping-cart_input__Address-line1 shoping-cart_input" type="text" value="{$rsUser['adress']}" name="adress"/>
                        </div>
                        <div class="shoping-cart_input-container">
                            <p class="shoping-cart_form-name">Address <span class="shoping-cart_form-name__descr">(line 2)</span></p><input class="shoping-cart_input__Address-line1 shoping-cart_input" type="text" />
                        </div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">City</span><input class="shoping-cart_input__city shoping-cart_input" type="text" value="{$rsUser['city']}" name="city" /></div>
                        </div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">Postal code</span><input class="shoping-cart_input__postal-code shoping-cart_input" type="text" value="{$rsUser['zip-code']}" name="zip-code" /></div>
                        </div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">Phone number</span><input class="shoping-cart_input__phone-number shoping-cart_input" type="text" value="{$rsUser['phone']}" name="phone" /></div>
                        </div>
                        <div class="shoping-cart_input-coloumn">
                            <div class="shoping-cart_input-container"><span class="shoping-cart_form-name">e-mail</span><input class="shoping-cart_input__e-mail shoping-cart_input" type="e-mail" value="{$rsUser['email']}" name="email" /></div>
                        </div>
                    </div>
                    <div class="shoping-cart_billing-check"><input type="checkbox" id="billing-check" name="scales" /><label for="billing-check">Use this address for Billing</label></div>
                    <div class="shoping-cart_form-button"><button class="order-now button_main" onclick="saveOrder(); return false;">Order now</button></div>
                </form>
            </div>
        </div>
    </section>