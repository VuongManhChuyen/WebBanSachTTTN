<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div
        id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
        <div
            class="spinner-border text-primary"
            style="width: 3rem; height: 3rem"
            role="status"
        >
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="/adminn" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">
                    <i class="fa fa-user-edit me-2"></i>VMC Tiger
                </h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img
                        class="rounded-circle"
                        src="{{ asset('admin/img/user.jpg')}}"
                        alt=""
                        style="width: 40px; height: 40px"
                    />
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"
                    ></div>
                </div>
                <div class="ms-3">
                    {{-- <h6 class="mb-0">{{Auth::user()->name}}</h6> --}}
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="/category" class="nav-item nav-link "
                    ><i class="fa fa-tachometer-alt me-2"></i
                    >Danh Mục</a
                >
                <div class="nav-item dropdown">
                    <a
                        href="/book"
                        class="nav-link "
                        ><i class="fa fa-laptop me-2"></i>Sách</a
                    >
                    {{-- <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item"
                            >Buttons</a
                        >
                        <a href="typography.html" class="dropdown-item"
                            >Typography</a
                        >
                        <a href="element.html" class="dropdown-item"
                            >Other Elements</a
                        >
                    </div> --}}
                </div>
                <a href="/promotion" class="nav-item nav-link"
                    ><i class="fa fa-th me-2"></i>Khuyến Mại</a
                >
                <a href="/banner" class="nav-item nav-link"
                    ><i class="fa fa-keyboard me-2"></i>Banner Marketing</a
                >
                <a href="/order" class="nav-item nav-link"
                    ><i class="fa fa-table me-2"></i>Hóa Đơn</a
                >
                <a href="/status" class="nav-item nav-link"
                ><i class="fa fa-table me-2"></i>Trạng thái</a
            >
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                        ><i class="far fa-file-alt me-2"></i>Phân Quyền</a
                    >
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="/role" class="dropdown-item"
                            >PHÂN QUYỀN</a
                        >
                        <a href="/user" class="dropdown-item"
                            >TÀI KHOẢN</a
                        >
                    </div>
                </div>
                {{-- <a href="/role" class="nav-item nav-link"
                    ><i class="fa fa-chart-bar me-2"></i>Phân Quyền</a --}}
                <a href="/author" class="nav-item nav-link"
                    ><i class="far fa-file-alt me-2"></i>Tác Giả</a
                >
                <div class="nav-item dropdown">
                    <a
                        href="/coupon"
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                        ><i class="far fa-file-alt me-2"></i>Pages</a
                    >
                    {{-- <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item"
                            >Sign In</a
                        >
                        <a href="signup.html" class="dropdown-item"
                            >Sign Up</a
                        >
                        <a href="404.html" class="dropdown-item"
                            >404 Error</a
                        >
                        <a href="blank.html" class="dropdown-item"
                            >Blank Page</a
                        >
                    </div> --}}
                </div>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav
            class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0"
        >
            <a
                href="index.html"
                class="navbar-brand d-flex d-lg-none me-4"
            >
                <h2 class="text-primary mb-0">
                    <i class="fa fa-user-edit"></i>
                </h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input
                    class="form-control bg-dark border-0"
                    type="search"
                    placeholder="Search"
                />
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                    >
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex"
                            >Message</span
                        >
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0"
                    >
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img
                                    class="rounded-circle"
                                    src="{{ asset('admin/img/user.jpg')}}"
                                    alt=""
                                    style="width: 40px; height: 40px"
                                />
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">
                                        Jhon send you a message
                                    </h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img
                                    class="rounded-circle"
                                    src="{{ asset('admin/img/user.jpg')}}"
                                    alt=""
                                    style="width: 40px; height: 40px"
                                />
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">
                                        Jhon send you a message
                                    </h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img
                                    class="rounded-circle"
                                    src="admin/img/user.jpg"
                                    alt=""
                                    style="width: 40px; height: 40px"
                                />
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">
                                        Jhon send you a message
                                    </h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                        <a href="#" class="dropdown-item text-center"
                            >See all message</a
                        >
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                    >
                        <img
                            class="rounded-circle me-lg-2"
                            src="{{ asset('admin/img/user.jpg')}}"
                            alt=""
                            style="width: 40px; height: 40px"
                        />
                        <span class="d-none d-lg-inline-flex"
                            {{-- >{{Auth::user()->name}}</span --}}
                        >
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0"
                    >
                        <a href="profile" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="logout" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->