 @extends('Admin.index')
 @section('title')
     Prescriptions
 @endsection

 @section('content')
     <div class="card mt-5">
         <div class="card-body">
             <form action="{{ route('prescription.store') }}" id="pre" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="notes" class="form-label" style="font-size: 1.2rem;">Notes</label>
                         <textarea class="form-control" id="notes" name="notes" placeholder="Enter notes" style="font-size: 1.1rem;"
                             rows="4"></textarea>
                     </div>

                     <div class="col-md-6">
                         <label for="date" class="form-label" style="font-size: 1.2rem;">Date</label>
                         <input type="date" class="form-control" id="date" name="date"
                             placeholder="Enter the date" style="font-size: 1.1rem;">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="doctor_id" class="form-label" style="font-size: 1.2rem;">Doctors</label>
                         <select name="doctor_id" id="doctor_id" style="font-size: 1.1rem;" class="form-control">
                             <option value="" selected>choose the doctor</option>
                             @foreach ($doctors as $doctor)
                                 <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="col-md-6">
                         <label for="patient_id" class="form-label" style="font-size: 1.2rem;">Patients</label>
                         <select name="patient_id" id="patient_id" style="font-size: 1.1rem;" class="form-control">
                             <option value="" selected>choose the patient</option>
                             @foreach ($patients as $patient)
                                 <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="treatments" class="form-label" style="font-size: 1.2rem;">Treatments</label>
                         <select name="treatments[]" id="treatments" style="font-size: 1.1rem;" class="form-control"
                             multiple>
                             <option value="" selected>choose treatment</option>
                             @foreach ($treatments as $treatment)
                                 <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="col-md-6">
                         <label for="MedicalTests" class="form-label" style="font-size: 1.2rem;">Medical Tests</label>
                         <select name="MedicalTests[]" id="MedicalTests" style="font-size: 1.1rem;" class="form-control"
                             multiple>
                             <option value="" selected>choose medicalTests</option>
                             @foreach ($medicalTests as $medicalTest)
                                 <option value="{{ $medicalTest->id }}">{{ $medicalTest->name }}</option>
                             @endforeach
                         </select>
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
             const form = document.getElementById('pre');
             const notesField = document.getElementById('notes');
             const dateField = document.getElementById('date');
             const doctorSelect = document.getElementById('doctor_id');
             const patientSelect = document.getElementById('patient_id');
             const treatmentsSelect = document.getElementById('treatments');
             const medicalTestsSelect = document.getElementById('MedicalTests');

             // Validate on form submission
             form.addEventListener('submit', function(e) {
                 let valid = true;

                 // Clear previous error messages
                 clearErrors();

                 // Validate Notes field
                 if (notesField.value.trim() === '' || notesField.value.length < 3) {
                     showError(notesField, 'Notes must be at least 3 characters long.');
                     valid = false;
                 }

                 // Validate Date field
                 if (dateField.value.trim() === '') {
                     showError(dateField, 'Date is required.');
                     valid = false;
                 }

                 // Validate Doctor selection
                 if (doctorSelect.value === '') {
                     showError(doctorSelect, 'You must select a doctor.');
                     valid = false;
                 }

                 // Validate Patient selection
                 if (patientSelect.value === '') {
                     showError(patientSelect, 'You must select a patient.');
                     valid = false;
                 }

                 // Validate Treatments selection
                 if (treatmentsSelect.selectedOptions.length === 0) {
                     showError(treatmentsSelect, 'You must select at least one treatment.');
                     valid = false;
                 }

                 // Validate Medical Tests selection
                 if (medicalTestsSelect.selectedOptions.length === 0) {
                     showError(medicalTestsSelect, 'You must select at least one medical test.');
                     valid = false;
                 }

                 if (!valid) {
                     e.preventDefault(); // Prevent form submission if invalid
                 }
             });

             // Add event listeners to clear errors
             notesField.addEventListener('input', function() {
                 if (notesField.value.length >= 3) {
                     removeError(notesField);
                 }
             });

             dateField.addEventListener('change', function() {
                 if (dateField.value.trim() !== '') {
                     removeError(dateField);
                 }
             });

             doctorSelect.addEventListener('change', function() {
                 if (doctorSelect.value !== '') {
                     removeError(doctorSelect);
                 }
             });

             patientSelect.addEventListener('change', function() {
                 if (patientSelect.value !== '') {
                     removeError(patientSelect);
                 }
             });

             treatmentsSelect.addEventListener('change', function() {
                 if (treatmentsSelect.selectedOptions.length > 0) {
                     removeError(treatmentsSelect);
                 }
             });

             medicalTestsSelect.addEventListener('change', function() {
                 if (medicalTestsSelect.selectedOptions.length > 0) {
                     removeError(medicalTestsSelect);
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

             // Clear all error messages
             function clearErrors() {
                 const errors = document.querySelectorAll('.error');
                 errors.forEach(error => error.remove());
             }
         });
     </script>
 @endsection
