<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'voitlus') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/ionicons-2.0.1/css/ionicons.min.css') }}">

    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">

    @yield('before-styles')
    <!-- Styles -->
    <link href="{{ mix('css/app-admin.css') }}" rel="stylesheet">
    @yield('after-styles')
</head>

<body>

    <div v-cloak id="app">

        <div class="tw-flex">

            <sidebar inline-template>

                <aside>

                    <div v-if="isActive" v-on:click="toggle" class="tw-bg-white tw-flex md:tw-hidden tw-w-full tw-h-screen tw-fixed tw-pin-t tw-pin-l tw-z-30 tw-opacity-75"></div>

                    <div v-show="isActive" id="sidebar" class="tw-fixed tw-z-30 md:tw-fixed md:tw-z-auto tw-flex tw-flex-col tw-h-screen tw-shadow tw-bg-black tw-w-48 md:tw-w-64">

                        <a href="/home" class="tw-flex tw-items-center tw-py-1 md:tw-py-3 tw-px-3 md:tw-px-6 tw-shadow">
                            <img class="tw-w-8 md:tw-w-10 tw-h-8 md:tw-h-10 tw-rounded-full tw-mr-3" src="{{ asset('images/voitlus.png') }}" alt="v">
                            <h1 class="tw-text-2xl md:tw-text-4xl" title="Voitlus Listing">Listing</h1>
                        </a>

                        <div class="tw-flex-1 tw-flex tw-w-full tw-overflow-hidden">
                            <div data-simplebar class="tw-h-full tw-w-full">

                                <slide-nav>

                                    <slide-nav-item href="apps" name="Apps" icon="icon ion-android-apps"></slide-nav-item>

                                    <slide-nav-item href="logs" name="Logs" icon="icon ion-fork-repo"></slide-nav-item>

                                    <slide-nav-item name="Settings" icon="icon ion-settings">

                                        <slide-nav-sub-item href="users" name="Users"></slide-nav-sub-item>

                                        <slide-nav-sub-item href="roles" name="Roles"></slide-nav-sub-item>

                                        <slide-nav-sub-item href="permissions" name="Permissions"></slide-nav-sub-item>

                                    </slide-nav-item>

                                    <!--
                                    <slide-nav-item name="Android apps" icon="icon ion-android-apps" class="tw-mt-2">

                                        <slide-nav-sub-item name="England">
                                            <slide-nav-sub-sub-item href="football" name="Football"></slide-nav-sub-sub-item>
                                            <slide-nav-sub-sub-item href="news" name="News"></slide-nav-sub-sub-item>
                                            <slide-nav-sub-sub-item href="sports" name="Sports"></slide-nav-sub-sub-item>
                                        </slide-nav-sub-item>

                                        <slide-nav-sub-item name="Netherland">
                                            <slide-nav-sub-sub-item href="football" name="Football"></slide-nav-sub-sub-item>
                                            <slide-nav-sub-sub-item href="news" name="News"></slide-nav-sub-sub-item>
                                            <slide-nav-sub-sub-item href="sports" name="Sports"></slide-nav-sub-sub-item>
                                        </slide-nav-sub-item>

                                        <slide-nav-sub-item href="australia" name="Australia"></slide-nav-sub-item>

                                        <slide-nav-sub-item href="india" name="India"></slide-nav-sub-item>

                                    </slide-nav-item>
                                    -->

                                </slide-nav>

                            </div>

                        </div>

                        <div class="tw-flex tw-justify-between tw-shadow-lg">

                            <div class="tw-text-xl md:tw-text-2xl">
                                <a class="tw-inline-block tw-px-3 tw-py-1 md:tw-py-2 tw-text-grey hover:tw-bg-grey-darkest hover:tw-text-white" href=""><i class="icon ion-ios-cog-outline tw-flex tw-items-center"></i></a>
                            </div>

                            <div class="tw-text-xl md:tw-text-2xl">
                                <button v-on:click="refreshPage('{{ \Illuminate\Support\Facades\Request::url() }}')" class="tw-inline-block tw-px-3 tw-py-1 md:tw-py-2 tw-text-grey hover:tw-bg-grey-darkest hover:tw-text-white"><i class="icon ion-ios-refresh-outline tw-flex tw-items-center"></i></button>
                            </div>

                            <div class="tw-text-xl md:tw-text-2xl">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="tw-inline-block tw-px-3 tw-py-1 md:tw-py-2 tw-text-grey hover:tw-bg-grey-darkest hover:tw-text-white" data-tooltip="Exit" data-tooltip-placement="right"><i class="icon ion-log-out tw-flex tw-items-center"></i></button>
                                </form>
                            </div>

                        </div>

                    </div>

                </aside>

            </sidebar>

            <div :class="{ 'md:tw-ml-64' : Sidebar.isActive }" id="main" class="main tw-flex-1 tw-flex tw-flex-col tw-min-h-screen">

                <pinned offset-plus-top="80" ref="pinnedHeader" id="pinned-header">

                    <header id="header" class="tw-bg-white tw-flex tw-p-1 md:tw-p-3 tw-shadow">

                        <div class="header-left tw-flex tw-items-center">

                            <button  v-on:click="toggleSidebar()" type="button" class="tw-w-8 md:tw-w-10 tw-h-8 md:tw-h-10 md:tw-ml-px tw-text-center tw-text-2xl md:tw-text-3xl tw-leading-none tw-rounded-full hover:tw-bg-grey-lighter focus:tw-outline-none">
                                <i class="icon ion-navicon tw-flex tw-items-center tw-justify-center"></i>
                            </button>

                            <ul class="tw-hidden md:tw-flex tw-breadcrumb tw-pl-1">
                                <li class="tw-p-2"><a href="" class="tw-link"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li class="tw-p-2 tw-text-xs"><i class="icon ion-chevron-right"></i></li>
                                <li class="tw-p-2">Posts</li>
                            </ul>

                        </div>

                        <div class="header-right tw-flex-1 tw-flex tw-items-center tw-justify-end tw-relative">

                            <form class="search md:tw-inline-block tw-px-2 tw-ml-1 tw-w-2/3 md:tw-w-1/2 tw-relative" action="#">

                                <div class="tw-w-full tw-relative tw-z-20">
                                    <input type="text" name="q" class="tw-input tw-bg-white tw-px-2 md:tw-px-4 tw-py-1 md:tw-py-2 tw-border tw-rounded-full tw-text-sm md:tw-text-base" placeholder="Search..." onfocus="this.placeholder=''" onblur="this.placeholder = 'Search...'" autocomplete="q">
                                </div>

                                <div class="tw-w-full tw-absolute tw-z-10 tw-pr-6 tw-hidden">
                                    <div class="search-result tw-bg-white tw--mt-4 tw-pt-4 tw-overflow-hidden tw-border tw-border-t-0 tw-border-b-0 tw-text-grey-darker">
                                        <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                            <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                            <p class="tw-flex-1">Bangla Newspapers</p>
                                        </a>
                                        <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                            <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                            <p class="tw-flex-1">Bangla Newspapers</p>
                                        </a>
                                        <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                            <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                            <p class="tw-flex-1">Bangla Newspapers</p>
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <dropdown class="tw-px-1 tw--mb-px">
                                <template v-slot:btn-dropdown>
                                    <span class="tw-absolute tw-pin-r tw-pin-t tw-rounded-full tw-badge tw-badge-red tw-bg-g-red-dark tw-text-white">3</span>
                                    <span tabindex="0" class="icon ion-android-notifications tw-text-xl md:tw-text-2xl tw-leading-none tw-flex tw-items-center tw-justify-center tw-w-8 md:tw-w-10 tw-h-8 md:tw-h-10 tw-cursor-pointer tw-rounded-full hover:tw-bg-grey-lighter focus:tw-outline-none"></span>
                                </template>

                                <div class="tw-box-float tw-mt-12 md:tw-mt-16 tw-mr-2 md:tw-mr-3">
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3  tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                </div>
                            </dropdown>

                            <dropdown class="tw-px-1 tw--mb-px">
                                <template v-slot:btn-dropdown>
                                    <span class="tw-absolute tw-pin-r tw-pin-t tw-rounded-full tw-badge tw-badge-red tw-bg-g-red-dark tw-text-white">2</span>
                                    <span tabindex="1" class="icon ion-android-mail tw-text-xl md:tw-text-2xl tw-leading-none tw-flex tw-items-center tw-justify-center tw-w-8 md:tw-w-10 tw-h-8 md:tw-h-10 tw-cursor-pointer tw-rounded-full hover:tw-bg-grey-lighter focus:tw-outline-none"></span>
                                </template>

                                <div class="tw-box-float tw-mt-12 md:tw-mt-16 tw-mr-2 md:tw-mr-3">
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3 tw-border-b tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                    <a href="" class="search-item tw-flex tw-w-full tw-p-3  tw-text-grey-darker tw-no-underline hover:tw-bg-grey-lighter hover:tw-text-primary tw-items-center">
                                        <img class="tw-h-10 tw-w-10 tw-rounded-full tw-mr-3" src="{{ url('images/voitlus.png') }}" alt="">
                                        <p class="tw-flex-1">Bangla Newspapers</p>
                                    </a>
                                </div>
                            </dropdown>

                            <dropdown class="tw-px-1 md:tw-px-2 tw--mb-1">
                                <template v-slot:btn-dropdown>
                                    <img tabindex="2" class="tw-w-8 md:tw-w-10 tw-h-8 md:tw-h-10 tw-rounded-full tw-border-2 tw-cursor-pointer focus:tw-outline-none" src="{{ url('images/voitlus.png') }}" alt="Tanvir Hasan">
                                </template>

                                <div class="tw-box-float tw-mt-12 md:tw-mt-16 tw-mr-2 md:tw-mr-3">
                                    <div class="tw-flex tw-flex tw-items-center">
                                        <img class="tw-w-24 tw-h-24 tw-mr-3 tw-rounded" src="{{ asset('images/voitlus.png') }}" alt="Tanvir Hasan">

                                        <div>
                                            <h4 class="tw-mb-1">Tanvir Hasan</h4>
                                            <p>Administrator</p>
                                            <p>ID: V-JKKJYE668</p>
                                        </div>
                                    </div>

                                    <hr class="tw-bg-grey-lighter tw-w-full tw-h-px tw-my-3">

                                    <div class="tw-flex">
                                        <a class="tw-btn tw-btn-md tw-btn-primary tw-rounded tw-flex-auto tw-bg-g-primary-dark hover:tw-bg-g-primary" href="#"><i class="icon ion-person tw-mr-1"></i> My Account</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf

                                            <button class="tw-btn tw-btn-md tw-btn-primary tw-rounded tw-ml-3 tw-bg-g-red-dark hover:tw-bg-g-red"><i class="icon ion-log-out tw-mr-1"></i> Exit</button>
                                        </form>
                                    </div>
                                </div>
                            </dropdown>

                        </div>

                    </header>

                </pinned>

                <section id="content" class="tw-p-3 md:tw-p-6 tw-flex-auto tw-flex tw-flex-col">
                    @yield('content')
                </section>

                <footer id="footer" class="tw-flex tw-p-6">
                    <p class="tw-flex-1 tw-mb-0">v-{{ env('APP_VERSION') }} | &copy; {{ date('Y') }} - All right reserved by voitlus</p>
                    <p class="tw-mb-0">A website by <a href="https://vpsoft.org" target="_blank">vpsoft™</a></p>
                </footer>

            </div>
        </div>


        <div v-if="isLoading" class="tw-bg-white tw-flex tw-items-center tw-justify-center tw-fixed tw-w-full tw-h-screen tw-pin-t tw-pin-l tw-z-40">
            <i class="icon ion-load-d tw-text-5xl tw-flex tw-spin"></i>
        </div>

    </div>

    @yield('before-scripts')
    <!-- Scripts -->
    <script src="{{ mix('js/app-admin.js') }}"></script>

    @yield('after-scripts')
</body>
</html>
