@extends('layouts.admin')

@section('content')
    <h1>projects</h1>
    <div class="text-end">
        {{-- <a class="btn btn-success" href="{{route('admin.projects.create')}}">Crea nuovo project</a> --}}
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td><a href="{{route('admin.projects.show', $project->slug)}}" title="View project">{{$project->title}}</a></td>
                    <td>{{Str::limit($project->content,100)}}</td>
                    <td>{{$project->category ? $project->category->name : 'Senza categoria'}}</td>
                    <td>{{$project->tags && count($project->tags) > 0 ? count($project->tags) : 0}}</td>
                    <td><a class="link-secondary" href="{{route('admin.projects.edit', $project->slug)}}" title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="project">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$project->title}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{ $projects->links('vendor.pagination.bootstrap-5') }}
    @include('partials.admin.modal-delete')
@endsection
