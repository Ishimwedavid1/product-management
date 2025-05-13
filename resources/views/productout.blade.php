<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f9f9f9;
        color: #333;
    }

    nav {

        background-color: transparent;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    nav a {
        color: black;
        text-decoration: none;
        margin-right: 20px;
        font-weight: bold;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        max-width: 500px;
        /* position:relative;
        left:30%; */
    }

    form label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    form input, form select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 10px;
    }

     button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #218838;
    }

   
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            border: 2px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6f7ff;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        .form{
            background:none;
            border:none;
            
        }

        button {
            background-color: #ff4d4d;
            border: none;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e60000;
        }
    
    ul {
        color: red;
    }

    div {
        margin-top: 10px;
        color: green;
        font-weight: bold;
    }
</style>

<body>
    @auth
    <nav>
        <a href="./product">PRODUCTIN</a>
        <a href="./productout">PRODUCTOUT</a>
        <a href="./category">CATEGORIES</a>
    </nav>
    @endauth
    <form action="{{route('addout')}}" method="post">
        @csrf
        <label for="">Product</label>
        <select name=product_id >
            <option value="">choose product</option>
           @foreach ($products as $product)
                <option value="{{ $product->id }}">
                     Name:{{$product->name}},Category:{{ $product->category->category_name  }}, Stoke:{{$product->quantity}}
                </option>
           @endforeach
        </select>
        
    <label>Quantity</label>
    <input type="number" name="quantity" min="1" required>

    <label>Date</label>
    <input type="date" name="date" required>

    <button type="submit">Submit</button>
    </form>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    @if (session('success'))
        <div>{{session('success')}}</div>
    @endif
    <table border="2">
        <tr>
            <th>ProductIn</th>
            <th>Category</th>
            <th>quantity</th>
            <th>date</th>
            <th colspan="2">action</th>
        </tr>
        @foreach ($productouts as $productout)
            <tr>
              <td>{{ $productout->product->name ?? 'Product Not Found' }}</td>
              <td>{{ $productout->product->category->category_name ?? 'No Category' }}</td>
              <td>{{$productout->quantity}}</td>
              <td>{{$productout->date}}</td>
              <td><a href="{{ route('editout',compact('productout')) }}">edit</a></td>
              <td>
                <form action="{{ route('deleteout',compact('productout')) }}" method="post" class="form" onsubmit="return confirm('are you sure')">
                    @csrf
                    @method('delete')
                    <button>delete</button>
                </form>
              </td>
            </tr>
        @endforeach
    </table>
</body>
</html>