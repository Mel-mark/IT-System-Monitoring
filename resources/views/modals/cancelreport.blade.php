<div class="modal fade"  id="myModal3"  tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" >
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModal2Label">Reason of Report Cancelation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/cancel')}}" method="POST">
                                                @csrf
                                                <input type="text" id="rep_id" name="rep_id" hidden>
                                                <textarea name="reason" id="reason" cols="100" rows="10" ></textarea>
                                            
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                </div>