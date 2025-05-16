<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodcut Dashboard</title>
</head>
<body>
    <h2>Product In </h2>        
<table border="2">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->category->category_name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at->format('d.m.y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h1>Product Out </h1>
<table border="2">
    <thead>
        <tr>
            <th>Product Out</th>
            <th>Quantity</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productouts as $productout)
            <tr>
                <td>{{ $productout->product->category->category_name }}</td>
                <td>{{ $productout->quantity }}</td>
                <td>{{ $productout->created_at->format('d.m.y') }}</td>
                {{-- <td>{{ $product->created_at->format('d M Y H:i') }}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>