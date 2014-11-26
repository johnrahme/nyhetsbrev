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
            <a href = "#" class = "navbar-brand"> FUTF:s alumnsida</a>
            <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>

            </button>
        </div>
        <div class = "navbar-collapse collapse navHeaderCollapse" >
            <ul class = "nav navbar-nav navbar-right">

                <li class = "active"> {{link_to('/','Start')}}</li>
                <li> {{link_to_route('emails.index','Mail')}}</li>
                <li>{{link_to_route('download','Nedladdning')}}</li>
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


    <!-- Script -->
    @yield('scripts')

</body>
</html>