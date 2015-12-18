<?PHP
ob_start();
session_start();

include 'includes/conn.php';



if(!isset($_SESSION['form_token'])){


	$location = "login.php";
}
elseif(!isset($_POST['form_token'], $_POST['blog_user_name'], $_POST['blog_user_password'])) {
	$location = 'login.php';
}
elseif($_SESSION['form_token'] != $_POST['form_token']) {

    $location = 'login.php';
}
elseif(strlen($_POST['blog_user_name']) < 2 || strlen($_POST['blog_user_name']) > 25) {
	$location = 'login.php';
}
elseif(strlen($_POST['blog_user_password']) < 5 || strlen($_POST['blog_user_password']) > 25) {
	$location = 'login.php';
}
else {
	
	$blog_user_name = mysql_real_escape_string($_POST['blog_user_name']);

	$blog_user_password = sha1($_POST['blog_user_password']);
    $blog_user_password = mysql_real_escape_string($blog_user_password);

    if($db) {
		$sql = "SELECT
        blog_user_name,
        blog_user_password,
        blog_user_access_level
        FROM
        blog_users
        WHERE
        blog_user_name = '{$blog_user_name}'
        AND
        blog_user_password = '{$blog_user_password}'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) != 1) {

            $location = 'login.php';
        }
        else {
            /*** fetch result row ***/
            $row = mysql_fetch_row($result);

            /*** set the access level ***/
            $_SESSION['access_level'] = $row[2];

            /*** unset the form token ***/
            unset($_SESSION['form_token']);

            /*** send user to index page ***/
            $location = 'index.php';
        }

    }

}
header("Location: $location");
ob_end_flush();
?>