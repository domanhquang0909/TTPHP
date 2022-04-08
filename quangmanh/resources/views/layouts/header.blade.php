<aside style="background: rgba(0,0,0,.01);border-bottom: rgba(0,0,0,.04) solid 1px" class="main-sidebar elevation-4">

    <div class="sidebar" style="font-size: 14px;">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a class="nav-link btn-primary " style="color: black;">
             <i class="fa fa-user" aria-hidden="true"></i>
              <p style="font-size: 24px;">
                USER
                <i class="right fas fa-angle-left" "></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
            @if(Auth::User()->role == 1)
            <li class="active">
                <a href="addUsers" class="nav-link">
                <i class="fa fa-plus" aria-hidden="true"></i>
                  <p>Thêm User</p>
                </a>
                <li>
               @endif
                <a href="list" class="nav-link">
                <i class="fa fa-address-card" aria-hidden="true"></i>
                  <p>Danh sách User </p>
                </a>
                </li>
            </ul>

          </li>
        </ul>
      </nav>

    </div>

  </aside>


<!-- <aside style="background: rgba(0,0,0,.01);border-bottom: rgba(0,0,0,.04) solid 1px" class="main- elevation-4">
      <div class="sidebar">
          <div class="row">
              <div class="user-panel col-3">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a class="nav-link " href="#">Active link</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Active link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
              </div>
          </div>
      </div>
  </aside> -->
