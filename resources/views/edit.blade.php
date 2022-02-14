<!-- edit.blade.php -->

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
        {{ __('Edit Post') }}
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
            <form method="post" action="{{ route('posts.update', $post->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="country_name">{{ __('Title') }}</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}" />
                </div>
                <div class="form-group">
                    <label for="cases">{{ __('Content') }}</label>
                    <input type="text" class="form-control" name="content" value="{{$post->content}}" />
                </div>
                <button type="submit" class="btn btn-primary my-2">{{ __('Edit') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
