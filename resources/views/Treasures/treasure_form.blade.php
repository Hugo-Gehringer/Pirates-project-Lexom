@if (isset($treasure))
    {!! Form::open(['url' => 'treasures/update/'.$treasure->id]) !!}
@method('PATCH')
@else
    {!! Form::open(['url' => 'treasures/store']) !!}
@endif
<div class="row mt-3">
    @csrf
    <div class="form-group form-control-lg col-md-4">
        {!! Form::text("name", isset($treasure) ? $treasure->name : old('name'), ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : null),'placeholder' => 'Nom']) !!}
        {!! $errors->first("name",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-4">
        {!! Form::number("price",isset($treasure) ? $treasure->price : old('price'), ['class' => 'form-control'.($errors->has('price') ? ' is-invalid' : null),'placeholder' => 'Prix']) !!}
        {!! $errors->first("price",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-4">
        {!! Form::number("weight",isset($treasure) ? $treasure->weight : old('weight'), ['class' => 'form-control'.($errors->has('weight') ? ' is-invalid' : null),'placeholder' => 'Poids']) !!}
        {!! $errors->first("weight",'<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="row mt-3">
    <div class="form-group form-control-lg col-md-4">
        {!! Form::text("description", isset($treasure) ? $treasure->description : old('description'), ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : null),'placeholder' => 'Description']) !!}
        {!! $errors->first("description",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group form-control-lg col-md-4">
        {!! Form::select('condition',config('constants.treasures_condition'), (isset($treasure) ? $treasure->condition : null), ['class' =>'form-select'. ($errors->has('condition') ? ' is-invalid' : null),'placeholder' => 'Choisir un état']) !!}
        {!! $errors->first("condition",'<span class="invalid-feedback">:message</span>') !!}
    </div>
    @if (isset($isCaptain) or auth()?->user())
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
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<button type="submit" class="mt-3 btn btn-secondary">Confirmer</button>
{!! Form::close() !!}
