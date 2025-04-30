

<?php
// Include Bootstrap from a CDN
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
require 'db.php';
?>
<html>
    <head>
    </head>

    <body>
 
    <section class="top-bar-section">
          <ul class="left">
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/index.php" class="text-decoration-none text-reset">Index</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/register.php" class="text-decoration-none text-reset">Register</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/list.php" class="text-decoration-none text-reset">List</a></button>
            </ul>
    </section>

    </body>
</html>



