<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Pengurus Sinode</h5>
                <button type="button" class="close" onclick="closeModalAdd()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-row">
                        {{-- <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="id_jemaat">Jemaat</label>
                            <select class="form-select" id="id_jemaat" name="id_jemaat">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div> --}}

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control custom-select" id="bidang" name="bidang">
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
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class=" col-md-6 mb-3">
                            <label class="form-label" for="nama">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                placeholder="Tanggal">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="anggota">Jabatan</label>
                            <select class="form-control custom-select" id="jabatan" name="jabatan">
                                <option value="" selected disabled>Pilih Jabatan</option>
                                <option value="Ketua Umum">Ketua Umum</option>
                                <option value="Ketua I">Ketua I</option>
                                <option value="Ketua II">Ketua II</option>
                                <option value="Ketua III">Ketua III</option>
                                <option value="Ketua IV">Ketua IV</option>
                                <option value="Ketua V">Ketua V</option>
                                <option value="Sekretaris Umum">Sekretaris Umum</option>
                                <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                                <option value="Bendahara Umum">Bendahara Umum</option>
                                <option value="Wakil Bendahara">Wakil Bendahara</option>
                                <hr>
                                <option value="Koordinator">Koordinator</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="jabatan">Periode</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="number" class="form-control" id="tahun_mulai" name="tahun_mulai"
                                placeholder="Tahun mulai">
                            <div class="invalid-feedback"></div>
                        </div>


                        <div class="col-md-3 mb-3">
                            <input type="number" class="form-control" id="tahun_selesai" name="tahun_selesai"
                                placeholder="Tahun selesai">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>





                    <div class="float-end">
                        <button type="button" class="btn btn-light waves-effect mr-2"
                            onclick="closeModalAdd()">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // $(document).ready(function() {
        //     $('#id_jemaat').select2({
        //         theme: "bootstrap-5",
        //         placeholder: "Pilih Jemaat",
        //         ajax: {
        //             url: '/jemaat/getAllJemaat',
        //             dataType: 'json',
        //             delay: 250,
        //             processResults: function(data) {
        //                 return {
        //                     results: data
        //                 };
        //             },
        //             cache: true
        //         }
        //     });
        // });

        function closeModalAdd() {
            const invalidInputs = document.querySelectorAll('.is-invalid');
            invalidInputs.forEach(invalidInput => {
                invalidInput.value = '';
                invalidInput.classList.remove('is-invalid');
                const errorNextSibling = invalidInput.nextElementSibling;
                if (errorNextSibling && errorNextSibling.classList.contains(
                        'invalid-feedback')) {
                    errorNextSibling.textContent = '';
                }
            });

            const form = document.getElementById('addForm');
            form.reset();
            $('#addModal').modal('hide');
        }

        document.getElementById('addForm').addEventListener('submit', async (event) => {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            try {
                const response = await fetch('/pengurus-sinode/store', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData,
                });

                const data = await response.json();
                console.log(data);
                if (!data.success) {
                    Object.keys(data.messages).forEach(fieldName => {
                        const inputField = document.getElementById(fieldName);
                        if (inputField && fieldName == 'id_jemaat') {
                            inputField.classList.add('is-invalid');
                        } else {
                            inputField.classList.add('is-invalid');
                            if (inputField.nextElementSibling) {
                                inputField.nextElementSibling.textContent = data.messages[
                                    fieldName][0];
                            }
                        }
                    });

                    // hapus error message jika form sudah di isi
                    const validFields = document.querySelectorAll('.is-invalid');
                    validFields.forEach(validField => {
                        const fieldName = validField.id;
                        if (!data.messages[fieldName]) {
                            if (fieldName === 'id_jemaat') {
                                validField.classList.remove('is-invalid');
                            } else {
                                validField.classList.remove('is-invalid');
                                validField.nextElementSibling.textContent = '';
                            }
                        }
                    });

                } else {
                    const invalidInputs = document.querySelectorAll('.is-invalid');
                    invalidInputs.forEach(invalidInput => {
                        invalidInput.value = '';
                        invalidInput.classList.remove('is-invalid');
                        const errorNextSibling = invalidInput.nextElementSibling;
                        if (errorNextSibling && errorNextSibling.classList.contains(
                                'invalid-feedback')) {
                            errorNextSibling.textContent = '';
                        }
                    });

                    const form = document.getElementById('addForm');
                    form.reset();

                    $('#datatable').DataTable().ajax.reload();
                    $('#addModal').modal('hide');
                }


            } catch (error) {
                console.error(error);
            }
        });
    </script>
@endpush
