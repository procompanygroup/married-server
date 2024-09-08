 <form action="{{ url($lang, 'quick-search') }}" id="form-search" name="form-search" method="post" autocomplete="off">
     @csrf
     <div class=" input-block   box-form">

         <div class="edit-details__content">
             <div class="row">
                 <div class="col-md-6 form-group"><label class="input-name">مكان الإقامة :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         <select name="residence" id="residence"
                             class=" form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>
                             @foreach ($prop_group['countries'] as $country)
                                 <option value="{{ $country->id }}">
                                     {{ $country->name_ar }}</option>
                             @endforeach
                         </select>


                     </div>


                 </div>
                 <div class="col-md-6 form-group"><label class="input-name">الجنسية :</label>


                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         <select name="nationality" id="nationality"
                             class=" form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>

                             @foreach ($prop_group['countries'] as $country)
                                 <option value="{{ $country->id }}">
                                     {{ $country->name_ar }}</option>
                             @endforeach
                         </select>

                         <div class="dropdown-menu ">
                             <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                 <ul class="dropdown-menu inner show" role="presentation"></ul>
                             </div>
                         </div>
                     </div>


                 </div>

                 <div class="col-md-6 form-group d-md-block"><label>العمر</label>
                     <div dir="ltr">
                         <b class="b-slide">18</b> <input id="age-slideq" name="age" type="text" class="span2"
                             value="" data-slider-min="18" data-slider-max="100" data-slider-step="1"
                             data-slider-value="[18,100]" /> <b class="b-slide">
                             100</b>
                     </div>
                 </div>
                 <div class="col-md-6 form-group d-md-block">

                 </div>
                 <div class="col-md-6 form-group box-marriage-type"><label class="input-name">نوع الزواج
                         :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         @if ($client->gender == 'male')
                          

                             <select name="wife_num_female" id="wife_num_female"
                             class=" form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>

                             @foreach ($prop_group['wife_num_female']['optionsvalues'] as $family_options)
                                 <option value="{{ $family_options['id'] }}">
                                     {{ $family_options['tr_title'] }}</option>
                             @endforeach
                         </select>
                         @else
                         <select name="wife_num" id="wife_num"
                         class=" form-control std_select std_select_big required mobile-device">
                         <option value="0">لايهم ..</option>

                         @foreach ($prop_group['wife_num']['optionsvalues'] as $family_options)
                             <option value="{{ $family_options['id'] }}">
                                 {{ $family_options['tr_title'] }}</option>
                         @endforeach
                     </select>
                         @endif

                     </div>
                 </div>

                 <div class="col-md-6 form-group box-marital-status"><label class="input-name">الحالة
                         العائلية :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         @if ($client->gender == 'male')                  

                             <select name="family_status_female" id="family_status_female"
                             class=" form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>
                             @foreach ($prop_group['family_status_female']['optionsvalues'] as $family_options)
                                 <option value="{{ $family_options['id'] }}">
                                     {{ $family_options['tr_title'] }}</option>
                             @endforeach
                         </select>
                         @else
                         <select name="family_status" id="family_status"
                         class=" form-control std_select std_select_big required mobile-device">
                         <option value="0">لايهم ..</option>
                         @foreach ($prop_group['family_status']['optionsvalues'] as $family_options)
                             <option value="{{ $family_options['id'] }}">
                                 {{ $family_options['tr_title'] }}</option>
                         @endforeach
                     </select>
                         @endif
                     </div>
                 </div>

                 <div class="col-md-6 form-group d-md-block"><label>الوزن (كغ)</label>
                     <div dir="ltr">
                         <b class="b-slide">40</b> <input type="text" name="weight" id="slider-weightq"
                             class="span2" value="" data-slider-min="40" data-slider-max="200"
                             data-slider-step="1" data-slider-value="[40,200]" /> <b class="b-slide">
                             200</b>
                     </div>
                 </div>
                 <div class="col-md-6 form-group d-md-block"><label>الطول (سم)</label>
                     <div dir="ltr">
                         <b class="b-slide">110</b> <input type="text" name="height" id="slider-heightq"
                             class="span2  " value="" data-slider-min="110" data-slider-max="225"
                             data-slider-step="1" data-slider-value="[110,225]" />
                         <b class="b-slide">
                             225</b>
                     </div>
                 </div>

                 <div class="col-md-6 form-group"><label class="input-name">لون البشرة :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         <select name="skin" id="skin"
                             class="form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>
                             @foreach ($prop_group['skin']['optionsvalues'] as $skin)
                                 <option value="{{ $skin['id'] }}">
                                     {{ $skin['tr_title'] }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <div class="col-md-6 form-group"><label class="input-name">المستوى التعليمي :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         <select name="education" id="education"
                             class="form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>
                             @foreach ($prop_group['education']['optionsvalues'] as $education)
                                 <option value="{{ $education['id'] }}">
                                     {{ $education['tr_title'] }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="col-md-6 form-group box-marital-status"><label class="input-name">الوضع
                         المادي :</label>
                     <div class="dropdown bootstrap-select std_select std_select_big required">
                         <select name="financial" id="financial"
                             class="form-control std_select std_select_big required mobile-device">
                             <option value="0">لايهم ..</option>
                             @foreach ($prop_group['financial']['optionsvalues'] as $financial)
                                 <option value="{{ $financial['id'] }}">
                                     {{ $financial['tr_title'] }}</option>
                             @endforeach
                         </select>
                     </div>

                 </div>

                 @csrf
                 <input type="hidden" name="type" value="quick">
                 <div class="submit-block text-center col-md-12"><button type="submit"
                         class="btn btn-lg btn-primary btn-submit">بحث</button></div>

             </div>
         </div>

     </div>


 </form>
