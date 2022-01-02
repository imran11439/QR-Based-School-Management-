<nav class="navbar header-navbar pcoded-header d-print-none">
	<div class="navbar-wrapper">
		<div class="navbar-logo">
			<a href="index.php">
				<img class="img-fluid" src="img/login.png" alt="Theme-Logo" />
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu icon-toggle-right"></i>
			</a>
			<a class="mobile-options waves-effect waves-light">
				<i class="feather icon-more-horizontal"></i>
			</a>
			</div>
			<div class="navbar-container container-fluid">
				<ul class="nav-left">
					<li>
						<a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" class="waves-effect waves-light" data-cf-modified-156b9b10b63ca6603d23aac5-="">
						<i class="full-screen feather icon-maximize"></i>
						</a>
					</li>
				</ul>
			<ul class="nav-right">
			<li class="user-profile header-notification">
			<div class="dropdown-primary dropdown">
			<div class="dropdown-toggle" data-toggle="dropdown">
			<img src="img/<?=$fetchUserlogin['user_pic']?>" class="img-radius" alt="User-Profile-Image">
			<span><?=$fetchUserlogin['user_name'] ?></span>
			<i class="feather icon-chevron-down"></i>
			</div>
			<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
			<li>
			<a href="index.php?nav=users">
			<i class="feather icon-settings"></i> Settings
			</a>
			</li>
			<li>
			<a href="logout.php">
			<i class="feather icon-log-out"></i> Logout
			</a>
			</li>
			</ul>
			</div>
			</li>
			</ul>
		</div>
	</div>
</nav>