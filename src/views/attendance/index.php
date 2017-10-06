
<?php function section_head($data)
{
?>
    <style type="text/css">
        .table-responsive {
            overflow-x: auto;
        }
    </style>
    <?php }?>
    <?php function section_scripts($data)
{
?>
    <script type="text/javascript">
        function fnClearForm() {
			$('#ID').val('');
$('#EmployeeID').val('');
$('#PunchForLocation').val('');
$('#PunchForDate').val('');
$('#PuchedOn').val('');
$('#Lat').val('');
$('#Lng').val('');
$('#ImeiNumber').val('');
$('#Approved').val('');
$('#ApprovedBy').val('');
$('#ApprovedOn').val('');

        }
        function fnSetupForm(obj) {
			$('#ID').val(obj.ID);
$('#EmployeeID').val(obj.EmployeeID);
$('#PunchForLocation').val(obj.PunchForLocation);
$('#PunchForDate').val(obj.PunchForDate);
$('#PuchedOn').val(obj.PuchedOn);
$('#Lat').val(obj.Lat);
$('#Lng').val(obj.Lng);
$('#ImeiNumber').val(obj.ImeiNumber);
$('#Approved').val(obj.Approved);
$('#ApprovedBy').val(obj.ApprovedBy);
$('#ApprovedOn').val(obj.ApprovedOn);

        }
        function fnSubmit() {
            $("#frm-add-edit-form").validate();
            if ($("#frm-add-edit-form").valid()) {

                ToggleOverlayLoading(true);
                $.ajax({
                    url: $("#frm-add-edit-form").attr("action"),
                    type: "POST",
                    data:$("#frm-add-edit-form").serialize(),
                    success: function (response) {
                        if (response.Success) {
                            ToggleOverlayLoading(false);
                            alert(response.Message);
                            location.href = "<?php HREF("/attendance/index");?>";
                        }
                    },
                    error: function (a, b, c) {
                        ToggleOverlayLoading(false);
                        alert(JSON.parse(a.responseText).Message);
                    }
                });
            }
        }

    
    </script>
  

<?php 
  $cols=array();  
  $cols[0]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ID','ColumnName'=>'ID','Sortable'=>'true','Visible'=>'true');
$cols[1]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'EmployeeID','ColumnName'=>'EmployeeID','Sortable'=>'true','Visible'=>'true');
$cols[2]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'PunchForLocation','ColumnName'=>'PunchForLocation','Sortable'=>'true','Visible'=>'true');
$cols[3]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'PunchForDate','ColumnName'=>'PunchForDate','Sortable'=>'true','Visible'=>'true');
$cols[4]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'PuchedOn','ColumnName'=>'PuchedOn','Sortable'=>'true','Visible'=>'true');
$cols[5]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'Lat','ColumnName'=>'Lat','Sortable'=>'true','Visible'=>'true');
$cols[6]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'Lng','ColumnName'=>'Lng','Sortable'=>'true','Visible'=>'true');
$cols[7]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ImeiNumber','ColumnName'=>'ImeiNumber','Sortable'=>'true','Visible'=>'true');
$cols[8]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'Approved','ColumnName'=>'Approved','Sortable'=>'true','Visible'=>'true');
$cols[9]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ApprovedBy','ColumnName'=>'ApprovedBy','Sortable'=>'true','Visible'=>'true');
$cols[10]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ApprovedOn','ColumnName'=>'ApprovedOn','Sortable'=>'true','Visible'=>'true');

  $model=new stdClass();
  $model->bSort=true;
  $model->ColumnDefinitions=$cols;
  $model->ShowActionColumn=true;
  $model->ShowEditButton=true;
  $model->ShowDeleteButton=true;
  $model->MakeDateTable=true;
  $model->ControllerName="attendance";
  $model->PK_COL="ID";
 
  renderCrudGrid($model);
}?>

    <?php function section_body($data)
{
?>    
<section class="content-header">
    <h1>
        attendances
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="input-group margin" style="margin-left:0px;">
                        <input id="txt-search-query" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button id="btn-refresh" class="btn btn-primary btn-flat" type="button"><i class="fa fa-refresh"></i></button>
                                <button id="btn-search" class="btn btn-primary btn-flat" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;FIND</button>
                            </span>
                            <input type="button" id="btn-open-modal" data-toggle="modal" data-target="#add-new-modal" value="" style="display:none;" />
                            <button id="btn-add-new" class="btn btn-primary btn-flat" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW attendance</button>
                        <input type="button" id="btn-open-modal" data-toggle="modal" data-target="#add-new-modal" value="" style="display:none;" />
                    </div>
                    <table id="example" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
<th>EmployeeID</th>
<th>PunchForLocation</th>
<th>PunchForDate</th>
<th>PuchedOn</th>
<th>Lat</th>
<th>Lng</th>
<th>ImeiNumber</th>
<th>Approved</th>
<th>ApprovedBy</th>
<th>ApprovedOn</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="add-new-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:800px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="model-title-h4" add-title="Add New attendance" edit-title="Modify Selected attendance"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New attendance</h4>
            </div>
            <form action="#" method="post" class="box" id="frm-add-edit-form">
				<input type='hidden' name='ID' id='ID' value='' />
<input type='hidden' name='EmployeeID' id='EmployeeID' value='' />
<input type='hidden' name='PunchForLocation' id='PunchForLocation' value='' />
<input type='hidden' name='PunchForDate' id='PunchForDate' value='' />
<input type='hidden' name='PuchedOn' id='PuchedOn' value='' />
<input type='hidden' name='Lat' id='Lat' value='' />
<input type='hidden' name='Lng' id='Lng' value='' />
<input type='hidden' name='ImeiNumber' id='ImeiNumber' value='' />
<input type='hidden' name='Approved' id='Approved' value='' />
<input type='hidden' name='ApprovedBy' id='ApprovedBy' value='' />
<input type='hidden' name='ApprovedOn' id='ApprovedOn' value='' />

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text"/>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat fa fa-close" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Close</button>
                    <button type="button" class="btn btn-primary btn-flat fa fa-save" onclick="fnSubmit();">&nbsp;&nbsp;&nbsp;Save changes</button>
                </div>
                <div class="overlay"></div>
                <div class="loading-img"></div>
            </form>
        </div>
    </div>
</div>
<?php }?>