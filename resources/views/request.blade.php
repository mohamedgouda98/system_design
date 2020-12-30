@include('Assets/navbar')

<br><br>
<h4 style="text-align: center"> ADD New Item</h4>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach

            @endif

            <form method="post" action="{{route('add.request')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Your Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Your Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Your Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>

                <input type="hidden" name="item_id" value="{{$id}}">

                <button type="submit" class="btn btn-primary">Make Request</button>

            </form>

        </div>
    </div>

</div>




@include('Assets/footer')
