<?php
session_start();

class db
{
    private $connection;

    public function __construct()
    {

    }

    public function connect()
    {
        $database = "jakubesova";
        $host = "localhost";
        $user = "jakubesova";
        $password = "denden";

        try {
            $this->connection = new mysqli($host, $user, $password, $database);
        } catch (mysqli_sql_exception $exc) {
            echo $exc;
        }
    }

    function registration($user, $password)
    {
        try {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $this->connect();
            $sql = "INSERT INTO users(user, password) VALUES ('$user', '$pass')";
            $this->connection->query($sql);
            header("Location:prihlasenie_form.php");
            $this->connection->close();

        } catch (mysqli_sql_exception $exc) {
            echo $exc;
            $this->connection->close();
        }
    }

    function getUser($user)
    {
        $this->connect();
        $sql = "SELECT user FROM users WHERE user='$user'";
        $result = $this->connection->query($sql);
        $row = $result->fetch_row();
        $this->connection->close();
        if (isset($row))
            return true;
        else
            return false;
    }

    function getLogin($user, $password)
    {
        $this->connect();
        $sql = "SELECT * FROM users WHERE user = '$user'";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        $passwordhash = $row['password'];

        if (password_verify($password, $passwordhash)) {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['user'] = $row['user'];
            header("Location:domov.php");
        } else {
            echo "<script>alert('Zle zadané meno alebo heslo!!!')
            document.location.href = 'prihlasenie_form.php';
           </script>";

        }
        $this->connection->close();
    }

    function insertRecept($r_title, $r_content)
    {
        $this->connect();
        $title = $this->connection->real_escape_string($r_title);
        $content = $this->connection->real_escape_string($r_content);
        $id = $_SESSION['id_user'];
        $sql = "INSERT INTO recepty(author_id, r_title, r_content) VALUES ('$id','$title', '$content')";
        $this->connection->query($sql);
        return true;
    }

    function getRecept()
    {
        try {
            $this->connect();

            $sql = "SELECT recepty.r_content, users.user, r_title,date FROM recepty INNER JOIN users ON recepty.author_id = users.id_user";
            $result = $this->connection->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (mysqli_sql_exception $exc) {
            echo $exc;
            $this->connection->close();
        }
    }

    function getMyRecept($id)
    {
        try {
            $this->connect();
            $id = $_SESSION['id_user'];
            $sql = "SELECT recepty.r_content, users.user, r_title,date FROM recepty INNER JOIN users ON recepty.author_id = users.id_user WHERE recepty.author_id = '$id'";
            $result = $this->connection->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            }

        } catch (mysqli_sql_exception $exc) {
            echo $exc;
            $this->connection->close();
        }
    }

    function getPosts()
    {
        try {
            $this->connect();
            $sql = "SELECT posts.p_content, users.user, date, p_id FROM posts INNER JOIN users ON posts.author_id = users.id_user";
            $result = $this->connection->query($sql);

            if ($result->num_rows >= 0) {
                return $result;
            }

        } catch (mysqli_sql_exception $exc) {
            echo $exc;
            $this->connection->close();
        }
    }

    function insertPost($p_content)
    {
        $this->connect();
        $content = $this->connection->real_escape_string($p_content);
        $id = $_SESSION['id_user'];
        $sql = "INSERT INTO posts(author_id, p_content) VALUES ('$id', '$content')";
        $this->connection->query($sql);
    }

    function getPost($p_id)
    {
        try {
            $this->connect();

            $id = $this->connection->real_escape_string($p_id);
            $sql = "SELECT * FROM posts WHERE p_id = '$id'";
            $result = $this->connection->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (mysqli_sql_exception $exc) {
            echo $exc;
            $this->connection->close();
        }
    }

    function editPost($p_id, $p_content)
    {
        $this->connect();
        $content = $this->connection->real_escape_string($p_content);
        $id = $this->connection->real_escape_string($p_id);

        $sql = "UPDATE posts SET p_content='$content', date=now() WHERE p_id='$id'";
        $this->connection->query($sql);
        $this->connection->close();

    }

    function deletePost($p_id)
    {
        $this->connect();

        $id = $this->connection->real_escape_string($p_id);
        $sql = "DELETE FROM posts WHERE p_id = '$id'";
        $this->connection->query($sql);

    }


}