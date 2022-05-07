<?php
require_once(__DIR__ . "/_includes/utils/_init.php");
require_once(__DIR__ . "/_includes/models/user.php");
require_once(__DIR__ . "/_includes/models/product.php");
$s_age = "";
$s_category = "";
$conds = [];
if (isset($_GET["q"])) {
    $conds["q"] = $_GET["q"];
}
if (isset($_GET["category"])) {
    $conds["category"] = $_GET["category"];
    $s_category = $_GET["category"];
}
if (isset($_GET["age"])) {
    $conds["age"] = $_GET["age"];
    $s_age = $_GET["age"];
}
if (isset($_GET["sort_by"])) {
    $conds["sort_by"] = $_GET["sort_by"];
}
$sort_by = 0;
if (isset($_GET["sort_by"])) {
    switch ($_GET["sort_by"]) {
        case 'title-asc':
            $sort_by = 1;
            break;
        case 'title-desc':
            $sort_by = 2;
            break;
        case 'price-asc':
            $sort_by = 3;
            break;
        case 'price-desc':
            $sort_by = 4;
            break;
    }
}
$p = Product::find($conds);
if (!$p) {
    $p = Product::find([]);
}
$products = $p["products"];
$count = $p["count"];
require_once(__DIR__ . "/_includes/views/home.php");
