@extends ('./layouts/app')


@section('title', 'Luuluilui - Annonces gratuites de vente et location de véhicules')

@section ('content')

<div class="">
    <div class="main">

        <div class="container">
            <!--hero starts-->
            <div class="hero">
                <div class="hero__content">

                    <h1 class="animate__animated
                    animate__bounce fw-bold animate__repeat-2">
                        LUULUILUI</h1>


                    <p class="text text-white">
                        Annonces de vente & location de voitures
                    </p>
                    <a href="/marketplace" class="btn btn-primary fw-bold large-font">
                        Voir les annonces
                    </a>
                </div>
            </div>

            <!--last ads-->
            <section class='section bg-light' id="last">
                <h2 class="subtitle mt-5">
                    DERNIERS AJOUTS
                </h2>

                <div class="container mt-2">
                    <div class="row">
                        @foreach($lastAds as $data)
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
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
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

        <!--about-->
        <section class="section mt-5 p-3">
            <h2 class="title">
                LUULUILUI
            </h2>

            <div class="row mt-3 intro">
                <div class="col-sm-12 col-md-6 animate__animated animate__fadeInLeft">
                    <img src="{{ asset('img/c-b-cAbH8B-14Vo-unsplash.jpg') }}" alt="voiture a vendre" class="mx-auto">
                </div>

                <div class="col-sm-12 col-md-6 animate__animated animate__fadeInRight">
                    <p class="text text-justify p-3">
                        Luuluilui est un site d'annonces de vente et de locations de voitures qui vous permet de trouver
                        facilement
                        et
                        rapidement la voiture de vos rêves. Que vous cherchiez une voiture d'occasion ou une voiture
                        neuve, Luuluilui vous offre une vaste sélection de véhicules à des prix compétitifs. <br>

                        Sur Luuluilui, vous pouvez rechercher des voitures par marque ou Avec des options de
                        recherche
                        aussi détaillées, vous êtes sûr de
                        trouver la voiture qui répondra à vos besoins et à votre budget.
                    </p>

                    <a class="btn btn-primary" href="/about">
                        En savoir plus
                    </a>
                </div>
            </div>
        </section>


        <section class='section mt-5 pt-2 bg-light'>
            <div class="container">
                <div class="row">
                    <div class="cards mt-3 text-center">
                        <div class="col-sm-12 col-md-4 col-lg-4   mx-auto mt-3">
                            <div class="card">
                                <i class="fas fa-money-bill"></i>
                                <br>
                                <span>
                                    Annonces gratuites
                                </span> <br>

                                <p class='text'>
                                    Aucun frais d'annonces
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto mt-3">
                            <div class="card">
                                <i class="fas fa-lock"></i>
                                <br> <span>
                                    site sécurisé
                                </span>

                                <p class='text'>
                                    Faites vos affaires tranquillement
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto mt-3">
                            <div class="card">
                                <i class="fas fa-user"></i>
                                <br> <span>
                                    Facile à utiliser
                                </span>

                                <p class="text">
                                    Options de recherche avancées
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--most viewed-->
        <div class="container mt-3 pt-2" id="most">
            <section class='section bg-light'>
                <h2 class="subtitle">
                    LES PLUS CONSULTEES
                </h2>

                <div class="container mt-4">
                    <div class="row">
                        @foreach($mostViewedAds as $data)
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
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
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

        <!--grey-->
        <section class="section">
            <div class="container black">
                <div class="row black__content text-center">
                    <div class="col-sm-12 col-md-6">
                        <p class="text text-center">Trouvez votre vehicule
                            aujourdh'hui </p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <button class="mx-auto mt-2">
                            <a href="/marketplace">
                                Voir les annonces
                            </a>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <!--featured-->
        <div class="container mt-4" id="stars">
            <section class='section bg-light'>
                <h2 class="subtitle">
                    ANNONCES EN VEDETTE
                </h2>

                <div class="container mt-4">
                    <div class="row">
                        @foreach($mostViewedAds as $data)
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
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
                                        @endif

                                        @if(!empty($data->pic3))
                                        <img src="{{ asset('img/ads/'.$data->pic3) }}" alt='acheter voiture au benin'
                                            class="images_item">
                                        @else
                                        <img src="{{ asset('img/ads/pic.jpg') }}" alt='louer voiture au benin'
                                            class="images_item">
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
    </div>
</div>



@endsection