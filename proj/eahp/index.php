<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit'])) {
    
    $bookingnum = mt_rand(100000000, 999999999);
    $pname = $_POST['pname'];
    $rname = $_POST['rname'];
    $phone = $_POST['phone'];
    $hospital = $_POST['hospitals'];
    $hdate = $_POST['hdate'];
    $htime = $_POST['htime'];
    $ambulancetype = $_POST['ambulancetype'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $message = $_POST['message'];
    $location = $_POST['user_location'];

   
    $query = mysqli_query($con, "INSERT INTO tblambulancehiring (BookingNumber, PatientName, RelativeName, RelativeConNum, hospital, HiringDate, HiringTime, AmbulanceType, Address, City, State, Message, UserLocation) VALUES ('$bookingnum', '$pname', '$rname', '$phone', '$hospital', '$hdate', '$htime', '$ambulancetype', '$address', '$city', '$state', '$message', '$location')");

    if ($query) {
        echo "<script>alert('Your request has been sent successfully. Your Booking Number is: $bookingnum');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Emergancy Ambulance Hiring Portal || Home Page</title>
 
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    #googleMap {
            width: 100%;
            height: 400px;
        }
</style>
<body>

 <?php include_once('includes/header.php');?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Welcome to <span>Emergency Ambulance Hiring Portal</span></h2>
  
            <a href="#appointment" class="btn-get-started scrollto">Hire Ambulance</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Welcome to <span>Emergency Ambulance Hiring Portal</h2>
        
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Welcome to <span>Emergency Ambulance Hiring Portal</h2>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Life Support</a></h4>
         
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4 class="title"><a href="">Medical Support</a></h4>
 
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-thermometer"></i></div>
              <h4 class="title"><a href="">Emergency Kit</a></h4>
         
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-baby"></i></div>
              <h4 class="title"><a href="">NICU Support
              </a></h4>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>In an emergency? Need help now?</h3>
          <a class="cta-btn scrollto" href="#appointment">Hire an Ambulance</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <p><?php  echo $row['PageDescription'];?></p><?php } ?>
        </div>

      

      </div>
    </section><!-- End About Us Section -->

    
    <section id="appointment" class="appointment section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Hire an Ambulance</h2>
        </div>
        <form action="" method="post" role="form" class="form-control">
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-3 form-group">
                    <input type="text" name="pname" class="form-control" id="pname" placeholder="Enter Patient Name" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" name="rname" class="form-control" id="rname" placeholder="Enter Relative Name" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Relative Phone Number" required>
                </div>
                <div class="col-md-3 form-group d-flex">
    <input name="user_location" type="text" class="form-control me-2" id="userLocation" placeholder="click to side icon" readonly>
    <button type="button" class="btn btn-secondary btn-sm" id="useLocation">
        <i class="fas fa-location-arrow"></i>
    </button>
</div>

            </div>

            <div class="row" style="padding-top: 10px;"> <!-- Added padding here -->
                <div class="col-md-3 form-group">
                    <input type="text" name="hospitals" class="form-control" id="hospitalSearch" placeholder="Search for hospitals" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="date" name="hdate" class="form-control datepicker" id="hdate" placeholder="Hiring Date" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="time" name="htime" class="form-control datepicker" id="htime" placeholder="Hiring Time" required>
                </div>
                <div class="col-md-3 form-group">
                    <select name="ambulancetype" id="ambulancetype" class="form-select">
                        <option value="">Select Type of Ambulance</option>
                        <option value="1">Basic Life Support (BLS) Ambulances</option>
                        <option value="2">Advanced Life Support (ALS) Ambulances</option>
                        <option value="3">Non-Emergency Patient Transport Ambulances</option>
                        <option value="4">Boat Ambulance</option>
                    </select>
                </div>
            </div>

            <div class="row" style="padding-top: 20px;">
                <div class="col-md-4 form-group">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" required>
                </div>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            </div>
            <div class="text-center" style="padding-top: 20px; padding-bottom: 20px;">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div id="googleMap"></div>
</section><!-- End Appointment Section -->



<script>
let map;
let directionsService;
let directionsRenderer;
let userLocation;

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(24.9273, 67.0330), // Default coordinates
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    document.getElementById('useLocation').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.setCenter(userLocation);
            map.setZoom(15);

            new google.maps.Marker({
                position: userLocation,
                map: map,
                title: "Your Location"
            });

            // Store latitude and longitude in the input field
            document.getElementById('userLocation').value = position.coords.latitude + ', ' + position.coords.longitude;

        }, function() {
            alert("Geolocation service failed.");
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
});


    // Initialize Places Autocomplete for hospital search
    var hospitalInput = document.getElementById('hospitalSearch');
    var autocomplete = new google.maps.places.Autocomplete(hospitalInput, {
        types: ['establishment'], // Only return establishments (hospitals, clinics, etc.)
        componentRestrictions: { country: 'pk' } // Restrict to Pakistan
    });

    autocomplete.setFields(['name', 'geometry']); // Fetch only necessary fields

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log("No details available for input: '" + place.name + "'");
            return;
        }

        // Center the map on the selected hospital
        map.setCenter(place.geometry.location);
        map.setZoom(15);

        // Optionally, add a marker for the selected hospital
        new google.maps.Marker({
            position: place.geometry.location,
            map: map,
            title: place.name
        });

        // Get directions from the user's location to the selected hospital
        if (userLocation) {
            calculateAndDisplayRoute(place.geometry.location);
        }
    });
}

function calculateAndDisplayRoute(destination) {
    directionsService.route({
        origin: userLocation,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status === 'OK') {
            directionsRenderer.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&libraries=places&callback=myMap" async defer></script>







    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

      </div>

  

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

             <div class="row">
              <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p><?php  echo $row['PageDescription'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?php  echo $row['Email'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><?php  echo $row['MobileNumber'];?></p>
                </div>
              </div><?php } ?>
            </div>

         

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <?php include_once('includes/footer.php');?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

 

</body>

</html>