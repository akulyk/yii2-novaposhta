/**
 * Created by akulyk on 18.11.2016.
 */
$('body').on('click','#novaposhta-form button',function(e){
    e.preventDefault();
    $('#cargocost-citysender').prop('disabled',false);
    var form = $('#novaposhta-form');
    var data = form.serialize();
    var action = form.attr('action');
    sendAjaxPC(data,action,'json');
    $('#cargocost-citysender').prop('disabled',true);
});

$("body").on('click',"input[name=\"Order[sposob_dostavki]\"]",function(e){
    var $this = $(this);
    var label = $this.parent('label');
    var text = label.text();
    if (text.toLowerCase().indexOf("новая почта") !== -1){
        $('div.novaposhta').show("slow");
    } else {
        $('div.novaposhta').hide("slow");
        $('label#ldeliveryCostLabel').text("уточняйте");
        setTotalOrder();
    }

});

function sendAjaxPC(data,action,dataType){
    $.ajax({
        type: "POST",
        url: action,
        data: data,
        success: function(data){
            updateNPData(data);
        },
        dataType: dataType

    });
}/**/

function updateNPData(data){

    $('div.np-cost > span.assessedCost').text(data.AssessedCost + " грн");
    $('div.np-cost > span.cost').text(data.Cost + " грн");
    $('label#deliveryCostLabel').text(data.Cost + " грн");
    setTotalOrder();
    $('div.np-cost').show("slow");
    jQuery('html, body').animate({
        scrollTop: jQuery('div.np-title').offset().top
    },2000);
}/**/

function updateForm(cost,weight){
    var costItems = parseInt(cost.replace(/\s|[ГРН]/gu,""));
  //  var weight = weight.split(' ')[0]
    $('#cargocost-cost').val(costItems);
    $('#cargocost-weight').val(weight);
}/**/

function setTotalOrder(){
    var to = $('#totalOrderH4');
    var itemsCost = $('#totalOrderLabel').text().replace(/\s|[ГРН]/gu,"");
    if ($('#deliveryCostLabel').text().indexOf("уточняйте") == -1) {
        var deliveryCost = $('#deliveryCostLabel').text().replace(/\s|[ГРН]|[грн]/gu,"");
    } else {
        var deliveryCost = 0;
    }
    $('#order-delivery_cost').val(deliveryCost);

    to.text((parseInt(itemsCost) + parseInt(deliveryCost)) + " ГРН" );
}/**/

