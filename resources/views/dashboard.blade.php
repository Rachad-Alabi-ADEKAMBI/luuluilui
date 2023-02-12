<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="main">

        <div class="center">
            <p>
                Bonjour mr <strong><?= $_SESSION['user'][
                    'username'
                ] ?></strong>, content de vous revoir
            </p>


            <button class='green' @click='displayAdd()' v-if='showCars'>
                Nouveau
            </button>
        </div>

        <!--show ads-->
        <table class="table" v-if='showCars'>
            <thead>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix</th>


            </thead>

            <tbody>

                <tr v-for='car in cars' :key='car.id'>
                    <td data-label="Id">
                        {{ car.id }}
                    </td>

                    <td data-label="Nom">
                        {{ car.name }}
                    </td>

                    <td data-label="Prix">
                        {{ format(car.price) }}
                    </td>

                    <td>
                        <button class="purple" @click='displayEdit(car.id)'>
                            Editer
                        </button>

                        <button class="red" @click='displayDelete(car.id)'>
                            Supprimer
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>
        <!--end show ads-->

        <!--show edit-->
        <form action="" v-if='showEdit'>
            <div class="close" @click='getCars()'>
                Fermer
            </div>
            <h2>
                Modification
            </h2>

            <div class="details">
                <label for="">Nom: <br>
                    <input type="text">
                </label>

                <label for="">Prix: <br>
                    <input type="number">
                </label>
            </div>

            <div class="details">
                <label for="">
                    <input type="text" class='message' name='description'>
                </label>
            </div>

            <div class="details">
                <label for="">Action: <br>
                    <select name="" id="">
                        <option value="A vendre">A vendre</option>
                        <option value="A louer"> A louer</option>
                    </select>
                </label>

                <label for="">Disponibilite: <br>
                    <select name="" id="">
                        <option value="Disponible">Disponible</option>
                        <option value="Non disponible">Non disponible</option>
                    </select>
                </label>
            </div>

            <button type='submit' class='green'>
                Modifier
            </button>

        </form>
        <!--end show edit-->


        <!--delete-->
        <form action="">
            <div class="close" @click='getCars()'>
                Fermer
            </div>

            <div class="" v-for='detail in details' :key='detail.id'>
                <h2>
                    Suppression
                </h2>

                <p>
                    Confirmez vous la suppression de
                    {{ detail.name }}
                </p>

                <div class="choices">
                    <button class='green' @click='deleteCar(detail.id)'>
                        Oui
                    </button>

                    <button class='red' @click='getCars()'>
                        Non
                    </button>
                </div>
            </div>
        </form>
        <!--end delete-->

        <!--add-->
        <form action="./api/api.php?action=newCar"' enctype="multipart/form-data" method=' POST'>

            <div class="close" @click='getCars()'>
                Fermer
            </div>

            <h2>
                Nouvel ajout
            </h2>

            <div class="details">
                <label for="">Nom: <br>
                    <input type="text" name='name' required>
                </label>


                <label for="">Marque: <br>
                    <select name="brand_name" id="" required>
                        <option value="">Veuillez selectionner</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                    </select>
                </label>


                <label for="">Prix: <br>
                    <input type="number" name='price' required>
                </label>
            </div>

            <div class="details">
                <label for="">Annee: <br>
                    <input type="text" name='year' required>
                </label>

                <label for="">Etat: <br>
                    <select name="rate" id="" required>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </label>

                <label for="">
                    Couleur: <br>
                    <input type="text" name='color' required>
                </label>
            </div>

            <div class="details">
                <label for="">Description: <br>
                    <input name="description" class='textarea' required id="">
                </label>
            </div>

            <div class="details">
                <label for="">Image 1: <br>
                    <input type="file" name='pic1'>
                </label>

                <label for="">Image 2: <br>
                    <input type="file" name='pic2'>
                </label>

                <label for="">Image 3: <br>
                    <input type="file" name='pic3'>
                </label>

                <label for="">Image 4: <br>
                    <input type="file" name='pic4'>
                </label>
            </div>

            <div class="details">
                <label for="">Action: <br>
                    <select name="category" id="" required>
                        <option value="">Veuillez selectionner</option>
                        <option value="A vendre">A vendre</option>
                        <option value="A louer"> A louer</option>
                    </select>
                </label>
            </div>

            <button type='submit' class='green'>
                Ajouter
            </button>

        </form>
        <!--end-->

    </main>
</x-app-layout>