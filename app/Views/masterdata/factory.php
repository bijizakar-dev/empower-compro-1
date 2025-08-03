<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Biz</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <style type="text/css">
        .dataTable-info {
            display: none !important;
        }

        .datatable-table > thead {
            vertical-align: bottom;
            background-color: aliceblue;
            border-color: darkgray;
        }
    </style>
    <script src="<?= base_url()?>/assets/js/simple-datatables.min.js"></script>
    <script type="text/javascript">
        var dataTable1;

        $(function() {
            get_list_factory(1);
            reset_form();

            $('#reload').click(function(){
                reset_form();
                get_list_factory(1);
            });

            $('#add').click(function() {
                reset_form();
                $('#add_modal').modal('show');
                $('.modal-title').html('Tambah Data');
                $('#active_factory').val(1);
            });
        });

        function reset_form() {
            $('.add_fact').val('');
        }

        function get_list_factory(page) {
            if (dataTable1) {
                dataTable1.destroy();
            }

            $('.table-factory tbody').empty();
            
            $.ajax({
                url: '<?= base_url('api/masterdata/listFactory') ?>',
                type: 'GET',
                data: {
                    page: page
                },
                dataType: 'json',
                beforeSend: function() {
                    showLoading();
                    reset_form();
                },
                success: function(response) {
                    let str = ''; let status = ''; let badgeStatus = '';

                    let data = response;
                    $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                    $('.page_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                    if(response.data.jumlah != 0) {
                        $.each(response.data, function(i, v) {
                            badgeStatus = v.active == 1 ? 'bg-green-soft text-green' : 'bg-red-soft text-red';
                            status = v.active == 1 ? 'Aktif' : 'Non-Aktif'

                            str = '<tr>'+
                                    '<td align="center">'+((i+1) + ((response.page - 1) * response.limit))+'</td>'+
                                    '<td>'+v.name+'</td>'+
                                    '<td>'+v.address+'</td>'+
                                    '<td>'+v.phone+'</td>'+
                                    '<td><span class="badge '+badgeStatus+'">'+status+'</span></td>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="edit_factory('+v.id+')"><i data-feather="edit"></i></button>'+    
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" onclick="delete_factory('+v.id+')"><i data-feather="trash-2"></i></button>'+
                                    '</td>'+
                                '</tr>';
                            $('.table-factory tbody').append(str);
                        });
                    } else {
                        str = '<tr><td class="datatable-empty" colspan="6">No entries found</td></tr>';
                        $('.table-factory tbody').append(str);
                    }

                    feather.replace();
                    dataTable1 = new simpleDatatables.DataTable("#datatablesSimple", {
                        sortable: false
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Access Failed",
                        text: "Internal Server Error",
                        icon: "error"
                    });
                },
                complete: function() {
                    hideLoading();
                }
            });
        }
        
        function save_factory() {
            let addForm = $('#add_form').serialize();

            $.ajax({
                type : 'POST',
                url: '<?= base_url("api/masterdata/factory") ?>',
                data: addForm,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                },
                success: function(data) {
                    $('#add_modal').modal('hide');
                    get_list_factory(1)

                    Swal.fire({
                        title: "Berhasil",
                        text: "Data Berhasil Simpan",
                        icon: "success"
                    });

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Access Failed",
                        text: "Internal Server Error",
                        icon: "error"
                    });
                },
                complete: function() {
                    reset_form();
                    hideLoading();
                }
            });
        }

        function delete_factory(id) {
            if(id == '' || id == null) {
                return false;
            }

            Swal.fire({
                icon: "question",
                title: "Anda yakin untuk hapus data ?",
                showCancelButton: true,
                confirmButtonText: "Ya",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'DELETE',
                        url: '<?= base_url("api/masterdata/factory") ?>?id='+id,
                        cache: false,
                        dataType : 'json',
                        beforeSend: function() {
                            showLoading();
                        },
                        success: function(data) {
                            $('#add_modal').modal('hide');
                            get_list_factory(1)

                            Swal.fire("Berhasil", "Data Berhasil Hapus", "success");
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "Access Failed",
                                text: "Internal Server Error",
                                icon: "error"
                            });
                        },
                        complete: function() {
                            reset_form();
                            hideLoading();
                        }
                    });
                    
                }
            });

            
        }

        function edit_factory(id) {
            if(id == '' || id == null) {
                return false;
            }

            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/masterdata/factory")?>?id='+id,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                },
                success: function(data) {
                    $('#id_factory').val(id);
                    $('#name_factory').val(data.data.name);
                    $('#address_factory').val(data.data.address);
                    $('#phone_factory').val(data.data.phone);
                    $('#active_factory').val(data.data.active);

                    $('.modal-title').html('Edit Data')
                    $('#add_modal').modal('show');
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Access Failed",
                        text: "Internal Server Error",
                        icon: "error"
                    });
                },
                complete: function() {
                    hideLoading();
                }
            });
        }

        function paging(p){
            get_list_factory(p);
        }

    </script>
    
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="list"></i></div>
                                <?= $title ?>
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button type="button" class="btn btn-sm btn-light text-primary" id="reload">
                                <i class="me-1" data-feather="refresh-ccw"></i>
                                Reload
                            </button>
                            <button type="button" class="btn btn-sm btn-light text-primary" id="add">
                                <i class="me-1" data-feather="user-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid px-4">
            <div class="card">
                <div class="card-body">
                    <table id="datatablesSimple" class="table-factory">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pabrik</th>
                                <th>Alamat</th>
                                <th>Telfon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div id="pagination"></div>
                    <div class="page_summary"></div>

                </div>
            </div>
        </div>
    </main>
        
    <div class="modal fade" id="add_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 0px 20px 0px 20px">
                        <form id="add_form">
                            <input type="hidden" class="form-control add_fact" id="id_factory" name="id">
                            <div class="form-group row gx-3 mb-3">
                                <label for="name_factory" class="col-md-3 col-form-label d-flex justify-content-between"><span>Nama Pabrik</span><span>:</span></label>
                                <div class="col-md-9">
                                    <input class="form-control add_fact" id="name_factory" name="name" type="text" placeholder="Nama Pabrik"></input>
                                </div>
                            </div>
                            <div class="form-group row gx-3 mb-3">
                                <label for="address_factory" class="col-md-3 col-form-label d-flex justify-content-between"><span>Alamat</span><span>:</span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control add_fact" id="address_factory" name="address" type="text" placeholder="Alamat Pabrik"></textarea>
                                </div>
                            </div>
                            <div class="form-group row gx-3 mb-3">
                                <label for="phone_factory" class="col-md-3 col-form-label d-flex justify-content-between"><span>No.Telfon</span><span>:</span></label>
                                <div class="col-md-9">
                                    <input class="form-control add_fact" id="phone_factory" name="phone" type="text" placeholder="No. Telfon"></input>
                                </div>
                            </div>
                            <div class="form-group row gx-3 mb-3">
                                <label for="active_factory" class="col-md-3 col-form-label d-flex justify-content-between"><span>Status</span><span>:</span></label>
                                <div class="col-md-9">
                                    <select class="form-control add_fact" id="active_factory" name="active">
                                        <option value="" disabled selected>Pilih Status...</option>
                                        <option value="1" >Aktif</option>
                                        <option value="0" >Non-Aktif</option>
                                    </select>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-sm" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></i> &nbsp; Keluar</button>
                    <button class="btn btn-light btn-sm" type="button" onclick="save_factory()"><i class="fa-regular fa-floppy-disk"></i> &nbsp; Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>