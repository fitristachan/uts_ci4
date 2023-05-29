<nav class="nav gap-3">
    <h3 class="text-primary">Transaction History</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border border">
<div class="card-body ">
<br>
<div class="table-responsive scrollme">
  <table class="table table-bordered">
  <thead class="table-primary">
  <tr>
      <th scope="col">Datetime</th>
      <th scope="col">Facture</th>
      <th scope="col">Code Book</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Grand Total</th>
      <th scope="col">Cash</th>
      <th scope="col">Change</th>
      <th scope="col">Employee</th>
  </tr>
  </thead>
  <tbody>
    <?php if(count($list) > 0): ?>
      <?php $i = 1; ?>
      <?php foreach($list as $row): ?>
    <tr>
      <td><?= $row->date_sale. " " .$row->time_sale?></td>
      <td><?= $row->facture ?></td>
      <td><?= $row->code_book ?></td>
      <td><?= $row->title ?></td>
      <td><?= $row->name_category ?></td>
      <td><span>Rp</span><?= $row->grand_total ?><span>,00</span></td>
      <td><span>Rp</span><?= $row->cash ?><span>,00</span></td>
      <td><span>Rp</span><?= $row->change_purchase ?><span>,00</span></td>
      <td><?= $row->firstName. " " .$row->lastName?></td>
    </tr>
    <?php endforeach; ?>
      <?php endif; ?>
  </tbody>
</table>
      </div>
      </div>
      </div>