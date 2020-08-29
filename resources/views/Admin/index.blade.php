@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="card-header">Daftar user</div>
                        @if(count($users))
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped
          table-hover table-condensed tfix">
                                <thead align="center">
                                    <tr>
                                        <td><b>ID</b></td>
                                        <td><b>Nama</b></td>
                                        <td><b>Emails</b></td>
                                        <td><b>Roles</b></td>
                                        @if(auth::user()->roles == 'admin' )
                                        <td><b>MENU</b></td>
                                        @endif
                                    </tr>
                                </thead>
                                @foreach($users as $m)
                                <tr>
                                    <td>{{ $m->id }}</td>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->roles }}</td>
                                    @if(auth::user()->roles == 'admin' )
                                    <td align="center" width="30px">
                                        <a href="/admin/{{$m->id}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                                        <form method="POST" action="/admin/{{$m->id}}" accept-charset="UTF-8">
                                            @csrf
                                            <!-- <input name="_method" type="hidden" value="DELETE"> -->
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-xs btn-danger " onclick="if (confirm('Apakah anda yakin menghapus data ?')){ this.form.submit(); }else {return false;};" value="Hapus">Hapus</button>
                                            <!-- <a class="" href="" onclick="if (confirm('Apakah anda yakin menghapus data ?')){ this.form.submit(); }else {return false;};" value="Hapus">Hapus</a> -->
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i> Data Mahasiswa belum ada
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
