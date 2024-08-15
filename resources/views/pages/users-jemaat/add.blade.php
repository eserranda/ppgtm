<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data Users Jemaat</h5>
                <button type="button" class="close" onclick="closeModalAdd()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="id_jemaat">Jemaat</label>
                            <select class="form-select" id="id_jemaat" name="id_jemaat">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        {{-- <div class="form-group col-md-6">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Lengkap">
                            <div class="invalid-feedback">

                            </div>
                        </div> --}}
                        <!-- end col -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="username">Username</label>
                            <input type="hidden" class="form-control" id="name" name="name">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label" for="password_confirmation">Password Confirmation</label>
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Password Confirmation">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Email">
                            <div class="invalid-feedback">

                            </div>
                        </div>

                    </div>

                    <div class="float-end">
                        <button type="button" class="btn btn-light waves-effect mx-2"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary  " type="submit">Simpan</button>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#id_jemaat').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Jemaat",
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

            $('#id_jemaat').on('select2:select', function(e) {
                var selectedData = e.params.data;
                $('#name').val(selectedData.text); // Mengisi input "nama" dengan "nama_klasis"
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
                const response = await fetch('/users-jemaat/register', {
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

                    $('#datatable').DataTable().ajax.reload();
                    $('#addModal').modal('hide');
                }


            } catch (error) {
                console.error(error);
            }
        });
    </script>
@endpush
