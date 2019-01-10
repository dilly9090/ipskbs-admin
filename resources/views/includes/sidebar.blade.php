<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								@php
									$path=Request::path();
								@endphp
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="{{$path=='home' ? 'active' : ''}}"><a href="{{url('home')}}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
								<li class="{{strpos($path,'data')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-stack"></i> <span>Data</span></a>
									<ul>
										<li class="{{strpos($path,'data-laporan')!==false ? 'active' : ''}}"><a href="{{url('data-laporan')}}">Laporan Kejadian Bencana Sosial</a></li>
										<li class="{{strpos($path,'data-bantuan-santuan')!==false ? 'active' : ''}}"><a href="{{url('data-bantuan-santuan')}}">Bantuan Santunan Kematian</a></li>
										<li class="{{strpos($path,'data-bantuan-jaminan')!==false ? 'active' : ''}}"><a href="{{url('data-bantuan-jaminan')}}">Bantuan Jaminan Hidup</a></li>
										<li class="{{strpos($path,'data-bantuan-bahan-bangunan')!==false ? 'active' : ''}}"><a href="{{url('data-bantuan-bahan-bangunan')}}">Bantuan Bahan Bangunan</a></li>
									</ul>
								</li>
								{{-- <li class="{{$path=='sebaran-peta' ? 'active' : ''}}"><a href="{{url('sebaran-peta')}}"><i class="icon-map4"></i> <span>Peta</span></a></li> --}}
								{{-- <li class="{{$path=='iku' ? 'active' : ''}}"><a href="{{url('iku')}}"><i class="icon-stack2"></i> <span>IKU</span></a></li> --}}
								<hr>
								@if (Auth::user()->level==0)
									<li class="{{strpos($path,'master')!==false ? 'active' : ''}}"><a href={{url('master')}}><i class="icon-list"></i> <span>Master Data</span></a></li>
								@endif
								<li><a href={{url('logout')}}><i class="icon-switch"></i> <span>Logout</span></a></li>
								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>