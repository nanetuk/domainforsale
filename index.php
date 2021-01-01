<?php
require_once 'config.php';
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && valideteForm()) {
  // send email
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
      </div>

      <div class="row g-3">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Domain statistics</h4>
        </div>

        <div class="col-md-5 col-lg-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">MAKE YOUR OFFER</span>
          </h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="eg. George" value="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="eg. you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Max bid</label>
                <div class="input-group">
                  <span class="input-group-text">&pound;</span>
                    <input type="text" class="form-control" id="bid" placeholder="eg. 400" required="">
                    <div class="invalid-feedback">
                        Your username is required.
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