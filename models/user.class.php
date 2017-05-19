<?php

class user extends databaseModel
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $gender;
    public $status;
    public $activation;
    public $privilege;
    public $lastlogin;
    public $table_name = 'users';
    public $fields = [
            'username',
            'password',
            'email',
            'gender',
            'status',
            'activation',
            'privilege',
            'lastlogin',
    ];

    public function __construct($username = false, $password = false, $email = false, $gender = false, $status = false, $privilege = false)
    {
        if ($username != false) {
            $this->username = $username;
        }
        if ($password != false) {
            $this->password = $password;
        }
        if ($email != false) {
            $this->email = $email;
        }
        if ($gender != false) {
            $this->gender = $gender;
        }
        if ($status != false) {
            $this->status = $status;
        }
        if ($privilege != false) {
            $this->privilege = $privilege;
        }

        // $this->lastlogin=date('y-m-d h:i:s');
    }

    public function user_exist()
    {
        $sql = 'SELECT * FROM users WHERE username=\''.$this->username.'\'';
        $check = self::read($sql, PDO::FETCH_CLASS, __CLASS__);
        // var_dump($check);
        return (bool) $check;
    }

    public function email_exist()
    {
        $sql = 'SELECT * FROM users WHERE email=\''.$this->email.'\'';
        $check = self::read($sql, PDO::FETCH_CLASS, __CLASS__);
        // var_dump($check);
        return (bool) $check;
    }

    public static function auth($username, $password)
    {
        $password = md5($username.$password.SAULT);
        $sql = 'SELECT * FROM users WHERE username=\''.$username.'\' AND password=\''.$password.'\' AND status=1';
        $check = self::read($sql, PDO::FETCH_CLASS, __CLASS__);
        if ($check) {
            $_SESSION['logedin'] = true;
            $_SESSION['user'] = $check;
            $check->lastlogin = date('Y-m-d H-i-s');
            if ($check->save()) {
                header('location:'.HOST_NAME);
            }
        } else {
            return false;
        }
    }

    public static function admin_auth($username, $password)
    {
        $password = md5($username.$password.SAULT);
        $sql = 'SELECT * FROM users WHERE username=\''.$username.'\' AND password=\''.$password.'\' AND status=1 AND privilege=1 ';
        $check = self::read($sql, PDO::FETCH_CLASS, __CLASS__);
        if ($check) {
            $_SESSION['logedin'] = true;
            $_SESSION['user'] = $check;
            $check->lastlogin = date('Y-m-d H-i-s');
            if ($check->save()) {
                header('location:'.HOST_NAME.'cpanel');
            }
        } else {
            return false;
        }
    }

    public static function logedin()
    {
        return ($_SESSION['logedin']) ? true : false;
    }

    public function logout()
    {
        unset($_SESSION['logedin']);
        unset($_SESSION['user']);
        header('location:'.HOST_NAME);
    }

    public static function current_user()
    {
        return $_SESSION['user'];
    }

    public function is_Admin()
    {
        return ($this->privilege == 1) ? true : false;
    }

    public static function control()
    {
        $view = $_GET['view'];
        $edit_url = 'cpanel?view='.$view.'&action=edit&item=';
        // $add_url='cpanel?view='.$view.'&action=add';
        $delete_url = 'cpanel?view='.$view.'&action=delete&item=';
        $confirm = 'onclick="if(!confirm(\'Do you want to delete this user\'))return false;"';
        $allusers = self::read('SELECT * FROM users WHERE id !='.self::current_user()->id, PDO::FETCH_CLASS, __CLASS__);
        $table = '<div class="content-panel">
	
		<h4>
			<i class="fa fa-angle-right"></i> Users Table '. // <a href="'.$add_url.'" class="btn btn-success pull-right" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add</a>

        '</h4>
		<hr>
		<table class="table table-striped table-advance table-hover">
	
	
			<thead>
				<tr>
					<th><i class="fa fa-bullhorn"></i> #</th>
					<th class="hidden-phone"><i class="fa fa-files-o"></i> User
						Name</th>
					<th><i class=" fa fa-edit"></i> Control</th>
					<th></th>
				</tr>
			</thead>
			<tbody>';
        // var_dump($allusers);
        if ($allusers != false && $allusers !== null) {
            if (is_object($allusers)) {
                $table .= '<tr>
					<td>1</td>
					<td class="hidden-phone">'.$allusers->username.'</td>
	
					<td><a href="'.$edit_url.$allusers->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$allusers->id.'" '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
            } else {
                $i = 1;
                foreach ($allusers as $users) {
                    $table .= '<tr>
					<td>'.$i++.'</td>
					<td class="hidden-phone">'.$users->username.'</td>
		
					<td><a href="'.$edit_url.$users->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$users->id.'"  '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
                }
            }
        } else {
            $table .= '<tr><td colspan="4" style="color:#E95656; text-align:center;" >No users found.. </td></tr>';
        }
        $table .= '</tbody></table></div>';

        return $table;
    }
}
