    <div class="manage-listing-content-container" id="js-manage-listing-content-container">
      <div class="manage-listing-content-wrapper">
        <div class="manage-listing-content" id="js-manage-listing-content" style="background-color: transparent !important;">
        <div class="new-calendar"><div id="calendar-container">
  <div class="calendar-prompt-container"></div>

  <div class="calendar-settings-btn-container pull-right post-listed">
    <span class="label-contrast label-new
      hide">{{ trans('messages.lys.new') }}</span>
    <a class="text-normal link-icon" id="js-calendar-settings-btn" href="{{ url('manage-listing/'.$room_id.'/calendar') }}">
      <i class="icon icon-cog text-lead"></i>
      <span class="link-icon__text">{{ trans('messages.header.settings') }}</span>
    </a>
  </div>

  <div id="calendar">
    {!! $calendar !!}
  <footer class="space-top-6 calendar-footer-buttoned">
  <li>
  <a href="" class="text-muted" id="import_button">{{ trans('messages.lys.import_calc') }}</a>
  </li>
  <li>
  <a class="js-calendar-sync text-muted" data-prevent-default="true" href="{{ url('calendar/sync/'.$result->id) }}">{{ trans('messages.lys.sync_other_calc') }}</a>
  </li>
  <li>
  <a href="" class="text-muted" id="export_button">{{ trans('messages.lys.export_calc') }}</a>
  </li>
  </footer>
  </div>
</div>

<div class="pricing-tips-sidebar-container"></div>
</div></div>

<div class="calendar-rules-overlay hide">
<div class="panel text-center">
  <div class="panel-body">
    <div class="row row-condensed">
      <a class="modal-close hide" href="{{ url('manage-listing/'.$room_id.'/calendar') }}"></a>
      <div class="col-10 col-offset-1">
        <p class="row-space-2"><strong class="-heading"></strong></p>
        <div class="-example-image-container row-space-top-4">
          <!-- <img width="836" height="156" class="-example-image" src="./images/availability-previews@2x.png"> -->
        </div>
        <div class="-rule-caption"></div>
        <div class="-jump-to-month row-space-top-3 hide"></div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="calendar-rules" class="sidebar-overlay">

<div class="sidebar-overlay-inner js-section">
  
  <h3 class="pull-left row-space-4 sidebar-overlay-heading">
    {{ trans('messages.lys.reservation_settings') }}
  </h3>

  <a href="{{ url('manage-listing/'.$room_id.'/calendar') }}" class="modal-close" data-prevent-default=""></a>

  <div class="js-saving-progress saving-progress" style="display: none;">
  <h5>{{ trans('messages.lys.saving') }}...</h5>
</div>


  <div class="clearfix"></div>

  
    
      <div class="row-space-4">
        <label for="select-min_days_notice" class="text-muted">
          {{ trans('messages.lys.sameday_requests') }}
          
        </label>
        <div id="min-days-select" class="calendar-select"><div class="select                          select-block select-chosen">
  <select name="min_days_notice" id="select-min_days_notice" style="display: none;">
    
      <option value="-1" selected="selected">{{ trans('messages.lys.are_okay') }}</option>
    
      <option value="0">{{ trans('messages.lys.donot_want_sameday_requests') }}</option>
    
      <option value="1">{{ trans('messages.lys.donot_sameday_nextday_requests') }}</option>
    
  </select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 279px;" title="" id="select_min_days_notice_chosen"><a class="chosen-single" tabindex="-1"><span>{{ trans('messages.lys.are_okay') }}</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
</div>
</div>
      </div>
    
  

  <div class="row-space-4">
    <label for="select-turnover_days" class="text-muted">
      {{ trans('messages.lys.preparation_time') }}
      
    </label>
    <div id="turnover-days-select" class="calendar-select"><div class="select                          select-block select-chosen">
  <select name="turnover_days" id="select-turnover_days" style="display: none;">
    
      <option value="0" selected="selected">{{ trans('messages.account.none') }}</option>
    
      <option value="1">{{ trans('messages.lys.saving',['count'=>1]) }}</option>
    
      <option value="2">{{ trans('messages.lys.saving',['count'=>2]) }}</option>
    
  </select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 279px;" title="" id="select_turnover_days_chosen"><a class="chosen-single" tabindex="-1"><span>{{ trans('messages.account.none') }}</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
