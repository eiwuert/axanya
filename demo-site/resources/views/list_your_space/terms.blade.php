<div class="manage-listing-content-container" id="js-manage-listing-content-container">
    <div class="manage-listing-content-wrapper">
        <div class="manage-listing-content" id="js-manage-listing-content">
            <div>

                <div class="row-space-4">
                    <div class="row">


                        <h3 class="col-12">{{ trans('messages.lys.terms') }}</h3>

                    </div>
                    <p class="text-muted">{{ trans('messages.lys.terms_desc') }}</p>
                </div>

                <hr>


                <div class="js-section">
                    <div class="js-saving-progress saving-progress" style="display: none;">
                        <h5>{{ trans('messages.lys.saving') }}...</h5>
                    </div>


                    <div class="row row-space-2" id="min-max-nights">

                    </div>

                    <!-- <div class="row row-space-2">
                      <div class="col-6">
                        <label class="label-large">Check in After</label>
                        <div id="check-in-time-select"><div class="select
                              select-large
                              select-block">
                    <select name="check_in_time" id="select-check_in_time">

                        <option value="">Flexible</option>

                        <option value="0">12:00 AM (midnight)</option>

                        <option value="1">1:00 AM</option>

                        <option value="2">2:00 AM</option>

                        <option value="3">3:00 AM</option>

                        <option value="4">4:00 AM</option>

                        <option value="5">5:00 AM</option>

                        <option value="6">6:00 AM</option>

                        <option value="7">7:00 AM</option>

                        <option value="8">8:00 AM</option>

                        <option value="9">9:00 AM</option>

                        <option value="10">10:00 AM</option>

                        <option value="11">11:00 AM</option>

                        <option value="12">12:00 PM (noon)</option>

                        <option value="13">1:00 PM</option>

                        <option value="14">2:00 PM</option>

                        <option value="15">3:00 PM</option>

                        <option value="16">4:00 PM</option>

                        <option value="17">5:00 PM</option>

                        <option value="18">6:00 PM</option>

                        <option value="19">7:00 PM</option>

                        <option value="20">8:00 PM</option>

                        <option value="21">9:00 PM</option>

                        <option value="22">10:00 PM</option>

                        <option value="23">11:00 PM</option>

                    </select>
                  </div>
                  </div>
                      </div>
                      <div class="col-6">
                        <label class="label-large">Check out Before</label>
                        <div id="check-out-time-select"><div class="select
                              select-large
                              select-block">
                    <select name="check_out_time" id="select-check_out_time">

                        <option value="">Flexible</option>

                        <option value="0">12:00 AM (midnight)</option>

                        <option value="1">1:00 AM</option>

                        <option value="2">2:00 AM</option>

                        <option value="3">3:00 AM</option>

                        <option value="4">4:00 AM</option>

                        <option value="5">5:00 AM</option>

                        <option value="6">6:00 AM</option>

                        <option value="7">7:00 AM</option>

                        <option value="8">8:00 AM</option>

                        <option value="9">9:00 AM</option>

                        <option value="10">10:00 AM</option>

                        <option value="11">11:00 AM</option>

                        <option value="12">12:00 PM (noon)</option>

                        <option value="13">1:00 PM</option>

                        <option value="14">2:00 PM</option>

                        <option value="15">3:00 PM</option>

                        <option value="16">4:00 PM</option>

                        <option value="17">5:00 PM</option>

                        <option value="18">6:00 PM</option>

                        <option value="19">7:00 PM</option>

                        <option value="20">8:00 PM</option>

                        <option value="21">9:00 PM</option>

                        <option value="22">10:00 PM</option>

                        <option value="23">11:00 PM</option>

                    </select>
                  </div>
                  </div>
                      </div>
                    </div> -->

                    <div class="row-space-2">
                        <label class="label-large">{{ trans('messages.payments.cancellation_policy') }}</label>
                        <div id="cancellation-policy-select" class="row-space-2">
                            <div class="select
            select-large
            select-block">
                                <select name="cancel_policy" id="select-cancel_policy" data-saving="saving-progress"
                                        ng-model="cancel_policy" ng-init="cancel_policy='{{ $result->cancel_policy }}'">

                                    <option value="" {{ ($result->cancel_policy == '') ? 'selected' : '' }}>Select one
                                    </option>

                                    <option value="Flexible" {{ ($result->cancel_policy == 'Flexible') ? 'selected' : '' }}>{{ trans('messages.lys.flexible_desc') }}</option>

                                    <option value="Moderate" {{ ($result->cancel_policy == 'Moderate') ? 'selected' : '' }}>{{ trans('messages.lys.moderate_desc') }}</option>

                                <!-- <option value="Strict">{{ trans('messages.lys.strict_desc') }}</option> -->

                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="not-post-listed row row-space-top-6 progress-buttons">
                    <div class="col-12">
                        <div class="separator"></div>
                    </div>


                <!-- <a data-prevent-default="" href="{{ url('manage-listing/'.$room_id.'/details') }}" class="back-section-button">{{ trans('messages.lys.back') }}</a> -->

                    <div class="col-12">
                        <div id="js-publish-button" style="float:right;">
                            <div class="not-post-listed text-center">
                                @if($result->status == NULL)
                                    <button data-href="complete"
                                            class="animated btn btn-large btn-host btn-primary {{ ($result->steps_count == 0) ? '' : 'hide'}}"
                                            id="js-list-space-button" data-track="list_space_button_left_nav" style="">
                                        {{ trans('messages.lys.list_space') }}
                                    </button>
                            @endif

                            <!-- <button data-href="complete" class="animated btn btn-large btn-host btn-primary" id="js-list-space-button" data-track="list_space_button_left_nav" style="">
          {{ trans('messages.lys.list_space') }}
                                    </button> -->
                            <!-- <div  class="animated text-lead text-muted steps-remaining js-steps-remaining {{ ($result->steps_count != 0) ? 'show' : 'hide' }}" style="opacity: 1;"><strong class="text-highlight"> <span id="steps_count">{{ 7-$result->steps_count }}</span> / 7  </strong>{{ trans('messages.lys.steps') }} completed</div> -->

                                <div class="animated text-lead text-muted steps-remaining js-steps-remaining show"
                                     style="opacity: 1;">
                                    <div class="col-2 row-space-top-1 next_step">
                                        <a class="back-section-button"
                                           href="{{ url('manage-listing/'.$room_id.'/booking') }}"
                                           data-prevent-default="">{{ trans('messages.lys.back') }}</a>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                </div>

            </div>
            <div class="manage-listing-content-background"></div>
        </div>