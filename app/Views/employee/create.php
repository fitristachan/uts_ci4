<nav class="nav gap-3">
    <h3 class="text-primary">Add Employee</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border">
<div class="card-body">
    <form class="row g-3" action="<?= base_url('Main/saveEmployee') ?>" method="POST" id="create-form">
        <input type="hidden" name="id_employee">
        <div class="col-md-6">
            <label for="employee_code" class="form-label">Employee Number</label>
            <input type="text" class="form-control" id="employee_code" name="employee_code" value="<?= !empty($request->getPost('employee_code')) ? $request->getPost('employee_code') : '' ?>" placeholder="Employee Number" required="required">
        </div>
        <div class="col-md-6">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= !empty($request->getPost('start_date')) ? $request->getPost('start_date') : '' ?>" placeholder="Start Date" required="required">
        </div>
        <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?= !empty($request->getPost('firstName')) ? $request->getPost('firstName') : '' ?>" placeholder="First Name" required="required">
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName"  value="<?= !empty($request->getPost('lastName')) ? $request->getPost('lastName') : '' ?>" placeholder="Last Name" required="required">
        </div>
        <div class="col-md-6">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"  value="<?= !empty($request->getPost('title')) ? $request->getPost('title') : '' ?>" placeholder="Title" required="required">
        </div>
        <div class="col-md-6">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary"  value="<?= !empty($request->getPost('salary')) ? $request->getPost('salary') : '' ?>" placeholder="Salary" required="required">
        </div>
</form>
</div>
</div>
<div class="card-footer text-center d-grid gap-3 mt-4">
        <button class="btn btn-primary" form="create-form" type="submit">Save Employee</button>
        <button class="btn btn-secondary" form="create-form" type="reset">Reset</button>
</div>
