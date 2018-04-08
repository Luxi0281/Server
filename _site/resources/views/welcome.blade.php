<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include('other.navigation')
<!-- Page Content -->
<div class="container text-center">
    <!-- Introduction Row -->
    <br>
        <img class = "center-block" src = "https://cdn0.iconfinder.com/data/icons/Free-Icons-Shimmer-01-Creative-Freedom/256/favourites.png" height="128" width="128">
        <h1 class = "text-center">Welcome to Luxi & Nash Charity Foundation <br>
        <small>It's Nice to Meet You!</small>
        </h1>
    <br>
    <h2><u>What are charity organizations?</u></h2>
    <p>A <b>charitable organization</b> or <b>charity</b> is a non-profit organization (NPO) whose primary objectives are philanthropy and social well-being (e.g. charitable, educational, religious, or other activities serving the public interest or common good).</p>

    <p>  The legal definition of a charitable organisation (and of charity) varies between countries and in some instances regions of the country. The regulation, the tax treatment, and the way in which charity law affects charitable organizations also vary.</p>

    <p>   Financial figures (e.g. tax refund, revenue from fundraising, revenue from sale of goods and services or revenue from investment) are important indicators to assess the financial sustainability of a charity, especially to charity evaluators. This information can impact a charity's reputation with donors and societies, and thus the charity's financial gains. </p>

    <p>  Charitable organisations often depend partly on donations from businesses. Such donations to charitable organisations represent a major form of corporate philanthropy.</p>

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="my-4 text-center">We suggest you following Russian Charity Organizations: </h2>
        </div>
        @foreach($funds as $fund)
        <div class="col-lg-4 col-sm-6 text-center mb-4 border">
            <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->logo !!}" alt="" width="150" height="150" style="border: 2px solid grey; margin-bottom: 15px; margin-top: 15px">
            <h3>{!! $fund->title !!}</h3>
            <p style="height: 150px; overflow: hidden; text-overflow: ellipsis" class = "text-center">{!! $fund->description !!}</p>
          <button class = "btn btn-primary" style="margin: 30px"><a class="link" href=""></a> Click here to show <br>full description</button>
        </div>
        @endforeach

    </div>
</div>
<!-- /.container -->

<!-- Footer -->


<!-- Bootstrap core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@include('other.footer')
<script>
    $(window).on('beforeunload', function(){
        $(window).scrollTop(0);
    });
</script>
</body>
</html>
