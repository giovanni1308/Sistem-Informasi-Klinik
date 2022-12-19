<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'Administrator')
						<li><a href="/Pasien" class="collapse"><i class="lnr lnr-file-empty"></i> <span>Pendaftaran</span></a></li>
						<li><a href="/Transaksi" class="collapse"><i class="lnr lnr-file-empty"></i> <span>Transaksi</span></a></li>
						<li><a href="/Tagihan" class="collapse"><i class="lnr lnr-book"></i> <span>Tagihan</span></a></li>
						<li>
							<a href="#Master" data-toggle="collapse" class="collapsed"><i class="lnr lnr-database"></i> <span>Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="Master" class="collapse ">
								<ul class="nav">
									<li><a href="/Wilayah" class="active"><i class="lnr lnr-layers"></i> <span>Wilayah</span></a></li>
									<li><a href="/User" class="active"><i class="lnr lnr-users"></i> <span>User</span></a></li>
									<li><a href="/Pegawai" class="active"><i class="lnr lnr-users"></i> <span>Pegawai</span></a></li>
									<li><a href="/Pasien" class="active"><i class="lnr lnr-users"></i> <span>Pasien</span></a></li>
									<li><a href="/Obat" class="active"><i class="lnr lnr-heart-pulse"></i> <span>Obat</span></a></li>
								</ul>
							</div>
						</li>
						@endif
						@if(auth()->user()->role == 'Dokter')
						<li><a href="/PendaftaranPasien" class="collapse"><i class="lnr lnr-file-empty"></i> <span>Pendaftaran</span></a></li>
						<li><a href="/Transaksi" class="collapse"><i class="lnr lnr-file-empty"></i> <span>Transaksi</span></a></li>
						@endif
					</ul>
					<script src="https://code.jquery.com/jquery-3.6.2.js"></script>
					<script type="text/javascript">
					$(document).on('click', 'ul a', function() {
						$(this).addClass('active').siblings().removeClass('active')
					})
					</script>
				</nav>
			</div>
		</div>