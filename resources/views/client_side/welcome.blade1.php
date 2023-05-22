<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Medicine Stock</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Medicine Stock</h2>
        <div class="row mt-4">
            @foreach ($medicines as $medicine)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $medicine->name }}</h5>
                        <p class="card-text">Quantity: {{ $medicine->quantity }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
