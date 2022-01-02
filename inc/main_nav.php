<?php $page="pages/".((empty($_REQUEST['nav']))?"school":$_REQUEST['nav']).".php"; ?>
<nav class="pcoded-navbar d-print-none">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">
			<div class="pcoded-navigation-label">Navigation</div>
			<ul class="pcoded-item pcoded-left-item">
				<li class="">
					<a href="index.php?nav=school" class="waves-effect waves-dark">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
					<span class="pcoded-mtext">Dashboard</span>
					</a>
				</li>

				<li class="pcoded-hasmenu">
					 <!-- active pcoded-trigger -->
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
						<span class="pcoded-mtext">Basic Modules</span>
					</a>
					<ul class="pcoded-submenu">
						<li>
							<a href="index.php?nav=school" class="waves-effect waves-dark">
								<span class="pcoded-mtext">School Details</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=students" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Students</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=teachers" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Teachers</span>
							</a>
						</li>
						<li class="">
							<a href="index.php?nav=users" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage User</span>
							</a>
						</li>
						<li class="">
							<a href="index.php?nav=classes" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Classes</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=promote_classes" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Promote Classes</span>
							</a>
						</li>
						<!-- <li>
							<a href="index.php?nav=sections" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Sections</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=cards" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Create Student Cards</span>
							</a>
						</li> -->
					</ul>
				</li>
				<li class="pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-server"></i></span>
						<span class="pcoded-mtext">Manage Attendance</span>
					</a>
					<ul class="pcoded-submenu">
						<li>
							<a href="index.php?nav=student_cards" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Student Cards</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=attendance" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Mark Attendance</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=attendance_report" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Attendance Report</span>
							</a>
						</li>
					</ul>	
				</li>
				<li class="pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-server"></i></span>
						<span class="pcoded-mtext">Manage Payements</span>
					</a>
					<ul class="pcoded-submenu">
						<li>
							<a href="index.php?nav=collect_fee" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Collect Fee</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=salary" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Pay Salaries</span>
							</a>
						</li>
					</ul>	
				</li>
				<li class="pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-inbox"></i></span>
						<span class="pcoded-mtext">Inventory System</span>
					</a>
					<ul class="pcoded-submenu">
						<li class="">
							<a href="index.php?nav=supplier" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Supplier</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=item" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Items</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=sale" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Create Sale</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=purchase" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Create Purchase</span>
							</a>
						</li>
						<li class="">
							<a href="index.php?nav=categories" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Categories</span>
							</a>
						</li>
						<li class="">
							<a href="index.php?nav=sub_categories" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Manage Sub Categories</span>
							</a>
						</li>
					</ul>	
				</li>
				<li class="pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span>
						<span class="pcoded-mtext">Reports</span>
					</a>
					<ul class="pcoded-submenu">
						<li>
							<a href="index.php?nav=fee_report" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Student Fee Report</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=salary_report" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Teacher Ledger</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=supplier_ledger" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Supplier Ledger</span>
							</a>
						</li>
						<li>
							<a href="index.php?nav=purchase_report" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Sale / Purchase Report</span>
							</a>
						</li>
					</ul>	
				</li>
				<li class="">
					<a href="logout.php" class="waves-effect waves-dark">
						<span class="pcoded-micon">
							<i class="feather icon-power"></i>
						</span>
					<span class="pcoded-mtext">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>