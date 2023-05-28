<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong><?= isset($data['facture']) ? $data['facture'] : '' ?></strong></p>
        </div>
        <div class="col-xl-3 float-end">
          <a href="<?php echo site_url('pdf/generate') ?>"class="btn btn-light text-capitalize border-0 text-primary ms-8 " data-mdb-ripple-color="dark"><i
              class="bi bi-printer-fill"></i> Print</a>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <h5 class="pt-0 text-primary"><strong>Happiness Bookstore</strong></h5>
          </div>

        </div>


        <div class="row">
        <div class="col-xl-8">
        <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted">Cashier: <span style="color:#5d9fc5 ;"> <?= isset($data['firstName']). " " . isset($data['lastName']) ? $data['firstName']. " " .($data['lastName']) : '' ?></span></li>
              <li class="text-muted">Employee Code: <span style="color:#5d9fc5 ;"><?= isset($data['employee_code']) ? $data['employee_code'] : '' ?></span></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="bi bi-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">ID: </span><?= isset($data['facture']) ? $data['facture'] : '' ?></li>
              <li class="text-muted"><i class="bi bi-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Creation Date: </span><?= isset($data['date_sale']) ? $data['date_sale'] : '' ?></li>
              <li class="text-muted"><i class="bi bi-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Creation Time: </span><?= isset($data['time_sale']) ? $data['time_sale'] : '' ?></li>
              <li class="text-muted"><i class="bi bi-circle" style="color:#84B0CA ;"></i> <span
                  class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Already Paid</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
              <?php $i = 1; ?>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <tr>
                <th><?= $i++ ?></th>
                <td><?= $data['title']?></td>
                <td><?= $data['qty'] ?></td>
                <td><?= $data['selling_price'] ?></td>
                <td><?= $data['total_price'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-8">
            <p class="ms-3">Add additional notes and payment information</p>

          </div>
          <div class="col-xl-3">
            <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-black me-3"> Grand Total</span><?= isset($data['grand_total']) ? $data['grand_total'] : '' ?></span></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Cash</span><?= isset($data['cash']) ? $data['cash'] : '' ?></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Change</span><?= isset($data['change_purchase']) ? $data['change_purchase'] : '' ?></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>