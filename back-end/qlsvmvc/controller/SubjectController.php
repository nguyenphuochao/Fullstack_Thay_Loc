<?php
class SubjectController
{
    protected $redirectTo = "/?c=subject";
    function list()
    {
        $subjectRepository = new SubjectRepository();
        $search = "";
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
            $subjects = $subjectRepository->getBySearch($search);
        } else {
            $subjects = $subjectRepository->getAll();
        }
        require 'view/subject/list.php';
    }
    function add()
    {
        require "view/subject/add.php";
    }
    function save()
    {
        $data = $_POST;
        $subjectRepository = new SubjectRepository();
        if ($subjectRepository->save($data)) {
            $_SESSION["success"] = "Thêm mới môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }
        header("Location: $this->redirectTo");
    }
    function edit()
    {
        $id = $_GET['id'];
        $subjectRepository = new SubjectRepository();
        $subject = $subjectRepository->find($id);
        require 'view/subject/edit.php';
    }
    function update()
    {
        $id = $_POST['id'];
        $subjectRepository = new SubjectRepository();
        $subject = $subjectRepository->find($id);
        $subject->name = $_POST['name'];
        $subject->number_of_credit = $_POST['number_of_credit'];
        if ($subjectRepository->update($subject)) {
            $_SESSION["success"] = "Cập nhật môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }
        header("Location: $this->redirectTo");
    }
    function delete()
    {
        $id = $_GET["id"];
        $subjectRepository = new SubjectRepository();
        if ($subjectRepository->delete($id)) {
            $_SESSION["success"] = "Xóa môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }
        header("Location: $this->redirectTo");
    }
}
