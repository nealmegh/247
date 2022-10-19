<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">End Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form name="myForm" method="post" action="#">
                        <div class="modal-body" style="    padding-bottom: 5%;">

                                @csrf
                                    <div class="form-group">
                                        <label for="collection_by_driver" class="control-label col-md-3 col-sm-3 col-xs-12">Collection By Driver</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" class="form-control" id="collection_by_driver" value=0 name="collection_by_driver" placeholder="Enter Amount">
                                        </div>
                                    </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
            </form>

        </div>
    </div>
</div>

