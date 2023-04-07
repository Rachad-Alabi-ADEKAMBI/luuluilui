@extends ('./layouts/app');


@section('content')
<main class="main">
    <div class="row mt-3">
        <div class="text text-center">
            <p>
                Bonjour <strong> {{ Auth::user()->username }}</strong>, content de vous revoir
            </p>
        </div>
    </div>


    <User />
</main>
@endsection