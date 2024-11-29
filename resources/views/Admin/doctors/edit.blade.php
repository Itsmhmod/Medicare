@extends('Admin.index')
@section('title')
    Doctors
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('doctor.update', $doctor->id) }}" id="doc" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" value="$doctor->id" name="id" id="id"> --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                            style="font-size: 1.1rem;" value="{{ $doctor->name }}">

                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label" style="font-size: 1.2rem;">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email" style="font-size: 1.1rem;" value="{{ $doctor->email }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="facebook" class="form-label" style="font-size: 1.2rem;">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            placeholder="Enter your Facebook" style="font-size: 1.1rem;" value="{{ $doctor->facebook }}">

                    </div>
                    <div class="col-md-6">
                        <label for="instagram" class="form-label" style="font-size: 1.2rem;">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            placeholder="Enter your Instagram" style="font-size: 1.1rem;" value="{{ $doctor->instagram }}">

                    </div>
                </div>
                <div class="row
                            mb-3">
                    <div class="col-md-6">
                        <label for="linkedin" class="form-label" style="font-size: 1.2rem;">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            placeholder="Enter your LinkedIn" style="font-size: 1.1rem;" value="{{ $doctor->linkedin }}">

                    </div>
                    <div class="col-md-6">
                        <label for="X" class="form-label" style="font-size: 1.2rem;">X</label>
                        <input type="text" class="form-control" id="X" name="X" placeholder="Enter your X"
                            style="font-size: 1.1rem;" value="{{ $doctor->X }}">
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <!-- الصورة الحالية -->
                        <img id="currentImage" style="width: 70px;"
                            src="{{ asset('Doctor_img/attachments/Doctor_attachments/' . $doctor->image) }}"
                            alt="not found"><br><br>

                        <label for="image" class="form-label">image</label>
                        <input type="file" accept="image/*" name="image" id="imageInput">

                        <!-- صورة المعاينة الجديدة -->
                        <img id="previewImage" style="width: 70px; display: none;" alt="preview">

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label" style="font-size: 1.2rem;">phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone"
                        style="font-size: 1.1rem;" value="{{ $doctor->phone }}">

                </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="specialization_id" class="form-label">Specialization</label>
                <select name="specialization_id" id="specialization_id">
                    <option value="{{ $doctor->Specialization->id }}" selected>
                        {{ $doctor->Specialization->name }}</option>
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="days" class="form-label" style="font-size: 1.2rem;">Days</label>
                <select name="days[]" id="days" class="form-control" style="font-size: 1.1rem;" multiple>
                    {{-- <option selected>Choose the days</option> --}}
                    @foreach ($daysOfWeek as $day_key => $day_value)
                        <option value="{{ $day_key }}">{{ $day_value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-label" style="font-size: 1.2rem;">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" style="font-size: 1.1rem;" required
                    value="{{ $doctor->password }}">
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
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // إخفاء الصورة الحالية
                document.getElementById('currentImage').style.display = 'none';

                // إنشاء URL للصورة الجديدة
                const previewUrl = URL.createObjectURL(file);

                // عرض الصورة الجديدة في المعاينة
                const previewImage = document.getElementById('previewImage');
                previewImage.src = previewUrl;
                previewImage.style.display = 'block';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('doc');

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
                        field: document.getElementById('email'),
                        validate: (val) => /\S+@\S+\.\S+/.test(val),
                        message: 'Valid email is required.'
                    },
                    {
                        field: document.getElementById('facebook'),
                        message: 'Facebook field is required.'
                    },
                    {
                        field: document.getElementById('instagram'),
                        message: 'Instagram field is required.'
                    },
                    {
                        field: document.getElementById('linkedin'),
                        message: 'LinkedIn field is required.'
                    },
                    {
                        field: document.getElementById('X'),
                        message: 'X field is required.'
                    },
                    {
                        field: document.getElementById('phone'),
                        minLength: 10,
                        message: 'Phone must be at least 10 digits long.'
                    },
                    {
                        field: document.getElementById('specialization_id'),
                        isSelect: true,
                        message: 'Specialization is required.'
                    },
                    {
                        field: document.getElementById('days'),
                        isSelect: true,
                        message: 'At least one day must be selected.'
                    }
                ];

                fieldsToValidate.forEach(({
                    field,
                    minLength,
                    message,
                    validate,
                    isSelect
                }) => {
                    if (isSelect) {
                        if (field.value === '' || (field.multiple && field.selectedOptions
                                .length === 0)) {
                            showError(field, message);
                            valid = false;
                        }
                    } else {
                        const value = field.value.trim();
                        if (minLength && value.length < minLength) {
                            showError(field, message);
                            valid = false;
                        } else if (validate && !validate(value)) {
                            showError(field, message);
                            valid = false;
                        } else if (!minLength && value === '') {
                            showError(field, message);
                            valid = false;
                        }
                    }

                    // Remove error message if field is valid
                    field.addEventListener('input', () => {
                        clearError(field);
                    });

                    // Special handling for select fields
                    if (isSelect) {
                        field.addEventListener('change', () => {
                            if (field.value !== '' && !(field.multiple && field
                                    .selectedOptions.length === 0)) {
                                clearError(field);
                            }
                        });
                    }
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
        });
    </script>
@endsection
