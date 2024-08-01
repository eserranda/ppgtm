<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Edit Data Program Kerja</h5>

                <button type="button" class="close" onclick="closeModalEdit()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_id_jemaat">ID Jemaat</label>
                            <input type="hidden" class="form-control" id="edit_id" name="id">
                            <select class="form-select" id="edit_id_jemaat" name="edit_id_jemaat">
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="dapel">Daerah Pelayanan</label>
                            <select class="form-control costom-select" id="edit_dapel" name="edit_dapel">
                                <option value="" selected disabled>Pilih Dapel</option>
                                <option value="Dapel 1">Dapel 1</option>
                                <option value="Dapel 2">Dapel 2</option>
                                <option value="Dapel 3">Dapel 3</option>
                                <option value="Dapel 4">Dapel 4</option>
                            </select>

                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_nama_anggota">Nama Anggota</label>
                            <input type="text" class="form-control" id="edit_nama_anggota" name="edit_nama_anggota"
                                placeholder="Nama Anggota">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="edit_tgl_lahir" name="edit_tgl_lahir">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" name="edit_alamat"
                                placeholder="Alamat">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_no_telp">No. Telepon</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                placeholder="No. Telepon">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan"
                                placeholder="Keterangan">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label class="form-label" for="edit_data_time">Data Time</label>
                            <input type="text" class="form-control" id="edit_data_time" name="edit_data_time">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="float-end">
                        <button type="button" class="btn btn-light waves-effect mr-2"
                            onclick="closeModalEdit()">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#edit_id_jemaat').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Jemaat",
                dropdownParent: $('#editModal'),
                ajax: {
                    url: '/jemaat/getAllJemaat',
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

        function closeModalEdit() {
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

            const form = document.getElementById('editForm');
            form.reset();
            $('#editModal').modal('hide');
        }

        document.getElementById('editForm').addEventListener('submit', async (event) => {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            try {
                const response = await fetch('/anggota-pemuda-jemaat/update', {
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

                    const form = document.getElementById('editForm');
                    form.reset();

                    $('#datatable').DataTable().ajax.reload();
                    $('#editModal').modal('hide');
                }
            } catch (error) {
                console.error(error);
            }
        });
    </script>
@endpush
