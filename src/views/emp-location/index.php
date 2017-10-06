
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
$('#LocationID').val('');
$('#Lat').val('');
$('#Lng').val('');
$('#ForDate').val('');
$('#ForTime').val('');
$('#SNo').val('');
$('#CreatedBy').val('');
$('#CreatedOn').val('');
$('#ModifiedBy').val('');
$('#ModifiedOn').val('');

        }
        function fnSetupForm(obj) {
			$('#ID').val(obj.ID);
$('#EmployeeID').val(obj.EmployeeID);
$('#LocationID').val(obj.LocationID);
$('#Lat').val(obj.Lat);
$('#Lng').val(obj.Lng);
$('#ForDate').val(obj.ForDate);
$('#ForTime').val(obj.ForTime);
$('#SNo').val(obj.SNo);
$('#CreatedBy').val(obj.CreatedBy);
$('#CreatedOn').val(obj.CreatedOn);
$('#ModifiedBy').val(obj.ModifiedBy);
$('#ModifiedOn').val(obj.ModifiedOn);

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
                            location.href = "<?php HREF("/emp-location/index");?>";
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
$cols[2]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'LocationID','ColumnName'=>'LocationID','Sortable'=>'true','Visible'=>'true');
$cols[3]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'Lat','ColumnName'=>'Lat','Sortable'=>'true','Visible'=>'true');
$cols[4]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'Lng','ColumnName'=>'Lng','Sortable'=>'true','Visible'=>'true');
$cols[5]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ForDate','ColumnName'=>'ForDate','Sortable'=>'true','Visible'=>'true');
$cols[6]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ForTime','ColumnName'=>'ForTime','Sortable'=>'true','Visible'=>'true');
$cols[7]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'SNo','ColumnName'=>'SNo','Sortable'=>'true','Visible'=>'true');
$cols[8]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'CreatedBy','ColumnName'=>'CreatedBy','Sortable'=>'true','Visible'=>'true');
$cols[9]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'CreatedOn','ColumnName'=>'CreatedOn','Sortable'=>'true','Visible'=>'true');
$cols[10]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ModifiedBy','ColumnName'=>'ModifiedBy','Sortable'=>'true','Visible'=>'true');
$cols[11]=(object)array('ColumnType'=>'Text','ColumnHeader'=>'ModifiedOn','ColumnName'=>'ModifiedOn','Sortable'=>'true','Visible'=>'true');

  $model=new stdClass();
  $model->bSort=true;
  $model->ColumnDefinitions=$cols;
  $model->ShowActionColumn=true;
  $model->ShowEditButton=true;
  $model->ShowDeleteButton=true;
  $model->MakeDateTable=true;
  $model->ControllerName="emp-location";
  $model->PK_COL="ID";
 
  renderCrudGrid($model);
}?>

    <?php function section_body($data)
{
?>    
<section class="content-header">
    <h1>
        emp-locations
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
                            <button id="btn-add-new" class="btn btn-primary btn-flat" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW emp-location</button>
                        <input type="button" id="btn-open-modal" data-toggle="modal" data-target="#add-new-modal" value="" style="display:none;" />
                    </div>
                    <table id="example" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
<th>EmployeeID</th>
<th>LocationID</th>
<th>Lat</th>
<th>Lng</th>
<th>ForDate</th>
<th>ForTime</th>
<th>SNo</th>
<th>CreatedBy</th>
<th>CreatedOn</th>
<th>ModifiedBy</th>
<th>ModifiedOn</th>

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
                <h4 class="modal-title" id="model-title-h4" add-title="Add New emp-location" edit-title="Modify Selected emp-location"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New emp-location</h4>
            </div>
            <form action="#" method="post" class="box" id="frm-add-edit-form">
				<input type='hidden' name='ID' id='ID' value='' />
<input type='hidden' name='EmployeeID' id='EmployeeID' value='' />
<input type='hidden' name='LocationID' id='LocationID' value='' />
<input type='hidden' name='Lat' id='Lat' value='' />
<input type='hidden' name='Lng' id='Lng' value='' />
<input type='hidden' name='ForDate' id='ForDate' value='' />
<input type='hidden' name='ForTime' id='ForTime' value='' />
<input type='hidden' name='SNo' id='SNo' value='' />
<input type='hidden' name='CreatedBy' id='CreatedBy' value='' />
<input type='hidden' name='CreatedOn' id='CreatedOn' value='' />
<input type='hidden' name='ModifiedBy' id='ModifiedBy' value='' />
<input type='hidden' name='ModifiedOn' id='ModifiedOn' value='' />

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