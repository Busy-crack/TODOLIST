<?php
session_start();
include("db_connect.php");
if($_SERVER['REQUEST_METHOD'] !== "POST"){
    goto display;
}

if(!isset($_POST["login"]) || !isset($_POST["password"])){
    $error = "Veuillez remplir tous les champs";
    goto display;
}

$request = $db->prepare("SELECT * FROM user WHERE login= :login");
$request->execute([
    'login' => $_POST["login"]
]);
$user = $request->fetch();


if($user === null){
    goto display;
}

$ok = password_verify($_POST["password"], $user["password"]);

if(!$ok){
    $error = "Login ou mot de passe invalide";
    goto display;
}

$_SESSION["user"] = $user;
header("Location: index.php");
exit;


display :

?>

<!DOCTYPE html>
<html>
<head>Login</head>
<body>
<title>Login</title>
    <form action="login.php" method="POST">
        <label for="login">Adresse e-mail</label>
        <input type="email" name="login">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <label for="password">Répéter le mot de passe</label>
        <input type="password" name="password">
        <input type="submit">
    </form>
    </body>
</html>