<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Product Management</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
        nav {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .links h2 {
            margin-right: 2rem;
            font-size: 1.5rem;
        }

        .links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .links a:hover {
            background-color: #34495e;
        }

    /* Main Content Styles */
    .main-content {
        margin-left: 270px; /* Slightly more than nav width for breathing room */
        padding: 30px;
        transition: all 0.3s ease;
    }

    /* Action Buttons */
    .main-content > a {
        display: inline-flex;
        align-items: center;
        background-color: #3498db;
        color: white;
        padding: 10px 15px;
        margin-right: 10px;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .main-content > a:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .main-content > a i {
        margin-right: 8px;
    }

    /* Page Title */
    center h1 {
        color: #2c3e50;
        margin: 20px 0 30px;
        font-size: 2.2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    /* Success Message */
    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 5px;
        margin: 20px 0;
        border-left: 5px solid #28a745;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    /* Search Form */
    form[method="GET"] {
        display: flex;
        margin-bottom: 30px;
        max-width: 600px;
    }

    form[method="GET"] input {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s;
    }

    form[method="GET"] input:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    form[method="GET"] button {
        padding: 0 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: all 0.3s;
    }

    form[method="GET"] button:hover {
        background-color: #2980b9;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    th {
        background-color: #3498db;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    tr:hover {
        background-color: #f8f9fa;
    }

    /* Action Buttons in Table */
    .edit-button a, .delete-button button {
        display: inline-flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .edit-button a {
        background-color: #f39c12;
        color: white;
    }

    .edit-button a:hover {
        background-color: #e67e22;
    }

    .delete-button button {
        background-color: #e74c3c;
        color: white;
        border: none;
        cursor: pointer;
    }

    .delete-button button:hover {
        background-color: #c0392b;
    }

    .edit-button i, .delete-button i {
        margin-right: 6px;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .pagination a, .pagination span {
        padding: 8px 16px;
        margin: 0 4px;
        border: 1px solid #ddd;
        text-decoration: none;
        color: #3498db;
        border-radius: 4px;
        transition: all 0.3s;
    }

    .pagination a:hover {
        background-color: #f8f9fa;
    }

    .pagination .active {
        background-color: #3498db;
        color: white;
        border-color: #3498db;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .main-content {
            margin-left: 0;
            padding-top: 80px;
        }
        
        table {
            display: block;
            overflow-x: auto;
        }
    }

    @media (max-width: 576px) {
        .main-content > a {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
        }
        
        form[method="GET"] {
            flex-direction: column;
        }
        
        form[method="GET"] input {
            border-radius: 5px;
            margin-bottom: 5px;
        }
        
        form[method="GET"] button {
            border-radius: 5px;
            padding: 12px;
        }
    }

    </style>
</head>
<body>
<nav>
  @auth
 <div class="links">
    <h2>Products</h2>
    <a href="./home"><i class="fas fa-home"></i> Home</a>
    <a href="./product"><i class="fas fa-box-open"></i> Product In</a>
    <a href="./productout"><i class="fas fa-truck-moving"></i> Product Out</a>
    <a href="./category"><i class="fas fa-tags"></i> Categories</a>
</div>
</nav>
    <div class="main-content">
        <a href="./"><i class="fas fa-arrow-left"></i> Back Home</a>
        <a href="{{ route('create') }}"><i class="fas fa-plus-circle"></i> Add Products</a>
    </div>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

<form action="{{ route('product') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
    <button type="submit"><i class="fas fa-search"></i> Search</button>
</form>

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
            <td>{{ $product->category->category_name ??'no category'}}</td>
            <td class="edit-button">
                <a href="{{ route('edit', compact('product')) }}"><i class="fas fa-edit"></i> Edit</a>
            </td>
            <td class="delete-button">
                <form action="{{ route('destroy', compact('product')) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('delete')
                    <button type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
@if ($products)
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endif
@endauth
</body>
</html>