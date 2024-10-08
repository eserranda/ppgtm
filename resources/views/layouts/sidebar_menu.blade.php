  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

      <div data-simplebar class="h-100">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title">Menu</li>

                  <li>
                      <a href="/dashboard" class="waves-effect">
                          <i class="mdi mdi-view-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode']))
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                              <i class="mdi mdi-email-multiple-outline"></i>
                              <span>Administrasi</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="/klasis">Klasis</a></li>
                              <li><a href="/jemaat">Jemaat</a></li>
                          </ul>
                      </li>
                  @endif

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode']))
                      <li class="menu-title">sinode</li>

                      <li>
                          <a href="/pengurus-sinode" class="waves-effect">
                              <i class="mdi mdi-home-flood"></i>
                              <span>Pengurus Sinode</span>
                          </a>
                      </li>

                      <li>
                          <a href="wilayah-pelayanan" class=" waves-effect">
                              <i class="mdi mdi-shield-cross-outline"></i>
                              <span>Wilayah Pelayanan</span>
                          </a>
                      </li>

                      <li>
                          <a href="program-kerja" class=" waves-effect">
                              <i class="mdi mdi-format-float-left"></i>
                              <span>Program Kerja Sinode</span>
                          </a>
                      </li>
                  @endif

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode', 'klasis']))
                      <li class="menu-title">klasis</li>
                      <li>
                          <a href="program-kerja-klasis" class=" waves-effect">
                              <i class="mdi mdi-format-float-left"></i>
                              <span>Program Kerja Klasis</span>
                          </a>
                      </li>
                      <li>
                          <a href="/pengurus-klasis" class="waves-effect">
                              <i class="mdi mdi-home-flood"></i>
                              <span>Pengurus Klasis</span>
                          </a>
                      </li>
                  @endif

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode', 'jemaat', 'ketua_umum', 'sekretaris', 'ketua_1', 'ketua_2', 'ketua_3']))
                      <li class="menu-title">Jemaat</li>
                      <li>
                          <a href="program-kerja-jemaat" class=" waves-effect">
                              <i class="mdi mdi-clipboard-text-play-outline"></i>
                              <span>Program Kerja Jemaat</span>
                          </a>
                      </li>
                  @endif

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode', 'jemaat']))
                      <li>
                          <a href="/pengurus-jemaat" class="waves-effect">
                              <i class="mdi mdi-home-flood"></i>
                              <span>Pengurus PPGTM</span>
                          </a>
                      </li>

                      <li>
                          <a href="anggota-pemuda-jemaat" class=" waves-effect">
                              <i class="mdi mdi-account-supervisor"></i>
                              <span>Anggota PPGTM</span>
                          </a>
                      </li>

                      <li>
                          <a href="jadwal-ibadah" class=" waves-effect">
                              <i class="mdi mdi-clipboard-list-outline"></i>
                              <span>Jadwal Ibadah</span>
                          </a>
                      </li>
                  @endif

                  @if (auth()->user()->hasAnyRole(['super_admin', 'sinode']))
                      <li class="menu-title">Authications</li>

                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                              <i class="mdi mdi-account-supervisor"></i>
                              <span>Data Users</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="/users-klasis">Klasis</a></li>
                              <li><a href="/users-jemaat">Jemaat</a></li>
                              <li><a href="/users">Users</a></li>
                          </ul>
                      </li>

                      {{-- <li>
                          <a href="users" class=" waves-effect">
                              <i class="mdi mdi-account-supervisor"></i>
                              <span>Data User</span>
                          </a>
                      </li> --}}

                      <li>
                          <a href="roles" class=" waves-effect">
                              <i class="mdi mdi-clipboard-list-outline"></i>
                              <span>Role</span>
                          </a>
                      </li>
                  @endif

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-account-group"></i>
                          <span>Authentication</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="auth-login.html">Login</a></li>
                          <li><a href="auth-register.html">Register</a></li>
                          <li><a href="auth-recoverpw.html">Recover Password</a></li>
                          <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-google-pages"></i>
                          <span>Pages</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="pages-starter.html">Starter Page</a></li>
                          <li><a href="pages-maintenance.html">Maintenance</a></li>
                          <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                          <li><a href="pages-timeline.html">Timeline</a></li>
                          <li><a href="pages-gallery.html">Gallery</a></li>
                          <li><a href="pages-faqs.html">FAQs</a></li>
                          <li><a href="pages-pricing.html">Pricing</a></li>
                          <li><a href="pages-404.html">Error 404</a></li>
                          <li><a href="pages-500.html">Error 500</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li class="menu-title">Components</li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-format-underline"></i>
                          <span>Bootstrap UI</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="ui-alerts.html">Alerts</a></li>
                          <li><a href="ui-badge.html">Badge</a></li>
                          <li><a href="ui-buttons.html">Buttons</a></li>
                          <li><a href="ui-cards.html">Cards</a></li>
                          <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                          <li><a href="ui-navs.html">Navs</a></li>
                          <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                          <li><a href="ui-modals.html">Modals</a></li>
                          <li><a href="ui-images.html">Images</a></li>
                          <li><a href="ui-progressbars.html">Progress Bars</a></li>
                          <li><a href="ui-pagination.html">Pagination</a></li>
                          <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                          <li><a href="ui-spinner.html">Spinner</a></li>
                          <li><a href="ui-carousel.html">Carousel</a></li>
                          <li><a href="ui-video.html">Video</a></li>
                          <li><a href="ui-typography.html">Typography</a></li>
                          <li><a href="ui-grid.html">Grid</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-package-variant-closed"></i>
                          <span>Advanced UI</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="advanced-alertify.html">Alertify</a></li>
                          <li><a href="advanced-rating.html">Rating</a></li>
                          <li><a href="advanced-nestable.html">Nestable</a></li>
                          <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                          <li><a href="advanced-sweet-alert.html">Sweet-Alert</a></li>
                          <li><a href="advanced-lightbox.html">Lightbox</a></li>
                          <li><a href="advanced-maps.html">Maps</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-black-mesa"></i>
                          <span>Icons</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="icons-materialdesign.html">Material Design</a></li>
                          <li><a href="icons-dripicons.html">Dripicons</a></li>
                          <li><a href="icons-fontawesome.html">Font Awesome 5</a></li>
                          <li><a href="icons-themify.html">Themify</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-table-settings"></i>
                          <span>Tables</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="tables-basic.html">Basic Tables</a></li>
                          <li><a href="tables-datatable.html">Data Tables</a></li>
                          <li><a href="tables-responsive.html">Responsive Table</a></li>
                          <li><a href="tables-editable.html">Editable Table</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="waves-effect">
                          <i class="mdi mdi-file-document-box-check-outline"></i>
                          <span class="badge badge-pill badge-danger float-right">07</span>
                          <span>Forms</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="form-elements.html">Form Elements</a></li>
                          <li><a href="form-validation.html">Form Validation</a></li>
                          <li><a href="form-advanced.html">Form Advanced</a></li>
                          <li><a href="form-editors.html">Form Editors</a></li>
                          <li><a href="form-uploads.html">Form File Upload</a></li>
                          <li><a href="form-mask.html">Form Mask</a></li>
                          <li><a href="form-summernote.html">Summernote</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-poll"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="charts-morris.html">Morris</a></li>
                          <li><a href="charts-apex.html">Apex</a></li>
                          <li><a href="charts-chartist.html">Chartist</a></li>
                          <li><a href="charts-chartjs.html">Chartjs</a></li>
                          <li><a href="charts-flot.html">Flot</a></li>
                          <li><a href="charts-sparkline.html">Sparkline</a></li>
                          <li><a href="charts-knob.html">Jquery Knob</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-flip-horizontal"></i>
                          <span>Layouts</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                          <li><a href="layouts-sidebar-sm.html">Small Sidebar</a></li>
                          <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                          <li><a href="layouts-dark-topbar.html">Dark Topbar</a></li>
                          <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                      </ul>
                  </li> --}}

                  {{-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-share-variant"></i>
                          <span>Multi Level</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="true">
                          <li><a href="javascript: void(0);">Level 1.1</a></li>
                          <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                              <ul class="sub-menu" aria-expanded="true">
                                  <li><a href="javascript: void(0);">Level 2.1</a></li>
                                  <li><a href="javascript: void(0);">Level 2.2</a></li>
                              </ul>
                          </li>
                      </ul>
                  </li> --}}

              </ul>

              {{-- <div class="sidebar-section mt-5 mb-3">
                  <h6 class="text-reset font-weight-medium">
                      Project Completed
                      <span class="float-right">67%</span>
                  </h6>
                  <div class="progress mt-3" style="height: 4px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67"
                          aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div> --}}
          </div>
          <!-- Sidebar -->
      </div>
  </div>
  <!-- Left Sidebar End -->
