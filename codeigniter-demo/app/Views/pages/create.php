<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted"><i class="far fa-plus-square"></i> Add New Contact Details</h4>
    </div>
    <div class="card-body">
        <div class="contianer-fluid">
            <form action="<?= base_url('pages/save') ?>" method="POST" id="create-form">
                <input type="hidden" name="id">
                
                <div class="mb-3">
                    <label for="" class="control-label">Pagename</label>
                    <div class="input-group">
                        <input type="text" autofocus class="form-control form-control-border" id="pagename" name="pagename" value="<?= !empty($request->getPost('pagename')) ? $request->getPost('pagename') : '' ?>" required="required" placeholder="Pagename">
                        
                    </div>
                </div>

                
                <div class="mb-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="address" class="control-label">Date</label>
                    <input type="text" class="form-control" id="date_created" name="date_created" required="required" value="<?= !empty($request->getPost('date_created')) ? $request->getPost('date_created') : '' ?>" required="required" placeholder="Date">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" form="create-form" type="submit"><i class="fa fa-save"></i> Save Details</button>
        <button class="btn btn-secondary" form="create-form" type="reset"><i class="fa fa-times"></i> Reset</button>
    </div>
</div>