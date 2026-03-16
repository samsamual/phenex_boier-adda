@extends('frontend.layouts.master')

@push('css')

<!-- Include the Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css') }}">
<!-- Include jQuery -->
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<!-- Include the Owl Carousel JavaScript -->
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}"></script>

<style>
    .owl-dot {
        display: none !important;
    }

    .owl-nav {
        display: none !important;
    }
</style>

@endpush

@section('content')


<div class="text-center">
    <h1 class="p-2 w3-small mt-2 w3-round" style="background-color: rgba(65, 65, 65, 0.2);">
        <a href="tel:+8801827434380" class="typewrite w3-large text-bolder" data-period="1000"
        style="color:black;"
        data-type='[ "ডাক্তার এর জন্য কল করুন","ডাক্তার এর জন্য কল করুন","হাসপাতালে ভর্তির জন্য কল করুন..." ]'>
        <span class="wrap"></span>
    </a>
    </h1>
</div>


<section class="pt-3 pb-4" id="count-stats">
        <div class="row">
            <div class="col-6 col-md-3">
                <a href="http://bisesoggo.test/page/21/knowledge-center">
                <div class="card mb-2">
                    <div class="card-body w3-deep-orange rounded p-2">
                       {{ __('Disease') }}
                    </div>
                </div>
              </a>
            </div>

            <div class="col-6 col-md-3 ">
                <a href="tel:+8801827434380">
                    <div class="card mb-2">
                        <div class="card-body w3-blue rounded p-2">
                            {{ __('Hospital Contact') }} &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-6 col-md-3">
                <a href="tel:+8801827434380">
                    <div class="card mb-2">
                        <div class="card-body w3-green rounded p-2">
                            {{ __('Medical Test') }}
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-6 col-md-3">
                <a href="tel:+8801827434380">
                    <div class="card mb-2">
                        <div class="card-body w3-purple rounded p-2">
                            {{ __('Ambulance Service') }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
  </section>

  <hr style="border:1px solid gray">

  <section class="my-3">
    <div class="row">
        <div class="owl-carousel owl-theme">
            @foreach ($hospitals as $hospital)

                <a href="{{ route('hospital-details',$hospital->id) }}">
                    <div class="card elevation-2 mb-2">
                        <img class="card-img-top" src="{{ route('imagecache', [ 'template'=>'cpmd','filename' => $hospital->fi() ]) }}" alt="Hopital Image">
                        <div class="card-body p-1">
                            <h4 class="card-title w3-large m-1 p-1 text-center">{{ $hospital->name }}</h4>
                        </div>
                    </div>
                </a>

            @endforeach
        </div>
    </div>
  </section>






  <section>
    <div class="container-fluid p-0">
        <div class="row">
            <h4 class="text-center my-2">
                ⎯⎯⎯ {{ __('Experienced Doctor/Bisesoggo Experts') }} ⎯⎯⎯
            </h4>
            @foreach ($bisesoggoCategories as $category)
            <div class="col-6 col-sm-2">
                <a href="{{ route('category-details',$category->id) }}">
                <div class="card mx-0  my-1 rounded-2 border-1 w3-animate-zoom w3-hover-shadow">
                    <div class="card-body px-0">
                        <div class="text-center px-1 py-4">
                            <img src="{{ route('imagecache', [ 'template'=>'ppxs','filename' => $category->fi() ]) }}" alt="">
                            <div style="height:30px">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>

<section>
    <div class="container-fluid px-0 mt-2">
        <div class="row">
            <h4 class="text-center my-3">
                 ⎯⎯⎯  {{ __('More Doctors') }}  ⎯⎯⎯
            </h4>
            <div class="d-flex justify-content-end mb-2">
                <div class="col-12 col-sm-5">
                    <form method="GET" action="{{ route('hospital-search') }}">
                        <div class="d-flex justify-content-center align-content-center">
                        <input type="text" placeholder="{{ __('Search') }}" class="form-control is-valid" name="search" value="">
                        <input type="submit" class="bg-danger border-0 text-white" value="{{ __('Search') }}">
                        </div>
                    </form>
                </div>
            </div>

            <?php $i = (($doctors->currentPage() - 1) * $doctors->perPage() + 1); ?>
            @foreach ($doctors as $doctor)
            <div class="col-12 col-md-6">
                <div class="card m-1 p-1 rounded-0 w3-animate-zoom w3-hover-shadow bg-white border-2" style="min-height: 200px; overflow:hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <img src="{{ route('imagecache', [ 'template'=>'pplg','filename' => $doctor->fi() ]) }}" alt="ee" class="rounded-2 img-fluid img-thumbnail">
                        </div>
                        <div class="col-7 col-sm-9">


                        <h3 class="text-danger font-weight-bold">{{ $i++ }}.{{ $doctor->name }}</h3>
                        <p class="m-0 text-success font-weight-bold">{{  $doctor->bisesoggoCategory->name  }}</p>
                        <p class="m-0 text-success">{{ $doctor->designation }}</p>
                        <p>{{  Str::limit($doctor->excerpt, 100, '...') }}<a href="{{ route('doctor-details',$doctor->id) }}" class="mx-1 text-danger font-weight-bold">{{ __('Read More') }}</a></p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            <div class="pt-3 text-end"> {{ $doctors->render() }}</div>
        </div>
    </div>
</section>


@endsection


@push('scripts')

<!-- Initialize Owl Carousel -->


<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                loop: true,
                autoplay: true,


            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: true,
                autoplay: true,
            }
        }
    })
</script>





<script>
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
@endpush









