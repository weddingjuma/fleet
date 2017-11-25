
<div class="form-group {{$errors->has('date')?'has-error':''}}">
    <label class="col-md-3 control-label">Date:</label>
    <div class="col-md-6">
        <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
            {{ Form::text('date', null, array('class' => 'form-control','data-plugin-datepicker data-date-format="yyyy-mm-dd"' )) }}
        </div>
        @if($errors->has('date'))
            <span class="help-block"><strong>{{$errors->first('date')}}</strong></span>
        @endif
    </div>
</div>

<div class="form-group {{$errors->has('expense_category_id')?'has-error':''}}">
    {{ Form::label('expense_category_id', 'Category:', array('class'=>'col-md-3 control-label')) }}
    <div class="col-md-6">
        {{ Form::select('expense_category_id',$repository->categories(),null,['class'=>'form-control populate','data-plugin-selectTwo','placeholder'=>'Select Party']) }}
        @if($errors->has('expense_category_id'))
            <span class="help-block"><strong>{{$errors->first('expense_category_id')}}</strong></span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('amount')? 'has-error':'' }}">
    {{ Form::label('amount', 'Amount (Tk.):', ['class'=>'col-md-3 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('amount', null, ['class' => 'form-control','required']) }}
        @if($errors->has('amount'))
            <span class="help-block"><strong>{{ $errors->first('amount') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('description')? 'has-error':'' }}">
    {{ Form::label('description','Description:',['class'=>'col-md-3 control-label']) }}
    <div class="col-md-6">
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        @if($errors->has('description'))
            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-2 col-md-offset-3">
        {{ Form::submit('Save',['class'=>'form-control btn btn-success']) }}
    </div>
    <div class="col-md-2">
        {{--<input type="reset" value="Reset"  class="form-control btn btn-warning">--}}
        {{ Form::reset('Reset',['class'=>'form-control btn btn-warning']) }}
    </div>
    <div class="col-md-2">
        {{--<input type="Button" value="Cancel"  class="form-control btn btn-danger">--}}
        <a href="{{ URL::previous() }}" role="button" class="form-control btn btn-danger">Back</a>
    </div>
</div>
<!-- ends-->