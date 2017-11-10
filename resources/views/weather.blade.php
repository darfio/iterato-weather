@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="text-center">Weather</h1>
        </div>

        <div id="alert"></div>      

        <div class="panel panel-default">
            <div class="panel-body">

                <div id="weather">
                    <div class="row">
                        <form method="POST" action="">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">API Key:</label>
                                    <input type="text" class="form-control" name="api-key" id="api_key" placeholder="Enter openweathermap.org API Key">
                                </div>                      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">City:</label>
                                    <div class="input-group">
                                        <input class="form-control" name="city" id="city" placeholder="Enter city">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>  
                        </form>         
                    </div>
                
                    <div class="row"> 
                        <div class="col-sm-12">
                            <ul class="weather-tabs nav nav-tabs">
                                <!-- WEATHER TABS -->
                            </ul>

                            <div class="weather-content tab-content">
                                <!-- WEATHER CONTENT -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END WEATHER -->

            </div>
        </div>

    </div>
@endsection    

