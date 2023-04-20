@extends ('./layouts/app')


@section('content')
<main class="main">
    <div class="row mt-3">
        <div class="text text-center mb-3">
            <p>
                Bonjour <strong> {{ Auth::user()->username }}</strong>, content de vous revoir
            </p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <User />
</main>
@endsection