<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Mahasiswa<small>Menambah, mengubah dan menghapus data mahasiswa</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Welcome/show_home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mahasiswa</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulir Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="form_mahasiswa">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Isikan NIM disini..." required>
                                <input type="hidden" id="dummy" name="dummy">
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan nama disini..." required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>JENIS KELAMIN</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="gender1" name="gender" value="pria" required>
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="gender2" name="gender" value="wanita" required>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="angkatan">ANGKATAN</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan" min=2009 max=<?= date('Y') - 1 ?> step=1 value=2009 required>
                            </div>
                            <div class="form-group">
                                <label>PROGRAM STUDI</label>
                                <select id="prodi" name="prodi" class="form-control">
                                    <option value="tibil" selected='selected'>Teknik Informatika Bilingual</option>
                                    <option value="tireg">Teknik Informatika Reguler</option>
                                    <option value="sibil">Sistem Informasi Bilingual</option>
                                    <option value="sireg">Sistem Informasi Reguler</option>
                                    <option value="skbil">Sistem Komputer Bilingual</option>
                                    <option value="skreg">Sistem Komputer Reguler</option>
                                    <option value="ma">Manajemen Informatika</option>
                                    <option value="ka">Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>JURUSAN</label>
                                <select id="jurusan" name="jurusan" class="form-control">
                                    <option value="TI" selected='selected'>Teknik Informatika</option>
                                    <option value="SI">Sistem Informasi</option>
                                    <option value="SK">Sistem Komputer</option>
                                    <option value="MA">Manajemen Informatika</option>
                                    <option value="KA">Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>FAKULTAS</label>
                                <select id="fakultas" name="fakultas" class="form-control">
                                    <option value="ILKOM" selected='selected'>Ilmu Komputer</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="text-submit">Submit</button>
                            <button type="button" class="btn btn-success btn-new-insert" id="action_form" style="display: none;">Tambah Baru</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table_mhs" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>JURUSAN</th>
                                    <th>FAKULTAS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
<div class="modal modal-success fade" id="pesan_status">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="icon fa fa-check" id="icon_status" style="margin-right: 10px;"></i>Alert!</h4>
            </div>
            <div class="modal-body">
                <p id="text_status">...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->