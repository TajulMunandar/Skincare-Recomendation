<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex align-items-center" href="/">
            <dotlottie-player src="https://lottie.host/6ce1b254-dca4-43d8-a3ab-9df2eb15c1d8/TCErIhQ5p4.json" background="transparent" speed="1" style="width: 30px; height: 30px;" loop autoplay></dotlottie-player>
            <span class="ms-1 font-weight-bold">Rekomendasi Skincare</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-70 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-duotone fa-gauge {{ Request::is('dashboard') ? '' : 'text-dark' }} fs-6 "></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/rekomendasi') ? 'active' : '' }}" href="/dashboard/rekomendasi">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-radar {{ Request::is('dashboard/rekomendasi') ? '' : 'text-dark' }} fs-6 "></i>
                    </div>
                    <span class="nav-link-text ms-1">Rekomendasi</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Master</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/product') ? 'active' : '' }}" href="/dashboard/product">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-bottle-droplet {{ Request::is('dashboard/product') ? '' : 'text-dark' }} fs-6 "></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user') ? 'active' : '' }}" href="/dashboard/user">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user {{ Request::is('dashboard/user') ? '' : 'text-dark' }} fs-6 "></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn bg-gradient-primary mt-4 w-100"  type="button">Logout</button>
        </form>
      </div>
</aside>
