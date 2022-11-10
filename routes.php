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
    if (isset($_GET['filter'])) {
        $items = ItemController::filter();
    }
    if (isset($_GET['search'])) {
        $items = ItemController::search();
    }
    if(count($_GET) == 0){
        $items = ItemController::index();
    }
}

$categories = ItemController::getCategories(); 
?>