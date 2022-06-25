<?php

class careersController{

    private $careers;

	public function __construct($careers) {
		$this->careers = $careers;
	}

public function list() {
	//checks if there are any jobs
		$total = $this->careers->count(); 

		if($total == 0){
			$template = 'careers2.html.php';
			$var = [];
		}
		else{
			$jobs = $this->careers->findAll();
			$template = 'careers.html.php';
			$var = ['job' => $jobs];
			//displays all jobs
		}

		return [
			'template' => $template,
            'title' => 'Careers',
			'variables' => $var
		];

}

public function admin(){
	$jobs = $this->careers->findAll();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		//displays all the jobs
			$template = 'careersAdmin.html.php';
			$var = ['job' => $jobs];
	}
	else {
			$template = 'index2.html.php';
			$var = [];
	}

	return [
		'template' => $template,
		'title' => 'Admin Careers',
		'variables' => $var
	];

}

public function add() {
	$jobs = $this->careers->findAll();

	if (isset($_POST['submit'])) {

		//adds a job 

		$criteria = [
			'title' => $_POST['title'],
			'description' => $_POST['description']
		];
		$jobs = $this->careers->save($criteria);

		$template = 'added.html.php';
		$var = ['var' => 'Job Added'];

	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$template = 'addjob.html.php';
			$var = [];
		}
		else {
			$template = 'index2.html.php';
			$var = [];

		}

	}

	return [
		'template' => $template,
		'title' => 'Add Job',
		'variables' => $var
	];


}

public function delete(){

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		//deletes a job 
		$job = $this->careers->delete($_POST['id']);
		$template = 'added.html.php';
		$var = ['var' => 'Job Deleted'];
	}
	else {
		$template = 'index2.html.php';
		$var = [];
	}
	
	return [
		'template' => $template,
		'title' => 'Delete Job',
		'variables' => $var
	];
}


}    ?>