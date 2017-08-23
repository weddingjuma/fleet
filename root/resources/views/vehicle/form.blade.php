<!-- Vehicle Name Starts-->
<div class="form-group">
    {{ Form::label('name', 'Name', ['class'=>'col-md-3 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>
<!-- Vehicle name ends-->
<!-- brand Starts-->
<div class="form-group">
    {{ Form::label('name', 'Brand Name', array('class'=>'col-md-3 control-label')) }}
    <div class="col-md-6">
        {{ Form::select('brand_id',$repository->brands(),null,['class'=>'form-control populate','data-plugin-selectTwo','placeholder'=>'Select Brand']) }}
    </div>
</div>
<!-- brand ends-->
<!-- Type start-->
<div class="form-group">
    {{ Form::label('name', 'Types', array('class'=>'col-md-3 control-label')) }}
    <div class="col-md-6">
        {{ Form::select('type_id',$repository->types(),null,['class'=>'form-control populate','data-plugin-selectTwo','placeholder'=>'Select Vehicle Type']) }}
    </div>
</div>
<!-- Types ends-->
<!-- Owner start-->
<div class="form-group">
    {{ Form::label('name', 'Owner Name', array('class'=>'col-md-3 control-label')) }}
    <div class="col-md-6">
        {{ Form::select('owner_id',$repository->owners(),null,['class'=>'form-control populate','data-plugin-selectTwo','placeholder'=>'Select Vehicle Owner']) }}
    </div>
</div>
<!-- Owner ends-->
<!--Road permit starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Road Permit</label>
    <div class="col-md-6">
        <div class="input-daterange input-group" data-plugin-datepicker data-date-format='yyyy-mm-dd' data-date-format='yyyy-mm-dd'>
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
            {{ Form::text('roadPermitStart', null, array('class' => 'form-control')) }}
            <span class="input-group-addon">to</span>
            {{ Form::text('roadPermitEnd', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<!--Road permit ends-->

<!--Tax Token starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Tax Token</label>
    <div class="col-md-6">
        <div class="input-daterange input-group" data-plugin-datepicker data-date-format='yyyy-mm-dd'>
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
            {{ Form::text('taxTokenStart', null, array('class' => 'form-control')) }}
            <span class="input-group-addon">to</span>
            {{ Form::text('taxTokenEnd', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<!--Road permit ends-->
<!--Road permit starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Insurance</label>
    <div class="col-md-6">
        <div class="input-daterange input-group" data-plugin-datepicker data-date-format='yyyy-mm-dd'>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
            {{ Form::text('insuranceStart', null, array('class' => 'form-control')) }}
            <span class="input-group-addon">to</span>
            {{ Form::text('insuranceEnd', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<!--Road permit ends-->

<!--Fitness starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Fitness</label>
    <div class="col-md-6">
        <div class="input-daterange input-group" data-plugin-datepicker data-date-format='yyyy-mm-dd'>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
            {{ Form::text('fitnessStart', null, array('class' => 'form-control')) }}
            <span class="input-group-addon">to</span>
            {{ Form::text('fitnessEnd', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<!--Fitness ends-->

<!--Registration Certificate starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Registration Certification</label>
    <div class="col-md-6">
        <div class="input-daterange input-group" data-plugin-datepicker data-date-format='yyyy-mm-dd'>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
            {{ Form::text('regCertStart', null, array('class' => 'form-control')) }}
            <span class="input-group-addon">to</span>
            {{ Form::text('regCertEnd', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<!--Registration Certificate ends-->

<!-- Vehicle Number Starts-->
<div class="form-group">

    <label class="col-md-3 control-label">Vehicle Number</label>
    <div class="col-md-6">
        {{ Form::text('vehicleNo',null, array('class' => 'form-control')) }}
    </div>
</div>
<!-- Vehicle number ends-->

<!-- Engine Number Starts-->
<div class="form-group">

    <label class="col-md-3 control-label">Engine Number</label>
    <div class="col-md-6">
        {{ Form::text('engineNo',null, array('class' => 'form-control')) }}
    </div>
</div>
<!-- Engine Number ends-->

<!-- Chesis Number Starts-->
<div class="form-group">

    <label class="col-md-3 control-label">Chases Number</label>
    <div class="col-md-6">
        {{ Form::text('chasesNo',null, array('class' => 'form-control')) }}
    </div>
</div>
<!-- Chesis Number ends-->

<!-- Status Starts-->
<div class="form-group">
    <label class="col-md-3 control-label">Status</label>
    <div class="col-md-6">
        {{ Form::select('status_id',$repository->status(),null,['class'=>'form-control populate','data-plugin-selectTwo']) }}
    </div>
</div>
<!-- Status ends-->
<!--Submit button -->
<div class="form-group">
    <div class="col-md-2 col-md-offset-3">
        {{ Form::submit($submitButtonText,['class'=>'form-control btn btn-success']) }}
    </div>
    <div class="col-md-2">
        {{ Form::reset('Reset',['class'=>'form-control btn btn-warning']) }}
    </div>
    <div class="col-md-2">
        <input type="Button" value="Cancel"  class="form-control btn btn-danger">
    </div>
</div>
<!-- ends-->