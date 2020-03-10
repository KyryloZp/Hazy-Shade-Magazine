            <nav class="category_breadcrumb breadcrumb container">
                <ul class="details_nav-list breadcrumb-list">
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/">Home</a></li>
                    {if $rsProduct}
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/{$rsParentCategory['id']}/">{$rsParentCategory['name']}</a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/{$rsCategoryProduct['id']}/">{$rsCategoryProduct['name']}</a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/product/{$rsProduct['id']}/">{$rsProduct['name']}</a></li>
                    {elseif $rsCategory['parent_id'] != 0}
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/{$rsCategory['parent_id']}/">
                    {foreach $rsCategories as $item}{if $item['id'] == $rsCategory['parent_id']}{$item['name']}{/if}{/foreach}
                    </a></li>
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/{$rsCategory['id']}/">{$rsCategory['name']}</a></li>
                    {else}
                    <li class="details_nav-item breadcrumb-item"><a class="details_nav-link breadcrumb-link" href="/category/{$rsCategory['id']}/">{$rsCategory['name']}</a></li>
                    {/if}
                </ul>
            </nav>