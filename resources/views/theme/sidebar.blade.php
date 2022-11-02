@cannot('Customer')
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                @can('Admin')
                <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu">
                        <a href="#dashboard" data-active="{{ (Request::route()->getPrefix() == '/admin') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ (Request::route()->getPrefix() == '/admin') ? 'true' : 'false'}}" class="dropdown-toggle {{ (Request::route()->getPrefix() == '/admin') ? '' : 'collapsed' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>

                        <ul class="collapse submenu list-unstyled {{ (Request::route()->getPrefix() == '/admin') ? 'show' : '' }}" id="dashboard" data-parent="#accordionExample">

                            <li class="{{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : '' }}">
                                <a href="{{ route('admin.dashboard') }}"> Overview </a>
                            </li>

                            <li class="{{ (Route::currentRouteName() == 'admin.reports') ? 'active' : '' }}">
                                <a href="{{ route('admin.reports') }}"> Reports </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                            <a href="#booking" data-active="{{ (Request::route()->getPrefix() == 'admin/bookings') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/bookings') ? 'true' : 'false'}}" class="dropdown-toggle {{ (Request::route()->getPrefix() == 'admin/bookings') ? '' : 'collapsed' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span>Booking</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ (Request::route()->getPrefix() == 'admin/bookings') ? 'show' : '' }}" id="booking" data-parent="#accordionExample">

                                <li class="{{ (Route::currentRouteName() == 'booking.bookings') ? 'active' : '' }}">
                                    <a href="{{ route('booking.bookings') }}"> Bookings </a>
                                </li>

                                <li class="{{ (Route::currentRouteName() == 'booking.completed') ? 'active' : '' }}">
                                    <a href="{{ route('booking.completed') }}"> Completed </a>
                                </li>
                                <li class="{{ (Route::currentRouteName() == 'booking.cancelled') ? 'active' : '' }}">
                                    <a href="{{ route('booking.cancelled') }}"> Cancelled </a>
                                </li>
                            </ul>
                        </li>
                    <li class="menu">
                        <a href="{{route('booking.quick.bookings.index')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/bookings/quickBooking') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/bookings/quickBooking') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Quick Bookings</span>
                            </div>
                        </a>
                    </li>
{{--                    <li class="menu">--}}
{{--                        <a href="{{route('booking.bookings')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/bookings') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/bookings') ? 'true' : 'false' }}" class="dropdown-toggle">--}}
{{--                            <div class="">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>--}}
{{--                                 <span>Bookings</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="menu">
                        <a href="{{route('trip.trips')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/trips') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/trips') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Trips</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{route('customers')}}" data-active="{{ (Route::currentRouteName() == 'customers') ? 'true' : 'false' }}" aria-expanded="{{ (Route::currentRouteName() == 'customers') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
{{--                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 48C352 21.49 373.5 0 400 0C426.5 0 448 21.49 448 48C448 74.51 426.5 96 400 96C373.5 96 352 74.51 352 48zM304.6 205.4C289.4 212.2 277.4 224.6 271.2 240.1L269.7 243.9C263.1 260.3 244.5 268.3 228.1 261.7C211.7 255.1 203.7 236.5 210.3 220.1L211.8 216.3C224.2 185.4 248.2 160.5 278.7 146.9L289.7 142C310.5 132.8 332.1 128 355.7 128C400.3 128 440.5 154.8 457.6 195.9L472.1 232.7L494.3 243.4C510.1 251.3 516.5 270.5 508.6 286.3C500.7 302.1 481.5 308.5 465.7 300.6L439 287.3C428.7 282.1 420.6 273.4 416.2 262.8L406.6 239.8L387.3 305.3L436.8 359.4C442.2 365.3 446.1 372.4 448 380.2L471 472.2C475.3 489.4 464.9 506.8 447.8 511C430.6 515.3 413.2 504.9 408.1 487.8L386.9 399.6L316.3 322.5C301.5 306.4 295.1 283.9 301.6 262.8L318.5 199.3C317.6 199.7 316.6 200.1 315.7 200.5L304.6 205.4zM292.7 344.2L333.4 388.6L318.9 424.8C316.5 430.9 312.9 436.4 308.3 440.9L246.6 502.6C234.1 515.1 213.9 515.1 201.4 502.6C188.9 490.1 188.9 469.9 201.4 457.4L260.7 398L285.7 335.6C287.8 338.6 290.2 341.4 292.7 344.2H292.7zM223.1 274.1C231.7 278.6 234.3 288.3 229.9 295.1L186.1 371.8C185.4 374.5 184.3 377.2 182.9 379.7L118.9 490.6C110 505.9 90.44 511.1 75.14 502.3L19.71 470.3C4.407 461.4-.8371 441.9 7.999 426.6L71.1 315.7C80.84 300.4 100.4 295.2 115.7 303.1L170.1 335.4L202.1 279.1C206.6 272.3 216.3 269.7 223.1 274.1H223.1z"/></svg>--}}
                                <span>Customers</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{route('cars.cars')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/cars') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/cars') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
{{--                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 0C369.7 0 384 14.33 384 32V64L384 64.15C422.6 66.31 456.3 91.49 469.2 128.3L504.4 228.8C527.6 238.4 544 261.3 544 288V480C544 497.7 529.7 512 512 512H480C462.3 512 448 497.7 448 480V432H128V480C128 497.7 113.7 512 96 512H64C46.33 512 32 497.7 32 480V288C32 261.3 48.36 238.4 71.61 228.8L106.8 128.3C119.7 91.49 153.4 66.31 192 64.15L192 64V32C192 14.33 206.3 0 224 0L352 0zM197.4 128C183.8 128 171.7 136.6 167.2 149.4L141.1 224H434.9L408.8 149.4C404.3 136.6 392.2 128 378.6 128H197.4zM128 352C145.7 352 160 337.7 160 320C160 302.3 145.7 288 128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352zM448 288C430.3 288 416 302.3 416 320C416 337.7 430.3 352 448 352C465.7 352 480 337.7 480 320C480 302.3 465.7 288 448 288z"/></svg>--}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                                <span>Cars</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">

                        <a href="#users" data-active="{{ (Request::route()->getPrefix() == 'admin/locations') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/locations') ? 'true' : 'false'}}" class="dropdown-toggle {{ (Request::route()->getPrefix() == 'admin/locations') ? '' : 'collapsed' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                <span>Locations</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>

                        <ul class="collapse submenu list-unstyled {{ (Request::route()->getPrefix() == 'admin/locations') ? 'show' : '' }}" id="users" data-parent="#accordionExample">

                            <li class="{{ (Route::currentRouteName() == 'location.locations') ? 'active' : '' }}">
                                <a href="{{ route('location.locations') }}"> Locations </a>
                            </li>

                            <li class="{{ (Route::currentRouteName() == 'airport.airports') ? 'active' : '' }}">
                                <a href="{{ route('airport.airports') }}"> Airports </a>
                            </li>
                            <li class="{{ (Route::currentRouteName() == 'fairs') ? 'active' : '' }}">
                                <a href="{{ route('fairs') }}"> Fair Details </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="{{route('driver.drivers')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/drivers') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/drivers') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                <span>Drivers</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{route('invoice.select')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/invoices') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/invoices') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                <span>Invoice</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{route('bill.bills')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/bills') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/bills') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                <span>Bills</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{route('user.users')}}" data-active="{{ (Request::route()->getPrefix() == 'admin/users') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'admin/users') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Users</span>
                            </div>
                        </a>
                    </li>


                </ul>
                @endcan
                @can('Driver')
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a href="{{route('driver.dashboard')}}" data-active="{{ (Request::route()->getPrefix() == 'drivers/dashboard') ? 'true' : 'false' }}" aria-expanded="{{ (Request::route()->getPrefix() == 'drivers/dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                    <span>Trips</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                @endcan
            </nav>

        </div>
@endcannot
