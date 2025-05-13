<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Product Dashboard</h2>
      @foreach ($categories as $category)
    <h2>{{$category->category_name}}</h2>
    @if ($category->products->count())
    <table border="2" cellpadding="5">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>price</th>
        <tr>
            @foreach ($category->products as $product )
                 </tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                </tr>
           @endforeach
    </table>
    @else
        <p>No product in this category.</p>
    @endif

        @endforeach
</body>
</html>