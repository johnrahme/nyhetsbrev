<!DOCTYPE html>
<html>
<head>
    <title> {{$title}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/jquery.datetimepicker.css') }}
    {{ HTML::style('css/bootstrap-wysihtml5.css') }}
    @yield('styles')

</head>

<body>
<!-- Navbar -->
<div class = "navbar navbar-inverse navbar-static-top">
    <div class = "container">
        <div class = "navbar-header">
            <a href = "#" class = "navbar-brand"> FUTF:s nyhetsbrev</a>
            <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>

            </button>
        </div>
        <div class = "navbar-collapse collapse navHeaderCollapse" >
            <ul class = "nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li id = "start"> {{link_to('/','Start')}}</li>
                    <li id = "mail"> {{link_to_route('emails.index','Mail')}}</li>
                    <li id = "download">{{link_to_route('download','Nedladdning')}}</li>
                    @if(Auth::user()->level == 2)
                    <li id = "users">{{link_to_route('user','Användare')}}</li>
                    @endif
                    <li>{{link_to_route('logout','Logga ut')}}</li>
                @else
                    <li id = "start"> {{link_to('/','Start')}}</li>
                    <li id = "login">{{link_to_route('login','Logga In')}}</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- Container -->
<div class="container">
@include('contact.index')

    @if(Session::has('message'))
    <p style = "color: #008000;"> {{Session::get('message')}} </p>

    @endif

    <!-- Content -->
    @yield('content')

</div>

<!-- Scripts are placed here -->
{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{HTML::script('js/jquery.datetimepicker.js')}}
{{HTML::script('js/checkmodal.js')}}
{{HTML::script('js/bootstrap-wysihtml5.min.js')}}
{{HTML::script('js/wysihtml5-0.3.0.js')}}

{{--Sätter rätt tryckt länk--}}
<script>
$(document).ready(function(){
    var active = '#{{$active}}';
    $(active).addClass("active");
});
</script>



    <!-- Script -->
    @yield('scripts')

</body>
</html>