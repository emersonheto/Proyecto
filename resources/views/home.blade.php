@extends('layouts.app')

@section('content')
<main role="main">
    <section class="jumbotron  text-center mb-0">
        <div class="row pt-5 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                You are logged in!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

@endsection
