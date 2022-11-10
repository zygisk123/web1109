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