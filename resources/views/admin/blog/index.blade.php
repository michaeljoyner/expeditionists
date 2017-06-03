@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Expeditionists Blog</h1>
        <div class="page-actions">
            <a href="/admin/blog/create">
                <div class="btn exp-btn">New Post</div>
            </a>
        </div>
        <hr/>
    </div>
    <section id="articles-vue" class="blog-listing">
        @foreach($articles as $article)
            <div class="article-index-card clearfix">
                <p class="article-index-card-date pull-right">
                    @if($article->published_on)
                        {{ $article->published_on->toFormattedDateString() }}
                    @else
                        As yet unpublished
                    @endif
                </p>
                <h2 class="article-index-card-title">{{ $article->title }}</h2>
                <p class="article-index-car-intro">{{ $article->intro }}</p>
{{--                <p>By: <span class="article-index-card-author">{{ $article->author->name }}</span></p>--}}
                <hr class="clearfix"/>
                {{--@can('manage-article', $article)--}}
                <div class="article-actions pull-right">
                    <a href="/admin/blog/{{ $article->id }}/setimage">
                        <div class="btn exp-btn btn-ghost-dark">Set Image</div>
                    </a>
                    <a href="/admin/blog/{{ $article->id }}/edit">
                        <div class="btn exp-btn">Edit</div>
                    </a>
                    @include('admin.partials.deletebutton', [
                        'objectName' => $article->title,
                        'deleteFormAction' => '/admin/blog/'.$article->id
                    ])
                    <publishbutton article="{{ $article->id }}" initial="{{ $article->published }}"></publishbutton>
                </div>
                {{--@endcan--}}
            </div>
        @endforeach
    </section>
    <section class="pagination-section">
        {!! $articles->render() !!}
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    @include('admin.partials.modalscript')
    <script>
        new Vue({
            el: '#articles-vue'
        });
    </script>
@endsection