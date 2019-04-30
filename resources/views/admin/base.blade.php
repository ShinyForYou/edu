
<!DOCTYPE html>
<html lang="en">
{{--包含head里引入的静态资源--}}
@include('admin.baseHead')
<body>
{{-- 包含页头 --}}
{{--@include('article.common.header')--}}

{{-- 继承后插入的内容 --}}
@yield('content')

{{-- 包含页脚 --}}
@include('admin.baseJs')

{{--编写js代码的占位符--}}
@yield('script')
</body>
</html>

