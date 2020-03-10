
    <section class="first-screen container">
        <div class="first-screen_title-container">
            <h1 class="h1">Hazy Shade of spring</h1>
            <p class="first-screen_main-subtittle subtittle"> Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo.</p><button class="button_checkArrivals">check new arrivals</button>
        </div>
        <div class="first-screen_plate">
            <div class="plate">
                {foreach $rsProducts as $item name=products}
                <div class="plate_item">
                    <p class="plate_title">{$item['name']}</p>
                    <p class="plate_subtitle">€ {$item['price']}</p>
                    <a href="/product/{$item['id']}/" class="button_plate"/>More...</a>
                    <img class="plate-img" src="/images/products/{$item['image']}" alt="" />
                </div>
                {/foreach}
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
