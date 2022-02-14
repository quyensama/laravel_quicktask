<!-- index.blade.php -->

@extends('dashboard')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    <div class="col-9 mx-auto">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <a href="{{ route('create')}}" class="btn btn-success my-2">{{ __('Create') }}</a>
        <div class="card">
            <div class="card-header">
                {{ __('Post List') }}
            </div>
            <div class="card-b">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>{{ __('Post Title') }}</td>
                            <td>{{ __('Post Content') }}</td>
                            <td colspan="2">{{ __('Action') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts ?? '' as $key => $post)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td><a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">{{ __('Edit') }}</a></td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>
@endsection
