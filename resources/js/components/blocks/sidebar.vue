<template>
    <div class="app-menu navbar-menu mt-4">
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarProduct">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lý sản phẩm</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarProduct">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <router-link :to='{ name: "productList" }' class="nav-link"
                                        data-key="t-sweet-alerts">
                                        Danh sách
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to='{ name: "productCreate" }' class="nav-link"
                                        data-key="t-sweet-alerts">
                                        Thêm mới
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
</template>
