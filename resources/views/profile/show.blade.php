@extends ('./layouts/app')

@section ('content')


<main class="main">
    <!--start add-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mt-3 mb-3 mx-auto p-5 rounded-2 bg-secondary text-left text-white fw-bold">
                <form action="editUser" method="POST" enctype="multipart/form-data" class="mx-auto">
                    @csrf

                    <a href="/dashboard" class="close text-right mr-0">
                        <i class="bi bi-x-lg text-right"></i>
                    </a>


                    <h2 class="subtitle">
                        Profil
                    </h2>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Prénoms: </label>
                            <input type="text" class="form-control" name="first_name" id="inputEmail4"
                                value='{{ $data->first_name }}'>
                        </div>

                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Nom: </label>
                            <input type="text" class="form-control" name="last_name" id="inputEmail4"
                                value='{{ $data->last_name }}'>
                        </div>
                    </div> <br>

                    <div class="row">

                        <div class="form-group col-md-12 col-lg-12">
                            <label for="inputEmail4">Numéro de tél: </label>
                            <input type="text" class="form-control" name="phone_number" id="inputEmail4"
                                value='{{ $data->phone_number }}'>
                        </div>
                    </div>
                    <br>

                    <div class="row text-center">
                        <button type='submit' class='btn btn-success mt-2 mx-auto'
                            style='background:green; margin: auto; width: 120px'>
                            Modifier
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--end add-->
</main>


@endsection