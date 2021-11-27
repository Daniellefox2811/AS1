<?php
require 'header.php';
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE article SET title = :title , catId = :catId, 
	content = :content, publishDate = :publishDate, WHERE articleId = :articleId');

$values = [
		'title' => $_POST['title'],
        'content' => $_POST['content'],
        'publishDate' => $date,
        'catId' => $_POST['catname']
	];

	$stmt->execute($values);
	echo 'title ' . $_POST['content'] . ' edited';
}
else if (isset($_GET['articleId'])) {

	$Stmt = $pdo->prepare('SELECT * FROM article WHERE articleId = :articleId');

	$values = [
        'articleId'=> $_GET['articleId']
	];

	$Stmt->execute($values);

	$article = $Stmt->fetch();
}
?>
<form action="editArticle.php" method="POST">
	<input type="hidden" name="articleId" value="<?php echo $article['articleId']; ?>"/>
	<label>title</label>
	<input type="text" name="title"  value="<?php echo $article['title']; ?>" />
    <label>content</label>
	<input type="text" name="content"  value="<?php echo $article['content']; ?>" />
	<?php

		$stmt = $pdo->prepare('SELECT * FROM article');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['title'] == $article['articleId']) {
				echo '<option value="' . $row['title'] . '" selected="selected">' . $row['content'] . '</option>';
                echo '<option value="' . $row['content'] . '" selected="selected">' . $row['content'] . '</option>';
			}}
			

	?>
	</select>

	<input type="submit" name="submit" value="Add" />
</form>
</form>
<?php
require 'footer.php';
?>