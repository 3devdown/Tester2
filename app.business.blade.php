<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
  <!-- CSRF Token --> 
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.busmp', 'Business Management Panel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('https://code.jquery.com/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.selectboxit/3.8.0/jquery.selectBoxIt.min.js"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.selectboxit/3.8.0/jquery.selectBoxIt.css" type="text/css">

    <div class="grid">
      <header class="header">
        <i class="fas fa-bars header__menu"></i>
        <div class="header__search">
        </div>

        <a class="navbar-brand" href="{{ route('business-dashboard') }}" style="color: black;">
          {{ config('app.busn', 'BUSINESS NAME') }}
        </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

        <select class="country" id="country" onchange="javascript:location.href = this.value;">
          <option disabled selected>{{ __('Language') }}</option>
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if($properties['native'] == "English")
              <option hreflang="{{ $localeCode }}" value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" data-iconurl="https://www.countryflags.io/us/flat/32.png" @if(app()->getLocale() == 'en') {{ 'selected' }} @endif>{{ __('US')}}</option>
            @elseif($properties['native'] == "ไทย")
              <option hreflang="{{ $localeCode }}" value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" data-iconurl="https://www.countryflags.io/th/flat/32.png" @if(app()->getLocale() == 'th') {{ 'selected' }} @endif>{{ __('TH')}}</option>
            {{-- @elseif($properties['native'] == "日本語")
              <option hreflang="{{ $localeCode }}" value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" data-iconurl="https://www.countryflags.io/jp/flat/32.png" @if(app()->getLocale() == 'ja') {{ 'selected' }} @endif>{{ __('JP')}}</option> --}}
            @endif 
          @endforeach
        </select>
        
        {{-- <div class="header__avatar">
          <img style="width: 35px; border-radius: 50px;"  src="https://pugpuppiesforhomes.com/wp-content/uploads/2020/11/ig.pughub-20201020-0002.jpg">
          <div class="dropdown">
            <ul class="dropdown__list">
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="far fa-user"></i></span>
                  <span class="dropdown__title">My Profile</span>
              </li>
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="fas fa-clipboard-list"></i></span>
                <span class="dropdown__title">My Account</span>
              </li>
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="dropdown__title"><a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" style="color: rgb(121, 121, 121);">
                  {{ __('Logout') }}
                </a></span>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div> --}}

      <div class="hidden sm:flex sm:items-center sm:ml-6">
        <!-- Settings Dropdown -->
        <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                {{-- {{ Auth::user()->name }} --}}
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
        &emsp;&emsp;{{ Auth::user()->name }}&emsp;
    </div>
      
</header> 
<body>

<aside class="sidenav">
  <div class="sidenav__profile">
    <div><img style="width: 250px; margin-left: 0px; padding: 20px" src="/img/KS-Logo.png" ></div>
  </div>
  {{-- <a class="navbar-brand" href="{{ route('business-dashboard') }}" style="color: black;">
    {{ config('app.busn', 'BUSINESS NAME') }}
  </a> --}}
  <div class="row row--align-v-center row--align-h-center">
    <ul class="navList">
      <li class="navList__heading"><a class="navbar-brand" href="{{ route('business-dashboard') }}" style="color: white;" >{{ __('msg.home') }}</a></li>
      {{-- <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">User Management</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Add User</li>
          <li class="subList__item">View User</li>
        </ul>
      </li> --}}
      
      <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">{{ __('msg.deptmn') }}</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item"><a href="{{ LaravelLocalization::localizeUrl(route('department.add')) }}" style="color: white;">{{ __('msg.adddept') }}</a></li>
          <li class="subList__item"><a href="{{ LaravelLocalization::localizeUrl(route('department.view')) }}" style="color: white;">{{ __('msg.updept') }}</a></li>
        </ul>
      </li>
      {{-- <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Employee Management</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Add Employee</li>
          <li class="subList__item">View Employee</li>
        </ul>
      </li> --}}

      {{-- <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Shops</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Add Shop</li>
          <li class="subList__item">View Shop</li>
        </ul>
      </li>
      <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Product</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Add Product</li>
          <li class="subList__item">View Product</li>
        </ul>
      </li>
      <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Inventory</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Inventory Check </li>
          <li class="subList__item">Inventory Update </li>
          <li class="subList__item">Inventory Transaction </li>
        </ul>
      </li>
      <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Sales</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Sales Order</li>
          <li class="subList__item">Sales Invoice</li>
        </ul>
      </li> --}}
      {{-- <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">Purchase</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">Purchase Order</li>
        </ul>
      </li> --}}
      <li>
        <div class="navList__subheading row row--align-v-center">
          <span class="navList__subheading-title">{{ __('msg.help') }}</span>
        </div>
        <ul class="subList subList--hidden">
          <li class="subList__item">{{ __('msg.manual') }}</li>
        </ul>
      </li>
    </div>
  </aside>
  <section style="background-color: cornsilk;a">
    <!-- Business Dashboard-->
    @yield('business-content')
    @yield('department-add')
    @yield('department-view')
    <!--End Business Dashboard-->
  </section>
</body>
<footer class="page-footer">
  <center><small> Power by Cloud2Works</small></center>
</footer>
</html>
<style>

  .page-footer {
    background-color: pink;
    padding: 15px;
  }
  html, body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
}

a {
    text-decoration: none;
}

.text-light {
    font-weight: 300;
}

.text-bold {
    font-weight: bold;
}

.row {
    display: flex;
    margin-left: -25px;
}
.row--align-v-center {
    align-items: center;
}
.row--align-h-center {
    justify-content: center;
}

.grid {
    position: relative;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 50px 1fr 50px;
    grid-template-areas: "header" "main" "footer";
    height: 100vh;
    overflow-x: hidden;
}
.grid--noscroll {
    overflow-y: hidden;
}

.header {
    grid-area: header;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: pink;
}
.header__menu {
    position: fixed;
    padding: 13px;
    left: 12px;
    background-color: #DADAE3;
    border-radius: 50%;
    z-index: 1;
}
.header__menu:hover {
    cursor: pointer;
}
.header__search {
    margin-left: 55px;
    font-size: 20px;
    color: #777;
}
.header__input {
    border: none;
    background: transparent;
    padding: 12px;
    font-size: 20px;
    color: #777;
}
.header__input:focus {
    outline: none;
    border: none;
}
.header__avatar {
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.2);
    position: relative;
    margin: 0 26px;
    width: 35px;
    height: 35px;
    cursor: pointer;
}
.header__avatar:after {
    position: absolute;
    content: "";
    width: 6px;
    height: 6px;
    background: none;
    border-left: 2px solid #777;
    border-bottom: 2px solid #777;
    transform: rotate(-45deg) translateY(-50%);
    top: 50%;
    right: -18px;
}

.dropdown {
    position: absolute;
    top: 54px;
    right: -16px;
    width: 220px;
    height: auto;
    z-index: 1;
    background-color: #fff;
    border-radius: 4px;
    visibility: hidden;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
}
.dropdown__list {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
.dropdown__list-item {
    padding: 12px 24px;
    color: #777;
    text-transform: capitalize;
}
.dropdown__list-item:hover {
    background-color: rgba(0, 0, 0, 0.1);
}
.dropdown__icon {
    color: #1BBAE1;
}
.dropdown__title {
    margin-left: 10px;
}
.dropdown:before {
    position: absolute;
    content: "";
    top: -6px;
    right: 30px;
    width: 0;
    height: 0;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-bottom: 6px solid #FFF;
}
.dropdown--active {
    visibility: visible;
    opacity: 1;
    transform: translateY(0);
}

.sidenav {
    position: fixed;
    grid-area: sidenav;
    height: 100%;
    overflow-y: visible;
    background-color: pink;
    color: #FFF;
    width: 250px;
    transform: translateX(-245px);
    transition: all 0.6s ease-in-out;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
    z-index: 1;
}
.sidenav__brand {
    position: relative;
    display: flex;
    align-items: center;
    padding: 0 16px;
    height: 50px;
    background-color: rgba(0, 0, 0, 0.15);
}
.sidenav__brand-icon {
    margin-top: 2px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.5);
}
.sidenav__brand-close {
    position: absolute;
    right: 8px;
    top: 8px;
    visibility: visible;
    color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
}
.sidenav__brand-link {
    font-size: 18px;
    font-weight: bold;
    color: #FFF;
    margin: 0 15px;
    letter-spacing: 1.5px;
}
.sidenav__profile {
    display: flex;
    align-items: center;
    min-height: 90px;
    background-color: rgba(255, 255, 255, 0.1);
}
.sidenav__profile-avatar {
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.2);
    height: 64px;
    width: 64px;
    margin: 0 15px;
}
.sidenav__profile-title {
    font-size: 17px;
    letter-spacing: 1px;
}
.sidenav__arrow {
    position: absolute;
    content: "";
    width: 6px;
    height: 6px;
    top: 50%;
    right: 20px;
    border-left: 2px solid rgba(255, 255, 255, 0.5);
    border-bottom: 2px solid rgba(255, 255, 255, 0.5);
    transform: translateY(-50%) rotate(225deg);
}
.sidenav__sublist {
    list-style-type: none;
    margin: 0;
    padding: 10px 0 0;
}
.sidenav--active {
    transform: translateX(0);
}

