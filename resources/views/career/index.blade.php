@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-12">
            <br>
			<div class="panel panel-primary">
			  <div class="panel-heading"> Career
			  	<div class="panel-title pull-right">
			  		<a href="{{ route('career.create') }}" >Tambah Data</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama</th>
					  <th>Email</th>
            <th>No Telepon</th>
            <th>CV</th>
            <th>Subyek</th>
            <th>Deskripsi</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($careers as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
              <td>{{ $data->nama}}</td>
              <td>{{ $data->email}}</td>
              <td>{{ $data->no_tel}}</td>
              <td><embed src="{{ asset('assetss/files/' .$data->cv)}}"></td>
              <td>{{ $data->subyek}}</td>
				    	<td>{!! str_limit($data->deskripsi,50) !!}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('career.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('career.show',$data->id) }}" class="btn btn-outline-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('career.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger"  onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
							</form>
						</td>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection