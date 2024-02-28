@extends('admin.layouts.master')
@section('content')
<div class="container">
  <a href="{{route('blogs.create')}}" class="btn btn-success">Add Blogs</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                <td>{{$blog->description}}</td>
                <td>
                    <img  src="{{ asset('storage/images/blogs/'.$blog->image) }}" style="height: 30px" alt="{{$blog->image}}">
                </td>
                <td>
                    <form action="{{route('blogs.destroy',$blog)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip">Delete</button>
                    </form>
                    <a href="{{route('blogs.edit',$blog)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('blogs.show',$blog)}}" class="btn btn-success">View</a>

                </td>
    
              </tr>
            @endforeach
         
        </tbody>
      </table>
</div>
@endsection