.navList {
    width: 262px;
    padding: 0;
    margin: 0;
    background-color: hotpink;
    list-style-type: none;
}
.navList__heading {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 16px 3px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    font-size: 15px;
}
.navList__subheading {
    position: relative;
    padding: 5px 10px;
    color: #fff;
    margin: 0;
    background-color: #ff99cc;
    font-size: 16px;
    text-transform: capitalize;
}
.navList__subheading-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    width: 12px;
}
.navList__subheading-title {
    margin: 5 5px;
}
.navList__subheading:after {
    position: absolute;
    content: "";
    height: 6px;
    width: 6px;
    top: 16px;
    right: 10px;
    border-left: 1px solid rgba(255, 255, 255, 0.5);
    border-bottom: 1px solid rgba(255, 255, 255, 0.5);
    transform: rotate(225deg);
    transition: all 0.2s;
}
.navList__subheading:hover {
    background-color: ##9d9e9e;
    cursor: pointer;
}
.navList__subheading--open {
    background-color: ##9d9e9e;
}
.navList__subheading--open:after {
    transform: rotate(315deg);
}
.navList .subList {
    padding: 0;
    margin: 0;
    list-style-type: none;
    background-color: #ff99cc;
    visibility: visible;
    overflow: hidden;
    max-height: 200px;
    transition: all 0.4s ease-in-out;
}
.navList .subList__item {
    padding: 8px;
    text-transform: capitalize;
    background-color: #ff99cc;
    padding: 8px 20px;
    color: white;
}
.navList .subList__item:first-child {
    padding-top: 15px;
}
.navList .subList__item:hover {
    background-color: rgba(255, 255, 255, 0.1);
    cursor: pointer;
}
.navList .subList--hidden {
    visibility: hidden;
    max-height: 0;
}

