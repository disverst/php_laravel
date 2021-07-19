<!-------- header -------->
<header class="page-header">
    <div class="navigation-mobile">
        <div class="container">
            <div class="row d-flex align-items-center p-1 d-xl-none">
                <div class="col-4">
                    <ul class="main-nav__list site-list d-flex">
                        <li class="nav-mob-item">
                            <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/divine-services/raspisanie-bogosluzheniy') }}">
                                {{$translation->trans('raspisanie')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="social d-flex">
                        <li class="social__item">
                            <a class="social__link social__link--facebook" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->facebook}}">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li class="social__item">
                            <a class="social__link social__link--youtube" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->youtube}}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="social__item">
                            <a class="social__link social__link--instagram" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->instagram}}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="lang-list d-flex justify-content-end">
                        <li class="lang-list__item lang-list__item--ru">
                            <a href="{{route('setlocale', ['lang' => 'ru'])}}">ru</a>
                        </li>
                        @if(!isset($prayers))
                            <li class="lang-list__item lang-list__item--ua">
                                <a href="{{route('setlocale', ['lang' => 'en'])}}">en</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-10 col-xl-5">
                    <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/') }}"
                       class="logo d-flex align-items-center">
                        <img class="logo-image" src="{{asset('img/logo.png')}}" width="57" height="72"
                             alt="{{$translation->trans('desyatynniy-monastery')}}">
                        <span class="logo-title">
							{{$translation->trans('desyatynniy-monastery')}} <br> {{$translation->trans('birth-of-Mother-of-God')}}
                        </span>
                    </a>
                </div>
                <div class="col-2 col-xl-7 d-flex align-items-center justify-content-end">
                    <nav class="main-nav">
                        <ul class="main-nav__list site-list d-flex">
                            @if(isset($appData->main_menu) && $appData->main_menu !== null)
                                @foreach($appData->main_menu as $menu)
                                    @if(($model = (new $menu->model)->with('url')->find($menu->model_id)) !== null)
                                        <li class="site-list__item">
                                            <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/' .$model->url->full_url) }}">{{$model->{'title_' .$app->getLocale()} }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </nav>
                    <ul class="social d-flex">
                        <li class="social__item d-none d-xl-block">
                            <a class="social__link social__link--facebook" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->facebook}}">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li class="social__item d-none d-xl-block">
                            <a class="social__link social__link--youtube" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->youtube}}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="social__item d-none d-xl-block">
                            <a class="social__link social__link--instagram" rel="nofollow" target="_blank"
                               href="{{$appData->soc_net->instagram}}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="lang-list d-none d-xl-block">
                        <li class="lang-list__item lang-list__item--ru">
                            <a href="{{route('setlocale', ['lang' => 'ru'])}}">ru</a>
                        </li>
                        @if(!isset($prayers))
                            <li class="lang-list__item">
                                <a href="{{route('setlocale', ['lang' => 'en'])}}">en</a>
                            </li>
                        @endif
                    </ul>
                    <div class="header__burger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
