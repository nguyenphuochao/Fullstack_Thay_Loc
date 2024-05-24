<?php
class ProductController
{
    function index()
    {
        $productRepository = new ProductRepository();
        $categoryRepository = new CategoryRepository();
        $item_per_page = 9;
        $page = $_GET["page"] ?? 1;
        $conds = [];
        $sorts = [];
        $categoryName = "Tất cả sản phẩm";

        // Tìm theo danh mục
        $category_id = !empty($_GET['category_id']) ? $_GET['category_id'] : null; // toán tử 3 ngôi thông thường
        // $category_id = $_GET['category_id'] ??  null; // toán tử 3 ngôi rút gọn
        if ($category_id) { // Tìm theo danh mục
            $conds = [
                "category_id" => [
                    "type" => "=",
                    "val" => $category_id
                ]
            ];
            $category = $categoryRepository->find($category_id);
            $categoryName = $category->getName();
        } // SELECT * FROM products WHERE category_id = 5

        // Tìm khoảng giá
        $price_range = !empty($_GET['price-range']) ? $_GET['price-range'] : null;
        if ($price_range) { // Tìm theo khoảng giá
            $tmp = explode("-", $price_range);
            $start = $tmp[0];
            $end = $tmp[1];
            $conds = [
                "sale_price" => [
                    "type" => "BETWEEN",
                    "val" => "$start AND $end"
                ]
            ]; //SELECT * FROM products WHERE sale_price BETWEEN 100 AND 200
            if ($end == 'greater') {
                $conds = [
                    "sale_price" => [
                        "type" => ">",
                        "val" => $start
                    ]
                ]; //SELECT * FROM products WHERE sale_price ?= 10000000
            }
        }

        // Sắp xếp và tìm sản phẩm
        $sort = $_GET['sort'] ?? null;
        if ($sort) {
            $tmp = explode("-", $sort);
            $first = $tmp[0];
            $second = $tmp[1];
            $mapCol = [
                'price' => 'sale_price',
                'alpha' => 'name',
                'created' => 'created_date'
            ];
            $column = $mapCol[$first];
            $order = $second;
            $sorts = [$column => $order];
        }

        // Hiển thị sản phẩm
        $products = $productRepository->getBy($conds, $sorts, $page, $item_per_page);

        // Hiển thị phân trang
        $totalProducts = $productRepository->getBy($conds, $sorts);
        $pageNumber = ceil(count($totalProducts) / $item_per_page);

        // Hiển thị danh mục
        $categories = $categoryRepository->getAll();
        require "view/product/index.php";
    }
    function show()
    {
        require "view/product/show.php";
    }
}
