{!! Form::open() !!}
    <div class="sync-select-area">
        @foreach($sponsors as $sponsor)
            <div class="sync-select-card">
                <label for="sponsor_{{ $sponsor->id }}">
                    <input type="checkbox"
                           id="sponsor_{{ $sponsor->id }}"
                           name="expedition_sponsors[{{ $sponsor->id }}]"
                           value="{{ $sponsor->id }}"
                           class="select-checkbox"
                           @if($expedition->isSponsoredBy($sponsor)) checked  @endif
                    />
                    <img src="{{ $sponsor->thumbImage() }}" alt="" class="sync-select-card-image"/>
                    <p class="sync-select-card-name">{{ $sponsor->name }}</p>
                </label>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <button type="submit" class="btn exp-btn">Set Sponsors</button>
    </div>
{!! Form::close() !!}