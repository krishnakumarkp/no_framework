<?PHP

error_reporting(E_ALL);

session_start();

include 'includes/header.php';

$errors = array();

if(!isset($_SESSION['form_token'])) {
    $errors[] = 'invalid form tokens';
}
elseif (!isset($_POST['form_token'], $_POST['blog_user_name'], $_POST['blog_user_password'], $_POST['blog_user_password2'], $_POST['blog_user_email'])) {
    $errors[] = 'All fields are required';

}
elseif ($_SESSION['form_token'] != $_POST['form_token']) {
    $errors[] = 'You may only post once';
}
elseif (strlen($_POST['blog_user_name']) <= 2 || strlen($_POST['blog_user_name']) > 25) {
    $errors[] = 'Invalid User Name';
}
elseif (strlen($_POST['blog_user_password']) <= 5 || strlen($_POST['blog_user_password']) > 25) {
    $errors[] = 'Invalid password';
}
elseif(strlen($_POST['blog_user_email']) < 4 || strlen($_POST['blog_user_email']) > 254) {
    $errors[] = 'Invalid Email';
}
elseif(!preg_match("/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU", $_POST['blog_user_email'])) {
    $errors[] = 'Email Invalid';
}
else {
	include 'includes/conn.php';

	$blog_user_name = mysql_real_escape_string($_POST['blog_user_name']);
    $blog_user_password = sha1($_POST['blog_user_password']);
    $blog_user_password = mysql_real_escape_string($blog_user_password);
    $blog_user_email =  preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $_POST['blog_user_email'] );
    $blog_user_email = mysql_real_escape_string($blog_user_email);

    

    if($db) {
        $sql = "select blog_user_name, blog_user_email from blog_users where blog_user_name = '{$blog_user_name}' or blog_user_email = '{$blog_user_email}'";

        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if($row[0] == $blog_user_name) {
            $errors[] = "username is already in use";
        }
        elseif($row[1] == $blog_user_email) {
            $errors[] = 'Email address already subscribed';
        }
        else {

            $sql = "insert into blog_users(
                blog_user_name,
                blog_user_password,
                blog_user_email,
                blog_user_access_level
            )
            values (
                '{$blog_user_name}',
                '{$blog_user_password}',
                '{$blog_user_email}',
                1
            )";


            if(mysql_query($sql)) {
                unset($_SESSION['form_token']);

            }
            else {
                $errors[] = 'User Not Added';
            }

        }

    }
    else {
        $errors[] = 'Unable to process form';
    }

}


if(sizeof($errors) > 0) {
    foreach($errors as $err) {
        echo $err,'<br />';
    }
}
else {
    echo 'Sign up complete<br />';
    echo 'user is added '.$blog_user_email;
}

/*** include the footer file ***/
include 'includes/footer.php';

?>

