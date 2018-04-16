
var loadingIcon22px = '<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />';
var loadingIcon30px = '<img src="/crm/img/load-30px.gif" id="loading" alt="loading" />';

$(function(){
	$.datepicker.setDefaults({
		language: 'ja',
		dateFormat: 'yy-mm-dd',
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		todayHightlight: true,
		beforeShowDay: function(date) {
			var result;
			var dd = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
			var hName = ktHolidayName(dd);
			if(hName != "") {
				result = [true, "date-holiday", hName];
			} else {
				switch (date.getDay()) {
				case 0:
					result = [true, "date-holiday"];
					break;
				case 6:
					result = [true, "date-saturday"];
					break;
				default:
					result = [true];
					break;
				}
			}
			return result;
		}
	});
	$('#disposal_datepicker').datepicker({
		maxDate: 0
	});
	$('#end_at_datepicker').datepicker({
		minDate: 0
	});
	$('#satei_datepicker1').datepicker({
		minDate: 0
	});
	$('#satei_datepicker2').datepicker({
		minDate: 0
	});	
	$('#zentei_datepicker1').datepicker({
		minDate: 0
	});
	$('#zentei_datepicker2').datepicker({
		minDate: 0
	});
	$('#zentei_datepicker3').datepicker({
		minDate: 0
	});
	
	$('#due_datepicker').datepicker({
		minDate: 0
	});
	$('#receipts_datepicker').datepicker({
		maxDate: 0
	});
	$('#auction_cost_datepicker').datepicker({
		maxDate: 0
	});
	$('#recycle_due_datepicker').datepicker({
		minDate: 0
	});
	$('#recycle_receipts_datepicker').datepicker({
		maxDate: 0
	});
	$('#apply_insurance_datepicker').datepicker({
		maxDate: 0
	});
	$('#receive_insurance_datepicker').datepicker({
		maxDate: 0
	});
	$('#apply_weight_tax_datepicker').datepicker({
		maxDate: 0
	});
	$('#receive_weight_tax_datepicker').datepicker({
		maxDate: 0
	});
	$('#scrap_date_datepicker').datepicker({
		maxDate: 0
	});
			$('#trade_datepicker').datepicker({
		minDate: 0
	});
	$('#trade_datepicker2').datepicker({
		minDate: 0
	});
	$('#trade_datepicker3').datepicker({
		minDate: 0
	});
	$('#tel_date').datepicker({
		minDate: 0
	});
	$('#customer_comfirm_date').datepicker({
		minDate: 0
	});
	$('#customer_finish_date').datepicker({
		minDate: 0
	});
	$('#sale_date').datepicker({
		minDate: 0
	});
	$('#accounts_receivable_date').datepicker({
		minDate: 0
	});
	$('#request_date').datepicker({
		minDate: 0
	});
	$('#liner_date').datepicker({
		minDate: 0
	});	
	$('#money_date01').datepicker({
		minDate: 0
	});	
	$('#money_date02').datepicker({
		minDate: 0
	});	
	$('#money_date03').datepicker({
		minDate: 0
	});	
	$('#money_date04').datepicker({
		minDate: 0
	});	
	$('#autocar_date').datepicker({
		minDate: 0
	});	
		$('#second_trade_trade_schedule_date').datepicker({minDate:0});

	$('.receipts_date_datepicker').datepicker({maxDate: 0});

	$('#photo_term_date').datepicker({minDate: 0});
	$('#transport_receipts_date').datepicker();

	/* 桁数表示 */
	$(document).on('blur', '.numeric', function(){
		$(this).val(addFigure($(this).val()));
	});
	$(document).on('focus', '.numeric', function(){
		$(this).val(delFigure($(this).val()));
	});

	$('#vehicle_tax_due_date').datepicker({minDate: 0});
	$('#sales_contact').change(function() {
		if ($('#sales_contact option:selected').val() == 1			|| $('#sales_contact option:selected').val() == 2			|| $('#sales_contact option:selected').val() == 3			|| $('#sales_contact option:selected').val() == 6			|| $('#sales_contact option:selected').val() == 7 ) {
			$('#contact_name').autocomplete({
				source: '/crm/Traders/autoCompleteContactName',
				disabled: false,
				autoFocus: true,
				select: function(event, ui) {
					$('#contact_name').val(ui.item.trader_name);
					$('#contact_cd').val(ui.item.trader_cd);
					$('#contact_cd_output').html(ui.item.trader_cd);
					$('#contact_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.trader_phone_number + '" dial_number="0676707744" speaker_cd="' + ui.item.trader_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');

					return false;
				}
			}).data("ui-autocomplete")._renderItem = function(ul, item) {
				return $("<li>")
					.append("<a>" + item.trader_name + "</a>")
					.appendTo(ul);
			};
		} else if ($('#sales_contact option:selected').val() == 4) {
			$('#contact_name').autocomplete({
				source: '/crm/AuctionSites/autoCompleteContactName',
				disabled: false,
				autoFocus: true,
				select: function(event, ui) {
					$('#contact_name').val(ui.item.auction_site_name);
					$('#contact_cd').val(ui.item.auction_site_cd);
					$('#contact_cd_output').html(ui.item.auction_site_cd);
					$('#contact_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.auction_site_phone_number + '" dial_number="0676707744" speaker_cd="' + ui.item.auction_site_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');

					return false;
				}
			}).data("ui-autocomplete")._renderItem = function(ul, item) {
				return $("<li>")
					.append("<a>" + item.auction_site_name + "</a>")
					.appendTo(ul);
			};
		} else {
			$('#contact_name').autocomplete({
				disabled: true
			});
		}
	});

		if ($('#sales_contact option:selected').val() == 1			|| $('#sales_contact option:selected').val() == 2			|| $('#sales_contact option:selected').val() == 3			|| $('#sales_contact option:selected').val() == 6			|| $('#sales_contact option:selected').val() == 7 ) {
		$('#contact_name').autocomplete({
			source: '/crm/Traders/autoCompleteContactName',
			disabled: false,
			autoFocus: true,
			select: function(event, ui) {
				$('#contact_name').val(ui.item.trader_name);
				$('#contact_cd').val(ui.item.trader_cd);
				$('#contact_cd_output').html(ui.item.trader_cd);
				$('#contact_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.trader_phone_number + '" dial_number="0676707744" speaker_cd="' + ui.item.trader_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');

				return false;
			}
		}).data("ui-autocomplete")._renderItem = function(ul, item) {
			return $("<li>")
				.append("<a>" + item.trader_name + "</a>")
				.appendTo(ul);
		};
	} else if ($('#sales_contact option:selected').val() == 4) {
		$('#contact_name').autocomplete({
			source: '/crm/AuctionSites/autoCompleteContactName',
			disabled: false,
			autoFocus: true,
			select: function(event, ui) {
				$('#contact_name').val(ui.item.auction_site_name);
				$('#contact_cd').val(ui.item.auction_site_cd);
				$('#contact_cd_output').html(ui.item.auction_site_cd);
				$('#contact_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.auction_site_phone_number + '" dial_number="0676707744" speaker_cd="' + ui.item.auction_site_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');

				return false;
			}
		}).data("ui-autocomplete")._renderItem = function(ul, item) {
			return $("<li>")
				.append("<a>" + item.auction_site_name + "</a>")
				.appendTo(ul);
		};
	} else {
		$('#contact_name').autocomplete({

		disabled: true
		});
	}

	$('#AgreementOrderEditForm').disableOnSubmit();

// 引取業者オートコンプリート
		/*$('#trader_name, #second_trade_trader_name').autocomplete({
		source: '/crm/Traders/autoCompleteContactName',
		disabled: false,
		autoFocus: true,
		select: function(event, ui) {
			var id = $(this).attr('id');
			//第一引取用
			if( id == 'trader_name'){
				$('#trader_name').val(ui.item.trader_name);
				$('#trader_cd').val(ui.item.trader_cd);
				$('#trader_cd_div').html(ui.item.trader_cd);
				$('#trader_delinquent_div').html(ui.item.trader_delinquent);
				$('#trader_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.trader_phone_number + '" dial_number=0676707744" speaker_cd="' + ui.item.trader_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');
				$('.send_trade_request_fax_button_div').html('');
			} else {
				$('#second_trade_trader_name').val(ui.item.trader_name);
				$('#second_trade_trader_name').attr('trader_cd',ui.item.trader_cd);
				$('#second_trader_cd').val(ui.item.trader_cd);
				$('#second_trader_cd_div').html(ui.item.trader_cd);
				$('#second_trader_delinquent_div').html(ui.item.trader_delinquent);
				$('#second_trader_phone_number_div').html('<a class="call_phone" incoming_number="' + ui.item.trader_phone_number + '" dial_number=0676707744" speaker_cd="' + ui.item.trader_cd + '" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a>');
				$('.send_second_trade_request_fax_button_div').html('');
			}

			return false;
		}
	}).data("ui-autocomplete")._renderItem = function(ul, item) {
		return $("<li>")
			.append("<a>" + item.trader_name + "</a>")
			.appendTo(ul);
	};*/
	// オークション関連費用ツールチップ
	$('.tooltip_auction_cost_note').darkTooltip({
		size: 'small',
		gravity: 'west',
		theme: 'light',
		trigger: 'click',
		animation: 'flipIn'
	});

// メルマガ配信停止
	$(document).on('click', '.reject_mailmagazine', function(){
		var mailmagazine_link = $(this);
		var div = $(this).parent();
		var mailmagazine = div.prev('.mailmagazine');
		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Customers/edit_mailmagazine',
			datatype: 'json',
			data: {
				'id' : mailmagazine_link.attr('customer_id')
			}
		})
			.done(function(data){
				if (data == '') {
					div.html('');
					mailmagazine.html('配信停止');
				} else {
					alert(data);
					div.html(prev_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('メルマガ配信停止設定できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

	$(document).on('click', '.handle_history_title', function(){
		$('.handle_history_list').slideToggle();
		if ($('.handle_history_arrow').html() == '<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>') {
			$('.handle_history_arrow').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
		} else {
			$('.handle_history_arrow').html('<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>');
		}
	});

	$(document).on('click', '.sms_history_title', function(){
		$('.sms_history_list').slideToggle();
		if ($('.sms_history_arrow').html() == '<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>') {
			$('.sms_history_arrow').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
		} else {
			$('.sms_history_arrow').html('<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>');
		}
	});

	$(document).on('click', '.call_record_title', function(){
		$('.call_record_list').slideToggle();
		if ($('.call_record_arrow').html() == '<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>') {
			$('.call_record_arrow').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
		} else {
			$('.call_record_arrow').html('<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>');
		}
	});


// 対応履歴入力
	$(document).on('click', '.add_inquiry_detail', function(){
		var add_link = $(this);
		var div = $(this).parent();
		var inquiry_id = add_link.attr('inquiry_id');
		var conditions_input = $('#InquiryDetailConditions');
		var conditions = conditions_input.val();
		var calling_input = $("input[name='data[InquiryDetail][calling]']");
		var calling = $("input[name='data[InquiryDetail][calling]']:checked").val();
		if (inquiry_id == '') {
			alert('問合情報が登録されていません。');
			return false;
		}
		if (conditions.replace(/\s|　/g, '') == '') {
			alert('対応履歴が入力されていません。');
			return false;
		}
		var prev_html = div.html();
		conditions_input.attr('readonly', true);
		calling_input.attr('readonly', true);
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/InquiryDetails/add',
			datatype: 'html',
			data: {
				'inquiry_id' : add_link.attr('inquiry_id'),
				'conditions' : conditions,
				'calling' : calling
			}
		})
			.done(function(data){
				if (data != '') {
					$('.handle_history').empty();
					$('.handle_history').append(data);
					div.html(prev_html);
					conditions_input.attr('readonly', false);
					conditions_input.val('');
					calling_input.attr('readonly', false);
					calling_input.val(['1']);
					$('.handle_history_list').show();
					$('.handle_history_arrow').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
				} else {
					alert('対応履歴の登録に失敗しました。');
					div.html(prev_html);
					conditions_input.attr('readonly', false);
					calling_input.attr('readonly', false);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('対応履歴の登録ができませんでした。');
				div.html(prev_html);
				conditions_input.attr('readonly', false);
				calling_input.attr('readonly', false);
			});
		return false;
	});

// SMS送信
	$(document).on('click', '.send_short_message', function(){
		var send_link = $(this);
		var div = $(this).parent();
		var inquiry_id = send_link.attr('inquiry_id');
		var message_input = $('#short_message');
		var message = message_input.val();
		var target_phone_input = $("input[name='data[ShortMessage][target_phone]']");
		var target_phone = $("input[name='data[ShortMessage][target_phone]']:checked").val();
		var customer_phone_number1 = $('#phone_number1').val().replace(/[^0-9]/g, '');
		var customer_call_ng1 = $('#call_ng1:checked').val();
		var customer_phone_number2 = $('#phone_number2').val().replace(/[^0-9]/g, '');
		var customer_call_ng2 = $('#call_ng2:checked').val();
		var customer_phone_number3 = $('#phone_number3').val().replace(/[^0-9]/g, '');
		var customer_call_ng3 = $('#call_ng3:checked').val();
		var customer_phone_number4 = $('#phone_number4').val().replace(/[^0-9]/g, '');
		var customer_call_ng4 = $('#call_ng4:checked').val();

		if (inquiry_id == '') {
			alert('問合情報が登録されていません。');
			return false;
		}
		if (message.replace(/\s|　/g, '') == '') {
			alert('メッセージが入力されていません。');
			return false;
		}
		switch (target_phone) {
			case '1':
				if (customer_phone_number1.length != 10 && customer_phone_number1.length != 11) {
					alert('電話番号1が正しく入力されていません。');
					return false;
				}
				if (customer_call_ng1 == 1) {
					alert('電話番号1は架電不可です。');
					return false;
				}
				phone_number = customer_phone_number1;
				break;
			case '2':
				if (customer_phone_number2.length != 10 && customer_phone_number2.length != 11) {
					alert('電話番号2が正しく入力されていません。');
					return false;
				}
				if (customer_call_ng2 == 1) {
					alert('電話番号2は架電不可です。');
					return false;
				}
				phone_number = customer_phone_number2;
				break;
			case '3':
				if (customer_phone_number3.length != 10 && customer_phone_number3.length != 11) {
					alert('電話番号3が正しく入力されていません。');
					return false;
				}
				if (customer_call_ng3 == 1) {
					alert('電話番号3は架電不可です。');
					return false;
				}
				phone_number = customer_phone_number3;
				break;
			case '4':
				if (customer_phone_number4.length != 10 && customer_phone_number4.length != 11) {
					alert('電話番号4が正しく入力されていません。');
					return false;
				}
				if (customer_call_ng4 == 1) {
					alert('電話番号4は架電不可です。');
					return false;
				}
				phone_number = customer_phone_number4;
				break;
		}

		var prev_html = div.html();
		message_input.attr('readonly', true);
		target_phone_input.attr('readonly', true);
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/ShortMessages/send',
			datatype: 'html',
			data: {
				'inquiry_id' : inquiry_id,
				'message' : message,
				'target_phone' : target_phone,
				'phone_number' : phone_number
			}
		})
			.done(function(data){
				if (data == '') {
					alert('ショートメッセージの送信に失敗しました。');
					div.html(prev_html);
					message_input.attr('readonly', false);
					target_phone_input.attr('readonly', false);
				} else if (data == '1') {
					alert('ショートメッセージの送信先が携帯電話ではありません。');
					div.html(prev_html);
					message_input.attr('readonly', false);
					target_phone_input.attr('readonly', false);
				} else {
					$('.sms_history').empty();
					$('.sms_history').append(data);
					$('.sms_history_arrow').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
					$('.sms_history_list').css('display', '');
					div.html(prev_html);
					message_input.attr('readonly', false);
					message_input.val('');
					target_phone_input.attr('readonly', false);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('ショートメッセージの送信ができませんでした。');
				div.html(prev_html);
				message_input.attr('readonly', false);
				target_phone_input.attr('readonly', false);
			});
		return false;
	});

// ナンバープレート到着処理
	$(document).on('click', '.receive_np', function(){
		var receive_link = $(this);
		var div = $(this).parent();
		var number_plate = div.prev('.number_plate');
		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Documents/receive_np',
			datatype: 'json',
			data: {
				'id' : receive_link.attr('document_id')
			}
		})
			.done(function(data){
				if (data == '') {
					alert('N/P到着設定に失敗しました。');
					div.html(prev_html);
				} else if (data == '1') {
					alert('N/Pが既に到着済です。ページを再読み込みしてください。');
					div.html(prev_html);
				} else {
					var json = $.parseJSON(data);
					div.html('');
					number_plate.html('到着 [' + json.receive_datetime + ' (' + json.receiver_name + ')]');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('N/P到着設定が動作しません。');
				div.html(prev_html);
			});
		return false;
	});

// 書類督促通知停止
	$(document).on('click', '.stop_incompleteness_notice', function(){
		var stop_link = $(this);
		var div = $(this).parent();
		var stop_incompleteness_notice = div.prev('.stop_incompleteness_notice_div');
		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Documents/stop_incompleteness_notice',
			datatype: 'json',
			data: {
				'id' : stop_link.attr('document_id')
			}
		})
			.done(function(data){
				if (data == '') {
					alert('書類督促通知の停止に失敗しました。');
					div.html(prev_html);
				} else if (data == '1') {
					alert('書類督促通知が停止済です。ページを再読み込みしてください。');
					div.html(prev_html);
				} else {
					var json = $.parseJSON(data);
					div.html('');
					stop_incompleteness_notice.html('<span class="text-danger">停止中</span> [' + json.stop_datetime + ' (' + json.stopper_name + ')]');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('書類督促通知の停止機能が動作しません。');
				div.html(prev_html);
			});
		return false;
	});

// 書類督促
	$(document).on('click', '.press_document', function(){
		var press_link = $(this);
		var div = $(this).parent();
		var inquiry_id = press_link.attr('inquiry_id');
		var document_id = press_link.attr('document_id');
		var phone_schedule_date = $('#phone_schedule_datepicker').val();
		if (phone_schedule_date != '') {
			var phone_schedule_year = phone_schedule_date.substr(0, 4);
			var phone_schedule_month = phone_schedule_date.substr(5, 2);
			var phone_schedule_day = phone_schedule_date.substr(8, 2);
			var phone_schedule_di = new Date(phone_schedule_year, phone_schedule_month - 1, phone_schedule_day);
			if (!(phone_schedule_di.getFullYear() == phone_schedule_year && phone_schedule_di.getMonth() == phone_schedule_month - 1 && phone_schedule_di.getDate() == phone_schedule_day)) {
				alert('次回書類督促日に正しい日付を入力してください。');
				return false;
			}
		}
		var prev_html = div.html();
		$('#phone_schedule_datepicker').attr('readonly', true);
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Documents/press_document',
			datatype: 'html',
			data: {
				'inquiry_id' : inquiry_id,
				'document_id' : document_id,
				'phone_schedule_date' : phone_schedule_date
			}
		})
			.done(function(data){
				if (data != '') {
					$('.press_document_history').empty();
					$('.press_document_history').append(data);
					div.html(prev_html);
					$('#phone_schedule_datepicker').attr('readonly', false);
				} else {
					alert('次回書類督促日の登録に失敗しました。');
					div.html(prev_html);
					$('#phone_schedule_datepicker').attr('readonly', false);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('次回書類督促日が登録できませんでした。');
				div.html(prev_html);
				$('#phone_schedule_datepicker').attr('readonly', false);
			});
		return false;
	});

// QUOカード発送状況変更
	$(document).on('click', '.quo_send_btn', function(){
		$('.quo_set_btn').html('<div id="loading" style="position:absolute;width:50px;right:0px;top:0px;text-align:center;">'+loadingIcon22px+'</div>');
		var quo_send = $(this).attr('quo_send');
		var document_id = $('input[name="data[Document][id]"]').val();
		var prev_td = $('#quo_box').parents('td').html();
		$.ajax({
			type: 'POST',
			url: '/crm/Documents/change_quo_send',
			datatype: 'json',
			data: {
				'document_id' : document_id,
				'quo_send' : quo_send
			}
		})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					if(json.success){
						$('.quo_status_box').html(json.quo_send);
						if(quo_send == 9){
							$('.quo_status_box').next('.col-md-10').html('<div class="col col-md-2 col-md-offset-10 quo_set_btn" style="padding:6px 0px;text-align:right;"><a class="btn btn-success btn-xs quo_send_btn" quo_send="0" href="/crm/AgreementOrders/edit/118262">未送付</a></div>');
						}else if(quo_send == 0){
							$('.quo_status_box').next('.col-md-10').prepend('<div class="col quo_price_box col-md-5" style="padding:6px 0px;">'+json.price+'</div>');
							$('.quo_set_btn').html('<a id="quo_price_change_btn" class="btn btn-success btn-xs quo_price_btn" price_status="change" style="margin-right:10px;" href="/crm/AgreementOrders/edit/118262">金額変更</a><a id="quo_send_btn9" class="btn btn-primary btn-xs quo_send_btn" quo_send="9" style="margin-right:10px;" href="/crm/AgreementOrders/edit/118262">不要</a><a id="quo_send_btn1" class="btn btn-warning btn-xs quo_send_btn" href="/crm/AgreementOrders/edit/54311" quo_send="1">送付済</a>').addClass('col-md-7').removeClass('col-md-2 col-md-offset-10');
						}else{
							var div_box = $('.quo_price_box').parents('.col-md-10');
							$('.quo_price_box').remove();
							$('.quo_set_btn').remove();
							div_box.html('<div style="padding:6px 0px;">'+json.price+' ['+json.quo_send_datetime+'('+json.setter+')]</div>')
						}
					}else{
						alert(json.message);
						$('#quo_box').html(prev_td);
					}

				}else{
					alert('QUOカード発送状況変更を変更できませんでした');
				}

			})
			.fail(function(jqXHR, textStatus) {
				alert('QUOカード発送状況変更を変更できませんでした');

			});
		return false;
	});

