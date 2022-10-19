<style>
    .nav-sm .sidebar-footer{
        width: 67px;
    }
    .nav-sm .sidebar-footer a,
    .nav-sm #logout-form input[type="submit"]{
        width:100%;
    }
    .nav-sm #logout-form span{
        left: 0 !important;
        top: -33px !important;
        /*padding: 11px 27px !important;*/
        padding: 5px 14px !important;
    }
    #logout-form input[type="submit"]{
        padding: 9px 0;
        text-align: center;
        width: 25%;
        font-size: 12px;
        display: block;
        float: left;
        background: transparent;
        cursor: pointer;
        border: none;
        color: #5A738E;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        z-index: 2;

    }
    #logout-form span:hover,
    #logout-form span:hover{
        background:#425567 !important;
        color: #23527c;

    }
</style>
<div class="sidebar-footer hidden-smalll">
    @if(Auth::user()->hasRole('admin'))
    <a data-toggle="tooltip" data-placement="top" href="{{route('settings')}}" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" href="/" title="Site">
        <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
    </a>
    @endif
    {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
    {{--</a>--}}

    <form id="logout-form" method="post" action="{{route('logout')}}">
        @csrf

        <input class="" type="submit" value="logout" style="color:transparent;position: relative;" >
        <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="
    position: relative;
    left: -54px;
    top: 0px;
    z-index: 1;
    background: #172D44;
    padding: 11px 20px;
"> Logout</span>
        {{--<a id="logout" type="submit" data-toggle="tooltip" data-placement="top" title="Logout" >--}}
            {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
        {{--</a>--}}
    </form>



</div>


