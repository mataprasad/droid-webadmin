<?php function renderCrudGrid($___Model) {?>
<script type="text/javascript">
    $(document).ready(function () {
        function fnInitTable(query) {
            var url = "<?php HREF("/".$___Model->ControllerName."/list"); ?>";//@Url.Action("list",Model.ControllerName)"+"@Model.UrlPart";
            if (query != null) {
                if(url.indexOf("?")>-1){
                    url += "&query=" + query;
                }else{
                    url += "?query=" + query;
                }
            }
            $('#example').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": <?php echo $___Model->bSort;?>,
                "bInfo": true,
                "bAutoWidth": false,
                "iDisplayLength": 8,
                "sAjaxSource": url,
                "sServerMethod": "GET",
                "aAjaxSourceLoadError": function (xhr, error, thrown) {
                    alert(xhr.responseText);
                },
                "aoColumns": [
                    <?php for ($i = 0; $i < count($___Model->ColumnDefinitions); $i++)
                    {
                    $item = $___Model->ColumnDefinitions[$i];
                        if ($i != 0)
                        { ?>
                            ,
                       <?php }  {?>
                        
                                        {
                                            "sTitle": "<?php echo $item->ColumnHeader?>",
                                            "aaSort": [ "desc" ],
                                            "mData": "<?php echo $item->ColumnName?>",
                                            "bSortable": <?php echo $item->Sortable?>,
                                            "bVisible": <?php echo $item->Visible?>
                                            }
                        
                                    <?php } ?>
                               <?php } if($___Model->ShowActionColumn){
                    ?>
                        
                        ,{
                            "bSortable": false,
                            "sTitle": "Action",
                            "mData": null,
                            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                var actionUrl="";
                                <?php if ($___Model->ShowEditButton)
                                    { ?>
                                    
                                actionUrl += ('<a class="grid-action-edit" onclick="fnGridActionEdit(this);" href="javascript:void(0);" data-key="' + <?php echo "oData.".$___Model->PK_COL?> + '"><i title="Edit" class="fa fa-edit"></i></a>');
                                
                            <?php }  if ($___Model->ShowDeleteButton)
                                    {?>
                                    
                                actionUrl += ('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="grid-action-delete" onclick="fnGridActionDelete(this);" href="javascript:void(0);" data-key="' + <?php echo "oData.".$___Model->PK_COL?> + '"><i title="Delete" class="fa fa-trash-o text-danger"></i></a>');
                                
                           <?php } ?>
                                $(nTd).html(actionUrl);
                            }
                        <?php } ?>
                        
                    }
                ]
            });
        }
        <?php if($___Model->MakeDateTable)
        {?>
            fnInitTable('');
        <?php } ?>
        $('#btn-search').click(function () {
            if ($("#txt-search-query").val().trim() != "") {
                $("#example").empty();
                $('#example').dataTable().fnDestroy();
                <?php if($___Model->MakeDateTable)
                {?>
                    fnInitTable($('#txt-search-query').val());
                <?php } ?>
            }
        })
        $("#btn-refresh").click(function () {
            //if ($("#txt-search-query").val().trim() != "") {
            $("#example").empty();
            $('#example').dataTable().fnDestroy();
            $("#txt-search-query").val("");
            <?php if($___Model->MakeDateTable)
                {?>
                    fnInitTable('');
               <?php } ?>
            //}
        });
        $("#txt-search-query").keyup(function (event) {
            if (event.which == 13) {
                $('#btn-search').click();
            }
            if (event.which == 27) {
                $("#btn-refresh").click();
            }
        });
        $('#btn-add-new').click(function () {
            fnClearValidation();
            fnClearForm();
            //$("#frm-add-edit-form").attr("action", "@Url.Action("add",Model.ControllerName)");
            $("#frm-add-edit-form").attr("action", "<?php HREF("/".$___Model->ControllerName."/add"); ?>");
            ToggleOverlayLoading(false);
            $("#model-title-h4").html('<i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;' + $("#model-title-h4").attr("add-title"));
            $("#btn-open-modal").attr("obj-id","");
            $("#btn-open-modal").trigger("click");
           
        });
        ToggleOverlayLoading(false);
    });
    function fnGridActionEdit(obj) {
        fnClearValidation();
        ToggleOverlayLoading(true);
        $("#model-title-h4").html('<i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;' + $("#model-title-h4").attr("edit-title"));
        $("#btn-open-modal").attr("obj-id",$(obj).attr("data-key"));
        $("#btn-open-modal").trigger("click");
        $.ajax({
            //url: "@Url.Action("edit",Model.ControllerName)?id=" + $(obj).attr("data-key"),
            url: "<?php HREF("/".$___Model->ControllerName."/edit"); ?>?id=" + $(obj).attr("data-key"),
            dataType: "json",
            type: "GET",
            contentType: "application/json",
            success: function (response) {
                fnClearForm();
                fnSetupForm(response);
                //$("#frm-add-edit-form").attr("action", "@Url.Action("edit",Model.ControllerName)");
                $("#frm-add-edit-form").attr("action", "<?php HREF("/".$___Model->ControllerName."/edit"); ?>");
                ToggleOverlayLoading(false);
            },
            error: function (a, b, c) { }
        });
    }
    function fnGridActionDelete(obj) {
        var decision = confirm("Are you sure to delete this item?");
        if (decision) {
            //window.location.href = "@Url.Action("delete",Model.ControllerName)?id=" + $(obj).attr("data-key")
            window.location.href = "<?php HREF("/".$___Model->ControllerName."/delete"); ?>?id=" + $(obj).attr("data-key")
        }
    }
    function ToggleOverlayLoading(blocked) {
        if (blocked) {
            $("#frm-add-edit-form .overlay,#frm-add-edit-form .loading-img").show();
        } else {
            $("#frm-add-edit-form .overlay,#frm-add-edit-form .loading-img").hide();
        }
    }
    function fnClearValidation() {
        $(":input[data-val='true']").removeClass("input-validation-error");
        $(".field-validation-error").empty();
    }
</script>

<?php } ?>