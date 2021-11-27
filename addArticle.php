<?php
require 'header.php';
?>


			<article>
				<h2>Add a article</h2>
<?php
if ($_SESSION['Admin']== true) {

                if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('INSERT INTO article(title, catId, content, publishDate )
						   VALUES ( :title, :catId, :content, :publishDate)');

$date = date('d-m-y H:i;s');
	$values = [
		'title' => $_POST['title'],
        'content' => $_POST['content'],
        'publishDate' => $date,
        'catId' => $_POST['catname']
	];
	
	$stmt->execute($values);
    echo '<p>Article created<p>';
}
else 
	?>
				<form action="addArticle.php" method="post">
					<p>Create new article</p>
					<label>title</label> <input type="text" name="title"/>
                    <label>content</label><textarea name="content"></textarea>
                    <label>category</label>
                        <select name="catname">
                            
                    <?php
                        	$stmt = $pdo->prepare('SELECT * FROM category');

                            $stmt->execute();
                            foreach ($stmt as $row) {
                                echo '<option value="'.$row['catId'].'">'.$row['catname'].'</option>';
                            }
                        ?>
/
                    </select>
					<input type="submit" name="submit" value="Add" />
				</form>
			
</article>

<?php
} else {
   echo '<h1>access denied</h1>';
}
require 'footer.php';
?>