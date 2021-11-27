<?php
require 'header.php';
?>


			<article>
				<h2>Latest articles</h2>
            </article>
<?php
	$stmt = $pdo->prepare('SELECT * FROM article');

	$stmt->execute();

	foreach ($stmt as $row) {
		echo '<li><a href="article.php?articleId=' . $row['articleId'] . '">' . $row['title'] . '</a>
        <em>'. $row['publishDate'] . ' </em></li>';
	}
?>
<?php
require 'footer.php';
?>