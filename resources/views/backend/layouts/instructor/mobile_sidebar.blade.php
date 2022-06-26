<div class="menu-mobile menu-activated-on-click color-scheme-dark menu-layout-full newsidebar">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="#"><img src="{{ asset('assets/img/logo.png')}}"><span>I-Tech Ltd</span></a>
        <div class="mm-buttons">
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }}
                </div>
                <div class="logged-user-role">
                   {{ auth()->user()->role }}
                </div>
            </div>
        </div>
        <!--------------------
            START - Mobile Menu List
            -------------------->
        <ul class="main-menu">
            <li class="">
                <a href="{{ route('instructor.index.dashboard') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-layout"></div>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('instructor.index.report') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-agenda-1"></div>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('instructor.index.exam') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-tasks-checked"></div>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('instructor.index.results') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-phone-21"></div>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('instructor.index.school') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-layers"></div>
                    </div>
                </a>
          </li>
          <li class="">
            <a href="{{ route('instructor.index.class') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-cv-2"></div>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle"></div>
                </div>
            </a>
        </li>
        </ul>
        <!--------------------
            END - Mobile Menu List
            -------------------->
    </div>
</div>