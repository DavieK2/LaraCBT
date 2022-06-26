<div style="position: fixed; z-index: 999; width: 100%; top:0; background-color: #fff" >
  <div class="top-bar color-scheme-transparent bg-white" style="width: 80%">
    <div class="top-menu-controls">
      <div class="logged-user-w">
        <div class="logged-user-i">
          <div class="avatar-w">
            <img alt="" src="{{ asset('assets/img/avatar1.jpg') }}">
          </div>
          <div class="logged-user-menu color-style-bright">
            <div class="logged-user-avatar-info">
              <div class="avatar-w">
                <img alt="" src="{{ asset('assets/img/avatar1.jpg') }}">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }}
                </div>
                <div class="logged-user-role">
                  {{ auth()->user()->role }}
                </div>
              </div>
            </div>
            <div class="bg-icon">
              <i class="os-icon os-icon-wallet-loaded"></i>
            </div>
            <ul>
              <li>
                <a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
              </li>
              <li>
                <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
              </li>
              <li>
                <a href="#logout" onclick="event.preventDefault();document.getElementById('logout').submit();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
              </li>
              <form action="{{ route('instructor.logout') }}" id="logout" method="post">@csrf</form>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