//QUOカード金額ボタン
	$(document).on('click', '.quo_price_btn', function(){
		var price_status = $(this).attr('price_status');
		if(price_status == 'change'){
			$('.quo_price_box').html('<input id="DocumentQuoPrice_" type="hidden" value="" name="data[Document][quo_price]">').addClass('col-md-8').removeClass('col-md-5');
			$('.quo_set_btn').addClass('col-md-4').removeClass('col-md-7').find('#quo_send_btn9').css({'margin-right':'0px'});
			$('#quo_send_btn1').remove();
			$(this).attr('price_status','set');
							$('.quo_price_box').append('<label class="radio-inline" for="DocumentQuoPrice0"><input id="DocumentQuoPrice0" type="radio" value="0" style="margin:0px 0px 0px -15px" name="data[Document][quo_price]">千円</label>');
							$('.quo_price_box').append('<label class="radio-inline" for="DocumentQuoPrice1"><input id="DocumentQuoPrice1" type="radio" value="1" style="margin:0px 0px 0px -15px" name="data[Document][quo_price]" checked>三千円</label>');
							$('.quo_price_box').append('<label class="radio-inline" for="DocumentQuoPrice2"><input id="DocumentQuoPrice2" type="radio" value="2" style="margin:0px 0px 0px -15px" name="data[Document][quo_price]">五千円</label>');
						return false;
		}else if(price_status == 'set'){
			var prev_html = $(this).html();
			var quo_price = $('input[name="data[Document][quo_price]"]:checked').val();
			var document_id = $('input[name="data[Document][id]"]').val();
			var prev_quo_set_btn = $('.quo_set_btn').html();
			$('.quo_set_btn').html('<div id="loading" style="position:absolute;width:50px;right:0px;top:0px;text-align:center;">'+loadingIcon22px+'</div>');

			if(quo_price == undefined){
				alert('金額を選択して下さい');
					$('.quo_set_btn').html(prev_quo_set_btn);
					return false;
			}
			$.ajax({
				type: 'POST',
				url: '/crm/Documents/set_quo_price',
				datatype: 'html',
				data: {
					'document_id' : document_id,
					'quo_price' : quo_price
				}
			})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					if(json.success){
						$('.quo_price_box').html(json.price).addClass('col-md-5').removeClass('col-md-8');
						$('.quo_set_btn').addClass('col-md-7').removeClass('col-md-4').html(prev_quo_set_btn);
						$('#quo_send_btn9').after('<a id="quo_send_btn1" class="btn btn-warning btn-xs quo_send_btn" quo_send="1" href="/crm/AgreementOrders/edit/118262">送付済</a>').css({'margin-right':'10px'});
						$('#quo_price_change_btn').attr('price_status','change');
					}else{
						alert('QUOカード金額設定に失敗しました');
						$('.quo_set_btn').html(prev_quo_set_btn);
					}

				} else {
					alert('QUOカード金額設定に失敗しました');
					$('.quo_set_btn').html(prev_quo_set_btn);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('QUOカード金額設定に失敗しました');
				$('.quo_set_btn').html(prev_quo_set_btn);
			});
		}
		return false;
	});

