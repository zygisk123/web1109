<form action="" method="get">
    <div class="row">
        <div class="col-2">
            <select class="form-select" name = "sort">
                <option selected>Išrikiuoti</option>
                <?php foreach($categories as $key => $category) {?>
                    <option value="<?= $category?>"><?= $category ?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Kaina nuo">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Kaina iki">
        </div>
        <div class="col-2">
            <select class="form-select" name = "filter">
                <option selected>Atrinkti</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary">Primary</button>
        </div>
    </div>
</form>