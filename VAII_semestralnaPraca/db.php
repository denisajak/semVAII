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
}