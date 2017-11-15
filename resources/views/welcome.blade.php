<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forum</title>
      

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #3eddf1;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md > a{
                margin-bottom: 30px;
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                       <a href="/forum">RU CSE FORUM</a>
                </div>
                <br>

                <div class="links">
                    <a style="color: white" href="{{ route('social.auth', ['provider' => 'github']) }}"><i class="fa fa-github fa-3x">Github</i></a>
                    {{-- <a href="/login">Email</a> --}}
                   {{--  <a href="{{ route('social.auth', ['provider'=>'facebook']) }}"><i class="fa fa-facebook fa-2x">Facebook</i></a> --}}
                    <a style="color: white;" href="{{ route('social.auth', ['provider'=>'google']) }}"><i class="fa fa-google-plus fa-3x">Google</i></a>
                  
                
                </div>
            </div>
        </div>

      
            
            <script src="https://use.fontawesome.com/79ec9c35f3.js"></script>
        
    </body>
</html>
