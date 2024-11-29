 <section class="footer">
     <div class="box-container">
         @foreach ($settings as $setting)
             <div class="box">
                 <h3>quick links</h3>
                 <a href="#"> <i class="fas fa-chevron-right"></i> home</a>
                 <a href="#services"> <i class="fas fa-chevron-right"></i> services</a>
                 <a href="#about"> <i class="fas fa-chevron-right"></i> about</a>
                 <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors</a>
                 <a href="#book"> <i class="fas fa-chevron-right"></i> book</a>
                 <a href="#review"> <i class="fas fa-chevron-right"></i> review</a>
                 <a href="#blogs"> <i class="fas fa-chevron-right"></i> blogs</a>
             </div>
             <div class="box">
                 <h3>contact info</h3>
                 <a href="#"> <i class="fas fa-phone"></i> {{ $setting->phone }}</a>
                 <a href="#"> <i class="fas fa-envelope"></i> medcare.info.com</a>
                 <a href="#"> <i class="fas fa-envelope"></i> {{ $setting->email }}</a>
                 <a href="#"> <i class="fas fa-map-marker-alt"></i> {{ $setting->location }}</a>
             </div>
             <div class="box">
                 <h3>follow us</h3>

                 <a href="#"> <i class="fab fa-facebook-f"></i> {{ $setting->facebook }}</a>
                 <a href="#"> <i class="fab fa-twitter"></i> {{ $setting->X }}</a>
                 <a href="#"> <i class="fab fa-linkedin"></i> {{ $setting->linkedin }}</a>
                 <a href="#"> <i class="fab fa-instagram"></i> {{ $setting->instagram }}</a>
                 <a href="#"> <i class="fab fa-youtube"></i> {{ $setting->youtube }}</a>
                 <a href="#"> <i class="fab fa-pinterest"></i> {{ $setting->pinterest }}</a>
             </div>
         @endforeach
     </div>
     <div class="credit">created by <span>Hussien Said | Mohamed Adel | Mohamed Mahmoud</span> | all right reserved
     </div>
 </section>
