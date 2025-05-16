<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRODUCT REPORT</title>
</head>
<body>
    <a href="/home">back home</a>
        <h1>Product Report</h1>
    <table border="2" cellpadding="5">
        <tr
        >
            <th>Category Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>price</th>
        <tr>
            @foreach ($products as $product )
                 </tr>
                    <td>{{$product->category->category_name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                </tr>
                @endforeach
            </table>
            <h1>Product Out Report</h1>
            <table border="2">
                <tr>
            <th>Category Name</th>
            <th>Product Out Name</th>
            <th>QUANTITY</th>
            <th>DATE</th>
        </tr>
        @foreach ($productouts as $productout)
                <tr>
                    <td>{{$productout->product->category->category_name}}</td>
                    <td>{{$productout->product->name}}</td>
                    <td>{{$productout->quantity}}</td>
                    <td>{{$productout->date}}</td>
                 </tr>
            @endforeach
    </table>
</body>
</html>