.main {
    grid-area: main;
    background-color: #EAEDF1;
    color: #394263;
}
.main__cards {
    display: block;
    column-count: 1;
    column-gap: 20px;
    margin: 20px;
}

.main-header {
    position: relative;
    display: flex;
    justify-content: space-between;
    height: 250px;
    color: #FFF;
    background-size: cover;
    background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1609106/lake-shadow-water.jpg");
    margin-bottom: 20px;
    
}
.main-header__intro-wrapper {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 160px;
    padding: 12px 30px;
    background: rgba(255, 255, 255, 0.12);
    font-size: 26px;
    letter-spacing: 1px;
}
.main-header__welcome {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.main-header__welcome-title {
    margin-bottom: 8px;
    font-size: 26px;
}
.main-header__welcome-subtitle {
    font-size: 18px;
}

.quickview {
    display: grid;
    grid-auto-flow: column;
    grid-gap: 60px;
}
.quickview__item {
    display: flex;
    align-items: center;
    flex-direction: column;
}
.quickview__item-total {
    margin-bottom: 2px;
    font-size: 32px;
}
.quickview__item-description {
    font-size: 16px;
    text-align: center;
}

.main-overview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(265px, 1fr));
    grid-auto-rows: 94px;
    grid-gap: 30px;
    margin: 20px;
}

