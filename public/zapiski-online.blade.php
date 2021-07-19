@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description"
          content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif"/>
    <meta name="robots" content="all"/>
    <link rel="alternate" hreflang="ru" href="{{ url($page->url->full_url) }}"/>
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$page->url->full_url) }}"/>
    <link rel="canonical"
          href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}"/>
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
        <!------ Podat' zapisku-onlayn ------>
        <section class="offer-zapisku-onlayn">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ Podat' zapisku onlayn ------>
        <section class="zapisku-onlayn">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="zapisku-onlayn-title">
                            {{$translation->trans('zapisku-onlayn-title')}}
                        </h2>
                        <p class="zapisku-onlayn-text">
                            {{$translation->trans('zapisku-onlayn-text-1')}}
                        </p>
                        <p class="zapisku-onlayn-text">
                            {{$translation->trans('zapisku-onlayn-text-2')}}
                        </p>
                        <p class="zapisku-onlayn-text">
                            {{$translation->trans('zapisku-onlayn-text-3')}}
                            <span>
                				<a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/miracle')}}">
                					{{$translation->trans('zapisku-onlayn-text-4')}}
                				</a>
                			</span>
                        </p>
                        <p class="zapisku-onlayn-text text-apostol-iakov">
                            {{$translation->trans('zapisku-onlayn-text-5')}}
                            <br>
                            {{$translation->trans('zapisku-onlayn-text-6')}}
                            <span>
                				{{$translation->trans('zapisku-onlayn-text-7')}}
                			</span>
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/novaya-zapiska')}}" enctype="multipart/form-data"
                      id="formNovayaZapiska">
                    @php
                        $allTypeZapiski = \App\Models\ZapiskiSubject::where('status',1)->orderBy('id')->get();

                        if(\App\Models\MetaContents::where('key','zapiski_type')->first() !== null)
                        $allTypeHeaderZapisok = \App\Models\MetaContents::where('key','zapiski_type')->first()->value;

                        $lang = Config::get('app.locale');
                    @endphp
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger text-uppercase text text-center font-weight-bold">
                            <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="btn-zapisku-onlayn o-zdravii text-center">
                                {{$translation->trans('o-zdravii')}}
                            </h3>
                            <select class="vidyu-zapisok" id="zapiski_subject_red">
                                <option class="vidyu-zapisok__text"
                                        data='{"price":"0","price_candle":"0"}'>{{$translation->trans('treba-spisok')}}</option>
                                @foreach($allTypeZapiski as $item)
                                    <option class="vidyu-zapisok__text" value="{{$item->id}}"
                                            data='{"price":"{{$item->price}}","price_candle":"{{$item->price_candle}}","header_name":"{{$allTypeHeaderZapisok->{$item->type_id}->{$lang} }}"}'
                                            @if($item->type_id == 2)hidden @endif>{{$item->{'subject_'.$lang} }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="btn-zapisku-onlayn o-upokoenii text-center">
                                {{$translation->trans('o-upokoenii')}}
                            </h3>
                            <select class="vidyu-zapisok" id="zapiski_subject_black">
                                <option class="vidyu-zapisok__text"
                                        data='{"price":"0","price_candle":"0"}'>{{$translation->trans('treba-spisok')}}</option>
                                @foreach($allTypeZapiski as $item)
                                    <option class="vidyu-zapisok__text" value="{{$item->id}}"
                                            data='{"price":"{{$item->price}}","price_candle":"{{$item->price_candle}}","header_name":"{{$allTypeHeaderZapisok->{$item->type_id}->{$lang} }}"}'
                                            @if($item->type_id == 1)hidden @endif>{{$item->{'subject_'.$lang} }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 zp-form zp-form__red" id="zapiski-form">
                            <h2 class="zp-form__title" id="formHeader">
                                {{$translation->trans('o-zdravii')}}
                            </h2>
                            <p id="titleZapiski" class="form__title-treb"></p>
                            @for($i=1;$i<12;$i++)
                                <input type="text" class="form__input nameForZapiski" name="names[]"
                                       placeholder="{{$translation->trans('enter-your-name')}}" value="">
                            @endfor
                        </div>
                        <div class="col-lg-6">
                            <div class="zp-zametki">
                                <p>
                                    {{$translation->trans('zp-zametki-text-1')}}
                                </p>
                                <p>
                                    {{$translation->trans('zp-zametki-text-2')}}
                                </p>
                                <p>
                                    {{$translation->trans('zp-zametki-text-3')}}
                                    <a href="">
                                        {{$translation->trans('zp-zametki-text-4')}}
                                    </a>
                                </p>
                            </div>
                            <div class="zp-svecha d-flex">
                                <h4>
                                    {{$translation->trans('zp-svecha-text-1')}}
                                </h4>
                                <div class="icon-candle"></div>
                                <div class="zp-svecha__number d-flex">
                                    <input type="text"
                                           name="candle_qnt"
                                           placeholder="0"
                                           id="zp-svecha__number"
                                           value="">
                                    <span>
                                    {{$translation->trans('zp-svecha-text-2')}}
                                </span>
                                </div>
                            </div>
                            <div class="zp-summa text-center">
                                <div class="zp-summa__text">
                                    <h4>
                                        {{$translation->trans('zp-summa-text-1')}}
                                    </h4>
                                </div>
                                <div class="zp-summa__number d-flex">
                                    <input type="text"
                                           name="summary"
                                           placeholder="0"
                                           id="zp-summa__number">
                                    <span>
                                    {{$translation->trans('zp-summa-text-2')}}
                                </span>
                                </div>
                                <p>
                                    {{$translation->trans('zp-summa-text-3')}}
                                </p>
                            </div>
                            <div class="zp-contacts text-center">
                                <h4>
                                    {{$translation->trans('ukazhite-vashi-kontakty')}}
                                </h4>
                                <p>
                                    {{$translation->trans('dlya-identifikatsii-vashey-zapiski-v-tserkovnom-zhurnale')}}
                                </p>
                                <input type="text"
                                       name="donor_name"
                                       placeholder="{{$translation->trans('your-name')}}">
                                <input type="email"
                                       name="email"
                                       placeholder="{{$translation->trans('e-mail')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="zp-button button">
                                {{$translation->trans('zakazat-pominoveniye')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
