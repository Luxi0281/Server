<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include('other.navigation')

<!-- Page Content -->
<div class="container">
    <!-- Introduction Row -->
    <br>
        <h1 class = "text-center">An error occured </h1><br>

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="my-4 text-center pagination-centered">The requested fund has not found </h1>
        </div>
    </div>
</div>
<!-- /.container -->

@include('other.footer')

<!-- Bootstrap core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
