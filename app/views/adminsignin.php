<?php
// Insert Model objects varibles, $model is defined in the Controller
include V_ROOT . 'includes/header.php';

?>

<h1>Sign in</h1>

<form method="post" action="<?=HOME_URL.'AdminSignIn/logIn'?>">

    <label>Username: </label>
    <input type="text" name="username">
    <label>Password: </label>

    <input type="password" name="password">
    <input type="submit" value="Log in">


</form>

<?php include V_ROOT . 'includes/footer.php'; ?>