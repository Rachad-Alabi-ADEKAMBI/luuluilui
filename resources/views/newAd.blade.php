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
                                required value="caorsso">
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Marque <span>*</span></label>
                            <input type="text" class="form-control" name="brand_name" required id="inputEmail4"
                                placeholder="Modèle" value="artic">
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Prix <span>*</span></label>
                            <input type="text" class="form-control" name="price" id="inputEmail4" placeholder="Prix"
                                value="12000">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Année: <span>*</span></label>
                            <input type="number" class="form-control" name="year" id="inputEmail4" placeholder="Nom"
                                required value="1992">
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Etat: <span>*</span></label> <br>
                            <select name="rate" id="" required class="text-black fw-normal">
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Couleur: <span>*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Couleur"
                                value="perfect" name="color" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-6 col-sm-12">
                            <label for="">Description: <span>*</span></label>
                            <textarea name="description" id="" cols="58" required rows="5" class="text-black fw-normal"
                                value="greenie"></textarea>
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

                    <div class="col-3 mx-auto">
                        <label for="" class="mx-auto ">
                            Action:
                            <select name="category" id="" required class="text-black fw-normal">
                                <option value="A vendre">A vendre</option>
                                <option value="A louer"> A louer</option>
                            </select>
                        </label>
                    </div> <br>

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