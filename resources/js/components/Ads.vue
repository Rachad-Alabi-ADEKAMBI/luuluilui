<template>
     <div class="main" >
    <div class='buttons mt-3' v-if="showFilters">
        <button class="btn btn-primary"  @click='getAllCars()'>
            Tout voir
        </button>
        <button @click='getToSell()' class="btn btn-primary">
            A vendre
        </button>

        <button @click='getToRent()' class="btn btn-primary">
            A louer
        </button>

            <i class="bi bi-search mt-4 search-icon" @click="displaySearch()"></i>
    </div>

    <div class="mx-auto text-center pt-3" v-if="showSearch">
        <input type="text" placeholder="Nom ou modèle" v-model="searchText">
        <i class="bi bi-x search-icon " @click="getAllCars()"></i>
    </div>

    <section class='section bg-light pt-2' v-if='showSearch'>
        <h2 class="subtitle">
            RESULTATS DE LA RECHERCHE
        </h2>

        <div class="container mt-3 ">
            <div class="row">

                <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in filteredItems' :key='car.id'>
                    <div class="item mx-auto">
                        <div class="item__top">
                            <img :src="getImgUrl(car.pic1)" class='' alt="">
                            <div class="info"> {{ car.category }} </div>
                            <div class="bar">
                                <p></p>
                            </div>
                        </div>

                        <div class="item__bottom">
                            <h3>
                                {{ car.name }}
                            </h3>

                            <p class="description">
                                {{ reduceString( car.description ) }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ format(car.price)}} XOF
                            </p>

                            <button  class="btn btn-primary" @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class='section bg-light pt-2' v-if='showToSell'>
        <h2 class="subtitle">
            EN VENTE
        </h2>

        <div class="container mt-3 ">
            <div class="row">

                <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in details' :key='car.id'>
                    <div class="item mx-auto">
                        <div class="item__top">
                            <img :src="getImgUrl(car.pic1)" class='' alt="">
                            <div class="info"> {{ car.category }} </div>
                            <div class="bar">
                                <p></p>
                            </div>
                        </div>

                        <div class="item__bottom">
                            <h3>
                                {{ car.name }}
                            </h3>

                            <p class="description">
                                {{ reduceString( car.description ) }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ format(car.price)}} XOF
                            </p>

                            <button  class="btn btn-primary" @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section v-if='showToRent' class="mt-4 pt-2"  >
        <h2 class="subtitle">
            EN LOCATION
        </h2>

        <div class="container mt-3">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" v-for='car in details' :key='car.id'>
                    <div class="item">
                        <div class="item__top">
                            <img :src="getImgUrl(car.pic1)" class='' alt="">
                            <div class="info"> {{ car.category }} </div>
                            <div class="bar">
                                <p></p>
                            </div>
                        </div>

                        <div class="item__bottom">
                            <h3>
                                {{ car.name }}
                            </h3>

                            <p class="description">
                                {{ car.description }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ format(car.price)}} XOF
                            </p>

                            <button  class="btn btn-primary" @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if='showAllCars'>
        <h1 class="title" >
            Tous les véhicules
        </h1>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" v-for='car in details' :key='car.id'>
                    <div class="item">
                        <div class="item__top">
                            <img :src="getImgUrl(car.pic1)" class='' alt="">
                            <div class="info"> {{ car.category }} </div>
                            <div class="bar">
                                <p></p>
                            </div>
                        </div>

                        <div class="item__bottom">
                            <h3>
                                {{ car.name }}
                            </h3>

                            <p class="description">
                                {{ car.description }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ format(car.price)}} XOF
                            </p>

                            <button class="btn btn-primary"  @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</template>

<script>
   export default {
  name: 'Ads',
  props: {
    msg: String
  },
  data() {
    return {
        cars: [],
        details:[],
        showCars : false,
        showAdd: false,
        showDelete: false,
        showEdit: false,
        showAllCars: false,
        showToRent: false,
        showToSell: false,
        showSearch: false,
        showFilters: false,
        footerCars: [],
        searchText: ''

    }
},
mounted: function() {
   this.getAllCars();
},
computed: {
            filteredItems() {
                this.showAll = false;
                this.showSearch = true;
                return this.details.filter(ad => {
                    return ad.name.toLowerCase().includes(this.searchText.toLowerCase()) &&
                        ad.brand_name.toLowerCase().includes(this.searchText.toLowerCase())
                })
            }
        },
methods: {
    displaySearch(){
        this.showFilters = false;
        this.showSearch = true;
        this.showAllCars = false;
            this.showToRent = false;
            this.showToSell = false;
    },

    getToSell(){
        axios.get('http://127.0.0.1:8000/adsApi').then(response =>
            this.details = response.data);
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = false;
            this.showToSell = true;

    },
    getAllCars(){
        axios.get('http://127.0.0.1:8000/adsApi').then(response =>
            this.details = response.data);
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = false;
            this.showToSell = true;
            this.showFilters = true;
            this.showSearch = false;
    },
    getToRent(){
        axios.get('https://luuluilui.fr/api/carsToRent').then(response =>
            this.details = response.data);
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = true;
            this.showToSell = false;
    },
    getCar(id){
        window.location.replace('https://luuluilui.fr/ad/'+id);
     //  window.location.replace('https://127.0.0.1:8001/ad/'+id);
    },
    reduceString(str) {
    if (str.length > 20) {
      return str.substring(0, 20) + '...';
    } else {
      return str;
    }
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