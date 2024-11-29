<section class="blogs" id="blogs">
    <h1 class="heading">our <span>blogs</span></h1>
    <div class="box-container">
        @foreach ($blogs as $blog)
            <div class="box">
                <div class="image">
                    <img style="width: 400px; " src="{{ asset('Blog_img/attachments/Blog_attachments/' . $blog->image) }}"
                        alt="not found">
                </div>
                <div class="content">
                    <div class="icon">
                        <a href="#"><i class="fas fa-calendar"></i>{{ $blog->date }}</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                    <h3>{{ $blog->name }}</h3>
                    <p>{{ $blog->subject }}</p>
                </div>
            </div>
        @endforeach

    </div>
</section>
