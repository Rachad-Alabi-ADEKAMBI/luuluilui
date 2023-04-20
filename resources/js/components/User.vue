<template>
    <!--start-->
    <div class="container" v-if="showMyAds">
        <div class="row">
            <div class="col-md-12 lg-6 mx-auto text-center">
                <div class="buttons">
                    <a class='btn btn-primary' href="/newAd">
                        Nouvelle annonce
                    </a>
                </div>
            </div>
        </div>


        <div class="row mt-2" v-if="showSearch">
            <div class="search-bar mx-auto text-center">
                <label for="">Recherche par mot clé <i class="bi bi-x ml-1 pt-7 bold" @click="closeSearch()"></i><br>
                    <input type="text" v-model="searchKey">
                </label>
            </div> <br>
        </div>

        <div class="row" v-if="showAll && ads.length >0">
            <div class="col-3 text-center mx-auto search-icon" @click="displaySearch()" v-if="showSearchBtn">
                <i class="bi bi-search"></i>
            </div>
        </div>




        <!--show ads-->
        <div class="row mt-2">
            <h1 class="title">
                Mes annonces
            </h1>


            <div class="" v-if="ads.length == 0">
                <p class="text text-center">
                    Vous n'avez publié aucune annonce pour l'instant
                </p>
            </div>

            <div class="row mt-4"  v-if="ads.length > 0">

                <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="table-responsive-md">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ad in ads" :key="ad.id">
                                    <td data-label=''>
                                        {{ ad.id }}
                                    </td>
                                    <td data-label='Nom'>
                                        {{ ad.name }}
                                    </td>

                                    <td data-label='Id' scope="row">
                                        <img :src='getImgUrl(ad.pic1)' class="table-img" width="90" height="40">
                                    </td>
                                    <td data-label='Prix'>
                                        {{ format(ad.price) }} XOF
                                    </td>
                                    <td>
                                        <i class="fas fa-eye fw-bold mr-2" @click='goToAd(ad.id)'></i>
                                        <i class="fas fa-pen fw-bold mr-2" @click='edit(ad.id)'></i>
                                        <i class="fas fa-trash fw-bold mr-2" @click='deleteAd(ad.id)'></i>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end main-->





    <!--start edit-->
    <div class="container" v-if="showEdit">
        <div class="row">
            <div class="col-md-12 col-lg-6 mx-auto p-3 bg-light text-center">
                <form action="http://127.0.0.1/luuluilui/api/api.php?action=newCar" enctype="multipart/form-data"
                    method='POST' class="mx-auto">

                    <div class="close text-center" @click='getMyAds()'>
                        <i class="bi bi-x-lg"></i>
                    </div>

                    <h2 class="subtitle">
                        Modifier annonce
                    </h2>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Nom <span>*</span> </label>
                            <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Nom"
                                required>
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Marque <span>*</span></label>
                            <input type="text" class="form-control" name="brand_name" required id="inputEmail4"
                                placeholder="Modèle">
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Prix <span>*</span></label>
                            <input type="text" class="form-control" name="price" id="inputEmail4" placeholder="Prix">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="inputEmail4">Année: <span>*</span></label>
                            <input type="number" class="form-control" name="year" id="inputEmail4" placeholder="Nom"
                                required>
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Etat: <span>*</span></label> <br>
                            <select name="rate" id="" required>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-lg-3">
                            <label for="inputEmail4">Couleur: <span>*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Couleur" name="color"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="">Description: <span>*</span></label>
                            <textarea name="description" id="" cols="58" required rows="5"></textarea>
                        </div>
                    </div> <br>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Image 1: <span>*</span></label>
                            <input type="file" name='pic1' required>
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
                    </div>

                    <div class="col-3 mx-auto text-center">
                        <label for="" class="mx-auto text-center">
                            Action:
                            <select name="category" id="" required>
                                <option value="">Veuillez selectionner</option>
                                <option value="A vendre">A vendre</option>
                                <option value="A louer"> A louer</option>
                            </select>
                        </label>
                    </div> <br>

                    <button type='submit' class='btn btn-success mt-2' id="btn-success" style='background-color: green'>
                        Ajouter
                    </button>

                </form>
            </div>
        </div>
    </div>
    <!--end edit-->


    <!--delete start-->
    <div class="container" v-if="showDelete">
        <div class="row">
            <div class="col-6 mx-auto text-center bg-light mt-4">
                <form action="">
                    <div class="close" @click='getMyAds()'>
                        <i class="bi bi-x-lg text-center"></i>
                    </div>

                    <div class="" >
                        <h2 class="subtitle">
                            Suppression
                        </h2>

                        <p class="text text-center">
                            Confirmez vous la suppression de
                            <span> </span> ?
                        </p>

                        <div class="choices">
                            <button class='btn btn-success m-2' @click="getMyAds()">
                                Oui
                            </button>

                            <button class='btn btn-danger m-2' @click="getMyAds()">
                                Non
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--delete end-->

</template>

<script>
export default {
    name: 'User',
    props: {

    },
    data() {
        return {
            ads: [],
            showMyAds: false,
            showAdd: false,
            showDelete: false,
            details: [],
            showEdit: false,
            searchKey: '',
            showSearch: false,
            showAll: false,
            showSearchBtn: false,

        }
    },
    mounted: function() {
        this.getMyAds();
    },
    computed: {
        filteredItems() {
            return this.ads.filter(ad => {
                return ad.searchKey.toLowerCase().includes(this.searchKey.toLowerCase());
            })
        }
    },

    methods: {
        getMyAds() {
            axios.get('/myAds')
                .then(response => {
                    this.ads = response.data;
                    console.log(this.ads); // log the response data to the console
                });

            this.showMyAds = true;
            this.showEdit = false;
            this.showDelete = false;
            this.showSearchBtn = true;
            this.showAdd = false;
            this.showAll = true;
            this.showSearch = false;
        },
        displaySearch() {
            this.showAll = false;
            this.showSearch = true;
        },
        closeSearch() {
            this.showAll = true;
            this.showSearch = false;
        },
        edit(id) {
            axios.get('/ad/' + id).then(response =>
                this.details = response.data)
            this.showMyAds = false;
            this.showEdit = true;
            this.showDelete = false;
            this.showAdd = false;
        },

        goToAd(id) {
            window.location.replace('/adView/' + id);
        },
        deleteAd(id) {
            axios.get('/ad/' + id).then(response =>
                this.details = response.data)
            this.showMyAds = false;
            this.showEdit = false;
            this.showDelete = true;
            this.showAdd = false;
        },

        format(num) {
            let res = new Intl.NumberFormat('fr-FR', {
                maximumSignificantDigits: 3
            }).format(num);
            return res;
        },
        getImgUrl(pic) {
           // return "https://luuluilui.fr/public/img/" + pic;
            return "https://127.0.0.1/luuluilui/public/ads/" + pic;
        },
    }
}
</script>