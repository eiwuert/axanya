<div id="js-manage-listing-content-container" class="manage-listing-content-container">
    <div class="manage-listing-content-wrapper">
        <div id="js-manage-listing-content" class="manage-listing-content">
            <div>
                <div id="calendar-container">
                    <div class="calendar-prompt-container">

                        <div class="row-space-4">
                            <div class="row">

                                <h3 class="col-12">{{ trans('messages.lys.calendar_title') }}</h3>

                            </div>
                            <p class="text-muted">{{ trans('messages.lys.calendar_desc') }}</p>
                        </div>

                        <div class="space-4"></div>

                    </div>

                    <div class="calendar-settings-btn-container pull-right post-listed">
    <span class="label-contrast label-new
      hide">{{ trans('messages.lys.new') }}</span>
                        <a href="#" id="js-calendar-settings-btn" class="text-normal link-icon">
                            <i class="icon icon-cog text-lead"></i>
                            <span class="link-icon__text">{{ trans('messages.lys.header') }}</span>
                        </a>
                    </div>

                    <div id="calendar">
                        <div class="row" id="wizard-container">
                            <div class="wizard-pane row row-table">
                                <div class="col-12 col-middle">
                                    <hr>
                                    <div class="row row-space-top-6">
                                        <h4 class="col-6">{{ trans('messages.lys.select_an_option') }}:</h4>
                                        <div class="col-6 text-right section-availability-dates">
                                            <div style="display: none;" class="js-saving-progress saving-progress">
                                                <h5>{{ trans('messages.lys.saving') }}...</h5>
                                            </div>

                                        </div>
                                    </div>

                                    <ul class="list-unstyled row text-center row-space-top-1 display-flex"
                                        ng-init="selected_calendar = '{{ lcfirst($result->calendar_type) }}'">

                                        <li class="availability-option col-4 display-flex">
                                            <div data-slug="always"
                                                 class="option-container available-always {{ ($result->calendar_type == 'Always') ? 'selected_calendar_type' : '' }}"
                                                 id="available-always">
                                                <div class="calendar-image available-always"></div>
                                                <p class="row-space-top-4 row-space-1">{{ trans('messages.lys.always_available') }}</p>
                                                <div class="h6 choice-description row-space-1">{{ trans('messages.lys.always_available_desc') }}</div>
                                            </div>
                                        </li>

                                        <li class="availability-option col-4 display-flex">
                                            <div data-slug="sometimes"
                                                 class="option-container available-sometimes {{ ($result->calendar_type == 'Sometimes') ? 'selected_calendar_type' : '' }}"
                                                 id="available-sometimes">
                                                <div class="calendar-image available-sometimes"></div>
                                                <p class="row-space-top-4 row-space-1">{{ trans('messages.lys.somtimes_available') }}</p>
                                                <div class="h6 choice-description row-space-1">{{ trans('messages.lys.somtimes_available_desc') }}</div>
                                            </div>
                                        </li>

                                        <li class="availability-option col-4 display-flex">
                                            <div data-slug="onetime"
                                                 class="option-container available-onetime {{ ($result->calendar_type == 'Onetime') ? 'selected_calendar_type' : '' }}"
                                                 id="available-onetime">
                                                <div class="calendar-image available-onetime"></div>
                                                <p class="row-space-top-4 row-space-1">{{ trans('messages.lys.specific_dates') }}</p>
                                                <div class="h6 choice-description row-space-1">{{ trans('messages.lys.specific_dates_desc') }}</div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="calendar-settings-container" class="row-space-6 hide">
                            <hr>

                            <div class="js-section">
                                <div style="display: none;" class="js-saving-progress saving-progress">
                                    <h5>{{ trans('messages.lys.saving') }}...</h5>
                                </div>

                                <h4>{{ trans('messages.lys.calendar_settings') }}</h4>

                                <div class="row">
                                    <div class="col-5">
                                        <div id="min-max-nights-container" class="row"></div>
                                        <div id="advance-notice-container" class="row row-space-top-3"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div id="calendar-wizard-navigation">
                            <div class="not-post-listed row row-space-top-6 progress-buttons">
                                <div class="col-12">
                                    <div class="separator"></div>
                                </div>

                                <div class="modal calendar-modal hide adminpopover1" aria-hidden="false" style=""
                                     tabindex="-1">
                                    <div class="modal-table">
                                        <div class="modal-cell">
                                            <div class="modal-content content-container modal_onlycal">
                                                <div class="panel">
                                                    <!-- <a data-behavior="modal-close" class="modal-close" href=""></a> -->

                                                    <div id="calendar-edit-container"
                                                         ng-class="selected_calendar == 'always' ? 'hide' : ''"
                                                    ">
                                                    <!-- ng-class="selected_calendar == 'always' ? 'hide' : ''"" -->
                                                    <div id="calendar">
                                                        {!! $calendar !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @if($result->status == NULL)


                            <!-- <a data-prevent-default="" href="{{ url('manage-listing/'.$room_id.'/pricing') }}" class="back-section-button">{{ trans('messages.lys.back') }}</a> -->

                        @endif



                        <!--
  @if($result->steps_count != 0)
                            <div class="col-10 text-right">

                                <a data-prevent-default="" href="" class="btn btn-large btn-primary remaining-steps-section-button" id="finish_step">
                                  {{ trans('messages.lys.finish_remaining_steps') }}
                                    </a>

                                </div>
                                @endif -->
                            <div class="col-10">
                                <div id="js-publish-button" style="float:right;">

                                    <div class="not-post-listed text-center">
                                    <!-- <button data-href="complete" {{ ($result->steps_count != 0) ? 'disabled' : '' }} class="animated btn btn-large btn-host btn-primary" id="js-list-space-button" data-track="list_space_button_left_nav" style="">
          {{ trans('messages.lys.list_space') }}
                                            </button> -->
                                    <!-- <div  class="animated text-lead text-muted steps-remaining js-steps-remaining {{ ($result->steps_count != 0) ? 'show' : 'show' }}" ><strong class="text-highlight"> <span id="steps_count">{{ 7-$result->steps_count }}</span> / 7 </strong>{{ trans('messages.lys.steps') }} completed</div> -->

                                        <div class="animated text-lead text-muted steps-remaining js-steps-remaining show"
                                             style="opacity: 1;">
                                            <div class="col-2 row-space-top-1 next_step">
                                                <a class="back-section-button"
                                                   href="{{ url('manage-listing/'.$room_id.'/pricing') }}"
                                                   data-prevent-default="">{{ trans('messages.lys.back') }}</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            @if($result->status == NULL)
                                <button data-href="complete"
                                        class="animated btn btn-large btn-host btn-primary {{ ($result->steps_count == 0) ? '' : 'hide'}}"
                                        id="js-list-space-button" data-track="list_space_button_left_nav" style="">
                                    {{ trans('messages.lys.list_space') }}
                                </button>
                                <div class="col-2 text-right next_step">
                                    <a data-prevent-default="" href="{{ url('manage-listing/'.$room_id.'/booking') }}"
                                       class="btn btn-large btn-primary next-section-button {{ ($result->steps_count != 0) ? '' : 'hide'}}">
                                        {{ trans('messages.lys.next') }}
                                    </a>
                                </div>
                            @endif

                            @if($result->status != NULL)
                                <div class="col-2 text-right next_step">
                                    <a data-prevent-default="" href="{{ url('manage-listing/'.$room_id.'/booking') }}"
                                       class="btn btn-large btn-primary next-section-button">
                                        {{ trans('messages.lys.next') }}
                                    </a>
                                </div>
                        </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>

    <div class="pricing-tips-sidebar-container"></div>
</div></div>


</div>
<div class="manage-listing-content-background"></div>
</div>

  