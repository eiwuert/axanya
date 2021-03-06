﻿@extends('template')

@section('main')

    <main id="site-content" role="main" ng-controller="payment">

        <div id="main-view" class="main-view page-container-responsive row-space-top-6 row-space-6">

            <form action="{{ url('payments/create_booking') }}" method="post" id="checkout-form">
                <input name="room_id" type="hidden" value="{{ $room_id }}">
                <input name="checkin" type="hidden" value="{{ $checkin }}">
                <input name="checkout" type="hidden" value="{{ $checkout }}">
                <input name="number_of_guests" type="hidden" value="{{ $number_of_guests }}">
                <input name="nights" type="hidden" value="{{ $nights }}">
                <input name="currency" type="hidden" value="{{ $result->rooms_price->code }}">

                {!! Form::token() !!}

                <div class="row">
                    <div class="col-md-5 col-md-push-7 col-lg-4 col-lg-push-8 row-space-2">
                        <div class="panel payments-listing">
                            <div class="media-photo media-photo-block text-center payments-listing-image">
                                {!! Html::image('images/'.$result->photo_name, $result->name, ['class' => 'img-responsive-height']) !!}
                            </div>
                            <div class="panel-body">
                                <section id="your-trip" class="your-trip">
                                    <div class="hosting-info">
                                        <div class="payments-listing-name h4 row-space-1">{{ $result->name }}</div>
                                        <div class="hide-sm">
                                            <p>{{ $result->rooms_address->city }}, {{ $result->rooms_address->state }}
                                                , {{ $result->rooms_address->country_name }}</p>
                                            <hr>
                                            <div class="row-space-1">
                                                <strong>{{ $result->room_type_name }}</strong> {{ trans('messages.payments.for') }}
                                                <strong>{{ $number_of_guests }} {{ trans_choice('messages.home.guest',$number_of_guests) }}</strong>
                                            </div>
                                            <div>
                                                <strong>{{ date('D, M d, Y', strtotime($checkin)) }}</strong> {{ trans('messages.payments.to') }}
                                                <strong>{{ date('D, M d, Y', strtotime($checkout)) }}</strong>
                                            </div>
                                        </div>
                                        <hr>
                                        <table class="reso-info-table">
                                            <tbody>
                                            <tr>
                                                <td>{{ trans('messages.payments.cancellation_policy') }}</td>
                                                <td>
                                                    <a href="{{ url('home/cancellation_policies#').strtolower($result->cancel_policy) }}"
                                                       class="cancel-policy-link"
                                                       target="_blank">{{ $result->cancel_policy }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('messages.lys.house_rules') }}</td>
                                                <td>
                                                    <a href="#house-rules-agreement"
                                                       class="house-rules-link">{{ trans('messages.payments.read_policy') }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{ ucfirst(trans_choice('messages.rooms.night',2)) }}
                                                </td>
                                                <td>
                                                    {{ $nights }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <section id="billing-summary" class="billing-summary">
                                            <div class="tooltip tooltip-top-middle taxes-breakdown" role="tooltip"
                                                 data-sticky="true" data-trigger="#tax-tooltip" aria-hidden="true">
                                                <div class="panel-body">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tooltip tooltip-top-middle makent-credit-breakdown"
                                                 role="tooltip" data-sticky="true" data-trigger="#makent-credit-tooltip"
                                                 aria-hidden="true">
                                                <div class="panel-body">
                                                    <table class="table makent-credit-breakdown">
                                                    </table>
                                                </div>
                                            </div>
                                            <table id="billing-table" class="reso-info-table billing-table">
                                                <tbody>

                                                <tr class="base-price">
                                                    <td class="name">
                                                        {{ $result->rooms_price->currency->symbol }}{{ $price_list->rooms_price }}
                                                        x {{ $nights }} {{ trans_choice('messages.rooms.night',$nights) }}
                                                    </td>
                                                    <td class="val text-right">
                                                        {{ $result->rooms_price->currency->symbol }}{{ $price_list->total_night_price }}</td>
                                                </tr>

                                                @if($price_list->service_fee)
                                                    <tr class="service-fee">
                                                        <td class="name">
                                                            {{ trans('messages.rooms.service_fee') }}
                                                            <i id="service-fee-tooltip" class="icon icon-question"></i>
                                                        </td>
                                                        <td class="val text-right">{{ $result->rooms_price->currency->symbol }}{{ $price_list->service_fee }}</td>
                                                    </tr>
                                                @endif

                                                @if($price_list->additional_guest)
                                                    <tr class="additional_price">
                                                        <td class="name">
                                                            {{ trans('messages.rooms.addtional_guest_fee') }}
                                                        </td>
                                                        <td class="val text-right">{{ $result->rooms_price->currency->symbol }}{{ $price_list->additional_guest }}</td>
                                                    </tr>
                                                @endif

                                                @if($price_list->security_fee)
                                                    <tr class="security_price">
                                                        <td class="name">
                                                            {{ trans('messages.payments.security_deposit') }}
                                                        </td>
                                                        <td class="val text-right">{{ $result->rooms_price->currency->symbol }}{{ $price_list->security_fee }}</td>
                                                    </tr>
                                                @endif

                                                @if($price_list->cleaning_fee)
                                                    <tr class="cleaning_price">
                                                        <td class="name">
                                                            {{ trans('messages.lys.cleaning') }}
                                                        </td>
                                                        <td class="val text-right">{{ $result->rooms_price->currency->symbol }}{{ $price_list->cleaning_fee }}</td>
                                                    </tr>
                                                @endif

                                                <tr class="editable-fields" id="after_apply">
                                                    <td colspan="2">
                                                        <div class="row-condensed clearfix row-space-1">
                                                            <div class="col-sm-7">
                                                                <input autocomplete="off" class="coupon-code-field"
                                                                       name="coupon_code" type="text" value="">
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <a href="javascript:void(0);" id="apply-coupon"
                                                                   class="btn btn-block apply-coupon">{{ trans('messages.payments.apply') }}</a>
                                                            </div>
                                                        </div>
                                                        <p id="coupon_disabled_message" class="icon-rausch"
                                                           style="display:none"></p>
                                                        <a href="javascript:;"
                                                           class="cancel-coupon">{{ trans('messages.your_reservations.cancel') }}</a>
                                                    </td>
                                                </tr>

                                                <tr class="coupon">
                                                    <td class="name">
          <span class="without-applied-coupon">
          <span class="coupon-section-link" id="after_apply_coupon"
                style="{{ (Session::has('coupon_amount')) ? 'display:Block;' : 'display:none;' }}">{{ trans('messages.payments.coupon') }} </span>
          </span>
                                                        <span class="without-applied-coupon" id="restric_apply">
            <a href="javascript:;" class="open-coupon-section-link"
               style="{{ (Session::has('coupon_amount')) ? 'display:none;' : 'display:Block;' }}">{{ trans('messages.payments.coupon_code') }}</a>
          </span>
                                                    </td>
                                                    <td class="val text-right">
                                                        <div class="without-applied-coupon label label-success"
                                                             id="after_apply_amount"
                                                             style="{{ (Session::has('coupon_amount')) ? 'display:Block;' : 'display:none;' }}">
                                                            -{{ $result->rooms_price->currency->symbol }}<span
                                                                    id="applied_coupen_amount">{{ $price_list->coupon_amount }}</span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr id="after_apply_remove"
                                                    style="{{ (Session::has('coupon_amount')) ? '' : 'display:none;' }}">
                                                    <td>
                                                        <a data-prevent-default="true" href="javascript:void(0);"
                                                           id="remove_coupon">
                                                            <span>Remove coupon</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <hr>

                                            <table id="payment-total-table" class="reso-info-table billing-table">
                                                <tbody>
                                                <tr class="total">
                                                    <td class="name"><span
                                                                class="h3">{{ trans('messages.rooms.total') }}</span>
                                                    </td>
                                                    <td class="text-special icon-dark-gray text-right"><span
                                                                class="h3">{{ $result->rooms_price->currency->symbol }}</span>
                                                        <span class="h3"
                                                              id="payment_total">{{ $price_list->total }}</span></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <div class="panel-total-charge">
                                                <hr>

                                                <small>
                                                    <div>
    <span id="currency-total-charge" class="">
      {{ trans('messages.payments.you_are_paying_in') }}
        <strong><span id="payment-currency">$USD</span></strong>.
        {{ trans('messages.payments.total_charge_is') }}
        <strong><span id="payment-total-charge">${{ $price_eur }}</span></strong>.
    </span>
                                                        <span id="fx-messaging">{{ trans('messages.payments.exchange_rate_booking',['symbol'=>'$']) }} {{ $result->rooms_price->currency->original_symbol }}{{ $price_rate }} {{ $result->rooms_price->currency_code }}
                                                            ({{ trans('messages.payments.host_listing_currency') }}
                                                            ).</span>
                                                    </div>
                                                </small>
                                            </div>

                                        </section>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div id="content-container" class="col-md-7 col-md-pull-5 col-lg-pull-4">
                        <div class="alert alert-with-icon alert-error alert-block hide row-space-2" id="form-errors">
                            <i class="icon alert-icon icon-alert-alt"></i>
                            <div class="h5 row-space-1 error-header">
                                {{ trans('messages.payments.almost_done') }}!
                            </div>
                            <ul></ul>

                        </div>
                        <div class="alert alert-with-icon alert-error alert-block hide row-space-2" id="server-error">
                            <i class="icon alert-icon icon-alert-alt"></i>
                            {{ trans('messages.payments.connection_timed_out',['site_name'=>$site_name]) }}
                        </div>
                        <div class="alert alert-with-icon alert-error alert-block hide row-space-2"
                             id="verification-error">
                            <i class="icon alert-icon icon-alert-alt"></i>

                            {{ trans('messages.payments.card_not_verified') }}
                        </div>
                        <section id="payment" class="checkout-main__section payment">
                            <h2 class="section-title">{{ trans('messages.payments.payment') }}</h2>

                            <div class="payment-section">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="country-select">
                                            {{ trans('messages.account.country') }}
                                        </label>

                                        <div class="select select-block">
                                            {!! Form::select('payment_country', $country, $default_country, ['id' => 'country-select']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-controls">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="payment-method-select">
                                                {{ trans('messages.payments.payment_type') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="payment-type-select">
                                        <div class="col-lg-6 row-space-2">
                                            <div class="select select-block">
                                                <select name="payment_type" class="grouped-field"
                                                        id="payment-method-select">
                                                <!-- <option value="cc" data-payment-type="payment-method" data-cc-type="visa" data-cc-name="" data-cc-expire="">
                    {{ trans('messages.payments.credit_card') }}
                                                        </option> -->
                                                    <option value="paypal" data-payment-type="payment-method"
                                                            data-cc-type="visa" data-cc-name="" data-cc-expire="">
                                                        PayPal
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="payment-method grouped-field cc">
                                                <div class="payment-logo unionpay hide"></div>
                                                <div class="payment-logo visa">{{ trans('messages.payments.credit_card') }}</div>
                                                <div class="payment-logo master"></div>
                                                <div class="payment-logo american_express"></div>
                                                <div class="payment-logo discover"></div>
                                                <div class="payment-logo jcb hide"></div>
                                                <div class="payment-logo postepay hide"></div>
                                                <i class="icon icon-lock icon-light-gray h3"></i>
                                                <div class="cc-data hide">
                                                    <div class="cc-info">
                                                        {{ trans('messages.payments.name') }}: <span
                                                                id="selected-cc-name"></span>
                                                    </div>
                                                    <div class="cc-info">
                                                        {{ trans('messages.payments.expires') }}: <span
                                                                id="selected-cc-expires"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="payment-method grouped-field digital_river_cc">
                                                <div class="payment-logo visa"></div>
                                                <div class="payment-logo master"></div>
                                                <div class="payment-logo american_express"></div>
                                                <div class="payment-logo hipercard"></div>
                                                <div class="payment-logo elo"></div>
                                                <div class="payment-logo aura"></div>
                                                <i class="icon icon-lock icon-light-gray h3"></i>
                                            </div>
                                            <div class="payment-method grouped-field paypal active">
                                                <div class="payment-logo paypal inactive">PayPal</div>
                                            </div>
                                        </div>
                                        <div class="control-group cc-zip col-md-6 cc-zip-retry hide">
                                            <label for="credit-card-zip">
                                                {{ trans('messages.payments.postal_code') }}
                                            </label>

                                            <input type="text" class="cc-zip-text cc-short cc-short-half"
                                                   name="zip_retry" id="credit-card-zip-retry">
                                            <div class="label label-warning inline-error hide"></div>
                                        </div>
                                    </div>

                                </div>

                                <div id="payment-methods-content">
                                    <div class="payment-method cc" id="payment-method-cc">
                                        <div class="payment-method-container">

                                            <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">

                                            <div class="new-card">
                                                <div class="cc-details row">
                                                    <div class="control-group cc-type col-md-6">
                                                        <label class="control-label" for="credit-card-type">
                                                            {{ trans('messages.payments.card_type') }}
                                                        </label>
                                                        <div class="select select-block">
                                                            <select id="credit-card-type" class="cc-med" name="cc_type">
                                                                <option value="visa" selected="selected">
                                                                    Visa
                                                                </option>
                                                                <option value="master">
                                                                    MasterCard
                                                                </option>
                                                                <option value="american_express">
                                                                    American Express
                                                                </option>
                                                                <option value="discover">
                                                                    Discover
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group cc-number col-md-6">
                                                        <label for="credit-card-number">
                                                            {{ trans('messages.payments.card_number') }}
                                                        </label>
                                                        {!! Form::text('cc_number', '', ['class' => 'cc-med', 'id' => 'credit-card-number', 'autocomplete' => 'off']) !!}
                                                        @if ($errors->has('cc_number'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('cc_number') }}</div> @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-group cc-expiration col-md-6">
                                                        <label aria-hidden="true">
                                                            {{ trans('messages.payments.expires_on') }}
                                                        </label>
                                                        <div class="row row-condensed">
                                                            <div class="col-sm-6">
                                                                <div class="select select-block">
                                                                    <label for="credit-card-expire-month"
                                                                           class="screen-reader-only">
                                                                        {{ trans('messages.login.month') }}
                                                                    </label>
                                                                    {!! Form::selectRangeWithDefault('cc_expire_month', 1, 12, null, 'mm', [ 'class' => 'cc-short', 'id' => 'credit-card-expire-month']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="select select-block">
                                                                    <label for="credit-card-expire-year"
                                                                           class="screen-reader-only">
                                                                        {{ trans('messages.login.year') }}
                                                                    </label>
                                                                    {!! Form::selectRangeWithDefault('cc_expire_year', date('Y'), date('Y')+10, null, 'yyyy', [ 'class' => 'cc-short', 'id' => 'credit-card-expire-year']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('cc_expire_month') || $errors->has('cc_expire_year'))
                                                            <div class="label label-warning inline-error">
                                                                @if ($errors->has('cc_expire_month'))
                                                                    {{ $errors->first('cc_expire_month') }}
                                                                @endif
                                                                @if ($errors->has('cc_expire_month') == '')
                                                                    {{ $errors->first('cc_expire_year') }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="control-group cc-security-code col-md-4">
                                                        <label class="control-label" for="credit-card-security-code">
                                                            {{ trans('messages.payments.security_code') }}
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-8">
                                                                {!! Form::text('cc_security_code', '', ['class' => 'cc-short', 'id' => 'credit-card-security-code', 'autocomplete' => 'off', 'pattern' => '[0-9]*']) !!}
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('cc_security_code'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('cc_security_code') }}</div> @endif
                                                    </div>
                                                </div>


                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h2>{{ trans('messages.payments.billing_info') }}</h2>
                                                        <p></p>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="control-group cc-first-name col-md-6">
                                                        <label class="control-label" for="credit-card-first-name">
                                                            {{ trans('messages.login.first_name') }}
                                                        </label>

                                                        {!! Form::text('first_name', '', ['id' => 'credit-card-first-name']) !!}

                                                        @if ($errors->has('first_name'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('first_name') }}</div> @endif
                                                    </div>

                                                    <div class="control-group cc-last-name col-md-6">
                                                        <label class="control-label" for="credit-card-last-name">
                                                            {{ trans('messages.login.last_name') }}
                                                        </label>

                                                        {!! Form::text('last_name', '', ['id' => 'credit-card-last-name']) !!}

                                                        @if ($errors->has('last_name'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('last_name') }}</div> @endif
                                                    </div>
                                                </div>
                                                <div class="row hide">
                                                    <div class="control-group cc-address1 col-md-6">
                                                        <label class="control-label" for="credit-card-address1">
                                                            {{ trans('messages.payments.street_address') }}
                                                        </label>

                                                        <input type="text" name="address1" id="credit-card-address1"
                                                               disabled="">
                                                        @if ($errors->has('address1'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('address1') }}</div> @endif
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label for="credit-card-address2">
                                                            {{ trans('messages.payments.apt') }} #
                                                        </label>

                                                        <input type="text" class="cc-short" name="address2"
                                                               id="credit-card-address2" disabled="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-group cc-city
                       
                        col-md-6 col-lg-5 
                        hide ">
                                                        <label for="credit-card-city">
                                                            {{ trans('messages.account.city') }}
                                                        </label>

                                                        <input type="text" name="city" id="credit-card-city"
                                                               disabled="">
                                                        @if ($errors->has('city'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('city') }}</div> @endif
                                                    </div>
                                                    <div class="cc-state col-md-2
                       hide">
                                                        <label for="credit-card-state">
                                                            {{ trans('messages.account.state') }}
                                                        </label>

                                                        <input type="text" class="cc-short" name="state"
                                                               id="credit-card-state" disabled="">
                                                    </div>

                                                    <div class="control-group cc-zip cc-zip-new
                        
                         col-md-6 col-lg-3">
                                                        <label for="credit-card-zip">
                                                            {{ trans('messages.payments.postal_code') }}
                                                        </label>

                                                        {!! Form::text('zip', '', ['id' => 'credit-card-zip', 'class' => 'cc-short cc-zip-text']) !!}

                                                        @if ($errors->has('zip'))
                                                            <div class="label label-warning inline-error">{{ $errors->first('zip') }}</div> @endif
                                                    </div>

                                                    <div class="col-md-6 col-lg-3">
                                                        <label aria-hidden="true">
                                                            <span class="screen-reader-only"></span>
                                                            &nbsp;
                                                        </label>
                                                        <div class="help-inline credit-card-country-name">
                                                            <strong id="billing-country"></strong>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="payment-method paypal active" id="payment-method-paypal">
                                        <div class="paypal-instructions row-space-top-2">
                                            <p>
                                                {{ trans('messages.payments.redirected_to_paypal') }}
                                                <strong></strong>
                                            </p>
                                        </div>
                                    </div>

                                    <input name="payment_method" type="hidden" value="paypal">
                                    <input name="country" type="hidden" value="">
                                    <input name="digital_river[country]" type="hidden" value="">

                        </section>


                        <section class="checkout-main__section">
                            <div>
                                <h2>
                                    {{ trans('messages.payments.tell_about_your_trip',['first_name'=>$result->users->first_name]) }}
                                </h2>
                                <p>
                                    {{ trans('messages.payments.helful_trips') }}:
                                </p>
                                <ul>
                                    <li>
                                        {{ trans('messages.rooms.what_brings_you',['city'=>$result->rooms_address->city]) }}
                                    </li>
                                    <li>
                                        {{ trans('messages.payments.checkin_plans') }}
                                    </li>
                                    <li>
                                        {{ trans('messages.payments.ask_recommendations') }}
                                    </li>
                                </ul>

                                <div class="media space-3">
                                    <div class="pull-left">

                                        <div class="media-photo-badge">
                                            <a href="{{ url('users/show/'.$result->user_id) }}"
                                               class="media-photo media-round"><span class="" data-pin-nopin="true"
                                                                                     style="background-image:url({{ $result->users->profile_picture->src }}); width:115px; height:115px;"
                                                                                     title="{{ $result->users->first_name }}"></span></a>
                                        </div>

                                    </div>
                                    <div class="media-body">
                                        <div class="panel panel-quote panel-dark">
                                            <p class="panel-body">
                                                {{ trans('messages.payments.welcome_to_city',['city'=>$result->rooms_address->city]) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="media">
                                <div class="pull-left">

                                    <div class="media-photo-badge">
                                        <a href="{{ url('users/show/'.Auth::user()->user()->id) }}"
                                           class="media-photo media-round"><span class="" data-pin-nopin="true"
                                                                                 style="background-image:url({{ Auth::user()->user()->profile_picture->src }}); width:115px; height:115px;"
                                                                                 title="{{ Auth::user()->user()->first_name }}"></span></a>
                                    </div>

                                </div>
                                <div class="media-body">
                                    <div class="panel panel-quote">
                                        <div class="message-to-host control-group">
                                            <label for="message-to-host-input" class="screen-reader-only">
                                                {{ trans('messages.payments.message_your_host') }}...
                                            </label>
                                            <textarea id="message-to-host-input" name="message_to_host" rows="3"
                                                      class="message-to-host-quote-input"
                                                      placeholder="{{ trans('messages.payments.message_your_host') }}..."></textarea>
                                        </div>
                                    </div>
                                    <div class="label label-warning inline-error"></div>
                                </div>
                            </div>
                        </section>


                        <section id="house-rules-agreement" class="checkout-main__section">
                            <h2 class="section-title">
                                {{ trans('messages.lys.house_rules') }}
                            </h2>
                            <p>
                                {{ trans('messages.payments.by_booking_this_space',['first_name'=>$result->users->first_name]) }}
                                .
                            </p>
                            <div class="row-space-2">
                                <div class="expandable expandable-trigger-more house-rules-panel-body expanded">
                                    <div class="expandable-content" data-threshold="50">
                                        <p>{{ $result->rooms_description->house_rules }}</p>
                                        <div class="expandable-indicator"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="policies" class="policies row-space-3">
                            <div class="terms media">

                                <div class="media-body">
                                    <label for="agrees-to-terms">
                                        {{ trans('messages.payments.by_clicking',['booking_type'=>($booking_type == 'instant_book') ? 'Book Now' : 'Continue']) }}
                                        <a href="{{ url('terms_of_service') }}" class="terms_link"
                                           target="_blank">{{ trans('messages.login.terms_service') }}</a>, <a
                                                href="#house-rules-agreement"
                                                class="house-rules-link">{{ trans('messages.lys.house_rules') }}</a>, <a
                                                href="{{ url('home/cancellation_policies#flexible') }}"
                                                class="cancel-policy-link"
                                                target="_blank">{{ trans('messages.payments.cancellation_policy') }}</a> {{ trans('messages.header.and') }}
                                        <a href="{{ url('guest_refund') }}" class="refund_policy_link"
                                           target="_blank">{{ trans('messages.login.guest_policy') }}</a>.
                                    </label>
                                </div>
                            </div>
                        </section>
                        <p>
                        </p>
                        <div id="paypal-container"></div>
                        <button id="payment-form-submit" type="submit" class="btn btn-large btn-primary">
                            {{ ($booking_type == 'instant_book') ? trans('messages.payments.book_now') : trans('messages.lys.continue') }}
                        </button>
                        <p></p>

                        <p class="book-now-explanation default">

                        </p>
                        <p class="book-now-explanation immediate_charge hide">
                            {{ trans('messages.payments.clicking') }}
                            <strong>{{ trans('messages.lys.continue') }}</strong> {{ trans('messages.payments.charge_your_payment') }}
                        </p>
                        <p class="book-now-explanation deferred_payment hide">
                            {{ trans('messages.payments.host_will_reply') }}
                        </p>
                    </div>
                </div>
            </form>

            <div id="house-rules-modal" class="modal" role="dialog" aria-hidden="true">
                <div class="modal-table">
                    <div class="modal-cell">
                        <div class="modal-content">
                            <div class="panel-header">
                                <a href="javascript:void(0);" class="panel-close" data-behavior="modal-close">
                                    ×
                                    <span class="screen-reader-only">
                {{ trans('messages.payments.house_rules') }}
              </span>
                                </a>
                                {{ trans('messages.payments.house_rules') }}
                            </div>
                            <div class="panel-body"><p>{{ $result->rooms_description->house_rules }}</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="security-deposit-modal" class="modal" role="dialog" data-trigger="#security-deposit-modal-trigger"
                 aria-hidden="true">
                <div class="modal-table">
                    <div class="modal-cell">
                        <div class="modal-content">
                            <div class="panel-header">
                                <a href="{{ url('payments/book?hosting_id=3357255&s=q315#') }}" class="panel-close"
                                   data-behavior="modal-close">
                                    ×
                                    <span class="screen-reader-only">
                {{ trans('messages.payments.security_deposit') }}
              </span>
                                </a>
                                {{ trans('messages.payments.security_deposit') }}
                            </div>
                            <div class="panel-body">
                                <p>
                                    {{ trans('messages.payments.security_deposit_collected',['site_name'=>$site_name]) }}
                                </p>
                                <p>
                                    {{ trans('messages.payments.host_reports_problem',['site_name'=>$site_name]) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <div id="gmap-preload" class="hide"></div>

    <div class="ipad-interstitial-wrapper"><span data-reactid=".1"></span></div>


    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div></div>
        </div>
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div></div>
        </div>
    </div>

    <div class="tooltip tooltip-top-middle" role="tooltip" data-trigger="#tooltip-cvv" aria-hidden="true">
        <div class="tooltip-cvv"></div>
    </div>
    <div class="tooltip tooltip-bottom-middle" role="tooltip" aria-hidden="true"><p
                class="panel-body">{{ trans('messages.payments.fee_charged_by',['site_name'=>$site_name]) }}</p>
    </div></body></html>

@stop