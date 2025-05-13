
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIES</title>
    <head>
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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

    nav a {
        color: #ecf0f1;
        margin-right: 15px;
        text-decoration: none;
        font-weight: 500;
    }

    nav a:hover {
        color: #1abc9c;
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

    /* Links */
    a {
        text-decoration: none;
        color: #2980b9;
        font-weight: bold;
        margin-bottom: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Form Styling */
    form {
        margin: 20px 0;
    }

    input[type="text"] {
        padding: 10px;
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    button {
        padding: 10px 16px;
        background-color: #1abc9c;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
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
    /* Messages and Errors */
    .success-message {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    ul {
        margin-top: 20px;
        color: #e74c3c;
    }

    ul li {
        margin-left: 20px;
    }

    @media screen and (max-width: 600px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
        }

        .guest-buttons {
            flex-direction: column;
        }

        input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
        }
        table th, table td {
            padding: 10px;
        }
    }
</style>

</head>

</head>
<body>
<nav>
   @guest
    <div class="guest-buttons">
        <button class="button"><a href="{{ route('signin') }}">LOGIN</a></button>
        <button class="button"><a href="{{ route('signup') }}">REGISTER</a></button>
    </div>
@endguest

  @auth
    <a href="./product">PRODUCTS</a>
    <a href="./category">CATEGORIES</a>
    <a href="./report">REPORTS</a>
  @endauth
</nav>

<a href="./">Back Home</a>
<form action="{{ route('addcat') }}" method="post">
    @csrf
    <input type="text" name="category_name" placeholder="Enter Category Name">
    <button type="submit">add category</button>
</form>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th colspan="2">Action</th>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td class="edit-button">
                    <a href="{{ route('editcat',compact('category')) }}">Edit</a>
                </td>
                <td class="delete-button">
                    <form action="{{ route('deletecat',compact('category')) }}" method="post" onsubmit="return confirm('are you sure')">
                        @csrf
                        @method('delete')
                        <button type="submit" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
