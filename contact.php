<?php $title="Contact";include('header.php'); 

$query = "SELECT `Contact_Email`, `Contact_Number` FROM `contact_page_details_tbl`";
    $result = mysqli_query($con, $query);
    $contact = mysqli_fetch_assoc($result);

?>
    <div class="container sitemap">
        <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Contact</p>
    </div>
    <div class="container">
        <div class="row">
                <div class="col-12 col-md-4 p-3">
            <div class="shadow-sm p-4 rounded border">
                <h3 class="mb-4">Contact Information</h3>
                <p class="mb-3">We are available 24/7 to assist you. Reach out to us through the following methods:</p>
                <p class="mb-2"><strong>Phone:</strong> +91 <?php echo $contact["Contact_Number"]; ?></p>
                <p class="mb-4"><strong>Email:</strong> <?php  echo $contact["Contact_Email"]; ?></p>
                <div class="line mb-3"></div>
                <p class="mb-1">For any inquiries or support, please fill out the contact form and we will get back to you within 24 hours.</p>
            </div>
        </div>

        <div class="col-12 col-md-8 p-2">
    <div class="shadow-sm p-4">
        <form id="contactForm" method="POST" onsubmit="return contactFormValidation()">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" id="contactName" name="FirstName" placeholder="Your First Name*" class="form-control">
                    <p id="contactNameError" class="text-danger small mt-1"></p>
                </div>
                <div class="col-md-6">
                    <input type="text" id="contactName2" name="LastName" placeholder="Your Last Name*" class="form-control">
                    <p id="contactName2Error" class="text-danger small mt-1"></p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" id="contactEmail" name="Email" placeholder="Your Email*" class="form-control">
                    <p id="contactEmailError" class="text-danger small mt-1"></p>
                </div>
                <div class="col-md-6">
                    <input type="text" id="contactPhone" name="Phone" placeholder="Your Phone*" class="form-control">
                    <p id="contactPhoneError" class="text-danger small mt-1"></p>
                </div>
            </div>
            <div class="mb-3">
                <textarea id="contactMessage" name="Message" class="form-control" rows="7" placeholder="Your Message*"></textarea>
                <p id="contactMessageError" class="text-danger small mt-1"></p>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" name="submit" value="Send Message" class="btn btn-primary mt-2">
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
<?php include('footer.php');


if(isset($_POST['submit']))
{
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Message = $_POST['Message'];

    $q = "INSERT INTO responses_tbl (First_Name, Last_Name, Email, Phone, Message) VALUES ('$FirstName','$LastName','$Email','$Phone','$Message')";

    if (mysqli_query($con, $q)) {
        echo "<script>alert('Message sent successfully!');location.href=location;</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}


?>