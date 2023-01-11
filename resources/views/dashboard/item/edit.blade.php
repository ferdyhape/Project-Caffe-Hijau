<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ url('dashboard/item/'.$item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="oldPicture" value="{{ $item->picture }}"><br>
        <label for="name">Item Name</label>
        <input type="text" name="name" value="{{ $item->name }}"><br>
        <label for="price">Price</label>
        <input type="number" name="price" value="{{ $item->price }}"><br>
        <label for="category_id">Choose a category:</label><br>
        <select name="category_id">
            @foreach($category as $c)
            @if( $item->category_id == $c->id)
            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
            @else
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endif
            @endforeach
        </select><br>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $item->description }}"><br>

        @if (is_null($item->picture))
        <label for="picture">Picture</label>
        <input type="file" name="picture" value="{{ $item->picture }}"><br>

        @else
        <p>-- here for preview picture</p>
        <button type="button" onclick="editPicture()">EditPicure</button>
        <input type="file" name="picture" value="{{ $item->picture }}" id="newpicture" style="display: none"><br>

        @endif
        <button type="submit">Add Item</button>
    </form>

    <script>
        function editPicture() {
        var x = document.getElementById("newpicture");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
        }
    
    </script>
</body>

</html>