<aside class="app-sidebar" id="sidebar">

	<!-- Start::main-sidebar-header -->
	<div class="main-sidebar-header">
		<a href="<?php echo base_url(); ?>" class="header-logo">
			<img src="<?php echo base_url('assets/img/brand-logos/mpoksiti.png'); ?>" alt="logo"
				class="w-8 h-8 object-contain main-logo desktop-logo">
			<img src="<?php echo base_url('assets/img/brand-logos/mpoksiti.png'); ?>" alt="logo"
				class="w-8 h-8 object-contain main-logo toggle-logo">
			<img src="<?php echo base_url('assets/img/brand-logos/mpoksiti.png'); ?>" alt="logo"
				class="w-8 h-8 object-contain main-logo desktop-dark">
			<img src="<?php echo base_url('assets/img/brand-logos/mpoksiti.png'); ?>" alt="logo"
				class="w-8 h-8 object-contain main-logo toggle-dark">

		</a>
	</div>
	<!-- End::main-sidebar-header -->

	<!-- Start::main-sidebar -->
	<div class="main-sidebar " id="sidebar-scroll">

		<!-- Start::nav -->
		<nav class="main-menu-container nav nav-pills flex-column sub-open">
			<div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
					height="24" viewBox="0 0 24 24">
					<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
				</svg></div>
			<ul class="main-menu">
				<!-- Start::slide__category -->
				<li class="slide__category"><span class="category-name">Main Navigations</span></li>
				<!-- End::slide__category -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="/" class="side-menu__item">
						<i class="ri-home-8-line side-menu__icon"></i>
						<span class="side-menu__label">Dashboards</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="/daftar-lhu" class="side-menu__item">
						<i class="ti ti-file-description side-menu__icon"></i>
						<span class="side-menu__label">Daftar LHU</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				<li class="slide  has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<i class="ti ti-zoom-check side-menu__icon"></i>
						<span class="side-menu__label">Verifikasi</span>
						<i class="ri ri-arrow-right-s-line side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1"><a href="javascript:void(0)">Verifikasi</a></li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Verifikasi
								FPPC</a></li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Verifikasi
								LHUS</a></li>
					</ul>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="javascript:void(0);" class="side-menu__item">
						<i class="ti ti-mail-exclamation side-menu__icon"></i>
						<span class="side-menu__label">Disposisi Ke Penyelia</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				<li class="slide  has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<i class="ti ti-eye side-menu__icon"></i>
						<span class="side-menu__label">Referensi Penyelia</span>
						<i class="ri ri-arrow-right-s-line side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1"><a href="javascript:void(0)">Referensi Penyelia</a></li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Wadah</a>
						</li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Bentuk</a>
						</li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>"
								class="side-menu__item">Organoleptik</a></li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Kode Asal
								Sampel</a></li>
						<li class="slide"><a href="<?php echo base_url('index'); ?>" class="side-menu__item">Permintaan
								Uji</a></li>
					</ul>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="/user" class="side-menu__item">
						<i class="ti ti-user-plus side-menu__icon"></i>
						<span class="side-menu__label">Daftar User</span>
					</a>
				</li>
				<!-- End::slide -->

			</ul>
			<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
					height="24" viewBox="0 0 24 24">
					<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
				</svg></div>
		</nav>
		<!-- End::nav -->

	</div>
	<!-- End::main-sidebar -->

</aside>