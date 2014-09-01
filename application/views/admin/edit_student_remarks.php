<div class="row"><!-- begin row -->
    <h1 class="page-header">Edit student remarks</h1>
    <div class="col-md-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title">Edit student remarks</h4>
            </div>
            <div class="panel-body">
                <?php if (@$edit_message == "set") { ?>
                    <div class="alert alert-info fade in m-b-15">
                        <strong>Info!</strong>
                        Successfully updated the content
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                <?php } ?>


                <form id="default-tab-4-form" method="post" action="">
                    <div class="form-group">
                        <label class="col-md-3 control-label ui-sortable">Description</label>
                        <div class="col-md-9 ui-sortable">
                            <textarea class="form-control required" 
                                      name="sc_rem_description" id="sc_rem_description" placeholder="Textarea" 
                                      rows="5" title="Please enter the value" ><?=  $remarks->sc_rem_description;?></textarea>
                        </div>
                    </div><br/><br/><br/><br/>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                        <div class="col-md-6 col-sm-6 ui-sortable">
                            <button type="submit" name="submit" id="remarks_button"
                                    value="submit" class="btn btn-sm btn-success">Submit Button</button>
                        </div>   

                    </div>
                </form>   



            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->

