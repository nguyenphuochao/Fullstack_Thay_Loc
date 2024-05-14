<?php
class StudentController
{
    // Hiển thị danh sách
    function list()
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();
        require 'view/student/list.php';
    }
    // Hiển thị form thêm
    function add()
    {
        require 'view/student/add.php';
    }
    // Lưu dữ liệu
    function save()
    {
        $data = $_POST;
        $studentRepository = new StudentRepository();
        if ($studentRepository->save($data)) {
            $_SESSION["success"] = "Đã tạo sinh viên thành công";
        } else {
            $_SESSION["error"] = $studentRepository->error;
        }
        header("Location: /");
    }
}
