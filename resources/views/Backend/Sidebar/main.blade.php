
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="/admin/dashboard"><i class="fa fa-tachometer"></i> Dashboard <span class="fa fa-chevron-right"></span></a>
            <li><a href="{{route('bookings')}}"><i class="fa fa-calendar"></i> Bookings <span class="fa fa-chevron-right"></span></a>

            </li>
            <li><a href="{{route('trips')}}"><i class="fa fa-calendar"></i> Trips <span class="fa fa-chevron-right"></span></a>

            </li>
            <li><a href="{{route('customers')}}"><i class="fa fa-user"></i> Customers <span class="fa fa-chevron-right"></span></a>
            </li>
            <li><a href="/admin/cars"><i class="fa fa fa-car"></i> Cars <span class="fa fa-chevron-right"></span></a>
            </li>
            <li><a href="{{route('drivers')}}"><i class="fa fa-user"></i> Drivers <span class="fa fa-chevron-right"></span></a>

            </li>
            <li><a href="{{route('invoice.select')}}"><i class="fa fa-file-o"></i> Invoice <span class="fa fa-chevron-right"></span></a>

            </li>
            <li><a href="{{route('bills')}}"><i class="fa fa-file-o"></i> Bills <span class="fa fa-chevron-right"></span></a>

            </li>
            <li><a><i class="fa fa-globe"></i> Locations <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('locations')}}">Locations</a></li>
                    <li><a href="{{route('airports')}}">Airports</a></li>
                </ul>
            </li>
            {{--<li><a href="{{route('fairs')}}"><i class="fa fa-table"></i> Fair Chart <span class="fa fa-chevron-down"></span></a>--}}
            {{--</li>--}}
            {{--<li><a href="{{route('users')}}"><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>--}}
                {{--<ul class="nav child_menu">--}}
                    {{--<li><a href="{{route('users')}}">Users</a></li>--}}
                    {{--<li><a href="{{route('roles')}}">Roles</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>