// 書類備考編集
	$(document).on('click', '.edit_document_remark', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var document_id = edit_link.attr('document_id');
		var remark = $('#DocumentRemark').val();

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Documents/edit_remark',
			data: {
				'id' : document_id,
				'remark' : remark
			}
		})
			.done(function(data){
				if (data == '') {
					div.html('<a href="javascript:void(0);" class="btn btn-primary btn-xs edit_document_remark" document_id="' + document_id + '">編集</a>');

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>書類備考を編集しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-success');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>書類備考を編集しました。');
					}
				} else {
					div.html(prev_html);

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a>書類備考の編集に失敗しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-danger');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>書類備考の編集に失敗しました。');
					}

					alert('書類備考の編集に失敗しました。');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('書類備考が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

	$(document).on('click', '#edit_own_car_photos', function(){
		// 順位指定に重複無いかチェック
		var positions = [0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				];
		$('.position_own_car_photos').each(function(){
			if($(this).val()){
				positions[$(this).val()] += 1;
			}
		});
		var error = false;
		$.each(positions, function(i, value) {
			if(!error){
				if(value > 1){
					alert('複数写真の表示順が同じになっているため登録できません');
					error = true;
				}
			}
		});
		if(error){
			return false;
		}
		// 削除確認ダイアログ
		if($('[class="delete_own_car_photos"]:checked').length > 0){
			if (!confirm('写真を削除します\nよろしいですか？')) {
				return false;
			}
		}
	});
	$(".colorbox").colorbox({photo: true, rel:'gal', maxWidth:'90%'});
	$('.inline_colorbox').colorbox({
		inline:true
	});
	$('.popup').colorbox({
		inline:true
	});
	$('.answer_customer_question').colorbox({
		inline:true
	});
	$('.edit_question').colorbox({
		inline:true
	});

// 引取依頼書送信処理
	$(document).on('click', '.send_trade_request_fax', function(){
		var send_link = $(this);
		var div = $(this).parent();
		var send_trade_request_fax_div = div.prev('.send_trade_request_fax_div');
		var prev_html = div.html();
		var trade_id = send_link.attr('trade_id');
		var agreement_order_id = send_link.attr('agreement_order_id');
		var trader_cd = send_link.attr('trader_cd');
		var sales_contact = send_link.attr('sales_contact');
		$(this).hide();
		div.html(loadingIcon22px);
		if (trader_cd == 'T00120014') {
			window.open('/crm/Trades/pdf_zero/' + agreement_order_id, '_blank');
		} else {
			if (sales_contact == '4') {
				window.open('/crm/Trades/pdf_transport/' + agreement_order_id, '_blank');
			} else {
				window.open('/crm/Trades/pdf/' + agreement_order_id, '_blank');
			}
		}
		$.ajax({
			type: 'POST',
			url: '/crm/trades/send_trade_request_fax',
			data:
			{
				'id' : trade_id,
				'trader_cd' : trader_cd,
				'sales_contact' : sales_contact
			}
		})
			.done(function(data){
				if (data == '1') {
					alert('引取業者が変更されています。ページを再読み込みしてください。');
					div.html(prev_html);
				} else if (data == '2') {
					alert('FAX番号/E-mailが登録されていません。');
					div.html(prev_html);
				} else if (data == '3') {
					alert('引取依頼処理に失敗しました。');
					div.html(prev_html);
				} else if (data == '4') {
					alert('引取依頼書送信処理に失敗しました。');
					div.html(prev_html);
				} else if (data == '5') {
					alert('未回収金があるため発注できません！');
					div.html(prev_html);
				} else if (data == '6') {
					alert('業者情報の更新に失敗しました。');
					div.html(prev_html);
				} else {
					var json = $.parseJSON(data);
					div.html('');
					send_trade_request_fax_div.html('<span class="text-primary">送信済</span> [' + json.trade_request_datetime + ' (' + json.trade_requester_name + ')]');
					$("#cash_button").css({'display':'none'});
					$('.trade_request_confirmation_td').html('<div class="col col-md-2 col-md-offset-10 text-center confirm_request_fax_button_div"><input name="confirm_request_fax" class="btn btn-success btn-xs confirm_request_fax" type="submit" value="確認"></div>');
					var finish_trade_html = '';
					if ($('#trade_datepicker').val() != '') {
						finish_trade_html += '<div class="col col-md-4 col-md-offset-4 text-center finish_trade_button_div"><input name="finish_trade" class="btn btn-success btn-xs finish_trade" type="submit" value="第一希望日：完了"></div>';
					}
					if ($('#trade_datepicker2').val() != '') {
						finish_trade_html += '<div class="col col-md-4 text-center finish_trade_button_div2"><input name="finish_trade2" class="btn btn-info btn-xs finish_trade2" type="submit" value="第二希望日：完了"></div>';
					}
					$('.finish_trade_td').html(finish_trade_html);
					$('.tradable_list_tr').attr('style', 'display: none;');
					$('.exhibit_scrap_auction_button_div').html('');
					$('.start_price_td').html('');
					$('.sale_with_document_td').html('');
					$('.recycling_deposit_for_sa_td').html('');
					$('.recycling_fee_for_sa_td').html('');
					$('.end_at_td').html('');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('引取依頼FAXの発行に失敗しました。');
				div.html(prev_html);
			});
		return false;
	});

// 第二引取依頼書送信処理
	$(document).on('click', '.send_second_trade_request_fax', function(){
		var send_link = $(this);
		var div = $(this).parent();
		var send_trade_request_fax_div = div.prev('.send_second_trade_request_fax_div');
		var prev_html = div.html();
		var open_url = '';
		$(this).hide();

		var send_data = {
			'agreement_order_id' : 118262,
			'trader_cd' : $('#second_trade_trader_name').attr('trader_cd') || '',
			'sales_contact' : $('#sales_contact').val(),
		};

		div.html(loadingIcon22px);
		if(send_data.trader_cd == 'T00120014'){
			open_url = '/crm/SecondTrades/pdf_zero/118262';
		} else if(send_data.sales_contact == '4'){
			open_url = '/crm/SecondTrades/pdf_transport/118262';
		} else {
			open_url = '/crm/SecondTrades/pdf/118262';
		}
		window.open(open_url);
		$.ajax({
			'type': 'POST',
			'url': '/crm/SecondTrades/send_trade_request_fax',
			'dataType': 'JSON',
			'data': send_data
		})
			.done(function(json){
				if(json.success){
					div.html('');
					send_trade_request_fax_div.html('<span class="text-primary">送信済</span> [' + json.trade_request_datetime + ' (' + json.trade_requester_name + ')]');
					$('.second_trade_request_confirmation_td').html('<div class="col col-md-2 col-md-offset-10 text-center confirm_second_request_fax_button_div"><input name="confirm_second_request_fax" class="btn btn-success btn-xs confirm_second_request_fax" type="submit" value="確認"></div>');
					var finish_trade_html = '';
					if ($('#trade_datepicker').val() != '') {
						finish_trade_html += '<div class="col col-md-4 col-md-offset-4 text-center finish_second_trade_button_div"><input name="finish_second_trade" class="btn btn-success btn-xs second_finish_trade_button" type="submit" value="第二引取完了"></div>';
					}
					$('.finish_second_trade_td').html(finish_trade_html);
					$('#delete_second_trade_tr').remove();
					$('.revert_trade_button_div').remove();
					$('.second_trade_notice').empty();
				} else {
					div.html(prev_html);
					alert(json.message);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('引取依頼FAXの発行に失敗しました。');
				div.html(prev_html);
			});
		return false;
	});


//第二引取依頼書FAX確認ボタン
	$(document).on('click','.confirm_second_request_fax',function(){
		var send_link = $(this);
		var div = $(this).parent();
		var prev_html = div.html();
		$.ajax({
			'url': '/crm/SecondTrades/confirm_request_fax',
			'type': 'POST',
			'dataType':'JSON',
			'data':{'agreement_order_id':118262}
		}).done(function(json){
			if(json.success){
				$('.second_trade_request_confirmation_td').html('<div class="col col-md-10 confirm_second_trade_request_fax_div" style="padding-left: 0px;"><span class="text-primary">到着確認済</span>['+json.trade_request_confirm_datetime+'('+json.trade_request_confirmor_name+')]</div><div class="col col-md-2 text-center confirm_second_request_fax_button_div"></div>');
			} else {
				alert(json.message);
			}
			return;
		}).fail(function(){
			alert('エラーが発生しました。');
		});
		return false;
	});

//第二引取削除
	$(document).on('click','.delete_second_trade',function(){

		if(!confirm('第二引取データを削除します。よろしいでしょうか。')){
			return false;
		}

		$.ajax({
			'url': '/crm/SecondTrades/delete',
			'type': 'POST',
			'dataType':'JSON',
			'data':{'agreement_order_id':118262}
		}).done(function(json){
			if(json.success){
				$('#second_trades').remove();
			} else {
				alert(json.message);
			}
			return;
		}).fail(function(){
			alert('エラーが発生しました。');
		});
		return false;
	});



// 引取可能業者選択処理
	$(document).on('click', '.set_trader', function(){
		var set_link = $(this);
		var div = $(this).parent();
		var prev_html = div.html();
		var agreement_order_id = set_link.attr('agreement_order_id');
		var trader_cd = set_link.attr('trader_cd');
		var trader_name = set_link.attr('trader_name');
		var trader_phone_number = set_link.attr('trader_phone_number');
		var sales_price = set_link.attr('sales_price');
		var sales_contact = set_link.attr('sales_contact');
		var successful_fee = $('#SaleSuccessfulFee').val() || 0;
		var inquiry_id = set_link.attr('inquiry_id');
		if (confirm('引取業者を' + set_link.attr('trader_name') + 'に設定してよいですか？')) {
			$(this).hide();
			div.html('<img src="/crm/img/load-17px.gif" id="loading" alt="loading" />');
			$.ajax({
				type: 'POST',
				url: '/crm/trades/set_trader',
				data:
				{
					'agreement_order_id' : agreement_order_id,
					'trader_cd' : trader_cd,
					'sales_price' : sales_price,
					'sales_contact' : sales_contact,
					'successful_fee' : successful_fee
				}
			})
				.done(function(data){
					if (data == '1') {
						alert('引取業者の設定ができませんでした。');
						div.html(prev_html);
					} else if (data == '2') {
						alert('引取業者の設定に失敗しました。');
						div.html(prev_html);
					} else {
						var json = $.parseJSON(data);

						$('#trader_name').val(trader_name);
						$('#trader_cd').val(trader_cd);
						$('#trader_cd_div').html(trader_cd);
						if (json.delinquent == 3) {
							$('#trader_delinquent_div').html('　<code class="text-danger" style="font-weight: 700;">[未回収金有]</code>');
						} else if (json.delinquent == 2) {
							$('#trader_delinquent_div').html('　<code class="text-warning" style="font-weight: 700;">[未回収金有]</code>');
						} else if (json.delinquent == 1) {
							$('#trader_delinquent_div').html('　<code class="text-info" style="font-weight: 700;">[未回収金有]</code>');
						} else if (json.delinquent == 0) {
							$('#trader_delinquent_div').html('　');
						}
						$('#trader_phone_number_div').html('<a class="call_phone" incoming_number="' + trader_phone_number + '" dial_number="0676707744" speaker_cd="' + trader_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
						$('.send_trade_request_fax_button_div').html('<a class="btn btn-warning btn-xs send_trade_request_fax" trade_id="' + json.trade_id + '" agreement_order_id="' + agreement_order_id + '" trader_cd="' + trader_cd + '" sales_contact="' + sales_contact + '">送信</a>');

						// 販売先：AA→販売管理情報は無変更
						if (sales_contact != 4) {
							// id22：販売情報管理
														$('#contact_name').val(trader_name);
														$('#contact_cd_output').html(trader_cd);
							$('#contact_cd').val(trader_cd);
							$('#contact_phone_number_div').html('<a class="call_phone" incoming_number="' + trader_phone_number + '" dial_number="0676707744" speaker_cd="' + trader_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
						}

						div.html(prev_html);
					}
				})
				.fail(function(jqXHR, textStatus) {
					alert('引取業者の設定処理に失敗しました。');
					div.html(prev_html);
				});
			return false;
		} else {
			return false;
		}
	});

//解体状況
	$(document).on('click', '.scrap_status_change_btn', function(){
		var this_btn = $(this);
		var parent_div = $(this).closest('div');
		var scrap_status = $(this).attr('scrap_status');
		var agreement_order_id = $('input[name="data[AgreementOrder][id]"]').val();
		var scrap_date = ($('#scrap_date_datepicker').length > 0) ? $('#scrap_date_datepicker').val() : '';
		if(scrap_status == 1){
			if (!confirm('未解体 に変更しますか？')) {
				return false;
			}
		}else if(scrap_status == 2){
			if(scrap_date == ''){
				alert('解体日 を入力してください。');
				return false;
			}
			if (!confirm('解体済 に変更しますか？')) {
				return false;
			}
		}else if(scrap_status == 9){
			if (!confirm('不要 に変更しますか？')) {
				return false;
			}
		}else if(scrap_status == 0){
			if (!confirm('未確認 に変更しますか？')) {
				return false;
			}
		}
		parent_div.html('<img src="/crm/img/load-17px.gif" id="loading" alt="loading" />');
		$.get("/crm/recycling_deposits/change_scrap_status/"+agreement_order_id+"/"+scrap_status+"/"+scrap_date, function(data) {
			if(data.success){
				var unknown_btn = '<a class="btn btn-default btn-xs scrap_status_change_btn" href="/crm/AgreementOrders/edit/'+agreement_order_id+'" scrap_status="9">不要</a>';
				var no_checked_btn = '<a class="btn btn-warning btn-xs scrap_status_change_btn" href="/crm/AgreementOrders/edit/'+agreement_order_id+'" scrap_status="0">未確認</a>';
				var not_yet_btn = '<a class="btn btn-warning btn-xs scrap_status_change_btn" href="/crm/AgreementOrders/edit/'+agreement_order_id+'" scrap_status="1">未解体</a>';
				var finished_btn = '<a class="btn btn-success btn-xs scrap_status_change_btn" href="/crm/AgreementOrders/edit/'+agreement_order_id+'" scrap_status="2">解体済</a>';
				var finished_date = '<div class="col col-md-4 PA0"><input id="scrap_date_datepicker" class="form-control input-sm" name="data[RecyclingDeposit][scrap_date]" placeholder="解体日" value="" type="text"></div>';
				if(scrap_status == 1){
					parent_div.next('div').addClass('col-md-offset-2');
					parent_div.remove();
					$('#scrap_status').text('未解体');
				}else if(scrap_status == 2){
					$('#scrap_status_td').html('解体済 '+scrap_date+data.result);
				}else if(scrap_status == 9){
					$('#scrap_status_td').html('<div id="scrap_status" class="col col-md-2 PL0">不要</div><div class="col col-md-2 text-center">'+no_checked_btn+'</div>');
				}else if(scrap_status == 0){
					$('#scrap_status_td').html('<div id="scrap_status" class="col col-md-2 PL0">未確認</div>'+ unknown_btn+not_yet_btn + finished_date + finished_btn).find('a').wrap('<div class="col col-md-2 text-center">');
					$('#scrap_date_datepicker').datepicker({
						maxDate: 0
					});
				}
			}
		});
		return false;
	});




//振込状態遷移
	$(document).on('click','.change_payment_status',function(){
		var agreement_order_id = 118262;

		var parent = $(this).parent();
		var prev = parent.html();
		parent.html(loadingIcon22px);
		var id = $(this).attr('id');
		var confirm_text = '';
		var status = null;
		if(id === 'suspension_payment_button'){
			confirm_text = '振込保留状態にしますか？';
			status = '8';
		} else if( id === 'prepare_payment_button'){
			confirm_text = '振込準備中状態にしますか？';
			status = '3';
		} else if( id === 'reverse_payment_button'){
			confirm_text = '振込待ち状態にしますか？';
			status = '2';
		} else if( id === 'error_payment_button'){
			confirm_text = '振込エラー状態にしますか？';
			status = '4';
		} else if( id === 'finish_payment_button'){
			confirm_text = '振込済状態にしますか？';
			status = '1';
		}
		if(!confirm(confirm_text)){
			return false;
		}
		$.ajax({
				'url': '/crm/agreement_orders/change_payment_status',
				'type': 'POST',
				'dataType':'JSON',
				data:{'agreement_order_id' : agreement_order_id, 'payment_status' : status},
		}).done(function(json){
			parent.html(prev);
			if(!json.success){
				return alert(json.message);
			}
			updateAccount(getAccountData(),{
				'id': agreement_order_id,
				'payment': status,
				'payment_name':json.payment_name,
				'payment_datetime':json.payment_datetime,
			});
		}).fail(function(jqXHR, textStatus) {
			alert('エラーが発生しました。');
			parent.html(prev);
		});
		return false;
	});

// 売掛日編集
	$(document).on('click', '.reversal_credit_sale_date_set', function(){
		$(".credit_sale_date_box").html('<input tyle="text" id="credit_sale_date_input" class="form-control input-sm" value="" sale_id="105239" name="date[Sale][credit_sale_date]" />');
		$(this).addClass('reversal_credit_sale_date').removeClass('reversal_credit_sale_date_set');
		$('#credit_sale_date_input').datepicker();
	});
	$(document).on('click', '.reversal_credit_sale_date', function(){
		var sale_id = $(this).attr('sale_id');
		var credit_sale_date = $("#credit_sale_date_input").val();
		var this_button_div =$('.credit_sale_date_button');
		this_button_div.html(loadingIcon22px);
		var this_button = $(this);
		if(credit_sale_date == ''){
			alert('売掛日を入力してください');
			$('.credit_sale_date_box').text("");
			this_button_div.html(this_button);
			this_button.addClass('reversal_credit_sale_date_set').removeClass('reversal_credit_sale_date');
			return false;
		}
		$.ajax({
			type: 'POST',
			url: '/crm/sales/change_credit_sale_date',
			dataType: 'json',
			data: {
				'sale_id' : sale_id,
				'credit_sale_date' : credit_sale_date
			}
		})
			.done(function(data){
				var json = data;
				if(data == ''){
					alert('売掛日変更に失敗しました。');
				}else{
					if(json.success == true){
						$('.credit_sale_date_box').html(json.day +' ' + json.week);
						this_button_div.html(this_button);
						this_button.addClass('reversal_credit_sale_date_set').removeClass('reversal_credit_sale_date');
					//  $('input[name="data[Sale][credit_sale_date]"]').val(credit_sale_date);
						if(json.bill == 'changed'){
							$('#sale_bill').html('<div class="col col-md-8 bill_div" style="padding-left: 0px;"><span class="text-danger">未請求</span></div><div class="col col-md-2 text-center finish_billing_button_div"><a class="btn btn-success btn-xs finish_billing" sale_id="'+sale_id+'" href="/crm/AgreementOrders/edit/118262">請求</a></div><div class="col col-md-2 text-center reserve_billing_button_div"><input class="btn btn-warning btn-xs reserve_billing" type="submit" value="保留" name="reserve_billing"></div>');
						}
					}else{
						alert('売掛日変更に失敗しました。');
					}
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('売掛日変更に失敗しました。');
			});
		return false;
	});

// 請求処理
	$(document).on('click', '.finish_billing', function(){
		var finish_link = $(this);
		var div = $(this).parent();
		var prev_html = div.html();
		var sale_id = finish_link.attr('sale_id');
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/sales/finish_billing',
			data:
			{
				'id' : sale_id
			}
		})
			.done(function(data){
				if (data == '1') {
					alert('請求データが見当たりません。');
					div.html(prev_html);
				} else if (data == '2') {
					alert('業者情報の更新に失敗しました。');
					div.html(prev_html);
				} else if (data == '3') {
					alert('キャンセル請求処理ができませんでした。');
					div.html(prev_html);
				} else if (data == '4') {
					alert('データの整合性に異常があります。');
					div.html(prev_html);
				} else if (data == '5') {
					alert('請求処理ができませんでした。');
					div.html(prev_html);
				} else if (data == '6') {
					alert('未請求ではありません。');
					div.html(prev_html);
				} else {
					var json = $.parseJSON(data);

					$('.edit_sale').hide();
					$('.reserve_billing').hide();

					$('.mode_radio_td').html(json.mode);
					$('.sales_price_td').html(json.sales_price);
					$('.sales_contact_select_td').html(json.sales_contact);
					$('.contact_name_div').html(json.contact_name);
					$('.vehicle_price_td').html(json.vehicle_price);
					$('.recycling_fee_td').html(json.recycling_fee);
					$('.successful_fee_td').html(json.successful_fee);
					$('.refund_td').html(json.refund);
					$('.balance_td').html(json.balance);
					$('.sale_remark_td').html(json.remark);
					$('.due_date_td').html(json.due_date);
					$('.bill_div').html(json.bill_td);
					// id27：請求差戻機能
										$('.bill_tr').after('<tr class="reverse_bill_tr" style="height: 41px;"><td class="active" style="width: 120px; vertical-align: middle;">請求差戻</td><td style="vertical-align: middle;"><div class="col col-md-9" style="padding-left: 0px;"><input name="data[ReversalBillHistory][reason]" class="form-control input-sm" maxlength="255" id="reversal_bill_reason" type="text"></div><div class="col col-md-2 col-md-offset-1 text-center reverse_bill_button_div"><input name="reverse_bill" class="btn btn-danger btn-xs reverse_bill" type="submit" value="差戻し"></div></td></tr>');
										$('.receipts_td').html('<div class="col col-md-4" style="padding-left: 0px;"><input name="data[Sale][receipts_date]" class="form-control input-sm" maxlength="10" id="receipts_datepicker" autocomplete="off" type="text"></div><div class="col col-md-2 col-md-offset-6 text-center finish_receipts_button_div"><a class="btn btn-warning btn-xs finish_receipts" sale_id="' + sale_id + '">着金</a></div>');
					$('#receipts_datepicker').datepicker({maxDate: 0});
					$('.revert_second_trade').remove();
					$('.revert_trade').remove();
					div.html('');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('請求処理に失敗しました。');
				div.html(prev_html);
			});
		return false;
	});

// 請求差戻処理
	$(document).on('click', '.reverse_bill', function(){
		var reverse_reason_input = $('#reversal_bill_reason');
		var reverse_reason = reverse_reason_input.val();
		if (reverse_reason.replace(/\s|　/g, '') == '') {
			alert('差戻理由が入力されていません。');
			return false;
		}
		if (!confirm('未請求に戻していいですか？')) {
			return false;
		}
	});

// 着金処理
	$(document).on('click', '.finish_receipts', function(){
		var receipts_link = $(this);
		var div = $(this).parent();
		var prev_html = div.html();
		var receipts_date = $('#receipts_datepicker').val();

		var year = receipts_date.substr(0, 4);
		var month = receipts_date.substr(5, 2);
		var day = receipts_date.substr(8, 2);
		var di = new Date(year, month - 1, day);
		if (!(di.getFullYear() == year && di.getMonth() == month - 1 && di.getDate() == day)) {
			alert('正しい日付を入力してください。');
			return false;
		}
		$('#receipts_datepicker').attr('readonly', true);
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/sales/receive',
			data:
			{
				'id' : receipts_link.attr('sale_id'),
				'receipts_date' : receipts_date
			}
		})
			.done(function(data){
				if (data == '') {
					$('.reverse_bill_tr').hide();
					$('.receipts_td').html('着金済 [' + receipts_date + ']');
					$('.credit_sale_date_button').html('');
					<!--id67：着金解除機能-->
									} else {
					alert(data);
					div.html(prev_html);
					$('#receipts_datepicker').attr('readonly', false);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('着金処理できませんでした。');
				div.html(prev_html);
				$('#receipts_datepicker').attr('readonly', false);
			});
		return false;
	});
// 着金解除処理
	$(document).on('click', '.reversal_finish_receipts', function(){
		var reverse_reason = $('#reversal_receipts_reason').val();
		if (reverse_reason.replace(/\s|　/g, '') == '') {
			alert('着金解除理由が入力されていません。');
			return false;
		}
		if (!confirm('着金解除していいですか？')) {
			return false;
		}
	});

// 買取価格変更
	$(document).on('click', '.change_price', function(){
		var change_link = $(this);
		var div = $(this).parent();
		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$('.price_div').attr('style', 'padding-left: 0px;');
		$('.price_div').html('<input name="data[AgreementOrder][price]" class="form-control input-sm ime-disabled price" maxlength="8" id="price" type="tel" value="' + change_link.attr('price') + '">');
		$('.price_yen_div').html(' 円');
		div.html('<a class="btn btn-danger btn-xs commit_price" agreement_order_id="' + change_link.attr('agreement_order_id') + '">登録</a>');
		return false;
	});

// 買取価格変更額登録
	$(document).on('click', '.commit_price', function(){
		var commit_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = commit_link.attr('agreement_order_id');
		var price = $('.price').val();
		if (!$.isNumeric(price)) {
			alert('買取金額が正しく入力されていません。');
			return false;
		}
		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/AgreementOrders/change_price',
			dataType: 'json',
			data: {
				'id' : agreement_order_id,
				'price' : price
			}
		}).done(function(json){
			if (json == '1') {
				alert('データの整合性に異状があります。');
				div.html(prev_html);
			} else if (json == '2') {
				alert('振込済のため買取金額変更できません。');
				div.html(prev_html);
			} else if (json == '3') {
				alert('買取金額変更に失敗しました。');
				div.html(prev_html);
			} else {
				updateAccount(getAccountData(),{
					'id':agreement_order_id,
					'payment': json.payment,
					'payment_datetime': json.payment_datetime,
					'payment_name': json.payer,
				});
			}
			$('.price_yen_div').html('');
			$('.price_div').html(json.price + ' 円');
			$('.price_div').attr('style', 'padding: 6px 0px;');
			div.html('<a class="btn btn-danger btn-xs change_price" agreement_order_id="' + agreement_order_id + '" price="' + price + '">変更</a>');
		}).fail(function(jqXHR, textStatus) {
			alert('買取金額変更ができませんでした。');
			div.html(prev_html);
		});
		return false;
	});

// 自走
	$('.own_car_runnable input').change(function(){
		var own_car_runnable=$(this).val();
		if(own_car_runnable==0){
			$("#own_car_runnable_subbox").css({'display':'none'});
			$("#own_car_unrunnable_subbox").css({'display':'block'});
		}else{
			$("#own_car_runnable_subbox").css({'display':'block'});
			$("#own_car_unrunnable_subbox").css({'display':'none'});
		}
	});

// 引取解体のみ
	$(document).on('click', '.set_only_trade', function(){
		var only_trade_link = $(this);
		var div = $(this).parent();
		var only_trade_div = div.prev('.only_trade_div');
		var prev_html = div.html();
		var trade_id = only_trade_link.attr('trade_id');
		var only_trade = only_trade_link.attr('only_trade');
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
				type: 'POST',
				url: '/crm/trades/change_only_trade',
				datatype: 'json',
				data: {
					'id' : trade_id,
					'only_trade' : only_trade
				}
			})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					if (only_trade == 1) {
						div.html('<a class="btn btn-danger btn-xs set_only_trade" trade_id="' + trade_id + '" only_trade="' + 0 + '">解除</a>');
						only_trade_div.html('<span class="text-danger">YES</span> [' + json.only_trade_set_datetime + ' (' + json.only_trade_setter + ')]');
						$('#ScrapAuctionDocument1').attr('disabled', 'disabled');
						$('#ScrapAuctionDocument0').prop('checked', true);
					} else {
						div.html('<a class="btn btn-warning btn-xs set_only_trade" trade_id="' + trade_id + '" only_trade="' + 1 + '">設定</a>');
						only_trade_div.html('NO');
						$('#ScrapAuctionDocument1').removeAttr('disabled');
					}
				} else {
					alert('引取解体のみ設定に失敗しました。');
					div.html(prev_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('引取解体のみ設定を変更できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// 即金対応
	$(document).on('click','#cash_button',function(){
	//  if(confirm('即金対応')){}else{return false;}
		var agreement_order_id = $(this).attr('agreement_order_id');
		var inquiry_id = $(this).attr('inquiry_id');
		var cash_swith = $(this).attr('cash_swith');
		var this_button = $(this);
		var td = $(this).parent();
		var prev_td = td.html();
		$.ajax({
				type: 'POST',
				url: '/crm/agreement_orders/cash_change',
				data:
				{
					'agreement_order_id' : agreement_order_id,
					'inquiry_id' : inquiry_id,
					'cash_swith' : cash_swith
				}
			})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					this_button.attr('cash_swith',json.cash_swith);
					this_button.text(json.button_text);
						if(json.cash_swith=='no'){
							this_button.removeClass('btn-warning').addClass('btn-danger');
							$("#cash_status").text('YES').addClass('text-danger');
							$("#cash_setter").css({'display':'block'});
							$("#cash_setter_name").text(json.cash_setter);
							$("#cash_set_datetime").text(json.cash_set_datetime);
						}else{
							this_button.removeClass('btn-danger').addClass('btn-warning');
							$("#cash_setter").css({'display':'none'});
							$("#cash_status").text('NO').removeClass('text-danger');
						}
				}else{
					alert('即金対応の設定を変更できませんでした。');
				}
				})
				.fail(function(jqXHR, textStatus) {
					alert('即金対応の設定を変更できませんでした。');
				//  td.thml(prev_td);
				});
			return false;
	});

// 顧客情報編集
	$(document).on('click', '.edit_customer', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var id = edit_link.attr('customer_id');
		var name = $('#customer_name').val();
		var kana_name = $('#customer_kana_name').val();
		var concerned = $('#concerned').val();
		var phone_number1 = $('#phone_number1').val().replace(/[^0-9]/g, '');
		var whose_number1 = $('#whose_number1').val();
		var call_ng1 = $('#call_ng1:checked').val() == 1 ? 1 : 0;
		var phone_number2 = $('#phone_number2').val().replace(/[^0-9]/g, '');
		var whose_number2 = $('#whose_number2').val();
		var call_ng2 = $('#call_ng2:checked').val() == 1 ? 1 : 0;
		var phone_number3 = $('#phone_number3').val().replace(/[^0-9]/g, '');
		var whose_number3 = $('#whose_number3').val();
		var call_ng3 = $('#call_ng3:checked').val() == 1 ? 1 : 0;
		var phone_number4 = $('#phone_number4').val().replace(/[^0-9]/g, '');
		var whose_number4 = $('#whose_number4').val();
		var call_ng4 = $('#call_ng4:checked').val() == 1 ? 1 : 0;
		var fax_number = $('#fax_number').val().replace(/[^0-9]/g, '');
		var zip_code = $('#zip_code').val().replace(/[^0-9]/g, '');
		var pref_id = $('#pref_id').val();
		var address = $('#address').val();
		var building = $('#building').val();
		var age = $('#age').val();
		var occupation = $('#occupation').val();
		var email1 = $('#email1').val();
		var email2 = $('#email2').val();
		var gender = $("input[name='data[Customer][gender]']:checked").val();
		var car_classification = $("input[name='data[OwnCar][car_classification]']:checked").val();
		var reception = edit_link.attr('reception');
		var inquiry_id = edit_link.attr('inquiry_id');
		var agreement_order_id = edit_link.attr('agreement_order_id');

		if (name.replace(/\s|　/g, '') == '') {
			alert('氏名が入力されていません。');
			return false;
		}
		if (phone_number1.length != 10 && phone_number1.length != 11 && phone_number1 != '') {
			alert('電話番号1が正しく入力されていません。');
			return false;
		}
		if (phone_number2.length != 10 && phone_number2.length != 11 && phone_number2 != '') {
			alert('電話番号2が正しく入力されていません。');
			return false;
		}
		if (phone_number3.length != 10 && phone_number3.length != 11 && phone_number3 != '') {
			alert('電話番号3が正しく入力されていません。');
			return false;
		}
		if (phone_number4.length != 10 && phone_number4.length != 11 && phone_number4 != '') {
			alert('電話番号4が正しく入力されていません。');
			return false;
		}
		if (fax_number.length != 10 && fax_number.length != 11 && fax_number != '') {
			alert('FAX番号が正しく入力されていません。');
			return false;
		}
		if (zip_code.length != 7 && zip_code != '') {
			alert('郵便番号が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(age) && age != '') {
			alert('年齢が正しく入力されていません。');
			return false;
		}
		if (!email1.match(/.+@.+\..+/) && email1 != '') {
			alert('メールアドレス1が正しく入力されていません。');
			return false;
		}
		if (!email2.match(/.+@.+\..+/) && email2 != '') {
			alert('メールアドレス2が正しく入力されていません。');
			return false;
		}

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/Customers/edit',
			datatype: 'json',
			data: {
				'id' : id,
				'name' : name,
				'kana_name' : kana_name,
				'concerned' : concerned,
				'phone_number1' : phone_number1,
				'whose_number1' : whose_number1,
				'call_ng1' : call_ng1,
				'phone_number2' : phone_number2,
				'whose_number2' : whose_number2,
				'call_ng2' : call_ng2,
				'phone_number3' : phone_number3,
				'whose_number3' : whose_number3,
				'call_ng3' : call_ng3,
				'phone_number4' : phone_number4,
				'whose_number4' : whose_number4,
				'call_ng4' : call_ng4,
				'fax_number' : fax_number,
				'zip_code' : zip_code,
				'pref_id' : pref_id,
				'address' : address,
				'building' : building,
				'age' : age,
				'occupation' : occupation,
				'email1' : email1,
				'email2' : email2,
				'gender' : gender
			}
		})
			.done(function(data){
				if (data == '') {
					div.html(prev_html);
					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a>顧客情報の編集に失敗しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-danger');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>顧客情報の編集に失敗しました。');
					}
				} else {
					var json = $.parseJSON(data);
					$('#phone_number1').val(json.phone_number1);
					$('#phone_number2').val(json.phone_number2);
					$('#phone_number3').val(json.phone_number3);
					$('#phone_number4').val(json.phone_number4);
					if (json.phone_number1 == '') {
						$('.phone_number1_div').html('');
					} else {
						$('.phone_number1_div').html('<a class="call_phone" incoming_number="' + json.phone_number1 + '" dial_number="0120301456" speaker_cd="' + json.customer_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
					}
					if (json.phone_number2 == '') {
						$('.phone_number2_div').html('');
					} else {
						$('.phone_number2_div').html('<a class="call_phone" incoming_number="' + json.phone_number2 + '" dial_number="0120301456" speaker_cd="' + json.customer_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
					}
					if (json.phone_number3 == '') {
						$('.phone_number3_div').html('');
					} else {
						$('.phone_number3_div').html('<a class="call_phone" incoming_number="' + json.phone_number3 + '" dial_number="0120301456" speaker_cd="' + json.customer_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
					}
					if (json.phone_number4 == '') {
						$('.phone_number4_div').html('');
					} else {
						$('.phone_number4_div').html('<a class="call_phone" incoming_number="' + json.phone_number4 + '" dial_number="0120301456" speaker_cd="' + json.customer_cd + '" inquiry_id="' + inquiry_id + '"><span class="glyphicon glyphicon-phone-alt"></span></a>');
					}
					$('#fax_number').val(json.fax_number);
					$('#zip_code').val(json.zip_code);

					div.html('<a class="btn btn-success btn-sm edit_customer" customer_id="' + id + '" reception="' + reception + '" inquiry_id="' + inquiry_id + '" agreement_order_id="' + agreement_order_id + '">編集</a>');

					var printing_address = '〒' + json.zip_code + ' ' + json.pref_name + address + ' ' + building;
					var staff = '阿部 薫';
					$('.sender_document_button_div').html('<a href="https://crm.cmgroup.jp/document/?id=' + agreement_order_id + '&name=' + encodeURI(name) + '&address=' + encodeURI(printing_address) + '&type=' + car_classification + '&staff=' + encodeURI(staff) + '" class="btn btn-default btn-sm" target="_blank">送付書</a>');

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>顧客情報を編集しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-success');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>顧客情報を編集しました。');
					}
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('顧客情報が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// 口座情報編集
	$(document).on('click', '.edit_account', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = edit_link.attr('agreement_order_id');
		var customer_cd = edit_link.attr('customer_cd');
		var bank = $('#bank').val();
		var bank_code = $('#bank_code').val().replace(/[^0-9]/g, '');
		var branch_name = $('#branch_name').val();
		var branch_number = $('#branch_number').val().replace(/[^0-9]/g, '');
		var account_classification = $("input[name='data[Account][account_classification]']:checked").val();
		var account_number = $('#account_number').val().replace(/[^0-9]/g, '');
		var nominee_name = $('#nominee_name').val();

		if (bank_code.length != 4 && bank_code != '') {
			alert('銀行コードを4桁で入力してください。');
			return false;
		}
		if (branch_number.length != 3 && branch_number != '') {
			alert('支店番号を3桁で入力してください。');
			return false;
		}
		if (account_number.length != 7 && account_number != '') {
			alert('口座番号を7桁で入力してください。');
			return false;
		}

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/Accounts/edit',
			datatype: 'json',
			data: {
				'agreement_order_id' : agreement_order_id,
				'customer_cd' : customer_cd,
				'bank' : bank,
				'bank_code' : bank_code,
				'branch_name' : branch_name,
				'branch_number' : branch_number,
				'account_classification' : account_classification,
				'account_number' : account_number,
				'nominee_name' : nominee_name
			}
		}).done(function(data){
				if (data == '') {
					div.html('<a href="javascript:void(0);" class="btn btn-success btn-sm edit_account">編集</a>');
					$('.edit_account').attr('agreement_order_id', agreement_order_id).attr('customer_cd', customer_cd);
					setAlertMsg('口座情報を編集しました。');
				} else {
					div.html(prev_html);
					setAlertMsg('口座情報の編集に失敗しました。');
				}
		}).fail(function(jqXHR, textStatus) {
			alert('口座情報が編集できませんでした。');
			div.html(prev_html);
		});
		return false;
	});

// 引取情報編集
	$(document).on('click', '.edit_trade', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var trade_id = edit_link.attr('trade_id');
		var agreement_order_id = edit_link.attr('agreement_order_id');
		var trade_schedule_date = $('#trade_datepicker').val();
		var trade_schedule_time = $("input[name='data[Trade][trade_schedule_time]']:checked").val();
		var trade_schedule_date2 = $('#trade_datepicker2').val();
		var trade_schedule_time2 = $("input[name='data[Trade][trade_schedule_time2]']:checked").val();
		var pending_schedule =  $('#chk_pending_schedule:checked').val() == 1 ? 1 : 0;
		var address = $('#parking_address').val();
		var presence = $("input[name='data[Trade][presence]']:checked").val();
		var trader_cd = $('#trader_cd').val();
		var trader_name = $('#trader_name').val();
		var number_cut = $("input[name='data[Trade][number_cut]']:checked").val();
		var remark = $('#TradeRemark').val();

		if (address.replace(/\s|　/g, '') == '') {
			alert('引取先住所を入力してください。');
			return false;
		}

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/Trades/edit',
			dataType: 'JSON',
			data: {
				'id' : trade_id,
				'agreement_order_id' : agreement_order_id,
				'trade_schedule_date' : trade_schedule_date,
				'trade_schedule_time' : trade_schedule_time,
				'trade_schedule_date2' : trade_schedule_date2,
				'trade_schedule_time2' : trade_schedule_time2,
				'pending_schedule' : pending_schedule,
				'address' : address,
				'presence' : presence,
				'trader_cd' : trader_cd,
				'trader_name' : trader_name,
				'number_cut' : number_cut,
				'remark' : remark
			}
		})
			.done(function(json){
				if (!json.success) {
					div.html(prev_html);
					setAlertMsg('引取情報の編集に失敗しました。');
					alert(json.message);
				} else {
					if (json.trade_request_fax != '') {
						$('.send_trade_request_fax_div').html(json.trade_request_fax);
						$('.confirm_trade_request_fax_div').html('');
					}

					if (json.trade_request_fax.indexOf('要再手配') != -1) {
						$('.confirm_request_fax_button_div').html('<input name="confirm_request_fax" class="btn btn-success btn-xs confirm_request_fax" type="submit" value="確認">');
					}

					if (presence == 0) {
						$('.document_send_td').html('<div class="col col-md-8" style="padding-left: 0px;"><span class="text-danger">未発送</span></div><div class="col col-md-2 text-center unnecessary_document_button_div"><input name="unnecessary_document" class="btn btn-warning btn-xs unnecessary_document" type="submit" value="不要"></div><div class="col col-md-2 text-center send_document_button_div"><input name="send_document" class="btn btn-success btn-xs send_document" type="submit" value="送付"></div><input type="hidden" name="data[AgreementOrder][document_send]" value="0">');
					}

					if (trader_cd != '') {
						$('.send_trade_request_fax_button_div').html('<a class="btn btn-warning btn-xs send_trade_request_fax" trade_id="' + trade_id + '" agreement_order_id="' + agreement_order_id + '" trader_cd="' + trader_cd + '" sales_contact="' + json.sales_contact + '">送信</a>');
					}

					if (document.getElementById("tradable_list_div") != null) {
						$('#tradable_list_div').empty();
						$('#tradable_list_div').html(json.tradable_list_html);
					}

										// 写真撮影要員管理
					$('#photo_schedule').val(json.schedule);
					$('#photo_term_date').val(json.term);
					if(json.count_photographers > 0 && json.cancel_explanation == 1){
						$('.deny_taking_photo_button_div').html('<a href="javascript:void(0);" class="btn btn-warning btn-sm deny_taking_photo" agreement_order_id="118262">拒否</a>');
						$('.send_seeking_photographer_mail_button_div').html('<a href="javascript:void(0);" class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="118262">送信</a>');
					} else {
						$('.deny_taking_photo').remove();
						$('.send_seeking_photographer_mail').remove();
					}
					
					var geocoder = new google.maps.Geocoder();
					geocoder.geocode({'address': address}, function(result, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var latlng = result[0].geometry.location;
							var options = {
								zoom: 16,
								center: latlng,
								draggable: true,
								mapTypeId: google.maps.MapTypeId.ROADMAP
							}
							var map = new google.maps.Map(document.getElementById('trade_address_map'), options);
							var marker = new google.maps.Marker({
								position: map.getCenter(),
								map: map
							});
						}
					});

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>引取情報を編集しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-success');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>引取情報を編集しました。');
					}

					div.html('<a class="btn btn-success btn-sm edit_trade" trade_id="' + trade_id + '" agreement_order_id="' + agreement_order_id + '">編集</a>');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('引取情報が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// 第二引取情報編集
	$(document).on('click', '.edit_second_trade', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var send_data = {
			'agreement_order_id' : 118262,
			'trade_schedule_date' : $('#second_trade_trade_schedule_date').val(),
			'from_contact_charge_name' : $('#from_contact_charge_name').val(),
			'address' : $('#second_trade_address').val(),
			'trader_cd' : $('#second_trade_trader_name').attr('trader_cd') || '',
			'trader_name' : $('#second_trade_trader_name').val(),
			'remark' : $('#second_trade_remark').val()
		};

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			'type': 'POST',
			'url': '/crm/SecondTrades/edit',
			'dataType': 'JSON',
			'data': send_data
		})
			.done(function(json){
				if (!json.success) {
					div.html(prev_html);
					setAlertMsg('第二引取情報の編集に失敗しました。');
					alert(json.message);
				} else {
					if (json.data.trade_request_fax == 1) {
						$('.send_second_trade_request_fax_button_div').html('');
					} else {
						if (send_data.trader_cd != '') {
							$('.send_second_trade_request_fax_button_div').html('<a class="btn btn-warning btn-xs send_second_trade_request_fax" agreement_order_id="' + send_data.agreement_order_id + '" trader_cd="' + send_data.trader_cd + '">送信</a>');
							console.log(json);
						}
						$('.send_second_trade_request_fax_div').html('<span class="text-danger">未送信</span>');
						$('.finish_second_trade_button_div').empty();
					}
					setAlertMsg('第二引取情報を編集しました。');
					div.html('<a class="btn btn-success btn-sm edit_second_trade">編集</a>');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('引取情報が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// 販売管理編集
	$(document).on('click', '.edit_sale', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var sale_id = edit_link.attr('sale_id');
		var agreement_order_id = edit_link.attr('agreement_order_id');
		var mode = $("input[name='data[Sale][mode]']:checked").val();
		var sales_price = $('#sales_price').val();
		var vehicle_price = $('#vehicle_price').val();
		var recycling_fee = $('#sales_recycling_fee').val();
		var sales_contact = $('#sales_contact').val();
		var contact_name = $('#contact_name').val();
		var contact_cd = $('#contact_cd').val();
		var successful_fee = $('#SaleSuccessfulFee').val() || 0;
		var refund = $('#SaleRefund').val() || 0;
		var agency_disposal = $('#SaleAgencyDisposal').val() || 0;
		var remark = $('#SaleRemark').val();
		var balance = $('#balance').val() || null;
		var document = $("input[name='data[ScrapAuction][document]']:checked").val();
		var car_classification = $("input[name='data[OwnCar][car_classification]']:checked").val();

		if (!$.isNumeric(sales_price)) {
			alert('販売額が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(vehicle_price)) {
			alert('車両本体価格が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(recycling_fee)) {
			alert('リサイクル料が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(successful_fee)) {
			alert('落札手数料が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(refund)) {
			alert('還付額が正しく入力されていません。');
			return false;
		}
		if (!$.isNumeric(agency_disposal)) {
			alert('抹消代行費用が正しく入力されていません。');
			return false;
		}
				if (!$.isNumeric(balance)) {
			alert('差引額が正しく入力されていません。');
			return false;
		}
				if (car_classification === undefined) {
			alert('車種区分を選択してください。');
			return false;
		}

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/Sales/edit',
			data: {
				'id' : sale_id,
				'agreement_order_id' : agreement_order_id,
				'mode' : mode,
				'sales_price' : sales_price,
				'vehicle_price' : vehicle_price,
				'recycling_fee' : recycling_fee,
				'sales_contact' : sales_contact,
				'contact_name' : contact_name,
				'contact_cd' : contact_cd,
				'remark' : remark,
				'successful_fee' : successful_fee,
				'refund' : refund,
				'agency_disposal' : agency_disposal,
				'balance' : balance,
				'document' : document,
				'car_classification' : car_classification
			}
		})
			.done(function(data){
				if (data == '1' || data == '2' || data == '3' || data == '4' || data == '5' || data == '6') {
					div.html(prev_html);

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a>販売管理の編集に失敗しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-danger');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>販売管理の編集に失敗しました。');
					}

					var message;
					if (data == '1') {
						message = '販売先を正しく選択してください。';
					} else if (data == '2') {
						message = '業者情報の更新に失敗しました。';
					} else if (data == '3') {
						message = 'AA出品情報の更新に失敗しました。';
					} else if (data == '4') {
						message = 'Smart-Aデータの更新に失敗しました。';
					} else if (data == '5') {
						message = '販売管理情報の更新に失敗しました。';
					} else if (data == '6') {
						message = '派生データの更新に失敗しました。';
					}

					alert(message);
				} else {
					var json = $.parseJSON(data);

					if (json.trader_cd != '') {
						if (json.trade_request_confirmation != 1 && json.trade_finished != 1) {
							$('.send_trade_request_fax_button_div').html('<a class="btn btn-warning btn-xs send_trade_request_fax" trade_id="' + json.trade_id + '" agreement_order_id="' + agreement_order_id + '" trader_cd="' + json.trader_cd + '" sales_contact="' + sales_contact + '">送信</a>');
						}
					}

					if (sales_contact == 4 && json.document_send == 9) {
						$('.document_send_td').html('<div class="col col-md-8" style="padding-left: 0px;"><span class="text-danger">未発送</span></div><div class="col col-md-2 text-center unnecessary_document_button_div"><input name="unnecessary_document" class="btn btn-warning btn-xs unnecessary_document" type="submit" value="不要"></div><div class="col col-md-2 text-center send_document_button_div"><input name="send_document" class="btn btn-success btn-xs send_document" type="submit" value="送付"></div><input type="hidden" name="data[AgreementOrder][document_send]" value="0">');
					}

					if (sales_contact != 4) {
						$('.exhibit_aa_tr').hide();
					}

					if(sales_contact != 4 && sales_contact != 6 && sales_contact != 7){
						$('#add_scond_trade').remove();
					}

					// 引取可能業者の表示消去
					$('.tradable_list_tr').hide();
					$('.tradable_estimate_fax_tr').hide();

					// Smartオークション：出品用リサイクル料
					if (json.auction_status == '') {
						$('#recyclingFeeSA').val(json.recycling_fee);
					}

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>販売管理を編集しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-success');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>販売管理を編集しました。');
					}
					var arr_disposal_class = {"0":"\u5f53\u793e\u62b9\u6d88","1":"\u696d\u8005\u62b9\u6d88","2":"\u4ee3\u884c\u62b9\u6d88","9":"\u4e0d\u8981"};
					$('.disposal_class_div').html(arr_disposal_class[json.disposal_class]);
					div.html('<a class="btn btn-success btn-sm edit_sale" sale_id="' + sale_id + '" agreement_order_id="' + agreement_order_id + '">編集</a>');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('販売管理が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// 販売備考編集
	$(document).on('click', '.edit_sale_remark', function(){
		var edit_link = $(this);
		var div = $(this).parent();
		var sale_id = edit_link.attr('sale_id');
		var remark = $('#SaleRemark').val();

		var prev_html = div.html();
		$(this).hide();
		div.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Sales/edit_remark',
			data: {
				'id' : sale_id,
				'remark' : remark
			}
		})
			.done(function(data){
				if (data == '') {
					div.html('<a href="javascript:void(0);" class="btn btn-primary btn-xs edit_sale_remark" sale_id="' + sale_id + '">編集</a>');


					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>販売備考を編集しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-success');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>販売備考を編集しました。');
					}
				} else {
					div.html(prev_html);

					if ($('#alert').size() === 0) {
						$('#content').prepend('<div id="alert" class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a>販売備考の編集に失敗しました。</div>');
					} else {
						$('#alert').attr('class', 'alert alert-danger');
						$('#alert').empty();
						$('#alert').append('<a class="close" data-dismiss="alert" href="#">×</a>販売備考の編集に失敗しました。');
					}

					alert('販売備考の編集に失敗しました。');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('販売備考が編集できませんでした。');
				div.html(prev_html);
			});
		return false;
	});

// Smartオークション出品中止
	$(document).on('click', '.cancel_exhibit_cnu', function(){
		var cancel_link = $(this);
		var div = $(this).parent();

		if (confirm('Smart出品を中止しますか？')) {
			var prev_html = div.html();
			$(this).hide();
			div.html(loadingIcon22px);
			$.ajax({
				type: 'POST',
				url: '/crm/ScrapAuctions/cancel',
				datatype: 'json',
				data: {
					'id' : cancel_link.attr('scrap_auction_id')
				}
			})
				.done(function(data){
					if (data == 'A') {
						alert('出品案件が存在しません。');
						div.html(prev_html);
					} else if (data == 'B') {
						alert('Smart出品を中止できませんでした。');
						div.html(prev_html);
					} else {
						$('.auction_status_word').html('出品停止');
						<!--id65：Smart再出品-->
													$('.auction_status_word').parents('td').append('<div class="col col-md-4 text-center re_exhibit_scrap_auction_button_div" style="text-align:right;"><input class="btn btn-info btn-xs exhibit_scrap_auction" type="submit" value="未出品" name="re_exhibit_scrap_auction"></div>');
												if (data == 1) {
							$('.recycling_fee_for_sa_td').html(addFigure($('#recyclingFeeSA').val()) + ' 円');
						} else {
							$('.recycling_fee_for_sa_td').html('');
						}
						$('.scrap_tender_list_tr').hide();
						$('.edit_sale_button_div').html('<a class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a>');
						$('.edit_trade_button_div').html('<a class="btn btn-primary btn-sm edit_trade" trade_id="105217" agreement_order_id="118262">編集</a>');

						div.html('');
					}
				})
				.fail(function(jqXHR, textStatus) {
					alert('出品中止に失敗しました。');
					div.html(prev_html);
				});
			return false;
		} else {
			return false;
		}
	});

// Smartオークション商談受付中止
	$(document).on('click', '.cancel_negotiation_cnu', function(){
		var cancel_link = $(this);
		var div = $(this).parent();

		if (confirm('Smart商談受付を中止しますか？')) {
			var prev_html = div.html();
			$(this).hide();
			div.html(loadingIcon22px);
			$.ajax({
				type: 'POST',
				url: '/crm/ScrapNegotiations/cancel',
				datatype: 'json',
				data: {
					'id' : cancel_link.attr('scrap_auction_id')
				}
			})
				.done(function(data){
					if (data == '') {
						$('.auction_status_word').html('流札');
						$('.scrap_negotiation_list_tr').hide();
						$('.edit_sale_button_div').html('<a class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a>');
						$('.edit_trade_button_div').html('<a class="btn btn-primary btn-sm edit_trade" trade_id="105217" agreement_order_id="118262">編集</a>');
					} else {
						alert(data);
						div.html(prev_html);
					}
				})
				.fail(function(jqXHR, textStatus) {
					alert('Smart商談受付の中止に失敗しました。');
					div.html(prev_html);
				});
			return false;
		} else {
			return false;
		}
	});

// 陸送サービス入金確認
	$(document).on('click','#transport_receipts_confirm_btn',function(){
		var transport_receipts_date = $('#transport_receipts_date').val();
		if(transport_receipts_date == ''){
			alert('入金日を入力してください');
			return false;
		}
		if (!confirm(transport_receipts_date+'で入金日を登録しますか？')) {
			return false;
		}
		var agreement_order_id = $('#agreement_order_id').val();
		var scrap_auction_id = $('input[name="data[ScrapAuction][id]"]').val();
		var this_btn = $(this).prop('outerHTML');
		var parent_div = $(this).closest('div');
		var prev_html = $(this).closest('div').html();
		$(this).after(loadingIcon22px).remove();

		$.ajax({
			'url' : '/crm/ScrapAuctions/confirm_transport_receipts',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'agreement_order_id' : agreement_order_id,
				'transport_receipts_date' : transport_receipts_date
			}
		})
		.done(function(data){
			if (data.success) {
				parent_div.html('<a id="transport_arrange" class="btn btn-danger btn-xs" href="/crm/AgreementOrders/edit/'+agreement_order_id+'" scrap_auction_id="'+scrap_auction_id+'" style="margin-left:10px;">手配済</a>');
				$('#agency_transport_status').text('入金済');
				$('#agency_transport_datetime').text('['+data.transport_receipts_date+']');
				$('#transport_trader_tr').css({'display':'table-row'});
				$('#agency_transport_cost_tr').css({'display':'table-row'});
			} else {
				alert(data.message);
				parent_div.html(prev_html);
			}
		})
		.fail(function(jqXHR, textStatus) {
			parent_div.html(prev_html);
		});
		return false;
	});

// 陸送サービス業者オートコンプリート
	if($('#transport_trader_name').length){
		autocompleteIvent();
	}
	function autocompleteIvent(){
		$('#transport_trader_name').autocomplete({
			'source': '/crm/Traders/autocomplete_transport_trader',
			'disabled' : false,
			'autoFocus' : true,
			'select' : function(event,ui){
				$('#transport_trader_name').val(ui.item.Trader.trader_name);
				$('#transport_trader_cd').val(ui.item.Trader.trader_cd);
				return false;
			}

		}).data('ui-autocomplete')._renderItem = function(ul,item){
			return $("<li>").append("<a>" + item.Trader.trader_name + "</a>").appendTo(ul);
		};
	}

// 陸送サービス費用登録
// 税込計算
	if($('#transport_cost').length){
		transport_cost_calculation();
	}
	function transport_cost_calculation(){
		$('#transport_cost').blur(function(){
			var transport_cost = $('#transport_cost').val();
			var transport_cost_include_tax = Math.round(transport_cost * (0.08 + 1));
			$('#transport_cost_include_tax').text('税込：'+addFigure(transport_cost_include_tax)+'円');
		});
	}
	$(document).on('click','#transport_cost_btn',function(){
		var scrap_auction_id = $(this).attr('scrap_auction_id');
		var transport_cost = $('#transport_cost').val();

		if(transport_cost == '' || transport_cost == 0){
			alert('陸送費用を入力してください。');
			return false;
		}
		var this_btn = $(this).prop('outerHTML');
		$(this).after(loadingIcon22px).remove();

		$.ajax({
			'url' : '/crm/ScrapAuctions/edit_transport_cost',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'scrap_auction_id' : scrap_auction_id,
				'transport_cost' : transport_cost
			}
		})
		.done(function(data){
			if (data.success) {
				$('#loading').after(this_btn).remove();
				$('#transport_cost_btn').addClass('btn-default').removeClass('btn-success');
			} else {
				alert(data.message);
				$('#loading').after(this_btn).remove();
			}
		})
		.fail(function(jqXHR, textStatus) {
			$('#loading').after(this_btn).remove();
		});
		return false;
	});

// 陸送サービス業者登録
	$(document).on('click','#transport_trader_btn',function(){
		var scrap_auction_id = $(this).attr('scrap_auction_id');
		var transport_trader_cd = $('#transport_trader_cd').val();
		var this_btn = $(this).prop('outerHTML');

		if(transport_trader_cd == ''){
			alert('陸送業者をを入力してください。');
			return false;
		}
		$(this).after(loadingIcon22px).remove();

		$.ajax({
			'url' : '/crm/ScrapAuctions/edit_transport_trader',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'scrap_auction_id' : scrap_auction_id,
				'transport_trader_cd' : transport_trader_cd
			}
		})
		.done(function(data){
			if (data.success) {
				$('#loading').after(this_btn).remove();
				$('#transport_trader_btn').addClass('btn-default').removeClass('btn-success');
			} else {
				alert(data.message);
				$('#loading').after(this_btn).remove();
			}
		})
		.fail(function(jqXHR, textStatus) {
			$('#loading').after(this_btn).remove();
		});
		return false;
	});

// 陸送サービス手配済
	$(document).on('click','#transport_arrange',function(){
		var scrap_auction_id = $(this).attr('scrap_auction_id');
		var transport_trader_cd = $('#transport_trader_cd').val();
		var transport_trader_name = $('#transport_trader_name').val();
		var transport_cost = $('#transport_cost_include_tax').text();
		var this_btn = $(this).prop('outerHTML');
		var parent_div = $(this).closest('div');
		var prev_html = $(this).closest('div').html();
		if(transport_trader_cd == '' || transport_cost == '' || transport_cost == 0){
			alert('陸送依頼先、費用を入力してください。');
			return false;
		}
		if(!confirm('手配済にします。本当によろしいですか？')){
			return false;
		}

		$(this).after(loadingIcon22px).remove();
		$.ajax({
			'url' : '/crm/ScrapAuctions/confirm_transport_arrange',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'scrap_auction_id' : scrap_auction_id
			}
		})
		.done(function(data){
			if (data.success) {
				parent_div.html('');
				$('#transport_trader_td').html(transport_trader_name+'('+transport_trader_cd+')<a id="transport_finish" class="btn btn-primary btn-xs" style="margin-left:10px;" href="/crm/AgreementOrders/edit/'+scrap_auction_id+'" scrap_auction_id="'+scrap_auction_id+'">納車</a>');
				$('#transport_cost_td').html(transport_cost);
				$('#agency_transport_status').text('手配済');
				$('#agency_transport_datetime').text('['+data.transport_arrange_datetime+']');
			} else {
				alert(data.message);
				parent_div.html(prev_html);
			}
		})
		.fail(function(jqXHR, textStatus) {
			parent_div.html(prev_html);
		});
		return false;
	});

