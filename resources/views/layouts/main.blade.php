<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


      
      <style>
        body {
          background-color: #B3C890
        }
      </style>

      <title>E-commerce || </title>
    </head>
    <body>

      <div class="container mt-4">
        @yield('container')
      </div>


      {{-- sweetalert --}}
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        $( function() {
          $(document).on('click', '#login', function (e) {
            e.preventDefault();
            var link = $(this).attr('type');


            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href="">Why do I have this issue?</a>'
            })
            })
        })
      </script>
      {{-- end sweetalert --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
  </html>