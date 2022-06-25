<?php

class newsController{

    private $news;

	public function __construct($news) {
		$this->news = $news;
	}

public function home() {

	//show all news
		$stories = $this->news->findAll();

		return [
			'template' => 'index.html.php',
            'title' => 'Home',
			'variables' => [
                'news' => $stories
            ]
		];

}

    public function about() {

		//about page

		return [
			'template' => 'about.html.php',
            'title' => 'About',
            'variables' => []
		];

	}

	public function add(){

		if (isset($_POST['submit'])) {

			//add new story
			$criteria = [
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'date' => date('Y/m/d'),
				'author' => $_SESSION['name']
			];
	
			$story = $this->news->save($criteria);
	
			if ($_FILES['image']['error'] == 0) {
				$pdo = new PDO('mysql:dbname=mysql;host=mysql', 'student' , 'student');

				$story = $this->news->findId();
				$fileName = $story . '.jpg';
				move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/news/' . $fileName);
			}

			$var = ['var' => 'News Added'];
			$template = 'added.html.php';
		}
		else {
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				$var = [];
				$template = 'addnews.html.php';
			}
			else {
				$var = [];
				$template = 'index2.html.php';
			}
		}

		return [
			'template' => $template,
			'title' => 'Add News',
			'variables' => $var
		];

	}

	public function delete(){

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	//delete story
			$stories = $this->news->delete($_POST['id']);
			$template = 'added.html.php';
			$var = ['var' => 'News Deleted'];
		}
		else {
			$template = 'index2.html.php';
			$var = [];
		}
		
		return [
			'template' => $template,
			'title' => 'Delete News',
			'variables' => $var
		];
	}

public function admin(){

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		//show all stories
		$stories = $this->news->findAll();
		$template = 'news.html.php';
		$var = ['news' => $stories];
	}

	else {
		$template = 'index2.html.php';
		$var = [];
	}

	return [
		'template' => $template,
		'title' => 'News',
		'variables' => $var
	];

}


}    

?>