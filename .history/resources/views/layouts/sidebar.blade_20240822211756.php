<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                @admin
                    <li>
                        <a href="{{ route('root') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-contact">@lang('sidebar.dashboard')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('billet.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('billet.index') }}" class="waves-effect">
                            <i class="bx bx-credit-card"></i>
                            <span>@lang('b')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('visas.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('visas.index') }}" class="waves-effect">
                            <i class="bx bx-credit-card"></i>
                            <span>@lang('visas')</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('actualites.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('actualites.index') }}" class="waves-effect">
                            <i class="bx bx-news"></i> <!-- Icon for news -->
                            <span>@lang('Actualités')</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('assurances.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('assurances.index') }}" class="waves-effect">
                            <i class="bx bx-shield-quarter"></i> <!-- Example icon for insurance -->
                            <span>@lang('Assurances')</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('assurance-formulaire.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('assurance-formulaire.index') }}" class="waves-effect">
                            <i class="bx bxs-shield"></i> <!-- Updated icon for Assurance Client -->
                            <span>@lang('Assurance Client')</span>
                        </a>
                    </li>                    

                    <li class="{{ request()->routeIs('consultations.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('consultations.index') }}" class="waves-effect">
                            <i class="bx bx-calendar"></i> <!-- Example icon for consultations -->
                            <span>@lang('Consultations')</span>
                        </a>
                    </li> 
              
                    <li class="{{ request()->routeIs('consultation-formulaire.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('consultation-formulaire.index') }}" class="waves-effect">
                            <i class="bx bxs-user-voice"></i> <!-- Updated icon for consultations -->
                            <span>@lang('Consultation Client')</span>
                        </a>
                    </li>                    
                    
                    <li class="{{ request()->routeIs('contact.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('contact.index') }}" class="waves-effect">
                            <i class="bx bx-envelope"></i>
                            <span>@lang('Contact')</span>
                        </a>
                    </li>  
                    <li class="{{ request()->routeIs('reviews.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('reviews.index') }}" class="waves-effect">
                            <i class="bx bx-star"></i>

                            <span>@lang('Reviews')</span>
                        </a>
                    </li>  
                @else
                    {{-- USER ROUTES  --}}
                    <li>
                        <a href="{{ route('profile') }}" class="waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-contact">@lang('sidebar.my_profile')</span>
                        </a>
                    </li>

                
                @endadmin

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
