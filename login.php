<?php
require 'header.php';
if (isset($_POST['submit'])) {
$stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
$values = [
 'email' => $_POST['email'],
 'password' => $_POST['password']
];
$stmt->execute($values);
if ($stmt->rowCount() > 0) {
$_SESSION['loggedin'] = true;
$_SESSION['Admin'] = true;
    echo 'You are now logged in';
   
} else {
    echo 'invalid login';
}
}
?>
                <form action="login.php" method="post">
                    <h2>Login</h2>
					<p>Enter your login details</p>
					<label>email</label> <input type="text" name="email"/>
					<label>password</label> <input type="text" name="password"/>
                    <input type="submit" name="submit" value="Submit" />
				</form>
			</article>
<?php
require 'footer.php';
?>