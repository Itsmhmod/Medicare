{{-- @foreach ($services as $service)
    <div class="modal fade" tabindex="-1" id="editSliderImg{{ $service->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Edit Services
                    </h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13.46 12L19 17.54V19h-1.46L12 13.46L6.46 19H5v-1.46L10.54 12L5 6.46V5h1.46L12 10.54L17.54 5H19v1.46L13.46 12Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form action="{{ route('service.update', $service->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter name of Service " value="{{ $service->name }}">
                            </div>

                            <div class="col">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter your Description" value="{{ $service->description }}">
                            </div>


                            <div class="col">
                                <!-- الصورة الحالية -->
                                <img id="currentImage{{ $service->id }}" style="width: 70px;"
                                    src="{{ asset('Service_img/attachments/Service_attachments/' . $service->icon) }}"
                                    alt="not found"><br><br>

                                <label for="icon" class="form-label">icon</label>
                                <input type="file" accept="image/*" name="icon"
                                    id="imageInput{{ $service->id }}">

                                <!-- صورة المعاينة الجديدة -->
                                <img id="previewImage{{ $service->id }}" style="width: 70px; display: none;"
                                    alt="preview">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
{{-- ///////// --}}
@extends('Admin.index')
@section('title')
    Services
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('service.update', $service->id) }}" id="ser" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter name of Service " value="{{ $service->name }}">
                    </div>

                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="Enter your Description" value="{{ $service->description }}">
                    </div>
                    <div class="col">
                        <!-- الصورة الحالية -->
                        <img id="currentImage{{ $service->id }}" style="width: 70px;"
                            src="{{ asset('Service_img/attachments/Service_attachments/' . $service->icon) }}"
                            alt="not found"><br><br>

                        <label for="icon" class="form-label">icon</label>
                        <input type="file" accept="image/*" name="icon" id="imageInput{{ $service->id }}">

                        <!-- صورة المعاينة الجديدة -->
                        <img id="previewImage{{ $service->id }}" style="width: 70px; display: none;" alt="preview">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('imageInput{{ $service->id }}').addEventListener('change', function(event) {
            const file = event.target.files[0]; // احصل على الصورة الجديدة المختارة
            if (file) {
                // إخفاء الصورة الحالية
                document.getElementById('currentImage{{ $service->id }}').style.display = 'none';

                // إنشاء URL للصورة الجديدة لعرضها كمعاينة
                const previewUrl = URL.createObjectURL(file);

                // عرض صورة المعاينة الجديدة
                const previewImage = document.getElementById('previewImage{{ $service->id }}');
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
            const iconInput = document.getElementById('imageInput{{ $service->id }}');
            const currentImage = document.getElementById('currentImage{{ $service->id }}');
            const previewImage = document.getElementById('previewImage{{ $service->id }}');

            // Validate on form submission
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

                // Validate Icon field if a new image is uploaded
                if (iconInput.files.length && !isValidImage(iconInput.files[0])) {
                    showError(iconInput, 'You must upload a valid image file.');
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
                if (iconInput.files.length && isValidImage(iconInput.files[0])) {
                    removeError(iconInput);
                    previewNewImage(iconInput); // Show preview of the uploaded image
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

            // Check if the file is a valid image
            function isValidImage(file) {
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                return validImageTypes.includes(file.type);
            }

            // Preview the new image if uploaded
            function previewNewImage(input) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    currentImage.style.display = 'none'; // Hide current image when new image is previewed
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection
