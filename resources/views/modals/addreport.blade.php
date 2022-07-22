<div class="modal fade" id="addmodal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Add Reports</h3>
                                    <a data-toggle="modal" data-target="#filemodal"><span class="hover"><b> Upload CSV Files </b></span> <img src="{{ asset('asset/image/upload.png') }}" class="logos"> </a>
                                    
                            </div>
                            <div class="modal-body" >
                                <form  action="{{ route('addReport') }}"method="POST">
                                    @csrf
                                            <!-- name -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="title" style="width:170px;">Name</span>
                                                </div>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                        
                                            </div>
                                            <br>
                                            <!-- title/short description -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="title" style="width:170px;">TItle</span>
                                                </div>
                                                <input type="text" name="title" id="title" class="form-control" required>
                                        
                                            </div>
                                            <br>
                                            <!-- priority level -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">Priority level</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01"  name="pri_level" id="pri_level">
                                                    <option value="Outage">Outage</option>
                                                    <option value="Major Impact">Major Impact</option>
                                                    <option value="Minor Impact">Minor Impact</option>
                                                    <option value="Low Impact or Request">Low Impact or Request</option>
                                                </select>
                                            </div>
                                            <br>

                                            <!-- System -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">System</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01" name="system" id="system">
                                                    <option value="Citrix">Citrix</option>
                                                    <option value="Data Center Server">Data Center Server</option>
                                                    <option value="eClipse">eClipse </option>
                                                    <option value="MITS Server">MITS Server </option>
                                                    <option value="Subic NAS">Subic NAS </option>
                                                    <option value="TSM Mobile">TSM Mobile </option>
                                                    <option value="TSM Office">TSM Office</option>
                                                </select>
                                            </div>

                                            <br>

                                            <!-- Personel -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"style="width:170px;">Assigned Personel</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01" name="personel" id="personel">
                                                    <option value="Chris">Chris</option>
                                                    <option value="Jo Anne">Jo Anne</option>
                                                    <option value="Paul">Paul</option>
                                                    <option value="Valter">Valter</option>
                                                </select>
                                            </div>
                                            <br>
                                            
                                            <!-- long description -->
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><B>Description</B></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"   name="desc" id="desc" required></textarea>
                                            </div>
                                            <br>
                                            <!-- Comment -->
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><B>Comment</B></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="comment" id="comment"></textarea>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save Report</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                            </form>
                        </div>
                    </div>
                </div>