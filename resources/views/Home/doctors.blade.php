<section class="doctors" id="doctors">
    <h1 class="heading">our <span>doctors</span></h1>
    <div class="box-container">
        @foreach ($doctors as $doctor)
            <div class="box">
                <img style="width: 350px; height:350px "
                    src="{{ asset('Doctor_img/attachments/Doctor_attachments/' . $doctor->image) }}" alt="not found">
                <h3>{{ $doctor->name }}</h3>
                <span>{{ $doctor->Specialization->name }}</span>
                <div class="share">
                    <a href="{{ $doctor->facebook }}" class="fab fa-facebook-f"></a>
                    <a href="{{ $doctor->X }}" class="fab fa-twitter"></a>
                    <a href="{{ $doctor->linkedin }}" class="fab fa-linkedin"></a>
                    <a href="{{ $doctor->instagram }}" class="fab fa-instagram"></a>
                </div>
            </div>
        @endforeach

    </div>
</section>
