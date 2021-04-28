<?php


class Faculty
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
        if (!$this->_db->insert('em_faculty', $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem to create an account!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function update($fields = array(), $fac_id = null)
    {

        if (!$fac_id && $this->isLoggedIn()) {
            $fac_id = $this->data()->fac_id;
        }

        if (!$this->_db->update('em_faculty', $fac_id, $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem an updating!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function find($user = null)
    {        
        if ($user) {

            $data = $this->_db->get('em_faculty', array('fac_username', '=', $user));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            } else {
                $datas = $this->_db->get('em_faculty', array('fac_email', '=', $user));
                if ($datas->count()) {
                    $this->_data = $datas->first();
                    return true;
                } else {
                    $datap = $this->_db->get('em_faculty', array('fac_passkey', '=', $user));
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
    public function find_by_hash($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'fac_id' : 'fac_hash';
            $data = $this->_db->get('em_faculty', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function dept_event($user = null)
    {
        if ($user) {
            $field = 'fe_dept_hash';
            $data = $this->_db->get('fac_event', array($field, '=', $user));

            if ($data->count()) {
                return $data->count();
            }
        }
        return false;
    }
    
    public function dept_event_std($user = null)
    {
        if ($user) {
            $field = 'fe_dept_hash';
            $data = $this->_db->get('fas_event', array($field, '=', $user));

            if ($data->count()) {
                return $data->count();
            }
        }
        return false;
    }

    public function login($fac_username = null, $fac_password = null, $remember = false)
    {
        if (!$fac_username && !$fac_password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->fac_passkey);
        } else {
            $user = $this->find($fac_username);

            if ($user) {
                if ($this->data()->fac_status === 'Active') {
                    if ($this->data()->fac_password === $fac_password) {

                        Session::put($this->_sessionName, $this->data()->fac_passkey);

                        if ($remember) {
                            $hash = Hash::unique();
                            $hashCheck = $this->_db->get('users_session', array('passkey', '=', $this->data()->fac_passkey));

                            if (!$hashCheck->count()) {
                                $this->_db->insert('users_session', array(
                                    'user_id' => $this->data()->fac_id,
                                    'passkey' => $this->data()->fac_passkey,
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
            }else{
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
        $this->_db->delete('users_session', array('passkey', '=', $this->data()->fac_passkey));

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
