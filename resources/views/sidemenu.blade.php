<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
        <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
        </a>        
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('allusers')}}"><i class="fa fa-circle-o"></i> All User</a></li>
            <li><a href="{{url('create_users')}}"><i class="fa fa-circle-o"></i> New User</a></li>            
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#"><i class="fa fa-circle-o"></i> Permissions
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                    <li><a href="{{url('permissions')}}"><i class="fa fa-circle-o"></i> Permission</a></li>                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-circle-o"></i> Companies
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('companyinfo')}}"><i class="fa fa-circle-o"></i> Company Info</a></li>
                    <li><a href="{{url('branches')}}"><i class="fa fa-circle-o"></i> Branches</a></li>                    
                </ul>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Product List</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> New Product</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Product Group</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Product Sub-Group</a></li>            
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>Accounts</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('chart_of_ac')}}"><i class="fa fa-circle-o"></i> Chart Of Accounts</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Transactions</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
    </li>

</ul>