<?php
require 'header.php';
	$stmt = $pdo->prepare('SELECT * FROM article WHERE articleId = :articleId');
    $values = [
		'articleId' => $_GET['articleId']
	];

	$stmt->execute($values);

    $stmt = $stmt->fetch();
    echo '<h1>'.$stmt['title'].'</h1>';
    echo '<em>'.$stmt['publishDate'].'</em>';
    echo '<p>'.$stmt['content'].'</p>';
?>
			<article>
<?php
               if (isset($_POST['submit'])) {
                $stmt = $pdo->prepare('INSERT INTO comment(commentId, articleId)
                                       VALUES ( :commentId, :articleId)');
            
            
                $values = [
                    'commentId' => $_POST['commentId'],
                    'articleId' => $_GET['articleId']
                ];
                $stmt->execute($values);
                echo '<p>comment created<p>';

} 
	?>
				<form action=<?php echo "article.php?articleId={$stmt['articleId']}";
                ?> method="post">
                <textarea name="commentId" value="commentbox" >
                </textarea>
                <input type="submit" value="Submit" name="submit" />
                </form>
</article>
<?php
$stmt = $pdo->prepare('SELECT * FROM comment');

$stmt->execute();

foreach ($stmt as $row) {
    echo '<li>'.$row['commentId'] . '>'.'</li>';
}
require 'footer.php';
?>
