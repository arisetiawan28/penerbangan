@extends('layout.index')

@section('title')
Daftar Bandara
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('bandara/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <form action="{{url('bandara')}}" method="get">
        <div class="input-group mb-3">
            @csrf
            <input type="text" class="form-control" name="search" id="search" value="{{ $keyword }}" placeholder="Search..">

            <div class="input-group-append">
                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        </form>

    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>{{ $model->attributes()['kode_bandara'] }}</th>
                <th>{{ $model->attributes()['nama_bandara'] }}</th>
                <th>{{ $model->attributes()['alamat_bandara'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->kode_bandara }}</td>
                    <td>{{ $value->nama_bandara }}</td>
                    <td>{{ $value->alamat_bandara }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('bandara/'.$value->id.'/edit/') }}">Update</a></td>
                    <td class="text-center">
                        <form action="{{ url('bandara/'.$value['id']) }}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach()
        </table>

        <br/>
        <!-- 
            fungsi yang disediakan laravel, untuk menampilkan halaman
            fungsi ini dapat digunakan jika menggunakan 'paginate' pada pemanggilan data
            -->
        {{ $datas->links() }}
    </div>
@endsection