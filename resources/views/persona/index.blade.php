<html>

<body>
    <h1>
        REGISTRO DE PERSONAS
    </h1>

    <form action="{{route('persona.create')}}">
    <button>AGREGAR UN NUEVO REGISTRO</button>
</form>
     @if ($persona->isEmpty())
            <p>No hay personas registrados</p>
        @else
                 <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persona as $persona)
                    <tr>
                        <td>{{ $persona->nombre }}</td>
                        <td>{{ $persona->apellido }}</td>
                        <td>{{ $persona->cedula }}</td>
                        <td><a href="{{ route('persona.edit', $persona->id) }}">Editar</a> </td>
                        <td> {{-- Acción Eliminar --}}
                        <form action="{{ route('persona.destroy', $persona->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta persona?')">Eliminar</button>
                        </form></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
          
        @endif

</body>

</html>
