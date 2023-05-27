<nav class="nav gap-3">
    <h3 class="text-primary">Edit Employee</h3>
</nav>
<hr class="border border-primary border-2 opacity-50">
<div class="card border">
<div class="card-body">
    <form class="row g-3" action="<?= base_url('Main/saveEmployee/') ?>" method="POST" id="create-form">
        <input type="hidden" name="id_employee" value="<?= isset($data['id_employee']) ? $data['id_employee'] : '' ?>">        
        <div class="col-md-6">
            <label for="employee_code" class="form-label">Employee Number</label>
            <input type="text" class="form-control" id="employee_code" name="employee_code" value="<?= isset($data['employee_code']) ? $data['employee_code'] : '' ?>" placeholder="Employee Number" required="required">
        </div>
        <div class="col-md-6">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($data['start_date']) ? $data['start_date'] : '' ?>" required="required">
        </div>
        <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?= isset($data['firstName']) ? $data['firstName'] : '' ?>" placeholder="First Name" required="required">
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName"  value="<?= isset($data['lastName']) ? $data['lastName'] : '' ?>" placeholder="Last Name" required="required">
        </div>
        <div class="col-md-6">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"  value="<?= isset($data['title']) ? $data['title'] : '' ?>" placeholder="Title" required="required">
        </div>
        <div class="col-md-6">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary"  value="<?= isset($data['salary']) ? $data['salary'] : '' ?>" placeholder="Salary" required="required">
        </div>
</form>
</div>
</div>
<div class="card-footer text-center d-grid gap-3 mt-4">
        <button class="btn btn-primary" form="create-form" type="submit">Save Employee</button>
        <a class="btn btn-secondary" href="<?= base_url('Main/employee/') ?>">Cancel</a>
</div>
