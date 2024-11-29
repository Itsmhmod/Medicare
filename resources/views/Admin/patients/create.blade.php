 @extends('Admin.index')
 @section('title')
     Patients
 @endsection

 @section('content')
     <div class="card mt-5">
         <div class="card-body">
             <form action="{{ route('patient.store') }}" id="pat" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                         <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                             style="font-size: 1.1rem;">

                     </div>
                     <div class="col-md-6">
                         <label for="phone" class="form-label" style="font-size: 1.2rem;">Phone</label>
                         <input type="text" class="form-control" id="phone" name="phone"
                             placeholder="Enter your phone" style="font-size: 1.1rem;">

                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="address" class="form-label" style="font-size: 1.2rem;">Address</label>
                         <input type="text" class="form-control" id="address" name="address"
                             placeholder="Enter your address" style="font-size: 1.1rem;">

                     </div>
                     <div class="col-md-6">
                         <label for="status" class="form-label" style="font-size: 1.2rem;">Status</label>
                         <input type="text" class="form-control" id="status" name="status"
                             placeholder="Enter your status" style="font-size: 1.1rem;">

                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="age" class="form-label" style="font-size: 1.2rem;">Age</label>
                         <input type="number" class="form-control" id="age" name="age"
                             placeholder="Enter your age" style="font-size: 1.1rem;">

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
             const form = document.getElementById('pat');
             const nameField = document.getElementById('name');
             const phoneField = document.getElementById('phone');
             const addressField = document.getElementById('address');
             const statusField = document.getElementById('status');
             const ageField = document.getElementById('age');

             // Validate on form submission
             form.addEventListener('submit', function(e) {
                 let valid = true;

                 // Validate Name field
                 if (nameField.value.trim() === '' || nameField.value.length < 3) {
                     showError(nameField, 'Name must be at least 3 characters long.');
                     valid = false;
                 }

                 // Validate Phone field
                 if (phoneField.value.trim() === '' || phoneField.value.length < 10 || !/^\d+$/.test(
                         phoneField.value)) {
                     showError(phoneField, 'Phone is required and must be at least 10 digits long.');
                     valid = false;
                 }

                 // Validate Address field
                 if (addressField.value.trim() === '' || addressField.value.length < 3) {
                     showError(addressField, 'Address must be at least 3 characters long.');
                     valid = false;
                 }

                 // Validate Status field
                 if (statusField.value.trim() === '' || statusField.value.length < 3) {
                     showError(statusField, 'Status must be at least 3 characters long.');
                     valid = false;
                 }

                 // Validate Age field
                 if (ageField.value.trim() === '' || ageField.value < 1 || ageField.value > 120) {
                     showError(ageField, 'Age must be a number between 1 and 120.');
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

             phoneField.addEventListener('input', function() {
                 if (phoneField.value.trim() !== '' && phoneField.value.length >= 10 && /^\d+$/.test(
                         phoneField.value)) {
                     removeError(phoneField);
                 }
             });

             addressField.addEventListener('input', function() {
                 if (addressField.value.length >= 3) {
                     removeError(addressField);
                 }
             });

             statusField.addEventListener('input', function() {
                 if (statusField.value.length >= 3) {
                     removeError(statusField);
                 }
             });

             ageField.addEventListener('input', function() {
                 if (ageField.value >= 1 && ageField.value <= 120) {
                     removeError(ageField);
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
         });
     </script>
 @endsection
