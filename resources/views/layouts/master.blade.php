<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>{{config('app.name')}}</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{asset('libs/assets/animate.css/animate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('libs/assets/font-awesome/css/font-awesome.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('libs/jquery/waves/dist/waves.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('styles/material-design-icons.css')}}" type="text/css" />

  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('styles/font.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('styles/app.css')}}" type="text/css" />
   <link rel="stylesheet" href="{{asset('libs/select2/select2.min.css')}}" type="text/css" />
<script type="text/javascript">
  var base_url = '{{url('/')}}'
</script>
</head>
<body>
<div class="app">
  

  
  <!-- aside -->
  <aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- brand -->
            <a class="navbar-brand" href="{{url('/')}}">
              <svg version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                    width: 24px; height: 24px;">
                  <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
                  <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
                  <path d="M 8 80 L 50 0 L 50 100 Z" fill="#f3f3f3"></path>
                  <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(220, 220, 220, 0.6)"></path>
                </svg>
              <img src="images/logo.png" alt="." style="max-height: 36px; display:none">
              <span class="hidden-folded m-l inline">M.S.S.L.I</span>
            </a>
            <!-- / brand -->
        </div>
        <div class="box-row">
          <div class="box-cell scrollable hover">
            <div class="box-inner">
              <div class="p hidden-folded blue-50" style="background-size:cover">
                <div class="rounded w-64 bg-white inline pos-rlt">
                  <img src=" {{asset('images/avatar1.jpg')}}" class="img-responsive rounded">
                </div>
                <a class="block m-t-sm">
                  <span class="block font-bold">{{auth()->user()->name}}</span>
                  {{auth()->user()->email}}
                </a>
              </div>
              @include('navigation.main')
            </div>
          </div>
        </div>
        <nav>
          <ul class="nav b-t b">
            <li>
              <a href="https://themeforest.net/item/materil-responsive-admin-dashboard-template/11062969" target="_blank" md-ink-ripple>
                <i class="icon mdi-action-help i-20"></i>
                <span>Help &amp; Feedback</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </aside>
  <!-- / aside -->
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
          <!-- Content Navbar -->
    <div class="navbar md-whiteframe-z1 no-radius blue">
      <!-- Open side - Naviation on mobile -->
      <a md-ink-ripple  data-toggle="modal" data-backdrop="false" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
      <!-- / -->
      <!-- Page title - Bind to $state's title -->
      <div class="navbar-item pull-left h4"></div>
      <!-- / -->
      <!-- Common tools -->
      <ul class="nav nav-sm navbar-tool pull-right">
        <li>
          <a md-ink-ripple ui-toggle-class="show" target="#search">
            <i class="mdi-action-search i-24"></i>
          </a>
        </li>
        <li class="dropdown">
          <a md-ink-ripple data-toggle="dropdown">
            <i class="mdi-navigation-more-vert i-24"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
            <li>
                    <!--  <a md-ink-ripple href="page.profile.html">
                        <i class="icon mdi-action-perm-contact-cal i-20"></i>
                        <span>My Profile</span>
                      </a> -->
                    </li>
                    @is('Admin')
                    <li>
                      <a md-ink-ripple href="page.settings.html">
                        <i class="icon mdi-action-settings i-20"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                    @endis
                    <li>
                      <a md-ink-ripple href="{{ route('logout') }}" onclick="event.preventDefault();$('#logout-form').submit();">
                        <i class="icon mdi-action-exit-to-app i-20"></i>
                        <span>Logout</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
          </ul>
        </li>
      </ul>
      <div class="pull-right" ui-view="navbar@"></div>
      <!-- / -->
      <!-- Search form -->
      <div id="search" class="pos-abt w-full h-full blue hide">
        <div class="box">
          <div class="box-col w-56 text-center">
            <!-- hide search form -->
            <a md-ink-ripple class="navbar-item inline"  ui-toggle-class="show" target="#search"><i class="mdi-navigation-arrow-back i-24"></i></a>
          </div>
          <div class="box-col v-m">
            <!-- bind to app.search.content -->
            <input class="form-control input-lg no-bg no-border" placeholder="Search" ng-model="app.search.content">
          </div>
          <div class="box-col w-56 text-center">
            <a md-ink-ripple class="navbar-item inline"><i class="mdi-av-mic i-24"></i></a>
          </div>
        </div>
      </div>
      <!-- / -->
    </div>
    <!-- Content -->

      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">
            @yield('content')
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / content -->
</div>

<script src="{{asset('plugins/jquery.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('libs/jquery/waves/dist/waves.js')}}"></script>
<script src="{{asset('scripts/ui-load.js')}}"></script>
<script src="{{asset('scripts/ui-jp.config.js')}}"></script>
<script src="{{asset('scripts/ui-jp.js')}}"></script>
<script src="{{asset('scripts/ui-nav.js')}}"></script>
<script src="{{asset('scripts/ui-toggle.js')}}"></script>
<script src="{{asset('scripts/ui-form.js')}}"></script>
<script src="{{asset('scripts/ui-waves.js')}}"></script>
<script src="{{asset('scripts/ui-client.js')}}"></script>
<script src="{{asset('libs/select2/select2.full.min.js')}}"></script>

@stack('scripts')
@yield('modal')

</body>
</html>
