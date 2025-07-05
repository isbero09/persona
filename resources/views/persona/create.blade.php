<html>
    <body>
        <h1>CREA UN NUEVO REGISTRO</h1>
        <form action="{{route('persona.store')}}" method="POST">
            @csrf
            <label for="">Nombre:</label>
            <input type="text" name="nombre">
            <br>
            <br>
            <label for="">Apellido:</label>
            <input type="text" name="apellido">
            <br>
            <br>
            <label for="">Cedula:</label>
            <input type="text" name="cedula">
            <br>
            <br>
            <button>Guardar</button>
        </form>
    </body>
</html>