<container class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="" class="logo" width='80' height='40'>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mx-auto text-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto   ">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ads">Annonces</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/sellers">vendeurs</a>
                </li>
            </ul>
        </div>

        <div class="mr-0">

            <form class="form-inline mr-0" action="/login">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
            </form>
        </div>
    </nav>
</container>