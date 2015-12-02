<a href="/expeditions/{{ $expedition->slug }}"><div class="w-col w-col-6 expeditions-column">
    <div class="expeditions-wrapper">
        <img src="{{ $expedition->coverPic() }}" alt="cover image for {{ $expedition->name }}"/>
        <div class="expeditions-image-text">
            <span class="expedition-name">{{ $expedition->name }}</span>
        </div>
    </div>
</div></a>