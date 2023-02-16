@extends ('./layouts/app');



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
                                {{ $data->name }}
                            </h2>

                        </div>
                    </div>

                    <div class="image">
                        <img src='http://127.0.0.1/frankoo/assets/img/joey-banks-YApiWyp0lqo-unsplash.jpg'>
                    </div>

                    <div class="car__infos">
                        <div class="left">
                            <h3>
                                Description:
                            </h3>
                            <p>
                                {{ $data->description }}
                            </p> <br>

                            <h3 class="text text-bold">
                                Details:
                            </h3>

                            <div class="details">
                                <p>
                                    Couleur: <span> {{ $data->color }}</span><br>
                                    Annee: <span> {{ $data->year }} </span> <br>
                                    Etat: <span> {{ $data->rate }} /5</span>
                                </p>
                            </div>

                            <div class="images">
                                <img src='http://127.0.0.1/frankoo/assets/img/joey-banks-YApiWyp0lqo-unsplash.jpg'>
                                <img src='http://127.0.0.1/frankoo/assets/img/joey-banks-YApiWyp0lqo-unsplash.jpg'>
                                <img src='http://127.0.0.1/frankoo/assets/img/joey-banks-YApiWyp0lqo-unsplash.jpg'>
                            </div> <br>


                        </div>

                        <div class="right">
                            <div class="card">
                                <div class="card__top">
                                    <img src='http://127.0.0.1/frankoo/assets/img/joey-banks-YApiWyp0lqo-unsplash.jpg'>
                                    <div class="card__top__infos">
                                        <i class="fas fa-user"></i> {{ $data->id }} <br>
                                        <i class="fas fa-phone"></i> {{ $data->color }} <br>
                                        <i class="fas fa-phone"></i> {{ $data->color }} <br>
                                        <i class="fas fa-envelope"></i> {{ $data->color }} <br>
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