@include('Assets/admin_navbar')
<br><br>
<h4 style="text-align: center"> ADD New Item</h4>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                   {{session('message')}}
                </div>
            @endif


                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach

                @endif

            <form method="post" action="{{route('add_item')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Item Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">City select</label>
                    <select name="city_id" class="form-control" id="exampleFormControlSelect1">

                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Item Color</label>
                    <input type="text" name="color" class="form-control" placeholder="Enter Color">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Item Wight</label>
                    <input type="text" name="wight" class="form-control" placeholder="Enter Wight">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Item Body</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Item Image </label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <button type="submit" class="btn btn-primary">Add Item</button>

            </form>

        </div>
    </div>

</div>



@include('Assets/footer')
