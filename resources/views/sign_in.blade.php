
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social - Network, Community and Event Theme</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{@asset('img')}}/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{@asset('css')}}/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{@asset('css')}}/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{@asset('css')}}/style.css">

</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 py-5">
            <!-- Main content START -->
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                <!-- Sign in START -->
                <div class="card card-body text-center p-4 p-sm-5">
                    <!-- Title -->
                    <h1 class="mb-2">Sign in</h1>
                    <p class="mb-0">Don't have an account?<a href="{{@route('sign_up')}}"> Click here to sign up</a></p>
                    <!-- Form START -->
                    <form class="mt-sm-4" action="{{@route('login')}}" method="post">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3 input-group-lg">
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <!-- New password -->
                        <div class="mb-3 position-relative">
                            <!-- Password -->
                            <div class="input-group input-group-lg">
                                <input class="form-control fakepassword" name="password" type="password" id="psw-input" placeholder="Enter new password">
                                <span class="input-group-text p-0">
                  <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                </span>
                            </div>
                        </div>
                        <!-- Remember me -->
                        <div class="mb-3 d-sm-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="rememberCheck">
                                <label class="form-check-label" for="rememberCheck">Remember me?</label>
                            </div>
                            <a href="forgot-password.html">Forgot password?</a>
                        </div>
                        <!-- Button -->
                        <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Login</button></div>
                        <!-- Copyright -->
                        <p class="mb-0 mt-3">©2023 <a target="_blank" href="https://www.webestica.com/">Webestica.</a> All rights reserved</p>
                    </form>
                    <!-- Form END -->
                </div>
                <!-- Sign in START -->
            </div>
        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->


<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{@asset('js')}}/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
{{--<script src="assets/vendor/pswmeter/pswmeter.min.js"></script>--}}

<!-- Theme Functions -->
<script src="{{@asset('js')}}/functions.js"></script>

</body>
</html>
