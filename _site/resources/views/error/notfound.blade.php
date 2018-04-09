<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
<style>
    footer
    {
        width: 100%;!important;
        bottom: 0;!important;
        position: fixed;!important;
    }
</style>
@include('other.navigation')

<!-- Page Content -->
<div class="container">
    <h1 class = "text-center">An error occured </h1><br>
    <h1 class="my-4 text-center pagination-centered">The requested fund has not found </h1>
</div>
<!-- /.container -->

@include('other.footer')
@include('other.scripts')
</body>
</html>
