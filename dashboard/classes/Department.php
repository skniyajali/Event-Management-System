<?php


class Department
{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $isLoggedIn;
    public $error;
    public function __construct($ins = null)
    {
        $this->_db = DB::getInstance();

        if (!$ins) {
            if (Session::exists($this->_sessionName)) {
                $ins = Session::get($this->_sessionName);

                if ($this->find($ins)) {
                    $this->isLoggedIn = true;
                } else {
                    //Logout
                }
            }
        } else {
            $this->find($ins);
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('em_department', $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem to create an account!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }
    public function create_com($fields = array())
    {
        if (!$this->_db->insert('et_user_communication', $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem to create an account!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function update($fields = array(), $ett_id = null)
    {

        if (!$ett_id && $this->isLoggedIn()) {
            $ett_id = $this->data()->ett_id;
        }

        if (!$this->_db->update('em_department', $ett_id, $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem an updating!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function find($ins = null)
    {
        if ($ins) {
            $field = 'dept_hash';
            $data = $this->_db->get('em_department', array($field, '=', $ins));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }else{
                $field = 'dept_passkey';
                $data = $this->_db->get('em_department', array($field, '=', $ins));
                if ($data->count()) {
                    $this->_data = $data->first();
                    return true;
                }
            }
        }
        return false;
    }

    public function login($ett_username = null, $ett_password = null, $remember = false)
    {
        if (!$ett_username && !$ett_password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->ett_username);
        } else {
            $ins = $this->find($ett_username);

            if ($ins) {
                if ($this->data()->ett_status == 'Active') {
                    if ($this->data()->ett_password == $ett_password) {


                        Session::put($this->_sessionName, $this->data()->ett_username);

                        if ($remember) {
                            $hash = Hash::unique();
                            $hashCheck = $this->_db->get('et_session', array('et_id', '=', $this->data()->ett_id));

                            if (!$hashCheck->count()) {
                                $this->_db->insert('et_session', array(
                                    'et_id' => $this->data()->ett_id,
                                    'hash' => $hash
                                ));
                            } else {
                                $hash = $hashCheck->first()->hash;
                            }

                            Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                        }

                        return true;
                    } else {
                        throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>Invalid Password!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
                    }
                } else {
                    throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>Sorry! Your account isn't activated,pls contact with administrator</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
                }
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
        $this->_db->delete('et_session', array('et_id', '=', $this->data()->ett_id));

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
