@extends('Admin.index')
@section('title')
    Blogs
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('blog.store') }}" id="blo" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter name of blog  ">
                    </div>
                    <div class="col">
                        <label for="subject" class="form-label">subject</label>
                        <input type="text" class="form-control" id="subject" name="subject"
                            placeholder="Enter your subject">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter your date">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="publisher" class="form-label">publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher"
                            placeholder="Enter publisher Name">
                    </div>
                    <div class="col">
                        <label for="image" class="form-label">image</label>
                        <input type="file" accept="image/*" name="image" id="imageInput" required>

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
        document.getElementById('imageInput').addEventListener('change', function(event) {
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
            const form = document.getElementById('blo');

            // Validate on form submission
            form.addEventListener('submit', function(e) {
                let valid = true;

                // Clear previous error messages
                clearErrors();

                // Validate all fields
                const fieldsToValidate = [{
                        field: document.getElementById('name'),
                        minLength: 3,
                        message: 'Name must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('subject'),
                        minLength: 3,
                        message: 'Subject must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('date'),
                        message: 'Date is required.'
                    },
                    {
                        field: document.getElementById('publisher'),
                        minLength: 3,
                        message: 'Publisher name must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('imageInput'),
                        message: 'Image is required.'
                    }
                ];

                fieldsToValidate.forEach(({
                    field,
                    minLength,
                    message
                }) => {
                    const value = field.value.trim();
                    if (minLength && value.length < minLength) {
                        showError(field, message);
                        valid = false;
                    } else if (!minLength && value === '') {
                        showError(field, message);
                        valid = false;
                    }

                    // Remove error message if field is valid
                    field.addEventListener('input', () => {
                        clearError(field);
                    });
                });

                if (!valid) {
                    e.preventDefault(); // Prevent form submission if invalid
                }
            });

            // Show error message
            function showError(input, message) {
                let error = input.parentNode.querySelector('.error');
                if (!error) {
                    error = document.createElement('div');
                    error.classList.add('error');
                    error.style.color = 'red';
                    error.style.fontSize = '0.9rem';
                    error.innerText = message;
                    input.parentNode.appendChild(error);
                }
            }

            // Clear individual error message
            function clearError(input) {
                const error = input.parentNode.querySelector('.error');
                if (error) {
                    error.remove();
                }
            }

            // Clear all error messages
            function clearErrors() {
                const errors = document.querySelectorAll('.error');
                errors.forEach(error => error.remove());
            }

            // Preview the image
            const imageInput = document.getElementById('imageInput');
            const previewImage = document.getElementById('previewImage');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                }
            });
        });
    </script>
@endsection
{{-- @section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');

            // Validate on form submission
            form.addEventListener('submit', function(e) {
                let valid = true;

                // Clear previous error messages
                clearErrors();

                // Validate all fields
                const fieldsToValidate = [{
                        field: document.getElementById('name'),
                        minLength: 3,
                        message: 'Name must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('subject'),
                        minLength: 3,
                        message: 'Subject must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('date'),
                        message: 'Date is required.'
                    },
                    {
                        field: document.getElementById('publisher'),
                        minLength: 3,
                        message: 'Publisher name must be at least 3 characters long.'
                    },
                    {
                        field: document.getElementById('imageInput'),
                        message: 'Image is required.'
                    }
                ];

                fieldsToValidate.forEach(({
                    field,
                    minLength,
                    message
                }) => {
                    const value = field.value.trim();
                    if (minLength && value.length < minLength) {
                        showError(field, message);
                        valid = false;
                    } else if (!minLength && value === '') {
                        showError(field, message);
                        valid = false;
                    }

                    // Remove error message if field is valid
                    field.addEventListener('input', () => {
                        clearError(field);
                    });
                });

                if (!valid) {
                    e.preventDefault(); // Prevent form submission if invalid
                }
            });

            // Show error message
            function showError(input, message) {
                let error = input.parentNode.querySelector('.error');
                if (!error) {
                    error = document.createElement('div');
                    error.classList.add('error');
                    error.style.color = 'red';
                    error.style.fontSize = '0.9rem';
                    error.innerText = message;
                    input.parentNode.appendChild(error);
                }
            }

            // Clear individual error message
            function clearError(input) {
                const error = input.parentNode.querySelector('.error');
                if (error) {
                    error.remove();
                }
            }

            // Clear all error messages
            function clearErrors() {
                const errors = document.querySelectorAll('.error');
                errors.forEach(error => error.remove());
            }

            // Preview the image
            const imageInput = document.getElementById('imageInput');
            const previewImage = document.getElementById('previewImage');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                }
            });
        });
    </script>
@endsection --}}
