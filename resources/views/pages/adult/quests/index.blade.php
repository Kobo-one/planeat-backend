@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('adult_index'), 'title'=> 'Quests','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        <div class="">
            <img class="image image--left" src="{{asset('img/icons/question-icon.png')}}" alt="questionmark"></div>
        <p class="text--message">Choose an ingredient for your kids. They will choose a meal based on that
            ingredient</p>
    </div>

    <div class="section questList">
        @foreach($listItems as $item)
            <div class="spacer spacer--sml">
                <h3 class="font-weight-bold mb-xsm">{{$item['day']}}</h3>
                <div class="panel panel--shadow">
                    <div class="panel__header mb-0">
                        <div>
                            <h3 class="panel__title">Ingredient</h3>
                            <small class="text--message">{{$item['quests']?'1 ingredient added':'No ingredient added yet'}}</small>
                        </div>
                        <div class="panel__actions">
                            @if(($item['quests']))
                                <label data-toggle="modal" data-target="#deleteModal" data-name="{{$item['quests']->ingredient->name}}" data-id="{{$item['quests']->id}}"><img src="{{asset('img/icons/cross-icon.svg')}}" alt="remove quest"></label>
                            @else
                                <a href="{{route('quest_create',$item['date'])}}"><img
                                        src="{{asset('img/icons/plus-icon.svg')}}"
                                        alt="add quest"></a>
                            @endif
                        </div>

                    </div>
                    <div class="panel__main">
                        @if(($item['quests']))
                            <a class="list" href="{{route('quest_detail',$item['quests']->id)}}">

                                <div class="list__item list__item--inside">
                                    <div class="list__icon rounded--img" style="background-image: url('{{asset($item['quests']->ingredient->img)}}')"></div>
                                    <div class="list__text">
                                        <h3 class="mb-0">{{$item['quests']->ingredient->name}}</h3>
                                    </div>
                                    <div class="list__next">
                                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach


    </div>

@endsection


@push('script')
    <script>
        $(document).ready(function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var model = button.data('id'); // Extract info from data-* attributes
                var name = button.data('name'); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-title').text("Delete '" + name+"' quest");
                modal.find('.modal-body input[name="id"]').val(model);
            })
        })

    </script>

@endpush


@section('modals')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sml" role="document">
            <div class="modal-content">
                <form action="{{ route('quest_delete') }}" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove quest</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this quest? </p>
                        <span class="text--message">This action can not be undone, the progress will be lost.</span><br>
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

