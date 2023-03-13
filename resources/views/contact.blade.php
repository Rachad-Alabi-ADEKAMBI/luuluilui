@extends ('./layouts/app');



@section ('content')

<div class="">
    <div class="main">
        <div class="container mt-2 bg-light">
            <div class="row">
                <div class="col-sm-12 col-md-8 mx-auto">
                    <h1 class="subtitle">
                        Contact
                    </h1>

                    <p class="text text-justify">
                        Si vous avez des questions, des commentaires ou des préoccupations, n'hésitez pas à nous
                        contacter. Nous sommes là pour vous aider et sommes impatients de vous fournir une réponse
                        rapide et efficace. Nous vous remercions pour votre confiance et votre intérêt pour notre
                        site.

                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 mx-auto">
                    <h2 class="subtitle">
                        Formulaire
                    </h2>
                    <form class="form" method='POST' action='./api/api.php?action=contact'>
                        <div class="row">
                            <div class="form-group">
                                <label for="inputAddress">Email: </label> <span class="red">*</span>
                                <input type="Email" class="form-control" id="inputAddress" placeholder="Email"
                                    name='email' required>
                            </div>
                        </div>
                        <div class="mt-1 row mx-auto">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nom: </label> <span class="red">*</span>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Nom"
                                    name='first_name' required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Prénoms:</label><span class="red">*</span>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Prénoms"
                                    required name='last_name'>
                            </div>
                        </div>

                        <div class="row mx-auto mt-2">
                            <div class="form-group  col-4">
                                <label for="inputEmail4">Code : </label> <span class="red">*</span>
                                <input type="text" class="form-control" id="inputEmail4"
                                    placeholder="Indicatif de téléphone"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}" name='phone_code'>
                            </div>
                            <div class="form-group  col-8">
                                <label for="inputPassword4">Num de téléphone: </label> <span class="red">*</span>
                                <input type="text" class="form-control" id="inputPassword4"
                                    placeholder="Numéro de téléphone" name='phone_number'
                                    onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                            </div>
                        </div>

                        <div class="form-row mx-auto mt-2">
                            <div class="form-group col-md-6">
                                <label for="">Objet: </label> <span class="red">*</span> <br>
                                <input type="text" class="form-control" id="inputPassword4"
                                    placeholder="Objet du message" name='subject' required>

                            </div>
                        </div>





                        <div class="form-group mt-2">
                            <label for="exampleFormControlTextarea1">Message: <span class="red">*</span> </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <p class="text-left">
                            (Les cases obligatoires sont précédées de <span class="red">*</span>)
                        </p>

                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Oui je comprends et j'accepte que ces informations soient <br> stockées
                                    afin de me recontacter
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #bc111d;;">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

        </section>
    </div>
</div>


@endsection