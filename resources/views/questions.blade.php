@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-9 box-section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-sm-12 pt-5">
                        <div class="settings-page">
                            <div class="settings-page__header">
                                <div class="settings-page__header-title">
                                </div>
                                <div class="settings-page__header-actions">
                                    <a href="/users/question/create" class="btn btn-primary">Create</a>
                                </div>
                            </div>
                            <div class="settings-page__body settings-page__body-products">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr style="height: 65px;">
                                            <th>Question</th>
                                            <th>Weight</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $key=> $question)
                                            <tr>
                                                <td>{{$question['question']}}</td>
                                                <td>{{$question['weight']}}</td>
                                                <td>
                                                    <div class="action">
                                                        <a data-method="GET"
                                                           data-action="/users/question/edit/{{$question['id']}}"
                                                           href="/users/question/edit/{{$question['id']}}"><span
                                                                    class="far fa-pencil"></span></a>
                                                        <a data-method="GET"
                                                           data-action="{{route('question.delete',$question['id'])}}"
                                                           href="{{route('question.delete',$question['id'])}}"
                                                           class="delete-product"><span class="far fa-trash-alt" onclick="deleteQuestion('Are you sure you want to delete question ?')"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
                function deleteQuestion(message) {
                    if (!confirm(message))
                        event.preventDefault();
                }
        </script>
    @endpush
@endsection
