<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
            <!--begin::Brand Image-->
{{--            <img--}}
{{--                src="../assets/img/AdminLTELogo.png"--}}
{{--                alt="AdminLTE Logo"--}}
{{--                class="brand-image opacity-75 shadow"--}}
{{--            />--}}
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Пиринея</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
                <li class="nav-item">
                    <a href="{{ route('invoice_parameters.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-invoice"></i>
                        <p>Фактури</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('items.index') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fa-solid fa-bowl-rice"></i>--}}
{{--                        <p>Съставки</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fa-solid fa-users"></i>--}}
{{--                        <p>--}}
{{--                            Контрагенти--}}
{{--                            <i class="nav-arrow fa-solid fa-chevron-right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview" role="navigation" aria-label="Navigation 15" style="box-sizing: border-box; display: none;">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('suppliers.index') }}" class="nav-link">--}}
{{--                                <i class="nav-icon fa-solid fa-person-arrow-down-to-line"></i>--}}
{{--                                <p>Доставчици</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('clients.index') }}" class="nav-link">--}}
{{--                                <i class="nav-icon fa-solid fa-person-arrow-up-from-line"></i>--}}
{{--                                <p>Клиенти</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
