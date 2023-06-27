@if (isset($ship))
    {!! Form::open(['url' => 'ship/update']) !!}
@method('PUT')
@else
    {!! Form::open(['url' => 'ship/store']) !!}
@endif
<div class="row mt-3">
    @csrf
    <div class="form-group form-control-lg col-md-6">
        {!! Form::text("name", isset($ship) ? $ship->name : old('name'), ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : null),'placeholder' => 'Nom']) !!}
        {!! $errors->first("name",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-6">
        {!! Form::select('woodType',config('constants.ships_woodType'), (isset($ship) ? $ship->woodType : null), ['class' =>'form-select'. ($errors->has('woodType') ? ' is-invalid' : null),'placeholder' => 'Choisir un Type de bois']) !!}
        {!! $errors->first("woodType",'<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>

<button type="submit" class="mt-3 btn btn-secondary">Confirmer</button>
{!! Form::close() !!}
