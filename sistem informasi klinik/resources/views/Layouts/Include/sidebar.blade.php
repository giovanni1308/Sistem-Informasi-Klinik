<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'admin')
						<li>
							<a href="/Pasien" class=""><i class="lnr lnr-users"></i> <span>Pendaftaran Pasien</span></a>
							
						</li>
						<li>
							<a href="/Obat" class=""><i class="lnr lnr-heart-pulse"></i> <span>Obat</span></a>
							
						</li>
						@endif
					</ul>
				

				</nav>
			</div>
		</div>