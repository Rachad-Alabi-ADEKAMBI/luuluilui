<template>
    <!--show menu-->
    <div class="row">
        <div class="col-md-12 lg-6 mx-auto text-center">
            <div class="buttons">
                <button class='btn btn-primary' @click='getAllAds()'
                    v-if="showAllUsers">
                           Annonces
                </button>

                <button class='btn btn-primary' @click='getAllUsers()'
                v-if="showAllAds">
                    Utilisateurs
                </button>
            </div>
        </div>
    </div>

    <!--show ads-->
    <div class="row" v-if="showAllAds">
        <h1 class="title">
                    Toutes les annonces
                </h1>

                <div class="col-md-12 col-lg-8 mx-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Annonce</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in details" :key="detail.id">
                                <th scope="row"></th>
                                <td>{{ detail.name }}</td>
                                <td>{{ format(detail.price) }} XOF</td>
                                <td><img src="http://127.0.0.1/frankoo/assets/img/sven-d-a4S6KUuLeoM-unsplash.jpg"
                                    width="120" height="60" alt=""></td>
                                <td>
                                    <i class="bi bi-eye" @click="goToAd(detail.id)" ></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

    </div>
     <!--end show ads-->

                <!--show users-->
              <div class="row"   v-if="showAllUsers">
                <h1 class="title">
                    Tous les Utilisateurs
                </h1>

                <div class="col-md-12 col-lg-8 mx-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom et prenoms</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in details" :key="detail.id">
                                <th scope="row"></th>
                                <td>{{ detail.first_name }} {{ detail.last_name }}</td>
                                <td><img src="http://127.0.0.1/frankoo/assets/img/pdg.jpg"
                                    width="120" height="60" alt=""></td>
                                <td>
                                    <i class="bi bi-eye" @click="goToUser(detail.id)" ></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

              </div>
                <!--end show ads-->
    </template>

    <script>
       export default {
      name: 'Ads2',
      props: {

      },
      data() {
        return {
            details:[],
            showAllAds : false,
            showAllUsers: false,
            showAdd: false,
            showDelete: false,
            showEdit: false,

        }
    },
    mounted: function() {
       this.getAllAds();
    },
    methods: {
        getAllAds() {
            axios.get('http://127.0.0.1/frankoo/api/allCars').then(response =>
                this.details = response.data)
              this.showAllAds = true;
              this.showAllUsers = false;
        },

        getAllUsers() {
            axios.get('http://127.0.0.1/frankoo/api/users').then(response =>
                this.details = response.data)
                this.showAllAds = false;
              this.showAllUsers = true;
        },
        format(num){
        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        return res;
    },
        getImgUrl(pic) {
        return "http://127.0.0.1/frankoo/assets/img/" + pic;
    },
    goToAd(id){
        redirect('http://127.0.0.1/item?ad='+id);
    }
    }
    }
    </script>