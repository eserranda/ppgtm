<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Program Kerja Klasis</h5>
                <button type="button" class="close" onclick="closeModalEdit()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="form-label" for="id_klasis">Klasis</label>
                            <input type="hidden" class="form-control" id="edit_id" name="id">
                            <select class="form-select" id="edit_id_klasis" name="edit_id_klasis">
                            </select>

                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control custom-select" id="edit_bidang" name="edit_bidang">
                                <option value="" selected disabled>Pilih bidang</option>
                                <option value="Umun">Umun</option>
                                <option value="Kerohanian">Kerohanian</option>
                                <option value="Pelayanan">Pelayanan</option>
                                <option value="Kaderisasi">Kaderisasi</option>
                                <option value="Penelitian dan Pengembangan">Penelitian dan Pengembangan</option>
                                <option value="Minat Dan Bakat">Minat Dan Bakat</option>
                                <option value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="form-label" for="ketua_bidang">Ketua Bidang</label>
                            <input type="text" class="form-control" id="edit_ketua_bidang" name="edit_ketua_bidang"
                                placeholder="Ketua Bidang">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2 ">
                            <label class="form-label mt-2" for="edit_anggota">Anggota</label>
                            <textarea class="form-control" name="edit_anggota" id="edit_anggota" rows="3" placeholder="Anggota"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="edit_program">Program</label>
                            <textarea class="form-control" name="edit_program" id="edit_program" rows="3" placeholder="Program"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="edit_dasar_pemikiran">Dasar Pemikiran</label>
                            <textarea class="form-control" name="edit_dasar_pemikiran" id="edit_dasar_pemikiran" rows="3"
                                placeholder="Dasar Pemikiran"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="kegiatan">Kegiatan</label>
                            <textarea class="form-control" name="edit_kegiatan" id="edit_kegiatan" rows="3" placeholder="Kegiatan"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="tujuan">Tujuan</label>
                            <textarea class="form-control" name="edit_tujuan" id="edit_tujuan" rows="3" placeholder="Tujuan"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="sasaran">Sasaran</label>
                            <textarea class="form-control" name="edit_sasaran" id="edit_sasaran" rows="3" placeholder="Sasaran"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="edit_penanggung_jawab">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="edit_penanggung_jawab"
                                name="edit_penanggung_jawab" placeholder="Penanggung Jawab">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="edit_waktu_pelaksana">Waktu Pelaksana</label>
                            <input type="text" class="form-control" id="edit_waktu_pelaksana"
                                name="edit_waktu_pelaksana" placeholder="Waktu Pelaksana">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="edit_pelaksana">Pelaksana</label>
                            <input type="text" class="form-control" id="edit_pelaksana" name="edit_pelaksana"
                                placeholder="Pelaksana">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-3">
                            <label class="col-form-label" for="biaya">Biaya</label>
                            <input type="text" class="form-control" id="edit_biaya" name="edit_biaya"
                                placeholder="Biaya">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label class="col-form-label" for="data_time">Tahun</label>
                            <input type="text" class="form-control" id="edit_data_time" name="edit_data_time"
                                placeholder="ex. 2022-2024">
                            <div class="invalid-feedback"> </div>
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
            $('#edit_id_klasis').select2({
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
                const response = await fetch('/program-kerja-klasis/update', {
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
