<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('login')}}" method="post">
    @csrf
        <label for="">Produc Name</label>
        <input type="text" name="productname" id=""><br>
        <label for="">Price</label>
        <input type="text" name="price" id=""><br>
        <label for="">Produc image</label>
        <input type="text" name="image" id=""><br>
        <label for="">Description</label><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <label for="">Produc Type</label>
        <input type="text" name="producttype" id=""><br>
        <label for="">catalogy</label>
        <input type="text" name="catalogid" id=""><br>
        <button type="submit">Them SP</button>
    </form>
</body>
</html>