<?php
require 'header.php';
$stmt = $pdo->prepare('DELETE FROM article WHERE articleId = :articleId');
$values = [
    'articleId' => $_GET['articleId']
];

$stmt->execute($values);
echo 'article has been deleted';

?>

<?php
require 'footer.php';
?>