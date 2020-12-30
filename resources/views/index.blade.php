@include('Assets/navbar')

<br><br>
<h4 style="text-align: center"> Search With Names</h4>
<br>
<!-- Start Search -->
<div class="container">
    <div class="row">

        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif

        <div class="col-md-12">
        <form method="post" action="{{route('search')}}">
            @csrf

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">City</label>
                    </div>
                    <select name="city_id" class="custom-select" id="inputGroupSelect01">
                        @foreach($cities as $city)
                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    </div>
                    <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>


            <button type="submit" class="btn btn-primary">Search</button>
        </form>
            <br><br>
        </div>
    </div>

</div>

<!-- Cards -->

<div class="container">
    <div class="row">

        @foreach($items as $item)

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/'. $item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2d3748">{{$item->name}}</h5>
                        <p class="card-text">{{substr($item->body, 0 ,20)}}</p>
                        <h6>Color: {{$item->color}}</h6>
                        <h6>Wight: {{$item->wight}}</h6>
                        <a href="{{route('request', [$item->id])}}" class="btn btn-primary">Make Request</a>
                    </div>
                </div>
            </div>

        @endforeach


    </div>
</div>

@include('Assets/footer')
