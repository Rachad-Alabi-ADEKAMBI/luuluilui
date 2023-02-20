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


                    <div class="col-md-12 col-lg-8 mx-auto">
                       <div class="table-responsive">
                        <table class="table table-striped table-bordered">
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
                                    <th scope="row">{{ detail.id }}</th>
                                    <td>{{ detail.name }}</td>
                                    <td>{{ format(detail.price) }} XOF</td>
                                    <td>  <img :src='getImgUrl(detail.pic1)'
                                        width="120" height="60" alt=""></td>
                                    <td>
                                        <div class="icons">
                                            <i class="bi bi-eye icon" @click="goToAd(detail.id)" ></i>
                                        <i class="bi bi-pencil-square icon" @click="edit(detail.id)"></i>
                                        <i class="bi bi-trash icon" @click="deleteAd(detail.id)"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                       </div>
                    </div>

        </div>
         <!--end show ads-->
    </div>

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
            details:[],
            showMyAds : false,
            showAdd:false,
            showDelete: false,
            showEdit: false,

        }
    },
    mounted: function() {
       this.getMyAds();
    },
    methods: {
        getMyAds() {
            axios.get('http://127.0.0.1:8080/myAds').then(response =>
                this.details = response.data)
              this.showMyAds = true;
              this.showEdit = false;
              this.showDelete = false;
              this.showAdd = false;
        },
        edit(id) {
            axios.get('http://127.0.0.1/luuluilui/api/ad/'+id).then(response =>
                this.details = response.data)
              this.showMyAds = false;
              this.showEdit = true;
              this.showDelete = false;
              this.showAdd = false;
        },

        goToAd(id){
            window.location.replace('http://127.0.0.1:8080/ad/'+id);
        },
        deleteAd(id) {
            axios.get('http://127.0.0.1/luuluilui/api/ad/'+id).then(response =>
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
        return "http://127.0.0.1/luuluilui/assets/img/" + pic;
    },
    }
    }
    </script>