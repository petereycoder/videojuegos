@extends('layout')
@section('title')
    - Listado
@endsection
@section('body')
    @if ($msj = Session::get('success'))
        <div class="row">
            <div class="col-md-4 ofsset-md-4">
                <div class="alert alert-success">
                    <p><i class="fa-solid fa-check"></i>{{$msj}}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Niveles</th>
                        <th>Lanzamiento</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($games as $i => $game)
                            <tr>
                                <td>{{ ($i + 1) }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->levels }}</td>
                                <td>{{ $game->release }}</td>
                                <td>
                                    <img class="img-fluid" src="/storage/{{ $game->imagen }}" alt="Imagen">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('games.edit', $game->id)}}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form id="frm_{{$game->id}}" method="POST" action="{{route('games.destroy', $game->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                        {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
