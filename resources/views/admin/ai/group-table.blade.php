 



     @if (isset($vielList))
         <div class="col-sm-6">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>القيمة</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($List as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" name=group_op[] class="form-check-input"
                                    value="{{ $item['option']->id }}" id="{{ $item['option']->id }}"
                                    @if ($item['is_group'] == 1) @checked(true) @endif>
                                <label class="form-check-label"
                                    for="{{ $item['option']->id }}">{{ $item['option']->name }}</label>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">لايوجد بيانات لعرضها</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
         </div>
         <div class="col-sm-6">
          <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>القيمة / انثى /</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($vielList as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" name=group_op2[] class="form-check-input"
                                    value="{{ $item['option']->id }}" id="{{ $item['option']->id }}"
                                    @if ($item['is_group'] == 1) @checked(true) @endif>
                                <label class="form-check-label"
                                    for="{{ $item['option']->id }}">{{ $item['option']->name }}</label>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">لايوجد بيانات لعرضها</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <input type="hidden" name="group_prop_id" value="{{ $group_prop_id }}">
         </div>

     @else
         <div class="col-sm-12">
             <table id="example1" class="table table-bordered table-striped table-hover">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>القيمة</th>
                     </tr>
                 </thead>
                 <tbody>
                     @php
                         $i = 0;
                     @endphp
                     @forelse ($List as $item)
                         <tr>
                             <th scope="row">{{ ++$i }}</th>
                             <td>
                                 <div class="form-check">
                                     <input type="checkbox" name=group_op[] class="form-check-input"
                                         value="{{ $item['option']->id }}" id="{{ $item['option']->id }}"
                                         @if ($item['is_group'] == 1) @checked(true) @endif>
                                     <label class="form-check-label"
                                         for="{{ $item['option']->id }}">{{ $item['option']->name }}</label>
                                 </div>

                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6" style="text-align:center;">لايوجد بيانات لعرضها</td>
                         </tr>
                     @endforelse

                 </tbody>
             </table>
         </div>

     @endif





 
