
var current_page=1;var sym=0;$(document).ready(function(){if(theme=="neptune"){if($('#hostList').length!=0&&$('#serviceList').length!=0){$('#hostgroupList').hide();$('#serviceList').show();}else{$('#hostgroupList option:eq(1)').prop('selected',true);}
var header='<div id="report-options-header">';header+='<h4>'+_("Report Options")+'</h4>';header+='<i id="close-report-options" class="material-symbols-outlined md-20 md-400 md-button md-action">close</i>';header+='</div>';$('#neptune-report-options').prepend(header);$('#servicegroupList').hide();$('button#run').html(_('Apply and Run'));$('#hostgroupList option:first-child').hide();$('#servicegroupList option:first-child').hide();$('#report-options-btn').on('click',function(){whiteout();$('body.child').css('overflow','hidden')
$('#neptune-report-options').addClass("report-options-visible");});$('#whiteout, button#run, #close-report-options').on('click',function(){$('#neptune-report-options').removeClass("report-options-visible");$('body.child').css('overflow','')
clear_whiteout();});}
$('#searchBox').keypress(function(e){if(e.which==13){$('#run').click();}});$('#report').on('click','.clear-search',function(){$('#searchBox').val('');$('#run').click();});$('#report').on('keypress','.jump-to',function(e){if(e.which==13){$(this).parent().find('.jump').click();}});$('#report').on('click','.jump',function(){var jumpto=$(this).parent().find('.jump-to').val();if(jumpto<=max_pages&&jumpto>0){current_page=parseInt(jumpto);load_page();}});$('#report').on('keypress','.tablepagertextfield',function(e){if(e.which==13){var jumpto=$(this).val();if(jumpto<=max_pages&&jumpto>0){current_page=parseInt(jumpto);load_page();}}});$('#report').on('change','.num-records',function(){record_limit=$(this).val();$('.num-records').val(record_limit);max_pages=Math.ceil(max_records/record_limit);if(current_page>max_pages){current_page=max_pages;}
$.post(base_url+'reports/index.php',{'pageopt':'setrecords','records':record_limit},function(){});load_page();});$('#report').on('click','.previous-page',function(){current_page-=1;if(current_page<1){current_page=1;}
load_page();});$('#report').on('click','.next-page',function(){current_page+=1;load_page();});$('#report').on('click','.last-page',function(){current_page=max_pages;load_page();});$('#report').on('click','.first-page',function(){current_page=1;load_page();});});function load_page()
{if(current_page<max_pages){$('.next-page').attr('disabled',false);$('.last-page').attr('disabled',false);}else{$('.next-page').attr('disabled',true);$('.last-page').attr('disabled',true);}
if(current_page>1){$('.previous-page').attr('disabled',false);$('.first-page').attr('disabled',false);}else if(current_page<=1){$('.previous-page').attr('disabled',true);$('.first-page').attr('disabled',true);}
if(max_pages>0){$('.pagenum').html(current_page+' of '+max_pages);$('.pagenum').val(current_page);$('.pagetotal').html(max_pages);}else{$('.pagenum').html('0 of 0');$('.pagenum').val(0);$('.pagetotal').html(0);}
var lastrecord=current_page*record_limit;var firstrecord=(lastrecord)-record_limit+1;if(lastrecord>max_records){lastrecord=max_records;}
if(lastrecord>0){$('.showing-records').html(firstrecord+'-'+lastrecord);}else{$('.showing-records').html('0-0');}
sym=1;setTimeout('loading_data()',500);var args=report_url_args;args.page=current_page;args.mode='getpage';args.records=record_limit;$.get(report_url,args,function(data){sym=0;$('.reportentries .report-data').html(data);$('#loadscreen').hide();$('#loadscreen-spinner').hide();});}
function loading_data()
{if(sym==1){var h=$('.reportentries .report-data').outerHeight();var w=$('.reportentries .report-data').outerWidth();var margin=(h-$('#loadscreen-spinner').outerHeight())/2;var leftmargin=(w-$('#loadscreen-spinner').outerWidth())/2;$('#loadscreen').height(h);$('#loadscreen').width(w);$('#loadscreen-spinner').css('margin-top',margin+'px').css('margin-left',leftmargin+'px').show();$('#loadscreen').show();}}
function update_service_list(){var host=$('#hostList').val();$.get(base_url+'/reports/availability.php?mode=getservices&host='+host,function(data){$('#serviceList').html(data);});}
function showhidedates(){if($('#reportperiodDropdown').val()=='custom'){$('#customdates').show();}else{$('#customdates').hide();}}
function show_loading_report()
{if(report_sym==1){$('#report').html('');show_throbber();}}
function show_report_selection(option){var hostList=$("#hostList");var serviceList=$("#serviceList");var hostgroupList=$("#hostgroupList");var servicegroupList=$("#servicegroupList");switch(option){case"host_or_service":hostList.show();serviceList.show();hostgroupList.hide();servicegroupList.hide();break;case"hostgroup":hostList.hide();serviceList.hide();hostgroupList.show();servicegroupList.hide();$('#hostgroupList option:eq(1)').prop('selected',true);break;case"servicegroup":hostList.hide();serviceList.hide();hostgroupList.hide();servicegroupList.show();$('#servicegroupList option:eq(1)').prop('selected',true);break;}}