<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="NEFSCUN">
        <use xlink:href="{{ asset('images/banner_logo.png') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="NEFSCUN">
            <use xlink:href="{{ asset('images/banner_logo.png') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        @php
    $data = App\Models\OrganizationRegistration::select('*')->
        join('organization_representatives','organization_representatives.org_rep_id','organization_registrations.id')
        ->join('organization_uploads','organization_uploads.org_reg_id','organization_registrations.id')
        ->where('status',0)->count();
   
    @endphp
    
            @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.register.show'))
               
        <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.register') }}" class="c-sidebar-nav-link">
                        <i class="c-sidebar-nav-icon cil-briefcase"></i>
                       
                            Registered List <span class="badge badge-light">{{ $data}}</span>
                       
                    </a>
                </li>
                @endif
                @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.approved'))

                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.approved') }}" class="c-sidebar-nav-link">
                        <i class="c-sidebar-nav-icon cil-briefcase"></i>
                       
                            Approved List
                       
                    </a>
                </li>
                @endif
                @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.rejected'))
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.rejected') }}" class="c-sidebar-nav-link">
                        <i class="c-sidebar-nav-icon cil-briefcase"></i>
                       
                            Rejected List
                       
                    </a>
                </li>
                @endif
                @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.comment'))

                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.comments') }}" class="c-sidebar-nav-link">
                        <i class="c-sidebar-nav-icon cil-briefcase"></i>
                       
                            Comments
                       
                    </a>
                </li>
                @endif
           
        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
