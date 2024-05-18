<?php
class RegisterRepository
{
    public $error;

    function getBySearch($search)
    {
        $cond = "student.name LIKE '%$search%' OR subject.name LIKE '%$search%'";
        return $this->fetch($cond);
    }
    function getAll()
    {
        return $this->fetch();
    }
    function fetch($cond = null)
    {
        global $conn;
        $sql = "SELECT register.*,
                       student.name AS student_name,
                       subject.name AS subject_name
                FROM register JOIN student ON register.student_id = student.id
                              JOIN subject ON register.subject_id = subject.id";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $registers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $register = new Register($row["id"], $row["student_id"], $row["student_name"], $row["subject_id"], $row["subject_name"], $row["score"]);
                $registers[] = $register;
            }
        }
        return $registers;
    }
    function save($data)
    {
        global $conn;
        $student_id = $data["student_id"];
        $subject_id = $data["subject_id"];
        $sql = "INSERT INTO register(student_id,subject_id) VALUES($student_id,$subject_id)";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: " . $sql . $conn->error;
        return false;
    }
    function find($id)
    {
        $cond = "register.id = $id";
        $registers = $this->fetch($cond);
        $register = current($registers);
        return $register;
    }
    function update($register)
    {
        global $conn;
        $id = $register->id;
        $score = $register->score;
        $sql = "UPDATE register SET score = $score WHERE id= $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: " . $sql . $conn->error;
        return false;
    }
    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM register WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: " . $sql . $conn->error;
        return false;
    }
}
