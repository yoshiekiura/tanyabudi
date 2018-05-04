@extends('admin.layout.app')
@section('title', 'Transaksi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Transaksi Sedekah
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-body">
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
						<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Nama Produk</th>
			            				<th>Deskripsi Produk</th>
			            				<th>Harga Produk</th>
			            				<th>Nama User</th>
			            				<th>Jumlah Pembayaran</th>
			            				<th>Tanggal Pembayaran</th>
			            				<th>Bukti Pembayaran</th>
			            				<th>Status</th>
			            				<th>Aksi</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($sedekah as $dataSedekah)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataSedekah->nama }}</td>
			            				<td>{{ $dataSedekah->desc_prod }}</td>
			            				<td>Rp {{ number_format($dataSedekah->harga, 2, ',', '.') }}</td>
			            				<td>{{ $dataSedekah->name }}</td>
			            				<td>Rp {{ number_format($dataSedekah->jumlah_pembayaran, 2, ',', '.') }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataSedekah->tgl_pembayaran) }}</td>
			            				<td><img src="{{asset('bukti-tf/'.$dataSedekah->foto)}}" class="img-responsive" width="150"></td>
			            				<td>{{ $dataSedekah->status_pembayaran == 0 ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' }}</td>
			            				<td>@if($dataSedekah->status_pembayaran == 0)
			            					<a href="javascript:;" id="btn-konfirmasi" data-id="{{ $dataSedekah->id_payment }}" class="btn btn-success btn-flat">Konfirmasi</a>
			            				@endif</td>
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
		            	</div>
		            	<div class="pull-right">
							{!! $sedekah->links() !!}
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</section>
</div>
<form id="frm-konfirmasi" action="" method="post">
	@csrf
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-konfirmasi', function(e){
			e.preventDefault();
			var jawaban = confirm('Apakah anda yakin?');
            if (jawaban) {
            	var link = "{{ url('/') }}";
                var id = $(this).data('id');
                $('#frm-konfirmasi').attr('action', '{{ url('index/admin/transaksi/sedekah/konfirmasi/') }}/'+id);
                $('#frm-konfirmasi').submit();
            }

		});
	});
</script>
@endpush
			