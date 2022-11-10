<form action="" method="post">
    <div class="row">
        <div class="col-6">
            <h1><a href = "index.php">HOME</a></h1>
        </div>
        <div class="col-6">
            <div class="input-group">
                <input type="search" class="form-control rounded" name = "search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>

        </div>
    </div>
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
        <input type="number" step=".01" name="price" id="f1" class="form-control" value="<?= ($edit)? $item->price : "" ?>">
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