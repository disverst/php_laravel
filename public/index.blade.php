@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{url('/')}}" />
    <link rel="alternate" hreflang="en" href="{{url('en/')}}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/') }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $page->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/') }}",
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
        <!------ section_offer ------>
        <section class="offer">
            <h1 class="visually-hidden">{{ $page->{'title_' .$app->getLocale()} }}</h1>
        </section>
        <!------ section_vladimir ------>
        <section class="vladimir">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left">
                        <h2>{{$translation->trans('holy-prince-vladimir-the-great')}}</h2>
                        <img class="vladimir-image d-lg-none" src="{{asset('img/vladimir.webp')}}" width="540" height="700" alt="{{$translation->trans('holy-prince-vladimir-the-great')}}">
                        <p>{{$translation->trans('holy-prince-vladimir-the-great-text')}}</p>
                        <span class="vladimir-author">{{$translation->trans('holy-prince-vladimir-the-great-text-author')}}</span>
                        <span class="vladimir-title">{{$translation->trans('holy-prince-vladimir-the-great-text-title')}}</span>
                        <nav class="vladimir-nav">
                            <ul class="vladimir-nav__list d-flex">
                                @if($page->meta->where('key','about_menu')->first() !== null)
                                    @foreach($page->meta->where('key','about_menu')->first()->value as $menu)
                                        @if(($model = (new $menu->model)->with('url')->find($menu->model_id)) !== null)
                                            <li class="vladimir-nav__item">
                                                <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/' .$model->url->full_url) }}">
                                                    {{$model->{'title_' .$app->getLocale()} }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img class="vladimir-image" src="{{asset('img/vladimir.webp')}}" width="540" height="700" alt="{{$translation->trans('holy-prince-vladimir-the-great')}}">
                    </div>
                </div>
            </div>
        </section>
        <!------ section_bishop ------>
        <section class="bishop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img class="bishop-image" src="{{asset('img/bishop.webp')}}" width="540" height="700" alt="{{$translation->trans('Bishop-Gideon-Makarovsky')}}">
                    </div>
                    <div class="col-lg-6 d-flex text-center align-items-lg-center text-lg-left">
                        <div class="gedeon">
                            <h2 class="gedeon__title">
                                {{$translation->trans('Bishop-Gideon-Makarovsky')}}
                            </h2>
                            <img class="bishop-image d-lg-none" src="{{asset('img/bishop.webp')}}" width="540" height="700" alt="{{$translation->trans('Bishop-Gideon-Makarovsky')}}">
                            <p class="gedeon__text">
                                {{$translation->trans('Bishop-Gideon-Makarovsky-text')}}
                            </p>
                            <p class="gedeon__slovo">
                                {{$translation->trans('Bishop-Gideon-Makarovsky-text-title')}}
                            </p>
                            <a class="button" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale().'/chronicle/nastoyatel-monastyrya') }}">
                                {{$translation->trans('Read-more')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------ news-section ------>
        <section class="news-section">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="news-title">{{$translation->trans('news-title-main-page')}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="news-slider">
                            @foreach($news as $item)
                                <div class="news-slider__item d-flex ">
                                    <div class="news-slider-image">
                                        @if($item->files !== null && is_a($item->files->first(),\App\Models\File::class) && isset($item->files->first()->file_path) )
                                            <img
                                                src="{{ asset('storage/'.$item->files->first()->file_path. '/' . $item->files->first()->file_name) }}">
                                        @endif
                                    </div>
                                    <div class="news-slider-content">
                                        <h3 class="news-slider-content__title">
                                            {{ strip_tags(mb_substr($item->{'title_'.$app->getLocale()},0,150)) }}
                                        </h3>
                                        <p class="news-slider-content__text">
                                            {{ mb_substr(strip_tags($item->{'description_'.$app->getLocale()}),0,350) }}
                                        </p>
                                        <a class="news-button button" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$item->url->full_url) }}">
                                            {{$translation->trans('Read-more')}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------ trebyu-section ------>
        <section class="trebyu-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center text-center">
                        <div class="trebyu">
                            <h2 class="trebyu__title">{{$translation->trans('trebyu-title-mane-page')}}</h2>
                            <img class="trebyu-image d-lg-none" src="{{asset('img/trebyu.webp')}}" width="540" height="430" alt="{{$translation->trans('molyashchiysya-monakh')}}">
                            <p class="trebyu__text">{{$translation->trans('trebyu-text-mane-page')}}</p>
                            <a class="button" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/zapiski-online') }}">
                                {{$translation->trans('trebyu-button-mane-page')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img class="trebyu-image" src="{{asset('img/trebyu.webp')}}" width="540" height="430" alt="{{$translation->trans('molyashchiysya-monakh')}}">
                    </div>
                </div>
            </div>
        </section>
        <!------ lepta-section ------>
        <section class="lepta-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="lepta__title text-center d-lg-none">
                            {{$translation->trans('help-for-the-monastery')}}
                        </h2>
                        <img class="lepta-image" src="{{asset('img/lepta.webp')}}" width="540" height="430" alt="{{$translation->trans('desyatynniy-monastery')}}">
                    </div>
                    <div class="col-lg-6 d-flex align-items-center text-center">
                        <div class="lepta">
                            <h2 class="lepta__title d-none d-lg-block">
                                {{$translation->trans('help-for-the-monastery')}}
                            </h2>
                            <h3>
                                {{$translation->trans('when-we-give-we-get')}}
                                <br>{{$translation->trans('blessings-from-god')}}
                            </h3>
                            <p class="lepta__text">
                                {{$translation->trans('help-for-the-monastery-text-1')}}
                                <br>
                                {{$translation->trans('help-for-the-monastery-text-2')}}
                            </p>
                            <a class="button" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/rekvizity') }}">
                                {{$translation->trans('to-contribute')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!------ partners-section ------>
        <section class="partners-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="partners-title">{{$translation->trans('partners')}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <a @if(App\Http\Middleware\LocaleMiddleware::getLocale() === null) href="{{url('https://ru.unesco.org/')}}"
                           @elseif(App\Http\Middleware\LocaleMiddleware::getLocale() === 'en') href="{{url('https://en.unesco.org/')}}"
                           @endif
                           target="_blank"
                           class="partner-item">
                            <img class="partner-image" src="{{asset('img/unesco.webp')}}" width="255" height="88" alt="{{$translation->trans('unesco')}}">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <a href="http://spastv.ru/" target="_blank" class="partner-item">
                            <img class="partner-image" src="{{asset('img/spas.webp')}}" width="255" height="88" alt="{{$translation->trans('channel-spas')}}">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <a href="https://radiovera.ru/" target="_blank" class="partner-item">
                            <img class="partner-image" src="{{asset('img/vera.webp')}}" width="255" height="88" alt="{{$translation->trans('radio-vera')}}">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <a href="https://inter.ua/ru" target="_blank" class="partner-item">
                            <img class="partner-image" src="{{asset('img/inter.webp')}}" width="255" height="88" alt="{{$translation->trans('channel-Inter')}}">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
