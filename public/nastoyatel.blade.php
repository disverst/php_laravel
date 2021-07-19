@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all"/>
    <link rel="alternate" hreflang="ru" href="{{ url($page->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$page->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}"/>
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

@section('schema-org-church')
    <script type="application/ld+json"> {
        "@context": "https://schema.org",
        "@type": "Church",
        "name" : "@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $page->{'title_' .$app->getLocale()} }}",
        "description": "@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/') }}",
        "logo": "{{asset('img/logo.png')}}",
        "address": {
                "@type": "PostalAddress",
                "addressCountry": "UA",
                "addressLocality": "{{$translation->trans('address_city')}}",
                "postalCode": "{{$translation->trans('address_index')}}",
                "streetAddress": "{{$translation->trans('address_street')}}, {{$translation->trans('address_build')}}"
            },
        "telephone": "{{$appData->main_phone->main_phone}}",
        "sameAs": ["{{$appData->soc_net->facebook}}", "{{$appData->soc_net->youtube}}"],
        "openingHours": "{{$translation->trans('budni')}} {{$appData->opening_hours->weekdays_open}}–{{$appData->opening_hours->weekdays_close}} {{$translation->trans('vykhodnyye')}} {{$appData->opening_hours->weekend_open}}–{{$appData->opening_hours->weekend_close}}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-nastoyatel ------>
        <section class="offer-nastoyatel">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_nastoyatel ------>
        <section class="nastoyatel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left">
                        <h2 class="gedeon__title gedeon__title-nastoyatel">{{$translation->trans('Bishop-Gideon-Makarovsky')}}</h2>
                        <img src="{{asset('img/bishop_2.webp')}}" class="nastoyatel-img d-lg-none"
                             alt="{{$translation->trans('Bishop-Gideon-Makarovsky')}}">
                        <p class="gedeon__text gedeon__text-nastoyatel">{{$translation->trans('Bishop-Gideon-Makarovsky-text')}}</p>
                        <p class="gedeon__slovo gedeon__slovo-nastoyatel">{{$translation->trans('Bishop-Gideon-Makarovsky-text-title')}}</p>
                    </div>
                    <div class="col-lg-6 text-center d-none d-lg-block">
                        <img src="{{asset('img/bishop_2.webp')}}" class="nastoyatel-img"
                             alt="{{$translation->trans('Bishop-Gideon-Makarovsky')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-1')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-2')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-3')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-4')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-5')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-6')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-7')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-8')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-9')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-10')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-11')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-12')}}</p>
                        <p class="biography-top">{{$translation->trans('nastoyatel-text-13')}}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
