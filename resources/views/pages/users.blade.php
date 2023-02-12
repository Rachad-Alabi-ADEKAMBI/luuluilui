@extends ('master');




@section ('content')


<div class="">
    <div class="main">
        <div class="container">
            <section class='section bg-light'>
                <h2>
                    Top annonceurs
                </h2>

                <div class="container ">
                    <div class="row">
                        @foreach($data as $seller)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="item">
                                <div class="item__top">
                                    <img src="http://127.0.0.1/frankoo/assets/img/blake-meyer-CRNbHjNaljo-unsplash.jpg"
                                        class='' alt="">
                                    <div class="info">{{$seller->id}}</div>
                                    <div class="bar">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="item__bottom">
                                    <h3>
                                        {{$seller->first_name}}
                                    </h3>
                                    <button>
                                        <a href="{{url('seller',$seller->id)}}">Voir</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

            </section>
        </div>
    </div>
</div>



@endsection