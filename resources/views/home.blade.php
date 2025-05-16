<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Dashboard | Home</title>
    <style>
        :root {
            --primary: #0f172a; /* dark slate */
            --secondary: #1e3a8a; /* indigo */
            --accent: #f59e0b; /* amber */
            --light: #f8fafc; /* light background */
            --white: #ffffff;
            --gray: #6b7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light);
            color: var(--primary);
            padding: 20px;
        }

        nav {
            background-color: var(--primary);
            padding: 15px 25px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            color: var(--white);
        }

        nav a, nav button {
            color: var(--white);
            text-decoration: none;
            margin: 0 10px;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        nav a:hover, nav button:hover {
            text-decoration: underline;
        }

        nav h5 {
            margin-right: auto;
            font-size: 18px;
            font-weight: 600;
        }

        .button a {
            background-color: var(--white);
            color: var(--primary);
            padding: 8px 14px;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button a:hover {
            background-color: var(--accent);
            color: var(--white);
        }

        h1, h2 {
            margin-bottom: 15px;
            color: var(--secondary);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: var(--white);
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: var(--secondary);
            color: var(--white);
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: var(--gray);
        }

        form {
            display: inline;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--secondary);
            color: var(--white);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card .icon {
            font-size: 32px;
            margin-bottom: 10px;
            color: var(--white);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .cards-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<nav>
    @guest
        <div class="button"><a href="{{ route('signin') }}">LOGIN</a></div>
        <div class="button"><a href="{{ route('signup') }}">REGISTER</a></div>
    @endguest

    @auth
        <h5>{{ Auth::user()->name }}</h5>
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/product') }}">Product In</a>
        <a href="{{ url('/productout') }}">Product Out</a>
        <a href="{{ url('/category') }}">Categories</a>
        <a href="{{ url('/report') }}">Reports</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
</nav>

@auth
<div class="cards-container">
    <div class="card">
        <i class="fas fa-box-open icon"></i>
        <h3>Total Products In</h3>
        <p>{{ $totalProductsIn }}</p>
    </div>
    <div class="card">
        <i class="fas fa-layer-group icon"></i>
        <h3>Total Quantity In</h3>
        <p>{{ $totalQuantityIn }}</p>
    </div>
    <div class="card">
        <i class="fas fa-dolly icon"></i>
        <h3>Total Products Out</h3>
        <p>{{ $totalProductsOut }}</p>
    </div>
    <div class="card">
        <i class="fas fa-boxes icon"></i>
        <h3>Total Quantity Out</h3>
        <p>{{ $totalQuantityOut }}</p>
    </div>
</div>
@endauth

@auth
<h2>Product In</h2>
<table>
    <thead>
        <tr>
            <th>Category</th>
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
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at->format('d.m.y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Product Out</h1>
<table>
    <thead>
        <tr>
            <th>Category</th>
            <th>Product Out</th>
            <th>Quantity</th>
            <th>Recorded At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productouts as $productout)
            <tr>
                <td>{{ $productout->product->category->category_name }}</td>
                <td>{{$productout->name}}</td>
                <td>{{ $productout->quantity }}</td>
                <td>{{ $productout->created_at->format('d.m.y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endauth

<footer>
    <h4>&copy; 2025 All rights reserved</h4>
</footer>

</body>
</html>
