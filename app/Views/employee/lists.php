<nav class="nav gap-3 justify-content-end">
    <h4>Add New Employee</h4>
    <a href="<?= base_url('Main/addEmployee/') ?>"class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
  </nav>
    <hr class="border border-primary border-2 opacity-50">
    <table class="table table-bordered">
  <thead class="table-primary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Employee Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($list) > 0): ?>
      <?php $i = 1; ?>
      <?php foreach($list as $row): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $row->employee_code ?></td>
      <td><?= $row->firstName." ".$row->lastName?></td>
      <td><?= $row->title ?></td>
      <td><?= $row->start_date ?></td>
      <td>Rp<?= $row->salary?>,00</td>
      <td> <div class="btn-group btn-group-sm">
            <a href="<?= base_url('Main/editEmployee/'.$row->id_employee) ?>" class="btn btn-primary rounded-0" title="Edit Employee"><i class="bi bi-pencil-square"></i></a>
            <a href="<?= base_url('Main/deleteEmployee/'.$row->id_employee) ?>" onclick="if(confirm('Are you sure to delete <?= $row->firstName?> <?= $row->lastName?> data?') === false) event.preventDefault()" class="btn btn-danger rounded-0" title="Delete Employee"><i class="bi bi-trash"></i></a>
        </div></td>
    </tr>
    <?php endforeach; ?>
      <?php endif; ?>
  </tbody>
</table>
