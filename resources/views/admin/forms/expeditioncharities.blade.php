{!! Form::open() !!}
@include('errors')
<div class="sync-select-area">
    @foreach($charities as $charity)
        <div class="sync-select-card">
            <label for="charity_{{ $charity->id }}">
                <input type="checkbox"
                       id="charity_{{ $charity->id }}"
                       name="expedition_charities[{{ $charity->id }}]"
                       value="{{ $charity->id }}"
                       class="select-checkbox"
                       @if($expedition->supportsCharity($charity)) checked  @endif
                />
                <img src="{{ $charity->thumbImage() }}" alt="" class="sync-select-card-image"/>
                <p class="sync-select-card-name">{{ $charity->name }}</p>
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">Set Charities</button>
</div>
{!! Form::close() !!}