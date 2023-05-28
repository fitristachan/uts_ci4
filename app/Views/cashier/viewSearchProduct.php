<!-- Modal -->
<div class="modal fade" id="modulProduct" tabindex="-1" aria-labelledby="modulProduct" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <nav class="navbar bg-body-light d-flex mt-2">
                <div class="ms-2 container-fluid">
                <a class="navbar-brand text-primary justify-content-start">Our Books</a>       
                <div class="row g-1">
                <div class="col-sm-11">
                <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                </div>
                        <div class="col-1 justify-content-end">
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
            </nav>
            <hr>

            <div class="modal-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock</th>
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
                    <td> <div class="btn-group btn-group-sm">
                        <a href="<?= site_url('pos/cashier/'.$row->id_books)?>" class="btn btn-primary">Choose</a>
                        </div>
                    </td>
                </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
