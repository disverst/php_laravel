@if($bannerHelp)
    <!------ banner-help ------>
    <section class="banner-help">
        <h2 class="banner-help__title text-center d-lg-none">{{$translation->trans('help-for-the-monastery')}}</h2>
        <div class="banner-help__image">
            <img src="{{asset('img/banner-help.webp')}}" alt="{{$translation->trans('desyatynniy-monastery')}}">
        </div>
        <div class="banner-help__content">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="banner-help__body">
                            <h2 class="banner-help__title d-none d-lg-block">{{$translation->trans('help-for-the-monastery')}}</h2>
                            <p class="banner-help__text">
                                {{$translation->trans('when-we-give-we-get')}}
                                <br>{{$translation->trans('blessings-from-god')}}
                            </p>
                            <div class="section__bnt">
                                <a class="button" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/rekvizity') }}">{{$translation->trans('pozhertvovat')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!------ footer -------->
<footer class="page-footer">
    <div class="page-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h4 class="contacts__title d-lg-none">
                        {{$translation->trans('contacts')}}
                    </h4>
                    <div class="footer-map">
                        <iframe @if(App\Http\Middleware\LocaleMiddleware::getLocale() === null) src="{{url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.084659532672!2d30.514667150295857!3d50.45814817937572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce43b620f6d9%3A0xadcb5490c979822c!2z0JTQtdGB0Y_RgtC40L3QvdC40Lkg0LzQvtC90LDRgdGC0LjRgCDQoNGW0LfQtNCy0LAg0J_RgNC10YHQstGP0YLQvtGXINCR0L7Qs9C-0YDQvtC00LjRhtGWINCj0J_Qpg!5e0!3m2!1sru!2sua!4v1600871405933!5m2!1sru!2sua')}}"@elseif(App\Http\Middleware\LocaleMiddleware::getLocale() === 'en') src="{{url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.084659527268!2d30.514672515731743!3d50.458148179476474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce43b620f6d9:0xadcb5490c979822c!2sDesyatynnyy Monastyr Rizdva Presvyatoyi Bohorodytsi!5e0!3m2!1sen!2sua!4v1602325488571!5m2!1sen!2sua')}}"@endif height="670" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contacts">
                        <h4 class="contacts__title d-none d-lg-block">
                            {{$translation->trans('contacts')}}
                        </h4>
                        <p class="contacts__text">
                            {{$translation->trans('address_index')}}, {{$translation->trans('address_city')}}, {{$translation->trans('address_street')}}, {{$translation->trans('address_build')}}
                        </p>
                        <a class="contacts__phone" href="tel:{{str_replace([' ','-'],'',$appData->main_phone->main_phone)}}">
                            <span class="contacts__phone-mobile">{{$translation->trans('phone')}}</span>
                            {{$appData->main_phone->main_phone}}
                        </a>
                        <a class="contacts__email" href="mailto:{{str_replace([' ','-'],'',$appData->main_mail->main_mail)}}">
                            {{$appData->main_mail->main_mail}}
                        </a>
                    </div>
                    <div class="open">
                        <h4 class="open__title">{{$translation->trans('monastyr-otkryt')}}</h4>
                        <p class="open__text d-flex">
                            <span>
                                {{$translation->trans('budni')}} {{$appData->opening_hours->weekdays_open}}–{{$appData->opening_hours->weekdays_close}}
                            </span>
                            {{$translation->trans('vykhodnyye')}} {{$appData->opening_hours->weekend_open}}–{{$appData->opening_hours->weekend_close}}
                        </p>
                    </div>
                    <div class="footer-nav">
                        <h4 class="footer-nav__title">{{$translation->trans('navigation')}}</h4>
                        @if(isset($appData->main_menu) && $appData->main_menu !== null)
                            @foreach(collect($appData->main_menu)->chunk(3) as $rows)
                                <ul class="footer-nav__list d-flex">
                                    @foreach($rows as $menu)
                                        @if(($model = (new $menu->model)->with('url')->find($menu->model_id)) !== null)
                                            <li class="footer-nav__item">
                                                <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/' .$model->url->full_url) }}">{{$model->{'title_' .$app->getLocale()} }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        @endif
                    </div>
                    <div class="footer-social d-flex">
                        <span class="footer-social__title">{{$translation->trans('sledite-za-nami')}}</span>
                        <ul class="footer-social__list d-flex align-items-center">
                            <li class="footer-social__item">
                                <a class="footer-social__link social__link--facebook" rel="nofollow" target="_blank" href="{{$appData->soc_net->facebook}}">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </li>
                            <li class="footer-social__item">
                                <a class="footer-social__link social__link--youtube" rel="nofollow" target="_blank" href="{{$appData->soc_net->youtube}}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li class="footer-social__item">
                                <a class="footer-social__link social__link--instagram" rel="nofollow" target="_blank" href="{{$appData->soc_net->instagram}}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="copyright__link">dorea.online</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- JS Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
