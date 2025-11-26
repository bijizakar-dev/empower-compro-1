<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <style>
        .label-container {
            display: flex;
            justify-content: space-between;
        }
        .label-text {
            text-align: left;
            flex-grow: 1;
        }
        .label-colon {
            text-align: right;
            padding-left: 5px;
        }
        .show_line_colon {
            display: inline-block;
            border-bottom: 1px solid #000; /* Add underline */
            padding-bottom: 2px;
            min-width: 100px;
            font-style: italic;
        }
    </style>

    <script src="<?= base_url()?>/assets/js/simple-datatables.min.js"></script>
    <script type="text/javascript">
        var dataTable1;

        $(function() {
            get_list_user();
            reset_form();

            $('#reload').click(function(){
                reset_form();
                get_list_user();
            });

            $('#add').click(function() {
                reset_form();
                $('#add_modal').modal('show');
                $('.modal-title').html('Tambah Data User')
            });

            $('#id_employee_user').change(function() {
                $('#id_employee_user_hidden').val($(this).val());
                show_data_employee($(this).val());
            });
        })

        function reset_form() {
            $('.add_user').val('');
            $('.update_user').show();
            $('#password_user').attr('disabled', false);
            $('#password_user').attr('read-only', false);
        }

        function get_list_user() {
            if (dataTable1) {
                dataTable1.destroy();
            }
            $('.table-user tbody').empty();
            
            $.ajax({
                url: '<?= base_url('api/system/listUser') ?>',
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {
                    showLoading();
                    reset_form();
                },
                success: function(response) {
                    let str = ''; let status = ''; let badgeStatus = '';

                    if(response.data.length != 0) {
                        $.each(response.data, function(i, v) {
                            badgeStatus = v.active == 1 ? 'bg-green-soft text-green' : 'bg-red-soft text-red';
                            status = v.active == 1 ? 'Aktif' : 'Non-Aktif'

                            str = '<tr>'+
                                    '<td>'+
                                        '<div class="d-flex align-items-center">'+
                                            '<div class="avatar me-2"><i data-feather="user"></i></div>'+
                                            v.username+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+v.email+'</td>'+
                                    '<td><span class="badge '+badgeStatus+'">'+status+'</span></td>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="edit_user('+v.id+')" title="Ubah Data"><i data-feather="edit"></i></button> '+    
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="delete_user('+v.id+')" title="Hapus Data"><i data-feather="trash-2"></i></button>'+
                                        '<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark dropdown-toggle" id="dropdownFadeIn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                        '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownFadeIn">'+
                                            '<a class="dropdown-item" onclick=change_password('+v.id+')><i data-feather="key"></i> &nbsp;Ubah Password</a>'+
                                            '<a class="dropdown-item" onclick=reset_password('+v.id+')><i data-feather="refresh-cw"></i> &nbsp;Reset Password</a>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>';
                            $('.table-user tbody').append(str);
                        });
                    } else {
                        str = '';
                        $('.table-user tbody').append(str);
                    }
                    
                    feather.replace();
                    dataTable1 = new simpleDatatables.DataTable("#datatablesSimple");

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
        
        function save_user() {
            let addForm = $('#add_form').serialize();

            $.ajax({
                type : 'POST',
                url: '<?= base_url("api/system/user") ?>',
                data: addForm,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                },
                success: function(data) {
                    $('#add_modal').modal('hide');
                    get_list_user()

                    Swal.fire({
                        title: "Berhasil",
                        text: "Data Berhasil Simpan",
                        icon: "success"
                    });

                },
                error: function(e){
                    Swal.fire({
                        title: "Access Failed",
                        text: "Internal Server Error",
                        icon: "error"
                    });
                },
                complete: function() {
                    hideLoading();
                    reset_form();
                }
            });
        }

        function delete_user(id) {
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
                        url: '<?= base_url("api/system/user") ?>?id='+id,
                        cache: false,
                        dataType : 'json',
                        beforeSend: function() {
                            showLoading();
                            reset_form();
                        },
                        success: function(data) {
                            $('#add_modal').modal('hide');
                            get_list_user()

                            Swal.fire("Berhasil", "Data Berhasil Hapus", "success");
                        },
                        error: function(e){
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
            });

            
        }

        function edit_user(id) {
            if(id == '' || id == null) {
                return false;
            }

            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/system/user")?>?id='+id,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                    reset_form();
                },
                success: function(data) {
                    $('#id_user').val(id);
                    $('#username_user').val(data.data.username);
                    $('#email_user').val(data.data.email);
                    $('#password_user').val(data.data.password);
                    $('#active_user').val(data.data.active);

                    $('.update_user').hide();

                    $('#password_user').attr('disabled', true);
                    $('#password_user').attr('read-only', true);

                    $('.modal-title').html('Edit Data User')
                    $('#add_modal').modal('show');
                },
                error: function(e){
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

        function change_password(id) {
            if(id == '' || id == null) {
                return false;
            }
            removeFeedback('.change_pw_user');
            $('.change_pw_user').val('');
            $('#new_pw_change, #conf_new_pw_change, #btn_save_pw_change').prop('disabled', true);

            $('#id_user_pw_change').val(id);
            $('#change_password_modal').modal('show');
            
            $('#conf_new_pw_change').blur(function() {
                if($(this).val() == $('#new_pw_change').val()) {
                    validFeedback('#conf_new_pw_change', '');
                    $('#btn_save_pw_change').prop('disabled', false);
                } else {
                    invalidFeedback('#conf_new_pw_change', 'Password yang di masukan tidak sama dengan password baru');
                    $('#btn_save_pw_change').prop('disabled', true);
                }
            });

            $('#old_pw_change').blur(function() {
                check_old_password();
            });
        }

        function check_old_password() {
            let id          = $('#id_user_pw_change').val();
            let password    = $('#old_pw_change').val();
 
            if(password == '') {
                return false;
            }

            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/system/checkPasswordUser")?>?id='+id+'&password='+password,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                },
                success: function(data) {
                    if(data.status == true)  {
                        validFeedback('#old_pw_change', 'Password Valid');
                        $('#new_pw_change, #conf_new_pw_change').prop('disabled', false);
                    } else {
                        invalidFeedback('#old_pw_change', 'Password Tidak Sama');
                        $('#new_pw_change, #conf_new_pw_change').prop('disabled', true);
                    }
                },
                error: function(e){
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

        function save_change_password() {
            let changePwForm = $('#change_password_form').serialize();

            $.ajax({
                type : 'POST',
                url: '<?= base_url("api/system/changePasswordUser") ?>',
                data: changePwForm,
                cache: false,
                dataType : 'json',
                beforeSend: function() {
                    showLoading();
                },
                success: function(data) {
                    $('#change_password_modal').modal('hide');
                    get_list_user()

                    Swal.fire({
                        title: "Berhasil",
                        text: "Data Berhasil Simpan",
                        icon: "success"
                    });

                },
                error: function(e){
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

        function reset_password(id) {
            let changePw = {
                "id" : id,
                "conf_new_pw": "123456"
            }

            Swal.fire({
                title: "Konfirmasi Reset Password",
                text: "Apakah anda yakin ingin reset password anda ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'POST',
                        url: '<?= base_url("api/system/changePasswordUser") ?>',
                        data: changePw,
                        cache: false,
                        dataType : 'json',
                        beforeSend: function() {
                            showLoading();
                        },
                        success: function(data) {
                            $('#change_password_modal').modal('hide');
                            get_list_user()

                            Swal.fire({
                                title: "Berhasil!",
                                text: "Berhasil Reset Password!",
                                icon: "success"
                            });
                        },
                        error: function(e){
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
            });
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
                                Tambah Akun
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid px-4">
            <div class="card">
                <div class="card-body">
                    <table id="datatablesSimple" class="table-user">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="add_modal">
        <div class="modal-dialog" role="document" style="--bs-modal-width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 0px 20px 0px 20px">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form id="add_form">
                                        <!-- input Hidden -->
                                        <input type="hidden" class="form-control add_user" id="id_user" name="id">
                                        <!-- input Hidden -->

                                        <!-- IDENTITAS DIRI -->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="username_user">Username</label>
                                            <input class="form-control add_user" id="username_user" type="text" name="username" placeholder="Username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="email_user">Email</label>
                                            <input class="form-control add_user" id="email_user" type="email" name="email" placeholder="Alamat Email" />
                                        </div>
                                        <div class="mb-3 update_user">
                                            <label class="small mb-1" for="education_emp">Password</label>
                                            <input class="form-control add_user" id="password_user"  name="password" placeholder="Password" />
                                        </div>
                                        <!-- IDENTITAS DIRI -->
                                        
                                        <br>
                                        <hr>
                                        <!-- SETTING -->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="active_user">Status</label>
                                                <select class="form-select add_user" id="active_user" name="active" aria-label="Default select example">
                                                    <option value="" selected disabled>Pilih Status...</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non-Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- SETTING -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-sm" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></i> &nbsp; Keluar</button>
                    <button class="btn btn-light btn-sm" type="button" onclick="save_user()"><i class="fa-regular fa-floppy-disk"></i> &nbsp; Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change_password_modal">
        <div class="modal-dialog" role="document" style="--bs-modal-width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 0px 20px 0px 20px">
                        <div class="col-xl-12">
                            <form id="change_password_form">
                                <!-- input Hidden -->
                                <input type="hidden" class="form-control change_pw_user" id="id_user_pw_change" name="id">
                                <!-- input Hidden -->

                                <!-- Password Form -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="old_pw_change">Password Lama*</label>
                                    <input class="form-control change_pw_user" id="old_pw_change" type="password" name="old_pw" placeholder="Masukan passowrd lama" required/>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="mb-3"> 
                                    <label class="small mb-1" for="new_pw_change">Password Baru*</label>
                                    <input class="form-control change_pw_user" id="new_pw_change" type="password" name="new_pw" placeholder="Masukan password baru" required/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="conf_new_pw_change">Konfirmasi Password Baru*</label>
                                    <input class="form-control change_pw_user" id="conf_new_pw_change" type="password" name="conf_new_pw" placeholder="Masukan ulang password baru" required/>
                                </div>
                                <!-- Password Form  -->
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-sm" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></i> &nbsp; Keluar</button>
                    <button class="btn btn-light btn-sm" type="button" id="btn_save_pw_change" onclick="save_change_password()"><i class="fa-regular fa-floppy-disk"></i> &nbsp; Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>