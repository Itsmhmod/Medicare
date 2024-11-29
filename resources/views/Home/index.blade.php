<!DOCTYPE html>
<html lang="en">


@include('Home.head')



<body>



    <!-- Header Section Starts -->
    @include('Home.header')
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    <!-- Success Modal -->
    {{-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div> --}}
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
    <!-- Header Section End -->

    <!-- Home Section starts -->
    <section class="home" id="home">
        <div class="image">
            <img src="{{ asset('home//image/home-img.svg') }}" alt="home-img.svg">
        </div>
        <div class="content">
            <h3>stay safe, stay healthy</h3>
            <p>Welcome to Medicare, where your health is our top priority.
                Our dedicated team of professionals offers compassionate,
                comprehensive care in a state-of-the-art facility. From routine check-ups to specialized treatments,
                we’re here to support your wellness journey with personalized, expert care. Experience a
                patient-centered approach where your needs come first, and trust us to be your partner in achieving
                optimal health.</p>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- icons section starts  -->
    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-user-md"></i>
            <h3>140+</h3>
            <p>doctors at work</p>
        </div>
        <div class="icons">
            <i class="fas fa-users"></i>
            <h3>1040+</h3>
            <p>satisfied patients</p>
        </div>
        <div class="icons">
            <i class="fas fa-procedures"></i>
            <h3>500+</h3>
            <p>bed facility</p>
        </div>
        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3>80+</h3>
            <p>available hospitals</p>
        </div>
    </section>
    <!-- icons section End  -->

    <!-- Service section Starts  -->

    @include('Home.services')

    <!-- Service section End  -->

    <!-- About section Starts  -->

    @include('Home.about_us')

    <!-- About section End  -->

    <!-- Doctors section Starts  -->

    @include('Home.doctors')

    <!-- Doctors section Ends  -->

    <!-- Book section Starts  -->

    @include('Home.Book')

    <!-- Book section End  -->

    <!-- Review section Starts  -->

    @include('Home.review')

    <!-- Review section End  -->

    <!-- Blogs section Starts -->

    @include('Home.Blogs')

    <!-- Blogs section End -->

    <!-- Footer section Starts  -->

    @include('Home.footer')

    <!-- Footer section End  -->










    <!-- custom js file link  -->
    <script src="{{ asset('home/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // إخفاء الـ Modal بعد 3 ثوانٍ
                setTimeout(function() {
                    successModal.hide();
                }, 3000); // 3000 مللي ثانية = 3 ثوانٍ
            @endif
        });
    </script>

</body>

</html>
