<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{	
	header('location:index.php');
}
else{
	if(isset($_REQUEST['bkid']))
	{
		$bid=intval($_GET['bkid']);
		$email=$_SESSION['login'];
		$sql ="SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
	}
}
	// if (isset($_POST['submit'])) {
	// 	$bid = $_GET["bid"];
	// 	$totalamount = $_GET['total_amount']
	// 	$sql = "INSERT INTO  tblbill (Total,PaymentType) VALUES (:bid,:totalamount) SELECT BookingId,name FROM tblbooking WHERE bid = $bid";
	// 	$query= $dbh -> prepare($sql);
	// 	$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
	// 	$query-> execute();
	// 	if (!$result) {
	// 		$msg = "Bill Submitted SuccessFully";
	// 	} else {
	// 		$error = "Something went wrong. Please try again";
	// 	}
	// }

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dream Destination | Billing</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
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
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
</head>
<body>
	<!-- top-header -->
	<?php include('includes/header.php'); ?>
	<div class="banner-3">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Dream Destination-Package Details</h1>
		</div>
	</div>
	<!--- /banner ---->

	<!-- Bill Table -->
	<form method="post">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
				<!-- <div class="col-md-6">
					<div class="bill-to">
						<p class="h5 mb-xs text-dark text-semibold"><strong>Invoiced To:</strong></p>
						<address>
							Full Name<br>
							Address<br>
							City <br>
							State - Zip Code<br>
							Country<br>
							Mobile<br>
							<strong>Email:</strong> youemail@domain.com
						</address>
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="bill-data text-right">
						<p class="mb-none">
							<span class="text-dark">Invoice Date:</span>
							<span class="value"><?php echo date("M d Y"); ?></span>
						</p>
						<p class="mb-none">
							<span class="text-dark">Due Date:</span>
							<span class="value"><?php echo date("M d Y"); ?></span>
						</p>
					</div>
				</div>
			</div>	
			<div class="table-responsive">
				<table class="table invoice-items">
					<thead>
						<tr class="h4 text-dark">
							<th id="cell-id" class="text-semibold">#</th>
							<th id="cell-name" class="text-semibold">Name</th>
							<th id="cell-item" class="text-semibold">Package Name</th>
							<th id="cell-children" class="text-semibold">Children</th>
							<th id="cell-adult" class="text-semibold">Adult</th>
							<!-- <th id="cell-total" class="text-semibold">Total Member</th> -->
							<th id="cell-price" class="text-semibold">Price</th>
							<th id="cell-totalamount" class="text-semibold">Total Amount</th>
						</tr>
					</thead>
					<?php 
					$uemail=$_SESSION['login'];;
					$sql = "SELECT tblbooking.BookingId as bid,tblbooking.PackageId as pkgid,tblbooking.name as name,tbltourpackages.PackageName as packagename,tblbooking.children as children,tblbooking.adult as adult,tblbooking.RegDate as RegDate,tbltourpackages.PackagePrice as PackagePrice from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
					$query = $dbh->prepare($sql);
					$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					// if($results->RegDate = date("YYYY MM DD"))
					// {
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
							{	?>
								<tbody>

									<!-- <tr id="prodinv"></tr> -->
									<tr id="prodinv">
										<td class="text-id"><?php echo $cnt; ?></td>
										<td class="text-name"><?php echo htmlentities($result->name);?></td>
										<td class="text-semibold text-dark"><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a></td>
										<td class="text-semibold text-dark"><?php echo htmlentities($result->children);?></td>
										<td class="text-semibold text-dark"><?php echo htmlentities($result->adult);?></td>
										<!-- <td class="text-semibold text-dark"> -->
											<?php 
											$children = $result->children;
											$adult = $result->adult;
											$total = $children + $adult;
											// echo "Total Member = " . $total;
											?>
											<!-- </td> -->
											<td class="text-price amount">
												<?php 
												echo htmlentities($result->PackagePrice);
												$price = $result->PackagePrice;
												$total_amount = $total * $price;
											?></td>
											<td class="text-semibold text-dark"><?php echo $total_amount?></td>
											<?php $cnt++;  ?>
										</tr>
									</tbody>
								<?php } ?>
							</table>
						</div>	
					<?php } ?>
					<div class="row">
						<div class="col-sm-4">

						</div>
						<div class="col-md-4">
							<h2> Invoice Total: <span class="total">Rs <?php echo $total_amount?>.00</span> </h2>
						</div>
						<div class="col-md-4">
							Amount Paid By : 
							<select name="paymenttype" class="form-control">
								<option value="cash">Cash</option>
								<option value="card">Card</option>
							</select>
						</div>
						<div class="md-4" align="center">
							<button type="submit" name="submit" class="btn-primary btn">Submit</button>
						</div>
					</div>	
				</div>
			</div>
		</form>
		<!-- /Bill Table -->

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