<section class="about" id="about">
    <h1 class="heading"><span>about</span> us</h1>
    <div class="row">
        <div class="image">
            <img src="{{ asset('home/image/about-img.svg') }}" alt="About Us">
        </div>
        <div class="content">
            <h3>Committed to Your Health & Well-Being</h3>
            @foreach ($settings as $setting)
                <p>{{ $setting->about_Us }}</p>
            @endforeach
            <p>At our hospital, we offer world-class medical services with a focus on patient care, innovation, and excellence. Our experienced medical team ensures that each patient receives personalized treatment tailored to their needs. We use the latest medical technologies to deliver the best outcomes in a comfortable and supportive environment.</p>
<p>Our hospital is dedicated to providing comprehensive care, focusing not only on physical health but also on emotional well-being. We aim for the fastest recovery by offering holistic support to every patient.</p>
<p>With a commitment to the highest global standards, we continually improve our services through innovation and excellence in healthcare.</p>
            <!-- <a href="#services" class="btn">Learn More</a> -->
            <a href="#home" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>

        </div>
    </div>
</section>
