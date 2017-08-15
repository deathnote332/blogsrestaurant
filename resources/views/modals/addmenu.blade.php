<!-- Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form-add-menu" id="form-add-menu">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="menuImage" src="{{url('images/noimagefound.jpg')}}" alt="your image" />
                                <input type='file' class="file_class" id="pic_menu"/>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Example label</label>
                                            <input type="text" class="form-control" id="name1" name="name1" placeholder="Example input" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Example label</label>
                                            <select class="form-control" id="name2" name="name2" required="">
                                                <option value="0">Not Available</option>
                                                <option value="1">Available</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Example label</label>
                                            <input type="text" class="form-control" id="name3" name="name3"  placeholder="Example input" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                <button type="button" class="btn btn-primary" id="add-menu">Save changes</button>
            </div>
        </div>
    </div>
</div>

