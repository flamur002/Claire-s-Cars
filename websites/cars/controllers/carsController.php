<?php

class carsController{

    private $cars;
    private $manufacturers;

	public function __construct($cars, $manufacturers) {
		$this->cars = $cars;
        $this->manufacturers = $manufacturers;

	}

    public function list() {
        $stmt = $this->manufacturers->findAll();

        if(!isset($_GET['manufacturerId'])){
            $car = $this->cars->find('archived','N');
            }
            else{
                $car = $this->cars->findWhere('manufacturerId', $_GET['manufacturerId'], 'archived','N');
            }

		return [
			'template' => 'cars.html.php',
            'title' => 'Cars',
			'variables' => [
                'cars' => $car,
                'manufacturers' => $stmt
            ]
		];

	}

    public function admin() {

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $car = $this->cars->find('archived','N');
            $template = 'carsAdmin.html.php';
            $var = ['cars' => $car];
        }
        else{
            $template = 'index2.html.php';
            $var = [];
        }

		return [
			'template' =>$template,
            'title' => 'Cars',
			'variables' => $var
		];

	}

    public function archive() {

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            if (isset($_POST['id'])){

                //archive car
    
                $criteria = [
                    'id' => $_POST['id'],
                    'archived' => 'Y'
                ];
    
                $car = $this->cars->save($criteria);
                $template = 'added.html.php';
                $var = ['var' => 'Car Archived'];
    
            }
            else if(isset($_POST['archive'])){

                //unarchive car
                $criteria = [
                    'id' => $_POST['carid'],
                    'archived' => 'N'
                ];
                $car = $this->cars->save($criteria);

                $template = 'added.html.php';
                $var = ['var' => 'Car Uploaded'];
    
            }
            else{
                //show all archived cars
                $car = $this->cars->find('archived','Y');
                $template = 'archive.html.php';
                $var = ['cars' => $car];
            }
    
        }
        else {
                $template = 'index2.html.php';
                $var = [];
        }

        return [
			'template' => $template,
			'title' => 'Archive',
			'variables' => $var
		];

    }

    public function delete(){

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

            //deletes a car
			$car = $this->cars->delete($_POST['id']);
            $template = 'added.html.php';
            $var = ['var' => 'Car Deleted'];
            //deletes a car
		}
		else {
            $template = 'index2.html.php';
            $var = [];
		}
        
        return [
			'template' => $template,
			'title' => 'Delete Car',
			'variables' => $var
		];
    }
 
    public function edit() {
        if(isset($_GET['id'])){

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $car = $this->cars->find('id', $_GET['id'])[0];
                $stmt = $this->manufacturers->findAll();
                $template = 'editcar.html.php';
                $var = ['stmt' => $stmt, 'car' => $car];
            }
            else {
                $template = 'index2.html.php';
                $var = [];
            }
        }
        else{
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $stmt = $this->manufacturers->findAll();
                $car = false;
                $template = 'editcar.html.php';
                $var = ['stmt' => $stmt, 'car' => $car];
            }
            else {
                $template = 'index2.html.php';
                $var = [];
            }
        }
        
        if (isset($_POST['submit'])) {
                    if(isset($_POST['id']) && $_POST['id'] != '' ){
                        //updates a car
        
                        $criteria = [
                            'name' => $_POST['name'],
                            'description' => $_POST['description'],
                            'price' => $_POST['price'],
                            'manufacturerId' => $_POST['manufacturerId'],
                            'id' => $_POST['id'],
                            'mileage' => $_POST['mileage'],
                            'fuel' => $_POST['fuel']
                        ];
                
                        $car = $this->cars->find('id', $_POST['id'])[0];
                          if($car['price'] > $_POST['price']){
                              $criteria2 = [
                                  'oldprice' => $car['price'],
                                  'id' => $_POST['id']
                              ];
                          }
                          else{
                            $criteria2 = [
                                'oldprice' => '',
                                'id' => $_POST['id']
                            ];
                          }
                
                          $stmt = $this->cars->save($criteria2);
                          $car = $this->cars->save($criteria);


                          $num = 1;
                          foreach($_FILES['image']['name'] as $key=>$val){
                              $file=$_POST['id'].'_'.$num.'.jpg';
                              move_uploaded_file($_FILES['image']['tmp_name'][$key],'../public/images/cars/' . $file);
                              $num++;
                          }
                
                    }
                    else{

                        //adds a car
        
                        $criteria = [
                            'name' => $_POST['name'],
                            'description' => $_POST['description'],
                            'price' => $_POST['price'],
                            'manufacturerId' => $_POST['manufacturerId'],
                            'mileage' => $_POST['mileage'],
                            'fuel' => $_POST['fuel'],
                            'added_by' => $_SESSION['name']
                        ];
                        $car = $this->cars->insert($criteria); 
                
                        $car = $this->cars->findId();
                        $num = 1;
                        foreach($_FILES['image']['name'] as $key=>$val){
                            $file=$car.'_'.$num.'.jpg';
                            move_uploaded_file($_FILES['image']['tmp_name'][$key],'../public/images/cars/' . $file);
                            $num++;
                        }

                    }
                   $template = 'added.html.php';
                   $var = ['var' => 'Car saved'];
        

        }

        return [
			'template' => $template,
			'title' => 'Save Car',
			'variables' => $var
		];

    }

}    
?>