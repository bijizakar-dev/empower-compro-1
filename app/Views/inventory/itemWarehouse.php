<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Biz</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <style type="text/css">
        .dataTable-info {
            display: none !important;
        }

        .table-item {
            width: 100%; 
            border-collapse: collapse;
        }

        .table-item thead th {
            vertical-align: bottom;
            background-color: #e0dede ;
            border: 1px solid #d4d4d4; 
            text-align: left;
            position: relative;
            padding: 8px; 
        }
        
        .table-item tbody td {
            border: 1px solid #dee2e6;
            padding: 8px; 
        }

        .table-item tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-responsive {
            overflow-x: auto ;
        }

        .input-group {
            display: flex;
            align-items: center;
        }
    </style>
    
    <script type="text/javascript">
        let permissions = <?= json_encode($permissions) ?>;

        let permission_add = false;
        let permission_edit = false;
        let permission_delete = false;

        if (permissions.length != 0) {
            let permission = permissions[0];

            if (permission.add == 1) {
                permission_add = true;
            }

            if (permission.edit == 1) {
                permission_edit = true;
            }

            if (permission.delete == 1) {
                permission_delete = true;
            }
        }
        let dataTable1;

        $(function () {
            // CHECK ROLE PERMISSIONS USER 
            if (permission_add == true) {
                $('#add').show();
            }

            get_list_item_warehouse(1); 
            // reset_form();

            $('#reload').click(function () {
                // reset_form();
                get_list_item_warehouse(1);
            });

            $('#add').click(function () {
                // reset_form();
                $('#add_modal').modal('show');
                $('.modal-title').html('Tambah Data');
            });
        });

        function get_list_item_warehouse(page) {
            if ($.fn.DataTable.isDataTable('#datatablesSimple')) {
                $('#datatablesSimple').DataTable().destroy(); 
            }

            $('.table-item tbody').empty(); 

            $.ajax({
                url: '<?= base_url('api/inventory/listItem') ?>',
                type: 'GET',
                data: {
                    page: page
                },
                dataType: 'json',
                beforeSend: function () {
                    showLoading();
                },
                success: function (response) {
                    let str = '';
                    let status = '';
                    let badgeStatus = '';

                    let data = response;

                    $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                    $('.page_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                    if (response.jumlah != 0) {
                        $.each(response.data, function (i, v) {
                            badgeStatus = v.active == 1 ? 'bg-green-soft text-green' : 'bg-red-soft text-red';
                            status = v.active == 1 ? 'Aktif' : 'Non-Aktif';

                            str = '<tr>' +
                                    '<td align="center">'+((i+1) + ((response.page - 1) * response.limit))+'</td>'+
                                    '<td>' + v.item_name + ' <i><small>('+v.factory_name+')</small></i></td>' +
                                    '<td class="dt-body-center">' + v.stock + ' '+ v.unit_name +'</td>' +
                                    '<td>' + v.warehouse_name + '</td>' +
                                    '<td class="dt-body-right">' + (v.hna ? v.hna:'-') + '</td>' +
                                    '<td class="dt-body-right">' + (v.hpp ? v.hpp:'-') +'</td>' +
                                    '<td class="dt-body-center">' + (v.margin ? v.margin:'-') +' %</td>' +
                                    '<td class="dt-body-center"><span class="badge ' + badgeStatus + '">' + status + '</span></td>' +
                                    '<td align="right">'+
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="edit_user('+v.id+')" title="Ubah Data"><i data-feather="edit"></i></button> '+    
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="delete_user('+v.id+')" title="Hapus Data"><i data-feather="trash-2"></i></button>'+
                                    '</td>'+
                                '</tr>';
                            $('.table-item tbody').append(str);
                        }); 
                        
                        $('#datatablesSimple').DataTable({
                            "paging": false,           
                            "searching": false,      
                            "ordering": false,         
                            "info": false
                        });

                    } else {
                        str = '<tr><td class="datatable-empty" colspan="10">No entries found</td></tr>';
                        $('.table-item tbody').append(str);
                    }

                    feather.replace();  
                    
                },
                error: function (xhr, status, error) {
                    hideLoading();
                    Swal.fire({
                        title: "Error",
                        text: "Gagal mengambil data",
                        icon: "error"
                    });
                },
                complete: function () {
                    hideLoading();
                }
            });
        }

        function reset_form() {
            $('.add_item').val('');
        }

        function paging(p, tab){
            get_list_item_warehouse(p);
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
                    <div class="table-responsive mb-2">
                        <table id="datatablesSimple" class="table-item display hover">
                            <thead class="cell-border">
                                <tr>
                                    <th rowspan="2" class="dt-head-center">No.</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2" class="dt-head-center">Stock</th>
                                    <th rowspan="2">Gudang</th>
                                    <th colspan="2" class="dt-head-center">Harga</th>
                                    <th rowspan="2" class="dt-head-center">Margin</th>
                                    <th rowspan="2" class="dt-head-center">Status</th>
                                    <th rowspan="2" class="dt-head-right">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="dt-head-center">Netto</th>
                                    <th class="dt-head-center">Pokok</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div id="pagination"></div>
                    <div class="page_summary"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Add -->
    <div class="modal fade" id="add_modal">
        <div class="modal-dialog" role="document" style="--bs-modal-width: 50%; transform: scale(0.9);">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 0px 20px 0px 20px">
                        <form id="add_form">
                            <input type="hidden" class="form-control add_fact" id="id_factory" name="id">
                            <div class="form-group row gx-3 mb-2">
                                <label for="id_item_iw" class="col-md-3 col-form-label d-flex justify-content-between"><span>Barang</span><span>:</span></label>
                                <div class="col-md-9">
                                    <select class="form-select add_iw" id="id_item_iw" name="id_item" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih Barang...</option>
                                        <?php foreach ($item as $key => $value): ?>
                                            <option value="<?= esc($key) ?>"><?= esc($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gx-3 mb-2">
                                <label for="id_factory_iw" class="col-md-3 col-form-label d-flex justify-content-between"><span>Pabrik</span><span>:</span></label>
                                <div class="col-md-9">
                                    <select class="form-select add_iw" id="id_factory_iw" name="id_factory" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih Pabrik...</option>
                                        <?php foreach ($factory as $key => $value): ?>
                                            <option value="<?= esc($key) ?>"><?= esc($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gx-3 mb-2">
                                <label for="id_warehouse_iw" class="col-md-3 col-form-label d-flex justify-content-between"><span>Lokasi Gudang</span><span>:</span></label>
                                <div class="col-md-9">
                                    <select class="form-select add_iw" id="id_warehouse_iw" name="id_warehouse" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih Gudang...</option>
                                        <?php foreach ($warehouse as $key => $value): ?>
                                            <option value="<?= esc($key) ?>"><?= esc($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <br>
                            <h6>Data Harga Barang</h6>
                            <hr>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small mb-12" for="stock_iw">Stok</label>
                                    <input class="form-control add_iw" id="stock_iw" name="stock" type="number" placeholder="Stok"></input>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-12" for="stock_minimum_iw">Stok Minimal</label>
                                    <input class="form-control add_iw" id="stock_minimum_iw" name="stock_minimum" type="number" placeholder="Stok Minimal"></input>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-12" for="margin_iw">PPN</label>
                                    <div class="input-group">
                                        <div class="input-group-text" style="border-radius: 5px 0 0 5px; background-color: #f0f0f0">%</div>
                                        <input type="number" class="form-control add_iw" id="ppn_iw" placeholder="PPN" value="11" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-5">
                                    <label class="small mb-12" for="hna_iw">Harga Netto (Exclude PPN)</label>
                                    <div class="input-group">
                                        <div class="input-group-text" style="border-radius: 5px 0 0 5px; background-color: #f0f0f0">Rp.</div>
                                        <input type="text" class="form-control add_iw" id="hna_iw" placeholder="Harga Netto">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="small mb-12" for="hpp_iw">Harga Pokok (HPP)</label>
                                    <div class="input-group">
                                        <div class="input-group-text" style="border-radius: 5px 0 0 5px; background-color: #f0f0f0">Rp.</div>
                                        <input class="form-control add_iw" id="hpp_iw" name="hpp" type="text" placeholder="HPP"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-5">
                                    <label class="small mb-12" for="margin_iw">Margin</label>
                                    <div class="input-group">
                                        <div class="input-group-text" style="border-radius: 5px 0 0 5px; background-color: #f0f0f0">%</div>
                                        <input type="number" class="form-control add_iw" id="margin_iw" placeholder="Margin">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="small mb-12" for="margin_rp_iw"></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text" style="border-radius: 5px 0 0 5px; background-color: #f0f0f0">Rp.</div>
                                        <input class="form-control add_iw" id="margin_rp_iw" type="text" placeholder="Margin (Rp.)"></input>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row gx-3 mb-3">
                                <label for="active_iw" class="col-md-3 col-form-label d-flex justify-content-between"><span>Status</span><span>:</span></label>
                                <div class="col-md-9">
                                    <select class="form-control add_fact" id="active_iw" name="active">
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
    <!-- Modal Add -->

    <!-- Modal Search -->
    <!-- Modal Search -->

<?= $this->endSection() ?>