<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card card shadow mb-4">
                <form action="" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $menu['id']; ?>">
                    <div class="modal-body">
                        <div class="col-sm-10">Nama Menu</div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="<?= base_url('menu'); ?>">Cancel</a>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>