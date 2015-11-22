{!! Form::open() !!}
<div class="sync-select-area">
    @foreach($profiles as $profile)
        <div class="sync-select-card">
            <label for="profile_{{ $profile->id }}">
                <input type="checkbox"
                       id="profile_{{ $profile->id }}"
                       name="team_member[{{ $profile->id }}]"
                       value="{{ $profile->id }}"
                       class="select-checkbox"
                        @if($expedition->hasTeamMember($profile)) checked  @endif
                />
                <img src="{{ $profile->profilePic() }}" alt="" class="sync-select-card-image"/>
                <p class="sync-select-card-name">{{ $profile->name }}</p>
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">Set Team</button>
</div>
{!! Form::close() !!}