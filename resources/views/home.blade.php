@extends ('./layouts/app');



@section ('content')

<div class="">
    <div class="main">

        <div class="container">
            <!--hero starts-->
            <div class="hero">
                <div class="hero__content">
                    <h1>
                        LUULUILUI
                    </h1>

                    <p class="text text-white">
                        Annonces de vente & location de voitures
                    </p>
                    <a href="/ads" class="btn btn-primary">
                        Voir les annonces
                    </a>
                </div>
            </div>
            <!--hero ends-->

            <section class='section bg-light' id="last">
                <h2 class="subtitle mt-5">
                    DERNIERS AJOUTS
                </h2>

                <div class="container mt-4">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-md-12 col-lg-4">
                            <div class="item mx-auto">
                                <div class="item__top">
                                    <img src="http://luuluilui.fr/public/img/{{ $ad->pic1 }}">
                                    <div class="info">{{$ad->category}}</div>
                                    <div class="bar">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="item__bottom">
                                    <h3>
                                        {{$ad->name}}
                                    </h3>

                                    <p class="description">
                                        @php echo App\Http\Controllers\HomeController::formatText($ad->description);
                                        @endphp
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Ann??e: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}/5</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{ number_format($ad->price, 0, '', ' ')}} ???
                                    </p>

                                    <a href="{{url('ad',$ad->id)}}" class="btn btn-primary mt-2">Voir</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>


        <section class="section mt-5 p-3">
            <h2 class="title">
                LUULUILUI
            </h2>

            <div class="row mt-3 intro">
                <div class="col-sm-12 col-md-6">
                    <img src="{{ asset('img/c-b-cAbH8B-14Vo-unsplash.jpg') }}" alt="voiture a vendre" class="mx-auto">
                </div>

                <div class="col-sm-12 col-md-6">
                    <p class="text text-justify p-3">
                        Luuluilui est un site d'annonces de vente de voitures qui vous permet de trouver facilement
                        et
                        rapidement la voiture de vos r??ves. Que vous cherchiez une voiture d'occasion ou une voiture
                        neuve, Luuluilui vous offre une vaste s??lection de v??hicules ?? des prix comp??titifs. <br>

                        Sur Luuluilui, vous pouvez rechercher des voitures par marque ou Avec des options de
                        recherche
                        aussi d??taill??es, vous ??tes s??r de
                        trouver la voiture qui r??pondra ?? vos besoins et ?? votre budget.
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
                                    Garantie de votre achat
                                </span>

                                <p class='text'>
                                    Achetez le coeur
                                    tranquuille
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto mt-3">
                            <div class="card">
                                <i class="fas fa-user"></i>
                                <br> <span>
                                    Facile ?? utiliser
                                </span>

                                <p class="text">
                                    Cherhez vous un modele pr??cis ?

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-3 pt-2" id="most">
            <section class='section bg-light'>
                <h2 class="subtitle">
                    LES PLUS CONSULTEES
                </h2>

                <div class="container mt-4">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-md-12 col-lg-4">
                            <div class="item mx-auto">
                                <div class="item__top">
                                    <img src="https://luuluilui.fr/public/img/{{ $ad->pic1 }}">
                                    <div class="info">{{$ad->category}}</div>
                                    <div class="bar">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="item__bottom">
                                    <h3>
                                        {{$ad->name}}
                                    </h3>

                                    <p class="description">
                                        @php echo App\Http\Controllers\HomeController::formatText($ad->description);
                                        @endphp
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Ann??e: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}/5</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{ number_format($ad->price, 0, '', ' ')}} ???
                                    </p>

                                    <a href="{{url('ad',$ad->id)}}" class="btn btn-primary mt-2">Voir</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>

        <section class="section">
            <div class="container black">
                <div class="row black__content text-center">
                    <div class="col-sm-12 col-md-6">
                        <p class="text text-center">Trouvez votre vehicule
                            aujourdh'hui </p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <button class="mx-auto mt-2">
                            <a href="/ads">
                                Voir les annonces
                            </a>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <div class="container mt-4" id="stars">
            <section class='section bg-light'>
                <h2 class="subtitle">
                    ANNONCES EN VEDETTE
                </h2>

                <div class="container mt-4">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-md-12 col-lg-4">
                            <div class="item mx-auto">
                                <div class="item__top">
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $ad->pic1) }}">
                                    <div class="info">{{$ad->category}}</div>
                                    <div class="bar">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="item__bottom">
                                    <h3>
                                        {{$ad->name}}
                                    </h3>

                                    <p class="description">
                                        @php echo App\Http\Controllers\HomeController::formatText($ad->description);
                                        @endphp
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Ann??e: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}/5</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{ number_format($ad->price, 0, '', ' ')}} ???
                                    </p>

                                    <a href="{{url('ad',$ad->id)}}" class="btn btn-primary mt-2">Voir</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>



@endsection