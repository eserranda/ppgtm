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
    @if (auth()->user()->hasAnyRole(['klasis']))
        Program Kerja {{ auth()->user()->name }}
    @else
        Program Kerja Klasis
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center ">
                            <select class="form-control custom-select" id="filterData" name="filterData">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="Kerohanian">Kerohanian</option>
                                <option value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                                <option value="Dana">Dana</option>
                                <option value="Kaderisasi">Kaderisasi</option>
                                <option value="Minat Dan Bakat">Minat Dan Bakat</option>
                                <option value="Kesekretariatan">Kesekretariatan</option>
                            </select>
                            <button type="button" class="btn btn-light waves-effect mx-2 col-2" id="reload">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">`
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-info " id="btnPrint"><i
                                    class="mdi mdi-printer"></i></button>
                            <button type="button" class="btn btn-outline-success" id ="btnExcel">Excel</button>
                            @if (auth()->user()->hasAnyRole(['super_admin', 'klasis']))
                                <button type="button" class="btn btn-primary    waves-light" data-toggle="modal"
                                    data-target="#addModal">Tambah Data</button>
                            @endif
                        </div>
                    </div>
                    <table id="datatable" class="table table-striped dt-responsive"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bidang</th>
                                <th>Ketua Bidang</th>
                                <th>Anggota</th>
                                <th>Program</th>
                                <th>Dasar Pemikiran</th>
                                <th>Kegiatan</th>
                                <th>Bentuk Kegiatan</th>
                                <th>Sasaran</th>
                                <th>Penanggung Jawab</th>
                                <th>Waktu Pelaksana</th>
                                <th>Pelaksana</th>
                                <th>Biaya</th>
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

    @include('pages.program-kerja-klasis.add')
    @include('pages.program-kerja-klasis.edit')
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
            fetch('/program-kerja-klasis/findById/' + id)
                .then(response => response.json())
                .then(data => {
                    // Asumsi bahwa objek 'data' sudah tersedia dan memiliki struktur yang sesuai
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_id_klasis').value = data.id_klasis;
                    document.getElementById('edit_bidang').value = data.bidang;
                    document.getElementById('edit_ketua_bidang').value = data.ketua_bidang;
                    document.getElementById('edit_anggota').value = data.anggota;
                    document.getElementById('edit_program').value = data.program;
                    document.getElementById('edit_dasar_pemikiran').value = data.dasar_pemikiran;
                    document.getElementById('edit_kegiatan').value = data.kegiatan;
                    document.getElementById('edit_tujuan').value = data.tujuan;
                    document.getElementById('edit_sasaran').value = data.sasaran;
                    document.getElementById('edit_penanggung_jawab').value = data.penanggung_jawab;
                    document.getElementById('edit_waktu_pelaksana').value = data.waktu_pelaksana;
                    document.getElementById('edit_pelaksana').value = data.pelaksana;
                    document.getElementById('edit_biaya').value = data.biaya;
                    document.getElementById('edit_data_time').value = data.data_time;

                    var editIdklasisSelect = document.getElementById('edit_id_klasis');

                    fetch('/klasis/findOne/' + data.id_klasis, {
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
                            updateOptionsAndSelect2klasis(editIdklasisSelect, data.id, data.nama_klasis);
                        })
                        .catch(error => console.error('Error fetching data:', error));
                })
                .catch(error => console.error(error));
            // show modal edit
            $('#editModal').modal('show');
        }

        function updateOptionsAndSelect2klasis(selectElement, id, name) {
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                        },
                        init: function(api, node, config) {
                            $(node).hide();
                        }
                    },
                ],
                ajax: "{{ route('program-kerja-klasis.index') }}",
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
                        data: 'ketua_bidang',
                        name: 'ketua_bidang',
                        orderable: false,
                    },
                    {
                        data: 'anggota',
                        name: 'anggota',
                        orderable: false,
                    },
                    {
                        data: 'program',
                        name: 'program',
                        orderable: false,
                    },
                    {
                        data: 'dasar_pemikiran',
                        name: 'dasar_pemikiran',
                        orderable: false,
                    },
                    {
                        data: 'kegiatan',
                        name: 'kegiatan',
                        orderable: false,
                    },
                    {
                        data: 'tujuan',
                        name: 'tujuan',
                        orderable: false,
                    },
                    {
                        data: 'sasaran',
                        name: 'sasaran',
                        orderable: false,
                    },
                    {
                        data: 'penanggung_jawab',
                        name: 'penanggung_jawab',
                        orderable: false,
                    },
                    {
                        data: 'waktu_pelaksana',
                        name: 'waktu_pelaksana',
                        orderable: false,
                    },
                    {
                        data: 'pelaksana',
                        name: 'pelaksana',
                        orderable: false,
                    },
                    {
                        data: 'biaya',
                        name: 'biaya',
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

            // // fetch data klasis yang ada pada tabel klasis 
            // fetch('/klasis/getIdAndNameAllKlasis')
            //     .then(response => response.json())
            //     .then(data => {
            //         const filterData = document.getElementById('filterData');
            //         data.forEach(klasis => {
            //             const option = document.createElement('option');
            //             option.value = klasis.id_klasis;
            //             option.textContent = klasis.nama_klasis;
            //             filterData.appendChild(option);
            //         });
            //     })
            //     .catch(error => console.error('Error fetching data:', error));


            $('#filterData').on('change', function() {
                const selectedFilter = $(this).val();
                datatable.ajax.url('{{ route('program-kerja-klasis.index') }}?filter=' + selectedFilter)
                    .load();
            });

            $('#reload').on('click', function() {
                $('#filterData').val('');
                datatable.ajax.url('{{ route('program-kerja-klasis.index') }}').load();
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
                        url: '/program-kerja-klasis/destroy/' + id,
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
