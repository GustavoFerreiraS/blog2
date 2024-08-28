@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <form action="{{ url('/categoria') }}">

                        <label for="fname">Nome: </label><br>
                        <input type="text" id="fname" nome="nome" value="Gustavo"><br>

                        <input type="submit" value="submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


