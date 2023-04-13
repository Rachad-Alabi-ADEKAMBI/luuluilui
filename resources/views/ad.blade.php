@extends ('./layouts/app')



@section ('content')

<div class="">
    <div class="main">
        <div class="container mt-2 bg-light">
            <div class="row">
                <div class="car">
                    <a class="close" href="/ads">
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

                    <div class="image">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 text-center">
                                <img src="{{ asset('/img/'.$data->pic1) }}" class="mx-auto">
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="images">
                                    @if($data->pic2)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic2) }}"
                                        class="images_item">
                                    @endif

                                    @if($data->pic3)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic3) }}"
                                        class="images_item">
                                    @endif
                                </div>

                                <div class="images">
                                    @if($data->pic4)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic4) }}"
                                        class="images_item">
                                    @endif

                                    @if($data->pic5)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic5) }}"
                                        class="images_item">
                                    @endif
                                </div>

                                <div class="images">
                                    @if($data->pic6)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic6) }}"
                                        class="images_item">
                                    @endif

                                    @if($data->pic7)
                                    <img src="{{ url('http://luuluilui.fr/public/img/' . $data->pic7) }}"
                                        class="images_item">
                                    @endif
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="car__infos row">
                    <div class="left col-md-12 col-lg-9">
                        <h3 class="text-bold text-left">
                            DESCRIPTION:
                        </h3>
                        <p>
                            {{ $data->description }}
                        </p> <br>

                        <h3 class="text text-bold">
                            DETAILS:
                        </h3>

                        <div class="details">
                            <p>
                                Prix: <span> {{ number_format($data->price, 0,'', ' ') }} € </span> <br>
                                Catégorie: <span> {{ $data->category }}</span><br>
                                Couleur: <span> {{ $data->color }}</span><br>
                                Annee: <span> {{ $data->year }} </span> <br>
                                Etat: <span> {{ $data->rate }} /5</span>
                            </p>
                        </div>
                    </div>

                    <div class="right  col-md-12 col-lg-3">
                        <div class="card mx-auto">
                            <div class="card__top">
                                <img src='http://luuluilui.fr/public/img/pdg.jpeg'>
                                <div class="card__top__infos">
                                    <i class="fas fa-user"></i> John Doe <br>
                                    <i class="bi bi-phone"></i> 547 852 457<br>
                                    <i class="bi bi-whatsapp"></i> 46 466 456 <br>
                                    <i class="fas fa-envelope"></i> john@doe.fr <br>
                                </div>
                            </div>

                            <!--
                                <form action="api/api.php?action='contactForCar" method='POST' class="card__bottom">
                                    <label for="">
                                        <input type="text" placeholder="Votre nom" name='name'>
                                    </label>

                                    <label for="">
                                        <input type="email" placeholder="Votre email" name='email'>
                                    </label>

                                    <label for="">
                                        <input type="number" placeholder="Votre contact" name='contact'>
                                    </label>

                                    <label for="">
                                        <input class='message'
                                            placeholder="Votre message: ex: Je suis interesse par ce vehicule"
                                            name='message'>
                                    </label>

                                    <label>
                                        <button class="button btn-primary" type='submit'>
                                            Contacter
                                        </button>
                                    </label>
                                </form>
                                -->
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