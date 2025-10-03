<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')

    <style type="text/css">

        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .div_center
        {
            text-align: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .input_color
        {
            color: rgb(0, 0, 0);
            padding: 10px;
            width: 400px;
        }
    </style>

  </head>

  <body>
    <div class="container-scroller">
    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>

                @endif

                 <div class="div_center">
                <h2 class="h2_font"> Add Category</h2>



                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf

                    <input class="input_color" type="text" name="category_name"  placeholder="Write category name">
                    <input type="submit" class="btn btn-primary mt-3" name="submit" value="Add Category">
                </form>



            </div>

            </div>

            @include('admin.footer')
        </div>
    </div>
</div>


    @include('admin.scripts')
  </body>
</html>
