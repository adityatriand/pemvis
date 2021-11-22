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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script> -->

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#table_mhs').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: 'excel',
                    title: 'Data Mahasiswa',
                    messageTop: 'Berikut data mahasiswa yang ada di fakultas ilmu komputer',
                    filename: 'Data Mahasiswa Fasilkom',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4 ]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data Mahasiswa',
                    messageTop: 'Berikut data mahasiswa yang ada di fakultas ilmu komputer',
                    filename: 'Data Mahasiswa Fasilkom',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4 ]
                    }
                },
                // 'colvis'
            ],
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
     
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Mahasiswa/datatable_mahasiswa')?>",
                "type": "POST"
            },
     
            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "targets": [ 0,5 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "class": "text-center",
                    "targets": [0, 3, 4, 5]
                },
                {
                    width: "30%",
                    "targets": [1, 2, 5]
                },
            ],
        });

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

        // function modalPesan(type, icon, pesan) {
        //     var modal_type = 'modal ' + type + ' fade';
        //     var icon_type = 'icon fa ' + icon;
        //     $('#pesan_status').attr('class', modal_type);
        //     $('#icon_status').attr('class', icon_type);
        //     $('#text_status').html(pesan);
        //     $('#pesan_status').modal('show');
        // }

        function modalPesan(icon,title,text)
        {
            Swal.fire(title,text,icon)
        }

        $('#prodi').change(function(){
            var prodi = $(this).val();
            if(prodi == "tireg" || prodi == "tibil") $("#jurusan").val("TI");
            else if(prodi == "sireg" || prodi == "sibil") $("#jurusan").val("SI");
            else if(prodi == "skreg" || prodi == "skbil") $("#jurusan").val("SK");
            else if(prodi == "ma") $("#jurusan").val("MA");
            else if(prodi == "ka") $("#jurusan").val("KA");
        })

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
                        modalPesan('success', 'Berhasil!', 'Data mahasiswa berhasil diedit');
                    } else {
                        modalPesan('success', 'Berhasil!', 'Data mahasiswa berhasil ditambah');
                    }

                } else if (result['res'] == -1 || result['res'] == "-1") {
                    modalPesan('error', 'Gagal!', 'Data mahasiswa gagal ditambah');
                } else if (result['res'] == 0 || result['res'] == "0") {
                    if (result['dummy']) {
                        modalPesan('error', 'Gagal!', 'Data mahasiswa gagal diedit');
                    } else {
                        modalPesan('warning', 'Peringatan!', 'NIM tidak tersedia');
                    }
                } else {
                    modalPesan('error', 'Gagal!', 'Data mahasiswa gagal ditambah dengan error' + res);
                }
                emptyForm();
                renderTable();
            })
        })

        table.on('click', '.btn-hapus', function() {
            var nim = $(this).attr('nim');
            Swal.fire({
                  title: "Apakah data mahasiswa berikut benar ingin dihapus ?",
                  showDenyButton: true,
                  confirmButtonText: "Hapus",
                  denyButtonText: 'Tidak',
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('Mahasiswa/delete_mahasiswa') ?>",
                        data: {
                            nim: nim
                        }
                    }).done(function(res) {
                        if (res == 1 || res == '1') {
                            modalPesan('success', 'Berhasil!', 'Data mahasiswa berhasil dihapus');
                            renderTable();
                        } else {
                            modalPesan('error', 'Gagal!', 'Data mahasiswa gagal dihapus');
                        }
                    })
                  } 
                  else if (result.isDenied) 
                  {
                    modalPesan('info', 'Batal!', 'Data mahasiswa batal dihapus');
                  }
                })
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