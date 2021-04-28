<?php
class library
{


    /**
     * Verifies that a password matches a hash that is stored in database
     *
     * @param [type] $ett_password
     * @param [type] $ett_id
     * @return void
     */
    public function verifyCurrentPassword($ett_password, $ett_id)
    {
        $query = "SELECT * FROM et_teacher WHERE ett_id = $ett_id";
        $statement = mysqli_query($this->db, $query);
        $result = $statement->fetch_all();
        $hash = $result[0]["ett_password"];
        if ($ett_password == $hash) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Change current password to new password
     *
     * @param [type] $ett_id
     * @param [type] $ins_npassword
     * @return void
     */
    public function changeCurrentPassword($ett_id, $ins_npassword)
    {
        $ett_id = mysqli_real_escape_string($this->db, $ett_id);
        $password = mysqli_real_escape_string($this->db, $ins_npassword);
        $query = "UPDATE `et_teacher` SET `ett_password`='$password' WHERE `ett_id` = '$ett_id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }

        return true;
    }
}
