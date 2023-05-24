<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted"><i class="far fa-edit"></i> Edit Contact Details</h4>
    </div>
    <div class="card-body">
        <div class="contianer-fluid">
            <form action="<?= base_url('pages/save') ?>" method="POST" id="create-form">
                <input type="hidden" name="id" value="<?= isset($data['ID']) ? $data['ID'] : '' ?>">
                <div class="mb-3">
                    <label for="" class="control-label">Pagename</label>
                    <div class="input-group">
                        <input type="text" autofocus class="form-control form-control-border" id="pagename" name="pagename" value="<?= isset($data['pagename']) ? $data['pagename'] : '' ?>" required="required" placeholder="First Name">
                        
                    </div>
                </div>

                <div class="mb-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="address" class="control-label">Date</label>
                    <input type="text" class="form-control" id="contact" name="date_created" required="required" value="<?= isset($data['date_created']) ? $data['date_created'] : '' ?>">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" form="create-form" type="submit"><i class="fa fa-save"></i> Save Details</button>
        <a class="btn btn-secondary" href="<?= base_url('pages/view_details/'.(isset($data['id']) ? $data['id'] : '')) ?>"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>