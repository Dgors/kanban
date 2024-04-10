<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/js/app.js', 'resources/css/dashboard.css', 'resources/js/dashboard.js'])
</head>
<body>
    <main class="main">
        <section class="dashboard">
            <div class="nav-bar"><p>navbar</p></div>
            @include('dashboards')
        </section>
    </main>
</body>
</html>
