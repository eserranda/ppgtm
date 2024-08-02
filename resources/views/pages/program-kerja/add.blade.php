<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Program Kerja</h5>

                <button type="button" class="close" onclick="closeModalAdd()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control custom-select" id="bidang" name="bidang">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="Pembinaan, Kerohanian, Minat dan Bakat">Pembinaan, Kerohanian, Minat dan
                                    Bakat</option>
                                <option value="Kederisasi dan Pengembangan Organisasi">Kederisasi dan Pengembangan
                                    Organisasi
                                </option>
                                <option value="Komunikasi dan Hubungan Antar Lembaga">Komunikasi dan Hubungan Antar
                                    Lembaga</option>
                                <option value="Kemandirian Dana dan Diakonia">Kemandirian Dana dan Diakonia</option>
                                <option value="Kajian Strategis dan Lingkup Hidup">Kajian Strategis dan Lingkup Hidup
                                </option>
                            </select>

                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="program_kerja">Program Kerja</label>
                            <textarea class="form-control" id="program_kerja" name="program_kerja" rows="3" placeholder="Program Kerja"></textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sasaran">Sasaran</label>
                            <input type="text" class="form-control" id="sasaran" name="sasaran"
                                placeholder="Sasaran">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tujuan">Tujuan</label>
                            <div>
                                <textarea class="form-control" name="tujuan" id="tujuan" rows="3" placeholder="Tujuan"></textarea>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="waktu_dan_tempat">Waktu dan tempat</label>
                            <input type="text" class="form-control" id="waktu_dan_tempat" name="waktu_dan_tempat"
                                placeholder="Waktu dan Tempat">
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
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
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
                const response = await fetch('/program-kerja/store', {
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
