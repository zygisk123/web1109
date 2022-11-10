<?php
$edit = false;
$orderFilteredItem = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['save'])){
        ItemController::store();
        header("Location: ./index.php");
        die;
    }    

    if(isset($_POST['edit'])){
    
        $item = ItemController::show();
        $edit = true;
    }  

    if(isset($_POST['update'])){
        
        ItemController::update();
        header("Location: ./index.php");
        die;
    }

    if(isset($_POST['destroy'])){
        ItemController::destroy();
        header("Location: ./index.php");
        die;
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    // if(isset($_GET['order'])){
    //     $items = ItemController::order();
    // }
    // if(isset($_GET['filter'])){
    //     $filter = $_GET['filterBy'];
    //     $items = ItemController::filter();
    //     $orderFilteredItem = true;
    // }
    // if(isset($_GET['orderFiltered'])){
        //     $filter = $_GET['filter2'];
        //     $items = ItemController::orderFilter();
        //     $orderFilteredItem = true;
        // }
    if (isset($_GET['filter'])) {
        $items = ItemController::filter();
    }
    if(count($_GET) == 0){
        $items = ItemController::index();
    }
}

$categories = ItemController::getCategories(); 
?>