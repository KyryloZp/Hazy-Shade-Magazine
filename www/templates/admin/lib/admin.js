
/**
 * Получение дочерних категорий в соответствии с выбранной категорией в форме
 * добавления продуктов
 * 
 */
 $(document).ready(function() {
    $( "#newItemParentCatId" ).change(function(){
        $("#newItemCatId option").remove();
        $("#newItemParentCatId option[value='0']").remove();

        var postData = getData($( "#addProduct" ));

        $.ajax({
            type: 'POST',
            url: "/admin/selectproduct/",
            data: postData,
            dataType: 'json',
            success: function(data){
                var category = data['categories'];
                if (! category) {
                    $("#newItemCatId").append('<option value="0">Подкатегории отсутствуют</option>');
                }
                $.each(category, function(index, value){
                    $("#newItemCatId").append('<option value=' + value["id"] + '>' + value["name"] + '</option>');
                });
            }
        });

    });
});

/**
 * Получение дочерних категорий в соответствии с выбранной категорией в форме
 * редактирования продуктов
 * 
 */
 $(document).ready(function() {
    $('#editProduct select[name="mainCat"]').on('change',  function(event){
        const TARGET = event.target;
        var targetID = TARGET.getAttribute('id');
        targetID = targetID.split('_');

        var targetItem = $('#itemParentCatId_' + targetID[1]);
        var postData = {};
        postData[targetItem[0].name] = targetItem.val();

        $('#itemCatId_' + targetID[1] + ' option').remove();

        $.ajax({
            type: 'POST',
            url: "/admin/selectproduct/",
            data: postData,
            dataType: 'json',
            success: function(data){
                var category = data['categories'];
                if (! category) {
                    $('#itemCatId_' + targetID[1]).append('<option value="0">Подкатегории отсутствуют</option>');
                }
                $.each(category, function(index, value){
                    $('#itemCatId_' + targetID[1]).append('<option value=' + value["id"] + '>' + value["name"] + '</option>');
                });
            }
        });
    });
});

/**
 * Получить данные с формы
 * 
 */
 function getData(obj_form){
    var hData = {};
    var select = 0;
    $(obj_form).find('input, textarea, select').each(function(){
        if(this.name && this.name != ''){
            hData[this.name] = this.value;
        }
    });
    return hData;
}

/**
 * Добавление новой категории
 * 
 */
 function newCategory(){

    var postData = getData('#blockNewCategory');
    $.ajax({
        type: 'POST',
        url: "/admin/addnewcat/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (data['success']) {
                alert(data['message']);
                $('#newCategoryName').val('');
            } else{
                alert(data['message']);
            }
        }
    });

}

/**
 * Обновить категорию
 * @param  integer itemId ID категории
 * @return
 */
 function updateCat(itemId){
    var parentId = $('#parentId_' + itemId).val();
    var newName = $('#itemName_' + itemId).val();
    var postData = {itemId: itemId, parentId: parentId, newName: newName};

    $.ajax({
        type: 'POST',
        url: "/admin/updatecategory/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
        }
    });
}

/**
 * Добавить продукт
 */
 function addProduct(){
    var postData = getData('#addProduct');
    $.ajax({
        type: 'POST',
        url: "/admin/addproduct/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
            window.location.replace("http://magazine/admin/products/");
        }
    });

}

/**
 * Обновление информации продукта
 * @param  integer itemId ID товара
 * @return 
 */
 function updateProduct(itemId){

    var itemName = $('#itemName_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).val();
    var itemCatId = $('#itemCatId_' + itemId).val();
    var itemParentCatId = $('#itemParentCatId_' + itemId).val();
    var itemDesc = $('#itemDesc_' + itemId).val();
    var itemSize = $('#itemSize_' + itemId).val();
    var itemStatus = $('#itemStatus_' + itemId)[0].checked;

    if (! itemStatus) {
        itemStatus = 1;
    } else{
        itemStatus = 0;
    }

    var postData = {itemId: itemId, itemName: itemName, itemPrice: itemPrice,
        itemCatId: itemCatId, itemDesc: itemDesc, itemStatus: itemStatus, itemParentCatId: itemParentCatId, itemSize: itemSize};
        console.log(postData);
        $.ajax({
            type: 'POST',
            url: "/admin/updateproduct/",
            data: postData,
            dataType: 'json',
            success: function(data){
                alert(data['message']);
            }
        });
    }

/**
 * Отображение информации о купленном товаре на странице заказов
 * @param  integer id ID заказа
 * @return
 */
 function showProducts(id) {
    var objName = "#purchasesForOrderId_" + id;
    if ($(objName).css('display') != 'table-row') {
        $('#itemLink_' + id).html('Скрыть товар заказа');
        $(objName).show();
    } else {
        $('#itemLink_' + id).html('Показать товар заказа');
        $(objName).hide();
    }
}

/**
 * Обновление информации о статусе заказа
 * @param  {integer} itemId ID заказа
 * 
 */
 function updateOrderStatus(itemId){
    var status = $('#itemStatus_' + itemId)[0].checked;
    if(! status){
        status = 0;
        $('span[name="itemStatus_' + itemId + '"]').html('Открыто');
    } else {
        $('span[name="itemStatus_' + itemId + '"]').html('Закрыто');
        status = 1;
    }

    var postData = {itemId: itemId, status: status};

    $.ajax({
        type: 'POST',
        url: "/admin/setorderstatus/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (! data['success']) {
                alert(data['message']);
            }
        }
    });
}

/**
 * Обновить дату оплаты заказа
 * @param  integer itemId ID заказа
 * @return
 */
 function updateDatePayment(itemId){
    var datePayment = $('#datePayment_' + itemId).val();

    var postData = {itemId: itemId, datePayment: datePayment};

    $.ajax({
        type: 'POST',
        url: "/admin/setorderdatepayment/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (! data['success']) {
                alert(data['message']);
            }
        }
    });

}

/**
 * Удалить товар
 * @param  integer itemId удалить товар
 * @return
 */
 function deleteProduct(itemId) {
    var postData = {itemId: itemId};

    $.ajax({
        type: 'POST',
        url: "/admin/deleteproduct/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (data['success']) {
                alert(data['message']);
                window.location.replace("http://magazine/admin/products/");
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Удалить категорию
 * @param  integer itemId ID категории
 * @return
 */
 function deleteCat(itemId){

    var postData = {itemId: itemId};

    $.ajax({
        type: 'POST',
        url: "/admin/deletecategory/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
            window.location.replace("http://magazine/admin/category/");
        }
    });
}