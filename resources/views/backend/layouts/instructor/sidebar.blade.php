<div class="menu-w menu-has-selected-link selected-menu-color-light menu-activated-on-click 
            color-scheme-dark color-style-bright sub-menu-color-light menu-position-side 
            menu-side-left menu-layout-full sub-menu-style-inside p-0 m-0 newsidebar scrollbar-primary" style="width: 16.2rem">
    
    <div class="logo-w" style="position: fixed; width:100%; z-index:999; top:0; background-color:#0e3bb9; border-radius:0; padding-bottom: 0.4rem">
        <a class="logo" href="#home">
            <img class="pb-0" src="{{ asset('assets/img/logo.png') }}">
            <div class="logo-label">
                I-Tech Ltd
            </div>
        </a>
    </div>

    <div class="logged-user-w avatar-inline mt-5 pt-5">
        <div class="logged-user-i">
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }}
                </div>
                <div class="logged-user-role">
                   {{ ucfirst(auth()->user()->role) }}
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
            <a href="{{ route('instructor.index.dashboard') }}">
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
            <a href="{{ route('instructor.index.report') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-agenda-1"></div>
                </div>
                <span>Reports</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Reports
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-agenda-1"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{ route('instructor.index.exam') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-tasks-checked"></div>
                </div>
                <span>Online Exams</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header text-primary">
                    Online Exams
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-tasks-checked"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{ route('instructor.index.results') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-phone-21"></div>
                </div>
                <span>Exam Results</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header text-primary">
                    Exam Results
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-phone-21"></i>
                </div>
            </div>
        </li>

        <li class="sub-header">
            <span>Others</span>
        </li>

        <li class="">
            <a href="{{ route('instructor.index.school') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Schools</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Schools
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-layers"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{ route('instructor.index.class') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-cv-2"></div>
                </div>
                <span>Classes</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Classes
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-cv-2"></i>
                </div>
            </div>
        </li>

        <li class="">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle"></div>
                </div>
                <span>Account</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Account
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-user-male-circle"></i>
                </div>
            </div>
        </li>
    </ul>

</div>