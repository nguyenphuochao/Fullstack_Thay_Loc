<?php
class RegisterController
{
    protected $redirectTo = "/?c=register";
    function list()
    {
        $search = "";
        $regiterRepository = new RegisterRepository();
        if (!empty($_GET["search"])) {
            $search = $_GET["search"];
            $registers = $regiterRepository->getBySearch($search);
        } else {
            $registers = $regiterRepository->getAll();
        }

        require "view/register/list.php";
    }
    function add()
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll(); // get students
        $subjectRepository = new SubjectRepository();
        $subjects = $subjectRepository->getAll(); // get subjects
        require "view/register/add.php";
    }
    function save()
    {
        $data = $_POST;
        $registerRepository = new RegisterRepository();
        if ($registerRepository->save($data)) {
            $_SESSION["success"] = "Sinh viên đăng kí môn học thành công";
        } else {
            $_SESSION["error"] = $registerRepository->error;
        }
        header("Location: $this->redirectTo");
    }
    function edit()
    {
        $id = $_GET["id"];
        $registerRepository = new RegisterRepository();
        $register = $registerRepository->find($id);
        require "view/register/edit.php";
    }
    function update()
    {
        $id = $_POST["id"];
        $registerRepository = new RegisterRepository();
        $register = $registerRepository->find($id);
        $register->score = $_POST["score"];
        if ($registerRepository->update($register)) {
            $_SESSION["success"] = "Cập nhật điểm sinh viên thành công";
        } else {
            $_SESSION["error"] = $registerRepository->error;
        }
        header("Location: $this->redirectTo");
    }
    function delete()
    {
        $id = $_GET["id"];
        $registerRepository = new RegisterRepository();
        if ($registerRepository->delete($id)) {
            $_SESSION["success"] = "Xóa đăng kí môn học thành công";
        } else {
            $_SESSION["error"] = $registerRepository->error;
        }
        header("Location: $this->redirectTo");
    }
}
