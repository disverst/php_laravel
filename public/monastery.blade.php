@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all"/>
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
        <!------ section_offer-monastery ------>
        <section class="offer-monastery">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_monastery ------>
        <section class="monastery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 md-7">
                        <div class="monastery-menu">
                            <img src="{{asset('img/monastery-menu_1.webp')}}" class="monastery-menu__img" alt="{{$translation->trans('letopis')}}">
                            <div class="monastery-menu__overlay">
                                <h2 class="monastery-menu-overlay__title">
                                    {{$translation->trans('letopis')}}
                                </h2>
                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/letopis') }}" class="monastery-menu-overlay__link">
                                    {{$translation->trans('look')}}
                                </a>
                            </div>
                        </div>
                        <div class="monastery-menu">
                            <img src="{{asset('img/monastery-menu_4.webp')}}" class="monastery-menu__img"
                                 alt="{{$translation->trans('holy')}}">
                            <div class="monastery-menu__overlay">
                                <h2 class="monastery-menu-overlay__title">
                                    {{$translation->trans('holy')}}
                                </h2>
                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/chronicle/svyatyni-monastyrya') }}" class="monastery-menu-overlay__link">
                                    {{$translation->trans('look')}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 md-7">
                        <div class="monastery-menu monastery-menu--nastoyatel">
                            <img src="{{asset('img/monastery-menu_2.webp')}}" class="monastery-menu__img" alt="{{$translation->trans('nastoyatel')}}">
                            <div class="monastery-menu__overlay">
                                <h2 class="monastery-menu-overlay__title">
                                    {{$translation->trans('nastoyatel')}}
                                </h2>
                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/chronicle/nastoyatel-monastyrya') }}" class="monastery-menu-overlay__link">
                                    {{$translation->trans('look')}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 md-7">
                        <div class="monastery-menu">
                            <img src="{{asset('img/monastery-menu_3.webp')}}" class="monastery-menu__img"
                                 alt="{{$translation->trans('vozrozhdeniye')}}">
                            <div class="monastery-menu__overlay">
                                <h2 class="monastery-menu-overlay__title">
                                    {{$translation->trans('vozrozhdeniye')}}
                                </h2>
                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). 'chronicle/istoriya-obiteli') }}" class="monastery-menu-overlay__link">
                                    {{$translation->trans('look')}}
                                </a>
                            </div>
                        </div>
                        <div class="monastery-menu">
                            <img src="{{asset('img/monastery-menu_5.webp')}}" class="monastery-menu__img"
                                 alt="{{$translation->trans('chudesa')}}">
                            <div class="monastery-menu__overlay">
                                <h2 class="monastery-menu-overlay__title">
                                    {{$translation->trans('chudesa')}}
                                </h2>
                                <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/miracle') }}" class="monastery-menu-overlay__link">
                                    {{$translation->trans('look')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
