<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Happiness Bookstore</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
  <div class="container-fluid">
      <div class="navbar-nav">
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"><i class="bi bi-list" data-bs-toggle="offcanvas"></i></button>      
      <a class="nav-link active" aria-current="page" href="<?= base_url('home/index')?>">Home</a>
        <a class="nav-link" href="<?= base_url('Main/stocks')?>">Stock</a>
        <a class="nav-link" href="#">Cashier</a>
        <a class="nav-link" href="#">Employee</a>
        <a class="nav-link" href="#">History</a>
      </div>
  </div>
<!-- 
  <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x"></i></button>
        </div>
        <div class="offcanvas-body">
            I will not close if you click outside of me.
        </div>
      </div>
-->
</nav>




</body>

</html>