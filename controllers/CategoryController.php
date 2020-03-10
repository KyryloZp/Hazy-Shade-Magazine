<?php 

    /**
     * categoryController.php
     *
     * Контроллер страницы категории (/category/1)
     * 
     */
    
    // подключаем модели
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductsModel.php';

    /**
     * Формирование страницы категории
     * @param  object $smarty шаблонизатор
     * @return [type]         [description]
     */
    function indexAction($smarty) {
        $catId = isset($_GET['id']) ? $_GET['id'] : null;

        if( ! $catId) exit();
        $rsCategory = getCatById($catId);

        
        $rsChildCats = getChildrenForCat($catId);
        if($catId <= 2){
            $rsProducts = getProductsByParentCat($catId);
        } else {
            $rsProducts = getProductsByCat($catId);
        }
        
        $rsCategories = getAllMainCatsWithChildren();
    


        $scriptName = 'category.js';
        $addScript = 'libs/lcdsantos-jQuery-Selectric-0b92c26/src/jquery.selectric.js';
        $addStyle = 'libs/lcdsantos-jQuery-Selectric-0b92c26/src/selectric.css';

        $smarty->assign('pageTitle', 'Товары категории' . $rsCategory['name']);

        $smarty->assign('rsCategory', $rsCategory);
        $smarty->assign('rsProducts', $rsProducts);
        $smarty->assign('rsChildCats', $rsChildCats);
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('scriptName', $scriptName);
        $smarty->assign('addScript', $addScript);
        $smarty->assign('addStyle', $addStyle);
        $smarty->assign('rsParentCategory', $rsParentCategory);
        $smarty->assign('rsCategoryProduct', $rsCategoryProduct);

        loadTemplate($smarty, 'head');
        loadTemplate($smarty, 'header');
        loadTemplate($smarty, 'breadcrumb');
        loadTemplate($smarty, 'category');
        loadTemplate($smarty, 'footer');
    }

    function getproductAction(){
        $itemId = $_POST['catId'];
        $minValue = $_POST['minValue'];
        $maxValue = $_POST['maxValue'];
        $itemSize = $_POST['size'];

        $res = getProductsForPriceAndCat($itemId, $minValue, $maxValue, $itemSize);

        if ($res) {
            $resData['success'] = true;
            $resData['message'] = "Все норм";
            $resData['items'] = $res;
        } else {
            $resData['success'] = false;
            $resData['message'] = "Ошибка обновления категории";
        }
        echo json_encode($resData);
        return;

    }