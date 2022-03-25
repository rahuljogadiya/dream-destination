<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Dream Destination | Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="css/booking.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="css/confirm.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- Custom Theme files -->
  <script src="js/jquery-1.12.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--animate-->
  <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
</script>
<!--//end-animate-->
<style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }
</style>
</head>

<body>
  <?php include('includes/header.php'); ?>
  <!--- banner ---->
  <div class="banner-3">
    <div class="container">
      <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Dream Destination - Package List</h1>
  </div>
</div>
<!--- /banner ---->

<!-- Book Form -->


<!-- <div class="registration-form">
    <form method="post" action="book_form.php">
        <div class="form-icon">
            <span><i class="icon icon-calendar"></i></span>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control item" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <select class="form-control item mb-4" aria-label="Default select example" name="gender">
                <option selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control item" id="Email" placeholder="name@examle.com">
        </div>
        <div class="form-group">
            <input type="text" name="children" class="form-control item" id="no of children" placeholder="No. Of Children">
        </div>
        <div class="form-group">
            <input type="text" name="adult" class="form-control item" id="no of adult" placeholder="No. Of Adult">
        </div>
        <div class="form-group">
            <textarea class="form-control item" name="message" id="message" cols="45" rows="3" placeholder="Message"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="Book" class="btn btn-block create-account">Book</button>
        </div>
    </form>
    <div class="social-media">

    </div>
</div> -->


<form class="hotel-reservation-form" method="post" action="">
    <h1><i class="far fa-calendar-alt"></i>Hotel Reservation Form</h1>
    <div class="fields">
        <!-- Input Elements -->
        <div class="wrapper">
            <div>
                <label for="arrival">Arrival</label>
                <div class="field">
                    <input id="arrival" type="date" name="arrival" required>
                </div>
            </div>
            <div class="gap"></div>
            <div>
                <label for="departure">Departure</label>
                <div class="field">
                    <input id="departure" type="date" name="departure" required>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div>
                <label for="first_name">First Name</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <input id="first_name" type="text" name="first_name" placeholder="First Name" required>
                </div>
            </div>
            <div class="gap"></div>
            <div>
                <label for="last_name">Last Name</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <input id="last_name" type="text" name="last_name" placeholder="Last Name" required>
                </div>
            </div>
        </div>
        <label for="email">Email</label>
        <div class="field">
            <i class="fas fa-envelope"></i>
            <input id="email" type="email" name="email" placeholder="Your Email" required>
        </div>
        <label for="phone">Phone</label>
        <div class="field">
            <i class="fas fa-phone"></i>
            <input id="phone" type="tel" name="phone" placeholder="Your Phone Number" required>
        </div>
        <div class="wrapper">
            <div>
                <label for="adults">Adults</label>
                <div class="field">
                    <select id="adults" name="adults" required>
                        <option disabled selected value="">--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="gap"></div>
            <div>
                <label for="children">Children</label>
                <div class="field">
                    <select id="children" name="children" required>
                        <option disabled selected value="">--</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Submit">    
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- /Book Form -->

<!--- /footer-top ---->
<?php include('includes/footer.php'); ?>
<!-- signup -->
<?php include('includes/signup.php'); ?>
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php'); ?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php'); ?>
</body>

</html>