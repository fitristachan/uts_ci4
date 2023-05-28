<nav class="nav gap-3">
    <h3 class="text-primary">Cashier</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card">
    <div class="card-body">
        <div class="card-body">
        <?php date_default_timezone_set('Asia/Jakarta');?>
            <form class="row g-3" method="POST" id="create-form" action="<?= base_url('pos/cashier') ?>">
                <input type="hidden" name="id_employee" value="<?= isset($data['id_employee']) ? $data['id_employee'] : '' ?>">     
                <div class="col-md-6">
                    <label for="facture" class="form-label">Facture</label>
                    <input type="text" class="form-control" id="facture" name="facture" value="<?= $facture ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="date_sale" class="form-label">Date of Transaction</label>
                    <input type="date" class="form-control" id="date_sale" name="date_sale" value="<?= date('Y-m-d')?>" readonly >
                </div>
                <div class="col-md-2">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" readonly value="<?= date('H:i:s'); ?>">
                </div>
               
                <div class="col-md-4">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code" autofocus>
                </div>
                <div class="col-md-6">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" readonly>
                </div>
                <div class="col-md-2">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" value="1">
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3 border border-danger">
        <div class="card-body">
            <div class="row">
                    <label for="total" class="col-sm-2 col-form-label col-form-label-lg text-danger">Total Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg text-danger" id="total" name="total" placeholder="Total Price" readonly>
                </div>
            </div>
        </div>
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
               <th scope="col">Total Price</th>
               <th scope="col">Action</th>
             </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($datadetail as $row): ?>
             <tr>
                <td><?= $i++ ?></td>
                <td><?= $row->code_book ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->qty ?></td>
                <td><span>Rp</span><?= $row->selling_price ?><span>,00</span></td>
                <td><?= $row->total_price ?></td>
                <td> <a href="<?= base_url('Main/deleteEmployee/') ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded-0" title="Delete Transaction"><i class="bi bi-trash"></i></a></td>
             </tr>
            </tbody>
            <?php endforeach; ?>
        </table>  
    </div>
</div>

<div class="d-grid gap-4 mt-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Payment">Payment</button>
    <button type="button" class="btn btn-danger">Cancel Transaction</button>  
</div>  
</form>

<!-- Modal -->
<div class="modal fade" id="Payment" tabindex="-1" aria-labelledby="Payment" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="Pembayaran">Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form> 
            <h5>Total Price: </h5>
            <div class="row">
                    <label for="cash" class="col-sm-2 col-form-label-lg col-form-label">Cash </label>
                    <label for="cash" class="col-sm-1 col-form-label-lg col-form-label">: </label>
                <div class="col-sm-9 p-2 pe-1">
                    <input type="text" class="form-control form-control" id="cash" name="cash" placeholder="Customer Pay ...">
                </div>
            </div>
            <h5>Change: </h5>
            </form>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="category-form" type="submit">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>