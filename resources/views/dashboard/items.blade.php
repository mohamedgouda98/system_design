@include('Assets/admin_navbar')
<br><br><br>
<!-- Cards -->

<div class="container">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

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

                    <form method="post" action="{{route('item.delete', [$item->id] )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach




    </div>
</div>



@include('Assets/footer')
