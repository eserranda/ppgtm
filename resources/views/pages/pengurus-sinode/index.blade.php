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
    Data Pengurus Sinode
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center col-6">
                            <select class="form-control custom-select" id="filterData" name="filterData">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="KSB">KSB</option>
                                <hr>
                                <option value="Pembinaan dan Kerohanian">Pembinaan dan Kerohanian</option>
                                <option value="Minat dan Bakat">Minat dan Bakat</option>
                                <option value="Kaderisasi">Kaderisasi</option>
                                <option value="Pengembangan Organisasi">Pengembangan Organisasi</option>
                                <option value="Komunikasi">Komunikasi</option>
                                <option value="Hubungan Antar Lembaga">Hubungan Antar Lembaga</option>
                                <option value="Kemandirian Dana">Kemandirian Dana</option>
                                <option value="Diakonia">Diakonia</option>
                                <option value="Kajian Strategis">Kajian Strategis</option>
                                <option value="Lingkungan Hidup">Lingkungan Hidup</option>
                            </select>

                            <input type="date" class="form-control mx-2" name="filterTanggal" id="filterTanggal">

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
                            <button type="button" class="btn btn-light waves-effect mx-2" id="reload">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">`
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                </svg>
                            </button>

                            <button type="button" class="btn btn-outline-info " id="btnPrint"><i
                                    class="mdi mdi-printer"></i></button>
                            <button type="button" class="btn btn-outline-success " id ="btnExcel">Excel</button>

                            <button type="button" class="btn btn-primary    waves-light" data-toggle="modal"
                                data-target="#addModal">Tambah Data</button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Jabatan</th>
                                <th>Periode</th>
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

    @include('pages.pengurus-sinode.add')
    @include('pages.pengurus-sinode.edit')
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
            fetch('/pengurus-sinode/findById/' + id)
                .then(response => response.json())
                .then(data => {
                    // Asumsi bahwa objek 'data' sudah tersedia dan memiliki struktur yang sesuai
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_bidang').value = data.bidang;
                    document.getElementById('edit_jabatan').value = data.jabatan;
                    document.getElementById('edit_tahun_mulai').value = data.tahun_mulai;
                    document.getElementById('edit_tahun_selesai').value = data.tahun_selesai;
                    document.getElementById('edit_tanggal').value = data.tanggal;


                    // var editIdJemaatSelect = document.getElementById('edit_id_jemaat');

                    // fetch('/jemaat/findOne/' + data.id_jemaat, {
                    //         method: 'GET',
                    //         headers: {
                    //             'Content-Type': 'application/json'
                    //         }
                    //     })
                    //     .then(response => {
                    //         if (!response.ok) {
                    //             throw new Error('Gagal mengambil data');
                    //         }
                    //         return response.json();
                    //     })
                    //     .then(data => {
                    //         updateOptionsAndSelect2Jemaat(editIdJemaatSelect, data.id, data.nama_jemaat);
                    //     })
                    //     .catch(error => console.error('Error fetching data:', error));
                })
                .catch(error => console.error(error));
            // show modal edit
            $('#editModal').modal('show');
        }

        // function updateOptionsAndSelect2Jemaat(selectElement, id, name) {
        //     // Hapus semua opsi yang ada di elemen <select>
        //     $(selectElement).empty();

        //     // Tambahkan opsi baru ke elemen <select>
        //     var option = new Option(name, id, true, true);
        //     $(selectElement).append(option);

        //     // Perbarui tampilan Select2
        //     $(selectElement).trigger('change');
        // }


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
                ajax: "{{ route('pengurus-sinode.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: '#',
                        orderable: false,

                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'bidang',
                        name: 'bidang',
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan',
                    },
                    {
                        data: 'periode',
                        name: 'periode',
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

                let url = '{{ route('pengurus-sinode.index') }}?';

                if (selectedFilter) {
                    url += 'filter=' + selectedFilter;
                }

                if (selectedFilter && selectedTanggal) {
                    url += '&filter=' + selectedFilter + '&tanggal=' + selectedTanggal;
                }

                if (selectedTanggal) {
                    url += 'tanggal=' + selectedTanggal;
                }
                datatable.ajax.url(url).load();
            });


            // $('#filterData').on('change', function() {
            //     $('#filterTanggal').val('');
            //     const selectedFilter = $(this).val();
            //     datatable.ajax.url('{{ route('pengurus-sinode.index') }}?filter=' + selectedFilter)
            //         .load();
            // });

            // $('#filterTanggal').on('change', function() {
            //     $('#filterData').val('');
            //     const selectedFilter = $(this).val();
            //     datatable.ajax.url('{{ route('pengurus-sinode.index') }}?tanggal=' + selectedFilter)
            //         .load();
            // });

            $('#reload').on('click', function() {
                $('#filterData').val('');
                $('#filterTanggal').val('');
                datatable.ajax.url('{{ route('pengurus-sinode.index') }}').load();
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
                        url: '/pengurus-sinode/destroy/' + id,
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
