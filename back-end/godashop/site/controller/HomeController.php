<?php
class HomeController
{
    public function index()
    {
        $productRepository = new ProductRepository();
        $conds = [];
        $sorts = ["featured" => "DESC"];
        $page = 1;
        $item_per_page = 4;
        // Lấy 4 sản phẩm nổi bât
        $featuredProducts = $productRepository->getBy($conds, $sorts, $page, $item_per_page);
        // Lấy 4 sản phẩm mới nhất
        $sorts = ["created_date" => "DESC"];
        $lastestProducts = $productRepository->getBy($conds, $sorts, $page, $item_per_page);
        // Lấy sản phẩm theo danh mục
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll();
        $categoryProducts = []; // mảng chứa danh sách sản phẩm theo danh mục
        foreach ($categories as $category) {
            $conds = [
                "category_id" => [
                    "type" => "=",
                    "val" => $category->getId()
                    ]
                ];// SELECT * FROM products WHERE category_id = 1
            $products = $productRepository->getBy($conds, $sorts, $page, $item_per_page);
            $categoryProducts[$category->getName()] = $products;
            // $categoryProducts là array 2 chiều
            // Mỗi phần tử sẽ có key và value
            // Key là tên danh mục, value là danh sách các sản phẩm thuộc danh mục đó
        }
        require "view/home/index.php"; // gọi view hiển thị
    }
}
