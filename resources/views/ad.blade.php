@extends ('./layouts/app')



@section ('content')




<div class="pb-5">
    <div class="main">
        <div class="container mt-2 bg-light pt-5">

            <div class="row">
                <div class="car">
                    <a class="close" href="/marketplace">
                        <i class="bi bi-x-lg text-center mx-auto"></i>
                    </a>
                    <hr>
                    <div class="car__top">
                        <h1 class="title mt-2">
                            {{ strtoupper($data->name) }}
                        </h1>
                    </div>

                    <div class="car__image">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 text-center">
                                <img src="{{ asset('img/ads/'.$data->pic1) }}" class="mx-auto">
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="images">
                                    @if(!empty($data->pic2))
                                    <img src="{{ asset('img/ads/'.$data->pic2) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif

                                    @if(!empty($data->pic3))
                                    <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif
                                </div>

                                <div class="images">
                                    @if(!empty($data->pic4))
                                    <img src="{{ asset('img/ads/'.$data->pic4) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif

                                    @if(!empty($data->pic5))
                                    <img src="{{ asset('img/ads/'.$data->pic5) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif
                                </div>

                                <div class="images">
                                    @if(!empty($data->pic6))
                                    <img src="{{ asset('img/ads/'.$data->pic6) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif

                                    @if(!empty($data->pic7))
                                    <img src="{{ asset('img/ads/'.$data->pic7) }}" alt='acheter voiture au benin'
                                        class="images_item">
                                    @else
                                    <i class="fas fa-car-side images_item_icon"></i>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="text text-left">
                                    <span> {{ number_format($data->price, '0', '', ' ' ) }} XOF</span> <br>
                                    <strong>{{$data->category  }},
                                        {{ $data->location }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="car__infos">
                        <div class="row pb-5">
                            <div class="col-sm-12 col-md-10 details">
                                <div class="up">
                                    <div class="detail">
                                        <div class="detail__info">
                                            Moteur: <br>
                                            <i class="bi bi-gear-wide-connected"></i> <span>{{ $data->engine }}</span>
                                        </div>

                                        <div class="detail__info">
                                            Carosserie: <br>
                                            <i class="fas fa-car-side"></i> <span>{{ $data->body }}</span>
                                        </div>
                                    </div>

                                    <div class="detail">
                                        <div class="detail__info">
                                            Boîte de vitesse: <br>
                                            <i class="fas fa-sitemap"></i> <span>{{$data->box}}</span>
                                        </div>

                                        <div class="detail__info">
                                            Volant: <br>
                                            <i class="bi bi-arrow-left-right fw-bold"></i>
                                            <span>{{$data->handlebar}}</span>
                                        </div>
                                    </div>

                                    <div class="detail">
                                        <div class="detail__info">
                                            Kilométrage: <br>
                                            <i class="fas fa-road"></i> <span>{{ $data->kilometers }}</span> km
                                        </div>

                                        <div class="detail__info">
                                            Climatisation: <br>
                                            <i class="fas fa-snowflake"></i> <span>{{ $data->air_conditionning }}</span>
                                        </div>
                                    </div>

                                    <div class="detail">
                                        <div class="detail__info">
                                            Année: <br>
                                            <i class="fas fa-calendar"></i> <span>{{ $data->year }}</span>
                                        </div>

                                        <div class="detail__info">
                                            Etat: <br>
                                            <i class="fas fa-signal"></i><span>{{ $data->state }}</span>
                                        </div>
                                    </div>

                                    <div class="detail">
                                        <div class="detail__info">
                                            Couleur: <br>
                                            <i class="fas fa-palette"></i> <span>{{ $data->color }}</span>
                                        </div>

                                        <div class="detail__info">
                                            Places: <br>
                                            <i class="fas fa-users"></i><span>{{ $data->places }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom">
                                    Message du vendeur: <br>
                                    <p class="text text-grey fw-bold">
                                        {{ $data->description  }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-2 seller">
                                <div class="card mx-auto">
                                    <div class="card__top">
                                        <h3 class="subtitle mx-auto">
                                            Annonceur
                                        </h3>

                                        <div class="card__top__infos">
                                            <i class="fas fa-user"></i> {{  $data->first_name }}
                                            {{  $data->last_name }}<br>
                                            <i class="fas fa-list"></i> {{  $data->ads }} annonces
                                            <br>
                                            <i class="bi bi-phone"></i>
                                            {{  $data->phone_number }} <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <section class='section bg-light pt-2' id="last">
        <h2 class="subtitle mt-1    ">
            LES PLUS VUES
        </h2>

        <div class="container mt-2">
            <div class="row">
                @foreach($others as $data)
                <div class="col-md-12 col-lg-4">
                    <a href="{{ url('/adView/'.$data->id) }}">
                        <div class="item mx-auto">
                            <div class="item__top mb-0">
                                <img src="{{ asset('img/ads/'.$data->pic1) }}" class='' alt="">
                                <div class="info"> {{ number_format($data->price, 0, '',' ')}} XOF </div>
                                <div class="bar">
                                    <p>{{  $data->category }}</p>
                                </div>
                            </div>

                            <div class="item__middle">
                                @if(!empty($data->pic2))
                                <img src="{{ asset('img/ads/'.$data->pic2) }}" alt='acheter voiture au benin'
                                    class="images_item">
                                @else
                                <i class="fas fa-car-side"></i>
                                @endif

                                @if(!empty($data->pic3))
                                <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                    class="images_item">
                                @else
                                <i class="fas fa-car-side images_item_icon"></i>
                                @endif

                                @if(!empty($data->pic3))
                                <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                    class="images_item">
                                @else
                                <i class="fas fa-car-side images_item_icon"></i>
                                @endif
                            </div>

                            <div class="item__bottom">
                                <h3>
                                    {{ $data->name }}
                                </h3>

                                <p>
                                    <i class="bi bi-tag-fill"></i> <span>{{ $data->category }}</span>, <br>
                                    <i class="bi bi-geo-alt-fill"></i> {{  $data->location }}
                                </p>

                                <div class="list">
                                    <div class="list__item">Moteur: <br>
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <span> {{ $data->engine }} </span>
                                    </div>
                                    <div class="list__item"> Climatisation: <br>
                                        <i class="fas fa-snowflake"></i>
                                        <span> {{ $data->air_conditionning }} </span>
                                    </div>
                                    <div class="list__item">Année: <br>
                                        <i class="bi bi-calendar-fill fw-bold"></i>
                                        <span> {{ $data->year }} </span>
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
</div>


@endsection