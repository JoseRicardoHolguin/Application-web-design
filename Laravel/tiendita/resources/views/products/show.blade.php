<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos - Tiendita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Productos</h1>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                    <tr>
                        <td>{{ $prod->nombre }}</td>
                        <td>${{ number_format($prod->precio, 2) }}</td>
                        <td>{{ $prod->category ? $prod->category->nombre : 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver al formulario</a>
    </div>
</body>
</html>
