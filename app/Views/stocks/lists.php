<nav class="nav gap-3">
    <h3 class="text-primary">List Stocks</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border border">
<div class="card-body">
<nav class="nav gap-3 justify-content-end">
    <h4>Add New Stock</h4>
    <a href="<?= base_url('Main/addStocks/') ?>"class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
  </nav>
<br>
<div class="table-responsive scrollme">
    <table class="table table-bordered">
  <thead class="table-primary">
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Stock</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($list) > 0): ?>
      <?php $i = 1; ?>
      <?php foreach($list as $row): ?>
    <tr>
      <td><?= $row->code_book ?></td>
      <td><?= $row->title ?></td>
      <td><?= $row->name_category ?></td>
      <td><?= $row->stock ?></td>
      <td><span>Rp</span><?= $row->selling_price ?><span>,00</span></td>
      <td> <div class="btn-group btn-group-sm">
            <a href="<?= base_url('Main/detailsStocks/'.$row->id_books) ?>" class="btn btn-default bg-gradient-light border text-dark rounded-0" title="View Stock"><i class="bi bi-eye"></i></a>
            <a href="<?= base_url('Main/editStocks/'.$row->id_books) ?>" class="btn btn-primary rounded-0" title="Edit Stock"><i class="bi bi-pencil-square"></i></a>
            <a href="<?= base_url('Main/deleteStocks/'.$row->id_books) ?>" onclick="if(confirm('Are you sure to delete <?= $row->title ?>?') === false) event.preventDefault()" class="btn btn-danger rounded-0" title="Delete Stocks"><i class="bi bi-trash"></i></a>
        </div></td>
    </tr>
    <?php endforeach; ?>
      <?php endif; ?>
  </tbody>
</table>
      </div>
      </div>
      </div>