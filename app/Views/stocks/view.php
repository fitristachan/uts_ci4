<nav class="nav gap-3">
    <h3 class="text-primary">View Stock</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border">
<div class="card-body">
        <div class="row mb-3">   
        <label for="id_category" class="col-sm-2 col-form-label fw-bold">Category</label>
        <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control border border-0" id="id_category" name="id_category" value="<?= isset($data['name_category']) ? $data['name_category']: '' ?>"readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="code_book" class="col-sm-2 col-form-label fw-bold">Book Code</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="code_book" name="code_book" value="<?= isset($data['code_book']) ? $data['code_book'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="year" class="col-sm-2 col-form-label fw-bold">Publish Year</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="year" class="form-control border border-0" id="year" name="year" value="<?= isset($data['year']) ? $data['year'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label fw-bold">Title</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="title" name="title" value="<?= isset($data['title']) ? $data['title'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="author" class="col-sm-2 col-form-label fw-bold">Author</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="author" name="author"  value="<?= isset($data['author']) ? $data['author'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="publisher" class="col-sm-2 col-form-label fw-bold">Publisher</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="publisher" name="publisher"  value="<?= isset($data['publisher']) ? $data['publisher'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="purchase_price" class="col-sm-2 col-form-label fw-bold">Purchase Price</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="purchase_price" name="purchase_price"  value="<?= isset($data['purchase_price']) ? $data['purchase_price'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="selling_price" class="col-sm-2 col-form-label fw-bold">Selling Price</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="selling_price" name="selling_price"  value="<?= isset($data['selling_price']) ? $data['selling_price'] : '' ?>" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <label for="stock" class="col-sm-2 col-form-label fw-bold">Stock</label>
            <label for="id_category" class="col-sm-1 col-form-label fw-bold">:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control border border-0" id="stock" name="stock"  value="<?= isset($data['stock']) ? $data['stock'] : '' ?>" readonly>
        </div>
        </div>
</div>
</div>
<div class="card-footer text-center d-grid gap-3 mt-4">
        <a href="<?= base_url('Main/editStocks/'.(isset($data['id_books']) ? $data['id_books'] : '')) ?>" class="btn btn btn-primary btn-sm rounded-0">Edit</a>
            <a href="<?= base_url('Main/deleteStocks/'.(isset($data['id_books']) ? $data['id_books'] : '')) ?>" class="btn btn btn-danger btn-sm rounded-0" onclick="if(confirm('Are you sure to delete this <?= isset($data['title']) ? $data['title'] : '' ?> details?') === false) event.preventDefault()">Delete</a>
            <a href="<?= base_url('Main/stocks') ?>" class="btn btn btn-light bg-gradient-light border btn-sm rounded-0">Back to List</a>
</div>
