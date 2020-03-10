    <section class="category container">
        <div class="category_content">
            <div class="category_title">
                <h2 class="h2">{$rsCategory['name']}</h2>
                <p class="subtittle_small">All products.</p>
            </div>
            <div class="category_selected"><select class="category_selected-category">
                <option value="{$rsCategory['id']}" selected>All categories</option>
                {foreach $rsChildCats as $item}
                <option value="{$item['id']}">{$item['name']}</option>
                {/foreach}
            </select><select class="category_selected-price">
                <option value="0-1" selected>All Prices</option>
                <option value="20-30">20-30</option>
                <option value="30-50">30-50</option>
                <option value="50-100">50-100</option>
            </select><select class="category_selected-size">
                <option value="0" selected>All sizes</option>
            </select></div>
            <div class="category_products">
                {if $rsProducts}
                {foreach $rsProducts as $item name=products}
                <div class="category_item" id="itemCat_{$item['id']}">
                    <a class="category_item-link" href="/product/{$item['id']}/">
                        <img class="category_item-img" src="/images/products/{$item['image']}" alt="{$item['name']}" /></a>
                        <a class="category_item-link" href="/product/{$item['id']}/">
                            <div class="category_item-title">
                                <p class="category_item-name">{$item['name']}</p>
                                <p class="category_item-cost">€ {$item['price']}</p>
                            </div>
                        </a>
                    </div>
                    {/foreach}
                    {else}
                    <h2 class="subtittle_small" style="text-align:center;width:100%;margin-bottom:100px;">No product on this category.</p>
                    {/if}

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
                    <a class="category_item-link" href="/product/{$item['id']}/">
                        <img class="category_item-img" src="/images/products/{$item['image']}" alt="{$item['name']}" /></a>
                        <a class="category_item-link" href="/product/{$item['id']}/">
                            <div class="category_item-title">
                                <p class="category_item-name">{$item['name']}</p>
                                <p class="category_item-cost">€ {$item['price']}</p>
                            </div>
                        </a>
                    </div>
                </template>