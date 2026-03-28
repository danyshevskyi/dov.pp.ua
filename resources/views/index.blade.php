<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oleksii Danyshevskyi - laravel + Vue.js</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f5f5f7;
            color: #1d1d1f;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main {
            flex: 1;
        }

        h1 {
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .apple-link {
            color: #1d1d1f;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .apple-link:hover {
            opacity: 0.6;
            transform: translateY(-1px);
        }

        .projects-wrapper {
            max-width: 500px;
            width: 100%;
        }

        .project-card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            background-color: #f5f5f7;
        }

        .project-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        /* анимация появления */
        .hidden {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.5s ease;
        }

        .show {
            opacity: 1;
            max-height: 1000px;
        }

        footer {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="main container d-flex flex-column align-items-center justify-content-center text-center py-5">

    <h1 class="mb-3">Oleksii Danyshevskyi</h1>

    <a href="#" id="toggleBtn" class="apple-link mb-4">
        See What I Built
    </a>

    <div id="projects" class="projects-wrapper hidden">

    <a class="nav-link text-black" href="https://dov.pp.ua/scode" target=_blank>
        <div class="card project-card mb-3 p-3">
            <h5>Scode</h5>
            <p class="mb-0">Solutions for ATM service engineers</p>
        </div>
    </a>
    <a class="nav-link text-black" href="https://dov.pp.ua/analytics" target=_blank>
        <div class="card project-card mb-3 p-3">
            <h5>DOV Analytics</h5>
            <p class="mb-0">User experience analytics</p>
        </div>
    </a>
    <a class="nav-link text-black" href="https://dov.pp.ua/english-cards" target=_blank>
        <div class="card project-card mb-3 p-3">
            <h5>English Cards</h5>
            <p class="mb-0">Сreate your own cards with words, phrases or sentences</p>
        </div>
    </a>
    <a class="nav-link text-black" href="https://dov.pp.ua/miles" target=_blank>
        <div class="card project-card mb-3 p-3">
            <h5>Miles</h5>
            <p class="mb-0">Control of costs and vehicle distances</p>
        </div>
    </a>
    </div>
</div>

<!-- <footer class="text-center mb-4">
    <a href="www.linkedin.com/in/danyshevskyi" target="_blank" class="text-black text-decoration-none">
    <i class="bi bi-linkedin pe-2"></i>I`m on LinkedIn
    </a>
</footer> -->

<!-- footer -->
<div class="d-flex justify-content-center mt-5 1bb">

  <div class="mb-4 fixed-bottom 1bb text-center 1bb">
  <a href="https://linkedin.com/in/danyshevskyi" target="_blank" class="text-black text-decoration-none">
    <i class="bi bi-linkedin pe-2"></i>I`m on LinkedIn
    </a>
       
   
    </div>
</div>
<!-- /footer -->

<script>
    const btn = document.getElementById('toggleBtn');
    const projects = document.getElementById('projects');

    btn.addEventListener('click', function(e) {
        e.preventDefault();

        projects.classList.toggle('show');
        projects.classList.toggle('hidden');

        btn.textContent = projects.classList.contains('show')
            ? 'Explore Projects'
            : 'See What I Built';
    });
</script>

</body>
</html>