<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Out Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
            --white: #ffffff;
            --gray: #95a5a6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        nav {
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            color: var(--white);
        }

        .links a {
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .links a:hover {
            background-color: var(--dark-color);
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .form-container {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            font-weight: 600;
            color: var(--dark-color);
        }

        select, input {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        select:focus, input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        button[type="submit"] {
            grid-column: 1 / -1;
            padding: 0.75rem;
            background-color: var(--success-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-messages {
            background-color: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            border: 1px solid #f5c6cb;
        }

        .error-messages ul {
            list-style-position: inside;
        }

        .error-messages li {
            margin-bottom: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: var(--secondary-color);
            color: var(--white);
            font-weight: 600;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .action-cell {
            display: flex;
            gap: 0.5rem;
        }

        .edit-btn {
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .edit-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .delete-btn {
            padding: 0.5rem 1rem;
            background-color: var(--danger-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .delete-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        .stock-low {
            color: var(--danger-color);
            font-weight: 600;
        }

        .stock-ok {
            color: var(--success-color);
        }

        @media (max-width: 768px) {
            .links {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
            
            .links h2 {
                margin-bottom: 0.5rem;
            }
            
            form {
                grid-template-columns: 1fr;
            }
            
            th, td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }
            
            .action-cell {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<nav>
  @auth
   <div class="links">
    <h2>Products</h2>
    <a href="./"><i class="fas fa-home"></i> Home</a>
    <a href="./product"><i class="fas fa-box-open"></i> Product In</a>
    <a href="./productout"><i class="fas fa-truck-moving"></i> Product Out</a>
    <a href="./category"><i class="fas fa-tags"></i> Categories</a>
</div>
</nav>

<div class="container">
    <div class="form-container">
        <form action="{{route('addout')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" required>
                    <option value="">Choose product</option>
                   @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                             {{ $product->name }} ({{ $product->category->category_name }})
                             - Stock: {{$product->quantity}}
                        </option>
                   @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" min="1" required>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>

            <button type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
        </form>
    </div>

    @if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{session('success')}}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Date</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productouts as $productout)
                <tr>
                    <td>{{ $productout->product->name ?? 'Product Not Found' }}</td>
                    <td>{{ $productout->product->category->category_name ?? 'No Category' }}</td>
                    <td>{{$productout->quantity}}</td>
                    <td>{{$productout->date}}</td>
                    <td class="action-cell">
                        <a href="{{ route('editout',compact('productout')) }}" class="edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('deleteout',compact('productout')) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endauth
</div>
</body>
</html>