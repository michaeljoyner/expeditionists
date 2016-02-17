<a href="/expeditions/{{ $expedition->slug }}">
    <div class="w-col w-col-6 expeditions-column">
        <div class="expeditions-wrapper">
            <img src="{{ $expedition->coverPic() }}" alt="cover image for {{ $expedition->name }}"/>
        </div>
        <div class="expeditions-image-text">
            <h4 class="h4 expedition-name">{{ $expedition->name }}</h4>
        </div>
    </div>
</a>