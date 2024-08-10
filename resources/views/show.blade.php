<x-layout>
    <body>
        <h1>students information</h1>
        <div>
            @if(session()->has('success'))
            <div> 
                {{session('success')}}
            </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('product.create')}}"> create a product</a>
            </div>
            <table border="1">
                <tr>
                    <th>FirstName</th>
                    <th>MiddleName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>PhoneNumber </th>
                    <th>Gender </th>
                    <th>Age </th>
                    <th>School </th>
                    <th>Address </th>
                </tr>
                @foreach($products as $product)
                <tr> 
                    <td>{{$product->id}}</td>
                    <td>{{$product->firstName}}</td>
                    <td>{{$product->middleName}}</td>
                    <td>{{$product->lastName}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->PhoneNumber}}</td>
                    <td>{{$product->gender}}</td>
                    <td>{{$product->age}}</td>
                    <td>{{$product->school}}</td>
                    <td>{{$product->address}}</td>
                    <td>
                        <a href="{{route('product.edit' , ['product'=>$product])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                             @csrf
                             @method('delete')
                         <input type="submit" value="Delete" />
                     </form>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>