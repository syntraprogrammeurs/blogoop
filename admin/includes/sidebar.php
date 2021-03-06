<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blog <sup>2</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
	<!-- USERS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
	            <a class="collapse-item" href="users.php">All users</a>
                <a class="collapse-item" href="add_user.php">Create user</a>
            </div>
        </div>
    </li>
    <!-- ROLES -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
		   aria-controls="collapseThree">
			<i class="fas fa-user"></i>
			<span>Roles</span>
		</a>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="roles.php">All roles</a>
				<a class="collapse-item" href="add_role.php">Create Role</a>
			</div>
		</div>
	</li>


    <!-- UPLOAD -->
	<li class="nav-item">
		<a class="nav-link" href="#">
			<i class="fas fa-upload"></i>
			<span>Upload</span>
			</a>
	</li>

    <!-- PHOTOS -->
	<li class="nav-item">
		<a class="nav-link" href="#">
			<i class="fas fa-camera-retro"></i>
			<span>Photos</span>
		</a>
	</li>

    <!-- COMMENTS -->
	<li class="nav-item">
		<a class="nav-link" href="#">
			<i class="far fa-comment"></i>
			<span>Comments</span>
		</a>
	</li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>