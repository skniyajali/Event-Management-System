<?php

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function convert_string($action, $string)
{
    $output = '';
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'eaiYYkYTysia2lnHiw0N0vx7t7a3kEJVLfbTKoQIx5o=';
    $secret_iv = 'eaiYYkYTysia2lnHiw0N0';
    // hash
    $key = hash('sha256', $secret_key);
    $initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);
    if ($string != '') {
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $initialization_vector);
            $output = base64_encode($output);
        }
        if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $initialization_vector);
        }
    }
    return $output;
}
function get_total_all_records($connect)
{
    $statement = $connect->prepare("SELECT * FROM ett_teacher");
    $statement->execute();
    return $statement->rowCount();
}

class Databases
{
    public $con;
    public $error;

    public function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "ats");

        if (!$this->con) {
            echo 'Databases Connection Error' . mysqli_connect_error($this);
        }
    }

    public function required_validation($field)
    {
        $count = 0;
        foreach ($field as $key => $value) {
            if (empty($value)) {
                $count++;
                $this->error = "<p>" . $key . "is required</p>";
            }
        }
        if ($count == 0) {
            return true;
        }
    }

    public function can_login($table_name, $where_condition)
    {
        $condition = '';
        foreach ($where_condition as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);

        $query = "SELECT * FROM " . $table_name . "  WHERE " . $condition . " ";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)) {
            return true;
        } else {
            $this->error = "Wrong Data";
        }
    }
}
