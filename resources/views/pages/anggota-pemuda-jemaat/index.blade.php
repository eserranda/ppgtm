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

    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endpush
@section('page_title')
    Anggota Pemuda Jemaat
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="header-title"><b> Anggota Pemuda Jemaat</b></h5>
                        <div>
                            <button type="button" class="btn btn-info waves-effect" id="btnPrint">Print</button>
                            <button type="button" class="btn btn-success waves-effect" id ="btnExcel">Excel</button>

                            <button type="button" class="btn btn-primary   waves-effect waves-light" data-toggle="modal"
                                data-target="#addModal">Tambah Data</button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dapel</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>No telepon</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>

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

    @include('pages.anggota-pemuda-jemaat.add')
    @include('pages.anggota-pemuda-jemaat.edit')
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
            fetch('/program-kerja-jemaat/findById/' + id)
                .then(response => response.json())
                .then(data => {
                    // Asumsi bahwa objek 'data' sudah tersedia dan memiliki struktur yang sesuai
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_id_jemaat').value = data.id_jemaat;
                    document.getElementById('edit_bidang').value = data.bidang;
                    document.getElementById('edit_ketua_bidang').value = data.ketua_bidang;
                    document.getElementById('edit_anggota').value = data.anggota;
                    document.getElementById('edit_program').value = data.program;
                    document.getElementById('edit_tujuan').value = data.tujuan;
                    document.getElementById('edit_sasaran').value = data.sasaran;
                    document.getElementById('edit_bentuk_kegiatan').value = data.bentuk_kegiatan;
                    document.getElementById('edit_waktu').value = data.waktu;
                    document.getElementById('edit_pelaksana').value = data.pelaksana;
                    document.getElementById('edit_sumber_dana').value = data.sumber_dana;
                    document.getElementById('edit_implementasi').value = data.implementasi;

                    var editIdJemaatSelect = document.getElementById('edit_id_jemaat');

                    fetch('/jemaat/findOne/' + data.id_jemaat, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Gagal mengambil data');
                            }
                            return response.json();
                        })
                        .then(data => {
                            updateOptionsAndSelect2Jemaat(editIdJemaatSelect, data.id, data.nama_jemaat);
                        })
                        .catch(error => console.error('Error fetching data:', error));
                })
                .catch(error => console.error(error));
            // show modal edit
            $('#editModal').modal('show');
        }

        function updateOptionsAndSelect2Jemaat(selectElement, id, name) {
            // Hapus semua opsi yang ada di elemen <select>
            $(selectElement).empty();

            // Tambahkan opsi baru ke elemen <select>
            var option = new Option(name, id, true, true);
            $(selectElement).append(option);

            // Perbarui tampilan Select2
            $(selectElement).trigger('change');
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
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                ],
                ajax: "{{ route('anggota-pemuda-jemaat.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: '#',
                        orderable: false,

                    },
                    {
                        data: 'dapel',
                        name: 'dapel',
                        orderable: false,
                    },
                    {
                        data: 'nama_anggota',
                        name: 'nama_anggota',
                        orderable: false,
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir',
                        orderable: false,
                    },
                    {
                        data: 'no_telp',
                        name: 'no_telp',
                        orderable: false,
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        orderable: false,
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
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

            $('#filterData').on('change', function() {
                const selectedFilter = $(this).val();
                datatable.ajax.url('{{ route('jemaat.index') }}?filter=' + selectedFilter)
                    .load();
            });

            $('#reload').on('click', function() {
                $('#filterData').val('');
                datatable.ajax.url('{{ route('jemaat.index') }}').load();
            });

        });

        $('#btnExcel').on('click', function() {
            datatable.button('.buttons-excel').trigger();
        });

        $('#btnPrint').on('click', function() {
            datatable.button('.buttons-print').trigger();
        });

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
                        url: '/program-kerja-jemaat/destroy/' + id,
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
    </script>
@endpush
