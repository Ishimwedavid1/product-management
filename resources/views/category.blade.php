<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        a.back-home {
            display: inline-block;
            margin: 1rem;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a.back-home:hover {
            background-color: #2980b9;
        }

        form {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        form input[type="text"] {
            flex: 1;
            min-width: 200px;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        form button {
            padding: 0.75rem 1.5rem;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #27ae60;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .edit-button a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .edit-button a:hover {
            color: #2980b9;
        }

        .delete-button button {
            padding: 0.5rem 1rem;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button button:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            .links {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .links h2 {
                margin-bottom: 0.5rem;
            }
            
            form {
                flex-direction: column;
            }
            
            th, td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<nav>
  @auth
   <div class="links">
    <h2>Categories</h2>
    <a href="./home"><i class="fas fa-home"></i> Home</a>
    <a href="./product"><i class="fas fa-box-open"></i> Product In</a>
    <a href="./productout"><i class="fas fa-truck-moving"></i> Product Out</a>
    <a href="./category"><i class="fas fa-tags"></i> Categories</a>
</div>
  @endauth
</nav>

<div class="container">
    <a href="./" class="back-home"><i class="fas fa-arrow-left"></i> Back Home</a>
    
    <form action="{{ route('addcat') }}" method="post">
        @csrf
        <input type="text" name="category_name" placeholder="Enter Category Name" required>
        <button type="submit"><i class="fas fa-plus"></i> Add Category</button>
    </form>
    
    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td class="edit-button">
                        <a href="{{ route('editcat',compact('category')) }}"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                    <td class="delete-button">
                        <form action="{{ route('deletecat',compact('category')) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?')">
                            @csrf
                            @method('delete')
                            <button type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>