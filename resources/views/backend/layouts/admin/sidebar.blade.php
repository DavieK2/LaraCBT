<div class="menu-w menu-has-selected-link selected-menu-color-light menu-activated-on-click 
            color-scheme-dark color-style-bright sub-menu-color-light menu-position-side 
            menu-side-left menu-layout-full sub-menu-style-inside p-0 m-0 newsidebar scrollbar-primary">
    
    <div class="logo-w" style="position: fixed; width:100%; z-index:999; top:0; background-color:#0e3bb9; border-radius:0">
        <a class="logo" href="#home">
            <div class="logo-element"></div>
            <div class="logo-label">
                I-Tech Ltd
            </div>
        </a>
    </div>

    <div class="logged-user-w avatar-inline mt-5 pt-5">
        <div class="logged-user-i">
            <div class="avatar-w">
                <img alt="" src="img/avatar1.jpg">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    Maria Gomez
                </div>
                <div class="logged-user-role">
                    Administrator
                </div>
            </div>
        </div>
    </div>
    <div class="menu-actions">
        <!--------------------
                START - Messages Link in secondary top menu
                -------------------->
        <div class="messages-notifications os-dropdown-trigger">
            <i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">
                12
            </div>
        </div>

        <div class="top-icon top-settings os-dropdown-trigger">
            <i class="os-icon os-icon-ui-46"></i>
        </div>

        <div class="messages-notifications os-dropdown-trigger">
            <i class="os-icon os-icon-zap"></i>
            <div class="new-messages-count">
                4
            </div>
        </div>
        <!--------------------
                END - Messages Link in secondary top menu
                -------------------->
    </div>
    <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text">
    </div>
    <h1 class="menu-page-header">
        Page Header
    </h1>
    <ul class="main-menu">
        <li class="sub-header">
            <span>Main</span>
        </li>
        <li class="">
            <a href="{{ url('/') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Dashboard
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layout"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{ url('/reports') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Reports</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Reports
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layers"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{ url('/exams') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Online Exams</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Online Exams
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layers"></i>
                </div>
            </div>
        </li>

        <li class="sub-header">
            <span>Others</span>
        </li>

        <li class="">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>School List</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    School List
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layers"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Users</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Users
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layers"></i>
                </div>
            </div>
        </li>
    </ul>

</div>