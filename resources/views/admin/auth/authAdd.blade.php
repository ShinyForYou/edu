@extends('admin.base')
@section('content')
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <!-- csrf隐藏域-->
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="权限" id="authName" name="auth_name">
            </div>
        </div>
        <div class="row cl" id="hidden_controller">
            <label class="form-label col-xs-4 col-sm-3">控制器名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  value="" placeholder="控制器" id="controller" name="controller">
            </div>
        </div>
        <div class="row cl" id="hidden_action">
            <label class="form-label col-xs-4 col-sm-3">方法名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="方法" id="action" name="action">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级权限：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="pid" size="1" id="my_select">
				<option value="0">作为顶级权限</option>
                @foreach($parents as $value)
                    <option value="{{$value->id}}">{{$value->auth_name}}</option>
                @endforeach
			</select>
			</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否显示：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="is_nav" type="radio" id="show-1" value="1" checked>
                    <label for="is_nav-1">是</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="show-2" name="is_nav" value="2">
                    <label for="is_nav--2">否</label>
                </div>
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
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){

        // 初始化隐藏控制器名和方法名 非必要选项
        // $('#hidden_controller,#hidden_action').css('display', 'none');
        $('#hidden_controller,#hidden_action').hide();

        // 下拉列表绑定change事件
        $('#my_select').change(function () {
            // 获取当前选中的值
            var _val = $(this).val();
            // 重置表单下的值
            $('#hidden_controller,#hidden_action').val('');
            if (_val > 0){
                // 显示
                $('#hidden_controller,#hidden_action').show(500);
            } else {
                // 隐藏
                $('#hidden_controller,#hidden_action').hide(500);
            }
        });

        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            // rules:{
            //     authName:{
            //         required:true,
            //         minlength:4,
            //         maxlength:16
            //     },
            //     controller:{
            //         required:true,
            //     },
            //     password2:{
            //         required:true,
            //         equalTo: "#password"
            //     },
            //     sex:{
            //         required:true,
            //     },
            //     phone:{
            //         required:true,
            //         isPhone:true,
            //     },
            //     email:{
            //         required:true,
            //         email:true,
            //     },
            //     adminRole:{
            //         required:true,
            //     },
            // },
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
@endsection
<!--/请在上方写此页面业务相关的脚本-->
{{--</body>--}}
{{--</html>--}}