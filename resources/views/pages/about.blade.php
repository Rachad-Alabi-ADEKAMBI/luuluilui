@extends ('layouts.app', ['title' => 'A propos | ' .config('app.name')])


@section ('content')
<p>Built with Brasdfer</p>
<h2>
    Page a propos
</h2>
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur possimus facere perspiciatis natus, sed unde et
mollitia vero modi beatae repellendus. Non veniam, quos amet temporibus nostrum vel ullam laboriosam.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, ipsa, dolorem animi qui incidunt vel ut neque laboriosam
autem sed iste consequatur consectetur magnam natus esse velit nam? Tenetur, ipsam.
<p>Revenir à la <a href="{{ route('home') }}">page d'accueil</a></p>
@endsection