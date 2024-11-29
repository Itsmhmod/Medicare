{{-- <div class="modal fade addSliderImg" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Add Services
                </h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M13.46 12L19 17.54V19h-1.46L12 13.46L6.46 19H5v-1.46L10.54 12L5 6.46V5h1.46L12 10.54L17.54 5H19v1.46L13.46 12Z" />
                    </svg>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter name of Service  ">
                        </div>
                        <div class="col">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter your Description">
                        </div>


                        <div class="col">
                            <label for="icon" class="form-label">icon</label>
                            <input type="file" accept="application/image" name="icon" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> --}}
{{-- /////////// --}}
@extends('Admin.index')
@section('title')
    Services
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('service.store') }}" id="ser" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter name of Service">
                    </div>
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="Enter your Description">
                    </div>

                    <div class="col">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="file" accept="image/*" name="icon" id="iconInput" required>

                        <!-- عنصر لعرض المعاينة -->
                        <br>
                        <img id="previewImage" style="width: 70px; display: none;" alt="Image Preview">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('iconInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; // احصل على الصورة الجديدة المختارة
            if (file) {
                // إنشاء URL للصورة الجديدة لعرضها كمعاينة
                const previewUrl = URL.createObjectURL(file);

                // عرض صورة المعاينة الجديدة
                const previewImage = document.getElementById('previewImage');
                previewImage.src = previewUrl;
                previewImage.style.display = 'block';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('ser');
            const nameField = document.getElementById('name');
            const descriptionField = document.getElementById('description');
            const iconInput = document.getElementById('iconInput');

            // Event listener for form submission
            form.addEventListener('submit', function(e) {
                let valid = true;

                // Validate Name field
                if (nameField.value.length < 3) {
                    showError(nameField, 'Name must be at least 3 characters.');
                    valid = false;
                }

                // Validate Description field
                if (descriptionField.value.length < 3) {
                    showError(descriptionField, 'Description must be at least 3 characters.');
                    valid = false;
                }

                // Validate Icon field (must be selected)
                if (!iconInput.files.length) {
                    showError(iconInput, 'You must upload an icon image.');
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault(); // Prevent form submission if invalid
                }
            });

            // Remove error messages when valid input is detected
            nameField.addEventListener('input', function() {
                if (nameField.value.length >= 3) {
                    removeError(nameField);
                }
            });

            descriptionField.addEventListener('input', function() {
                if (descriptionField.value.length >= 3) {
                    removeError(descriptionField);
                }
            });

            iconInput.addEventListener('change', function() {
                if (iconInput.files.length) {
                    removeError(iconInput);
                    previewImage(iconInput); // Show preview of the uploaded image
                }
            });

            // Show error message
            function showError(input, message) {
                let error = input.nextElementSibling;
                if (!error || !error.classList.contains('error')) {
                    error = document.createElement('div');
                    error.classList.add('error');
                    error.style.color = 'red';
                    error.style.fontSize = '0.9rem';
                    error.innerText = message;
                    input.parentNode.appendChild(error);
                }
            }

            // Remove error message
            function removeError(input) {
                const errorElement = input.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error')) {
                    errorElement.remove();
                }
            }

            // Preview the uploaded image
            function previewImage(input) {
                const file = input.files[0];
                const preview = document.getElementById('previewImage');
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection
