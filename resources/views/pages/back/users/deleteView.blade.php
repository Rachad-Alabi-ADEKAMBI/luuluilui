@extends ('./layouts/app')

@section('title')
Supprimer annonce
@endsection

@section ('content')

<div class="">
    <div class="main">
        <div class="container mt-2 bg-light about">
            <div class="row">
                <div class="col-6 mx-auto text-center bg-light mt-4">
                    <divm action="{{ url('delete', $ad->id) }}">
                        <a class="close" href="/dashboard">
                            <i class="bi bi-x-lg text-center"></i>
                        </a>

                        <div class="">
                            <h2 class="subtitle">
                                Suppression
                            </h2>



                            <p class="text text-center text-black">
                                Confirmez vous la suppression de
                                <span> {{ $ad->name }}</span> ?
                            </p>

                            <div class="choices">
                                <a class='btn btn-success m-2' type="submit"
                                    style="background-color: green; color: white" href="{{url('delete',$ad->id)}}">
                                    Oui
                                </a>

                                <a href="/dashboard" class='btn btn-danger m-2'
                                    style="background-color: #bc111d; color: white">
                                    Non
                                </a>
                            </div>

                        </div>
                    </divm>
                </div>
            </div>
        </div>

        </section>
    </div>
</div>


@endsection