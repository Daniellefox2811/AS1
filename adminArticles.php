<?php
require 'header.php';
$stmt = $pdo->prepare('SELECT * FROM article');

$stmt->execute();

foreach ($stmt as $row) {
    echo '<li><a href="article.php?articleId=' . $row['articleId'] . '">' . $row['title'] . '</a>
    <em>'. $row['publishDate'] . ' </em></li>';
    echo '<a href="deleteArticle.php?articleId=' . $row['articleId'] . '">delete</a>';
    echo '<br>';
    echo '<a href="editArticle.php?articleId=' . $row['articleId'] . '">edit</a>';

}
?>
<h1><a href="addArticle.php">Add Article</Article></a></h1>
<?php
require 'footer.php';
?>
