<form action="" method="get">
    <div class="row">
        <div class="col-2">
            <select class="form-select" name = "filterByCategory">
                <option selected value = "">Atrinkti</option>
                <?php foreach($categories as $key => $category) {?>
                    <option <?=(isset($_GET["filterByCategory"]))?($_GET["filterByCategory"] == $category) ? "selected" : '':'';?> value="<?= $category?>"><?= $category ?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" <?=(isset($_GET["from"])) ? ($_GET["from"] != "") ? 'value = ' . $_GET["from"] : '': '';?> name = "from" placeholder="Kaina nuo">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" <?=(isset($_GET["to"])) ? ($_GET["to"] != "") ? 'value = ' . $_GET["to"] : '': '';?> name = "to" placeholder="Kaina iki">
        </div>
        <div class="col-2">
            <select class="form-select" name = "sort">
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 0) ? "selected" : '':'';?> selected value="0">Rūšiuoti</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 1) ? "selected" : '':'';?> value="1">price 0-9</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 2) ? "selected" : '':'';?>value="2">price 9-0</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 3) ? "selected" : '':'';?>value="3">title a-z</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 4) ? "selected" : '':'';?>value="4">title z-a</option>
            </select>
        </div>
        <div class="col-2">
        <button type="submit" class="btn btn-primary" name="filter">Filter</button>
        </div>
    </div>
</form>