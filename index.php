<?php
include "./controllers/ItemController.php";

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
}else{
    if(isset($_GET['order'])){
        $items = ItemController::order();
    }elseif(isset($_GET['filter'])){
        $filter = $_GET['filterBy'];
        $items = ItemController::filter();
        $orderFilteredItem = true;
    }else{
        $items = ItemController::index();
    }
    if(isset($_GET['orderFiltered'])){
        $filter = $_GET['filter2'];
        $items = ItemController::orderFilter();
        $orderFilteredItem = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="f1">Prekės pavadinimas</label>
                        <input type="text" name="name" id="f1" class="form-control" value="<?= ($edit)? $item->name : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="f1">Prekės kategorija</label>
                        <input type="text" name="category" id="f1" class="form-control" value="<?= ($edit)? $item->category : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="f1">Prekės kaina</label>
                        <input type="text" name="price" id="f1" class="form-control" value="<?= ($edit)? $item->price : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="f1">Prekės aprasymas</label>
                        <textarea name="about" cols="40" rows="3" id="f4" class="form-control" > <?= ($edit)? $item->about : "" ?> </textarea>
                    </div>
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?=$item->id?>">
                        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Atnaujinti</button>
                    <?php } else { ?>
                        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3">Išsaugoti</button>
                    <?php } ?>
                </form>
            </div>
            <div class="col-4"></div>
            <div class="dropdown col-4">
                <form action="" method="get">
                    <select style = "width : 50%; display: inline-block" class="form-select form-select-sm" name="orderBy">
                        <option value="" disabled selected>RUSIUOTI</option>
                        <option value="id">ID</option>
                        <option value="name">NAME</option>
                        <option value="category">CATEGORY</option>
                        <option value="price">PRICE</option>
                        <option value="about">ABOUT</option>
                    </select>
                    <?php if($orderFilteredItem){ ?>
                        <input type="hidden" name="filter2" value="<?=$filter?>">
                        <button  class="btn btn-primary mt-3 mb-3" type="submit" name="orderFiltered" value="orderBy">RUSIUOTI</button>
                    <?php } else { ?>
                        <button  class="btn btn-primary mt-3 mb-3" type="submit" name="order" value="orderBy">RUSIUOTI</button>
                    <?php } ?>
                </form>
            </div>
            <div class="dropdown col-4">
                <form action="" method="get">
                    <select style = "width : 50%; display: inline-block" class="form-select form-select-sm" name="filterBy">
                        <option value="" disabled selected>Filtruoti</option>
                        <option value="valgomojo komplektai">VALGOMOJO KOMPLEKTAI</option>
                        <option value="virtuves baldai">VIRTUVES BALDAI</option>
                        <option value="elektronika">ELEKTRONIKA</option>
                    </select>
                    <button  class="btn btn-primary mt-3 mb-3" type="submit" name="filter" value="filterBy">Filtruoti</button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">ABOUT</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
        
                    <?php foreach ($items as $item) {?>
                        <tr>
                            <td> <?=$item->id?> </td>
                            <td> <?=$item->name?> </td>
                            <td> <?=$item->category?> </td>
                            <td> <?=$item->price?> </td>
                            <td> <?=$item->about?> </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value=" <?=$item->id?>">
                                    <button type="submit" name="edit" class="btn btn-success">edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value=" <?=$item->id?>">
                                    <button type="submit" name="destroy" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>