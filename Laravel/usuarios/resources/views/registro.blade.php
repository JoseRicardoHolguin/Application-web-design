<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Registrar</button>
</form>
@if ($errors->any())
    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
@endif