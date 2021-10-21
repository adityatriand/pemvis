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
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Isikan NIM disini...">
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan nama disini...">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label>JENIS KELAMIN</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="pria">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="wanita">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="angkatan">ANGKATAN</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan" min=2009 max=<?= date('Y') - 1 ?> step=1 value=2009>
                            </div>
                            <div class="form-group">
                                <label>PROGRAM STUDI</label>
                                <select name="prodi" class="form-control">
                                    <option value="tibil">Teknik Informatika Bilingual</option>
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
                                <select name="jurusan" class="form-control">
                                    <option value="TI">Teknik Informatika</option>
                                    <option value="SI">Sistem Informasi</option>
                                    <option value="SK">Sistem Komputer</option>
                                    <option value="MA">Manajemen Informatika</option>
                                    <option value="KA">Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>FAKULTAS</label>
                                <select name="fakultas" class="form-control">
                                    <option value="ilkom">Ilmu Komputer</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>PRODI</th>
                                    <th>JURUSAN</th>
                                    <th>ANGKATAN</th>
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