<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="admin"><span>Tayne's </span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">

					@if(Auth::check() )
					<li class="dropdown" ><a class="dropdown-toggle" href="admin"><i class="fa fa-user-o" ></i>
						{{Auth::user()->full_name}}
					</a>
					</li>					
					<li class="dropdown" ><a class="dropdown-toggle" href="dangxuat">
						Đăng xuất
					</a>
					</li>
					
					@endif
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
@include('admin.layout.menu')