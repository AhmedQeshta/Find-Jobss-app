@extends('admin.AdminHome')
@section('title', 'Questions | Create')
@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="">Quizzes</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Edit Questions</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Date">
                        {{date('d M Y | h:i')}}
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->

        {{--################## Content #################--}}
        <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Update Questions</h1>
            <!-- END PAGE TITLE-->
            <!-- Table begin-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-briefcase"></i> Data Questions
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form method="POST"  action="{{ route('admin.quiz.update',[$Quiz->id,$Quiz->slug])}}">
                                @csrf
                                <div class="form-body row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Title Question</label>
                                        <input type="text" class="form-control @error('questionTitle') is-invalid @enderror" name="questionTitle" value="{{ $Quiz->questionTitle ,old('questionTitle')  }}" required placeholder="Enter Title Question">
                                        @error('questionTitle')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Required Expertise:</label>
                                        <input type="text" class="form-control input-large" value="{{ $Quiz->requiredExpertise , old('requiredExpertise') }}" name="requiredExpertise" required data-role="tagsinput">
                                        @error('requiredExpertise')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Type Question:</label>
                                        <input type="text" class="form-control input-large" value="{{ $Quiz->type_question , old('type_question') }}" name="type_question" required data-role="tagsinput">
                                        @error('type_question')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Question Description:</label>
                                        <textarea class="form-control"  name="questionDescription" id="summernote_1">{{ $Quiz->questionDescription , old('questionDescription')}} </textarea>
                                        @error('questionDescription')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Answer Question Description</label>
                                        <textarea class="form-control"  name="answerQuestionDescription" id="summernote_answer">{{ $Quiz->answerQuestionDescription , old('answerQuestionDescription')}} </textarea>
                                        @error('answerQuestionDescription')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <div class="btn-set pull-left">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="reset" class="btn blue">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>

            </div>
            <!-- Table end-->
            {{--   ###########   End Content #########      --}}


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection

