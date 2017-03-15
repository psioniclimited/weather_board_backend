<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
        <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
        </a>        
    </li>
    <li {!! Request::is('boarddata') ? ' class="treeview active"' : ' class="treeview"' !!}>
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Weather Board</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {!! Request::is('boarddata') ? ' class="active"' : null !!}><a href="{{url('boarddata')}}"><i class="fa fa-circle-o"></i>View Board</a></li>
        </ul>
    </li>
    <li {!! Request::is('allusers') || Request::is('create_users') ? ' class="treeview active"' : ' class="treeview"' !!}>
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {!! Request::is('allusers') ? ' class="active"' : null !!}><a href="{{url('allusers')}}"><i class="fa fa-circle-o"></i> All User</a></li>
            <li {!! Request::is('create_users') ? ' class="active"' : null !!}><a href="{{url('create_users')}}"><i class="fa fa-circle-o"></i> New User</a></li>            
        </ul>
    </li>

    <li {!! Request::is('roles') || Request::is('permissions') ? ' class="treeview active"' : ' class="treeview"' !!}>
        <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {!! Request::is('roles') || Request::is('permissions') ? ' class="treeview active"' : ' class="treeview"' !!}>
                <a href="#"><i class="fa fa-circle-o"></i> Permissions
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! Request::is('roles') ? ' class="active"' : null !!}><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                    <li {!! Request::is('permissions') ? ' class="active"' : null !!}><a href="{{url('permissions')}}"><i class="fa fa-circle-o"></i> Permission</a></li>                    
                </ul>
            </li>
        </ul>
    </li>
</ul>