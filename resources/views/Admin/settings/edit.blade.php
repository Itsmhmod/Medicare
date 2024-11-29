{{-- @foreach ($settings as $setting)
    <div class="modal fade" tabindex="-1" id="editSliderImg{{ $setting->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Edit Setting
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
                    <form action="{{ route('setting.update', $setting->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $setting->id }}">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $setting->phone }}">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $setting->email }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ $setting->location }}">
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ $setting->facebook }}">
                            </div>
                            <div class="col">
                                <label for="twitter" class="form-label">X (Twitter)</label>
                                <input type="text" class="form-control" id="twitter" name="X"
                                    value="{{ $setting->X }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ $setting->linkedin }}">
                            </div>
                            <div class="col">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ $setting->instagram }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube"
                                    value="{{ $setting->youtube }}">
                            </div>
                            <div class="col">
                                <label for="pinterest" class="form-label">Pinterest</label>
                                <input type="text" class="form-control" id="pinterest" name="pinterest"
                                    value="{{ $setting->pinterest }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="aboutUs" class="form-label">About Us</label>
                            <textarea class="form-control" id="aboutUs" name="about_us" rows="3">{{ $setting->about_Us }}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
{{-- /////// --}}
@extends('Admin.index')
@section('title')
    Medical Tests
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('setting.update', $setting->id) }}" id="set" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $setting->id }}">
                <div class="row mb-3">
                    <div class="col">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $setting->phone }}">

                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $setting->email }}">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location"
                        value="{{ $setting->location }}">

                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            value="{{ $setting->facebook }}">

                    </div>
                    <div class="col">
                        <label for="twitter" class="form-label">X (Twitter)</label>
                        <input type="text" class="form-control" id="twitter" name="X"
                            value="{{ $setting->X }}">

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            value="{{ $setting->linkedin }}">

                    </div>
                    <div class="col">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ $setting->instagram }}">

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"
                            value="{{ $setting->youtube }}">

                    </div>
                    <div class="col">
                        <label for="pinterest" class="form-label">Pinterest</label>
                        <input type="text" class="form-control" id="pinterest" name="pinterest"
                            value="{{ $setting->pinterest }}">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="aboutUs" class="form-label">About Us</label>
                    <textarea class="form-control" id="aboutUs" name="about_us" rows="3">{{ $setting->about_Us }}</textarea>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('set');
            const fields = {
                phone: document.getElementById('phone'),
                email: document.getElementById('email'),
                location: document.getElementById('location'),
                facebook: document.getElementById('facebook'),
                twitter: document.getElementById('twitter'),
                linkedin: document.getElementById('linkedin'),
                instagram: document.getElementById('instagram'),
                youtube: document.getElementById('youtube'),
                pinterest: document.getElementById('pinterest'),
                aboutUs: document.getElementById('aboutUs'),
            };

            // Event listener for form submission
            form.addEventListener('submit', function(e) {
                let valid = true;

                // Loop through fields to validate on form submission
                for (let key in fields) {
                    const input = fields[key];
                    const errorElement = input.nextElementSibling;

                    // Clear previous error on submit
                    if (errorElement && errorElement.classList.contains('error')) {
                        errorElement.remove();
                    }

                    // Validate phone (should not be empty and minimum length of 10)
                    if (input.id === 'phone' && (input.value.length < 10 || !input.value)) {
                        showError(input, 'Phone number must be at least 10 digits.');
                        valid = false;
                    }

                    // Validate email
                    if (input.id === 'email' && !validateEmail(input.value)) {
                        showError(input, 'Please enter a valid email address.');
                        valid = false;
                    }

                    // Validate other fields (should not be empty)
                    if (input.id !== 'email' && input.id !== 'phone' && input.value.length < 3) {
                        showError(input,
                            `${input.id.charAt(0).toUpperCase() + input.id.slice(1)} must be at least 3 characters.`
                        );
                        valid = false;
                    }
                }

                if (!valid) {
                    e.preventDefault(); // Prevent form submission if invalid
                }
            });

            // Event listener to validate on input and remove error message
            for (let key in fields) {
                const input = fields[key];

                input.addEventListener('input', function() {
                    const errorElement = input.nextElementSibling;

                    // Validate phone field
                    if (input.id === 'phone' && input.value.length >= 10) {
                        removeError(input);
                    }

                    // Validate email field
                    if (input.id === 'email' && validateEmail(input.value)) {
                        removeError(input);
                    }

                    // Validate other fields
                    if (input.id !== 'email' && input.id !== 'phone' && input.value.length >= 3) {
                        removeError(input);
                    }
                });
            }

            function showError(input, message) {
                const error = document.createElement('div');
                error.classList.add('error');
                error.style.color = 'red';
                error.style.fontSize = '0.9rem';
                error.innerText = message;
                input.parentNode.appendChild(error);
            }

            function removeError(input) {
                const errorElement = input.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error')) {
                    errorElement.remove();
                }
            }

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(String(email).toLowerCase());
            }
        });
    </script>
@endsection
