<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <main>
            <section>
                @if($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                    - {{ $error }} <br>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('users.store')}}" method="post">
                    @csrf
                    <label for="name">
                        <input type="text" name="name" id="name" placeholder="Pedro" value="{{old('name')}}">
                    </label>
                    <label for="email">
                        <input type="email" name="email" id="email" placeholder="direccion@email.com" value="{{old('email')}}">
                    </label>
                    <label for="password">
                        <input type="password" name="password" id="password" placeholder="123">
                    </label>
                    <input type="submit" value="Enviar">
                </form>
            </section>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input
                                        type="submit"
                                        value="Eliminar"
                                        onclick="return confirm('Desea eliminar...?')"
                                        />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>
