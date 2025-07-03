<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Sign In - SISTEM INFORMASI KEARSIPAN IAIN PAREPARE </title>
    <meta charset="utf-8" />
    <meta name="description" content="iain." />
    <meta name="keywords" content="iain" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="SISTEM INFORMASI KEARSIPAN IAIN PAREPARE " />
    <link rel="shortcut icon" href="{{ asset('/logo/logo.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('/') }}themes/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/') }}themes/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('{{ asset('/') }}logo/bg-iain.png');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('/') }}logo/bg-iain.png');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-xl-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-xl-50 pt-15 pt-xl-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-xl-start flex-column">
                    <!--begin::Logo-->
                    <a href="#" class="mb-7">
                        <img alt="Logo" src="{{ asset('/logo/logo-login.png') }}" style="width:100%" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    {{-- <h2 class="text-white fw-normal m-0">Institut Agama Islam Negeri Parepare</h2> --}}
                    <!--end::Title-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div
                class="d-flex flex-column-fluid flex-xl-row-auto justify-content-center justify-content-xl-end p-12 p-xl-20">
                <!--begin::Card-->
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-7 pb-lg-10">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url=""
                            action="{{ url('/auth/login') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <img alt="Logo" src="{{ asset('/logo/logo.png') }}"
                                    class="h-100px " />

                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3"> SISKA </h1>
                                <h1 class="text-gray-900 fw-bolder mb-3"> SISTEM INFORMASI KEARSIPAN IAIN PAREPARE </h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">Enter your details to login to your account:
                                </div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Username" name="username" value=""
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-4">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" value="" name="password"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-4">
                                <div></div>
                                <!--begin::Link-->
                                {{-- <a href="{{ route('reset') }}" class="link-primary">Forgot
                                    Password ?</a> --}}
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-success">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/') }}themes/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('/') }}themes/dist/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset('/') }}themes/dist/assets/js/custom/authentication/sign-in/general.js"></script> --}}
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
