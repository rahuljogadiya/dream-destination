<?php
session_start();
error_reporting(0);
include('includes/config.php');
$name = $email = $gender = $children = $adult = $message = $status = "";

if (isset($_POST['submit'])) {
  $pid = intval($_GET['pkgid']);
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $gender = test_input($_POST["gender"]);
  $children = test_input($_POST["children"]);
  $adult = test_input($_POST["adult"]);
  $message = test_input($_POST["message"]);
  $status = 0;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$sql="INSERT INTO book (PackageId, name, gender, email, children, adult, message ,status) VALUES ('".$pid."','".$name."', '".$gender."', '".$email."', '".$children."', '".$adult."', '".$message."', '".$status."')";
  if (!$result = $dbh->query($sql)) {
    $error = "Something went wrong. Please try again";
  } else {
    $msg = "Booked Successfully";
  }
?>
<?php if ($error) { ?>
    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
     </div><?php } 
     else if ($msg)
      { ?><div class="succWrap"><strong>SUCCESS</strong>
        <?php echo htmlentities($msg); ?> </div><?php } ?>