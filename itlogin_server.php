<?php
session_start();

$id = "";
$name = "";
$username = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'E_KANBAN');


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['admin_id'] = $id;
      $_SESSION['admin_username'] = $username;
      header('location: employee.php');
    } else {
      echo '<script>alert("Password Incorrect.")</script>';
    }
  }
}
