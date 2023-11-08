@extends('adminlte::page')

@section('title', 'Crear Actividad')

@section('content_header')
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-white rounded p-4 border border-2 border-dark">
                <h1 class="text-center h3">Formulario de Creación de Actividad</h1>
                <p class="text-center mb-4">Rellena el formulario con los datos que se te piden</p>

                <form action="{{ route('activities.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="name"
                                name="name"
                                class="form-control form-control-lg"
                                placeholder="Nombre de la actividad"
                                type="text"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Objective -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="objective"
                                name="objective"
                                class="form-control form-control-lg"
                                placeholder="Objetivo de la actividad"
                                type="text"
                                value="{{ old('objective') }}">
                        </div>
                        @error('objective')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Competence -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="competence"
                                name="competence"
                                class="form-control form-control-lg"
                                placeholder="Competencia"
                                type="text"
                                value="{{ old('competence') }}">
                        </div>
                        @error('competence')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Syllabus -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="syllabus"
                                name="syllabus"
                                class="form-control form-control-lg"
                                placeholder="Syllabus"
                                type="text"
                                value="{{ old('syllabus') }}">
                        </div>
                        @error('syllabus')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Authorized -->
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-select form-select-lg form-control" name="authorized">
                                <option value="">Autorización</option>
                                <option value="not" @if(old('authorized') == 'not') selected @endif>Not Authorized</option>
                                <option value="yes" @if(old('authorized') == 'yes') selected @endif>Authorized</option>
                            </select>
                        </div>
                        @error('authorized')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Activity -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="activity"
                                name="activity"
                                class="form-control form-control-lg"
                                placeholder="Número de actividad"
                                type="number"
                                inputmode="numeric"
                                value="{{ old('activity') }}">
                        </div>
                        @error('activity')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Credits -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input
                                id="credits"
                                name="credits"
                                class="form-control form-control-lg"
                                placeholder="Créditos"
                                type="number"
                                inputmode="numeric"
                                value="{{ old('credits') }}">
                        </div>
                        @error('credits')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Period -->
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-select form-select-lg form-control" name="period_id">
                                <option value="">Selecciona el periodo</option>
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}" @if(old('period_id') == $period->id) selected @endif>{{ $period->long_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('period_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Staff -->
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-select form-select-lg form-control" name="staff_id">
                                <option value="">Selecciona un Staff</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}" @if(old('staff_id') == $staff->id) selected @endif>{{ $staff->long_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('staff_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- User -->
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-select form-select-lg form-control" name="user_id">
                                <option value="">Selecciona el usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }} {{ $user->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Crear Actividad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
