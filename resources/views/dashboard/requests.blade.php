@include('Assets/admin_navbar')
<br><br>
<div class="container">
    <div class="row">
        <h2>All Requests</h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>item name</th>
            </tr>

            @foreach($requests as $request)
                <tr>
                    <td>{{$request->name}}</td>
                    <td>{{$request->email}}</td>
                    <td>{{$request->phone}}</td>
                    <td>{{$request->item_data->name}}</td>

                </tr>
            @endforeach




            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>item name</td>
            </tr>
        </table>


    </div>
</div>




@include('Assets/footer')
