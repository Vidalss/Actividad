@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <form method="POST" action="{{ route('activities.update', $activity) }}">
        @method('PUT')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text text-center">
                        <h3>Editar tu actividad</h3>
                    </div>
                    <div class="card-body">
                        <!-- Actividad -->
                        <div class="form-group">
                            <label for="activity">Actividad</label>
                            <input type="text" id="activity" name="activity" class="form-control @error('activity') is-invalid @enderror" value="{{ $activity->activity }}">
                            @error('activity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $activity->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Objetivo -->
                        <div class="form-group">
                            <label for="objective">Objetivo</label>
                            <input type="text" id="objective" name="objective" class="form-control @error('objective') is-invalid @enderror" value="{{ $activity->objective }}">
                            @error('objective')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Competencia -->
                        <div class="form-group">
                            <label for "competence">Competencia</label>
                            <input type="text" id="competence" name="competence" class="form-control @error('competence') is-invalid @enderror" value="{{ $activity->competence }}">
                            @error('competence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Temario -->
                        <div class="form-group">
                            <label for="syllabus">Temario</label>
                            <input type="text" id="syllabus" name="syllabus" class="form-control @error('syllabus') is-invalid @enderror" value="{{ $activity->syllabus }}">
                            @error('syllabus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Autorizada -->
                        <div class="form-group">
                            <label for="authorized">Autorizada</label>
                            <select name="authorized" id="authorized" class="form-control @error('authorized') is-invalid @enderror">
                                <option value="yes" {{ $activity->authorized == 'yes' ? 'selected' : '' }}>Sí</option>
                                <option value="no" {{ $activity->authorized == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('authorized')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Créditos -->
                        <div class="form-group">
                            <label for="credits">Créditos</label>
                            <input type="text" id='credits' name="credits" class="form-control @error('credits') is-invalid @enderror" value="{{ $activity->credits }}">
                            @error('credits')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