// 陸送サービス納車済
	$(document).on('click','#transport_finish',function(){
		if(!confirm('納車済にします。本当によろしいですか？')){
			return false;
		}
		var scrap_auction_id = $(this).attr('scrap_auction_id');
		var this_btn = $(this).prop('outerHTML');
		var parent_td = $(this).closest('td');
		$(this).after(loadingIcon22px).remove();

		$.ajax({
			'url' : '/crm/ScrapAuctions/finish_agency_transport',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'scrap_auction_id' : scrap_auction_id
			}
		})
		.done(function(data){
			if (data.success) {
				$('#loading').remove();
				$('#agency_transport_status').text('納車済');
				$('#agency_transport_datetime').text('['+data.transport_finish_datetime+']');
			} else {
				alert(data.message);
				$('#loading').after(this_btn).remove();
			}
		})
		.fail(function(jqXHR, textStatus) {
			$('#loading').after(this_btn).remove();
		});
		return false;
	});

// 写真撮影スタッフ募集メール送信
	$(document).on('click', '.send_seeking_photographer_mail', function(){
		var send_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = send_link.attr('agreement_order_id');
		var schedule = $.trim($('#photo_schedule').val());
		var term_time = ' ' + $('#photo_term_timeHour').val() + ':' + $('#photo_term_timeMinute').val() + ':00';
		var term = $.trim($('#photo_term_date').val()) + term_time;
		var note = $.trim($('#photo_note').val());
		var regexp = /[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}/
		if (schedule == '') {
			alert('撮影日時が入力されていません。');
			return false;
		}
		if (term == '') {
			alert('写真返送期限が入力されていません。');
			return false;
		}
		if(term.match(regexp) == null){
			alert('写真返送期限の入力形式に誤りがあります。');
			console.log(term);
			return false;
		}

		var prev_html = div.html();
		var prev_deny_html = $('.deny_taking_photo_button_div').html();
		$(this).hide();
		div.html(loadingIcon30px);
		$('.deny_taking_photo_button_div').html('');
		$.ajax({
			type: 'POST',
			url: '/crm/SeekingPhotographerMails/send',
			datatype: 'json',
			data: {
				'agreement_order_id' : agreement_order_id,
				'schedule' : schedule,
				'term' : term,
				'note' : note
			}
		})
			.done(function(data){
				if (data == '') {
					div.html('<a class="btn btn-danger btn-sm cancel_seeking_photographer_mail" agreement_order_id="' + agreement_order_id + '">取消</a>');
					$('.photo_schedule_td').html(schedule);
					$('.photo_term_td').html(term);
					$('.photo_note_td').html(note);
				} else {
					alert(data);
					div.html(prev_html);
					$('.deny_taking_photo_button_div').html(prev_deny_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('募集メールが送信できませんでした。');
				div.html(prev_html);
				$('.deny_taking_photo_button_div').html(prev_deny_html);
			});
		return false;
	});

// 写真撮影拒否
	$(document).on('click', '.deny_taking_photo', function(){
		var deny_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = deny_link.attr('agreement_order_id');

		var prev_html = div.html();
		var prev_send_html = $('.send_seeking_photographer_mail_button_div').html();
		$(this).hide();
		div.html(loadingIcon30px);
		$('.send_seeking_photographer_mail_button_div').html('');
		$.ajax({
			type: 'POST',
			url: '/crm/SeekingPhotographerMails/deny',
			datatype: 'json',
			data: {
				'agreement_order_id' : agreement_order_id
			}
		})
			.done(function(data){
				if (data == '0') {
					alert('写真撮影依頼が済んでいます。');
					div.html(prev_html);
					$('.send_seeking_photographer_mail_button_div').html(prev_send_html);
				} else if (data == '1') {
					alert('市町村名が正しくありません。');
					div.html(prev_html);
					$('.send_seeking_photographer_mail_button_div').html(prev_send_html);
				} else if (data == '2') {
					alert('撮影拒否の設定に失敗しました。');
					div.html(prev_html);
					$('.send_seeking_photographer_mail_button_div').html(prev_send_html);
				} else {
					var json = $.parseJSON(data);

					div.html('');
					$('.photo_schedule_td').html('');
					$('.photo_term_td').html('');
					$('.photo_note_td').html('<span class="text-danger">撮影拒否</span> [' + json.result_set_datetime + ' (' + json.result_setter + ')]');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('写真撮影が拒否できませんでした。');
				div.html(prev_html);
				$('.send_seeking_photographer_mail_button_div').html(prev_send_html);
			});
		return false;
	});

// 写真撮影スタッフ募集取消し
	$(document).on('click', '.cancel_seeking_photographer_mail', function(){
		var cancel_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = cancel_link.attr('agreement_order_id');

		if (confirm('写真撮影スタッフの募集を取消しますか？')) {
			var prev_html = div.html();
			$(this).hide();
			div.html(loadingIcon30px);
			$.ajax({
				type: 'POST',
				url: '/crm/SeekingPhotographerMails/cancel',
				datatype: 'json',
				data: {
					'agreement_order_id' : agreement_order_id
				}
			})
				.done(function(data) {
					if (data == '0') {
						alert('写真撮影要員募集データに異状がありました。');
						div.html(prev_html);
					} else if (data == '1') {
						alert('写真撮影要員募集の取消に失敗しました。');
						div.html(prev_html);
					} else if (data == '2') {
						alert('写真撮影要員応募者リストの整理に失敗しました。');
						div.html(prev_html);
					} else {
						var json = $.parseJSON(data);

						div.html('<a class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="' + agreement_order_id + '">送信</a>');
						$('.deny_taking_photo_button_div').html('<a class="btn btn-warning btn-sm deny_taking_photo" agreement_order_id="' + agreement_order_id + '">拒否</a>');
						$('.photo_schedule_td').html('<div class="col col-md-10 PL0 required"><input name="data[SeekingPhotographerMail][schedule]" class="form-control input-sm" maxlength="50" id="photo_schedule" type="text" value="' + json.schedule + '"></div>');
						$('.photo_term_td').html('<div class="col col-md-4 PL0 required"><input name="data[SeekingPhotographerMail][term]" class="form-control input-sm" id="photo_term_date" type="text" value="' + json.term + '"></div><div class="col col-md-8"><select name="data[SeekingPhotographerMail][term_time][hour]" id="photo_term_timeHour" style="width: 55px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;"><option value="00">0</option><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09" selected="selected">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>:<select name="data[SeekingPhotographerMail][term_time][min]" id="photo_term_timeMinute" style="width: 55px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;"><option value="00" selected="selected">00</option><option value="15">15</option><option value="30">30</option><option value="45">45</option></select></div>');
						$('.photo_note_td').html('<div class="col col-md-10 PL0"><input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"></div>');
						$('.photographer_list_tr').remove();
						$('.photo_request_note_tr').remove();
						$('.set_photo_result_tr').remove();
						$('.outsider_comment_condition_tr').remove();
						$('.outsider_comment_engine_tr').remove();
						$('.outsider_comment_environment_tr').remove();
						$('.publish_outsider_comment_tr').remove();
					}
				})
				.fail(function(jqXHR, textStatus) {
					alert('写真撮影要員募集の取消しができませんでした。');
					div.html(prev_html);
				});
			return false;
		} else {
			return false;
		}
	});

// 写真撮影スタッフ決定
	$(document).on('click', '.select_photographer', function(){
		var select_link = $(this);
		var div = $(this).parent();
		var photographer_cd = $("input[name='data[PhotographerApplicant][photographer_cd]']:checked").val();
		var seeking_photographer_mail_id = select_link.attr('seeking_photographer_mail_id');
		var request_note = $.trim($('#photo_request_note').val());

		if (photographer_cd === undefined) {
			alert('写真撮影スタッフが選択されていません。');
			return false;
		}

		var prev_html = div.html();
		var prev_cancel_html = $('.cancel_select_photographer_btn_div').html();
		$(this).hide();
		div.html(loadingIcon22px);
		$('.cancel_select_photographer_btn_div').html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Photographers/select',
			datatype: 'json',
			data: {
				'photographer_cd' : photographer_cd,
				'id' : seeking_photographer_mail_id,
				'request_note' : request_note
			}
		})
			.done(function(data){
				if (data == '') {
					$('.photo_request_note_td').html(request_note);
					$('.selection_' + photographer_cd + '_div').html('<strong class="text-danger">＜決定＞</strong>');
				} else {
					alert(data);
					div.html(prev_html);
					$('.cancel_select_photographer_btn_div').html(prev_cancel_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('写真撮影スタッフが決定できませんでした。');
				div.html(prev_html);
				$('.cancel_select_photographer_btn_div').html(prev_cancel_html);
			});
		return false;
	});

// 写真撮影スタッフ選考中止
	$(document).on('click', '.cancel_select_photographer', function(){
		var cancel_link = $(this);
		var div = $(this).parent();
		var seeking_photographer_mail_id = cancel_link.attr('seeking_photographer_mail_id');

		var prev_html = div.html();
		var prev_select_html = $('.select_photographer_btn_div').html();
		$(this).hide();
		div.html(loadingIcon22px);
		$('.select_photographer_btn_div').html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/Photographers/cancel',
			datatype: 'json',
			data: {
				'id' : seeking_photographer_mail_id
			}
		})
			.done(function(data){
				if (data == '') {
					$('.photo_request_note_td').html('<span class="text-danger">撮影依頼中止</span>');
					$('.cancel_seeking_photographer_mail').remove();
				} else {
					alert(data);
					div.html(prev_html);
					$('.select_photographer_btn_div').html(prev_select_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('写真撮影依頼が中止できませんでした。');
				div.html(prev_html);
				$('.select_photographer_btn_div').html(prev_select_html);
			});
		return false;
	});

// 顧客請求情報
	$(document).on('blur', '#cross_selling_bill_price', function(){
		$(this).val(addFigure($(this).val()));
	});
	$(document).on('focus', '#cross_selling_bill_price', function(){
		$(this).val(delFigure($(this).val()));
	});

	$(document).on('click','button#cross_selling_add_button',function(){
		$(this).css({'opacity':0}).after('<div id="loading" style="position:absolute;width:50px;right:0px;top:0px;text-align:center;">'+loadingIcon30px+'</div>');
		var agreement_order_id = $(this).attr('agreement_order_id');
		var bill_category = $("#bill_category").val();
		var bill_price = delFigure($("#cross_selling_bill_price").val());
		var cross_selling_note = $("#cross_selling_note").val();
		var delete_authority = $(this).attr('delete_authority');
		var receipts_authority = $(this).attr('receipts_authority');
		var invoice_authority = $(this).attr('invoice_authority');
		if (!$.isNumeric(bill_price)) {
			alert('金額を正しく入力してください。');
			$("#cross_selling_add_button").css({'opacity':1});
			$("#loading").remove();
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '/crm/CrossSellings/add',
			datatype: 'json',
			data: {
				'agreement_order_id' : agreement_order_id,
				'bill_category' : bill_category,
				'price' : bill_price,
				'note' : cross_selling_note,
				'delete_authority' : delete_authority,
				'invoice_authority' : invoice_authority,
				'receipts_authority' : receipts_authority
			}
		})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					$("#cross_bill_table").css({'display':'table-row'});
					$('#sum_bill').before(json.tag);
					$('#bill_sum_price').text(json.sum_price);
					$("#cross_selling_bill_price").val('');
					$("#cross_selling_note").val('');
				}else{
					alert('顧客請求情報の登録できませんでした。');
				}
				$("#cross_selling_add_button").css({'opacity':1});
				$("#loading").remove();
			})
			.fail(function(jqXHR, textStatus) {
				alert('顧客請求情報の登録できませんでした。');
				$("#cross_selling_add_button").css({'opacity':1});
				$("#loading").remove();
			});
		return false;
	});

