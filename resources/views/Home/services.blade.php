@section('title')
    ddddd
@endsection

<section class="services" id="services">
    <h1 class="heading">our <span>services</span></h1>
    <div class="box-container">
        @foreach ($services as $service)
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>

            </div>
        @endforeach

    </div>
</section>
