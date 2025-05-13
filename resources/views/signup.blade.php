

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <head>
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
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            display: block;
            /* margin-bottom: 2px; */
        }

        input {
            width: 100%;
            padding: 10px;
            /* margin-bottom: 10px; */
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
    <form action="{{route('signup')}}" method="post">
    <h1>REGISTER </h1>
    @csrf
      @method('post')
        <label>NAME</label><br>
        <input type="text" name="name" ><br><br>
        <label>EMAIL</label><br>
        <input type="email" name="email"><br><br>
        <label>PASSWORD</label><br>
        <input type="password" name="password"><br><br>    
        <label>CONFIRM PASSWORD</label><br>
        <input type="password" name="password_confirmation"><br><br>    
        <button type="submit">signup</button>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
   <h4>already have account<a href="/signin">signin</a></h4> 
    </form>
</body>
</html>



   
              

           

            