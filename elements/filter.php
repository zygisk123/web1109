<form action="" method="get">
    <div class="row">
        <div class="col-2">
            <select class="form-select" name = "filterByCategory">
                <option selected value = "">Atrinkti</option>
                <?php foreach($categories as $key => $category) {?>
                    <option value="<?= $category?>"><?= $category ?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" name = "from" placeholder="Kaina nuo">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" name = "to" placeholder="Kaina iki">
        </div>
        <div class="col-2">
            <select class="form-select" name = "sort">
                <option selected value="0">Rūšiuoti</option>
                <option value="1">price 0-9</option>
                <option value="2">price 9-0</option>
                <option value="3">title a-z</option>
                <option value="4">title z-a</option>
            </select>
        </div>
        <div class="col-2">
        <button type="submit" class="btn btn-primary" name="filter">Filter</button>
        </div>
    </div>
</form>