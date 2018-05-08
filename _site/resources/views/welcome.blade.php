<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include('other.navigation')
<div class="container text-center pad_con">
    <br>
    <br>
    <br>
    <img class = "wow animated infinite pulse center-block" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsK2HjJxn45b6nB1qe__xmZHoh0_8TU-S08q7XMBgq5d95noVvFg" height="256" width="256">
    <h1 class = "wow animated bounceInUp text-center">Welcome to <u>Luxi & Nash</u> Charity Foundation <br>
        <small>It's Nice to Meet You!</small>
        </h1>
    <img data-wow-delay="0.5s" class = "wow animated bounceInRight center-block" src = "https://d30y9cdsu7xlg0.cloudfront.net/png/20191-200.png" height="96" width="96">
    <h2 data-wow-delay="1s" class = "wow animated bounceInLeft"><u>What are charity organizations?</u></h2> <br>
    <p data-wow-delay="1.0s" class = "wow animated bounceInRight">A <b>charitable organization</b> or <b>charity</b> is a non-profit organization (NPO) whose primary objectives are philanthropy and social well-being (e.g. charitable, educational, religious, or other activities serving the public interest or common good).</p>
    <p data-wow-delay="1.0s" class = "wow animated bounceInLeft">  The legal definition of a charitable organisation (and of charity) varies between countries and in some instances regions of the country. The regulation, the tax treatment, and the way in which charity law affects charitable organizations also vary.</p>
    <p data-wow-delay="1.0s" class = "wow animated bounceInRight">   Financial figures (e.g. tax refund, revenue from fundraising, revenue from sale of goods and services or revenue from investment) are important indicators to assess the financial sustainability of a charity, especially to charity evaluators. This information can impact a charity's reputation with donors and societies, and thus the charity's financial gains. </p>
    <p data-wow-delay="1.0s" class = "wow animated bounceInLeft">  Charitable organisations often depend partly on donations from businesses. Such donations to charitable organisations represent a major form of corporate philanthropy.</p>
    <br>
    <br>
    <img data-wow-delay="1.6s" class = "wow animated bounceIn center-block" src = "https://www.charitableevolution.com/wp-content/uploads/2017/04/Logo_LighBlue_Medium-Rotation.gif">
    <h2 class="wow animated bounceInRight my-4 text-center">We suggest you the following Russian Charity Organizations: </h2>
    <div class="row">
    </div>
</div>

@include('other.modal')
@include('other.footer')
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/faceScripts.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('wowJS/dist/wow.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/country-dropdown/js/jquery/jquery-1.8.2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/country-dropdown/js/msdropdown/jquery.dd.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#countries").msDropdown();
    })
</script>

</html>
