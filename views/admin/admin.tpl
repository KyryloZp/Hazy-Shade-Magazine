<div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" id="newCategoryName" value="" />
	<div class="select-block">
		<label for="generalCatId">Является подкатегорией для</label>
		<select name="generalCatId">
			<option value="0">Главная категория</option>
			{foreach $rsCategories as $item}
			<option value="{$item['id']}">{$item['name']}</option>
			{/foreach}
		</select>
	</div>
	<input type="button" onclick="newCategory();" value="Добавить категорию" />
</div>