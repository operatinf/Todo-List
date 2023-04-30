<?php
class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    protected function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "todo_list";
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (!$conn->connect_error) {
            return $conn;
        }
    }
}


class Crud extends Database
{
    public function create()
    {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['todo'])) {
                $todo = $_POST['todo'];
                $comments = $_POST['comments'];
                $sql = "INSERT INTO crud (todo, comments) VALUES (\"$todo\", \"$comments\")";
                if ($this->connect()->query($sql) === TRUE) {
                    $this->connect()->close();
                    header("location: index.php");
                }
            } else {
                echo "<h1>Pole \"Do zrobienia\" musi być wypełnione!</h1>";
            }
        }
    }
    public function read_all()
    {
        $sql = "SELECT * FROM crud";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function read_single()
    {
        $id = $_GET['id'];
        $sql = "SELECT todo, comments, reg_date FROM crud WHERE id=$id";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            if (!empty($_POST['todo'])) {
                $todo = $_POST['todo'];
                $comments = $_POST['comments'];
                $sql = "UPDATE crud SET todo=\"$todo\", comments=\"$comments\" WHERE id=$id";
                if ($this->connect()->query($sql) === TRUE) {
                    header("location: index.php");
                }
            } else {
                echo "<h1>Pole \"Do zrobienia\" musi być wypełnione!</h1>";
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM crud WHERE id=$id";
        if ($this->connect()->query($sql) === TRUE) {
            header("location: index.php");
        }
    }
}
?>