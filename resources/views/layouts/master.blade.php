<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

{{-- fontawesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .cardImg {
        transition: all .2s ease-in-out;
    }

    .cardImg:hover {
        transform: scale(1.05);
    }
</style>
<body class=" bg-light overflow-x-hidden">
    @yield('content')

    {{-- <div class="header d-flex justify-content-between bg-white">

        <div class=" ms-3">
            <h1 class="mt-3 text-danger">MOVIES4U</h1>
        </div>
        <div class=" mt-3 me-3">
            <input type="text" class=" form-control px-4" placeholder="Search...">
        </div>

    </div>
    <div class=" d-flex">
        <div class="text-center rounded bg-dark" style="height: 100vh; width: 250px;">
            <a href="" class="text-decoration-none">
                <div class="btn btn-outline-danger mt-3 px-5 text-white ">Category</div>
            </a>
        </div>
        <div class="col mt-5 p-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Zayar</td>
                        <td>Htet</td>
                        <td>Twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
