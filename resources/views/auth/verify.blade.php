@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Xác nhận tài khoản của bạn') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tin nhắn xác nhận sẽ được gửi đến email của bạn') }}
                        </div>
                    @endif

                    {{ __('Vui lòng kiểm tra tin nhắn xác nhận được gửi vào email của bạn.') }}
                    {{ __('Nếu bạn không nhận được tin nhắn xác nhận') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
