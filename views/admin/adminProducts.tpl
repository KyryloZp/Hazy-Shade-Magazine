<h2>{$pageTitle}</h2>
<table border="1" cellpadding="1" cellspacing="1" id="addProduct">
	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Главная категория</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Сохранить</th>
	</tr>
	<tr>
		<td>
			<input type="edit" id="newItemName" value="" name="itemName" />
		</td>
		<td>
			<input type="edit" id="newItemPrice" value="" name="itemPrice" />
		</td>
		<td>
			<select id="newItemParentCatId" name="mainCat">
				<option value="0">Главная категория</option>
				{foreach $rsCategories as $itemCat}
				<option value="{$itemCat['id']}">{$itemCat['name']}</option>
				{/foreach}
			</select>

		</td>
		<td>
			<select id="newItemCatId" name="itemCat">
				<option value="0">Подкатегории отсутствуют</option>
			</select>
		</td>
		<td>
			<textarea id="newItemDesc" name="itemDesc"></textarea>
		</td>
		<td>
			<input type="button" value="Сохранить" onclick="addProduct();" />
		</td>
	</tr>
</table>

<table border="1" cellspacing="1" cellpadding="1" id="editProduct">
	<caption>Редактировать товар</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Родительская категория</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Размеры</br>(Например: X,XS,XLL..)</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Изображение в галлерею</th>
		<th>Сохранить</th>
	</tr>
	{foreach $rsProducts as $item name=products}
	<tr>
		<td>{$smarty.foreach.products.iteration}</td>
		<td>{$item['id']}</td>
		<td>
			<input type="edit" name="itemName" id="itemName_{$item['id']}" value="{$item['name']}" />
		</td>
		<td>
			<input type="edit" name="itemPrice" id="itemPrice_{$item['id']}" value="{$item['price']}" />
		</td>
		<td>
			<select name="mainCat" id="itemParentCatId_{$item['id']}">
				<option value="0">Главная категория</option>
				{foreach $rsCategories as $itemParentCat}
				<option value="{$itemParentCat['id']}" {if $item['parent_id'] == $itemParentCat['id']} selected{/if}>{$itemParentCat['name']}</option>
				{/foreach}
			</select>
		</td>
		<td>
			<select name="itemCat" id="itemCatId_{$item['id']}">
				<option value="0">подкатегория категория</option>
				{foreach $rsAllCategories as $itemCat}
				{if $itemCat['id'] == $item['category_id']}
				{foreach $rsAllCategories as $rsCat}
				{if $itemCat['parent_id'] == $rsCat['parent_id']}
				<option value="{$rsCat['id']}" {if $item['category_id'] == $rsCat['id']} selected {/if}>{$rsCat['name']}</option>
				{/if}
				{/foreach}
				{/if}
				{/foreach}
			</select>
		</td>
		<td>
			<textarea name="itemDesc" id="itemDesc_{$item['id']}">
				{$item['description']}
			</textarea>
		</td>
		<td>
			<textarea name="itemSize" id="itemSize_{$item['id']}">
				{$item['size']}
			</textarea>
		</td>
		<td>
			<input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']==0} checked="checked" }{/if} name="itemStatus">
		</td>
		<td>
			{if $item['image']}
			<img src="/images/products/{$item['image']}" width="100" />
			{/if}
			<form action="/admin/upload/" method="post" enctype="multipart/form-data">
				<input type="file" name="filename" />
				<input type="hidden" name="itemId" value="{$item['id']}" />
				<input type="submit" value="Загрузить">
			</form>
		</td>
		<td>
			{if $item['catalog_img']}
			{assign var="charprice" value=","|explode:"{$item['catalog_img']}"}
			{foreach item=itemGallery from=$charprice name=itemGallery}
			<form action="/admin/deletegalleryimg/" method="post" enctype="multipart/form-data">
				<img src="/images/products/{$itemGallery}" width="100" />
				<input type="hidden" name="imgName" value="{$itemGallery}" />
				<input type="hidden" name="itemId" value="{$item['id']}" />
				<input type="submit" value="Удалить">
			</form>
			{/foreach}
			{/if}
			<form action="/admin/uploadgallery/" method="post" enctype="multipart/form-data">
				<input type="file" name="filename" />
				<input type="hidden" name="itemId" value="{$item['id']}" />
				<input type="submit" value="Загрузить">
			</form>
		</td>
		<td>
			<input type="button" value="Сохранить" onclick="updateProduct({$item['id']});" />
			<input type="button" value="Удалить товар" onclick="deleteProduct({$item['id']});" />
		</td>
	</tr>
	{/foreach}
</table>