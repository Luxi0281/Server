@extends('layouts.app')

@section('content')
    <div class = "well">
    <div class = "container" style= "font-size: 24px;">
        <img src="https://www.shareicon.net/download/2016/06/26/619537_tool.ico"
             class="img-circle center-block" width="172" height="172"/>
        <h1 class = "text-center">Here you can manage all the data you need <br/><br> Including: </h1>
        <br><br>
        <div class = "row">
            <ul class = "col-lg-6">
                <li>Viewing all instances of the created model </li>
                <li>Adding new instances of the chosen model</li>
                <li>Editing the instance of the chosen model</li>
                <li>Deleting the instance of the chosen model</li>
                <li>Viewing the specific instance of the chosen model (Reading by ID)</li>
                <li>Downloading and viewing JSON formats of the instances</li>
            </ul>
            <ul class = "col-lg-6" style="list-style-type: none" style="">
                <!--li>Viewing the specific instance of the chosen model (Reading by ID)</li-->
                <li><span>C</span>reating function</li>
                <li><span>R</span>eading function</li>
                <li><span>U</span>pdating function</li>
                <li><span>D</span>eleting function</li>
            </ul>
        </div>
    </div>

    </div>
@endsection
