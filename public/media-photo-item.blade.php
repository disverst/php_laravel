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
        <!------ section_media-photo-item ------>
        <section class="portfolio_area sec_pad bg_color">
            <div class="container">
                <ul class="portfolio_filter mb_50">
                    <li class="work_portfolio_item active"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/foto')}}">{{$translation->trans('menu_photo')}}</a></li>
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/video')}}">{{$translation->trans('menu_video')}}</a></li>
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/audio')}}">{{$translation->trans('menu_audio')}}</a></li>
                </ul>
                <div class="media-item">
                    <h2 class="media-item-title">
                        {!! $media->{'title_' .$app->getLocale()} !!}
                    </h2>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="photo-slider">
                                @if($media->files !== null)
                                    @foreach($media->files as $file)
                                        <div class="photo-slider-item">
                                            <img src="{!! asset('storage/'.$file->file_path.'/'.$file->file_name) !!}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
