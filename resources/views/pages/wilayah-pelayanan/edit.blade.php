<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Wilayah Pelayanan</h5>
                <button type="button" class="close" onclick="closeModalEdit()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id ="editForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_klasis">Pilih Klasis</label>
                            <input type="hidden" class="form-control" id="edit_id" name="id">
                            <select class="form-select" id="edit_id_klasis" name="edit_id_klasis">

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="wilayah">Wilayah</label>
                            <select class="form-control custom-select" id="edit_wilayah" name="edit_wilayah">
                                <option value="" selected disabled>Pilih Wilayah</option>
                                <option value="Wilayah I">Wilayah I</option>
                                <option value="Wilayah II">Wilayah II</option>
                                <option value="Wilayah III">Wilayah III</option>
                                <option value="Wilayah IV">Wilayah IV</option>
                                <option value="Wilayah V">Wilayah V</option>
                                <option value="Wilayah VI">Wilayah VI</option>
                                <option value="Wilayah VII">Wilayah VII</option>
                                <option value="Wilayah VIII">Wilayah VIII</option>
                                <option value="Wilayah IX">Wilayah IX</option>
                                <option value="Wilayah X">Wilayah X</option>
                                <option value="Wilayah XI">Wilayah XI</option>
                                <option value="Wilayah XII">Wilayah XII</option>
                            </select>

                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="koordinator">Koordinator</label>
                            <input type="text" class="form-control" id="edit_koordinator" name="edit_koordinator"
                                placeholder="Koordinator">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_telp">No Telp</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                placeholder="No Telp">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tanggal" name="edit_tanggal"
                                placeholder="Tanggal">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#edit_id_klasis').select2({
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
                const response = await fetch('/wilayah-pelayanan/update', {
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
                        if (inputField && fieldName === 'id_klasis') {
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

                    const form = document.getElementById('editForm');
                    form.reset();

                    $('#datatable').DataTable().ajax.reload();
                    $('#editModal').modal('hide');
                }
            } catch (error) {
                console.error(error);
            }
        });

        $(document).ready(function() {
            $('#id_klasis').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Klasis",
                // minimumInputLength: 1,
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
    </script>
@endpush
