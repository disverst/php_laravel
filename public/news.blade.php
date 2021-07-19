@extends('public/layout.app')

@section('meta-tags')
    <title>@if($newsCategory->seo!==null){{ ($newsCategory->seo->{'title_'.$app->getLocale()}) }}@endif</title>
    <meta name="description" content="@if($newsCategory->seo!==null){{ ($newsCategory->seo->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{ url($newsCategory->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$newsCategory->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url) }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $newsCategory->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url) }}",
        "name": "@if($newsCategory->seo!==null){{ $newsCategory->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $newsCategory->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-revival ------>
        <section class="offer-news">
            <h1 class="offer-title">
                {{  $newsCategory->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!--blog area start-->
        <div class="blog_page_section blog_fullwidth mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper">
                            @foreach($news as $item)
                                <article class="single_blog">
                                    <figure>
                                        <figcaption class="blog_content">
                                            <h2 class="post_title">
                                                @if($item->url !== null)
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$item->url->full_url) }}">
                                                        {{ $item->{'title_'.$app->getLocale()} }}
                                                    </a>
                                                @endif
                                            </h2>
                                            <div class="blog_meta">
                                                <p>
                                                    {{ \Carbon\Carbon::parse($item->date_publication)->locale($app->getLocale())->translatedFormat('d F Y') }}
                                                </p>
                                            </div>
                                        </figcaption>
                                        <div class="blog_thumb blog_thumb_active owl-carousel">
                                            @foreach($item->files->where('key','news-gallery') as $key =>$file)
                                                <div class="single_blog_thumb">
                                                    @if($file !== null && is_a($file,\App\Models\File::class) && isset($file->file_path))
                                                        <img src="{{ asset('storage/'.$file->file_path. '/' . $file->file_name) }}">
                                                    @endif
                                                </div>
                                                @break($key == 0)
                                            @endforeach
                                        </div>
                                        <figcaption class="blog_content">
                                            <p>
                                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$item->url->full_url) }}">
                                                    {!! trim(mb_substr(strip_tags( $item->{'description_'.$app->getLocale()} ),0,450),' \t\n\r\0\x0B"') !!}
                                                </a>
                                            </p>
                                            <footer class="blog_footer">
                                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$item->url->full_url) }}">
                                                    {{$translation->trans('read_more_btn')}}
                                                </a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                            @endforeach
                        </div>
                        <!--blog pagination area start-->
                        <div class="blog_pagination pagination_full">
                            <div class="pagination">
                                <ul>
                                    @php
                                        $currentPage = \Request::get('page');
                                        if($currentPage === null) $currentPage = 1;
                                        if(\Request::get('sort') !== null) {$currentSort='&sort='.\Request::get('sort');}
                                        else {$currentSort='';}
                                    @endphp
                                    @if($maxPage > 1 )
                                        @if($currentPage > 1)
                                            <li>
                                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url) }}">
                                                    |<
                                                </a>
                                            </li>
                                            @if($currentPage == 2)
                                                <li>
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url) }}">
                                                        <
                                                    </a>
                                                </li>
                                            @elseif($currentPage > 1)
                                                <li>
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url.'?page='.($currentPage - 1)) }}">
                                                        <

                                                    </a>
                                                </li>
                                            @elseif($currentPage > 1)
                                                <li>
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url.'?page='.($currentPage - 1)) }}">
                                                        <
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                        @for($k=1; $k <= $maxPage; $k++)
                                            @if( $k == $currentPage )
                                                <li class="current">
                                                    {{$k}}
                                                </li>
                                            @elseif($k === 1 && $k != $currentPage)
                                                <li>
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url) }}">
                                                        {{$k}}
                                                    </a>
                                                </li>
                                            @elseif(($k + 1) == $currentPage || ($k - 1) == $currentPage)
                                                <li>
                                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url.'?page='.$k.$currentSort) }}">
                                                        {{$k}}
                                                    </a>
                                                </li>
                                            @elseif(($k + 2) == $currentPage || ($k - 2) == $currentPage)
                                                ...
                                            @else
                                                @continue
                                            @endif
                                        @endfor
                                        @if($currentPage < $maxPage)
                                            <li>
                                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url.'?page='.($currentPage + 1)) }}">
                                                    >
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$newsCategory->url->full_url.'?page='.$maxPage) }}">
                                                    >|
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!--blog pagination area end-->
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget">
                            @include('public.news.element_blog_sidebar_widget',[
                                        'translation'=>$translation,
                                        'last_news'=>$newsCategory->news->take(5),
                                        'allCategories'=>$allCategories,
                                        'newsCategorySlug'=>$newsCategory->url->full_url
                                    ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog area end-->
    </main>
@endsection
