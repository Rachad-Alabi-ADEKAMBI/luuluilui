<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <main class="main">

            <div class="text text-center">
                <p>
                    Bonjour mr <strong> {{ Auth::user()->name }}</strong>, content de vous revoir
                </p>


                <button class='btn btn-primary' @click='displayAdd()' v-if='showCars'>
                    Utilisateurs
                </button>
            </div>

            <!--show ads-->
            <h1>
                Toutes les annonces
            </h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end show ads-->

            <!--show ads-->
            <h1>
                Toutes les utilisateurs
            </h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom et prénoms</th>
                            <th scope="col">Annonces</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end show ads-->

        </main>
    </x-slot>


</x-app-layout>