</div>
</div>
  </div>

  <div class="row-space-4">
    <label for="select-max_days_notice" class="text-muted">
      {{ trans('messages.lys.distant_requests') }}
    </label>
    <div id="max-days-select" class="calendar-select"><div class="select select-block select-chosen">
  <select name="max_days_notice" id="select-max_days_notice" style="display: none;">
    
      <option value="-1" selected="selected">{{ trans('messages.lys.guests_arriving_anytime') }}</option>
    
      <option value="90">{{ trans('messages.lys.guests_arrive_month',['count'=>3]) }}</option>
    
      <option value="180">{{ trans('messages.lys.guests_arrive_month',['count'=>6]) }}</option>
    
      <option value="365">{{ trans('messages.lys.guests_arrive_year') }}</option>
    
  </select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 279px;" title="" id="select_max_days_notice_chosen"><a class="chosen-single" tabindex="-1"><span>{{ trans('messages.lys.guests_arriving_anytime') }}</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
</div>
</div>
  </div>

  <div data-hook="min_max_nights" class="row row-space-2"><div class="col-6">
  <label class="label-large">{{ trans('messages.lys.minimum_stay') }}</label>
  <div class="input-addon">
    <input name="min_nights_input_value" id="min-nights" value="" type="text" class="input-stem input-large">
    <span class="input-suffix">{{ trans('messages.lys.nights') }}</span>
  </div>
</div>
<div class="col-6">
  <label class="label-large">{{ trans('messages.lys.maximum_stay') }}</label>
  <div class="input-addon">
    <input name="max_nights_input_value" id="max-nights" value="" type="text" class="input-stem input-large">
    <span class="input-suffix">{{ trans('messages.lys.nights') }}</span>
  </div>
</div>
<p id="min-max-error" class="ml-error" style="display:none;"></p>
</div>
  <div data-hook="seasonal_min_max_overview">
  <div class="row">
  <div class="col-12">
  <small>
  <a href="{{ url('manage-listing/'.$room_id.'/calendar') }}" class="text-muted link-underline" data-prevent-default="true">{{ trans('messages.lys.add_requirement_seasons') }}</a>
  </small>
  </div>
  </div></div>

  <div class="js-calendar-sync-section sidebar-overlay-highlight-section">
    
    <div></div>
    <h3 id="calendar_sync_heading" data-hook="calendar_sync_heading" class="row-space-4 sidebar-overlay-heading">
      {{ trans('messages.lys.sync_calc') }}
    </h3>
    <div data-hook="calendar_sync">
    <div class="space-2">
    <div class="row row-condensed">
    <div class="col-sm-12">
    <ul class="list-unstyled" style="margin-bottom:0;">
    <li class="space-1">
    <a href="{{ url('manage-listing/'.$room_id.'/calendar') }}" data-prevent-default="true" class="text-muted link-icon">
    <i name="download" class="icon icon-download">
    </i>
    <span>&nbsp;</span>
    <span>{{ trans('messages.lys.import_calc') }}</span>
    </a>
    </li>
    <li>
    <a href="{{ url('manage-listing/'.$room_id.'/calendar') }}" data-prevent-default="true" class="text-muted link-icon">
    <i name="share" class="icon icon-share">
    </i>
    <span>&nbsp;</span>
    <span>{{ trans('messages.lys.export_calc') }}</span>
    </a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
</div>
        <div class="manage-listing-help hide" id="js-manage-listing-help"></div>
      </div>
      <div class="manage-listing-content-background" style="background-color: transparent !important;"></div>
    </div>