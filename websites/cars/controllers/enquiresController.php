<?php

class enquiresController{

    private $enquires;

	public function __construct($enquires) {
		$this->enquires = $enquires;
	}

public function list() {

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if (isset($_POST['enquiryid'])){

            $criteria = [
				'completed' => 'Y',
                'completed_by' => $_SESSION['name'],
                'id' => $_POST['enquiryid']
            ];
    
            $enquiry = $this->enquires->save($criteria);
            $template = 'added.html.php';
            $var = ['var' => 'Enquiry Completed'];
        }
        else{
		$enquiry = $this->enquires->findAll();
        $template = 'enquires.html.php';
        $var = ['enquires' => $enquiry];
        }
	}
    else {
        $template = 'index2.html.php';
        $var = [];
	}

    return [
        'template' => $template,
        'title' => 'Enquires',
        'variables' => $var
    ];

}

public function contact() {
		
    if (isset($_POST['submit'])) {

        $criteria = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'enquiry' => $_POST['enquiry']
        ];
        $enquires = $this->enquires->save($criteria);
        $template = 'contact2.html.php';
        $var = [];
    }
    else {
        $template = 'contact.html.php';
        $var = [];

    }

    return [
        'template' => $template,
        'title' => 'Contact',
        'variables' => $var
    ];

}

}