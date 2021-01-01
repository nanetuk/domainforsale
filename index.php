<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'config.php';
require_once 'function.php';

$emailSent = $emailError = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && valideteForm() === true) {
  require 'vendor/PHPMailer/src/Exception.php';
  require 'vendor/PHPMailer/src/PHPMailer.php';
  require 'vendor/PHPMailer/src/SMTP.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer();

  try {
      //Server settings
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = EMAIL;                                  // SMTP username
      $mail->Password   = PASSWORD;                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom(EMAIL, DOMAIN_NAME);
      $mail->addReplyTo($_POST['email'], $_POST['name']);         // Add a recipient
      $mail->addAddress(EMAIL, DOMAIN_NAME);

      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject  = DOMAIN_NAME . ' bid!';
      $mail->Body     = DOMAIN_NAME . ' has new bid from ' . $_POST['name'] . ' ' . $_POST['email'];
      $mail->Body    .= '<br>New bid: <strong>' . floatval($_POST['bid']) . '</strong>';
      $mail->AltBody  = DOMAIN_NAME . ' has new bid from ' . $_POST['name'] . ' ' . $_POST['email'];
      $mail->AltBody .= 'New bid: ' . floatval($_POST['bid']);

      $mail->send();
      $emailSent = true;
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $emailError = valideteForm();
}
?><!doctype html>
<html lang="en">
  <head>
    <?php include 'theme/header.php'; ?>
  </head>
  <body>
    <main class="container">
      <div class="py-5 text-center">
        <i class="fas fa-pound-sign"></i>
        <h2><?php echo DOMAIN_NAME; ?> is for sale!</h2>
        <p class="lead">DOMAIN NAME VALUES ARE CURRENTLY RISING AT A VERY RAPID RATE!</p>
        <?php if ($emailSent) { ?>
          <div class="alert alert-success">Email has been sent. We will come back to you soon!</div><?php } ?>
        <?php if ($emailError) { ?>
          <div class="alert alert-warning">Errors while sending your email:<br><?php echo $emailError; ?></div><?php } ?>
      </div>

      <div class="row g-3">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Domain statistics</h4>
        </div>

        <div class="col-md-5 col-lg-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">MAKE YOUR OFFER</span>
          </h4>
          <form class="needs-validation" method="POST" novalidate>
            <div class="row g-3">
              <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="eg. George" value="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input name="email" type="email" class="form-control" id="email" placeholder="eg. you@example.com" required>
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Max bid</label>
                <div class="input-group">
                  <span class="input-group-text">&pound;</span>
                    <input name="bid" type="text" class="form-control" id="bid" placeholder="eg. 400" required="">
                    <div class="invalid-feedback">
                        Your bid is required.
                    </div>
                </div>
              </div>

            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </main>

    <?php include 'theme/footer.php'; ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Form validation -->
    <script src="js/validation.js"></script>
  </body>
</html>