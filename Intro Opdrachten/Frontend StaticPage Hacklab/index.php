<!DOCTYPE html>
<html lang="nl">
<head>	
	<title>Hacklab :: Hacklab</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/resources/css/style.css">
	<link rel="shortcut icon" href="/resources/images/favicon.png" type="image/x-icon"/>
   	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   	<link href="https://fonts.cdnfonts.com/css/kreadon" rel="stylesheet">
    	<link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet">
</head>

<body>
	<header>
		<div class="bx bx-menu" id="menu-icon"></div>

		<a href="/home"><img class="logo" src="/resources/images/hacklab-logo.svg" alt="Logo met tekst"></a>
			
			<ul class="navlist">
				<li><a href="/home">Home</a></li>
				<li><a href="/home">Over Hacklab</a></li>
				<li><a href="/home">Blog</a></li>
				<li>
					<div class="dropdown">Stacks <span class="caret">⌵</span>
						<div class="dropdown-content">
							<a href="#">Ethical Hacking</a>
							<a href="#">Front-End Development</a>
							<a href="#">Back-End Development</a>
 						</div>
					</div>
				</li>
				<li><a href="/home" class="btn-contact"><span>Contact</span></a></li>
			</ul>


						
			<div class="dropdown_navlist">
				<li><a href="/home">Home</a></li>
				<li><a href="/home">Over Hacklab</a></li>
				<li><a href="/home">Blog</a></li>
				<li><a href="#">Stacks <span class="caret">⌵</span></a></li>
					<li class="dropdown-tab"><a href="/home">Ethical Hacking</a></li>
					<li class="dropdown-tab"><a href="/home">Front-End Development</a></li>
					<li class="dropdown-tab"><a href="/home">Back-End Development</a></li>
				<li><a href="/home" class="btn-contact"><span>Contact</span></a></li>
			</div>
	</header>

	<?php
		$parts = parse_url($_SERVER['REQUEST_URI'] ?? '/');
		$path = $parts['path'] ?? '/';

		$segments = explode('/', trim($path, '/'));
		$contentUrl = $segments[0] ?? 'home';

		$contentUrl = preg_replace('/[^a-zA-Z0-9_-]/', '', $contentUrl);
		if (empty($contentUrl)) {
			$contentUrl = 'home';
		}

		$contentDir = __DIR__ . '/content';

		$contentFiles = scandir($contentDir) ?: [];

		$validPages = [];
		foreach ($contentFiles as $file) {
			$filePath = $contentDir . '/' . $file;

			$pathInfo = pathinfo($file);
			if (!isset($pathInfo['extension']) || !in_array($pathInfo['extension'], ['php', 'html'])) {
				continue;
			}

			$validPages[$pathInfo['filename']] = $file;
		}

		if (isset($validPages[$contentUrl])) {
			include $contentDir . '/' . $validPages[$contentUrl];
		} else {
			include $contentDir . '/404.html';
		}
	?>

	<footer>
		<div class="footer-left">Copyright © 2025 — Hacklab</div>
		<div class="footer-right"><a href="/home">Privacy policy</a></div>
	</footer>
</body>
<script src="resources/js/home.js"></script> 
</html>
