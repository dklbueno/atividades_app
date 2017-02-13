jQuery(document).ready(function(){
    jQuery("#listagem").DataTable({
        "language": {
            "url" : 'js/datatable_pt-br_lang.json'
        }
    });
});

function fncAtividadesSubmeter(form){
    jQuery("div.loading").show("fast");
    jQuery.ajax({
        method : "POST",
        data : jQuery(form).serialize(),
        url : "pages/atividadesController.php"
    }).done(function(data){
        if(data.status == "success"){
            toastr.success(data.message, 'Sucesso');
        }else{
            toastr.warning(data.message, 'Alerta');
        }
        jQuery("div.loading").hide("fast");
    }).fail(function(jqXHR, textStatus){
        toastr.error('Erro ao tentar fazer requisição ajax: ' + textStatus);
        jQuery("div.loading").hide("fast");
    });
    
return false;
}