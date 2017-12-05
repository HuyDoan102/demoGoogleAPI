<div id="deleteGarbage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want delete?</h4>
            </div>
            <div class="modal-footer">
                <form action method="POST" class="formdelete">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <button class="btn btn-default" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>

    </div>
</div>



<script>
    jQuery(document).ready(function($){
        $('.delete').on('click',function(event){
            event.preventDefault(); // giúp không cần phải tải một url mới
            data = $(this).attr('url');
            $('.formdelete').attr('action', data);
        });
    });
</script>
