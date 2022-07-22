<div class="modal fade"  id="filemodal"  tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl" >
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModal2Label">Upload CSV File</h4>
                                                
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/addCSV')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h5>Tips: <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1. File extension should be CSV. <br><br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2. Follow the following format of CSV file: <br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;a. 1st column should be the header.<br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;b. second and below column will be the data.<br> <br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3.First letter should always be upper case as follow:<br><br>
                                                                <img src="{{ asset('asset/image/sampleData.png') }}" style="width:100%;"> 
                                                            <br><br>
                                                                                             
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4. once you submited the data you will not be able to delete or undo it.<br><br>
                                                </h5>
                                                
                                                <div class="input-group">
                                                    <input type="file" name="file" id="file" class="form-control" required>
                                                </div>
                                                <br>
                                                <br>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </form>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">Cancel</span>
                                                </button>   
                                            </div>

                                            
                                                <br>
                                                <br>
                                    </div>
                                </div>
                </div>