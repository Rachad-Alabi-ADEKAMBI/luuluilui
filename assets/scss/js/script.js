
const { createApp } = Vue

createApp({
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
        footerCars: []

    }
},
mounted: function() {
   this.getCars(); //admin
   this.getAllCars();
},
methods: {
    getCars() {
       axios.get('http://127.0.0.1/frankobizness/api/cars').then(response =>
            this.cars = response.data);
        alert('ok');
    },
    displayAdd(){
        this.showBtn = false;
        this.showCars = false;
        this.showAdd = true
    },
    displayDelete(){
        axios.get('http://127.0.0.1/frankobizness/api/car/').then(response =>
        this.details = response.data);
        this.showDelete = true,
        this.showAdd = false
        this.showCars = false;
        this.showEdit = false;
    },
    displayEdit(id){
        this.showDelete = false,
        this.showAdd = false
        this.showCars = false;
        this.showEdit = true;
    },

    getAllCars() {
        axios.get('http://127.0.0.1/frankobizness/api/allCars').then(response =>
            this.details = response.data)
            this.showAllCars = true;
            this.showToRent = false;
            this.showToSell =false
    },
    getToSell(){
        axios.get('http://127.0.0.1/frankobizness/api/carsToSell').then(response =>
            this.details = response.data);
            this.showHome = false;
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = false;
            this.showToSell = true;
    },
    getToRent(){
        axios.get('http://127.0.0.1/frankobizness/api/carsToRent').then(response =>
            this.details = response.data);
            this.showHome = false;
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = true;
            this.showToSell = false;
    },
    getCar($id){
        window.location.replace('././index.php?action=car&id='+$id)
    },

    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "public/img/" + pic;
},
}
  }).mount('#app')