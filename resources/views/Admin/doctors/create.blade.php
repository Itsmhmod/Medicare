 {{-- @extends('Admin.index')
 @section('title')
     Doctors
 @endsection

 @section('content')
     <div class="card mt-5">


         <div class="card-body">
             <form action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                         <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                             style="font-size: 1.1rem;">
                         @error('name')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-md-6">
                         <label for="email" class="form-label" style="font-size: 1.2rem;">Email</label>
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Enter your email" style="font-size: 1.1rem;">
                         @error('email')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="facebook" class="form-label" style="font-size: 1.2rem;">Facebook</label>
                         <input type="text" class="form-control" id="facebook" name="facebook"
                             placeholder="Enter your Facebook" style="font-size: 1.1rem;">
                         @error('facebook')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-md-6">
                         <label for="instagram" class="form-label" style="font-size: 1.2rem;">Instagram</label>
                         <input type="text" class="form-control" id="instagram" name="instagram"
                             placeholder="Enter your Instagram" style="font-size: 1.1rem;">
                         @error('instagram')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="linkedin" class="form-label" style="font-size: 1.2rem;">LinkedIn</label>
                         <input type="text" class="form-control" id="linkedin" name="linkedin"
                             placeholder="Enter your LinkedIn" style="font-size: 1.1rem;">
                         @error('linkedin')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-md-6">
                         <label for="X" class="form-label" style="font-size: 1.2rem;">X</label>
                         <input type="text" class="form-control" id="X" name="X" placeholder="Enter your X"
                             style="font-size: 1.1rem;">
                         @error('X')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>

                 </div>

                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="image" class="form-label" style="font-size: 1.2rem;">Image</label>
                         <input type="file" class="form-control" accept="image/*" name="image" required
                             style="font-size: 1.1rem;">
                         @error('image')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-md-6">
                         <label for="phone" class="form-label" style="font-size: 1.2rem;">phone</label>
                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone"
                             style="font-size: 1.1rem;">
                         @error('phone')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="specialization_id" class="form-label"
                             style="font-size: 1.2rem;">Specialization</label>
                         <select name="specialization_id" id="specialization_id" style="font-size: 1.1rem;"
                             class="form-control">
                             @foreach ($specializations as $specialization)
                                 <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                             @endforeach
                         </select>
                         @error('specialization_id')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-md-6">
                         <label for="days" class="form-label" style="font-size: 1.2rem;">Days</label>
                         <select name="days[]" id="days" class="form-control" style="font-size: 1.1rem;" multiple>
                             <option selected>Choose the days</option>
                             @foreach ($daysOfWeek as $day_key => $day_value)
                                 <option value="{{ $day_key }}">{{ $day_value }}</option>
                             @endforeach
                         </select>
                         @error('days')
                             <div style="color: red;">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 <div class="text-end">
                     <button type="submit" class="btn btn-primary" style="font-size: 1.2rem;">Add</button>
                 </div>
             </form>
         </div>
     </div>
 @endsection --}}
 {{--  ////////// --}}
 @extends('Admin.index')
 @section('title')
     Doctors
 @endsection

 @section('content')
     <div class="card mt-5">
         <div class="card-body">
             <form action="{{ route('doctor.store') }}" id="doc" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="name" class="form-label" style="font-size: 1.2rem;">Name</label>
                         <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                             style="font-size: 1.1rem;">

                     </div>
                     <div class="col-md-6">
                         <label for="email" class="form-label" style="font-size: 1.2rem;">Email</label>
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Enter your email" style="font-size: 1.1rem;">

                     </div>

                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="facebook" class="form-label" style="font-size: 1.2rem;">Facebook</label>
                         <input type="text" class="form-control" id="facebook" name="facebook"
                             placeholder="Enter your Facebook" style="font-size: 1.1rem;">

                     </div>
                     <div class="col-md-6">
                         <label for="instagram" class="form-label" style="font-size: 1.2rem;">Instagram</label>
                         <input type="text" class="form-control" id="instagram" name="instagram"
                             placeholder="Enter your Instagram" style="font-size: 1.1rem;">

                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="linkedin" class="form-label" style="font-size: 1.2rem;">LinkedIn</label>
                         <input type="text" class="form-control" id="linkedin" name="linkedin"
                             placeholder="Enter your LinkedIn" style="font-size: 1.1rem;">

                     </div>
                     <div class="col-md-6">
                         <label for="X" class="form-label" style="font-size: 1.2rem;">X</label>
                         <input type="text" class="form-control" id="X" name="X" placeholder="Enter your X"
                             style="font-size: 1.1rem;">

                     </div>

                 </div>

                 <div class="row mb-3">
                     <div class="col">
                         <label for="image" class="form-label">image</label>
                         <input type="file" accept="image/*" name="image" id="imageInput" required>

                         <!-- عنصر لعرض المعاينة -->
                         <br>
                         <img id="previewImage" style="width: 70px; display: none;" alt="Image Preview">
                     </div>
                     <div class="col-md-6">
                         <label for="phone" class="form-label" style="font-size: 1.2rem;">phone</label>
                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone"
                             style="font-size: 1.1rem;">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <label for="specialization_id" class="form-label" style="font-size: 1.2rem;">Specialization</label>
                         <select name="specialization_id" id="specialization_id" style="font-size: 1.1rem;"
                             class="form-control">
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
                             placeholder="Enter your password" style="font-size: 1.1rem;" required>
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
                         if (field.selectedOptions.length === 0 || (field.id ===
                                 'specialization_id' && field.value === '')) {
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
                             if (field.selectedOptions.length > 0) {
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
