<!-- jQuery 3 -->
<script src="<?= base_url('template/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('template/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('template/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('template/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('template/') ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('template/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('template/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('template/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('template/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('template/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('template/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('template/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('template/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('template/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('template/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/') ?>dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('template/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('template/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#table_mhs').DataTable({
            "columnDefs": [
                {
                    "class": "text-center",
                    "targets": [0, 3, 4, 5]
                },
                {
                    width: "30%",
                    "targets": [1, 2, 5]
                },
                { 
                    orderable: false, 
                    targets: [0,5] 
                }
            ]
        });
        renderTable();

        function renderTable() {
            table.clear();
            $.ajax({
                url: "<?= base_url('Mahasiswa/get_mahasiswa') ?>"
            }).done(function(res) {
                var listMahasiswa = JSON.parse(res);
                for (i = 0; i < listMahasiswa.length; i++) {
                    var btn_hapus = "<button type='button' class='btn btn-danger btn-hapus' style='margin-right: 4px;' nim='" + listMahasiswa[i]['nim'] + "'>Hapus</button>";
                    var btn_edit = "<button type='button' class='btn btn-primary btn-edit' nim='" + listMahasiswa[i]['nim'] + "'>Edit</button>";
                    table.row.add([
                        i + 1,
                        listMahasiswa[i]['nim'],
                        listMahasiswa[i]['nama'],
                        listMahasiswa[i]['jurusan'],
                        listMahasiswa[i]['fakultas'],
                        btn_hapus + btn_edit
                    ]).draw(false);
                }
            })
        }

        function emptyForm() {
            $('#nim').val('');
            $('#nama').val('');
            $('#dummy').val('');
            $('#tgl_lahir').val('');
            $('#gender1').prop('checked', false);
            $('#gender2').prop('checked', false);
            $('#angkatan').val('2009');
            $('#jurusan option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#prodi option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#fakultas option').prop('selected', function() {
                return this.defaultSelected;
            });
            $("#nim").attr('readonly', false);
            $('#action_form').css({
                'display': 'none'
            });
            $('#text-submit').html('Submit');
        }

        function modalPesan(type, icon, pesan) {
            var modal_type = 'modal ' + type + ' fade';
            var icon_type = 'icon fa ' + icon;
            $('#pesan_status').attr('class', modal_type);
            $('#icon_status').attr('class', icon_type);
            $('#text_status').html(pesan);
            $('#pesan_status').modal('show');
        }

        $('#form_mahasiswa').submit(function(event) {
            event.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url('Mahasiswa/add_mahasiswa') ?>",
                data: data
            }).done(function(res) {
                var result = JSON.parse(res);
                if (result['res'] == 1 || result['res'] == '1') {
                    if (result['dummy']) {
                        modalPesan('modal-success', 'fa-check', 'Data mahasiswa berhasil diedit');
                    } else {
                        modalPesan('modal-success', 'fa-check', 'Data mahasiswa berhasil ditambah');
                    }

                } else if (result['res'] == -1 || result['res'] == "-1") {
                    modalPesan('modal-danger', 'fa-ban', 'Data mahasiswa gagal ditambah');
                } else if (result['res'] == 0 || result['res'] == "0") {
                    if (result['dummy']) {
                        modalPesan('modal-danger', 'fa-ban', 'Data mahasiswa gagal diedit');
                    } else {
                        modalPesan('modal-warning', 'fa-warning', 'NIM tidak tersedia');
                    }
                } else {
                    modalPesan('modal-danger', 'fa-ban', 'Data mahasiswa gagal ditambah dengan error' + res);
                }
                emptyForm();
                renderTable();
            })
        })

        table.on('click', '.btn-hapus', function() {
            var nim = $(this).attr('nim');
            if (confirm("Apakah data mahasiswa benar ingin dihapus ?")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Mahasiswa/delete_mahasiswa') ?>",
                    data: {
                        nim: nim
                    }
                }).done(function(res) {
                    if (res == 1 || res == '1') {
                        modalPesan('modal-success', 'fa-check', 'Data mahasiswa berhasil dihapus');
                    } else {
                        modalPesan('modal-danger', 'fa-ban', 'Data mahasiswa gagal dihapus');
                    }
                    renderTable();
                })
            } else {
                modalPesan('modal-danger', 'fa-ban', 'Data mahasiswa batal dihapus');
            }
        })

        table.on('click', '.btn-edit', function() {
            var nim = $(this).attr('nim');
            $.ajax({
                method: "POST",
                url: "<?= base_url('Mahasiswa/get_mahasiswa_by_nim') ?>",
                data: {
                    nim: nim
                }
            }).done(function(res) {
                var result = JSON.parse(res)[0];
                $('#nim').val(result['nim']);
                $("#nim").attr('readonly', true);
                $('#dummy').val(result['nim']);
                $('#nama').val(result['nama']);
                $('#tgl_lahir').val(result['tgl_lahir']);
                if (result['gender'] == 'pria') $('#gender1').prop('checked', true);
                else $('#gender2').prop('checked', true);
                $('#angkatan').val(result['angkatan']);
                $('#jurusan').val(result['jurusan']);
                $('#prodi').val(result['prodi']);
                $('#fakultas').val(result['fakultas']);
                $('#action_form').css({
                    'display': 'initial',
                    'margin-left': '5px'
                });
                $('#text-submit').html('Edit');
            })
        })

        $('.btn-new-insert').click(function() {
            emptyForm();
        })
    })
</script>