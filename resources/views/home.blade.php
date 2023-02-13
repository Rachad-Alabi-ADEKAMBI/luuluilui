@extends ('./layouts/app');




@section ('content')


<div class="">
    <div class="main">

        <div class="container">
            <section class='section bg-light'>
                <h2>
                    Derniers ajouts
                </h2>

                <div class="container ">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="item">
                                <div class="item__top">
                                    <img src="http://127.0.0.1/frankoo/assets/img/blake-meyer-CRNbHjNaljo-unsplash.jpg"
                                        class='' alt="">
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
                                        {{$ad->description}}
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Annee: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{$ad->price}} F CFA
                                    </p>

                                    <a href="{{url('item',$ad->id)}}" class="btn btn-primary mt-2">Voir</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

            </section>
        </div>

        <div class="container">
            <section class='section mt-5'>
                <h2>
                    Frankoo <br>
                    <span>Votre satisfaction importe</span>
                </h2>

                <div class="container">
                    <div class="row">
                        <div class="cards mt-3">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="card">
                                    <i class="fas fa-money-bill"></i>

                                    <p>
                                        Prix accessibles
                                    </p>

                                    <p class='text'>
                                        Nous vous proposons des prix super abordables
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="card">
                                    <i class="fas fa-lock"></i>
                                    <p>
                                        Garantie de votre achat
                                    </p>

                                    <p class='text'>
                                        Achetez le coeur tranquuille
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="card">
                                    <i class="fas fa-user"></i>
                                    <p>
                                        Demande personnalisée
                                    </p>

                                    <p class="text">
                                        Cherhez vous un modele précis ?
                                        Contactez-nous
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container">
            <section class='section bg-light'>
                <h2>
                    Les plus consultées
                </h2>

                <div class="container ">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="item">
                                <div class="item__top">
                                    <img src="http://127.0.0.1/frankoo/assets/img/blake-meyer-CRNbHjNaljo-unsplash.jpg"
                                        class='' alt="">
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
                                        {{$ad->description}}
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Annee: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{$ad->price}} F CFA
                                    </p>

                                    <button>
                                        <a href="{{url('item',$ad->id)}}">Voir</a>
                                    </button>
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
                <div class="row black__content">
                    <div class="col-sm-12 col-md-6">
                        <p>Trouvez votre vehicule
                            aujourdh'hui </p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <button>
                            <a href="#contact">
                                Contactez-nous
                            </a>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <div class="container">
            <section class='section bg-light'>
                <h2>
                    Top vendeurs
                </h2>

                <div class="container ">
                    <div class="row">
                        @foreach($data as $ad)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="item">
                                <div class="item__top">
                                    <img src="http://127.0.0.1/frankoo/assets/img/blake-meyer-CRNbHjNaljo-unsplash.jpg"
                                        class='' alt="">
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
                                        {{$ad->description}}
                                    </p>

                                    <div class="list">
                                        <div class="list__item">Annee: <span>{{$ad->year}}</span></div>
                                        <div class="list__item">Etat: <span>{{$ad->rate}}</span></div>
                                        <div class="list__item">Couleur: <span>{{$ad->color}}</span></div>
                                    </div>

                                    <p class="price"> {{$ad->price}} F CFA
                                    </p>

                                    <button>
                                        <a href="{{url('item',$ad->id)}}">Voir</a>
                                    </button>
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