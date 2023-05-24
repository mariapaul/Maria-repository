<div class="card card-outline card-primary rounded-0">
    <div class="card-header">
        <div class="h4 mb-0">Contact Details</div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <dl>
                <dt class="text-muted">Pagename</dt>
                <dd class="ps-4"><?= isset($data['pagename']) ? $data['pagename'] : '' ?></dd>
                <dt class="text-muted">Date</dt>
                <dd class="ps-4"><?= isset($data['date_created']) ? $data['date_created'] : '' ?></dd>
                
            </dl>
        </div>
    </div>
    <div class="card-footer text-center">
            <a href="<?= base_url('pages/edit/'.(isset($data['ID']) ? $data['ID'] : '')) ?>" class="btn btn btn-primary btn-sm rounded-0"><i class="fa fa-edit"></i> Edit</a>
            <a href="<?= base_url('pages/delete/'.(isset($data['ID']) ? $data['ID'] : '')) ?>" class="btn btn btn-danger btn-sm rounded-0" onclick="if(confirm('Are you sure to delete this contact details?') === false) event.preventDefault()"><i class="fa fa-trash"></i> Delete</a>
            <a href="<?= base_url('pages/list') ?>" class="btn btn btn-light bg-gradient-light border btn-sm rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
    </div>
</div>