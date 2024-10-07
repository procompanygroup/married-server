<div class="box box-warning direct-chat direct-chat-warning" style="display: none;"> <!-- Hidden by default -->
    <div class="box-header with-border">


        <div class="box-tools box-tools-l">
            

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <h3 class="box-title " id="chatmember-name"></h3>
    </div>

    <div class="box-body">
        <div class="direct-chat-messages" id="chat-content">
         </div>
    </div>

    <div class="box-footer">
        <form action="{{ url('chat/send') }}" name="form-send" method="post" autocomplete="off">
            @csrf
            <div class="input-group">
                <input type="text" name="content" placeholder="اكتب رسالة ..." class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="chat-send-btn" class="btn btn-primary btn-flat">ارسال</button>
                </span>
            </div>
        </form>
    </div>

</div>
<script>
    var showmsgsurl = '{{ url('chat/show') }}';
    var showlasturl = '{{ url('chat/showlast') }}';
</script>
