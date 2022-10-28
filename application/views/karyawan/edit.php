<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-11">
                <div class="card card-body">
                    <h1 class="text-center fw-bold mb-4"><?= $title;?></h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row align-items-start">
                            <label for="nama" class="col-md-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" value="<?= $karyawan["id"]; ?>">
                                <input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Masukan Nama Anda" value="<?= $karyawan["nama"];?>">
                                <div class="form-text text-danger"><?= form_error("nama");?></div>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-start">
                            <label for="status" class="col-md-3 col-form-label">Status Karyawan</label>
                            <div class="col-md-9">
                                <select class="form-select" id="status" aria-label="Default select example" name="status">
                                    <?php foreach($status as $s):?>
                                        <?php if($s == $karyawan["status"]):?>
                                            <option value="<?= $s;?>" selected><?= $s;?></option>
                                        <?php else:?>
                                            <option value="<?= $s;?>"><?= $s;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-start">
                            <label for="jabatan" class="col-md-3 col-form-label">Jabatan</label>
                            <div class="col-md-9">
                                <select class="form-select" aria-label="Default select example" name="jabatan" id="jabatan">
                                    <?php foreach($jabatan as $j):?>
                                        <?php if($j == $karyawan["jabatan"]):?>
                                            <option value="<?= $j;?>" selected><?= $j;?></option>
                                        <?php else:?>
                                            <option value="<?= $j;?>"><?= $j;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <img src="<?= base_url().$karyawan['foto'];?>" class="h-auto img-thumbnail">
                            </div>
                        </div>
                        <div class="mb-3 row align-items-start">
                            <label for="foto" class="col-md-3 col-form-label">Upload Foto</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">   
                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-pen-nib me-2"></i>Update</button>
                                <a href="<?= base_url();?>karyawan" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>