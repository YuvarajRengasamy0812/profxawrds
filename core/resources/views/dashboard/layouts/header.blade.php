<div class="app-header white box-shadow navbar-md">
    <div class="navbar">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons  md-30 opacity-8">&#xe5d2;</i>
        </a>

        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item pa-13 hidden-xs-down">
                <a class="btn btn-sm info" href="{{ url('/') }}" target="_blank">
                    <i class="material-icons">&#xe895;</i> <small>View Website</small>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link clear" data-toggle="dropdown">
                  <span class="avatar w-32">
                      @if(Auth::user()->photo !="")
                          <img src="{{ asset('uploads/users/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                               title="{{ Auth::user()->name }}">
                      @else
                          <img src="{{ asset('uploads/contacts/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                               title="{{ Auth::user()->name }}">
                      @endif
                      <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale ">
                    <a class="dropdown-item hidden-sm-up" href="{{ url('/') }}" target="_blank">
                        <span>View Website</span>
                    </a>
                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                        <a class="dropdown-item"
                           href="{{ route('usersEdit',Auth::user()->id) }}"><span>{{ __('backend.profile') }}</span></a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('adminLogout') }}">{{ __('backend.logout') }}</a>
                </div>
            </li>

            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>

        <!-- navbar collapse -->
        <div class="collapse navbar-toggleable-sm" id="collapse">
            @if(Route::currentRouteName() !="adminSearch")
                {{Form::open(['route'=>['adminSearch'],'method'=>'GET', 'role'=>'search', 'class' => "navbar-form form-inline pull-right pull-none-sm navbar-item v-m" ])}}

                <div class="form-group l-h m-a-0">
                    <div class="input-group"><input type="text" name="q" class="form-control p-x" autocomplete="off"
                                                    placeholder="{{ __('backend.search') }}...">
                        <span
                            class="input-group-btn"><button type="submit" class="btn white b-a no-shadow"><i
                                    class="fa fa-search"></i></button></span></div>
                </div>
                {{Form::close()}}
            @endif

            @if(@Auth::user()->permissionsGroup->add_status)
                <?php
                $data_sections_arr = explode(",", (string)Auth::user()->permissionsGroup->data_sections);
                ?>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown pa-13">
                        <a class="btn light" data-toggle="dropdown">
                            <i class="material-icons">&#xe145;</i>
                            <span>{{ __('backend.new') }} </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-scale">
                            <a class="dropdown-item" href="{{ route('sponsorsCreate', 'home') }}">
                                <i class="material-icons">&#xe838;</i> &nbsp;Homepage Sponsor
                            </a>
                            <a class="dropdown-item" href="{{ route('sponsorsCreate', 'event') }}">
                                <i class="material-icons">&#xe878;</i> &nbsp;Event Sponsor
                            </a>
                            <a class="dropdown-item" href="{{ route('sponsorCategories') }}">
                                <i class="material-icons">&#xe2c7;</i> &nbsp;Sponsor Category
                            </a>
                            @if(in_array(23, config('profx.admin_sections', [])) && in_array(23, $data_sections_arr))
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('topicsCreate', 23) }}">
                                    <i class="material-icons">&#xe413;</i> &nbsp;Gallery Item
                                </a>
                            @endif
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
