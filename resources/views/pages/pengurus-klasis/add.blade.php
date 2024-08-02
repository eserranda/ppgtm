<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Pengurus klasis</h5>
                <button type="button" class="close" onclick="closeModalAdd()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="id_klasis">Jemaat</label>
                            <select class="form-select" id="id_klasis" name="id_klasis">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control custom-select" id="bidang" name="bidang">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="Penasehat">Penasehat</option>
                                <option value="Pengurus Inti">Pengurus Inti</option>
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
                                <option value="Ketua 1">Ketua 1</option>
                                <option value="Ketua 2">Ketua 2</option>
                                <option value="Ketua 3">Ketua 3</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                                <option value="Wakil Bendahara">Wakil Bendahara</option>
                                <hr class="my-2">
                                <option value="Koordinator">Koordinator</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                            <div class="invalid-feedback"> </div>
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
        $(document).ready(function() {
            $('#id_klasis').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Klasis",
                ajax: {
                    url: '/klasis/getAllKlasis',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });

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
                const response = await fetch('/pengurus-klasis/store', {
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
                        if (inputField && fieldName == 'id_klasis') {
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
                            if (fieldName === 'id_klasis') {
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
