{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT CATEGORY</title>
</head>
<body>
    <form action="{{ route('updatecat',$category->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="text" name="category_name" value="{{ $category->category_name }}">
        <button type="submit">update</button>
    </form>
</body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>

    <a href="{{ route('category') }}">Back to Categories</a>

    <h2>Edit Category</h2>

    <form action="{{ route('updatecat',$cat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" value="{{ $category->category_name }}" required>

        <button type="submit">Update Category</button>
    </form>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <head>
    ...
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        ul {
            margin-top: 15px;
            padding-left: 20px;
            color: red;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>

</head>
<body>



    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('updatecat', $category->id) }}" method="POST">
    <h1>Edit Category</h1>
        @csrf
        @method('PUT')

        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" value="{{ $category->category_name }}" required>
        
        <button type="submit">Update Category</button>
    <a href="{{ route('category') }}">Back to Categories</a>
    </form>

</body>
</html>
