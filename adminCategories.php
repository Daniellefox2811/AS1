<?php
require 'header.php';
$stmt = $pdo->prepare('SELECT * FROM category');

$stmt->execute();

foreach ($stmt as $row) {
    echo '<li><a href="category.php?catId=' . $row['catId'] . '">' . $row['catname'] . '</a></li>';
    echo '<a href="deleteCategory.php?catId=' . $row['catId'] . '">delete</a>';
    echo '<br>';
    echo '<a href="editCategory.php">edit</a>';

}
?>
<h1><a href="addCategory.php">Add Category</a></h1>
<?php
require 'footer.php';
?>