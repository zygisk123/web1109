<?php
include "./models/Item.php";

class ItemController{

    public static function index()
    {
        $items = Item::all();
        return $items;
    }

    public static function store()
    {
        Item::create();
    }

    public static function show()
    {
        $item = Item::find($_POST['id']);
        return $item;
    }

    public static function update()
    {
        $item = new Item();
        $item->id = $_POST['id'];
        $item->name = $_POST['name'];
        $item->category = $_POST['category'];
        $item->price = $_POST['price'];
        $item->about = $_POST['about'];
        $item->update();
    }

    public static function destroy()
    {
        Item::destroy($_POST['id']);
    }

    public static function filter()
    {
        $items = Item::filterBy();
        return $items;
    }

}

?>