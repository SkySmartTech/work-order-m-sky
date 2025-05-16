  <!-- Navbar -->
<div class="modal" id="id_ModRedTagCre">
    <div class="modal-dialog">      
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-center" style="width: 100%">normal work order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="funModRedTagCre_Close()">
                    <span aria-hidden="true" class="text-white close-icon"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h6 class="modal-title text-center w-100" id="usernormalDepartmentTitle"></h6>
               
                
                
                 <div class="row p-1 justify-content-center">
                    <div class="col-md-6">                   
                        <label class="w-100 text-center" style="font-weight: bolder">Select Department</label>    
                        <select class="form-control select2" onchange="funModCategorynormal()" id="id_ModDepartmentnormal" style="width: 100%;">
                            <option selected="none"></option>                            
                        </select>
                    </div>
                </div>

                <div class="row p-1">
                    
                    <div class="col-md-6">                   
                        <label style="font-weight: bolder">Work order Category</label>    
                        <select class="form-control select2" onchange="funModSubCategorynormal()" id="id_Modcategorynormal" style="width: 100%;">
                            <option selected="none"></option>                            
                        </select>
                    </div>
                    <div class="col-md-6">                      
                         <label style="font-weight: bolder">Work order Sub Category</label>    
                        <select class="form-control select2" onchange="funModRedTagCre_Filter()" id="id_ModSubCategorynormal" style="width: 100%; background-color: blue">
                            <option selected="none"></option>                            
                        </select>               
                    </div>
                </div> 
                
                <br/>
                <div class="row p-1">   
                    <div class="col-md-6">
                        <input type="datetime-local" id="id_ModPlanMntCre_dtmDateTimenormal" class="form-control" name="startDate" required/>                           
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="id_ModPlanMntCre_inpNotenormal" class="form-control" name="Note" placeholder="Note"> 
                    </div>
                    
                </div>        		
                 
            </div>
            <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-primary" onclick="funModRedTagCre_Updatenormal()" >Update</button>
                <button type="submit" class="btn btn-primary" onclick="funModRedTagCre_Cancelnormal()" >Cancel</button>
            </div>
        </div>
    </div>
</div>