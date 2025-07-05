<html>
    <body>
        <h1>EDITAR UN NUEVO REGISTRO</h1>
         @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('persona.update' , $persona->id   )}}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"  value="{{ old('nombre', $persona->nombre) }}" required>
            <br>
            <br>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $persona->apellido) }}" required>
            <br>
            <br>
            <label for="cedula">Cedula:</label>
            <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $persona->cedula) }}" required>
            <br>
            <br>
            <button type="submit">Actualizar</button>
        </form>
    </body>
</html>