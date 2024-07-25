@php $permissions = Session::get('permArray'); @endphp

<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                   
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('dashboard')}}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('product')}}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Product</span></a>
                        <div class="triangle"></div>
                    </li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>