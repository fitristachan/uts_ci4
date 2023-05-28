<nav class="nav gap-3">
    <h3 class="text-primary">Cashier</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card">
    <div class="card-body">
        <div class="card-body ">
        <?php date_default_timezone_set('Asia/Jakarta');?>
        <form class="row g-3" method="POST" id="tempSave" action="<?= base_url('pos/tempSave') ?>">
                <div class="col-md-5">
                    <label for="facture" class="form-label">Facture</label>
                    <input type="text" class="form-control" id="facture" name="facture" value="<?= isset($facture) ? $facture : '' ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="date_sale" class="form-label">Date of Transaction</label>
                    <input type="date" class="form-control" id="date_sale" name="date_sale" value="<?= date('Y-m-d')?>" readonly >
                </div>
                <div class="col-md-2">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" readonly value="<?= date('H:i:s'); ?>">
                </div>
                <div class="col-md-2 btn-group-sm mt-5">
                    <button class="btn btn-success" form="tempSave" type="submit"><i class="bi bi-save-fill"></i></button>
                </div>
                <div class="col-md-3">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code" value="<?= isset($data['code_book']) ? $data['code_book'] : '' ?>" autofocus>
                </div>
                <div class="col-md-7">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="<?= isset($data['title']) ? $data['title'] : '' ?>" readonly>
                </div>
                <div class="col-md-2">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" value="1">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card mt-3 border border-danger">
        <div class="card-body">
            <div class="row">
                    <label for="grand_total" class="col-sm-2 col-form-label col-form-label-lg text-danger" >Grand Total</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg text-danger" id="grand_total" name="grand_total" placeholder="Grand Total" value="Rp<?= isset($grandTotal['grand_total']) ? $grandTotal['grand_total'] : ''?>,00" readonly>
                </div>
            </div>
            </form>
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
            <?//php if(!empty($datadetail)): ?>
            <?php $i = 1; ?>
            <?php foreach($datadetail as $row): ?>
             <tr>
                <td><?= $i++ ?></td>
                <td><?= $row->code_book ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->qty ?></td>
                <td><span>Rp</span><?= $row->selling_price ?><span>,00</span></td>
                <td><?= $row->total_price ?></td>
                <td> <a href="<?= base_url('pos/deleteTempSave/'.$row->id_books) ?>" onclick="if(confirm('Are you sure to delete <?= $row->title ?> from cart?') === false) event.preventDefault()" class="btn btn-danger rounded-0" title="Delete From Cart"><i class="bi bi-trash"></i></a></td>
             </tr>
            </tbody>
            <?php endforeach; ?>
        <?//php endif; ?>
        </table>  
    </div>
</div>

<div class="d-grid gap-4 mt-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Payment">Payment</button>
    <button type="button" class="btn btn-danger">Cancel Transaction</button>  
</div>  

<!-- Modal -->
<div class="modal fade" id="Payment" tabindex="-1" aria-labelledby="Payment" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="Pembayaran">Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
         
            <div class="row">
                <h5 class="col-sm-2">Total</h5>
                <h5 class="col-sm-1">:</h5>
                <h5 class="col-sm-6"> Rp <?= isset($grandTotal['grand_total']) ? $grandTotal['grand_total'] : ''?>,00  </h5>
            </div>
            <form method="POST" id="allSave2" action="<?= base_url('pos/allSave')?>">   
                <div class="row">
                    <label for="cash" class="col-sm-2 col-form-label-lg col-form-label">Cash </label>
                    <label for="cash" class="col-sm-1 col-form-label-lg col-form-label">: </label>
                <div class="col-sm-9 p-2 pe-1">
                <input type="hidden" class="form-control" id="facture" name="facture" value="<?= isset($facture) ? $facture : '' ?>" readonly>
                <input type="hidden" class="form-control" id="date_sale" name="date_sale" value="<?= date('Y-m-d')?>" readonly >
                <input type="hidden" class="form-control" id="time" name="time" readonly value="<?= date('H:i:s'); ?>">
                <input type="text" class="form-control" id="cash_payment" name="cash_payment" placeholder="Customer Pay ..." value="<?= !empty($request->getPost('cash_payment')) ? $request->getPost('cash_payment') : '' ?>">
            </form>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="allSave2" type="submit" >Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display:none";></div>

<script>
$(document).ready(function(){
    $('#product_code').keydown(function(e){
        if(e.keyCode==13){
            e.preventDefault();
        }
        checkCode();
    });
});

function checkCode(){
        let ProductCode = $('#product_code').val();

        if(ProductCode.length==0){
            $.ajax({
                url: "<?=site_url('pos/viewProduct')?>",
                dataType: "json",
                success: function(response){
                    $('.viewmodal').html(response.viewmodal).show();
                    $('#modulProduct').modal('show');
                },
                error: function(xhr, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        } 
    }

//function submitForm(){
  //  document.getElementById("allSave2").submit();
//}
    
</script>