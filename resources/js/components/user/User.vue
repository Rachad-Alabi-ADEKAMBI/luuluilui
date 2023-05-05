<template>
    <!--start-->
    <div class="container">
        <div class="row mt-3" v-if="showAddBtn">
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


        <!--show ads-->
        <div class="row mt-3"  v-if="showMyAds">
            <h1 class="title">
                Mes annonces <i class="bi bi-search"  @click="displaySearch()" v-if="details.length > 0"></i>
            </h1>


            <div class="" v-if="details.length == 0">
                <p class="text text-center">
                    Vous n'avez publié aucune annonce pour l'instant
                </p>
            </div>

            <div class="row mt-4"  v-if="details.length > 0">

                <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ad in details" :key="ad.id">
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
        <!--end show ads-->

        <!--show results-->
        <div class="row mt-3"  v-if="showResults">
            <h1 class="title">
                Resultats de la recherche
            </h1>


            <div class="" v-if="filteredItems.length == 0">
                <p class="text text-center">
                   Aucun résultat pour cette recherche
                </p>
            </div>

            <div class="row mt-4"  v-if="filteredItems.length > 0">

                <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="table table-responsive">
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
                                <tr v-for="ad in filteredItems" :key="ad.id">
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
        <!--end results-->


    </div>
    <!--end main-->

</template>

<script>
export default {
    name: 'User',
    props: {

    },
    data() {
        return {
            showMyAds: false,
            showAddBtn: false,
            details: [],
            searchKey: '',
            showSearch: false,
            showResults: false,
            showAll: false,
            showSearchBtn: false,

        }
    },
    mounted: function() {
        this.getMyAds();
    },
    computed: {
        filteredItems()  {
            this.showResults = true;
                   return this.details.filter(detail => {
                    return detail.name.toLowerCase().includes(this.searchKey.toLowerCase())
                })
            }
    },

    methods: {
        getMyAds() {
            axios.get('/myAds')
                .then(response => {
                    this.details = response.data;
                });
            this.showAddBtn = true;
            this.showMyAds = true;
            this.showResults = false;
            this.showSearchBtn = true;
            this.showAdd = false;
            this.showAll = true;
            this.showSearch = false;
        },
        displaySearch() {
            this.showAll = false;
            this.showSearch = true;
            this.showMyAds = false;
            this.showAddBtn = false;
            this.showResults = true;
        },
        closeSearch() {
            this.showMyAds = true;
            this.showSearch = false;
            this.showResults = false;
            this.showAddBtn = true;
        },
        edit(id) {
            window.location.replace('editView/' + id)
        },
        deleteAd(id){
            window.location.replace('deleteView/' + id)
        },

        goToAd(id) {
            window.location.replace('/adView/' + id);
        },

        format(num) {
            let res = new Intl.NumberFormat('fr-FR', {
                maximumSignificantDigits: 3
            }).format(num);
            return res;
        },
        getImgUrl(pic) {
            return "img/ads/" + pic ;
        },
    }
}
</script>