<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="col-9 mx-auto">
    <div class="card uper">
        <div class="card-header">
        {{ __('Add Post') }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('posts.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="country_name">{{ __('Title') }}</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <label for="cases">{{ __('Content') }}</label>
                    <input type="text" class="form-control" name="content" />
                </div>
                <button type="submit" class="btn btn-primary my-2">{{ __('Add') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