// 顧客請求情報請求ステータス変更
	$(document).on('click','.cross_selling_bill_button',function(){
		var this_select = $(this);
		this_select.css({'opacity':0}).after('<div id="loading" style="position:absolute;width:50px;left:0px;top:0px;text-align:center;">'+loadingIcon30px+'</div>');
		var agreement_order_id = this_select.attr('agreement_order_id');
		var cross_selling_id = this_select.attr('cross_selling_id');
		var this_td = this_select.closest('td');
		var cross_sell_bill = this_td.find('.cross_sell_bill').val();
		var delete_authority = this_select.attr('delete_authority');
		var receipts_authority = this_select.attr('receipts_authority');

		$.ajax({
			type: 'POST',
			url: '/crm/CrossSellings/bill',
			datatype: 'json',
			data: {
				'agreement_order_id' : agreement_order_id,
				'cross_selling_id' : cross_selling_id,
				'cross_sell_bill' : cross_sell_bill,
				'delete_authority' : delete_authority,
				'receipts_authority' : receipts_authority
			}
		})
			.done(function(data){
				if (data != '') {
					var json = $.parseJSON(data);
					if(json.result == 9){
						this_td.html(json.tag);
						this_td.next().html('不要');
					}else if(json.result == 1){
						this_td.html(json.tag);
						this_td.next().html(json.next_tag);
						$('.receipts_date_datepicker').datepicker({maxDate: 0});
					}else if(json.result == 6){
						this_td.html(json.tag);
						this_td.next().html(json.next_tag);
						if(delete_authority == 1){
							this_td.next().next().html('');
						}
					}
				}else{
					alert('顧客請求情報の登録できませんでした。');
				}
				this_select.css({'opacity':1});
				$("#loading").remove();
			})
			.fail(function(jqXHR, textStatus) {
				alert('顧客請求情報の登録できませんでした。');
				this_select.css({'opacity':1});
				$("#loading").remove();
			});
		return false;
	});

// 顧客請求情報着金ステータス変更
	$(document).on('click','.cross_selling_receipts_button',function(){
		var this_select = $(this);
		this_select.css({'opacity':0}).after('<div id="loading" style="position:absolute;width:50px;left:0px;top:0px;text-align:center;">'+loadingIcon30px+'</div>');
		var agreement_order_id = this_select.attr('agreement_order_id');
		var cross_selling_id = this_select.attr('cross_selling_id');
		var this_td = this_select.closest('td');
		var receipts_date = this_td.find('.receipts_date_datepicker').val();
		var delete_authority = this_select.attr('delete_authority');
		if (receipts_date == '') {
			alert('日付が未入力です。');
			this_select.css({'opacity':1});
			$("#loading").remove();
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '/crm/CrossSellings/receive',
			datatype: 'text',
			data: {
				'agreement_order_id' : agreement_order_id,
				'cross_selling_id' : cross_selling_id,
				'receipts_date' : receipts_date,
				'delete_authority' : delete_authority
			}
		})
			.done(function(data){
				if (data != '') {
					this_td.html(data);
					if(delete_authority == 1){
					this_td.next().html('');
					}
				}else{
					alert('顧客請求情報の登録できませんでした。');
				}
				this_select.css({'opacity':1});
				$("#loading").remove();
			})
			.fail(function(jqXHR, textStatus) {
				alert('顧客請求情報の登録できませんでした。');
				this_select.css({'opacity':1});
				$("#loading").remove();
			});
		return false;
	});

