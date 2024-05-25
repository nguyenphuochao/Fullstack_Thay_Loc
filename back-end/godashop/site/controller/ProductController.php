<?php
class ProductController
{
    // Trang sản phẩm
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
        // $category_id = !empty($_GET['category_id']) ? $_GET['category_id'] : null; // toán tử 3 ngôi thông thường
        $category_id = $_GET['category_id'] ??  null; // toán tử 3 ngôi rút gọn
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
        $price_range = $_GET['price-range'] ?? null;
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

        // Search theo tên sản phẩm
        $search = $_GET["search"] ?? null;
        if ($search) {
            $conds = [
                "name" => [
                    "type" => "LIKE",
                    "val" => "'%$search%'"
                ]
            ];
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
    // Chi tiết sản phẩm
    function show()
    {
        $id = $_GET["id"];
        $productRepository = new ProductRepository();
        $product = $productRepository->find($id);
        $category_id = $product->getCategoryId();

        // Hiển thị danh mục
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll();

        // Sản phẩm liên quan
        $conds = [
            "category_id" => [
                "type" => "=",
                "val" => $product->getCategoryId()
            ],
            "id" => [
                "type" => "!=",
                "val" => $id
            ]
        ];
        $relatedProducts = $productRepository->getBy($conds);
        require "view/product/show.php";
    }
    // Search Ajax
    function ajaxSearch()
    {
        $pattern = $_GET["pattern"];
        $productRepository = new ProductRepository();
        $products = $productRepository->getByPattern($pattern);
        require "view/product/ajaxSearch.php";
    }
    // Comment Ajax
    function storeComment()
    {
        $data = [
            "email" => $_POST["email"],
            "fullname" => $_POST["fullname"],
            "star" => $_POST["rating"],
            "created_date" =>  date("Y-m-d H:i:s"),
            "description" => $_POST["description"],
            "product_id" => $_POST["product_id"]
        ];
        $commentRepository = new CommentRepository();
        $comment = $commentRepository->save($data);
        // lấy lại danh sách comment bao gồm cả comment mới lưu vào database
        $productRepository = new ProductRepository();
        $product = $productRepository->find($_POST["product_id"]);
        $comments = $product->getComments();
        require "layout/comments.php"; // render lại 1 cục html lên giao diện
    }
}
