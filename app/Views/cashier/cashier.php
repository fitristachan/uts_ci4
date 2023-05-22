<nav class="nav gap-3">
    <a href="<?= base_url(previous_url()) ?>"class="btn btn-warning">Back</i></a>
    <h3 class="text-primary">Cashier</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card">
    <div class="card-body">
        <div class="card-body">
                <div class="row">
                    <label for="total" class="col-sm-2 col-form-label col-form-label-lg text-danger">Total Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg text-danger" id="total" placeholder="Total Price" disabled>
                </div>
                </div>
                <hr>
            <form class="row g-3 ">
                <div class="col-md-6">
                    <label for="factur" class="form-label">Factur</label>
                    <input type="text" class="form-control" id="factur" name="factur" placeholder="Factur" disabled>
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">Date of Transaction</label>
                    <input type="date" class="form-control" id="date" name="date"disabled>
                </div>
                <div class="col-md-2">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" disabled>
                </div>
               
                <div class="col-md-4">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code">
                </div>
                <div class="col-md-6">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" disabled>
                </div>
                <div class="col-md-2">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity">
                </div>
</div>
</div>
</from>
</div>
<div class="card mt-3">
    <div class="card-body">
<h5 class="card-title card-header">Transaction's List </h5>
<br>
<table class="table table-bordered">
  <thead class="table-primary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Qty</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Grand Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
      <td> <a href="<?= base_url('Main/deleteEmployee/') ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded-0" title="Delete Transaction"><i class="bi bi-trash"></i></a></td>
 