.overviewCard {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px;
    background-color: #FFF;
    transform: translateY(0);
    transition: all 0.3s;
}
.overviewCard-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    font-size: 21px;
    color: #fff;
}
.overviewCard-icon--document {
    background-color: #e67e22;
}
.overviewCard-icon--calendar {
    background-color: #27ae60;
}
.overviewCard-icon--mail {
    background-color: #e74c3c;
}
.overviewCard-icon--photo {
    background-color: #af64cc;
}
.overviewCard-description {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.overviewCard-title {
    font-size: 18px;
    color: black !important;
    margin: 0;
}
.overviewCard-subtitle {
    margin: 2px;
    color: #777;
}
.overviewCard:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.card {
    display: flex;
    flex-direction: column;
    width: 100%;
    background-color: #fff;
    margin-bottom: 20px;
    -webkit-column-break-inside: avoid;
}
.card__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 50px;
    background-color: #394263;
    color: #FFF;
}
.card__header-title {
    margin: 0 20px;
    font-size: 20px;
    letter-spacing: 1.2px;
}
.card__header-link {
    font-size: 16px;
    color: #1BBAE1;
    letter-spacing: normal;
    display: inline-block;
}
.card__main {
    position: relative;
    padding-right: 20px;
    background-color: #FFF;
}
.card__main:after {
    content: "";
    position: absolute;
    top: 0;
    left: 120px;
    bottom: 0;
    width: 2px;
    background-color: #f0f0f0;
}
.card__secondary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    grid-auto-rows: 100px;
    grid-gap: 25px;
    padding: 20px;
    background-color: #FFF;
}
.card__photo {
    background-image: url("../../img/pumpkin-carving.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-color: slategray;
    transform: scale(1);
    transition: transform 0.3s ease-in-out;
    width: 100%;
    height: 100%;
}
.card__photo:hover {
    transform: scale(1.1);
    cursor: pointer;
}
.card__photo-wrapper {
    overflow: hidden;
}
.card__row {
    position: relative;
    display: flex;
    flex: 1;
    margin: 15px 0 20px;
}
.card__icon {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    content: "";
    width: 30px;
    height: 30px;
    top: 0;
    left: 121px;
    transform: translateX(-50%);
    border-radius: 50%;
    color: #FFF;
    background-color: #1BBAE1;
    z-index: 1;
}
.card__row:nth-child(even) .card__icon {
    background-color: #e74c3c;
}
.card__time {
    display: flex;
    flex: 1;
    justify-content: flex-end;
    max-width: 80px;
    margin-left: 15px;
    text-align: right;
    font-size: 14px;
    line-height: 2;
}
.card__detail {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding-left: 12px;
    margin-left: 48px;
    transform: translateX(0);
    transition: all 0.3s;
}
.card__detail:hover {
    background-color: #f0f0f0;
    transform: translateX(4px);
    cursor: pointer;
}
.card__source {
    line-height: 1.8;
    color: #1BBAE1;
}
.card__note {
    margin: 10px 0;
    color: #777;
}
.card--finance {
    position: relative;
}

.settings {
    display: flex;
    margin: 8px;
    align-self: flex-start;
    background-color: rgba(255, 255, 255, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 2px;
}
.settings__block {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
    color: #394263;
    font-size: 11px;
}
.settings__block:not(:last-child) {
    border-right: 1px solid rgba(0, 0, 0, 0.1);
}
.settings__icon {
    padding: 0px 3px;
    font-size: 12px;
}
.settings__icon:hover {
    background-color: rgba(255, 255, 255, 0.8);
    cursor: pointer;
}
.settings:hover {
    background-color: #fff;
    cursor: pointer;
}

.documents {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(105px, 1fr));
    grid-auto-rows: 214px;
    grid-gap: 12px;
    height: auto;
    background-color: #FFF;
}

.document {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 15px 0 0;
    flex-direction: column;
}
.document__img {
    width: 105px;
    height: 136px;
    background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1609106/doc-1.png");
    background-size: cover;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: transform 0.3s ease;
}
.document__img:hover {
    transform: translateY(-4px);
}
.document__title {
    margin: 8px 0 2px;
    color: #777;
}
.document__date {
    font-size: 10px;
}

.footer {
    grid-area: footer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 16px;
    color: #777;
    background-color: pink;
}
.footer-page {
    background-color: pink;
    padding-top: 15px;
    color: black;
}
.footer__copyright {
    color: #1BBAE1;
}
.footer__icon {
    color: #e74c3c;
}
.footer__signature {
    color: #1BBAE1;
    cursor: pointer;
    font-weight: bold;
}

@media only screen and (min-width: 46.875em) { 
    .grid {
      display: grid;
      grid-template-columns: 240px calc(100% - 240px);
      grid-template-rows: 50px 1fr 50px;
      grid-template-areas: "sidenav header" "sidenav main" "sidenav footer";
      height: 100vh;
  }

  .sidenav {
      position: relative;
      transform: translateX(0);
  }
  .sidenav__brand-close {
      visibility: hidden;
  }

  .main-header__intro-wrapper {
      padding: 0 30px;
  }

  .header__menu {
      display: none;
  }
  .header__search {
      margin-left: 20px;
  }
  .header__avatar {
      width: 40px;
      height: 40px;
  }
}
@media only screen and (min-width: 65.625em) {
.main__cards {
  column-count: 2;
}

.main-header__intro-wrapper {
  flex-direction: row;
}
.main-header__welcome {
  align-items: flex-start;
}
}
</style>
<script>
/* Scripts for css grid dashboard */
$("#country").selectBoxIt();

$(document).ready(() => {
  addResizeListeners();
  setSidenavListeners();
  setUserDropdownListener();
  renderChart();
  setMenuClickListener();
  setSidenavCloseListener();
});

// Set constants and grab needed elements
const sidenavEl = $('.sidenav');
const gridEl = $('.grid');
const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

function toggleClass(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// User avatar dropdown functionality
function setUserDropdownListener() {
  const userAvatar = $('.header__avatar');

  userAvatar.on('click', function(e) {
    const dropdown = $(this).children('.dropdown');
    toggleClass(dropdown, 'dropdown--active');
  });
}

// Sidenav list sliding functionality
function setSidenavListeners() {
  const subHeadings = $('.navList__subheading'); console.log('subHeadings: ', subHeadings);
  const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
  const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

  subHeadings.each((i, subHeadingEl) => {
    $(subHeadingEl).on('click', (e) => {
      const subListEl = $(subHeadingEl).siblings();

      // Add/remove selected styles to list category heading
      if (subHeadingEl) {
        toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
      }

      // Reveal/hide the sublist
      if (subListEl && subListEl.length === 1) {
        toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
      }
    });
  });
}
function toggleClass(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// If user opens the menu and then expands the viewport from mobile size without closing the menu,
// make sure scrolling is enabled again and that sidenav active class is removed
function addResizeListeners() {
  $(window).resize(function(e) {
    const width = window.innerWidth; console.log('width: ', width);

    if (width > 750) {
      sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
      gridEl.removeClass(GRID_NO_SCROLL_CLASS);
    }
  });
}

// Menu open sidenav icon, shown only on mobile
function setMenuClickListener() {
  $('.header__menu').on('click', function(e) { console.log('clicked menu icon');
    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
  });
}

// Sidenav close icon
function setSidenavCloseListener() {
  $('.sidenav__brand-close').on('click', function(e) {
    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
  });
}

  </script>