// 顧客請求情報削除
	$(document).on('click','.cross_selling_delete_button',function(){
		var agreement_order_id = $(this).attr('agreement_order_id');
		var cross_selling_id = $(this).attr('cross_selling_id');
		var this_tr = $(this).closest('tr');

		$.ajax({
			type: 'POST',
			url: '/crm/CrossSellings/delete',
			datatype: 'text',
			data: {
				'agreement_order_id' : agreement_order_id,
				'cross_selling_id' : cross_selling_id
			}
		})
			.done(function(data){
				if (data != '') {
					this_tr.next().remove();
					this_tr.remove();
					$('#bill_sum_price').text(data);
				}else{
					alert('顧客請求情報の削除ができませんでした。');
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('顧客請求情報の削除ができませんでした。');
			});
		return false;
	});

	$(document).on('click', '.note_arrow', function(){
		$(this).parents('tr').next('tr').slideToggle();
	});


// オークション関連諸費用入力
	$(document).on('click', '.register_auction_cost', function(){
		var register_link = $(this);
		var div = $(this).parent();
		var agreement_order_id = register_link.attr('agreement_order_id');
		var charge_date = $('#auction_cost_datepicker').val();
		var cost_category = $('#auction_cost_category').val();
		var note = $.trim($('#auction_cost_note').val());
		var amount = $('#auction_cost_amount').val();

		if (charge_date == '') {
			alert('発生日が入力されていません。');
			return false;
		} else {
			var charge_year = charge_date.substr(0, 4);
			var charge_month = charge_date.substr(5, 2);
			var charge_day = charge_date.substr(8, 2);
			var charge_di = new Date(charge_year, charge_month - 1, charge_day);
			if (!(charge_di.getFullYear() == charge_year && charge_di.getMonth() == charge_month - 1 && charge_di.getDate() == charge_day)) {
				alert('発生日に正しい日付を入力してください。');
				return false;
			}
		}
		if (!$.isNumeric(amount)) {
			alert('手数料額が正しく入力されていません。');
			return false;
		}

		var prev_html = div.html();
		$('#auction_cost_datepicker').attr('readonly', true);
		$('#auction_cost_category').attr('readonly', true);
		$('#auction_cost_note').attr('readonly', true);
		$('#auction_cost_amount').attr('readonly', true);
		$(this).hide();
		div.html(loadingIcon30px);
		$.ajax({
			type: 'POST',
			url: '/crm/AuctionCosts/register',
			datatype: 'html',
			data: {
				'agreement_order_id' : agreement_order_id,
				'date' : charge_date,
				'cost_category' : cost_category,
				'note' : note,
				'amount' : amount
			}
		})
			.done(function(data){
				if (data != '') {
					$('.auction_cost_list_div').empty();
					$('.auction_cost_list_div').append(data);
					div.html(prev_html);
					$('#auction_cost_datepicker').attr('readonly', false);
					$('#auction_cost_datepicker').val('');
					$('#auction_cost_category').attr('readonly', false);
					$('#auction_cost_note').attr('readonly', false);
					$('#auction_cost_note').val('');
					$('#auction_cost_amount').attr('readonly', false);
					$('#auction_cost_amount').val('');
					$('.auction_cost_list_div').show();
					$('.tooltip_auction_cost_note').darkTooltip({
						size: 'small',
						gravity: 'west',
						theme: 'light',
						trigger: 'click',
						animation: 'flipIn'
					});
				} else {
					alert('オークション諸費用の登録に失敗しました。');
					div.html(prev_html);
					$('#auction_cost_datepicker').attr('readonly', false);
					$('#auction_cost_category').attr('readonly', false);
					$('#auction_cost_note').attr('readonly', false);
					$('#auction_cost_amount').attr('readonly', false);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('オークション諸費用の登録ができませんでした。');
				div.html(prev_html);
				$('#auction_cost_datepicker').attr('readonly', false);
				$('#auction_cost_category').attr('readonly', false);
				$('#auction_cost_note').attr('readonly', false);
				$('#auction_cost_amount').attr('readonly', false);
			});
		return false;
	});

// オークション関連諸費用項目削除
	$(document).on('click', '.delete_auction_cost', function(){
		var delete_link = $(this);
		var td = $(this).parent();
		var agreement_order_id = delete_link.attr('agreement_order_id');
		var auction_cost_id = delete_link.attr('auction_cost_id');

		var prev_html = td.html();
		$(this).hide();
		td.html(loadingIcon22px);
		$.ajax({
			type: 'POST',
			url: '/crm/AuctionCosts/delete',
			datatype: 'html',
			data: {
				'agreement_order_id' : agreement_order_id,
				'id' : auction_cost_id
			}
		})
			.done(function(data){
				if (data != '') {
					$('.auction_cost_list_div').empty();
					$('.auction_cost_list_div').append(data);
					$('.tooltip_auction_cost_note').darkTooltip({
						size: 'small',
						gravity: 'west',
						theme: 'light',
						trigger: 'click',
						animation: 'flipIn'
					});
				} else {
					alert('オークション諸費用の削除に失敗しました。');
					td.html(prev_html);
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('オークション諸費用の削除ができませんでした。');
				td.html(prev_html);
			});
		return false;
	});

// 車両情報編集
	$(document).on('click', '.edit_own_car', function(event){
		var own_car = {};
		var inquiry = {};
		var agreement_order = {};
		var docs = {};
		var own_car_status = {};
		own_car.maker_id = $("#makerId").val();
		own_car.car_id = $("#carId").val();
		if(own_car.maker_id == ''){
			own_car.own_car_name = $("#own_car_name").val();
		}else{
			own_car.own_car_name = $("#makerId option:selected").text();
			if(own_car.car_id!=''){
				own_car.own_car_name = own_car.own_car_name+' '+$("#carId option:selected").text();
			}
		}
		own_car.id = $(this).data('own_car_id');
	//  own_car.own_car_name = $('#own_car_name').val();
		own_car.car_classification = $("input[name='data[OwnCar][car_classification]']:checked").val();
		//年式コンバート
		own_car.model_year_ad_year = era_to_ad($('#model_year_era').val(),parseInt(pickOutNumber($('#model_year_year').val()),10)) * 100;
		own_car.model_year_ad_month = parseInt(pickOutNumber($('#model_year_month').val()),10);

		if(isNaN(own_car.model_year_ad_year) || own_car.model_year_ad_year == ''){
			own_car.model_year_ad = null;
		} else {
			own_car.model_year_ad = own_car.model_year_ad_year;
			if(!isNaN(own_car.model_year_ad_month) && 13 > own_car.model_year_ad_month){
				own_car.model_year_ad += own_car.model_year_ad_month;
			}
		}

		//車検コンバート
		own_car.inspection_ad_year = era_to_ad($('#inspection_date_era').val(),pickOutNumber($('#inspection_date_year').val()));
		own_car.inspection_ad_month = parseInt(pickOutNumber($('#inspection_date_month').val()),10);
		own_car.inspection_ad_day = parseInt(pickOutNumber($('#inspection_date_day').val()),10);

		if(isNaN(own_car.inspection_ad_year) || own_car.inspection_ad_year == ''){
			own_car.inspection_ad = null;
		} else {
			own_car.inspection_ad = own_car.inspection_ad_year * 10000;
			if(!isNaN(own_car.inspection_ad_month) && 13 > own_car.inspection_ad_month){
				own_car.inspection_ad += own_car.inspection_ad_month * 100;
				if(!isNaN(own_car.inspection_ad_day)){
					own_car.inspection_ad += own_car.inspection_ad_day;
				}
			}
		}

		own_car.about_model_year = $("input[name='data[OwnCar][about_model_year]']:checked").val()?1:0;
		own_car.purchase = $("input[name='data[OwnCar][purchase]']:checked").val();
		own_car.mileage = $('#mileage').val();
		own_car.inspection_date = $('#inspection_date').val();
		own_car.runnable = $("input[name='data[OwnCar][runnable]']:checked").val();
		own_car.running = $('#OwnCarRunning').val();
		own_car.color = $('#color').val();
		own_car.displacement = $('#displacement').val();
		own_car.about_displacement = $("input[name='data[OwnCar][about_displacement]']:checked").val()?1:0;
		own_car.engine_model = $('#engine_model').val();
		own_car.turbo = $("input[name='data[OwnCar][turbo]']:checked").val();
		own_car.model_name = $('#model_name').val();
		own_car.about_model_name = $("input[name='data[OwnCar][about_model_name]']:checked").val()?1:0;
		own_car.model_specify_number = $('#model_specify_number').val();
		own_car.classification_number = $('#classification_number').val();
		own_car.grade = $('#grade').val();
		own_car.driving = $("input[name='data[OwnCar][driving]']:checked").val();
		own_car.transmission = $("input[name='data[OwnCar][transmission]']:checked").val();
		own_car.gear_number = $('#gear_number').val();
		own_car.fuel = $("input[name='data[OwnCar][fuel]']:checked").val();
		own_car.holder = $('#holder').val();
		own_car.holder_dead = $("input[name='data[OwnCar][holder_dead]']:checked").val()?1:0;
		own_car.disposal = $("input[name='data[OwnCar][disposal]']:checked").val();
		own_car.accidents = $("input[name='data[OwnCar][accidents]']:checked").val();
		own_car.smoking = $("input[name='data[OwnCar][smoking]']:checked").val();
		own_car.equipment_navigation = $("input[name='data[OwnCar][equipment_navigation]']:checked").val();
		own_car.equipment_back_monitor = $("input[name='data[OwnCar][equipment_back_monitor]']:checked").val();
		own_car.equipment_power_slide_door = $("input[name='data[OwnCar][equipment_power_slide_door]']:checked").val();
		own_car.equipment_sunroof = $("input[name='data[OwnCar][equipment_sunroof]']:checked").val();
		own_car.equipment_leather_seat = $("input[name='data[OwnCar][equipment_leather_seat]']:checked").val();
		own_car.equipment_alloy_wheels = $("input[name='data[OwnCar][equipment_alloy_wheels]']:checked").val();
		own_car.steering = $("input[name='data[OwnCar][steering]']:checked").val();
		own_car.equipment_air_conditioner = $("input[name='data[OwnCar][equipment_air_conditioner]']:checked").val();
		own_car.doors = $('#doors').val();
		own_car.conditions_exterior = $('#OwnCarConditionsExterior').val();
		own_car.conditions_interior = $('#OwnCarConditionsInterior').val();
		own_car.conditions = $('#OwnCarConditions').val();
		own_car.vehicle_number = $('#vehicle_number').val();
		own_car.serial_number =$('#serial_number').val();
		own_car.request_remove_navi = $("input[name='data[OwnCar][request_remove_navi]']:checked").val()?1:0;
		own_car.request_remove_etc = $("input[name='data[OwnCar][request_remove_etc]']:checked").val()?1:0;
		own_car.request_remove_tire = $("input[name='data[OwnCar][request_remove_tire]']:checked").val()?1:0;
		own_car.request_remove_wheel = $("input[name='data[OwnCar][request_remove_wheel]']:checked").val()?1:0;

		own_car_status.use_now = $("input[name='data[OwnCarStatus][use_now]']:checked").val() ?1:0;
		own_car_status.engine_noise = $("input[name='data[OwnCarStatus][engine_noise]']:checked").val()?1:0;
		own_car_status.white_smoke = $("input[name='data[OwnCarStatus][white_smoke]']:checked").val()?1:0;
		own_car_status.engine_trouble = $("input[name='data[OwnCarStatus][engine_trouble]']:checked").val()?1:0;
		own_car_status.tire_ok = $("input[name='data[OwnCarStatus][tire_ok]']:checked").val()?1:0;
		own_car_status.tire_punctured = $("input[name='data[OwnCarStatus][tire_punctured]']:checked").val()?1:0;
		own_car_status.battery_ng_runnable = $("input[name='data[OwnCarStatus][battery_ng_runnable]']:checked").val()?1:0;
		own_car_status.battery_ng_unrunnable = $("input[name='data[OwnCarStatus][battery_ng_unrunnable]']:checked").val()?1:0;

		inquiry.tow_truck = $("input[name='data[Inquiry][tow_truck]']:checked").val();

		if(own_car.mileage != '' && !$.isNumeric(own_car.mileage)){
			alert('走行距離を半角数字で入力してください。');
			return false;
		}

		if(own_car.displacement != '' && !$.isNumeric(own_car.displacement)){
			alert('排気量を半角数字で入力してください。');
			return false;
		}

		if(own_car.gear_number != '' && !$.isNumeric(own_car.gear_number)){
			alert('ギア数を半角数字で入力してください。');
			return false;
		}
		if(own_car.doors != '' && !$.isNumeric(own_car.doors)){
			alert('ドア数を半角数字で入力してください。');
			return false;
		}

		if($('#model_year_year').val() != '' && (!$.isNumeric($('#model_year_year').val()) || $('#model_year_year').val() == 0)){
			alert('年式（年）を半角数字で正しく入力してください。');
			return false;
		}

		if($('#model_year_month').val() != '' && (!$.isNumeric($('#model_year_month').val()) || $('#model_year_month').val() == 0 || $('#model_year_month').val() > 12)){
			alert('年式（月）を半角数字で正しく入力してください。');
			return false;
		}

		if($('#inspection_date_year').val() != '' && (!$.isNumeric($('#inspection_date_year').val()) || $('#inspection_date_year').val() == 0)){
			alert('車検日（年）を半角数字で正しく入力してください。');
			return false;
		}

		if($('#inspection_date_month').val() != '' && (!$.isNumeric($('#inspection_date_month').val()) || $('#inspection_date_month').val() == 0 || $('#inspection_date_month').val() > 12)){
			alert('車検日（月）を半角数字で入力してください。');
			return false;
		}

		if($('#inspection_date_day').val() != '' && (!$.isNumeric($('#inspection_date_day').val()) || $('#inspection_date_day').val() == 0 || $('#inspection_date_day').val() > 31)){
			alert('車検日（日）を半角数字で入力してください。');
			return false;
		}

		var parent = $(".edit_own_car").parent();
		var prev_html = parent.html();
		parent.html(loadingIcon30px);
		$.ajax({
			'url': '/crm/OwnCars/edit',
			'type': 'POST',
			'data': {
					'OwnCar':own_car,
					'OwnCarStatus':own_car_status,
					'Inquiry':inquiry,
				},
			'dataType': 'HTML',
		}).done(function(data){
			parent.html(prev_html);
			if( data == ''){
				$(".edit_own_car").removeClass("btn-success").addClass("btn-success");
				setAlertMsg('車両情報を編集しました。');
				$.ajax({
					url:location.href,
					type:'GET',
					'dataType':'HTML',
				}).done(function(html){
					var h = $(html);
					$("#table-Document").empty().append(h.find('#table-Document').html());
					$("#table-AgreementOrderAccount").empty().append(h.find('#table-AgreementOrderAccount').html());
					$("#own_car_name").val(own_car.own_car_name);
				}).fail(function(){
					alert('再読み込みに失敗しました。');
				});

			}else{
				alert('更新に失敗しました。');
			}
			return false;
		}).fail(function(jqXHR, textStatus){
			alert('更新に失敗しました。');
			parent.html(prev_html);
			return false;
		});

		return false;
	});

//問い合わせ情報編集
	$(document).on('click', '.edit_inquiry', function(event){
		event.preventDefault();
		var inquiry = {};

		inquiry.id = $(this).data('inquiry_id');
		inquiry.moving = $("input[name='data[Inquiry][moving]']:checked").val() || null;
		inquiry.repeater = $("input[name='data[Inquiry][repeater]']:checked").val()?1:0;
		inquiry.plurality = $("input[name='data[Inquiry][plurality]']:checked").val()?1:0;
		inquiry.radio = $("input[name='data[Inquiry][radio]']:checked").val()?1:0;
		inquiry.campaign_proposal = $("input[name='data[Inquiry][campaign_proposal]']:checked").val();
		inquiry.campaign = $("input[name='data[Inquiry][campaign]']:checked").val();
		inquiry.note = $("#note").val();

		var parent = $(".edit_inquiry").parent();
		var prev_html = parent.html();
		parent.html(loadingIcon30px);

		$.ajax({
			'url': '/crm/Inquiries/edit_agreement_order',
			'type': 'POST',
			'data':{
				Inquiry:inquiry,
			},
			'dataType':'HTML',
		}).done(function(html){
			parent.html(prev_html);
			if(html == ''){
				setAlertMsg('問い合わせ情報を編集しました。');
				$.ajax({
					url:location.href,
					type:'GET',
					'dataType':'HTML',
				}).done(function(html){
					var h = $(html);
					$("#table-Document").empty().append(h.find('#table-Document').html());
					$(".edit_inquiry").removeClass("btn-success").addClass("btn-success");
				}).fail(function(){
					alert('再読み込みに失敗しました。');
				});

			}else{
				alert('更新に失敗しました。[1]');
				console.log(html);
			}
		}).fail(function(){
			alert('更新に失敗しました。[2]');
		});

		return false;
	});

//引取完了差戻し
	$(document).on('click','.revert_trade',function(){
		var trade = {};
		var self = $(this);
		trade.id = self.data('trade_id');
		$.ajax({
			'url': '/crm/Trades/revert_trade',
			'type' : 'POST',
			'data':{
				Trade:trade,
			},
			'dataType':'json',
		}).done(function(json){
			if(!json.success){
				alert('更新に失敗しました。[2]');
			}else{
				var finishedButton = '<div class="col col-md-4 col-md-offset-4 text-center finish_trade_button_div"><input name="finish_trade" class="btn btn-success btn-xs finish_trade" type="submit" value="第一希望日：完了"></div>';
				if(json.Trade.trade_schedule_date2 !== null){
					finishedButton += '<div class="col col-md-4 text-center finish_trade_button_div2"><input name="finish_trade2" class="btn btn-info btn-xs finish_trade2" type="submit" value="第二希望日：完了"></div>';
				}

				$(".finish_trade_td").empty().append(finishedButton);
				$('#trade_finished_confirm_date').empty();
				$('#credit_sale_date').empty();
				if(json.AgreementOrder.payment == 0){
					updateAccount(false,{
						'id' : json.AgreementOrder.id,
						'payment': json.AgreementOrder.payment,
						'payment_datetime' :json.AgreementOrder.payment_datetime,
						'payment_name' :json.updater,
					});
				}
				$('#second_trades').empty();

				if(json.Sale.bill === null){
					$('#sale_bill').empty();
				}
				if($('#scrap_status_td').length > 0){
					$('#scrap_status_td').closest('tr').remove();
				}

			}
		}).fail(function(){
			alert('更新に失敗しました。[1]');
		});
	});

//第二引取完了差戻し
	$(document).on('click','.revert_second_trade',function(){

		$.ajax({
			'url': '/crm/SecondTrades/revert_trade',
			'type': 'POST',
			'dataType': 'JSON',
			'data': {'agreement_order_id': 118262}
		}).done(function(json){
			if(!json.success){
				alert('更新に失敗しました。[2]');
			}else{
				var finishedButton = '<div class="col col-md-4 col-md-offset-4 text-center finish_second_trade_button_div"><input name="finish_second_trade" class="btn btn-success btn-xs finish_second_trade_button" type="submit" value="第二引取完了"></div>';
				$(".finish_second_trade_td").empty().append(finishedButton);
				$('#second_trade_finished_confirm_date').empty();
				$('#credit_sale_date').empty();
				if(json.data.Sale.bill === null){
					$('#sale_bill').empty();
				}
				if($('#scrap_status_td').length > 0){
					$('#scrap_status_td').closest('tr').remove();
				}
			}

		}).fail(function(){
			alert('エラーが発生しました。');
		});
	});

// 車種名リスト
	$(document).on('change', '#makerId', function(){
		var maker_id = $(this).val();
		if(maker_id==''){
			$("#carId").html('<option value="">----------</option>');
			return false;
		}
		$.ajax({
			type: 'POST',
			url: '/crm/OwnCars/find_car',
			dataType: 'json',
			data: {
				'maker_id' : maker_id
			}
		})
			.done(function(data){
				if (data == '') {
				//  alert('このメーカーの車種はありません。一言備考に記載してください。');
					$("#carId").html('<option value="">----------</option>');
				} else {
					var json = data;
					$("#carId").children().remove();
					$("#carId").append('<option value="">----------</option>');
					for (var i in json) {
						$("#carId").append('<option value="' + json[i].value + '" car_classification="' + json[i].car_classification + '">' + json[i].car_name + '</option>');
					}
				}
			})
			.fail(function(jqXHR, textStatus) {
				alert('再読み込みしてください。');
			//  div.html(prev_html);
			});
		return false;
	});
	$(document).on('change', '#carId', function(){
		var car_classification=$("#carId option:selected").attr('car_classification');
		$('input[name="data[OwnCar][car_classification]"]').val([car_classification]);
		if (car_classification == 1) {
			$('#displacement').val("");
		} else if (car_classification == 2) {
			$('#displacement').val(660);
		}
	});

// 書類預かり確認書到着
	$(document).on('click','.receive_keep_confirmation',function(){
		var button = $('.keep_confirmation_button');
		var before = button.html();
		button.html(loadingIcon22px);
		var document_id = $(this).attr('document_id');
		$.ajax({
			'url' : '/crm/Documents/receive_keep_confirmation',
			'type': 'POST',
			'data': {
				'Document':{
					'id' : document_id
				}
			},
			'dataType':'json',
		}).done(function( json ){
			if( !json.success ){
				alert('更新に失敗しました。');
				button.html(before);
			} else {
				button.remove();
				$('.keep_confirmation').html(
					'到着'
					+ '[' + json.keep_confirmation_datetime + '(' + json.keep_confirmation_receiver_name + ')]'
				);
							}
		}).fail(function(){
			alert('更新に失敗しました。');
			button.html(before);
		});
	});

// 書類預かり確認書到着解除
	$(document).on('click','.reversal_keep_confirmation',function(){
		var button = $('.keep_confirmation_button');
		var before = button.html();
		button.html(loadingIcon22px);
		var document_id = $(this).attr('document_id');
		$.ajax({
			'url' : '/crm/Documents/reversal_keep_confirmation',
			'type': 'POST',
			'data': {
				'document_id' : document_id
			},
			'dataType':'json',
		}).done(function( json ){
			if( !json.success ){
				alert('更新に失敗しました。');
				button.html(before);
			} else {
				button.remove();
				$('.keep_confirmation').html('<span class="text-danger">未着</span>');
				$('.keep_confirmation').after('<div class="col col-md-2 text-center keep_confirmation_button"><a class="btn btn-success btn-xs receive_keep_confirmation" href="javascript:void(0);" document_id="' + document_id + '">到着</a></div>');
			}
		}).fail(function(){
			alert('更新に失敗しました。');
			button.html(before);
		});
		return false;
	});

// 引取報告確認書到着
	$(document).on('click','.receive_trade_confirmation',function(){
		var button = $('.trade_confirmation_button');
		var before = button.html();
		button.html(loadingIcon22px);
		var document_id = $(this).attr('document_id');
		$.ajax({
			'url' : '/crm/Documents/receive_trade_confirmation',
			'type': 'POST',
			'data': {
				'Document':{
					'id' : document_id
				}
			},
			'dataType':'json',
		}).done(function( json ){
			if( !json.success ){
				alert('更新に失敗しました。');
				button.html(before);
			} else {
				button.remove();
				$('.trade_confirmation').html(
					'到着'
					+ '[' + json.trade_confirmation_datetime + '(' + json.trade_confirmation_receiver_name + ')]'
				);
							}
		}).fail(function(){
			alert('更新に失敗しました。');
			button.html(before);
		});
	});

// 引取報告確認書到着解除
	$(document).on('click','.reversal_trade_confirmation',function(){
		var button = $('.trade_confirmation_button');
		var before = button.html();
		button.html(loadingIcon22px);
		var document_id = $(this).attr('document_id');
		$.ajax({
			'url' : '/crm/Documents/reversal_trade_confirmation',
			'type': 'POST',
			'data': {
				'document_id' : document_id
			},
			'dataType':'json',
		}).done(function( json ){
			if( !json.success ){
				alert('更新に失敗しました。');
				button.html(before);
			} else {
				button.remove();
				$('.trade_confirmation').html('<span class="text-danger">未着</span>');
				$('.trade_confirmation').after('<div class="col col-md-2 text-center trade_confirmation_button"><a class="btn btn-success btn-xs receive_trade_confirmation" document_id="' + document_id + '" href="javascript:void(0);">到着</a></div>');
			}
		}).fail(function(){
			alert('更新に失敗しました。');
			button.html(before);
		});
		return false;
	});

// キャンセル説明済設定
	$(document).on('click','.explain_cancel',function(){
		var button = $(this);
		var agreement_order_id = 118262;
		button.after(loadingIcon22px).remove();
		$.ajax({
			'url' : '/crm/AgreementOrders/explain_cancel',
			'type': 'POST',
			'data': {
				'agreement_order_id' : agreement_order_id
			},
			'dataType':'json',
		}).done(function( json ){
			if(!json.success){
				alert('更新に失敗しました。');
				$("#loading").after(button).remove();
			} else {
				$("#loading").remove();
				$('.cancel_explain_text').html('<span class="text-primary">説明済</span>'+json.text);
				if(json.finished == 0){
					//キャンセル説明：表示部
										//id21：キャンセル案件設定機能
										$('.reversal_button_div').html('').addClass('text-right cancel_agreement_button_div').removeClass('text-center reversal_button_div');
					
					//写真撮影スタッフ管理：表示部
					if (json.schedule != '' && json.seeking_photographer == 0) {
						if (json.count_photographers > 0) {
							$('.deny_taking_photo_button_div').html('<a class="btn btn-warning btn-sm deny_taking_photo" agreement_order_id="' + agreement_order_id + '">拒否</a>');
							$('.send_seeking_photographer_mail_button_div').html('<a class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="' + agreement_order_id + '">送信</a>');
						}
						$('#photo_schedule').val(json.schedule);
						$('#photo_term_date').val(json.term);
					}
				}else{
					//キャンセル説明表示部
					$('.explain_cancel_button_div').html('');
					$('.reversal_button_div').html('');
				}
				if(json.trade_request_fax == 0){
															$('.exhibit_scrap_auction_button_div').html('<input class="btn btn-primary btn-sm exhibit_scrap_auction" type="submit" value="出品" name="exhibit_scrap_auction">');
													}
			}
		}).fail(function(){
			alert('更新に失敗しました。');
				$("#loading").after(button).remove();
		});
		return false;
	});

// キャンセル説明済解除
	$(document).on('click','.reversal_explain_cancel',function(){
		var button = $(this);
		var agreement_order_id = 118262;
		button.after(loadingIcon22px).remove();
		$.ajax({
			'url' : '/crm/AgreementOrders/reversal_explain_cancel',
			'type': 'POST',
			'data': {
				'agreement_order_id' : agreement_order_id
			},
			'dataType':'json',
		}).done(function( json ){
			if(!json.success){
				alert('更新に失敗しました。');
				$("#loading").after(button).remove();
			} else {
				$("#loading").remove();
				$('.cancel_explain_text').html('<span class="text-danger">未説明</span>');
				$('.reversal_explain_cancel_button_div').html('<a class="btn btn-success btn-xs explain_cancel">説明済</a>').addClass('explain_cancel_button_div').removeClass('reversal_explain_cancel_button_div');
				$('.cancel_agreement_button_div').html('<input class="btn btn-warning btn-xs reversal" type="submit" value="差戻し" name="reversal">').addClass('text-center reversal_button_div').removeClass('text-right cancel_agreement_button_div');
				$('.enable_send_photographer').html('');
				$('.deny_taking_photo_button_div').html('');
				$('.send_seeking_photographer_mail_button_div').html('');
				$('.exhibit_scrap_auction_button_div').html('');
			}
		}).fail(function(){
			alert('更新に失敗しました。');
				$("#loading").after(button).remove();
		});
		return false;
	});

// 入札取り消し
	$(document).on('click','.tender_cancel',function(){
		var button = $(this);
		var this_index = $('.tender_cancel').index(this);
		var trader_cd = button.attr('trader_cd');
		var agreement_order_id = 118262;
		button.after(loadingIcon22px).remove();
		if(!confirm('入札を取り消しますか？')){
			$("#loading").after(button).remove();
			return false;
		}
		$.ajax({
			'url' : '/crm/ScrapAuctions/cancel_tender',
			'type': 'POST',
			'data': {
				'trader_cd' : trader_cd,
				'agreement_order_id' : agreement_order_id
			},
			'dataType':'json',
		}).done(function( json ){
			if(!json.success){
				alert(json.message);
				$("#loading").after(button).remove();
			} else {
			//  $("#loading").remove();
			//  $("#loading").parents('.trader_row').remove();
				$('.trader_row').eq(this_index).remove();
			}
		}).fail(function(){
			alert('取消に失敗しました。');
				$("#loading").after(button).remove();
		});
		return false;
	});

// 業者クレーム 対応履歴保存
	$(document).on('click','.claim_support_save',function(){
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);
		var agreement_order_id = 118262;
		var claim_content = $('#scrap_auction_claim_content').val();
		var claim_remark = $('#scrap_auction_claim_remark').val();
		var claim_support_content = $('#scrap_auction_claim_support_content').val();
		var claim_support_remark = $('#scrap_auction_claim_support_remark').val();
		$.ajax({
			'url': '/crm/ScrapAuctions/claim_trader',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'agreement_order_id' : agreement_order_id, 'claim_content' : claim_content,
				'claim_remark' : claim_remark, 'claim_support_content' : claim_support_content,
				'claim_support_remark' : claim_support_remark
			}
		}).done(function(json){
			parent.html(parent_html);
			if(!json.success){
				alert(json.message);
			} else {
				$('.claim_supporter_name_div').html('[' + json.claim_support_datetime + '(' + json.claim_supporter_name + ')]');
			}
		}).fail(function(){
			alert('エラーが発生しました。');
			parent.html(parent_html);
		});
	});

// 業者クレーム 対応中への変更
	$(document).on('click','.claim_status',function(){
		var agreement_order_id = 118262;
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);

		$.ajax({
			'url' : '/crm/ScrapAuctions/change_claim_status',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : { 'agreement_order_id' : agreement_order_id}
		}).done(function(json){
			if(json.success){
				$('.claim_status_name_div').html('対応中');
				$('.claim_supporter_name_div').html('[' + json.claim_support_datetime + ' (' + json.claim_supporter_name + ')]');
				$('.claim_support_td').html();
				$('.claim_support_td').html('<div><div class="col col-md-11 PL0"><input name="data[ScrapAuction][claim_support_remark]" class="form-control MA0" id="scrap_auction_claim_support_remark" type="text"/></div></div><div class="col col-md-1 PA0"><a href="javascript:void(0);" class="btn btn-primary btn-xs claim_support_save">保存</a></div>');
									$('.claim_support_td').append('<div class="col col-md-2 text-center P6_0"><a href="javascript:void(0);" class="btn btn-danger btn-xs finish_claim_support" claim_support="0" style="width:65px;">キャンセル</a></div>');
									$('.claim_support_td').append('<div class="col col-md-2 text-center P6_0"><a href="javascript:void(0);" class="btn btn-danger btn-xs finish_claim_support" claim_support="1" style="width:65px;">引取前C</a></div>');
									$('.claim_support_td').append('<div class="col col-md-2 text-center P6_0"><a href="javascript:void(0);" class="btn btn-danger btn-xs finish_claim_support" claim_support="2" style="width:65px;">減額</a></div>');
									$('.claim_support_td').append('<div class="col col-md-2 text-center P6_0"><a href="javascript:void(0);" class="btn btn-danger btn-xs finish_claim_support" claim_support="3" style="width:65px;">拒否</a></div>');
									$('.claim_support_td').append('<div class="col col-md-2 text-center P6_0"><a href="javascript:void(0);" class="btn btn-danger btn-xs finish_claim_support" claim_support="9" style="width:65px;">その他</a></div>');
								$('.claim_support_td').append('</div>');
				$('.claim_content_td').html(json.claim_content_name + '<span style="margin-left:5px;">' + (json.claim_remark == null ? '': json.claim_remark) + '</span>');
				$('.scrap_auction_claim_td').html('クレーム有');
			} else {
				parent.html(parent_html);
			}
		}).fail(function(){
			parent.html(parent_html);
			alert('エラーが発生しました。');
		});
	});

