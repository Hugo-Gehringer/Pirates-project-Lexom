@if (isset($ressource))
    {!! Form::open(['url' => 'ressources/update/'.$ressource->id]) !!}
@method('PATCH')
@else
    {!! Form::open(['url' => 'ressources/store']) !!}
@endif
<div class="row mt-3">
    @csrf
    <div class="form-group form-control-lg col-md-6">
        {!! Form::text("name", isset($ressource) ? $ressource->name : old('name'), ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : null),'placeholder' => 'Nom']) !!}
        {!! $errors->first("name",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-6">
        {!! Form::number("quantity",isset($ressource) ? $ressource->quantity : old('quantity'), ['class' => 'form-control'.($errors->has('ship_id') ? ' is-invalid' : null),'placeholder' => 'Quantité']) !!}
        {!! $errors->first("quantity",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-6">
        {!! Form::select('type',config('constants.ressources_type'), (isset($ressource) ? $ressource->type : null), ['class' =>'form-select'. ($errors->has('type') ? ' is-invalid' : null),'placeholder' => 'Choisir un Type de ressource']) !!}
        {!! $errors->first("type",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    @if (isset($isCookEdit) or auth()?->user())
        <div class="form-group form-control-lg col-md-6">
            {!! Form::hidden('ship_id', auth()?->user()?->ship->id , array('id' => 'ship_id'))!!}
            {!! $errors->first("ship_id",'<span class="invalid-feedback">:message</span>') !!}
        </div>
    @else
        <div class="form-group form-control-lg col-md-6">
            {!! Form::select('ship_id',$ships, (isset($ship) ? $ship->id : null), ['class' =>'form-select'.($errors->has('ship_id') ? ' is-invalid' : null),'placeholder' => 'Choisir un navire', 'value'=>isset($ship) ?? $ship]) !!}
            {!! $errors->first("ship_id",'<span class="invalid-feedback">:message</span>') !!}
        </div>
    @endif
</div>
<button type="submit" class="mt-3 btn btn-secondary">Confirmer</button>
{!! Form::close() !!}
