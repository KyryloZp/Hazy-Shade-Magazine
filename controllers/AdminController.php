<?php 

/**
 * AdminController.php
 *
 * Контроллер бэкенда сайта (/admin/)
 * 
 */

 // подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemmplateAdminWebPath);

function indexAction($smarty){
    $rsCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function addnewcatAction(){

    $catName = $_POST['newCategoryName'];
    $catParentId = $_POST['generalCatId'];

    $res = insertCat($catName, $catParentId);
    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Категория добавлена';
    } else {
        $resData['success'] = false;
        $resData['message'] = 'Ошибка добавления категории';
    }
    echo json_encode($resData);
    return;
}


/**
 * Страница управления категориями
 * @param  [type] $smarty [description]
 * 
 */
function categoryAction($smarty){

    $rsCategories = getAllCategories();
    $rsMainCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Управление сайтом / Раздел Категории');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction(){

    $itemId = $_POST['itemId'];
    $parentId = $_POST['parentId'];
    $newName = $_POST['newName'];

    $res = updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Категория обновлена';
    } else {
        $resData['success'] = false;
        $resData['message'] = 'Ошибка изменения данных категории';
    }

    echo json_encode($resData);
    return;
}

/**
 * Страница управления товарами
 * @param  [type] $smarty 
 * 
 */
function productsAction($smarty){

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProducts();
    $rsAllCategories = getAllCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsAllCategories', $rsAllCategories);
    $smarty->assign('rsCatalog_img', $rsCatalog_img);

    $smarty->assign('pageTitle', 'Управление сайтом/Раздел Продукции');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

function addproductAction(){

    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCat'];
    $itemParentCat = $_POST['mainCat'];

    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat, $itemParentCat);

    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Товар успешно добавлен';
    } else {
        $resData['success'] = false;
        $resData['message'] = 'Ошибка при внесении изменений в БД';
    }
    echo json_encode($resData);
    return;
}

function selectproductAction(){

    $selectCat = $_POST['mainCat'];

    if ($selectCat != 0) {
        $res = getChildrenForCat($selectCat);
    } else {
        $res = 'Главная категория';
    }
    
    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Категории получены успешно';
        $resData['categories'] = $res;
    } else {
        $resData['success'] = false;
        $resData['message'] = 'Не удалось получить категории';
    }
    echo json_encode($resData);
    return;
}

function updateproductAction() {

    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemStatus = $_POST['itemStatus'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];
    $itemSize = $_POST['itemSize'];
    $itemParentCatId = $_POST['itemParentCatId'];

    $res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $itemParentCatId, $itemSize);

    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Изменения успешно внесены';
    }
    else {
        $resData['success'] = false;
        $resData['message'] = 'Ошибка изменения данных';
    }
    echo json_encode($resData);
    return;
}

function uploadAction() {
    $maxSize = 2 * 1024 * 1024;

    $itemId = $_POST['itemId'];
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    $newFileName = $itemId . '.' . $ext;    

    if ($_FILES['filename']['size'] > $maxSize) {
        echo ("Размер файла превышает 2 мегабайта");
        return;
    }

    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' . $newFileName);
        if ($res) {
            $res = updateProductImage($itemId, $newFileName);
            if ($res) {
                redirect('/admin/products/');
            }
        }
    }
    else{
        echo ('Ошибка загрузки файла');
    }
}

function ordersAction($smarty){

    $rsOrders = getOrders();

    $smarty->assign('pageTitle', 'Заказы');
    $smarty->assign('rsOrders', $rsOrders);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

function setorderstatusAction(){
    $itemId = $_POST['itemId'];
    $status = $_POST['status'];

    $res = updateOrderStatus($itemId, $status);

    if ($res) {
        $resData['success'] = true;
    } else {
        $resData['success'] = false;
        $resData['message'] = "Ошибка обновление статуса заказа";
    }
    echo json_encode($resData);
    return;
}

function setorderdatepaymentAction(){
    $itemId = $_POST['itemId'];
    $datePayment = $_POST['datePayment'];

    $res = updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $resData['success'] = true;
    } else {
        $resData['success'] = false;
        $resData['message'] = "Ошибка обновление даты оплаты заказа";
    }
    echo json_encode($resData);
    return;
}

function uploadgalleryAction() {
    $maxSize = 2 * 1024 * 1024;

    $itemId = $_POST['itemId'];
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    $path = $_SERVER['DOCUMENT_ROOT'] . '/images/products/';
    
    do {
        $name = md5(microtime() . rand(0, 9999));
        $filename = $name . $ext;
    } while (file_exists($path.$filename));


    if ($_FILES['filename']['size'] > $maxSize) {
        echo ("Размер файла превышает 2 мегабайта");
        return;
    }

    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' . $filename);
        if ($res) {
            $res = getProductGalery($itemId);
            $setStr = $res[0]['catalog_img'] . ',' . $filename;
            $res = updateProductGallery($itemId, $setStr);
            if ($res) {
                redirect('/admin/products/');
            }
        }
    } else{
        echo ('Ошибка загрузки файла');
    }
}

function deletegalleryimgAction(){
    $itemName = $_POST['imgName'];
    $itemId = $_POST['itemId'];

    $res = getProductGalery($itemId);
    $res = $res[0]['catalog_img'];
    $resArray = explode(',' ,$res);
    $resIndex = array_search($itemName, $resArray);
    unset($resArray[$resIndex]);
    $setStr = implode(',', $resArray);

    $res = updateProductGallery($itemId, $setStr);

    if ($res) {
        redirect('/admin/products/');
    } else {
        echo ('Ошибка удаления файла');
    }
}

function deleteproductAction(){
    $itemId = $_POST['itemId'];

    $res = deleteProduct($itemId);
    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Товар удален';
    }else{
        $resData['success'] = false;
        $resData['message'] = 'Ошибка при удалении товара';
    }
    echo json_encode($resData);
    return;
}

function deletecategoryAction(){
    $itemId = $_POST['itemId'];

    $res = deleteCategory($itemId);
    if ($res) {
        $resData['success'] = true;
        $resData['message'] = 'Категория удалена';
    }else{
        $resData['success'] = false;
        $resData['message'] = 'Ошибка при удалении категории';
    }
    echo json_encode($resData);
    return;
}