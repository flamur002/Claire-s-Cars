<?php

class manufacturersController{

    private $manufacturers;

	public function __construct($manufacturers) {
		$this->manufacturers = $manufacturers;
	}


    public function list() {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$categories = $this->manufacturers->findAll();
            $template = 'manufacturers.html.php';
            $var = ['categories' => $categories];
		}

		else {
            $template = 'index2.html.php';
            $var = [];
		}

        return [
            'template' => $template,
            'title' => 'Manufacturers',
            'variables' => $var
        ];
    }

    public function delete(){

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //deletes a manufacturer
            $manu = $this->manufacturers->delete($_POST['id']);
            $template = 'added.html.php';
            $var = ['var' => 'Manufacturer Deleted'];
        }
        else {
            $template = 'index2.html.php';
            $var = [];
        }
        
        return [
            'template' => $template,
            'title' => 'Delete Manufacturer',
            'variables' => $var
        ];
    }

    public function edit() {

        if(isset($_GET['id'])){
            if (isset($_POST['submit'])) {
        //edits a manufacturer
                $criteria = [
                    'name' => $_POST['name'],
                    'id' => $_POST['id']
                ];
                $manu = $this->manufacturers->save($criteria);
                $template = 'added.html.php';
                $var = ['var' => 'Manufacturer Saved'];
        
            }
            else {
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        
                    $currentMan = $this->manufacturers->find('id', $_GET['id'])[0];
                    $template = 'editmanufacturer.html.php';
                    $var = ['currentMan' => $currentMan];
                }
        
                else {
                    $template = 'index2.html.php';
                    $var = [];
                }
        
            }
        }
        else{
            if (isset($_POST['submit'])) {

                //adds a new manufacturer
        
                $criteria = [
                    'name' => $_POST['name']
                ];
        
                $manu = $this->manufacturers->save($criteria);
                $template = 'added.html.php';
                $var = ['var' => 'Manufacturer Saved'];
            }
            else {
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $currentMan = false;
                    $template = 'editmanufacturer.html.php';
                    $var = ['currentMan' => $currentMan];
                }
        
                else {
                    $template = 'index2.html.php';
                    $var = [];
                }
        
            }
        }

        return [
            'template' => $template,
            'title' => 'Save Manufacturer',
            'variables' => $var
        ];
        
    }
    
}