// 業者クレーム 対応済への変更
	$(document).on('click', '.finish_claim_support',function(){
		var agreement_order_id = 118262;
		var claim_support = $(this).attr('claim_support');
		var claim_support_remark = $('#scrap_auction_claim_support_remark').val();

		if(claim_support_remark == '' && !confirm('対応備考が記入されていません。登録しますか？')){
			return false;
		}

		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);

		$.ajax({
			'url' : '/crm/ScrapAuctions/change_claim_status',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'agreement_order_id':agreement_order_id, 'claim_support' : claim_support, 'claim_support_remark':claim_support_remark}
		}).done(function(json){
			if(json.success){
				$('.claim_support_td').html('【' + json.claim_support_name + '】' + '<br>' + claim_support_remark);
				$('.claim_support_content_td').html($('#scrap_auction_claim_support_content').val().replace(/\n/g,'<br>'));
				$('.claim_status_name_div').html('対応済');
				$('.claim_supporter_name_div').html('[' + json.claim_support_datetime + '(' + json.claim_supporter_name + ')]');
			} else {
				alert(json.message);
				parent.html(parent_html);
			}
		}).fail(function(){
			alert('エラーが発生しました。');
			parent.html(parent_html);
		});
	});

	

	$(document).on('click', '.temporarily_disposal',function(){
		if($('input[name="data[AgreementOrder][disposal_date]"]').val() == ''){
			alert('抹消日を入力してください。');
			return false;
		}
		return confirm('お客様にアンケートメールが送信されます。　一時抹消でよろしいですか？');
	});


	$(document).on('click', '.permanent_disposal',function(){
		if($('input[name="data[AgreementOrder][disposal_date]"]').val() == ''){
			alert('抹消日を入力してください。');
			return false;
		}
		return confirm('お客様にアンケートメールが送信されます。　永久抹消でよろしいですか？');
	});

	$(document).on('click', '.export_disposal',function(){
		if($('input[name="data[AgreementOrder][disposal_date]"]').val() == ''){
			alert('抹消日を入力してください。');
			return false;
		}
		return confirm('お客様にアンケートメールが送信されます。　輸出でよろしいですか？');
	});

	$(document).on('click', '.entrust_disposal',function(){
		if($('input[name="data[AgreementOrder][disposal_date]"]').val() == ''){
			alert('抹消日を入力してください。');
			return false;
		}
		return confirm('お客様にアンケートメールが送信されます。　業者委託でよろしいですか？');
	});

	$(document).on('click', '.change_disposal',function(){
		if($('input[name="data[AgreementOrder][disposal_date]"]').val() == ''){
			alert('抹消日を入力してください。');
			return false;
		}
		return confirm('お客様にアンケートメールが送信されます。　名義変更でよろしいですか？');
	});

// 抹消通知方法変更
	$(document).on('click','.change_notify_disposal_way',function(){
		var agreement_order_id = 118262;
		var notify_disposal_way = $(this).attr('data-notify_disposal_way');
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);
		$.ajax({
			'url' : '/crm/agreement_orders/change_notify_disposal_way',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'agreement_order_id' : agreement_order_id, 'notify_disposal_way' : notify_disposal_way}
		}).done(function(json){
			if(json.success){
				$('.notify_disposal_button_span').remove();
				$('#notify_disposal_td').html(json.notify_disposal_text + json.text + '[' + json.notify_disposal_datetime + '(' + json.notify_disposal_sender + ')]');
				alert('抹消通知方法を変更しました。');
			} else {

				var message = '抹消通知方法を変更できませんでした。再読み込みしてください。';
				if(typeof json.message == 'string'){
					message += ' ' + json.message;
				}
				alert(message);
				parent.html(parent_html);
			}
		}).fail(function(jqXHR, textStatus) {
			alert('抹消通知方法を変更できませんでした。再読み込みしてください。');
			parent.html(parent_html);
		});
		return false;
	});

// 販売用書類追跡番号
	$(document).on('click','#set_document_tracking_number_button',function(){
		var agreement_order_id = 118262;
		var tracking_number = $('#sale_document_tracking_number').val();

		if(tracking_number == '' || !(tracking_number.length > 10 && 14 > tracking_number.length)){
			return alert('追跡番号を11桁～13桁で入力してください。');
		}
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);

		$.ajax({
			'url' : '/crm/Sales/set_document_tracking_number',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'agreement_order_id':agreement_order_id, 'document_tracking_number':tracking_number}
		}).done(function(json){
			parent.html(parent_html);
			if(!json.success){
				return alert(json.message);
			}
			$('.sale_document_tracking_number_div').html(json.document_tracking_number + ' [' + json.document_send_datetime + '(' + json.document_sender_name + ')]');
			parent.remove();
		}).fail(function(){
			parent.html(parent_html);
			return alert('エラーが発生しました。');
		});
	});

// 書類発送備考
	$(document).on('click','.document_send_remark_button',function(){
		var agreement_order_id = 118262;
		var remark = $('#document_send_remark').val();
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);
		$.ajax({
			'url' : '/crm/Documents/save_document_send_remark',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'agreement_order_id':agreement_order_id, 'send_remark':remark}
		}).done(function(json){
			parent.html(parent_html);
			if(!json.success){
				return alert(json.message);
			}

		}).fail(function(){
			parent.html(parent_html);
			alert('エラーが発生しました。');
		});

	});

// Smartオークション出品チェック
	$('#end_at_datepicker').on('change', function(){
		var end_at = $('#end_at_datepicker').val();
		var end_at = end_at.split('-');
		var end_at_yert = parseInt(end_at[0]);
		var end_at_month = parseInt(end_at[1]);
		var end_at_day = parseInt(end_at[2]);
		if (end_at_yert == 2017 && end_at_month == 7 && (end_at_day >= 3 && end_at_day <= 14)) {
			$('#start_price').val('0');
		} else {
			var car_classical = $('input[name="data[OwnCar][car_classification]"]:checked').val();
			if (car_classical == 1) {
				$('#start_price').val('10000');
			} else {
				$('#start_price').val('1000');
			}
		}
	});

	$(document).on('click','.exhibit_scrap_auction',function(){
		if($('#recyclingFeeSA').val() == 0){
			alert('リサイクル料金が不明です。');
			return false;
		}
		return true;
	});

// Smartオークション質問回答
	$(document).on('click','.edit_sa_customer_question',function(){
		var sa_customer_question_id = $(this).attr('sa_customer_question_id');
		var edit_switch = $(this).attr('edit_switch');
		if(edit_switch == 1){
			var content_text = $('#customer_question_val'+sa_customer_question_id).val();
			if(content_text == ''){
				alert('質問内容が空白です。');
				return false;
			}
		}else{
			var content_text = $('#answer_customer_question_val'+sa_customer_question_id).val();
			if(content_text != ''){
				if(!confirm('回答内容が質問者に送信されます。この内容でよろしいですか？')){
					return false;
				}
			}else{
				if(!confirm('回答の取り消しを質問者に通知します。よろしいですか？')){
					return false;
				}
			}
		}
		var this_html = $(this);
		$(this).after(loadingIcon22px).remove();
		$.ajax({
			'url' : '/crm/ScrapAuctions/edit_sa_customer_question',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {
				'sa_customer_question_id':sa_customer_question_id,
				'content_text':content_text,
				'edit_switch':edit_switch
			}
		}).done(function(json){
			alert(json.message);
			if(json.success){
				if(edit_switch == 1){
					$('#question_content_text'+sa_customer_question_id).text(content_text);
					$('#answer_customer_question'+sa_customer_question_id).find('.question_for_anser_box').text(content_text);
				}else　if(edit_switch == 2){
					if(json.answer_create){
						$('#question_content_text'+sa_customer_question_id).after('<div class="col col-md-12 PA0 clearfix" style="padding-top:10px;border-bottom: dotted 1px #cccccc;margin-bottom: 5px;" class="clearfix"><div class="col col-md-8 PL0"><span style="color:#fed98a;">A</span> '+json.creater+' '+json.create_time+'</div></div><div id="answer_content_text'+sa_customer_question_id+'" class="col col-md-12 PA0 clearfix" style="width:34em;text-overflow:ellipsis;-o-text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">'+content_text+'</div>');
						$('#question_content_text'+sa_customer_question_id).prev('div').find('.answer_customer_question').addClass('btn-primary').removeClass('btn-warning').text('回答編集');
					}else{
						if(content_text == ''){
							$('#question_content_text'+sa_customer_question_id).prev('div').find('.answer_customer_question').addClass('btn-warning').removeClass('btn-primary').text('未回答');
							$('#answer_content_text'+sa_customer_question_id).prev('div').remove();
							$('#answer_content_text'+sa_customer_question_id).remove();
						}else{
							$('#answer_content_text'+sa_customer_question_id).text(content_text);
						}
					}
				}
			}
			$('#loading').after(this_html).remove();
			$.colorbox.close();
		}).fail(function(){
			alert('エラーが発生しました。');
			$('#loading').after(this_html).remove();
			$.colorbox.close();
		});
		return false;
	});

// 車両見積依頼FAX送信
	$(document).on('click', '#estimate_fax_send', function(){
		var agreement_order_id = 118262;
		if(!confirm('見積FAXを送信します。よろしいですか？')){
			return false;
		}
		var parent = $(this).parent();
		var parent_html = parent.html();
		parent.html(loadingIcon22px);
		$.ajax({
			'url' : '/crm/Trades/send_request_estimate_fax',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'agreement_order_id' : agreement_order_id}
		}).done(function(json){
			parent.html(parent_html);
			if(!json.success){
				return alert(json.message);
			}
			$('.tradable_estimate_fax_tr td:nth-of-type(2)').html('送信済' + ' (' + json.trade_estimate_datetime + ' [' + json.estimate_fax_sender_name + '])');
		}).fail(function(){
			parent.html(parent_html);
			alert('エラーが発生しました。');
		});
	});

});

//エラーメッセージ出力
function setAlertMsg( str ){
	if ($('#alert').size() === 0) {
		$('#content').prepend('<div id="alert" class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>'+str+'</div>');
	} else {
		$('#alert').attr('class', 'alert alert-success').empty().append('<a class="close" data-dismiss="alert" href="#">×</a>'+str);
	}
}

/*
 * updateAccount - 口座情報HTML更新
 * (obj) account, (obj) agreement_order
 * @return void
 */
