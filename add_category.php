<?php
ob_start();
session_start();

include 'includes/header.php';

if(!isset($_SESSION['access_level']) || $_SESSION['access_level'] != 5)
{
    header("Location: index.php");
    exit;
}
else
{
    $form_token = uniqid();
    $_SESSION['form_token'] = $form_token;
}

?>

<h3>Add Category</h3>
<p>
Category names must contain only alpha numeric characters and underscore, space or comma.
</p>
<form action="add_category_submit.php" method="post">
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<input type="text" name="blog_category_name" />
<input type="submit" value="Add Category" />
</form>

<?php
    include 'includes/footer.php';
    ob_end_flush();
?>
