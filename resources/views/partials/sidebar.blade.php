<div id="app">
  <div class="active" id="sidebar">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
          <div class="logo">
            <a href="index.html">SI PIK-R</a>
          </div>
          <div class="theme-toggle d-flex align-items-center mt-2 gap-2">
            <svg class="iconify iconify--system-uicons" role="img" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
              <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                <g transform="translate(-210 -1)">
                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                  <circle cx="220.5" cy="11.5" r="4"></circle>
                  <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                  </path>
                </g>
              </g>
            </svg>
            <div class="form-check form-switch fs-6">
              <input class="form-check-input me-0" id="toggle-dark" type="checkbox">
              <label class="form-check-label"></label>
            </div>
            <svg class="iconify iconify--mdi" role="img" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
              <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
              </path>
            </svg>
          </div>
          <div class="sidebar-toggler x">
            <a class="sidebar-hide d-xl-none d-block" href="#"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">Menu</li>

          <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class='sidebar-link' href="/dashboard">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>

          @can('viewAll', \App\Models\Pembina::class)
            <li class="sidebar-item has-sub {{ Request::is('pembina', 'pikr*') ? 'active' : '' }}">
              <a class='sidebar-link' href="#">
                <i class="bi bi-stack"></i>
                <span>Data Master</span>
              </a>

              <ul class="submenu {{ Request::is('pembina', 'pikr*') ? 'active' : '' }}">
                <li class="submenu-item {{ Request::is('pembina') ? 'active' : '' }}">
                  <a href="/pembina">Data PLKB</a>
                </li>

                <li class="submenu-item {{ Request::is('pikr*') ? 'active' : '' }}">
                  <a href="/pikr">Data Pencatatan</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub {{ Request::is('spk*') ? 'active' : '' }}">
              <a class='sidebar-link' href="#">
                <i class="bi bi-capslock"></i>
                <span>SPK</span>
              </a>

              <ul class="submenu {{ Request::is('spk*') ? 'active' : '' }}">
                <li class="submenu-item {{ Request::is('spk/kriteria') ? 'active' : '' }}">
                  <a href="/spk/criteria">Kriteria</a>
                </li>
              </ul>
            </li>
          @endcan

          @can('viewAny', App\Models\Pembina::class)
            <li class="sidebar-item {{ Request::is('pikr*') ? 'active' : '' }}">
              <a class='sidebar-link' href="/pikr">
                <i class="bi bi-people-fill"></i>
                <span>Data PIK-R</span>
              </a>
            </li>
          @endcan

          @can('viewAnyRegisterKegiatan', App\Models\Laporan::class)
            <li class="sidebar-item {{ Request::is('registrasi-kegiatan*') ? 'active' : '' }}">
              <a class='sidebar-link' href="/registrasi-kegiatan">
                <i class="bi bi-envelope"></i>
                <span>Data Pelaporan</span>
              </a>
            </li>
          @endcan

          @can('viewAny', App\Models\Pembina::class)
            <li class="sidebar-item has-sub {{ Request::is('validate*') ? 'active' : '' }}">
              <a class='sidebar-link' href="#">
                <i class="bi bi-stack"></i>
                <span>Validasi</span>
              </a>

              <ul class="submenu {{ Request::is('validate*') ? 'active' : '' }}">
                <li class="submenu-item {{ Request::is('validate/pikr') ? 'active' : '' }}">
                  <a href="/validate/pikr">Registrasi PIK-R</a>
                </li>

                <li class="submenu-item {{ Request::is('validate/kegiatan') ? 'active' : '' }}">
                  <a href="/validate/kegiatan">Data Pelaporan</a>
                </li>
              </ul>
            </li>
          @endcan

          <li class="sidebar-item {{ Request::is('up/article') ? 'active' : '' }}">
            <a class="sidebar-link" href="/up/article">
              <i class="bi bi-filetype-pdf"></i>
              <span>Artikel</span>
            </a>
          </li>

          <li class="sidebar-item {{ Request::is('peringkat*') ? 'active' : '' }}">
            <a class="sidebar-link" href="/peringkat">
              <i class="bi bi-arrow-down-up"></i>
              <span>Peringkat</span>
            </a>
          </li>

          @can('viewAny', App\Models\Laporan::class)
            <li class="sidebar-title">Laporan</li>

            <li class="sidebar-item has-sub {{ Request::is('laporan/bulanan/*') ? 'active' : '' }}">
              <a class='sidebar-link' href="#">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Laporan Bulanan</span>
              </a>

              <ul class="submenu {{ Request::is('laporan/bulanan/*') ? 'active' : '' }}">
                <li class="submenu-item {{ Request::is('laporan/bulanan/7a') ? 'active' : '' }}">
                  <a href="/laporan/bulanan/7a">Tabel 7A</a>
                </li>
                <li class="submenu-item {{ Request::is('laporan/bulanan/7b') ? 'active' : '' }}">
                  <a href="/laporan/bulanan/7b">Tabel 7B</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub {{ Request::is('laporan/tahunan/*') ? 'active' : '' }}">
              <a class="sidebar-link" href="#">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Laporan Tahunan</span>
              </a>

              <ul class="submenu {{ Request::is('laporan/tahunan/*') ? 'active' : '' }}">
                <li class="submenu-item {{ Request::is('laporan/tahunan/12a') ? 'active' : '' }}">
                  <a href="/laporan/tahunan/12a">Tabel 12A</a>
                </li>
                <li class="submenu-item {{ Request::is('laporan/tahunan/12b') ? 'active' : '' }}">
                  <a href="/laporan/tahunan/12b">Tabel 12B</a>
                </li>
              </ul>
            </li>
          @endcan
        </ul>
      </div>
    </div>
  </div>
</div>
