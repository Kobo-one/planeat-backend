@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_detail',$child), 'title'=> 'To explore ingredients','rightUrl'=>'#','icon' => 'img/icons/basic-plus-icon.svg','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        @foreach($difficultIngredients as $difficultIngredient)
            <div class="panel panel--shadow spacer spacer--sml">
                <div class="panel__header mb-0">
                    <div>
                        <div class="flex flex-align-items-center mb-2">
                            <img class="settings--icon" src="{{asset($difficultIngredient->ingredient->icon)}}" alt="{{$difficultIngredient->ingredient->name}}'s icon">
                            <h3 class="mt-0 ml-xsm">{{ucfirst($difficultIngredient->ingredient->name)}}</h3>
                        </div>

                        <p class="text--message">{{$difficultIngredient->times_tried}} times tried </p>
                    </div>
                    <div class="panel__actions">
                        <label data-toggle="modal" data-target="#deleteModal" data-name="{{$difficultIngredient->ingredient->name}}" data-id="{{$difficultIngredient->id}}"><img src="{{asset('img/icons/cross-icon.svg')}}" alt="remove quest"></label>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('popup')
    <div class="panel--shopping">
        <h2 class="popup__title">Add an ingredient</h2>
        <form action="{{route('familyMember_difficultIngredient_store',$child)}}" method="post">
            @csrf
            <label for="ingredient">Ingredient</label>
            <div class="width-100 center">
                <select class="form-control field mb-sml" id="ingredient" name="ingredient">
                    <option disabled selected hidden value="empty">Select an ingredient</option>
                    @foreach($ingredients as $ingredient)
                        <option value="{{$ingredient->id}}" @if(old('ingredient')==$ingredient->id) selected @endif>{{$ingredient->name}}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn--primary mb-xsm" type="submit" value="Save">

            <input class="btn btn--secondary js-toggle-popup" type="reset" value="Cancel">
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.header__link').addClass('js-toggle-popup');
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var model = button.data('id'); // Extract info from data-* attributes
                var name = button.data('name'); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-title').text("Delete '" + name+"' from {{$child->name}}'s ingredients to explore");
                modal.find('.modal-body input[name="id"]').val(model);
            })
        })

    </script>

@endpush


@section('modals')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sml" role="document">
            <div class="modal-content">
                <form action="{{ route('familyMember_difficultIngredient_remove',[$child]) }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove ingredient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this ingredient? </p>
                    <span class="text--message">This action can not be undone, the progress will be lost.</span> <br>
                    <input type="hidden" name="id">
                    {!! method_field('delete') !!}
                    {!! csrf_field() !!}
                </div>
                <div class="modal-footer">



                        <a class="" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn--warning center">Delete</button>


                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

