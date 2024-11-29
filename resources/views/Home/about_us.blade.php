<section class="about" id="about">
    <h1 class="heading"><span>about</span> us</h1>
    <div class="row">
        <div class="image">
            <img src="{{ asset('home//image/about-img.svg') }}" alt="">
        </div>
        <div class="content">
            <h3>we take care of your healthy life</h3>
            @foreach ($settings as $setting)
                <p>{{ $setting->about_Us }}</p>
            @endforeach
        </div>
    </div>
</section>
