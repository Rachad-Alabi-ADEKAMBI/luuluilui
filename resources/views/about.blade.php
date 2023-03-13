@extends ('./layouts/app');



@section ('content')

<div class="">
    <div class="main">
        <div class="container mt-2 bg-light about">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h1 class="subtitle">
                        A-propos
                    </h1>

                    <p class="text text-justify">
                        Luuluilui est un site d'annonces de vente de voitures qui vous permet de trouver facilement et
                        rapidement la voiture de vos rêves. Que vous cherchiez une voiture d'occasion ou une voiture
                        neuve, Luuluilui vous offre une vaste sélection de véhicules à des prix compétitifs. <br>

                        Sur Luuluilui, vous pouvez rechercher des voitures par marque ou Avec des options de recherche
                        aussi détaillées, vous êtes sûr de
                        trouver la voiture qui répondra à vos besoins et à votre budget.
                    </p>
                </div>

                <div class="col-sm-12 col-md-6">
                    <img src="{{ url('https://luuluilui.fr/public/img/joey-banks-YApiWyp0lqo-unsplash.jpg') }}">

                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12 col-md-6 p-3">
                    <img src="{{ url('https://luuluilui.fr/public/img/c-b-cAbH8B-14Vo-unsplash.jpg') }}">
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="text-left pt-4">
                        En tant que vendeur, vous pouvez également bénéficier des avantages offerts par Luuluilui. Vous
                        pouvez publier facilement et rapidement une annonce de vente de votre voiture en fournissant des
                        informations détaillées sur le véhicule, telles que le modèle, l'année, le kilométrage, l'état
                        général et le prix. Les acheteurs potentiels peuvent ainsi consulter votre annonce et prendre
                        contact avec vous directement pour organiser une visite ou un essai de conduite. <br>

                        En somme, Luuluilui est une plateforme conviviale et fiable pour acheter ou vendre des voitures
                        en toute sécurité et en toute confiance. Si vous cherchez à acheter ou vendre une voiture,
                        visitez Luuluilui dès aujourd'hui et trouvez la voiture de vos rêves.
                    </p>
                </div>
            </div>
        </div>

        </section>
    </div>
</div>


@endsection