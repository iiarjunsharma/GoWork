<?php
class Database
{
    // Properties
    public $server = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "gowork";
    // Methods
    function connect()
    {
        $conn = mysqli_connect(
            $this->server,
            $this->username,
            $this->password,
            $this->database
        );
        if (!$conn) {
            die('Error: ' . mysqli_connect_error());
        }
        return $conn;
    }
    function query($query)
    {
        $result = mysqli_query($this->connect(), $query);
        return $result;
    }
}
