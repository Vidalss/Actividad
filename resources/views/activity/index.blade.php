@extends('adminlte::page')

@section('title', 'Lista')

@section('content_header')
    <h1>Lista de Actividades</h1>
@stop

@section('content')

    <a href="{{ route('activities.create') }}" class="btn btn-primary">Nueva Actividad</a>

    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th>Competencia</th>
                <th>Temario</th>
                <th>Periodo</th>
                <th>Autorizada</th>
                <th>Staff</th>
                <th>No. Créditos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td>{{ $activity->activity }}</td>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->objective }}</td>
                    <td>{{ $activity->competence }}</td>
                    <td>{{ $activity->syllabus }}</td>
                    <td>{{ $activity->period->long_name }}</td>
                    <td>{{ $activity->authorized }}</td>
                    <td>{{ $activity->staff->long_name }} </td>
                    <td>{{ $activity->credits }}</td>
                    <td>

                        <div class="d-flex flex-row mb-3">
                            <div class="p-2">
                                <a href="{{ route('activities.show', $activity) }}" class="btn btn-info">
                                    <i class="fas fa-regular fa-eye"></i>
                                </a>

                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                </a>

                                <form id="formEliminar{{ $activity->id }}" action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger" onclick="confirmarEliminacion('{{ $activity->id }}')">
                                        <i class="fas fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('css')
    <!-- No olvides incluir el enlace a SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
@stop

@section('js')
    <!-- No olvides incluir el script de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function confirmarEliminacion(activityId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formEliminar' + activityId).submit();
                }
            });
        }
    </script>
@stop
