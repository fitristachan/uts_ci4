<nav class="nav gap-3">
    <h3 class="text-primary">Edit Stock</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border">
<div class="card-body">
    <form class="row g-3" action="<?= base_url('Main/saveStocks') ?>" method="POST" id="create-form">
        <input type="hidden" name="id_books" value="<?= isset($data['id_books']) ? $data['id_books'] : '' ?>">
        <div class="col-md-8">
        <label for="category" class="form-label">Category</label>
                    <select name="id_category" class="form-control" value="<?= isset($data['name_category']) ? $data['name_category'] : '' ?>" required>
                        <option value="" hidden ><?= isset($data['name_category']) ? $data['name_category'] : '' ?></option>
                        <?php foreach ($category as $key => $value): ?>
                            <option value="<?= $value->id_category?>"><?= $value->name_category?></option>
                        <?php endforeach?>
                    </select>
        </div>
        <div class="col-md-2 pt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCategory"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col-md-6">
            <label for="code_book" class="form-label">Book Code</label>
            <input type="text" class="form-control" id="code_book" name="code_book" value="<?= isset($data['code_book']) ? $data['code_book'] : '' ?>" required="required">
        </div>
        <div class="col-md-6">
            <label for="year" class="form-label">Publish Year</label>
            <input type="year" class="form-control" id="year" name="year" value="<?= isset($data['year']) ? $data['year'] : '' ?>" required="required">
        </div>
        <div class="col-md-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= isset($data['title']) ? $data['title'] : '' ?>" required="required">
        </div>
        <div class="col-md-12">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author"  value="<?= isset($data['author']) ? $data['author'] : '' ?>" required="required">
        </div>
        <div class="col-md-12">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher"  value="<?= isset($data['publisher']) ? $data['publisher'] : '' ?>" required="required">
        </div>
        <div class="col-md-4">
            <label for="purchase_price" class="form-label">Purchase Price</label>
            <input type="text" class="form-control" id="purchase_price" name="purchase_price"  value="<?= isset($data['purchase_price']) ? $data['purchase_price'] : '' ?>" required="required">
        </div>
        <div class="col-md-4">
            <label for="selling_price" class="form-label">Selling Price</label>
            <input type="text" class="form-control" id="selling_price" name="selling_price"  value="<?= isset($data['selling_price']) ? $data['selling_price'] : '' ?>" required="required">
        </div>
        <div class="col-md-4">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock"  value="<?= isset($data['stock']) ? $data['stock'] : '' ?>" required="required">
        </div>
</form>
</div>
</div>
<div class="card-footer text-center d-grid gap-3 mt-4">
        <button class="btn btn-primary" form="create-form" type="submit">Save Stock</button>
        <button class="btn btn-secondary" form="create-form" type="reset">Reset</button>
</div>

<!-- Modal -->
<div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="AddCategory" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="AddCategory">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="row g-3" action="<?= base_url('Main/saveCategory') ?>" method="POST" id="category-form"> 
            <input type="hidden" name="id_category">
            <div class="col-md-12">
                <label for="name_category" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name_category" name="name_category" value="<?= !empty($request->getPost('name_category')) ? $request->getPost('name_category') : '' ?>" required="required">
            </div>
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="category-form" type="submit">Create</button>
            </div>
        </div>
    </div>
</div>
