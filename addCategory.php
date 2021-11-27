<?php
require 'header.php';
?>


<article>
	<h2>Add a category</h2>
        <?php
             if (isset($_POST['submit'])) {
	         $stmt = $pdo->prepare('INSERT INTO category(catname) VALUES ( :catname)');
            $values = [
		    'catname' => $_POST['catname']
	        ];
	
	        $stmt->execute($values);
            echo '<p>Category created<p>';
}else 
	    ?>
				<form action="addCategory.php" method="post">
					<p>Please enter a new category name</p>
					<label>Category Name</label> <input type="text" name="catname"/>

					<input type="submit" name="submit" value="Add" />
				</form>
			
</article>
<?php
require 'footer.php';
?>