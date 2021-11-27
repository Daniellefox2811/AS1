<?php
session_start();
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
                <ul>
                        <li><a href="addCategory.php">Add Category</a></li>
                        <li><a href="deleteCatagory.php">Delete Category</a></li>
                            <li><a href="adminCategories.php">Admin Categories</a></li>
                            <li><a href="editCategory.php">Edit Category</a></li>
						<?php
                        	$stmt = $pdo->prepare('SELECT * FROM category');

                            $stmt->execute();
                        
                            foreach ($stmt as $row) {
                                echo '<li><a href="category.php?catId=' . $row['catId'] . '">' . $row['catname'] . '</a></li>';
                            }
                        ?>
					</ul>
				</li>
                <li><a href="#">Account</a>
					
                <ul>
						<li><a href="register.php">Register</a></li>
						<li><a href="login.php">Login</a></li>
                        <li><a href="logout.php">Logout</a></li>
					</ul>
                </li>
                <li><a href="#">Article Management</a>
					
                    <ul>
                            <li><a href="addArticle.php">Create article</a></li>
                            <li><a href="deleteArticle.php">Delete article</a></li>
                            <li><a href="adminArticles.php">Admin articles</a></li>
                            <li><a href="editArticle.php">Edit article</a></li>
                        </ul>
                </ul>
                    </li>
                    </ul>
                
		</nav>
		<img src="images/banners/randombanner.php" />
		<main>