@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class = "container-fluid">
        	<div class="row">
				<div class="col-md-12">
				 <br>	
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
								<div id="chartPupuk"></div>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
								<div id="pengaduan"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Pupuk</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<td>No</td>
												<td>NAMA</td>
												<td>HARGA</td>
											</tr>
                                        </thead>
										<tbody>
                                         
											<tr>
												<td></td>
												<td></a></td>
												<td> </td>
                                            </tr>
                                        
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class = "col-md-6">
							<div class="panel">
								<div class="panel-heading">
								<h3 class="panel-title">Kelompok Tani</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>									
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
											<td>No</td>
											<td>NAMA</td>
											<td>KETUA</td>
											<td>ANGGOTA</td>
											</tr>
                                        </thead>
										<tbody>
                                         
											<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											</tr>
                                        
										</tbody>
									</table>
									
								</div> 
							</div>
						</div>
					</div>
				</div>
        	</div>    
    	</div>
	</div>
</div>	
@endsection

@section('footer')

@endsection