@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-12">
            <br>
			<div class="panel panel-primary">
			  <div class="panel-heading"> Portofolio
			  	<div class="panel-title pull-right">
			  		<a href="{{ route('portofolio.create') }}" >Tambah Data</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Judul</th>
					  <th>Gambar</th>
                      <th>Deskripsi</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($portofolios as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
                        <td>{{ $data->judul}}</td>
                        <td><img src="{{ asset('/assetss/img/gambar/' .$data->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;"></td>
				    	<td>{!! str_limit($data->deskripsi,50) !!}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('portofolio.edit',$data->id) }}">Edit</a>
						</td>

						<td>
							<a href="{{ route('portofolio.show',$data->id) }}" class="btn btn-outline-success">Show</a>
						</td>
						<td>

							<form method="post" action="{{ route('portofolio.destroy',$data->id) }}">
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