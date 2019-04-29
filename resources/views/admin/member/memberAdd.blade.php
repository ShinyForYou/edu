@extends('admin.base')
@section('content')
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="sex" type="radio" id="sex-1" checked>
                    <label for="sex-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="sex-2" name="sex">
                    <label for="sex-2">女</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="sex-3" name="sex">
                    <label for="sex-3">保密</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" id="email">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">附件：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
				<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" multiple name="file-2" class="input-file">
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所在城市：</label>
            <div class="formControls col-xs-8 col-sm-9" ;>
                <span class="select-box" style="width:120px">
				<select class="select" size="1" name="country" id="country">
					<option value="0" selected disabled>国家</option>
	                @foreach($country as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
				</select>
				</span>
                <span class="select-box" style="width:120px">
				<select class="select" size="1" name="province" id="province">
					<option value="" selected >省份/州</option>

				</select>
				</span>
                <span class="select-box" style="width:120px">
				<select class="select" size="1" name="city" id="city">
					<option value="" selected >城市</option>
				</select>
				</span>
                <span class="select-box" style="width:120px">
				<select class="select" size="1" name="county" id="county">
					<option value="" selected>县区</option>
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="beizhu" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

    $(function(){
        // 四级联动绑定change事件 选择国家后列出省份
        $('#country').change(function () {
            // 获取当前国家ID
            var id = $(this).val();
            $.get(
                "{{ url('/admin/member/getAreaById') }}",
                {id: id},
                function(data){
                    // 获取返回的值，插入到select中 jquery循环操作$.each(obj,function(index,el){循环体})
                    var str = '';
                    $.each(data, function (index,el) {
                        str += "<option value='" + el.id + "'>" + el.name + "</option>";
                    });
                    // alert("Data Loaded: " + data);
                    // 将数据放到option之后
                    $("#province").find('option:gt(0)').remove();
                    $("#city").find('option:gt(0)').remove();
                    $("#county").find('option:gt(0)').remove();
                    $("#province").append(str);
                },
                "json"
            );
        });
        $('#province').change(function () {
            // 获取当前国家ID
            var id = $(this).val();
            $.get(
                "{{ url('/admin/member/getAreaById') }}",
                {id: id},
                function(data){
                    // 获取返回的值，插入到select中 jquery循环操作$.each(obj,function(index,el){循环体})
                    var str = '';
                    $.each(data, function (index,el) {
                        str += "<option value='" + el.id + "'>" + el.name + "</option>";
                    });
                    // alert("Data Loaded: " + data);
                    // 将数据放到option之后
                    // $("#province").find('option:gt(0)').remove();
                    $("#city").find('option:gt(0)').remove();
                    $("#county").find('option:gt(0)').remove();
                    $("#city").append(str);
                },
                "json"
            );
        });
        $('#city').change(function () {
            // 获取当前国家ID
            var id = $(this).val();
            $.get(
                "{{ url('/admin/member/getAreaById') }}",
                {id: id},
                function(data){
                    // 获取返回的值，插入到select中 jquery循环操作$.each(obj,function(index,el){循环体})
                    var str = '';
                    $.each(data, function (index,el) {
                        str += "<option value='" + el.id + "'>" + el.name + "</option>";
                    });
                    // alert("Data Loaded: " + data);
                    // 将数据放到option之后
                    // $("#province").find('option:gt(0)').remove();
                    $("#county").find('option:gt(0)').remove();
                    $("#county").append(str);
                },
                "json"
            );
        });

        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:20
                },
                sex:{
                    required:true,
                },
                mobile:{
                    required:true,
                    isMobile:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                // uploadfile:{
                //     required:true,
                // },

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "" , // 自己提交给自己可以不写url
                    success: function(data){
                        if (data == '1'){
                            layer.msg('添加成功!',{icon:1,time:2000}, function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.$('.btn-refresh').click();
                                parent.layer.close(index);
                            });
                        } else {
                            layer.msg('添加失败!',{icon:2,time:2000});
                        }

                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:2,time:1000}, function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$('.btn-refresh').click();
                            parent.layer.close(index);
                        });

                    }
                });
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
@endsection