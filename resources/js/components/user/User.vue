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
            details: [],
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