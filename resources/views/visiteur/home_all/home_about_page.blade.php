

@php

$allmultiImage=App\Models\MultiImage::all();

@endphp




<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
        
                   
                    @foreach($allmultiImage as $item)
                    <li>
                        <img class="light" src="{{asset($item->multi_images)}}" alt="XD">
                    </li>
                   @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">{{ $about->title }}</span>
                        <h2 class="title">{{ $about->short_title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_description }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $about->long_description }}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>



