<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Productout</title>
</head>
<body>
    <form action="{{ route('updateout',compact('productout')) }}" method="post">
        @csrf
        @method('put')
    <label>Quantity</label>
    <input type="number" name="quantity" min="1" required value="{{ $productout->quantity }}">

    <label>Date</label>
    <input type="date" name="date" required value="{{ $productout->date }}">

    <button type="submit">Submit</button>

    </form>
</body>
</html>