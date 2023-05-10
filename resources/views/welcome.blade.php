<!DOCTYPE html>
<html lang="es">
    <head>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Crud Laravel</title>

        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        {{-- datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/76dbbc43b7.js" crossorigin="anonymous"></script>

        {{-- sweetalert --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h1>CRUD Laravel</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add_person">
                        <i class="fa-solid fa-plus"></i> Nuevo
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-striped datable">
                        <thead class="table-dark">
                            <tr>
                                <td>Id</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Email</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->idpersona }}</td>
                                    <td>{{ $item->nombres }}</td>
                                    <td>{{ $item->apellidos }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning edit-data" value="{{ $item->idpersona }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger delete-data" value="{{ $item->idpersona }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add_person" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Agregar persona</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="add_form" action="{{ route('crud.create') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellidos</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_person" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Editar persona</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="edit_form" action="{{ route('crud.update') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                <input type="text" name="name" id="edit-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellidos</label>
                                <input type="text" name="lastname" id="edit-lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="edit-email" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-info" name="idperson" id="update">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>

        {{-- Datatables --}}
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        {{-- sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

        <script>
            @if (session('exito'))
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: '{{ session('exito') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif
        </script>

        <script>
            $(document).ready( function () {
                var idperson, name, lastname, email, url = window.location.href+'delete/';

                $('.datable').DataTable();

                $(document).on("click", ".edit-data", function(){
                    data = $(this).closest("tr");

                    idperson = this.value;
                    name = data.find('td:eq(1)').text();
                    lastname = data.find('td:eq(2)').text();
                    email = data.find('td:eq(3)').text();

                    $("#update").val(idperson);
                    $("#edit-name").val(name);
                    $("#edit-lastname").val(lastname);
                    $("#edit-email").val(email);

                    $('#edit_person').modal('show');
                });

                $(document).on("click", ".delete-data", function(){
                    Swal.fire({
                        icon: 'question',
                        title: 'Eliminar registro',
                        html: '¿Realmente deseas eliminar este registro?',
                        showCancelButton: true,
                        confirmButtonText: 'Eliminar',
                        confirmButtonColor: '#dc3545',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(url+this.value);
                        } else if (result.isDenied) {
                            Swal.fire('Acción cancelada', '', 'info');
                        }
                    });
                });
            } );
        </script>
</html>