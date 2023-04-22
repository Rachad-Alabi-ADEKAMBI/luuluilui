@extends ('./layouts/app')



@section ('content')




<div class="">
    <div class="main">
        <div class="container mt-2 bg-light">
            <div class="row">
                <div class="car">
                    <a class="close" href="/marketplace">
                        <i class="bi bi-x-lg text-center mx-auto"></i>
                    </a>
                    <hr>
                    <div class="car__top">
                        <h1 class="title"></h1>

                        <div class="right text-center">
                            <h2 class="text-center title mx-auto">
                                {{ strtoupper($data->name) }}
                            </h2>

                        </div>
                    </div>

                    <div class="car__image">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 text-center">
                                <img src="{{ asset('img/ads/'.$data->pic1) }}" class="mx-auto">
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="images">
                                    @if($data->pic2)
                                    <img src="{{ asset('img/ads/'.$data->pic2) }}" class="images_item">
                                    @endif

                                    @if($data->pic3)
                                    <img src="{{ asset('img/ads/'.$data->pic3) }}" class="images_item">
                                    @endif
                                </div>

                                <div class="images">
                                    @if($data->pic4)
                                    <img src="{{ asset('img/ads/'.$data->pic4) }}" class="images_item">
                                    @endif

                                    @if($data->pic5)
                                    <img src="{{ asset('img/ads/'.$data->pic5) }}" class="images_item">
                                    @endif
                                </div>

                                <div class="images">
                                    @if($data->pic6)
                                    <img src="{{ asset('img/ads/'.$data->pic6) }}" class="images_item">
                                    @endif

                                    @if($data->pic7)
                                    <img src="{{ asset('img/ads/'.$data->pic7) }}" class="images_item">
                                    @endif
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="car__infos">
                        <div class="row ">
                            <div class="col-sm-12 col-md-10 details">
                                <div class="detail">
                                    <div class="detail__info">
                                        Moteur: <br>
                                        <span>{{ $data->engine }}</span>
                                    </div>

                                    <div class="detail__info">
                                        Carosserie: <br>
                                        <span>{{ $data->body }}</span>
                                    </div>
                                </div>

                                <div class="detail">
                                    <div class="detail__info">
                                        Boîte de vitesses: <br>
                                        <span>{{$data->box}}</span>
                                    </div>

                                    <div class="detail__info">
                                        Volant: <br>
                                        <span>{{$data->handlebar}}</span>
                                    </div>
                                </div>

                                <div class="detail">
                                    <div class="detail__info">
                                        Kilométrage: <br>
                                        <span>{{ $data->kilometers }}</span>
                                    </div>

                                    <div class="detail__info">
                                        Climatisation: <br>
                                        <span>{{ $data->air_conditionning }}</span>
                                    </div>
                                </div>

                                <div class="detail">
                                    <div class="detail__info">
                                        Année: <br>
                                        <span>{{ $data->year }}</span>
                                    </div>

                                    <div class="detail__info">
                                        Etat: <br>
                                        <span>{{ $data->state }}</span>
                                    </div>
                                </div>

                                <div class="detail">
                                    <div class="detail__info">
                                        Couleur: <br>
                                        <span>{{ $data->color }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-2 seller">
                                <div class="card mx-auto">
                                    <div class="card__top">
                                        <img src="{{ asset('img/users/'.$data->pic) }}" class="images_item">

                                        <div class="card__top__infos">
                                            <i class="fas fa-user"></i> {{  $data->first_name }} {{  $data->last_name }}
                                            <br>
                                            <i class="bi bi-phone"></i> {{  $data->phone_number }} <br>
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

    </section>
</div>
</div>


@endsection