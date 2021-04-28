<?php


class Department
{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $isLoggedIn;
    public $error;
    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('sessions/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    //Logout
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('em_department', $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem to create an account!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function update($fields = array(), $dept_id = null)
    {

        if (!$dept_id && $this->isLoggedIn()) {
            $dept_id = $this->data()->dept_id;
        }

        if (!$this->_db->update('em_department', $dept_id, $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem an updating!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function find($user = null)
    {
        if ($user) {

            $data = $this->_db->get('em_department', array('dept_email', '=', $user));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            } else {
                $datas = $this->_db->get('em_department', array('dept_username', '=', $user));
                if ($datas->count()) {
                    $this->_data = $datas->first();
                    return true;
                } else {
                    $datap = $this->_db->get('em_department', array('dept_passkey', '=', $user));
                    if ($datap->count()) {
                        $this->_data = $datap->first();
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
        return false;
    }

    public function faculty_count($user = null)
    {
        $data = $this->_db->get('em_faculty', array('fac_dept_hash', '=', $user));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }
    public function student_count($user = null)
    {
        $data = $this->_db->get('em_students', array('fac_dept_hash', '=', $user));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }
    public function find_by_hash($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'dept_id' : 'dept_hash';
            $data = $this->_db->get('em_department', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($dept_username = null, $dept_password = null, $remember = false)
    {
        if (!$dept_username && !$dept_password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->dept_passkey);
        } else {
            $user = $this->find($dept_username);
            if ($user) {
                if ($this->data()->dept_status == 'Active') {
                    if ($this->data()->dept_password == $dept_password) {

                        Session::put($this->_sessionName, $this->data()->dept_passkey);

                        if ($remember) {
                            $hash = Hash::unique();
                            $hashCheck = $this->_db->get('users_session', array('passkey', '=', $this->data()->dept_passkey));

                            if (!$hashCheck->count()) {
                                $this->_db->insert('users_session', array(
                                    'user_id' => $this->data()->dept_id,
                                    'passkey' => $this->data()->dept_passkey,
                                    'hash' => $hash
                                ));
                            } else {
                                $hash = $hashCheck->first()->hash;
                            }

                            Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                        }

                        return true;
                    } else {
                        throw new Exception("Invalid Password");
                    }
                } else {
                    throw new Exception("Account is not activated.");
                }
            } else {
                throw new Exception("Invalid User.");
            }
        }
        return false;
    }
    /*
    public function hasPermission($key)
    {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if ($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            return !empty($permissions[$key]);
        }

        return false;
    }
*/
    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {
        $this->_db->delete('users_session', array('passkey', '=', $this->data()->dept_passkey));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }
}
