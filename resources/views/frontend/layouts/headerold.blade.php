<header class="header-2">
     <div class="page-header- min-vh-75- relative"
     style="min-height: 210px;">

      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item active">
                <img src="{{ route('imagecache', [ 'template'=>'original','filename' => $slider->fi() ]) }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
        </div>
      </div>

    </div>
  </header>

