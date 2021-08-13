<!DOCTYPE html>
<!--
 =========================================================
* Black Dashboard PRO - v1.1.1
=========================================================

* Product Page: https://themes.getbootstrap.com/product/black-dashboard-pro-premium-bootstrap-4-admin/
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
--><html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="https://apps.telkomakses.co.id/portal/assets/img/favicon.png">
  <link rel="icon" type="image/png" href="https://apps.telkomakses.co.id/portal/assets/img/favicon.png">
  <title>
    TelkomAkses.
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/css-nucleo-icons.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>assets/css/css-black-dashboard.min.css" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url() ?>assets/css/demo-demo.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/buttons.dataTables.min.css" rel="stylesheet">

    <style type="text/css">
        .tg  {border-collapse: inherit !important;}
        .tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#444;
            font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#fff;
            font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-x1q4{background-color: #eceff3;border-color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-x1q5{background-color: #f6d3d9;border-color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-w4n1{background-color:#6c757d;border-color:#000000;color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-2bvr{background-color: #e0e4e7;border-color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-tilr{background-color:#f5365c;border-color:#000000;color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-hjjl{background-color: #898d93;border-color:#000000;color:#ffffff;text-align:center;vertical-align:center}
        .tg .tg-5h8a{background-color:#f9e9ec;border-color:#ffffff;text-align:left;vertical-align:center;color: black}
        .tg-table {
            max-height: 30em;
            overflow: scroll;
            position: relative;
        }

        .tg {
            position: relative;
        }

        td, th {
            padding: 0.25em;
        }

        thead tr.first th, thead tr.first td {
            position: sticky !important;
            top: 0px;
            background: #eee;
        }

        thead tr.second th, thead tr.second td {
            position: sticky !important;
            top: 42px;
            background: #eee;
        }

        thead th:first-child {
            left: 0;
            z-index: 1;
        }

        tbody th {
            position: -webkit-sticky; /* for Safari */
            position: sticky;
            left: 0;
        }

        button.dt-button, div.dt-button, a.dt-button {
            display: none !important;
        }
    </style>
</head>

<body class="sidebar-mini white-content">
  <div class="wrapper">
    <div class="navbar-minimize-fixed">
      <button class="minimize-sidebar btn btn-link btn-just-icon">
        <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
        <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
      </button>
    </div>
    <div class="sidebar" data="red">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
              <link rel="icon" type="image/png" href="https://apps.telkomakses.co.id/portal/assets/img/favicon.png">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Telkom Akses
          </a>
        </div>
        <ul class="nav">
          <li class="active">
            <a href="dashboard.html">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
            <!--<li>
              <a data-toggle="collapse" href="#pagesExamples">
                <i class="tim-icons icon-image-02"></i>
                <p>
                  Pages
                  <b class="caret"></b>
                </p>
              </a>
              <div class="collapse" id="pagesExamples">
                <ul class="nav">
                  <li>
                    <a href="pricing.html">
                      <span class="sidebar-mini-icon">P</span>
                      <span class="sidebar-normal"> Pricing </span>
                    </a>
                  </li>
                  <li>
                    <a href="rtl.html">
                      <span class="sidebar-mini-icon">RS</span>
                      <span class="sidebar-normal"> RTL Support </span>
                    </a>
                  </li>
                  <li>
                    <a href="timeline.html">
                      <span class="sidebar-mini-icon">T</span>
                      <span class="sidebar-normal"> Timeline </span>
                    </a>
                  </li>
                  <li>
                    <a href="login.html">
                      <span class="sidebar-mini-icon">L</span>
                      <span class="sidebar-normal"> Login </span>
                    </a>
                  </li>
                  <li>
                    <a href="register.html">
                      <span class="sidebar-mini-icon">R</span>
                      <span class="sidebar-normal"> Register </span>
                    </a>
                  </li>
                  <li>
                    <a href="lock.html">
                      <span class="sidebar-mini-icon">LS</span>
                      <span class="sidebar-normal"> Lock Screen </span>
                    </a>
                  </li>
                  <li>
                    <a href="user.html">
                      <span class="sidebar-mini-icon">UP</span>
                      <span class="sidebar-normal"> User Profile </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
              <li>
                <a data-toggle="collapse" href="#componentsExamples">
                  <i class="tim-icons icon-molecule-40"></i>
                  <p>
                    Components
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="componentsExamples">
                  <ul class="nav">
                    <li>
                      <a data-toggle="collapse" aria-expanded="false" href="#multicollapse">
                        <span class="sidebar-mini-icon">MLT</span>
                        <span class="sidebar-normal"> Multi Level Collapse
                          <b class="caret"></b>
                        </span>
                      </a>
                      <div class="collapse" id="multicollapse">
                        <ul class="nav">
                          <li>
                            <a href="examples.html">
                              <span class="sidebar-mini-icon">E</span>
                              <span class="sidebar-normal"> Example </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="buttons.html">
                        <span class="sidebar-mini-icon">B</span>
                        <span class="sidebar-normal"> Buttons </span>
                      </a>
                    </li>
                    <li>
                      <a href="grid.html">
                        <span class="sidebar-mini-icon">G</span>
                        <span class="sidebar-normal"> Grid System </span>
                      </a>
                    </li>
                    <li>
                      <a href="panels.html">
                        <span class="sidebar-mini-icon">P</span>
                        <span class="sidebar-normal"> Panels </span>
                      </a>
                    </li>
                    <li>
                      <a href="sweet-alert.html">
                        <span class="sidebar-mini-icon">SA</span>
                        <span class="sidebar-normal"> Sweet Alert </span>
                      </a>
                    </li>
                    <li>
                      <a href="notifications.html">
                        <span class="sidebar-mini-icon">N</span>
                        <span class="sidebar-normal"> Notifications </span>
                      </a>
                    </li>
                    <li>
                      <a href="icons.html">
                        <span class="sidebar-mini-icon">I</span>
                        <span class="sidebar-normal"> Icons </span>
                      </a>
                    </li>
                    <li>
                      <a href="typography.html">
                        <span class="sidebar-mini-icon">T</span>
                        <span class="sidebar-normal"> Typography </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a data-toggle="collapse" href="#formsExamples">
                  <i class="tim-icons icon-notes"></i>
                  <p>
                    Forms
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="formsExamples">
                  <ul class="nav">
                    <li>
                      <a href="regular.html">
                        <span class="sidebar-mini-icon">RF</span>
                        <span class="sidebar-normal"> Regular Forms </span>
                      </a>
                    </li>
                    <li>
                      <a href="extended.html">
                        <span class="sidebar-mini-icon">EF</span>
                        <span class="sidebar-normal"> Extended Forms </span>
                      </a>
                    </li>
                    <li>
                      <a href="validation.html">
                        <span class="sidebar-mini-icon">V</span>
                        <span class="sidebar-normal"> Validation Forms </span>
                      </a>
                    </li>
                    <li>
                      <a href="wizard.html">
                        <span class="sidebar-mini-icon">W</span>
                        <span class="sidebar-normal"> Wizard </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a data-toggle="collapse" href="#tablesExamples">
                  <i class="tim-icons icon-puzzle-10"></i>
                  <p>
                    Tables
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="tablesExamples">
                  <ul class="nav">
                    <li>
                      <a href="regular.html">
                        <span class="sidebar-mini-icon">RT</span>
                        <span class="sidebar-normal"> Regular Tables </span>
                      </a>
                    </li>
                    <li>
                      <a href="extended.html">
                        <span class="sidebar-mini-icon">ET</span>
                        <span class="sidebar-normal"> Extended Tables </span>
                      </a>
                    </li>
                    <li>
                      <a href="datatables.net.html">
                        <span class="sidebar-mini-icon">DT</span>
                        <span class="sidebar-normal"> DataTables.net </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a data-toggle="collapse" href="#mapsExamples">
                  <i class="tim-icons icon-pin"></i>
                  <p>
                    Maps
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="mapsExamples">
                  <ul class="nav">
                    <li>
                      <a href="google.html">
                        <span class="sidebar-mini-icon">GM</span>
                        <span class="sidebar-normal"> Google Maps </span>
                      </a>
                    </li>
                    <li>
                      <a href="fullscreen.html">
                        <span class="sidebar-mini-icon">FM</span>
                        <span class="sidebar-normal"> Full Screen Map </span>
                      </a>
                    </li>
                    <li>
                      <a href="vector.html">
                        <span class="sidebar-mini-icon">VM</span>
                        <span class="sidebar-normal"> Vector Map </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="widgets.html">
                  <i class="tim-icons icon-settings"></i>
                  <p>Widgets</p>
                </a>
              </li>
              <li>
                <a href="charts.html">
                  <i class="tim-icons icon-chart-bar-32"></i>
                  <p>Charts</p>
                </a>
              </li>
              <li>
                <a href="calendar.html">
                  <i class="tim-icons icon-time-alarm"></i>
                  <p>Calendar</p>
                </a>
              </li>-->
        </ul>
      </div>
    </div>
    <div class="main-panel" data="red">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize d-inline">
              <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip" data-original-title="Sidebar toggle" data-placement="right">
                <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
                <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
              </button>
            </div>
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"><?= $page_title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <!--<img src="images/img-mike.jpg">-->
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider">
                  </li><li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none">
            </li></ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

        <?php

        $this->load->view($main_view);

        ?>

      <!--<footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Creative Tim
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
          <div class="copyright">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>-->
    </div>
  </div>
  <!--<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="red"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">
          Sidebar Mini
        </li>
        <li class="adjustments-line">
          <div class="togglebutton switch-sidebar-mini">
            <span class="label-switch">OFF</span>
            <input type="checkbox" name="checkbox" checked class="bootstrap-switch" data-on-label="" data-off-label="">
            <span class="label-switch label-right">ON</span>
          </div>
          <div class="togglebutton switch-change-color mt-3">
            <span class="label-switch">LIGHT MODE</span>
            <input type="checkbox" name="checkbox" checked class="bootstrap-switch" data-on-label="" data-off-label="">
            <span class="label-switch label-right">DARK MODE</span>
          </div>
        </li>
        <li class="button-container mt-4">
          <a href="introduction.html" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/ct-black-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>-->
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/js/core-jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core-popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core-bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins-perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins-moment.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?= base_url() ?>assets/js/plugins-bootstrap-switch.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?= base_url() ?>assets/js/plugins-sweetalert2.min.js"></script>
  <!--  Plugin for Sorting Tables -->
  <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/js/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>assets/js/buttons.html5.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?= base_url() ?>assets/js/plugins-jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url() ?>assets/js/plugins-nouislider.min.js"></script>
  <!-- Chart JS -->
  <script src="<?= base_url() ?>assets/js/plugins-chartjs.min.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?= base_url() ?>assets/js/plugins-bootstrap-selectpicker.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');
        $full_page = $('.full-page');
        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;
        window_width = $(window).width();
        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>

    $(document).ready(function() {
        function GetColumnPrefix(colIndex) {
            switch (colIndex) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                    return "I-OAN ";
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                    return "MO SPBU ";
                case 11:
                case 12:
                case 13:
                case 14:
                case 15:
                    return "MS NTE ";
                case 16:
                case 17:
                case 18:
                case 19:
                case 20:
                    return "PROVISIONING BGES ";
                case 21:
                case 22:
                case 23:
                case 24:
                case 25:
                    return "PROVISIONING WIBS ";
                case 26:
                case 27:
                case 28:
                case 29:
                case 30:
                    return "SDI ";
                case 31:
                case 32:
                case 33:
                case 34:
                case 35:
                    return "TDM ";
                case 36:
                case 37:
                case 38:
                case 39:
                case 40:
                    return "TDS ";
                case 41:
                case 42:
                case 43:
                case 44:
                case 45:
                    return "GRAND TOTAL ";
                default:
                    return "";
            }
        }

        function GetColumnPrefix2(colIndex) {
            switch (colIndex) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                    return "BOD ";
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                    return "CORP. OFFICE ";
                case 11:
                case 12:
                case 13:
                case 14:
                case 15:
                    return "SQM ";
                case 16:
                case 17:
                case 18:
                case 19:
                case 20:
                    return "CONSTRUCTION ";
                case 21:
                case 22:
                case 23:
                case 24:
                case 25:
                    return "HCM ";
                case 26:
                case 27:
                case 28:
                case 29:
                case 30:
                    return "IT ";
                case 31:
                case 32:
                case 33:
                case 34:
                case 35:
                    return "OPERATION ";
                case 36:
                case 37:
                case 38:
                case 39:
                case 40:
                    return "PROVISIONING ";
                case 41:
                case 42:
                case 43:
                case 44:
                case 45:
                    return "QE & GAMAS ";
                case 46:
                case 47:
                case 48:
                case 49:
                case 50:
                    return "SNC ";
                case 51:
                case 52:
                case 53:
                case 54:
                case 55:
                    return "INTEGRASI SPBU ";
                case 56:
                case 57:
                case 58:
                case 59:
                case 60:
                    return "TDS 2 ";
                case 61:
                case 62:
                case 63:
                case 64:
                case 65:
                    return "GRAND TOTAL ";
                default:
                    return "";
            }
        }

        var buttonCommon = {
            exportOptions: {
                columns: ':visible',
                format: {
                    header: function(data, columnindex, trDOM, node) {
                        debugger;
                        return GetColumnPrefix(columnindex) + data;
                    }
                }
            }
        };

        var buttonCommon2 = {
            exportOptions: {
                columns: ':visible',
                format: {
                    header: function(data, columnindex, trDOM, node) {
                        debugger;
                        return GetColumnPrefix2(columnindex) + data;
                    }
                }
            }
        };

        $('#headcount').DataTable( {
            dom: 'Bfrtip',
            order: [],
            bFilter: false,
            bInfo: false,
            bPaginate: false,
            buttons: [
                $.extend(true, {}, buttonCommon, {
                    extend: 'excelHtml5'
                }),
            ]

        } );

        $('#nonheadcount').DataTable( {
            dom: 'Bfrtip',
            order: [],
            bFilter: false,
            bInfo: false,
            bPaginate: false,
            buttons: [
                $.extend(true, {}, buttonCommon2, {
                    extend: 'excelHtml5'
                }),
            ]
        } );

        $('#all').DataTable( {
            dom: 'Bfrtip',
            order: [],
            bFilter: false,
            bInfo: false,
            bPaginate: false,
            buttons: [
                $.extend(true, {}, buttonCommon2, {
                    extend: 'excelHtml5'
                }),
            ]
        } );

        $('#detil').DataTable( {
            dom: 'Bfrtip',
            order: [],
            buttons: ['excel']
        } );
    } );
  </script>
  <?= $javascript ?>
</body>

</html>
