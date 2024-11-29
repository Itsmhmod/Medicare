<section class="book" id="book">






    <h1 class="heading"><span>book</span> now</h1>
    <div class="row">
        <div class="image">
            <img src="{{ asset('home//image/book-img.svg') }}" alt="">
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
        <form id="appointmentForm" action="{{ route('books') }}" method="post">
            @csrf
            <h3>book appointment</h3>
            <input type="text" placeholder="your name" class="box" name="name">
            <input type="number" placeholder="your number" class="box" name="phone">
            <input type="email" placeholder="your email" class="box" name="email">
            <select name="visita_no" id="visita_no" class="box">
                <option value="" selected>Visita No</option>
                <option value="first">First</option>
                <option value="second">Second</option>
            </select>
            <select name="doctor_id" id="doctor_id" class="box">
                <option value="" selected>choose the doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            <select name="days" id="days" class="box">
                <option value="" selected>choose the day</option>
            </select>
            <input type="date" class="box" name="date" id="date">
            <!-- I'm not a robot Checkbox -->
            <div class="form-group" style="margin-bottom: 10px; font-size: 25px">
                <input type="checkbox" id="notRobot2" name="notRobot2" style="scale: 1.5">
                <label for="notRobot2">I am not a robot</label>
            </div>
            <div id="robot-error2" style="color: red; font-size: 15px; display: none;">Please confirm you are not a
                robot.</div>
            <input type="submit" value="book now" class="btn" style="border: 1px solid green; font-size:20px">
        </form>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#appointmentForm").submit(function(event) {
            var isRobotChecked = $("#notRobot2").is(":checked");

            // If "I'm not a robot" checkbox is not checked
            if (!isRobotChecked) {
                event.preventDefault(); // Prevent form submission
                $("#robot-error2").show(); // Show error message
            } else {
                $("#robot-error2").hide(); // Hide error message if checked
            }
        });

        // Hide the error message when the checkbox is checked
        $("#notRobot2").change(function() {
            if ($(this).is(":checked")) {
                $("#robot-error2").hide(); // Hide error message if the checkbox is checked
            }
        });
        // Validate form
        $("#appointmentForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                visita_no: {
                    required: true
                },
                doctor_id: {
                    required: true
                },
                days: {
                    required: true
                },
                date: {
                    required: true,
                    date: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 3 characters long"
                },
                phone: {
                    required: "Please enter your phone number",
                    digits: "Please enter a valid phone number",
                    minlength: "Your phone number must be at least 10 digits long"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                visita_no: {
                    required: "Please select your visit type"
                },
                doctor_id: {
                    required: "Please select a doctor"
                },
                days: {
                    required: "Please select a day"
                },
                date: {
                    required: "Please select a date",
                    date: "Please enter a valid date"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.css('color', 'red'); // Customize error message color
                error.css('font-size', '15px');

                error.insertAfter(element); // Place error after input
            }
        });

        // Fetch doctor days using AJAX when doctor is selected
        $('#doctor_id').change(function() {
            var doctorId = $(this).val();
            $.ajax({
                url: '/getDoctorDays', // Laravel route
                type: 'GET',
                data: {
                    doctor_id: doctorId
                },
                success: function(response) {
                    $('#days').empty();
                    $('#days').append('<option value="" selected>choose the day</option>');
                    $.each(response.days, function(index, day) {
                        $('#days').append('<option value="' + day + '">' + day +
                            '</option>');
                    });
                }
            });
        });
    });
</script>
