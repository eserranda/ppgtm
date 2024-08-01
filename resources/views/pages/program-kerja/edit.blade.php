<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Program Kerja</h5>

                <button type="button" class="close" onclick="closeModalEdit()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control costom-select" id="edit_bidang" name="edit_bidang">
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

                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_program_kerja">Program Kerja</label>
                            <input type="hidden" class="form-control" id="edit_id" name="id">
                            <input type="text" class="form-control" id="edit_program_kerja"
                                name="edit_program_kerja">
                            {{-- <textarea class="form-control" id="program_kerja" name="program_kerja" rows="3"></textarea> --}}
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_sasaran">Sasaran</label>
                            <input type="text" class="form-control" id="edit_sasaran" name="edit_sasaran"
                                placeholder="Sasaran">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tujuan">Tujuan</label>
                            <div>
                                <textarea class="form-control" name="edit_tujuan" id="edit_tujuan" rows="3"></textarea>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_waktu_dan_tempat">Waktu dan tempat</label>
                            <input type="text" class="form-control" id="edit_waktu_dan_tempat"
                                name="edit_waktu_dan_tempat">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label for="sasaran">Sasaran</label>
                            <input type="text" class="form-control" id="sasaran" name="sasaran"
                                placeholder="No Telp">
                            <div class="invalid-feedback">
                            </div>
                        </div> --}}
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
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
                const response = await fetch('/program-kerja/update', {
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
                        if (inputField) {
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
                            validField.classList.remove('is-invalid');
                            if (validField.nextElementSibling) {
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