function updateAccount( account , agreement_order){
	var arr_account_classification = {"1":"\u666e\u901a ","2":"\u5f53\u5ea7 ","4":"\u8caf\u84c4 ","9":"\u305d\u306e\u4ed6 "};
	var arr_payment_status = {"0":"\u672a","1":"<strong>\u6e08<\/strong>","2":"\u632f\u8fbc\u5f85","3":"\u632f\u8fbc\u4e2d","4":"<span class=\"text-danger\">\u30a8\u30e9\u30fc<\/span>","8":"<span class=\"text-danger\">\u632f\u8fbc\u4fdd\u7559<\/span>","9":"\u4e0d\u8981"};
	var is_input = false;
	if(typeof agreement_order != 'undefined' && agreement_order != false){
		is_input = agreement_order.payment != '1' && agreement_order.payment != '9';
	}

	//銀行名
	if(account != false && $.type(account.bank) != 'undefined'){
		var inputField = '<div><div class="col col-md-6 PL0"><input name="data[Account][bank]" class="form-control input-sm" maxlength="30" id="bank" type="text"/></div></div>';
		if(is_input){
			$('.bank_td').empty().append(inputField);
			$('#bank').val(account.bank);
		} else {
			$('.bank_td').empty().append(account.bank);
		}
	}

	//銀行コード
	if(account != false && $.type(account.bank_code) != 'undefined'){
		var inputField = '<div><div class="col col-md-3 PL0"><input name="data[Account][bank_code]" class="form-control input-sm ime-disabled" maxlength="4" id="bank_code" type="tel"/></div></div>';
		if(is_input){
			$('.bank_code_td').empty().append(inputField);
			$('#bank_code').val(account.bank_code);
		} else {
			$('.bank_code_td').empty().append(account.bank_code);
		}
	}

	//支店名
	if( account != false && $.type(account.branch_name) != 'undefined'){
		var inputField = '<div><div class="col col-md-6 PL0"><input name="data[Account][branch_name]" class="form-control input-sm" maxlength="30" id="branch_name" type="tel"/></div></div>';
		if(is_input){
			$('.branch_name_td').empty().append(inputField);
			$('#branch_name').val(account.branch_name);
		} else {
			$('.branch_name_td').empty().append(account.branch_name);
		}
	}

	//支店番号
	if( account != false && $.type(account.branch_number) != 'undefined' ){
		var inputField = '<div><div class="col col-md-2 PL0"><input name="data[Account][branch_number]" class="form-control input-sm ime-disabled" maxlength="3" id="branch_number" type="tel"/></div></div>';
		if(is_input){
			$('.branch_nuber_td').empty().append(inputField);
			$('#branch_number').val(account.branch_number);
		} else {
			$('.branch_number_td').empty().append(account.branch_number);
		}
	}

	//口座種別
	if( account != false && $.type(account.account_classification) != 'undefined' ){
		var inputField = '<div><div class="col col-md-12" style="padding: 6px 0px;"><input type="hidden" name="data[Account][account_classification]" id="AccountAccountClassification_" value=""/><label class="radio-inline" for="AccountAccountClassification1"><input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification1" value="1" /> 普通 </label>　<label class="radio-inline" for="AccountAccountClassification2"><input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification2" value="2" /> 当座 </label>　<label class="radio-inline" for="AccountAccountClassification4"><input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification4" value="4" /> 貯蓄 </label>　<label class="radio-inline" for="AccountAccountClassification9"><input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification9" value="9" /> その他 </label></div></div>';
		if(is_input){
			$('.account_classification_td').empty().append(inputField);
			$('#AccountAccountClassification' + account.account_classification).prop('checked',true);
		} else {
			$('.account_classification_td').empty().append(arr_account_classification[account.account_classification]);
			console.log('!');
		}
	}

	//口座番号
	if( account != false && $.type(account.account_number) != 'undefined' ){
		var inputField = '<div><div class="col col-md-3 PL0"><input name="data[Account][account_number]" class="form-control input-sm ime-disabled" maxlength="7" id="account_number" type="tel"/></div></div>';
		if(is_input){
			$('.account_number_td').empty().append(inputField);
			$('#account_number').val(account.account_number);
		} else {
			$('.account_number_td').empty().append(account.account_number);
		}
	}

	//口座名義人
	if( account != false && $.type(account.nominee_name) != 'undefined' ){
		var inputField = '<div><div class="input text"><input name="data[Account][nominee_name]" maxlength="50" id="nominee_name" class="form-control input-sm katakana" type="text"/></div></div>';
		if(is_input){
			$('.nominee_name_td').empty().append(inputField);
			$('#nominee_name').val(account.nominee_name);
		} else {
			$('.nominee_name_td').empty().append(account.nominee_name);
		}
	}

	//振込状態
	if(agreement_order != false && $.type(agreement_order.payment != 'undefined')){
		$('span.payment_status').html(arr_payment_status[agreement_order.payment]);
		if(agreement_order.payment != '0' && agreement_order.payment != '9'){
			if($('#payment_datetime') == null){
				$('#payment_param_box').append('<span id="payment_datetime">' + agreement_order.payment_datetime + '</span> + <span id="payment_name">' + agreement_order.payment_name + '</span>');
			} else {
				$('#payment_datetime').html(agreement_order.payment_datetime);
				$('#payment_name').html(agreement_order.payment_name);
			}
		}

		var buttonPending  = '<a href="javascript:void(0);" class="btn btn-warning btn-xs change_payment_status" id="suspension_payment_button" style="float:left;" type="button" agreement_order_id="118262">保留</a>';
		var buttonPrepare  = '<a href="javascript:void(0);" class="btn btn-success btn-xs change_payment_status" id="prepare_payment_button" style="float:left;margin-left:15px;" agreement_order_id="118262">準備</a>';
		var buttonReverse  = '<a href="javascript:void(0);" class="btn btn-info btn-xs change_payment_status" id="reverse_payment_button" style="float:left;width:4em;" agreement_order_id="118262">振込待</a>';
		var buttonError    = '<a href="javascript:void(0);" class="btn btn-warning btn-xs change_payment_status" id="error_payment_button" style="float:left;width:4em;margin-left:5px;" agreement_order_id="118262">エラー</a>';
		var buttonFinished = '<a href="javascript:void(0);" class="btn btn-success btn-xs change_payment_status" id="finish_payment_button" style="float:left;width:4em;margin-left:5px;" agreement_order_id="118262">完了</a>';
		var divButton = $('.payment_button_div').empty();
		if( agreement_order.payment == 1 ){
			//編集ボタン削除
			$('.edit_account').hide();
		} else if(agreement_order.payment == 2){
			divButton.append(buttonPending);
			if(account.bank != '' && account.bank_code != '' && account.branch_name != '' && account.account_number != '' && account.nominee_name != ''){
				divButton.append(buttonPrepare);
			}
		} else if( agreement_order.payment == '3'){
			divButton.append(buttonReverse);
			divButton.append(buttonError);
			divButton.append(buttonFinished);
		} else if( agreement_order.payment == '4'){
			divButton.append(buttonFinished);
		} else if( agreement_order.payment == '8'){
			divButton.append(buttonReverse);
		} else if( agreement_order.payment == '0' || agreement_order.payment == '9'){
			divButton.append(buttonReverse);
		}
	}
}

/**
 * getAccountData - 口座情報ページ内データ取得
 *
 * @return array
 */

function getAccountData(){
	return {
		'bank':$('#bank').val(),
		'bank_code':$('#bank_code').val(),
		'branch_name':$('#branch_name').val(),
		'branch_number':$('#branch_number').val(),
		'account_classification': $('input[name="data[Account][account_classification]"]:checked').val(),
		'account_number':$('#account_number').val(),
		'nominee_name':$('#nominee_name').val(),
	};
}

//Enter 送信無効
$(function() {
  $(document).on("keypress", "input:not(.allow_submit)", function(event) {
	return event.which !== 13;
  });
});


//]]>
//<![CDATA[
$(document).ready(function(){
	var task_data = [];
	$('#task_deadline').datepicker({
		minDate: 0,
	});

	var taskToggle =  function(){
		$('#task_list').slideToggle();
		if ($('.task_list_arrow_div').html() == '<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>') {
			$('.task_list_arrow_div').html('<span class="glyphicon glyphicon-arrow-up" style="padding-top: 6px;"></span>');
		} else {
			$('.task_list_arrow_div').html('<span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span>');
		}
	};

	$(document).on('click', '.task_list_arrow',taskToggle);

	//タスク管理
	$(document).on('click','#task_commit',function(){
		var inquiry_id = $(this).attr('data-inquiry_id');
		var remark = $('#task_remark').val();
		var deadline = $('#task_deadline').val();
		var responsible = $('#task_responsible').attr('data-employee_cd');
		if(inquiry_id == ''){
			return alert('問合せ記録を保存してください。');
		} else if(remark == ''){
			return alert('依頼内容が入力されていません。');
		} else if(deadline == ''){
			return alert('対応期限が設定されていません。');
		} else if(responsible == '' || typeof responsible != 'string'){
			return alert('担当者を選択してください。');
		}

		var parent = $(this).parent();
		var prev = parent.html();
		parent.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
		$.ajax({
			'url' : '/crm/Tasks/add',
			'type' : 'POST',
			'dataType' : 'JSON',
			'data' : {'inquiry_id':inquiry_id, 'remark':remark, 'deadline':deadline, 'responsible':responsible}
		}).done(function(json){
			parent.html(prev);
			if(!json.success){
				alert(json.message);
				return false;
			}
			$('#task_remark').val('');
			$('#task_deadline').val('');
			$('#task_responsible').val('');
			$('#task_responsible').attr('data-employee_cd','');
			$('#task_list tbody').html('');
			var html = '';
			$('.task_list_remark_count').val('');
			$.each(json.data,function(key, val){
				html += showTaskList(val);
			});
			task_data = json.data;
			$('#task_list tbody').html(html);
			$('.task_list_remark_count').html('');
		}).fail(function(){
			alert('エラーが発生しました。');
			parent.html(prev);
		});
	});

	//タスク　ステ変更 && 削除
	$(document).on('click','.change_support_status, .delete_support_remark',function(){
		if($(this).attr('class').indexOf('change_support_status') !== -1){
			var url = '/crm/Tasks/change_support_status';
			var task_id = $(this).attr('data-task_id');
			var parent_tr = $('#task_list tbody tr[data-task_id='+task_id+']');
			var status = $(this).attr('data-task_status');
		} else {
			var url = '/crm/Tasks/delete';
			var task_id = $(this).attr('data-task_id');
			var parent_tr = $('#task_list tbody tr[data-task_id='+task_id+']');
			var status = $(this).attr('data-task_status');
		}
		var parent = $(this).parent();
		var prev = parent.html();
		parent.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
		$.ajax({
			'url' : url,
			'type' : 'POST',
			'dataType': 'JSON',
			'data' : {'task_id':task_id, 'status':status}
		}).done(function(json){
			parent.html(prev);
			if(!json.success){
				alert(json.message);
				return false;
			}
			$('#task_remark').val('');
			$('#task_deadline').val('');
			$('#task_list tbody').html('');
			var html = '';
			$.each(json.data,function(key, val){
				html += showTaskList(val);
			});
			task_data = json.data;
			$('#task_list tbody').html(html);
		}).fail(function(){
			alert('エラーが発生しました。');
			parent.html(prev);
		});
	});

	//対応備考保存
	$(document).on('click','.save_support_remark',function(){
		var task_id = $(this).attr('data-task_id');
		var parent_tr = $('#task_list tbody tr[data-task_id='+task_id+']');
		var support_remark = parent_tr.find('.support_remark_div input').val();
		var parent = $(this).parent();
		var prev = parent.html();
		parent.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');

		$.ajax({
			'url' : '/crm/Tasks/save_remark',
			'type' : 'POST',
			'dataType': 'JSON',
			'data' : {'task_id':task_id, 'support_remark':support_remark}
		}).done(function(json){
			parent.html(prev);
			if(!json.success){
				alert(json.message);
				return false;
			}
			$('#task_remark').val('');
			$('#task_deadline').val('');
			$('#task_list tbody').html('');
			var html = '';
			$.each(json.data,function(key, val){
				html += showTaskList(val);
			});
			task_data = json.data;
			$('#task_list tbody').html(html);
		}).fail(function(){
			alert('エラーが発生しました。');
			parent.html(prev);
		});
	});

	//タスク表示
	$(function(){

		var html = '';
		$.each(task_data,function(key,val){
			html += showTaskList(val);
		});
		if(html != ''){
			$('#task_list tbody').html(html);
			taskToggle();
		}

		$('#only_self_task, #only_support_not_yet').click(function(){
			var html = '';
			$.each(task_data,function(key,val){
				html += showTaskList(val);
			});
			$('#task_list tbody').html(html);
		});
	});
	var markers = new Array();
        var markersIds = new Array();
        var geocoder = new google.maps.Geocoder();

        function geocodeAddress(address, action, map,markerId, markerTitle, markerIcon, markerShadow, windowText, showInfoWindow, draggableMarker) {
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if(action =='setCenter'){
                  setCenterMap(results[0].geometry.location);
                }
                if(action =='setMarker'){
                  //return results[0].geometry.location;
                  setMarker(map,markerId,results[0].geometry.location,markerTitle, markerIcon, markerShadow,windowText, showInfoWindow, draggableMarker);
                }
                if(action =='addPolyline'){
                  return results[0].geometry.location;
                }
              } else {
                //alert('Geocode was not successful for the following reason: ' + status);
                return null;
              }
            });
        }
      var initialLocation;
        var browserSupportFlag =  new Boolean();
        var trade_address_map;
        var myOptions = {
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          ,scaleControl: true

        };
        trade_address_map = new google.maps.Map(document.getElementById('trade_address_map'), myOptions);
    
      function setCenterMap(position){
    trade_address_map.setCenter(position);setMarker(trade_address_map,'center',position,'My Position','/crm/img//red-dot.png','','My Position', true,false);
      }
    var centerLocation = geocodeAddress('埼玉県北足立郡伊奈町小室5366-3　ハイツカミフジ目の前のP　駐車no4','setCenter'); setCenterMap(centerLocation);
      function localize(){
            if(navigator.geolocation) { // Try W3C Geolocation method (Preferred)
                browserSupportFlag = true;
                navigator.geolocation.getCurrentPosition(function(position) {
                  initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                  trade_address_map.setCenter(initialLocation);setMarker(trade_address_map,'center',initialLocation,'My Position','/crm/img///crm/img//red-dot.png','','My Position', true,false);}, function() {
                  handleNoGeolocation(browserSupportFlag);
                });

            } else if (google.gears) { // Try Google Gears Geolocation
          browserSupportFlag = true;
          var geo = google.gears.factory.create('beta.geolocation');
          geo.getCurrentPosition(function(position) {
            initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
            trade_address_map.setCenter(initialLocation);setMarker(trade_address_map,'center',initialLocation,'My Position','/crm/img///crm/img//red-dot.png','','My Position', true,false);}, function() {
                  handleNoGeolocation(browserSupportFlag);
                });
            } else {
                // Browser doesn't support Geolocation
                browserSupportFlag = false;
                handleNoGeolocation(browserSupportFlag);
            }
        }

        function handleNoGeolocation(errorFlag) {
            if (errorFlag == true) {
              initialLocation = noLocation;
              contentString = "Error: The Geolocation service failed.";
            } else {
              initialLocation = noLocation;
              contentString = "Error: Your browser doesn't support geolocation.";
            }
            trade_address_map.setCenter(initialLocation);
            trade_address_map.setZoom(3);
        }
      function setMarker(map, id, position, title, icon, shadow, content, showInfoWindow, draggableMarker){
        var index = markers.length;
        markersIds[markersIds.length] = id;
        markers[index] = new google.maps.Marker({
                position: position,
                map: map,
                icon: icon,
                shadow: shadow,
                draggable: draggableMarker,
                title:title
            });
        //updateCoordinatesDisplayed(id, position.lat(), position.lng());
           if(content != '' && showInfoWindow){
             var infowindow = new google.maps.InfoWindow({
                  content: content
              });
             google.maps.event.addListener(markers[index], 'click', function() {
            infowindow.open(map,markers[index]);
              });
            }
            if (draggableMarker) {
              google.maps.event.addListener(markers[index], 'dragend', function(event) {
                updateCoordinatesDisplayed(id, event.latLng.lat(), event.latLng.lng());
              });
            }
         }
          // An input with an id of 'latitude_<id>' and 'longitude_<id>' will be set, only if it exist
          function updateCoordinatesDisplayed(markerId, latitude, longitude) {
            if (document.getElementById('latitude_' + markerId)) {
              document.getElementById('latitude_' + markerId).value = latitude;
            }
            if (document.getElementById('longitude_' + markerId)) {
              document.getElementById('longitude_' + markerId).value = longitude;
            }
          }
	function showTaskList(task){

		//自分のみ
		if($('#only_self_task').prop('checked') && (task.Task.registrant != 'S00112' && task.Task.responsible != 'S00112' && task.Task.supporter != 'S00112')){
			return '';
		} else if($('#only_support_not_yet').prop('checked') && task.Task.status != '0'){
			return '';
		}

		var arr_support_status = ["<span class=\"text-danger\">\u672a\u5bfe\u5fdc<\/span>","<span class=\"text-primary\">\u5bfe\u5fdc\u4e2d<\/span>","\u5bfe\u5fdc\u6e08"];
		var html = '<tr data-task_id="' + task.Task.id + '">';
		html += '<td class="active"><div class="col col-md-12 P6_0">'+ task.Task.created +'</div><div class="col col-md-12 P6_0" style="border-top:1px solid #CCCCCC;">'+ task.Task.deadline +'</div></td>';
		html += '<td class="active">'+ task.Task.registrant_name +'<br><span class="glyphicon glyphicon-arrow-down" style="padding-left:20px;"></span><br>'+ (task.Task.status == '0' ? task.Task.responsible_name : task.Task.supporter_name) +'</td>';
		html += '<td><div class="col col-md-12 P6_0">'+ arr_support_status[task.Task.status] + '</div>';
		if(task.Task.status == '0'){
			html += '<a href="javascript:void(0);" class="btn btn-success btn-xs change_support_status" data-task_status="1" data-task_id="'+ task.Task.id +'">対応中</a>';
		} else if (task.Task.status == '1' && task.Task.supporter == 'S00112'){
			html += '<a href="javascript:void(0);" class="btn btn-success btn-xs change_support_status" data-task_status="2" data-task_id="'+ task.Task.id +'">対応済</a>';
		} else {
			html += '<br>' + task.Task.support_datetime;
		}
		html += '</td>';
		html += '<td><div class="col col-md-12 PL0" style="min-height:35px;word-break:break-all;">' + task.Task.remark + '</div><div class="col col-md-12 PL0" style="min-height:35px;border-top:1px dashed #DDD;word-break:break-all;">';

		if(task.Task.status != '2'){
			html += '<div class="col col-md-10 support_remark_div P6_0">';
			if(task.Task.status == '1' && task.Task.supporter == 'S00112'){
				html += '<input class="form-control input-sm" type="text" value="'+ (task.Task.support_remark == null ? '' : task.Task.support_remark) +'" maxlength="100" placeholder="対応内容(100文字)">';
			} else {
				html += (task.Task.support_remark == null ? '' : task.Task.support_remark);
			}
			html += '</div>';
			html += '<div class="col col-md-2 support_remark_button_div" style="padding-top:10px;">';
			if(task.Task.status == '1' && task.Task.supporter == 'S00112'){
				html += '<a href="javascript:void(0);" class="btn btn-success btn-xs save_support_remark" data-task_id="'+ task.Task.id +'">保存</a>';
			} else if( task.Task.status == '0' && task.Task.registrant == 'S00112'){
				html += '<a href="javascript:void(0);" class="btn btn-danger btn-xs delete_support_remark" data-task_id="'+ task.Task.id +'">削除</a>';
			}
			html += '</div>';
		} else {
			html += '<div class="col col-md-12 support_remark_div PA0">';
			html += (task.Task.support_remark == null ? '' : task.Task.support_remark);
			html += '</div>';
		}
		html += '</div></td></tr>';
		return html;
	}
	$(document).on('keyup','#task_remark',function(){
		var max_length = $('#task_remark').attr('maxlength');
		var len = $('#task_remark').val().length;
		$('.task_list_remark_count').html('' + len + '/' + max_length);
	});

	/*$('#task_responsible').autocomplete({
		'source': '/crm/Employees/auto_complete',
		'disabled' : false,
		'autoFocus' : true,
		'select' : function(event,ui){
			$('#task_responsible').val(ui.item.Employee.family_name  + ' ' +  ui.item.Employee.first_name);
			$('#task_responsible').attr('data-employee_cd',ui.item.Employee.employee_cd);
			return false;
		}

	}).data('ui-autocomplete')._renderItem = function(ul,item){
		return $("<li>").append("<a>" + item.Employee.family_name + ' ' + item.Employee.first_name + "</a>").appendTo(ul);
	};*/
});
