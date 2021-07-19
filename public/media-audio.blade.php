@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{ url($page->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$page->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $page->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}",
        "name": "@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $page->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-media ------>
        <section class="offer-media">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_audio ------>
        <section class="portfolio_area sec_pad bg_color">
            <div class="container">
                <ul class="portfolio_filter mb_50">
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/foto')}}">{{$translation->trans('menu_photo')}}</a></li>
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/video')}}">{{$translation->trans('menu_video')}}</a></li>
                    <li class="work_portfolio_item active"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/audio')}}">{{$translation->trans('menu_audio')}}</a></li>
                </ul>
                @php
                    $medias =\App\Models\MediaLibrary::where('type', key(collect(json_decode(env('MEDIA_TYPE')))->where('slug','audio')->toArray()))
                                                        ->where('status',1)
                                                        ->with(['files','url'])
                                                        ->get();
                @endphp
                @if($medias !== null)
                    @foreach($medias as $key=>$media)
                        <div class="row audio-item">
                            <div class="col-lg-8 col-10">
                                <p class="audio-title">
                                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale().'/'.$media->url->full_url) }}">
                                        {!! $media->{'title_' .$app->getLocale()} !!}
                                    </a>
                                </p>
                            </div>
                            <div class="col-lg-4 col-2 align-self-center">
                                <a class="audio-button button text-center"
                                   href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale().'/'.$media->url->full_url) }}">
                                    <i class="fas fa-play"></i>
                                    <span>{{$translation->trans('listen')}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </main>
@endsection
