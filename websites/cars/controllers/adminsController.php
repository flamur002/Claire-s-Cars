<?php

class adminsController{

    private $admins;

	public function __construct($admins) {
		$this->admins = $admins;
	}

    public function login() {
		$stmt = $this->admins->findAll();

        if (isset($_POST['submit'])) {
            // checks if the password entered belongs to any of the admins
            foreach($stmt as $row){
                if($row['password']==sha1($_POST['password'])){
                    $_SESSION['loggedin'] = true;	
                    $_SESSION['name'] = $row['name'];
                }
            }
    
        }
        
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $template = 'indexAdmin.html.php';
            $var = [];
        }
        else {
            $template = 'index2.html.php';
            $var = [];
        }
        return [
			'template' => $template,
			'title' => 'Log-In',
			'variables' => $var
		];


	}

    public function list(){
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
            //finds all the admins
			$admins = $this->admins->findAll();
            $template = 'manageadmins.html.php';
            $var = ['admins' => $admins];   
		}
		else {
            $template = 'index2.html.php';
            $var = [];
		}
        return [
			'template' => $template,
			'title' => 'Admins',
			'variables' => $var
		];


    }

    public function delete(){

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$admin = $this->admins->delete($_POST['id']);
            $template = 'added.html.php';
            $var = ['var' => 'Admin Deleted'];
		}
		else {
            $template = 'index2.html.php';
            $var = [];
		}

        return [
			'template' => $template,
			'title' => 'Delete Admin',
			'variables' => $var
		];
    }

    public function edit() {

        if(isset($_GET['id'])){
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        
                $admin = $this->admins->find('admin_id', $_GET['id']);
                $template = 'editadmin.html.php';
                $var = ['admin' => $admin[0]];
            }
            else {
                $template = 'index2.html.php';
                $var = [];
            }
        }
        else{
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $admin = false;
                    $template = 'editadmin.html.php';
                    $var = ['admin' => $admin];
                }
                else {
                    $template = 'index2.html.php';
                    $var = [];
                }
        }
        if (isset($_POST['submit'])) {
        
                if( $_POST['id'] != '' ){
                    if($_POST['password'] != ''){
                    $criteria = [
                    'admin_id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'password' => sha1($_POST['password'])
                    ];
                    }
                    else{
                        $criteria = [
                            'admin_id' => $_POST['id'],
                            'name' => $_POST['name']
                            ];
                    }
                }
                else{
                    $criteria = [
                        'name' => $_POST['name'],
                        'password' => sha1($_POST['password'])
                    ];
                }
        
                
                $admin = $this->admins->save($criteria);
                $template = 'added.html.php';
                $var = ['var' => 'Admin Saved'];
        }

        return [
			'template' => $template,
			'title' => 'Save Admin',
			'variables' => $var
		];
    }

    public function logout() {
        unset($_SESSION['loggedin']);
        return [
			'template' => 'index2.html.php',
			'title' => 'Log-In',
			'variables' => []
		];
    }



}    ?>