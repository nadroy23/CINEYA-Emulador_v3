@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="https://cuevana3.io/"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwikiapk.com%2Fwp-content%2Fuploads%2F2021%2F05%2F1149697_featured.png&f=1&nofb=1" alt="" height="500" width="700"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
