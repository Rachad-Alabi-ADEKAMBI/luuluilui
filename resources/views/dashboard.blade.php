@extends ('./layouts/app')


@section('content')
<main class="main">
    <div class="row mt-3">
        <div class="text text-center mb-3">
            <p>
                Bonjour <strong> {{ Auth::user()->username }}</strong>
            </p>
        </div>
    </div>

    <section>
        @if(session('success'))
        <div class="alert alert-success successMsg">
            <div class="top">
                <i class="fas fa-xmark" onclick="closeSuccessMsg()"></i>
            </div>
            <p class="text text-center">
                {{ session('success') }}
            </p>
        </div>
        @endif
    </section>


    <User :ads_number="{{ $user->ads }}"></User>


</main>
@endsection