<template>
    <!--show menu-->

    <div class="container" v-if="showMyAds">
        <div class="row">

            <div class="col-md-12 lg-6 mx-auto text-center">
                <div class="buttons">

                    <button class='btn btn-primary' @click='add()'>
                        Nouvelle annonce
                    </button>
                </div>
            </div>
        </div>

        <!--show ads-->
        <div class="row">
            <h1 class="title">
                        Mes annonces
                    </h1>


                   <div class="" v-if="ads.length == 0">
                        <p class="text text-center">
                            Vous n'avez publié aucune annonce pour l'instant
                        </p>
                 </div>


            <div class="row mt-2" v-if="showSearch" >
                <div class="search-bar mx-auto text-center">
                    <label for="">Recherche par mot clé  <i class="bi bi-x ml-1 pt-7 bold" @click="closeSearch()"></i><br>
                        <input type="text" v-model="searchKey">
                    </label>
                </div> <br>

                <div class="list">
                                <div class="" v-if="filteredItems.length != 0">
                                    <h3 class="text-center">Nom et prenoms</h3>
                                    <ul>
                                        <li v-for="ad in filteredItems" :key="ad.id">
                                            {{ ad.id }}
                                        </li>
                                    </ul>

                                </div>



                                <div class="" v-if='filteredItems.length === 0'>
                                    <p class="text-center pt-5 mt-5">
                                        Aucun résultat
                                    </p>
                                </div>
                </div>
              </div>

              <div class="row" v-if="showAll">
                <div class="col-3 text-center mx-auto search-icon" @click="displaySearch()" v-if="showSearchBtn">
                                <i class="bi bi-search"></i>
                    </div>
              </div>

        <div class="row" v-if="showAll">

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
                                    <img :src='getImgUrl(ad.pic1)'
                                    alt="" class="table-img"
                                    width="90" height="40" >
                                </td>
                                <td data-label='Prix'>
                                 {{ format(ad.price) }} XOF
                                </td>
                                <td>
                                    <i class="fas fa-eye fw-bold mr-2" @click='viewOnline(ad.id)'></i>
                                    <i class="fas fa-pen fw-bold mr-2" @click='editAd(ad.id)'></i>
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
         <!--end show ads-->

    <div class="container" v-if="showAdd">
        <div class="row">
            <div class="col-md-12 col-lg-6 mx-auto p-3 bg-light text-center">
                <form action="http://127.0.0.1/luuluilui/api/api.php?action=newCar"
                          enctype="multipart/form-data" method='POST' class="mx-auto">

                <div class="close text-center" @click='getMyAds()'>
                    <i class="bi bi-x-lg"></i>
                </div>

                <h2 class="subtitle" >
                    Nouvel ajout
                </h2>

                <div class="row">
                    <div class="form-group col-md-12 col-lg-6">
                        <label for="inputEmail4">Nom</label>
                        <input type="text" class="form-control" name="name"
                        id="inputEmail4" placeholder="Nom" required>
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Marque</label>
                        <input type="text" class="form-control" name="brand_name"
                        required id="inputEmail4"
                         placeholder="Modèle">
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Prix</label>
                        <input type="text" class="form-control" name="price" id="inputEmail4"
                         placeholder="Price">
                      </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-md-12 col-lg-6">
                        <label for="inputEmail4">Année: </label>
                        <input type="number" class="form-control"
                           name="year" id="inputEmail4" placeholder="Nom" required>
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Etat:</label> <br>
                        <select name="rate" id="" required>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Couleur: </label>
                        <input type="text" class="form-control" id="inputEmail4"
                         placeholder="Price" name="color" required >
                      </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Description: </label>
                        <textarea name="description" id="" cols="58"  required rows="5"></textarea>
                    </div>
                </div> <br>

                <div class="row mt-3">
                    <div class="col-4">
                        <input type="file" name='pic1'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic2'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic3'>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <input type="file" name='pic4'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic5'>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 ml-0">
                        <label for="">
                            Action:
                            <select name="category" id="" required>
                                <option value="">Veuillez selectionner</option>
                                <option value="A vendre">A vendre</option>
                                <option value="A louer"> A louer</option>
                            </select>
                        </label>
                    </div>
                </div>  <br>

                <button type='submit' class='btn btn-success' id="btn-success">
                    Ajouter
                </button>

            </form>
            </div>
        </div>
    </div>

    <div class="container" v-if="showEdit">
            <div class="row">
            <div class="col-md-12 col-lg-6 mx-auto p-3 bg-light text-center">
                <form action="{{ url('/edit') }}" v-for="detail in details" :key="detail.id"
                          enctype="multipart/form-data" method='POST' class="mx-auto">

                <div class="close text-center" @click='getMyAds()'>
                    <i class="bi bi-x-lg"></i>
                </div>

                <h2 class="subtitle" >
                    Modifier {{ detail.name }}
                </h2>

                <div class="row">
                    <div class="form-group col-md-12 col-lg-6">
                        <label for="inputEmail4">Nom</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nom">
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Marque</label>
                        <input type="text" class="form-control" id="inputEmail4"
                         placeholder="Modèle">
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Prix</label>
                        <input type="text" class="form-control" id="inputEmail4"
                         placeholder="Price">
                      </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-md-12 col-lg-6">
                        <label for="inputEmail4">Année: </label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nom">
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Etat:</label> <br>
                        <select name="rate" id="" required>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 col-lg-3">
                        <label for="inputEmail4">Couleur: </label>
                        <input type="text" class="form-control" id="inputEmail4"
                         placeholder="Price">
                      </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Description: </label>
                        <textarea name="description" id="" cols="55" rows="5"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <input type="file" name='pic1'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic2'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic3'>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <input type="file" name='pic4'>
                    </div>

                    <div class="col-4">
                        <input type="file" name='pic5'>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 ml-0">
                        <label for="">
                            Action:
                            <select name="category" id="" required>
                                <option value="">Veuillez selectionner</option>
                                <option value="A vendre">A vendre</option>
                                <option value="A louer"> A louer</option>
                            </select>
                        </label>
                    </div>
                </div>

                <button type='submit' class='btn btn-success'>
                    Modifier
                </button>

            </form>
            </div>
        </div>
    </div>

    <div class="container" v-if="showDelete">
       <div class="row">
        <div class="col-6 mx-auto text-center bg-light mt-4">
            <form action="" v-if='showDelete'>
                <div class="close" @click='getMyAds()'>
                    <i class="bi bi-x-lg text-center"></i>
                </div>

                <div class="" v-for='detail in details' :key='detail.id'>
                    <h2 class="subtitle">
                        Suppression
                    </h2>

                    <p class="text text-center">
                        Confirmez vous la suppression de
                        <span> {{ detail.name }}</span> ?
                    </p>

                    <div class="choices">
                        <a class='btn btn-danger m-2' @click='(detail.id)'
                        href="{{ url('/dahboard')}}">
                            Oui
                        </a>

                        <a class='btn btn-primary m-2' @click='(detail.id)'
                        href="{{ url('/dahboard')}}">
                            Non
                        </a>
                    </div>
                </div>
            </form>
        </div>
       </div>
    </div>

    </template>

    <script>
       export default {
      name: 'User',
      props: {

      },
      data() {
        return {
            ads:[],
            showMyAds : false,
            showAdd:false,
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
            axios.get('http://127.0.0.1:8000/myAds').then(response =>
                this.ads = response.data)
              this.showMyAds = true;
              this.showEdit = false;
              this.showDelete = false;
              this.showSearchBtn = true;
              this.showAdd = false;
              this.showAll = true;
              this.showSearch = false;
        },
        displaySearch(){
            this.showAll = false;
            this.showSearch = true;
        },
        closeSearch(){
            this.showAll = true;
            this.showSearch = false;
        },
        edit(id) {
            axios.get('https://immobiierbenin.com/api/ad/'+id).then(response =>
                this.details = response.data)
              this.showMyAds = false;
              this.showEdit = true;
              this.showDelete = false;
              this.showAdd = false;
        },

        goToAd(id){
            window.location.replace('https://immobiierbenin.com/ad/'+id);
        },
        deleteAd(id) {
            axios.get('https://immobiierbenin.com/ad/'+id).then(response =>
                this.details = response.data)
              this.showMyAds = false;
              this.showEdit = false;
              this.showDelete = true;
              this.showAdd = false;
        },
        add() {
              this.showMyAds = false;
              this.showEdit = false;
              this.showDelete = false;
              this.showAdd = true;
        },

        format(num){
        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        return res;
    },
        getImgUrl(pic) {
        return "https://luuluilui.fr/public/img/" + pic;
    },
    }
    }
    </script>