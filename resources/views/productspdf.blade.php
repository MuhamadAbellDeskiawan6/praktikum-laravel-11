<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Generate PDF Example -
        ItSolutionStuff.com</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap
.min.css">
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;

            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
        do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p>
    <table class="table table-bordered">
        <tr>
        <th>No</th>
            <th>Gambar</th>
            <th>Title</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        @foreach($products as $products)
        <tr>
            <td>{{ $products->id }}</td>
            <td><img src="{{  public_path('storage/products/' . $products->image) }}" alt="{{ $products->image }}" width="200"  height="200px"></td>
            <td>{{ $products->title }}</td>
            <td>{{ $products->description }}</td>
            <td>{{ $products->price }}</td>
            <td>{{ $products->stock }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>