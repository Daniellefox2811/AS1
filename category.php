<?php
require 'header.php';
$stmt = $pdo->prepare('SELECT * FROM article WHERE catId = :catId');
$values = [
    'catId' => $_GET['catId']
];
$stmt->execute($values);

foreach ($stmt as $row) {
    echo '<li><a class="articleLink" a href="article.php?articleId=' . $row['articleId'] . '">' . $row['title'] . '</a>
    <em>'. $row['publishDate'] . ' </em></li>';
}
?>

<?php
require 'footer.php';
?>