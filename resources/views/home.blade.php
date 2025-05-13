
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    nav {
        background-color: #343a40;
        padding: 1rem;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    nav div, nav span {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    nav a {
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    nav a:hover {
        background-color: #495057;
    }

    .button a {
        background-color: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        display: inline-block;
    }

    .button a:hover {
        background-color: #0056b3;
    }

    button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #c82333;
    }

    h5 {
        margin: 0;
    }

    div[style*="color:green"] {
        margin-top: 10px;
        font-weight: bold;
        color: green;
    }
      nav div.guest-buttons {
        display: flex;
        gap: 1rem;
    }

    .guest-buttons .button a {
        background-color: #28a745; /* Green */
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        right:80%;
        transition: background-color 0.3s ease;
    }

    .guest-buttons .button a:hover {
        background-color: #218838;
    }

    .guest-buttons .button {
        border: none;
        background: none;
        padding: 0;
        margin: 0;
    }
</style>

<body>
<nav>
   @guest
    <div class="guest-buttons">
        <button class="button"><a href="{{ route('signin') }}">LOGIN</a></button>
        <button class="button"><a href="{{ route('signup') }}">REGISTER</a></button>
    </div>
@endguest

  @auth
     <span><h5>{{Auth::user()->name}}</h5></span>
    <a href="./dash">DASHBOARD</a>
    <a href="./product">PRODUCTIN</a>
    <a href="./productout">PRODUCTOUT</a>
    <a href="./category">CATEGORIES</a>
    <a href="./report">REPORTS</a>
    <form action="{{route('logout')}}" method="post">
    @csrf
    @method('post')
        <button>logout</button>
    </form>
   
  @endauth
</nav>
<fouter><h4>&copy;2025 allright reserve</h4></fouter>
</body>
</html>