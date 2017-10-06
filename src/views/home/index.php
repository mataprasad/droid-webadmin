
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
            $('#Code').val('');
            $('#Title').val('');
            $('#Description').val('');
            $('#Address').val('');
            $('#State').val('');
            $('#City').val('');
            $('#IsActive').val('');
            $('#CreatedOn').val('');
            $('#CreatedBy').val('');
            $('#ModifiedOn').val('');
            $('#ModifiedBy').val('');

            $('#Title').attr("maxlength", '30');
            $('#Description').attr("maxlength", '300');
            $('#Address').attr("maxlength", '200');

        }
        function fnSetupForm(obj) {
            $('#ID').val(obj.ID);
            $('#Code').val(obj.Code);
            $('#Title').val(obj.Title);
            $('#Description').val(obj.Description);
            $('#Address').val(obj.Address);
            $('#State').val(obj.State);
            $('#City').val(obj.City);
            $('#IsActive').val(obj.IsActive);
            $('#CreatedOn').val(obj.CreatedOn);
            $('#CreatedBy').val(obj.CreatedBy);
            $('#ModifiedOn').val(obj.ModifiedOn);
            $('#ModifiedBy').val(obj.ModifiedBy);
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
                            location.href = "<?php HREF("/home/index");?>";
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
  $cols[0]=(object)array("ColumnType"=>"Text","ColumnHeader"=>"ENAME","ColumnName"=>"ENAME","Sortable"=>true,"Visible"=>true);
  $cols[1]=(object)array("ColumnType"=>"Text","ColumnHeader"=>"EMPNO","ColumnName"=>"EMPNO","Sortable"=>true,"Visible"=>true);
  $cols[2]=(object)array("ColumnType"=>"Text","ColumnHeader"=>"JOB","ColumnName"=>"JOB","Sortable"=>true,"Visible"=>true);
  $cols[3]=(object)array("ColumnType"=>"Text","ColumnHeader"=>"SAL","ColumnName"=>"SAL","Sortable"=>true,"Visible"=>true);
  $model=new stdClass();
  $model->bSort=true;
  $model->ColumnDefinitions=$cols;
  $model->ShowActionColumn=true;
  $model->ShowEditButton=true;
  $model->ShowDeleteButton=true;
  $model->MakeDateTable=true;
  $model->ControllerName="home";
  $model->PK_COL="EMPNO";
 
  renderCrudGrid($model);
}?>

    <?php function section_body($data)
{
?>    
<section class="content-header">
    <h1>
        Company Details
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
                            <button id="btn-add-new" class="btn btn-primary btn-flat" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW Company</button>
                        <input type="button" id="btn-open-modal" data-toggle="modal" data-target="#add-new-modal" value="" style="display:none;" />
                    </div>
                    <table id="example" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ENAME</th>
                                <th>EMPNO</th>
                                <th>JOB</th>
                                <th>SAL</th>
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
                <h4 class="modal-title" id="model-title-h4" add-title="Add New Company" edit-title="Modify Selected Company"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Company</h4>
            </div>
            <form action="#" method="post" class="box" id="frm-add-edit-form">
                <input type="hidden" name="ID" id="ID" value="" />
                <input type="hidden" name="Code" id="Code" value="" />
                <input type="hidden" name="IsActive" id="IsActive" value="" />
                <input type="hidden" name="CreatedOn" id="CreatedOn" value="" />
                <input type="hidden" name="CreatedBy" id="CreatedBy" value="" />
                <input type="hidden" name="ModifiedOn" id="ModifiedOn" value="" />
                <input type="hidden" name="ModifiedBy" id="ModifiedBy" value="" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Title">Title @Html.ValidationMessageFor(P => P.Title)</label>
                                @Html.TextBoxFor(P => P.Title, new { @class = "form-control", placeholder = "Title" })
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