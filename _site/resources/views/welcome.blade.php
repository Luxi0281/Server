<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include('other.navigation')
<div class="container text-center pad_con">
    <br>
    <br>
    <br>
    <img class = "center-block" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsK2HjJxn45b6nB1qe__xmZHoh0_8TU-S08q7XMBgq5d95noVvFg" height="256" width="256">
    <h1 class = "text-center">Welcome to <u>Luxi & Nash</u> Charity Foundation <br>
        <small>It's Nice to Meet You!</small>
        </h1>
    <img class = "center-block" src = "https://d30y9cdsu7xlg0.cloudfront.net/png/20191-200.png" height="96" width="96">
    <h2><u>What are charity organizations?</u></h2> <br>
    <p>A <b>charitable organization</b> or <b>charity</b> is a non-profit organization (NPO) whose primary objectives are philanthropy and social well-being (e.g. charitable, educational, religious, or other activities serving the public interest or common good).</p>
    <p>  The legal definition of a charitable organisation (and of charity) varies between countries and in some instances regions of the country. The regulation, the tax treatment, and the way in which charity law affects charitable organizations also vary.</p>
    <p>   Financial figures (e.g. tax refund, revenue from fundraising, revenue from sale of goods and services or revenue from investment) are important indicators to assess the financial sustainability of a charity, especially to charity evaluators. This information can impact a charity's reputation with donors and societies, and thus the charity's financial gains. </p>
    <p>  Charitable organisations often depend partly on donations from businesses. Such donations to charitable organisations represent a major form of corporate philanthropy.</p>
    <br>
    <br>
    <img class = "center-block" src = "https://www.charitableevolution.com/wp-content/uploads/2017/04/Logo_LighBlue_Medium-Rotation.gif">
    <h2 class="my-4 text-center">We suggest you the following Russian Charity Organizations: </h2>
    <div class="row">
        @foreach($funds as $fund)
        <div class="col-lg-4 col-sm-6 col-md-6 col-sm-12 col-xs-12 text-center mb-4" id="fundDiv">
            <div class="border" style = "margin: 5px; padding: 5px;">
            <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->logo !!}" alt="" width="150" height="150" style="border: 2px solid grey; margin-bottom: 15px; margin-top: 15px">
            <h3>{!! $fund->title !!}</h3>
            <p style="height: 150px; overflow: hidden; text-overflow: ellipsis" class = "text-center">{!! $fund->description !!}</p>
         <a class="btn btn-primary" href="/fund/{!! $fund->id !!}" style="margin: 30px"> Click here to show <br>full description </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('other.modal')
@include('other.footer')
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/scripts.js') }}" type="text/javascript"></script>
</html>
