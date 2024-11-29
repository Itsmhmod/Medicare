 <style>
     /* Style for the star rating */
     .star-rating {
         display: inline-flex;
         direction: rtl;
         /* Right-to-left so the highest value appears first */
         font-size: 0;
         /* Hide default text */
     }

     .star-rating__input {
         display: none;
         /* Hide default radio buttons */
     }

     .star-rating__input+label::before {
         content: "★";
         font-size: 4rem;
         /* Size of the stars */
         color: gray;
         /* Default color for unselected stars */
         padding: 0 0.1rem;
         cursor: pointer;
     }

     .star-rating__input:checked~label::before {
         color: gold;
         /* Color for selected stars */
     }

     .star-rating__input+label:hover::before,
     .star-rating__input+label:hover~label::before {
         color: gold;
         /* Color when hovering over stars */
     }

     /* #book {
        scale: 0.9;
    } */
 </style>

 <!-- HTML -->
 <section class="book" id="review">
     <h1 class="heading"><span>Add</span> Review</h1>
     <div class="row">
         <div class="image">
             <img src="./image/book-img.svg" alt="">
         </div>
         <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="successModalLabel">success</h5>
                         <!-- قم بإزالة زر الإغلاق هنا -->
                     </div>
                     <div class="modal-body">
                         @if (session('success'))
                             {{ session('success') }}
                         @endif
                     </div>
                 </div>
             </div>
         </div>
         <form id="reviewForm" method="POST" action="{{ route('reviews') }}">
             @csrf
             <h3>Review Us</h3>
             <br><br>

             <!-- Doctor Select -->
             <div class="form-group" style="margin-bottom: 10px;">
                 <select id="doctor-name" name="doctor_id" class="box">
                     <option value="" selected disabled>Select Doctor</option>
                     @foreach ($doctors as $doctor)
                         <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                     @endforeach
                 </select>
             </div>

             <!-- Clinic Rating -->
             <div class="rating-group">
                 <label>
                     <h3>Clinic Rating:</h3>
                 </label>
                 <div class="form-group">
                     <fieldset class="star-rating">
                         <input class="star-rating__input" type="radio" name="clinic_rate" value="5"
                             id="clinic_rate-5" />
                         <label for="clinic_rate-5"></label>

                         <input class="star-rating__input" type="radio" name="clinic_rate" value="4"
                             id="clinic_rate-4" />
                         <label for="clinic_rate-4"></label>

                         <input class="star-rating__input" type="radio" name="clinic_rate" value="3"
                             id="clinic_rate-3" />
                         <label for="clinic_rate-3"></label>

                         <input class="star-rating__input" type="radio" name="clinic_rate" value="2"
                             id="clinic_rate-2" />
                         <label for="clinic_rate-2"></label>

                         <input class="star-rating__input" type="radio" name="clinic_rate" value="1"
                             id="clinic_rate-1" />
                         <label for="clinic_rate-1"></label>
                     </fieldset>
                 </div>
             </div>

             <!-- Doctor Rating -->
             <div class="rating-group">
                 <label>
                     <h3>Doctor Rating:</h3>
                 </label>
                 <div class="form-group">
                     <fieldset class="star-rating">
                         <input class="star-rating__input" type="radio" name="doctor_rate" value="5"
                             id="doctor_rate-5" />
                         <label for="doctor_rate-5"></label>

                         <input class="star-rating__input" type="radio" name="doctor_rate" value="4"
                             id="doctor_rate-4" />
                         <label for="doctor_rate-4"></label>

                         <input class="star-rating__input" type="radio" name="doctor_rate" value="3"
                             id="doctor_rate-3" />
                         <label for="doctor_rate-3"></label>

                         <input class="star-rating__input" type="radio" name="doctor_rate" value="2"
                             id="doctor_rate-2" />
                         <label for="doctor_rate-2"></label>

                         <input class="star-rating__input" type="radio" name="doctor_rate" value="1"
                             id="doctor_rate-1" />
                         <label for="doctor_rate-1"></label>
                     </fieldset>
                 </div>
             </div>

             <!-- Treatment Rating -->
             <div class="rating-group">
                 <label>
                     <h3>Treatment Rating:</h3>
                 </label>
                 <div class="form-group">
                     <fieldset class="star-rating">
                         <input class="star-rating__input" type="radio" name="treatment_rate" value="5"
                             id="treatment_rate-5" />
                         <label for="treatment_rate-5"></label>

                         <input class="star-rating__input" type="radio" name="treatment_rate" value="4"
                             id="treatment_rate-4" />
                         <label for="treatment_rate-4"></label>

                         <input class="star-rating__input" type="radio" name="treatment_rate" value="3"
                             id="treatment_rate-3" />
                         <label for="treatment_rate-3"></label>

                         <input class="star-rating__input" type="radio" name="treatment_rate" value="2"
                             id="treatment_rate-2" />
                         <label for="treatment_rate-2"></label>

                         <input class="star-rating__input" type="radio" name="treatment_rate" value="1"
                             id="treatment_rate-1" />
                         <label for="treatment_rate-1"></label>
                     </fieldset>
                 </div>
             </div>

             <!-- Comment Section -->
             <div class="comment-section" style="margin-bottom: 10px;">
                 <label for="comment">
                     <h3>Comment:</h3>
                 </label>
                 <textarea id="comment" name="comment" class="box" rows="2"></textarea>
             </div>

             <!-- I'm not a robot Checkbox -->
             <div class="form-group" style="margin-bottom: 10px; font-size: 25px">
                 <input type="checkbox" id="notRobot" name="notRobot" style="scale: 1.5">
                 <label for="notRobot">I am not a robot</label>
             </div>
             <div id="robot-error" style="color: red; font-size: 15px; display: none;">Please confirm you are not a
                 robot.</div>

             <!-- Submit Button -->
             <input type="submit" value="Submit" class="btn" style="border: 1px solid green; font-size:20px">
         </form>
     </div>
 </section>



 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

 <script type="text/javascript">
     $(document).ready(function() {
         // Custom jQuery Validation for "I'm not a robot"
         $("#reviewForm").submit(function(event) {
             var isRobotChecked = $("#notRobot").is(":checked");

             // If "I'm not a robot" checkbox is not checked
             if (!isRobotChecked) {
                 event.preventDefault(); // Prevent form submission
                 $("#robot-error").show(); // Show error message
             } else {
                 $("#robot-error").hide(); // Hide error message if checked
             }
         });

         // Hide the error message when the checkbox is checked
         $("#notRobot").change(function() {
             if ($(this).is(":checked")) {
                 $("#robot-error").hide(); // Hide error message if the checkbox is checked
             }
         });

         // jQuery Validation for other fields
         $("#reviewForm").validate({
             rules: {
                 doctor_id: {
                     required: true
                 },
                 clinic_rate: {
                     required: true
                 },
                 doctor_rate: {
                     required: true
                 },
                 treatment_rate: {
                     required: true
                 },
                 comment: {
                     required: true,
                     minlength: 7
                 }
             },
             messages: {
                 doctor_id: {
                     required: "Please select a doctor."
                 },
                 clinic_rate: {
                     required: "Please rate the clinic."
                 },
                 doctor_rate: {
                     required: "Please rate the doctor."
                 },
                 treatment_rate: {
                     required: "Please rate the treatment."
                 },
                 comment: {
                     required: "Please provide a comment.",
                     minlength: "Your comment must be at least 7 characters long."
                 }
             },
             errorElement: "div",
             errorPlacement: function(error, element) {
                 error.css('color', 'red'); // Customize error message color
                 error.css('font-size', '20px');
                 error.insertAfter(element); // Place error after the input field
             }
         });
     });
 </script>
