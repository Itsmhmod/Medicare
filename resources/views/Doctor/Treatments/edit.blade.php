@extends('Doctor.index')
@section('title')
    Treatments
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('treatmentD.update', $treatment->id) }}" id="tre" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                            style="font-size: 1.1rem;" value="{{ $treatment->name }}">

                    </div>
                </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    </div>
    </form>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('tre');
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
