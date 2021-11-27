<?php
require 'header.php';
?>


			<article>
				<h2>Account creation</h2>
				<p>Create an account to:</p>

				<ul>
					<li>Add, manage and delete articles</li>
					<li>Add, manage and delete catagories</li>
				</ul>
<?php
                if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('INSERT INTO user(email, password, name)
						   VALUES ( :email, :password, :name)');


	$values = [
		'email' => $_POST['email'],
		'password' => $_POST['password'],
		'name' => $_POST['name']
	];
	
	$stmt->execute($values);
    echo '<p>Account created<p>';
}
else 
	?>
				<form action="register.php" method="post">
					<p>Enter details below to create an account:</p>
					<label>email</label> <input type="text" name="email"/>
					<label>password</label> <input type="text" name="password" />
                    <label>name</label> <input type="text" name="name" />

					<input type="submit" name="submit" value="Submit" />
				</form>
			
</article>

<?php
require 'footer.php';
?>