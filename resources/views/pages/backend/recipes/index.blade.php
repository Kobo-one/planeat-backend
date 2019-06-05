@extends('layouts.backend')


@section('content')
    <div class="container backend">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>recipes</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('backend.recipes.create')}}" class="btn btn-success"><span>Add New Recipe</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Prep time</th>
                    <th>Servings</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $recipe)
                    <tr>
                        <td>{{$recipe->title}}</td>
                        <td>{{$recipe->description}}</td>
                        <td><img src="{{asset($recipe->img)}}" alt="{{$recipe->title}}"></td>
                        <td>{{$recipe->preperation_time + $recipe->cooking_time_max}}</td>
                        <td>{{$recipe->servings.' '.$recipe->serving_size}}</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">Edit</a>
                        </td>
                        <td>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
