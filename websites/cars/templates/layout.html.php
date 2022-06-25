<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Claires's Cars - <?=$title?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: CLOSED</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/cars/list">Showroom</a></li>
            <li><a href="/careers/list">Careers</a></li> 
            <li><a href="/admins/login">Admin</a></li>
			<li><a href="/enquires/contact">Contact us</a></li>
			<li><a href="/news/about">About Us</a></li>    
		</ul>
	</nav>
		<img src="/images/randombanner.php"/>

        <?=$output?>

        <footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>