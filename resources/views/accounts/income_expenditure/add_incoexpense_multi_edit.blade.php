@extends('layouts.app')
@section('style')
    <style>
        .form-control {
            height: calc(1.8rem + 2px);
            padding: 6px;
            font-size: 14px;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            height: calc(1.8rem + 2px);
            padding: 6px;
            font-size: 14px;
        }
        .table td, .table th {
            padding: 3px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        {{$selectedUpangsho->upangsho_name ?? '' }} {{ $inOut == 1 ? 'আয়' : 'ব্যয়' }} হালনাগাদ
                    </div>

                </div>
                <div class="card-body">
                    <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{ route('income_expense_edit',['upangsho_id'=>$upangshoId,'vourcher'=>$vourcher,'year'=>$year,'inOut'=>$inOut]) }}">
                        @csrf
                        <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="upangsho_id" id="upangsho_id" value="{{ $selectedUpangsho->upangsho_id }}">
                        <input type="hidden" class="form-control inOutType" value="{{ $inOut }}" name="inout_id" id="inOutType">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="year" class="control-label"><strong>অর্থ বছর</strong></label>
                                    <input type="text" readonly id="year" value="{{ $incomeExpenses[0]->year ?? '' }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_id" class="control-label">
                                        <strong>ব্যাংক <span class="text-danger">*</span></strong></label>
                                    <select class="form-control select2" id="bank_id" name="bank_id" required>
                                        <option value="">ব্যাংক নির্ধারণ</option>
                                        @foreach($bank as $data)
                                            <option
                                                {{ $incomeExpenses[0]->bank_id == $data->bank_id ? 'selected' : ''  }}
                                                value="{{$data->bank_id}}">{{$data->bank_name}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="branch_id" class="control-label">
                                        <strong>শাখা <span class="text-danger">*</span></strong></label>
                                    <select class="form-control select2" id="branch_id" name="branch_id" required>
                                        <option value="">শাখা নির্ধারণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="acc_no" class="control-label">
                                        <strong>একাউন্ট</strong></label>
                                    <select class="form-control select2" id="acc_no" name="acc_no" required>
                                        <option value="">ব্যাংক একাউন্ট নম্বর নির্ধারণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="receive_date" class="control-label">
                                        <strong>তারিখ <span class="text-danger">*</span></strong></label>
                                    <input type="text" value="{{ $incomeExpenses ? \Carbon\Carbon::parse($incomeExpenses[0]->receive_datwe)->format('d-m-Y') : '' }}" class="form-control date-picker" placeholder="প্রাপ্তি / প্রদান তারিখ" id="receive_date" name="receive_date"  required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vourcher_no" class="control-label">
                                        <strong>ভাউচার <span class="text-danger">*</span></strong></label>
                                    <input  readonly value="{{ $incomeExpenses[0]->inout_id == 2 ? $incomeExpenses[0]->vourcher_no :  $incomeExpenses[0]->chalan_no }}" type="text" class="form-control" placeholder="ভাউচার নম্বর/চালান" id="vourcher_no" name="vourcher_no_edit">

                                </div>
                            </div>
                            <div class="col-md-4 item-hide">
                                <div class="form-group">
                                    <label for="check_no" class="control-label">
                                        <strong>চেক নম্বর <span class="text-danger">*</span></strong></label>
                                    <input type="text" value="{{ $incomeExpenses ? $incomeExpenses[0]->check_no : '' }}" class="form-control" placeholder="চেক নম্বর" id="check_no" name="check_no" minlength="2">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="note" class="control-label">
                                        <strong>মন্তব্য</strong></label>
                                    <input type="text" value="{{ $incomeExpenses[0]->note ?? '' }}" class="form-control" placeholder="মন্তব্য" id="note" name="note" minlength="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="receiver_name" class="control-label">
                                        <strong> প্রাপকের নাম </strong></label>
                                    <input id="receiver_name" type="text" value="{{ $incomeExpenses[0]->receiver_name }}" class="form-control" placeholder="প্রাপকের নাম" name="receiver_name">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="item-hide-s">
                                            <th colspan="5">মোট টাকা</th>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <input type="text" value="{{ $defineTotal }}" class="form-control" placeholder="মোট টাকা" id="total_amount_define">
                                                    <input type="text" value="{{ $defineTotal }}" id="total_amount_define_hide">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">খাত <span class="text-danger">*</span></th>
                                            <th class="text-center">ট্যাক্স টাইপ <span class="text-danger">*</span></th>
                                            <th class="text-center">খাতের বিবরণ</th>
                                            <th class="text-center">টাকা <span class="text-danger">*</span></th>
                                            <th class="{{ ($incomeExpenses[0]->inout_id ?? 0) == 2 ? '' : 'item-hide' }}"></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody class="app-container" id="app-container">
                                        @foreach($incomeExpenses as $incomeExpense)
                                            <tr class="app-item">
                                                <td>
                                                    <input type="hidden" class="khat_type_id" value="{{  $incomeExpense->khattype_id }}" name="khattype_id[]">
                                                    <input type="hidden" class="khat_type_type_id" value="{{ $incomeExpense->khtattypetype_id }}" name="khtattypetype_id[]">
                                                    <div class="form-group">
                                                        <select class="form-control select2 khat_id" name="khat_id[]" required>
                                                            <option value="">খাত সার্চ করুন</option>
                                                            @foreach($khats as $khat)
                                                                <option {{ $khat->khat_id == $incomeExpense->khat_id ? 'selected' : ''  }} value="{{ $khat->khat_id }}">{{ $khat->serilas }} {{ $khat->khat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @php
                                                            $details = ($incomeExpense->sector->taxType->tax_name ?? '');
                                                             if (($incomeExpense->khat->taxSubType->tax_name2 ?? false) != 'নাই'){
                                                                 $details .= ' - '.($incomeExpense->sector->taxSubType->tax_name2 ?? '');
                                                             }
                                                             $details .= ' - '.(($incomeExpense->sector->serilas != null ?  $incomeExpense->sector->serilas : '')).' '.($incomeExpense->sector->khat_name ?? '');

                                                        @endphp
                                                        <span class="khat_details" style="font-size: 13px;">{{ $details }}</span>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control select2"  name="txn[]">
                                                            <option value="">ট্যাক্স টাইপ</option>
                                                            <option {{ $incomeExpense->taxnontax == 1 ? 'selected' : '' }} value="1">ট্যাক্স</option>
                                                            <option {{ $incomeExpense->taxnontax == 2 ? 'selected' : '' }} value="2">নন-ট্যাক্স</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" value="{{ $incomeExpense->khat_des }}" class="form-control text-center" placeholder="খাতের বিবরণ" name="khat_des[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" value="{{ $incomeExpense->amount }}" class="form-control single_amount text-center" placeholder="টাকা" name="amount[]" required>
                                                    </div>

                                                </td>
                                                <td class="{{ $incomeExpense->inout_id == 2 ? '' : 'item-hide' }}">

                                                    <?php

                                                    if ($incomeExpense->inout_id == 2){
                                                        $getJVA = $incomeExpense->jvaData($incomeExpense->incoexpenses_id);
                                                    ?>
                                                    <div class="form-group">
                                                        <input type="text" value="{{ ($getJVA ? true : false) ? ($getJVA[0]->amount ?? '') : '' }}" step="any"  class="form-control text-center jamanot" placeholder="জামানত" name="jamanot[]"  >
                                                        <input type="text" value="{{ ($getJVA ? true : false) ? ($getJVA[1]->amount ?? '') : '' }}" step="any"  class="form-control text-center vat" placeholder="ভ্যাট" name="vat[]"  >
                                                        <input type="text" value="{{ ($getJVA ? true : false) ? ($getJVA[2]->amount ?? '') : ''}}" step="any"  class="form-control text-center tax" placeholder="আয় কর" name="tax[]"  >
                                                    </div>
                                                    <?php }else{ ?>
                                                    <div class="form-group">
                                                        <input type="text"  step="any"  class="form-control text-center jamanot" placeholder="জামানত" name="jamanot[]"  >
                                                        <input type="text"  step="any"  class="form-control text-center vat" placeholder="ভ্যাট" name="vat[]"  >
                                                        <input type="text"  step="any"  class="form-control text-center tax" placeholder="আয় কর" name="tax[]"  >
                                                    </div>
                                                    <?php } ?>
                                                </td>

                                                <td style="vertical-align: middle"  class="text-center"> <a role="button" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-trash"></i></a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="">
                                                <a role="button" class="btn btn-success bg-gradient-success btn-sm" id="btn-add-product"><i class="fa fa-plus"></i></a>
                                            </td>
                                            <td class="text-right" colspan="">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" id="ribet" placeholder="রিবেট">
                                                </div>
                                            </td>
                                            <td class="text-right" colspan="">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" id="sarcharge" placeholder="সারচার্জ">
                                                </div>
                                            </td>
                                            <td class="text-center" id="sub-amount">0.00</td>
                                            <td></td>
                                            <td class="{{ ($incomeExpenses[0]->inout_id ?? 0) == 2 ? '' : 'item-hide' }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right" colspan="">

                                            </td>
                                            <th class="text-right" colspan="">
                                                সর্বমোট
                                            </th>
                                            <th class="text-center" id="total-amount">0.00</th>
                                            <th></th>
                                            <th class="{{ ($incomeExpenses[0]->inout_id ?? 0) == 2 ? '' : 'item-hide' }}"></th>

                                        </tr>
                                        <tr>
                                            <th colspan="5">
                                                <button  type="submit" id="smbtn" class="btn btn-success bg-gradient-success">Submit</button>
                                            </th>
                                            <th class="{{ ($incomeExpenses[0]->inout_id ?? 0) == 2 ? '' : 'item-hide' }}"></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
  <template id="app-template">
      <tr class="app-item">

          <td>
              <input type="hidden" class="khat_type_id" name="khattype_id[]">
              <input type="hidden" class="khat_type_type_id" name="khtattypetype_id[]">
              <div class="form-group">
                  <select class="form-control select2 khat_id" name="khat_id[]" required>
                      <option value="">খাত সার্চ করুন</option>
                      @foreach($khats as $khat)
                          <option value="{{ $khat->khat_id }}">{{ $khat->serilas }} {{ $khat->khat_name }}</option>
                      @endforeach
                  </select>
                  <span class="khat_details" style="font-size: 13px;"></span>
              </div>

          </td>
          <td>
              <div class="form-group">
                  <select class="form-control select2"  name="txn[]">
                      <option value="">ট্যাক্স টাইপ</option>
                      <option value="1">ট্যাক্স</option>
                      <option value="2">নন-ট্যাক্স</option>
                  </select>
              </div>
          </td>
          <td>
              <div class="form-group">
                  <input type="text" class="form-control text-center" placeholder="খাতের বিবরণ" name="khat_des[]">
              </div>
          </td>
          <td>
              <div class="form-group">
                  <input type="text" class="form-control single_amount text-center" placeholder="টাকা" name="amount[]" required>
              </div>

          </td>
          <td class="{{ ($incomeExpenses[0]->inout_id ?? 0) == 2 ? '' : 'item-hide' }}">
              <div class="form-group">
                  <input type="text" step="any"  class="form-control text-center jamanot" placeholder="জামানত" name="jamanot[]"  >
                  <input type="text" step="any"  class="form-control text-center vat" placeholder="ভ্যাট" name="vat[]"  >
                  <input type="text"  class="form-control text-center tax" placeholder="আয় কর"  name="tax[]"  >
              </div>
          </td>
          <td style="vertical-align: middle"  class="text-center"> <a role="button" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-trash"></i></a></td>


      </tr>
  </template>

@endsection
  @section('script')
      <script>

          $(function (){
              $('.khat_id').select2();

              calculate()
              // $("#smbtn").hide();
               $(".item-hide-s").hide();

              $('.item-hide').hide();


              var inOutId = $("#inOutType").val();

              if (inOutId != '') {

                  if (inOutId != 2) {
                      $('.item-hide-s').remove();
                  }
              }

                  $('#btn-add-product').click(function () {
                  var html = $('#app-template').html();
                  var item = $(html);
                  $('#app-container').append(item);

                    initProduct();

                 var lastItem = $('.app-item').last();

                  $('.item-hide').hide();

                  var inOutId = $("#inOutType").val();

                  if (inOutId != ''){

                      if(inOutId == 1){
                          $('.item-hide').hide();

                      }
                      else if (inOutId == 2){
                          $('.item-hide-s').remove();
                          $('.item-hide').show();
                      }
                  }

                  calculate();

                  if ($('.app-item').length >= 1 ) {
                      $('.btn-remove').show();
                  }
              });

              $('body').on('click','.btn-remove', function (){

                  $(this).closest('.app-item').remove();

                  calculate();

                  if ($('.app-item').length <= 1) {
                      $('.btn-remove').hide();
                  }
              });



              $('body').on('change','.khat_id', function () {
                  let khatId = $(this).val();
                  var itemKhat = $(this);
                  itemKhat.closest('.app-item').find('.khat_details').html('');
                  itemKhat.closest('.app-item').find('.khat_type_id').val('');
                  itemKhat.closest('.app-item').find('.khat_type_type_id').val('');
                  if (khatId != '') {
                      $.ajax({
                          method: "GET",
                          url: "{{ route('get_khat_details') }}",
                          data: {khatId:khatId}
                      }).done(function (data) {
                          itemKhat.closest('.app-item').find('.khat_details').html(data.details);
                          itemKhat.closest('.app-item').find('.khat_type_id').val(data.tax_type_id);
                          itemKhat.closest('.app-item').find('.khat_type_type_id').val(data.tax_type_type_id);
                      });
                  }
              })

              $('body').on('keyup','.single_amount,.jamanot,.vat,.tax,#sarcharge,#ribet,#total_amount_define', function () {
                  calculate();
              });

              initProduct();
          });

          function calculate() {

              var subTotal = 0;
              var jamanotVatTaxTotal = 0;

              var ribet = bnToEnConversion($('#ribet').val());
              var sarcharge = bnToEnConversion($('#sarcharge').val());
              var total_amount_define = bnToEnConversion($('#total_amount_define').val());

              if (total_amount_define == '' || total_amount_define < 0 || !$.isNumeric(total_amount_define))
                  total_amount_define = 0;

              if (ribet == '' || ribet < 0 || !$.isNumeric(ribet))
                  ribet = 0;

              if (sarcharge == '' || sarcharge < 0 || !$.isNumeric(sarcharge))
                  sarcharge = 0;

              $('.app-item').each(function(i, obj) {

                  var single_amount  = bnToEnConversion($('.single_amount:eq('+i+')').val());

                  if (single_amount == '' || single_amount < 0 || !$.isNumeric(single_amount))
                      single_amount = 0;

                  var jamanot  = bnToEnConversion($('.jamanot:eq('+i+')').val());

                  if (jamanot == '' || jamanot < 0 || !$.isNumeric(jamanot))
                      jamanot = 0;

                  var vat  = bnToEnConversion($('.vat:eq('+i+')').val());

                  if (vat == '' || vat < 0 || !$.isNumeric(vat))
                      vat = 0;

                  var tax  = bnToEnConversion($('.tax:eq('+i+')').val());

                  if (tax == '' || tax < 0 || !$.isNumeric(tax))
                      tax = 0;


                  jamanotVatTaxTotal +=parseFloat(jamanot) + parseFloat(vat) + parseFloat(tax);

                  subTotal +=parseFloat(single_amount);
              });

              $('#sub-amount').html(parseFloat(subTotal));

              $('#total-amount').html(parseFloat(subTotal) + parseFloat(jamanotVatTaxTotal) + parseFloat(sarcharge) - parseFloat(ribet));


          }

          function initProduct() {
              $('.select2').select2();
          }
      </script>
      <script>

          var APP_URL = {!! json_encode(url('/')) !!};



            var OldBranchId = '{{ $incomeExpenses ? $incomeExpenses[0]->branch_id : '' }}';

            $("#bank_id").change(function (){
                var bank_id = $(this).val();

                $('#branch_id').html(' <option value="">শাখা  নির্ধারণ</option');

                if(bank_id != ''){
                    $.ajax({
                        type: "get",
                        url: '{{ url('get_bank_branch') }}',
                        data: {'bank_id': bank_id},
                        success: function (data) {
                            $.each(data, function( index, item ) {
                                if (OldBranchId == item.branch_id)
                                    $('#branch_id').append('<option value="'+item.branch_id+'" selected>'+item.branch_name+'</option>');
                                else
                                    $('#branch_id').append('<option value="'+item.branch_id+'">'+item.branch_name+'</option>');
                            });
                            $("#branch_id").trigger("change");
                        }
                    });
                }
            });
            $("#bank_id").trigger("change");

          var OldBankAccountId = '{{ $incomeExpenses ? $incomeExpenses[0]->acc_no : '' }}';

          var upangshoId = '{{ $upangshoId }}';

          $("#branch_id").change(function (){
              var branch_id = $(this).val();
              $('#acc_no').html(' <option value="">ব্যাংক একাউন্ট নম্বর নির্ধারণ</option');

              if(branch_id != ''){
                  $.ajax({
                      type: "get",
                      url: '{{ url('multi_get_bank_accounts') }}',
                      data: {'branch_id': branch_id,upangshoId:upangshoId},
                      success: function (data) {
                          $.each(data, function( index, item ) {
                              if (OldBankAccountId == item.bank_details_id)
                                  $('#acc_no').append('<option value="'+item.bank_details_id+'" selected>'+item.acc_no+'</option>');
                              else
                                  $('#acc_no').append('<option value="'+item.bank_details_id+'">'+item.acc_no+'</option>');
                          });
                      }
                  });
              }
          });

          $("#branch_id").trigger("change");

      </script>

  @endsection
