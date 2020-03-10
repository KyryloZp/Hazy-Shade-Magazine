    <secion class="details container">
        <div class="details_image-container">
            <div class="details_image-slider">
                {foreach $rsCatalog_img as $item}
                <a href="{$templateWebPath}images/{$item}"> 
                    <img class="details_image__img" src="/images/products/{$item}" alt="" />
                </a>
                {/foreach}
            </div>
        </div>
        <div class="details_content">
            <h2 class="h2">{$rsProduct['name']}</h2>
            <p class="details_article">Article number: {$rsProduct['id']}</p>
            <p class="details_cost">€ {$rsProduct['price']}</p>
            <p class="details_description">{$rsProduct['description']}</p>
            <div class="details_size-block">
                <span class="details_size-descr">Size</span>
                {foreach $rsSize as $item}
                <div class="details_size-value"><input class="details_radio" type="radio" id="size-{$item}" name="size" value="{$item}" /><label for="size-{$item}"></label></div>
                {/foreach}
            </div>
            <div class="details_button-container"><button class="addToCart button_mail" id="addCart_{$rsProduct['id']}" onclick="addToCart({$rsProduct['id']}); return false;" alt="Добавить товар в корзину">add to cart</button></div>
        </div>
        <div class="details_bottom-line">
            <p class="subtittle">You may also like</p>
        </div>
    </secion>