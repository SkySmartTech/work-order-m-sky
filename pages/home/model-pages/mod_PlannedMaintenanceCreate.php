  <!-- Navbar -->
<div class="modal" id="id_ModPlanMntCre">
    <div class="modal-dialog">      
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-center" style="width: 100%">Urgent work order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="funModPlanMntCre_Close()">
                    <span aria-hidden="true" class="text-white close-icon"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                
                <h6 class="modal-title text-center w-100" id="userDepartmentTitle"></h6>

                <div class="row p-1 justify-content-center">
                    <div class="col-md-6">                   
                        <label class="w-100 text-center" style="font-weight: bolder">Select Department</label>    
                        <select class="form-control select2" onchange="funModCategory()" id="id_ModDepartment" style="width: 100%;">
                            <option selected="none"></option>                            
                        </select>
                    </div>
                </div>

                <div class="row p-1">
                    
                    <div class="col-md-6">                   
                        <label style="font-weight: bolder">Work order Category</label>    
                        <select class="form-control select2" onchange="funModSubCategory()" id="id_Modcategory" style="width: 100%;">
                            <option selected="none"></option>                            
                        </select>
                    </div>
                    <div class="col-md-6">                      
                         <label style="font-weight: bolder">Work order Sub Category</label>    
                        <select class="form-control select2" onchange="funModPlanMntCre_MachineNoFilter()" id="id_ModSubCategory" style="width: 100%; background-color: blue">
                            <option selected="none"></option>                            
                        </select>               
                    </div>
                </div> 
                
                <br/>
                <div class="row p-1">   
                    <div class="col-md-6">
                        <input type="datetime-local" id="id_ModPlanMntCre_dtmDateTime" class="form-control" name="startDate" required/>                           
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="id_ModPlanMntCre_inpNote" class="form-control" name="Note" placeholder="Note"> 
                    </div>
                    
                </div>        		
                 
            </div>
            <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-primary" onclick="funModPlanMntCre_Update()" >Update</button>
                <button type="submit" class="btn btn-primary" onclick="funModPlanMntCre_Cancel()" >Cancel</button>
            </div>
        </div>
    </div>
</div>