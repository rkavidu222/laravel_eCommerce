<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')

  </head>

  <body>
    <div class="container-scroller">
    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                @include('admin.body')
            </div>

            @include('admin.footer')
        </div>
    </div>
</div>


    @include('admin.scripts')
  </body>
</html>
