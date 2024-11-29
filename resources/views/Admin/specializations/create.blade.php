{{-- <div class="modal fade addSliderImg" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Add specialization
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
                <form action="{{ route('specialization.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter name of blog  ">
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
{{-- //////// --}}
@extends('Admin.index')
@section('title')
    Specialization
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('specialization.store') }}" id="spe" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                            style="font-size: 1.1rem;">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" style="font-size: 1.2rem;">Add</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('spe');
            const nameField = document.getElementById('name');

            // Validate on form submit
            form.addEventListener('submit', function(e) {
                let valid = true;
                const errorElement = nameField.nextElementSibling;

                // Clear previous error if it exists
                if (errorElement && errorElement.classList.contains('error')) {
                    errorElement.remove();
                }

                // Validate name field (must be at least 3 characters)
                if (nameField.value.length < 3) {
                    showError(nameField, 'Name must be at least 3 characters.');
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault(); // Prevent form submission if invalid
                }
            });

            // Validate on input (typing) and remove error message if valid
            nameField.addEventListener('input', function() {
                const errorElement = nameField.nextElementSibling;

                if (nameField.value.length >= 3) {
                    removeError(nameField);
                }
            });

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
        });
    </script>
@endsection
