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
@endpush
@section('page_title')
    Program Kerja
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center col-md-6">
                            {{-- <label class="col-form-label col-md-3">Filter :</label> --}}
                            <select class="form-control custom-select" id="filterData" name="filterData">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="Pembinaan, Kerohanian, Minat dan Bakat">Pembinaan, Kerohanian, Minat dan
                                    Bakat</option>Z
                                <option value="Kederisasi dan Pengembangan Organisasi">Kederisasi dan Pengembangan
                                    Organisasi
                                </option>
                                <option value="Komunikasi dan Hubungan Antar Lembaga">Komunikasi dan Hubungan Antar
                                    Lembaga</option>
                                <option value="Kemandirian Dana dan Diakonia">Kemandirian Dana dan Diakonia</option>
                                <option value="Kajian Strategis dan Lingkup Hidup">Kajian Strategis dan Lingkup Hidup
                                </option>
                            </select>

                            <input type="date" class="form-control col-md-3 mx-2" id="filterTanggal"
                                name="filterTanggal">

                            <a class="btn btn-icon" aria-label="Button" id="search">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light waves-effect" id="reload">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">`
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                </svg>
                            </button>

                            <button type="button" class="btn btn-info waves-effect" id="btnPrint">
                                <i class="mdi mdi-printer-check"></i>
                            </button>
                            <button type="button" class="btn btn-success waves-effect" id ="btnExcel">Excel</button>

                            <button type="button" class="btn btn-primary   waves-effect waves-light" data-toggle="modal"
                                data-target="#addModal">Tambah Data</button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bidang</th>
                                <th>Program Kerja</th>
                                <th>Sasaran</th>
                                <th>Tujuan</th>
                                <th>Waktu dan tempat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.program-kerja.add')
    @include('pages.program-kerja.edit')
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

    <script>
        function edit(id) {
            fetch('/program-kerja/findById/' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_program_kerja').value = data.program_kerja;
                    document.getElementById('edit_sasaran').value = data.sasaran;
                    document.getElementById('edit_bidang').value = data.bidang;
                    document.getElementById('edit_tujuan').value = data.tujuan;
                    document.getElementById('edit_waktu_dan_tempat').value = data.waktu_dan_tempat;
                    document.getElementById('edit_tanggal').value = data.tanggal;
                })
                .catch(error => console.error(error));
            $('#editModal').modal('show');
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
                            columns: [0, 1, 2, 4, 5]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                ],
                ajax: "{{ route('program-kerja.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: '#',
                        orderable: false,

                    },
                    {
                        data: 'bidang',
                        name: 'bidang',
                        orderable: false,
                    },
                    {
                        data: 'program_kerja',
                        name: 'program_kerja',
                        orderable: false,
                    },
                    {
                        data: 'sasaran',
                        name: 'sasaran',
                        orderable: false,
                    },
                    {
                        data: 'tujuan',
                        name: 'tujuan',
                        orderable: false,
                    },
                    {
                        data: 'waktu_dan_tempat',
                        name: 'waktu_dan_tempat',
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


            $('#search').on('click', function() {
                var selectedFilter = $('#filterData').val();
                var selectedTanggal = $('#filterTanggal').val();

                if (!selectedFilter && !selectedTanggal) {
                    alert('Pilih salah satu filter');
                    return;
                }

                let url = '{{ route('program-kerja.index') }}?';


                if (selectedFilter) {
                    url += 'filter=' + selectedFilter;
                }

                if (selectedFilter && selectedTanggal) {
                    url += '&';
                }

                if (selectedTanggal) {
                    url += 'tanggal=' + selectedTanggal;
                }


                datatable.ajax.url(url).load();
            });

            $('#reload').on('click', function() {
                $('#filterData').val('');
                $('#filterTanggal').val('');
                datatable.ajax.url('{{ route('program-kerja.index') }}').load();
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
                        url: '/program-kerja/destroy/' + id,
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
