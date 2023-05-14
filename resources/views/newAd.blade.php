@extends ('./layouts/app')



@section ('content')

<main class="main">
    <!--start add-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mt-3 mb-3 mx-auto p-5 rounded-2 bg-secondary text-left text-white fw-bold">
                <form action="upload" method="POST" enctype="multipart/form-data" class="mx-auto">
                    @csrf

                    <a href="/dashboard" class="close text-right mr-0">
                        <i class="bi bi-x-lg text-right"></i>
                    </a>


                    <h2 class="subtitle">
                        Nouvel ajout
                    </h2>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Nom <span>*</span> </label>
                            <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Nom"
                                required>
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Marque <span>*</span></label>
                            <input type="text" class="form-control" name="brand_name" required id="inputEmail4"
                                placeholder="Modèle">
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Prix <span>*</span></label>
                            <input type="text" class="form-control" name="price" id="inputEmail4" placeholder="Prix">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Année: <span>*</span></label>
                            <input type="number" class="form-control" name="year" id="inputEmail4" placeholder="Nom"
                                required>
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Etat: <span>*</span></label> <br>
                            <select name="state" id="" required class="text-black fw-normal">
                                <option value="">Veuillez sélectionner</option>
                                <option value="Neuf">Neuf</option>
                                <option value="Occasion">Occasion</option>
                                <option value="Import">Import</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Couleur: <span>*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Couleur" name="color"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Moteur: <span>*</span> </label>
                            <input type="text" class="form-control" name="engine" id="inputEmail4" placeholder="Moteur"
                                required>
                        </div>


                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Boîte: <span>*</span></label>
                            <select type="text" class="form-control" name="box" id="inputEmail4">
                                <option value="">Type de boîte de vitesse</option>
                                <option value="Auto">Auto</option>
                                <option value="Manuel">Manuel</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Action: <span>*</span> </label>
                            <select type="text" class="form-control" name="category" id="inputEmail4"
                                placeholder="Category" required>
                                <option value="">Veuillez sélectionner</option>
                                <option value="A vendre">Vendre</option>
                                <option value="A louer">Louer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Kilométrage: <span>*</span> </label>
                            <input type="number" class="form-control" name="kilometers" id="inputEmail4"
                                placeholder="Kilométrage au compteur" required>
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Carosserie: <span>*</span></label>
                            <input type="text" class="form-control" name="body" required id="inputEmail4"
                                placeholder="Berline, Semi-berline...">
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Climatisation: <span>*</span></label>
                            <select type="text" class="form-control" name="air_conditionning" id="inputEmail4"
                                placeholder="Climatisation" required>
                                <option value="">Veuillez sélectionner</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Places: <span>*</span> </label>
                            <input type="number" class="form-control" name="places" id="inputEmail4"
                                placeholder="Nombre de places" required>
                        </div>

                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Volant: <span>*</span> </label>
                            <select type="text" class="form-control" name="handlebar" id="inputEmail4"
                                placeholder="Volant" required>
                                <option value="">Veuillez sélectionner</option>
                                <option value="Gauche">Gauche</option>
                                <option value="Droite">Droite</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="inputEmail4">Localisation: <span>*</span> </label>
                            <select type="text" class="form-control" name="location" id="inputEmail4"
                                placeholder="Localisation" required>
                                <option value="">Veuillez sélectionner</option>
                                <option value="Cotonou">Cotonou</option>
                                <option value="Abomey-Calavi">Abomey-Calavi</option>
                                <option value="Porto-Novo">Porto-Novo</option>
                                <option value="Parakou">Parakou</option>
                                <option value="Bohicon">Bohicon</option>
                                <option value="Ouidah">Ouidah</option>
                                <option value="Abomey">Abomey</option>
                                <option value="Malanville">Malanville</option>
                                <option value="Natitingou">Natitingou</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-6 col-sm-12">
                            <label for="">Description: <span>*</span></label>
                            <textarea name="description" id="" cols="58" required rows="5"
                                class="text-black fw-normal"></textarea>
                        </div>
                    </div> <br>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Image 1: <span>*</span></label>
                            <input type="file" name='pic1'>
                        </div>

                        <div class="col-6">
                            <label for="">Image 2:</label>
                            <input type="file" name='pic2'>
                        </div>
                    </div>

                    <div class="row mt-3">

                        <div class="col-6">
                            <label for="">Image 3:</label>
                            <input type="file" name='pic3'>
                        </div>
                        <div class="col-6">
                            <label for="">Image 4:</label>
                            <input type="file" name='pic4'>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Image 5:</label>
                            <input type="file" name='pic5'>
                        </div>

                        <div class="col-6">
                            <label for="">Image 6:</label>
                            <input type="file" name='pic6'>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Image 7:</label>
                            <input type="file" name='pic7'>
                        </div>
                    </div>


                    <button type='submit' class='btn btn-success mt-2 mx-auto' style='background:green; margin: auto'>
                        Ajouter
                    </button>

                </form>
            </div>
        </div>
    </div>
    <!--end add-->
</main>

@endsection