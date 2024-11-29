{{-- @foreach ($blogs as $blog)
    <div class="modal fade" tabindex="-1" id="editSliderImg{{ $blog->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Edit Blogs
                    </h3>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13.46 12L19 17.54V19h-1.46L12 13.46L6.46 19H5v-1.46L10.54 12L5 6.46V5h1.46L12 10.54L17.54 5H19v1.46L13.46 12Z" />
                        </svg>
                    </div>
                </div>

                <div class="modal-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter name of blog " value="{{ $blog->name }}">
                            </div>
                            <div class="col">
                                <label for="subject" class="form-label">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter your subject" value="{{ $blog->subject }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                placeholder="Enter your date" value="{{ $blog->date }}">
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="publisher" class="form-label">publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher"
                                    placeholder="Enter publisher Name" value="{{ $blog->publisher }}">
                            </div>
                            <div class="col">
                                <img id="currentImage" style="width: 70px;"
                                    src="{{ asset('Blog_img/attachments/Blog_attachments/' . $blog->image) }}"
                                    alt="not found"><br><br>

                                <label for="image" class="form-label">image</label>
                                <input type="file" accept="image/*" name="image" id="imageInput">

                                <img id="previewImage" style="width: 70px; display: none;" alt="preview">
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
@endforeach


<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('currentImage').style.display = 'none';

            const previewUrl = URL.createObjectURL(file);

            const previewImage = document.getElementById('previewImage');
            previewImage.src = previewUrl;
            previewImage.style.display = 'block';
        }
    });
</script> --}}
{{-- ///////// --}}
@extends('Admin.index')
@section('title')
    Blogs
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('blog.update', $blog->id) }}" id="blo" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter name of blog " value="{{ $blog->name }}">
                    </div>
                    <div class="col">
                        <label for="subject" class="form-label">subject</label>
                        <input type="text" class="form-control" id="subject" name="subject"
                            placeholder="Enter your subject" value="{{ $blog->subject }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter your date"
                        value="{{ $blog->date }}">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="publisher" class="form-label">publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher"
                            placeholder="Enter publisher Name" value="{{ $blog->publisher }}">
                    </div>
                    <div class="col">
                        <!-- الصورة الحالية -->
                        <img id="currentImage{{ $blog->id }}" style="width: 70px;"
                            src="{{ asset('Blog_img/attachments/Blog_attachments/' . $blog->image) }}"
                            alt="not found"><br><br>

                        <label for="image" class="form-label">image</label>
                        <input type="file" accept="image/*" name="image" id="imageInput{{ $blog->id }}">

                        <!-- صورة المعاينة الجديدة -->
                        <img id="previewImage{{ $blog->id }}" style="width: 70px; display: none;" alt="preview">
                    </div>
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
        document.getElementById('imageInput{{ $blog->id }}').addEventListener('change', function(event) {
            const file = event.target.files[0]; // احصل على الصورة الجديدة المختارة
            if (file) {
                // إخفاء الصورة الحالية
                document.getElementById('currentImage{{ $blog->id }}').style.display = 'none';

                // إنشاء URL للصورة الجديدة لعرضها كمعاينة
                const previewUrl = URL.createObjectURL(file);

                // عرض صورة المعاينة الجديدة
                const previewImage = document.getElementById('previewImage{{ $blog->id }}');
                previewImage.src = previewUrl;
                previewImage.style.display = 'block';
            }
        });
    </script>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('blo');

            // تحقق مما إذا كانت الصورة الحالية موجودة بالفعل
            const currentImage = document.getElementById('currentImage{{ $blog->id }}');

            // Validate on form submission
            form.addEventListener('submit', function(e) {
                let valid = true;

                // Clear previous error messages
                clearErrors();

                // Fields to validate
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
                    }
                ];

                // التحقق من الحقول الأخرى
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

                // التحقق من حقل الصورة فقط إذا لم تكن الصورة الحالية موجودة
                if (!currentImage || currentImage.src === '') {
                    const imageField = document.getElementById('imageInput{{ $blog->id }}');
                    if (imageField.value.trim() === '') {
                        showError(imageField, 'Image is required.');
                        valid = false;
                    }

                    imageField.addEventListener('change', () => {
                        clearError(imageField);
                    });
                }

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
        });
    </script>
@endsection
