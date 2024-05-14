<?php
class StudentRepository
{
    public $error;
    public function getAll()
    {
        global $conn;
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        $students = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student($row['id'], $row['name'], $row['birthday'], $row['gender']);
                $students[] = $student;
            }
        }
        return $students;
    }
    public function save($data)
    {
        global $conn;
        $name = $data['name'];
        $birthday = $data['birthday'];
        $gender = $data["gender"];
        $sql = "INSERT INTO student(name, birthday,gender)
        VALUES ('$name', '$birthday', '$gender')";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
