<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Tambah Data Program Kerja Klasis</h5>
                <button type="button" class="close" onclick="closeModalAdd()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="form-label" for="id_klasis">Klasis</label>
                            <select class="form-select" id="id_klasis" name="id_klasis">
                            </select>

                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="form-label" for="bidang">Bidang</label>
                            <select class="form-control custom-select" id="bidang" name="bidang">
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
                            <input type="text" class="form-control" id="ketua_bidang" name="ketua_bidang"
                                placeholder="Ketua Bidang">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2 ">
                            <label class="form-label mt-2" for="anggota">Anggota</label>
                            <textarea class="form-control" name="anggota" id="anggota" rows="3" placeholder="Anggota"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="program">Program</label>
                            <textarea class="form-control" name="program" id="program" rows="3" placeholder="Program"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="dasar_pemikiran">Dasar Pemikiran</label>
                            <textarea class="form-control" name="dasar_pemikiran" id="dasar_pemikiran" rows="3" placeholder="Dasar Pemikiran"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="kegiatan">Kegiatan</label>
                            <textarea class="form-control" name="kegiatan" id="kegiatan" rows="3" placeholder="Kegiatan"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="tujuan">Tujuan</label>
                            <textarea class="form-control" name="tujuan" id="tujuan" rows="3" placeholder="Tujuan"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="sasaran">Sasaran</label>
                            <textarea class="form-control" name="sasaran" id="sasaran" rows="3" placeholder="Sasaran"></textarea>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="penanggung_jawab">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab"
                                placeholder="Penanggung Jawab">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="waktu_pelaksana">Waktu Pelaksana</label>
                            <input type="text" class="form-control" id="waktu_pelaksana" name="waktu_pelaksana"
                                placeholder="Waktu Pelaksana">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label class="col-form-label" for="pelaksana">Pelaksana</label>
                            <input type="text" class="form-control" id="pelaksana" name="pelaksana"
                                placeholder="Pelaksana">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 mb-3">
                            <label class="col-form-label" for="biaya">Biaya</label>
                            <input type="text" class="form-control" id="biaya" name="biaya"
                                placeholder="Biaya">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label class="col-form-label" for="data_time">Tahun</label>
                            <input type="text" class="form-control" id="data_time" name="data_time"
                                placeholder="ex. 2022-2024">
                            <div class="invalid-feedback"> </div>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label class="col-form-label" for="data_time">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
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
                const response = await fetch('/program-kerja-klasis/store', {
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
