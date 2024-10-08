@extends('layout')
@section('title')
    - @yield('formName')
@endsection
@section('body')
    @if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <p><b><i class="fa-solid fa-times"></i>Errores</b></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="POST" enctype="multipart/form-data">
                        @yield('method')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-gamepad"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Nombre"
                            @isset($game) value="{{$game->name}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-trophy"></i></span>
                            <input type="text" name="levels" class="form-control" placeholder="Niveles"
                            @isset($game) value="{{$game->levels}}" @endisset required>>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-alt"></i></span>
                            <input type="date" name="release" class="form-control" placeholder="Lanzamiento"
                            @isset($game) value="{{$game->release}}" @endisset accept="image/*" required>>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" name="image" class="form-control"  required>
                        </div>
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
