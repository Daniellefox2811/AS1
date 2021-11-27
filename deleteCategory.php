<?php
require 'header.php';
$stmt = $pdo->prepare('DELETE FROM category WHERE catId = :catId');
$values = [
    'catId' => $_GET['catId']
];

$stmt->execute($values);
echo 'category has been deleted';
?>

<?php
require 'footer.php';
?>