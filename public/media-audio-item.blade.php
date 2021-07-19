@extends('public/layout.app')

@section('meta-tags')
    <title>@if($media->seo!==null){{ $media->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($media->seo!==null && $media->seo->full_description!==null){{ ($media->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{ url($media->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$media->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$media->url->full_url) }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $media->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$media->url->full_url) }}",
        "name": "@if($media->seo!==null){{ $media->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $media->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-media ------>
        <section class="offer-media">
            <h1 class="offer-title">
                {{  $media->{'title_' .$app->getLocale()} }}
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
                <div class="row audio-item">
                    <div class="col">
                        <h2 class="audio-title">
                            {{  $media->{'title_' .$app->getLocale()} }}
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="audio-item-text">
                            {{  preg_replace('/&nbsp;/','',strip_tags(($media->{'description_' .$app->getLocale()}))) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if($media->files !== null)
                            @foreach($media->files as $key=>$file)
                                <div class="audio-track">
                                    @if($file->translate !== null)
                                        <h3 class="audio-track-title">
                                            {{$file->translate->{$app->getLocale().'_text'} }}
                                        </h3>
                                    @endif
                                    <audio controls>
                                        <source src="{!! asset('storage/'.$file->file_path.'/'.$file->file_name) !!}"
                                                type="audio/mpeg">
                                        {{$translation->trans('teg-audio-ne-podderzhivayetsya-vashim-brauzerom')}}
                                        <a href="{!! asset('storage/'.$file->file_path.'/'.$file->file_name) !!}">
                                            {{$translation->trans('download-music')}}
                                        </a>
                                    </audio>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
