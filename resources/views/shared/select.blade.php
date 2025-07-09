@php
$class ??= null;
$name ??= '';
$value ??= '';
$type ??= '';
$label ??= ucfirst($name);
@endphp

<div class="form-group">
    <label for="typebalise_id">Type de Balise</label>
    <select name="typebalise_id" id="typebalise_id" class="form-control @error('typebalise_id') is-invalid @enderror">
        <option value=""> Sélectionnez un type</option>
        @foreach($typebalises as $typebalise)
            <option value="{{ $typebalise->id }}" {{ old('typebalise_id', $balises->typebalise_id ?? '') == $typebalise->id ? 'selected' : '' }}>
                {{ $typebalise->nom }}
            </option>
        @endforeach
    </select>
    @error('typebalise_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>