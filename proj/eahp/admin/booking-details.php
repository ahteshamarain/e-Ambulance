<?php  
session_start();
include('includes/dbconnection.php');

// Check if neither admin nor driver is logged in
if (!isset($_SESSION['eahpaid']) && !isset($_SESSION['driverid'])) {
    header('location:logout.php');
    exit();
} else {

    if (isset($_POST['submit'])) {
        $bookingnum = $_GET['bookingnum'];
        $remark = $_POST['remark']; 
        $status = $_POST['status'];
        $ambregno2 = $_POST['ambregno'];

        if ($ambregno2 != ''):
            $ambulanceregnum = $_POST['ambregno'];
        else:
            $ambulanceregnum = $_POST['ambulanceregnum'];
        endif;

        // Update ambulance and hiring records
        $updateQuery1 = mysqli_query($con, "UPDATE tblambulance SET status='$status' WHERE AmbRegNum='$ambulanceregnum'");
        $updateQuery2 = mysqli_query($con, "UPDATE tblambulancehiring SET Status='$status', Remark='$remark', AmbulanceRegNo='$ambulanceregnum' WHERE BookingNumber='$bookingnum'");
        // Insert tracking history
        $insertQuery = mysqli_query($con, "INSERT INTO tbltrackinghistory(BookingNumber, AmbulanceRegNum, Remark, Status) VALUES ('$bookingnum', '$ambulanceregnum', '$remark', '$status')");

        if ($updateQuery1 && $updateQuery2 && $insertQuery) {
            echo '<script>alert("Request Status Has been updated.")</script>';
            echo "<script type='text/javascript'> document.location ='all-amublance-request.php'; </script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }
?>

<!DOCTYPE html>
<head>
<title>EAHP || Booking Details</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <?php include_once('includes/header.php');?>
    <!--header end-->
    <!--sidebar start-->
    <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Booking Details for an Ambulance
                    </div>
                    <div>
<?php
$id = $_GET['id'];   
$ret = mysqli_query($con, "SELECT * FROM tblambulancehiring WHERE ID = '$id'");
while ($row = mysqli_fetch_array($ret)) {
    $arnum = $row['AmbulanceRegNo'];
?>
<table border="1" class="table table-bordered mg-b-0">
    <tr align="center">
        <th colspan="6" style="font-size:20px;color:blue;text-align: center;">
            View Request Details of #<?php echo $row['BookingNumber']; ?></th>
    </tr>
    <tr>
        <th>Patient Name</th>
        <td><?php echo $row['PatientName']; ?></td>
        <th>Relative Name</th>
        <td><?php echo $row['RelativeName']; ?></td>
    </tr>
    <tr>
        <th>Relative Contact Number</th>
        <td><?php echo $row['RelativeConNum'];?></td>
        <th>Hiring Date</th>
        <td><?php echo $row['HiringDate'];?></td>
    </tr>
    <tr>
        <th>Hiring Time</th>
        <td><?php echo $row['HiringTime'];?></td>
        <th>Booking Date</th>
        <td><?php echo $row['BookingDate'];?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $row['Address'];?></td>
        <th>City</th>
        <td><?php echo $row['City'];?></td>
    </tr>
    <tr>
        <th>State</th>
        <td><?php echo $row['State'];?></td>
        <th>Message</th>
        <td><?php echo $row['Message'];?></td>
    </tr>
    <tr>
        <th>Hospital</th>
        <td colspan="3"><?php echo $row['hospital'];?></td>
    </tr>
</table>
<?php } ?>

<?php 
$bookingnum = $_GET['bookingnum'];
$query1 = mysqli_query($con, "SELECT Remark, Status, UpdationDate, BookingNumber, AmbulanceRegNum FROM tbltrackinghistory WHERE BookingNumber='$bookingnum'");
$count = mysqli_num_rows($query1);
if ($count > 0) {
?>
    <div class="col-12">
        <table class="table table-bordered" border="1" width="100%">
            <tr>
                <th colspan="6" style="text-align:center;">Tracking History</th>
            </tr>
            <tr>
                <th>Remark</th>
                <th>Status</th>
                <th>Ambulance Registration Number</th>
                <th>Action Date</th>
            </tr>
            <?php 
            while ($row1 = mysqli_fetch_array($query1)) { ?>
                <tr>
                    <td><?php echo htmlentities($row1['Remark']);?></td>
                    <td><?php
                        $pstatus = $row1['Status'];  
                        if ($pstatus == "") { ?>
                            <span class="badge badge-info">New</span>
                        <?php } elseif ($pstatus == "Assigned") { ?>
                            <span class="badge badge-primary">Assigned</span>
                        <?php } elseif ($pstatus == "On the way") { ?>
                            <span class="badge badge-primary">On the Way</span>
                        <?php } elseif ($pstatus == "Pickup") { ?>
                            <span class="badge badge-success">Patient Picked</span>
                        <?php } elseif ($pstatus == "Reached") { ?>
                            <span class="badge badge-success">Reached</span>
                        <?php } elseif ($pstatus == "Rejected") { ?>
                            <span class="badge badge-danger">Rejected</span>
                        <?php } ?>
                    </td>
                    <td><?php echo htmlentities($row1['AmbulanceRegNum']);?></td>
                    <td><?php echo htmlentities($row1['UpdationDate']);?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<!-- Administrator and Driver Specific Actions -->
<?php 
// Determine available status options based on current status
$statusOptions = [];
if ($pstatus == "") {
    $statusOptions = [
        'Assigned' => 'Assigned',
        'Rejected' => 'Rejected'
    ];
} elseif ($pstatus == "Assigned") {
    $statusOptions = ['On the way' => 'On the way'];
} elseif ($pstatus == "On the way") {
    $statusOptions = ['Pickup' => 'Pick Patient'];
} elseif ($pstatus == "Pickup") {
    $statusOptions = ['Reached' => 'Reached'];
}

if (count($statusOptions) > 0) { ?>
    <table border="1" class="table table-bordered mg-b-0">
        <tr>
            <td colspan="6" style="font-size:18px;text-align: center;color: blue;">
                <?php if (isset($_SESSION['eahpaid'])): ?>
                    Administrator Work
                <?php else: ?>
                    Driver Actions
                <?php endif; ?>
            </td>
        </tr>
        <form method="post" name="submit">
            <input type="hidden" name="ambregno" value="<?php echo $arnum;?>">
            <tr>
                <th>Status :</th>
                <td>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Choose Status</option>
                        <?php foreach ($statusOptions as $value => $label): ?>
                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <?php if (isset($_SESSION['eahpaid']) && $pstatus == "") { ?>
                <tr id="assign">
                    <th>Assign To :</th>
                    <td>
                        <select name="ambulanceregnum" id="ambulanceregnum" class="form-control">
                            <option value="">Select</option>
                            <?php 
                            $query = mysqli_query($con, "SELECT * FROM tblambulance WHERE Status IS NULL OR Status='Reached'");
                            while ($row3 = mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $row3['AmbRegNum'];?>">
                                    <?php 
                                    $atype = $row3['AmbulanceType'];  
                                    if ($atype == "1") {
                                        echo "Basic Life Support (BLS) Ambulances";
                                    } elseif ($atype == "2") {
                                        echo "Advanced Life Support (ALS) Ambulances";
                                    } elseif ($atype == "3") {
                                        echo "Mortuary Ambulances";
                                    } ?>
                                    (<?php echo $row3['AmbRegNum'];?>)
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <th>Remark :</th>
                <td>
                    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required></textarea>
                </td>
            </tr>

            <tr align="center">
                <td colspan="2">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </td>
            </tr>
        </form>
    </table>
<?php } ?>
</div>
</div>
</div>
</section>
<!--footer start-->
<?php include_once('includes/footer.php');?>
<!--footer end-->
</section>
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>

<?php } ?>
