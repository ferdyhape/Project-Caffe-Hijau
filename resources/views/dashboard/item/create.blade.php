<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ url('dashboard/item') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Item Name</label>
        <input type="text" name="name"><br>
        <label for="price">Price</label>
        <input type="number" name="price"><br>
        <label for="category_id">Choose a category:</label><br>
        <select name="category_id">
            <option value="1">Coffe</option>
            <option value="2">Tea</option>
        </select><br>
        <label for="description">Description</label>
        <input type="text" name="description"><br>
        <label for="picture">Picture</label>
        <input type="file" name="picture"><br>
        <button type="submit">Add Item</button>
    </form>
</body>

</html>