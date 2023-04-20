<!-- Stored in resources/views/layouts/master.blade.php -->

<html>

<head>
    <title>App Name - @yield('title')</title>

    <script src="https://kit.fontawesome.com/b14771b76e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js"
        integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="http://127.0.0.1/frankoo/assets/scss/main.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="http://127.0.0.1/frankoo/assets/img/logo.ico">
    @vite('resources/css/app.css')

</head>

<body>
    <div class="content">
        <div class="container">
            @include ('layouts/partials/_header')
        </div>

        <div class="container">
            @yield('content')
        </div>


        @include ('layouts/partials/_footer')

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
    const animateMe = document.getElementById("animate-me");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateMe.classList.add("animate__animated", "animate__fadeInRight");
            } else {
                animateMe.classList.remove("animate__animated", "animate__fadeInRight");
            }
        });
    });

    observer.observe(animateMe);
    </script>


    @vite('resources/js/app.js')
</body>

</html>