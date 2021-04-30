<?php


class User
{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $isLoggedIn;
        private $_errors = array();
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
        if (!$this->_db->insert('admin', $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem to create an account!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function update($fields = array(), $ad_id = null)
    {

        if (!$ad_id && $this->isLoggedIn()) {
            $ad_id = $this->data()->ad_id;
        }

        if (!$this->_db->update('admin', $ad_id, $fields)) {
            throw new Exception("<div class='alert alert-danger alert-dismissible' role='alert'>\t\t\t<div class='alert-text'>There was a problem an updating!</div>\t\t\t<div class='alert-close'> <i class='flaticon2-cross kt-icon-sm' data-dismiss='alert'></i> </div>\t\t</div>");
        }
    }

    public function find($user = null)
    {
        if ($user) {

            $data = $this->_db->get('admin', array('email', '=', $user));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            } else {
                $datas = $this->_db->get('admin', array('username', '=', $user));
                if ($datas->count()) {
                    $this->_data = $datas->first();
                    return true;
                } else {
                    $datap = $this->_db->get('admin', array('passkey', '=', $user));
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
    public function fac_event_org($user=null){
        $fac = $this->_db->get('dept_event',array('fe_dept_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function fac_event_part($user=null){
        $fac = $this->_db->get('fac_event',array('fe_dept_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function fas_event_part($user=null){
        $fac = $this->_db->get('fas_event',array('fe_dept_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function fac_fevent_org($user=null){
        $fac = $this->_db->get('dept_event',array('fe_fac_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function fac_fevent_part($user=null){
        $fac = $this->_db->get('fac_event',array('fe_fac_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function fas_fevent_part($user=null){
        $fac = $this->_db->get('fas_event',array('fe_std_hash','=',$user));
        if($fac->count()){
            return $fac->count();
        }else{
            return '0';
        }
    }

    public function department_count()
    {
        $data = $this->_db->get('em_department', array('dept_status', '=', 'Active'));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }

    public function department_name($user)
    {
        $data = $this->_db->get('em_department', array('dept_passkey', '=', $user));
        if ($data->count()) {
            return $data->first()->dept_sname;
        } else {
            return '';
        }
    }

    public function faculty_count()
    {
        $data = $this->_db->get('em_faculty', array('fac_status', '=', 'Active'));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }

    public function student_count()
    {
        $data = $this->_db->get('em_students', array('fac_status', '=', 'Active'));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }

    public function dept_faculty_count($user = null)
    {
        $data = $this->_db->get('em_faculty', array('fac_dept_hash', '=', $user));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }
    
    public function dept_student_count($user = null)
    {
        $data = $this->_db->get('em_students', array('fac_dept_hash', '=', $user));
        if ($data->count()) {
            return $data->count();
        } else {
            return '0';
        }
    }

    public function login($ad_username = null, $ad_password = null, $remember = false)
    {
        if (!$ad_username && !$ad_password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->email);
        } else {
            $user = $this->find($ad_username);            
            if ($user) {
                if ($this->data()->status === 'Active') {                    
                    if ($this->data()->password === $ad_password) {


                        Session::put($this->_sessionName, $this->data()->email);

                        if ($remember) {
                            $hash = Hash::unique();
                            $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->passkey));

                            if (!$hashCheck->count()) {
                                $this->_db->insert('users_session', array(
                                    'user_id' => $this->data()->id,
                                    'hash' => $hash,
                                    'passkey' => $this->data()->passkey
                                ));
                            } else {
                                $hash = $hashCheck->first()->hash;
                            }

                            Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                        }

                        return true;
                    } else {
                        $this->addError("Invalid Password");
                    }
                } else {
                    $this->addError("Your Account is not activated");
                }
            }else{
                $this->addError("Invalid Username");
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
        $this->_db->delete('users_session', array('passkey', '=', $this->data()->passkey));

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
    
    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }
}
