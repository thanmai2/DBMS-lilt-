

<?php
if(isset($_POST['deleteButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->delete($username);

	if($result == true) {
		
		header("Location: index.php");
	}

}
?>