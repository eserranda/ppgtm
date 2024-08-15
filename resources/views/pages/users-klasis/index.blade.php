@extends('layouts.master')

@push('header_comp')
    <!-- DataTables -->
    <link href="{{ asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- select2 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endpush

@section('page_title')
    Data Users Klasis
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        {{-- <h4 class="header-title">Data Users</h4> --}}

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-info waves-effect" id="btnPrint">Print</button>
                            <button type="button" class="btn btn-success waves-effect mx-1" id="btnExcel">Excel</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                ADD
                            </button>
                        </div>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role/User Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.users-klasis.add')
    @include('pages.users-klasis.edit')
@endsection

@push('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        function edit(id) {
            fetch('/users/findById/' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_username').value = data.username;
                    document.getElementById('edit_email').value = data.email;
                    // document.getElementById('edit_roles').value = data.roles;
                })
                .catch(error => console.error(error));
            // show modal edit
            $('#editModal').modal('show');
        }


        async function hapus(id) {
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#D85F47',
                cancelButtonColor: '#47D89C',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/users/destroy/' + id,
                        type: 'DELETE',
                        data: {
                            _token: csrfToken
                        },
                        success: function(response) {
                            console.log('Response:', response);
                            if (response.status) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                );
                                $('#datatable').DataTable().ajax.reload();

                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Data gagal dihapus.',
                                    'error'
                                );
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        var datatable;
        $(document).ready(function() {
            datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                responsive: true,

                dom: "<'row'<'col-lg-3'l> <'col-lg-4'B> <'col-lg-5'f>>" +
                    "<'row'<'col-sm-12 py-lg-2'tr>>" +
                    "<'row'<'col-sm-12 col-lg-5'i><'col-sm-12 col-lg-7'p>>",
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                ],
                ajax: "{{ route('users-klasis.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: '#',
                        orderable: false,

                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false,
                    },
                    {
                        data: 'username',
                        name: 'username',
                        orderable: false,
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: false,
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: false,
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });

        $('#btnExcel').on('click', function() {
            datatable.button('.buttons-excel').trigger();
        });

        $('#btnPrint').on('click', function() {
            datatable.button('.buttons-print').trigger();
        });
    </script>
@endpush
