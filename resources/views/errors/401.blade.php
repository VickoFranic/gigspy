<!DOCTYPE html>
<html>
    <head>
        <title>GigSpy</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                background-color: #1f1f1f;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: white;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                padding: 20px;
            }

            .title {
                font-size: 52px;
                margin-bottom: 40px;
            }

            .title a {
                text-decoration: none;
            }

            .image {
                 margin: 0 auto;
                max-width: 200px;
            }

            .image img {
                width: 100%;
            }

            @media (max-width: 480px) {
                .title {
                    font-size: 32px;
                }

                .image {
                    max-width: 120px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Invalid credentials !<br> Go back to <a href="{{ url('/admin') }}"><b>login page</b></a>.</div>
                    <div class="image">
                    </div>
            </div>
        </div>
    </body>
</html>
