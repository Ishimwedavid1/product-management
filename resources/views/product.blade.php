
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <head>
</head>
<style>
    /* General Reset */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f4f6f8;
        padding: 20px;
        color: #2c3e50;
    }

    /* Navigation Bar */
    nav {
        background-color: #2c3e50;
        color: #fff;
        padding: 15px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 8px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    nav h5 {
        margin-right: 20px;
        font-size: 16px;
    }

    nav a {
        color: #ecf0f1;
        margin-right: 15px;
        text-decoration: none;
        font-weight: 500;
    }

    nav a:hover {
        color: #1abc9c;
        text-decoration: underline;
    }

    .guest-buttons {
        display: flex;
        gap: 10px;
    }

    .guest-buttons .button a {
        background-color: #3498db;
        color: white;
        padding: 8px 14px;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .guest-buttons .button a:hover {
        background-color: #2980b9;
    }

    nav form button {
        background-color: #e74c3c;
        border: none;
        color: white;
        padding: 8px 14px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    nav form button:hover {
        background-color: #c0392b;
    }

    /* Top Links */
    .top-links {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .top-links a {
        background-color: #1abc9c;
        padding: 10px 15px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }

    .top-links a:hover {
        background-color: #16a085;
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #34495e;
        color: white;
        font-weight: 600;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .edit-button a {
        color: #2980b9;
        font-weight: bold;
        text-decoration: none;
    }

    .edit-button a:hover {
        text-decoration: underline;
    }

    .delete-button button {
        background-color: transparent;
        border: none;
        color: #e74c3c;
        font-weight: bold;
        cursor: pointer;
    }

    .delete-button button:hover {
        text-decoration: underline;
    }

    .success-message {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    @media screen and (max-width: 600px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
        }

        .top-links {
            flex-direction: column;
            gap: 10px;
        }

        table th, table td {
            padding: 10px;
        }
    }
</style>

</head>
<body>
<nav>

  @auth
    <a href="./product">PRODUCTIN</a>
    <a href="./productout">PRODUCTOUT</a>
    <a href="./category">CATEGORIES</a>
  @endauth
</nav>

    <div class="top-links">
        <a href="./">Back Home</a>
        <a href="{{ route('create') }}">Add Products</a>
    </div>

    <center><h1>Products</h1></center>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <table>
        <tr>
            <th>NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>CATEGORY NAME</th>
            <th colspan="2">ACTION</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            {{-- <td>{{ $product->category_id }}</td> --}}
            <td>{{ $product->category->category_name ??'no category'}}</td>
            <td class="edit-button">
                <a href="{{ route('edit', compact('product')) }}">Edit</a>
            </td>
            <td class="delete-button">
                <form action="{{ route('destroy', compact('product')) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>