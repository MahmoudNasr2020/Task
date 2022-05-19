<!DOCTYPE html>
<html lang="en" dir="rtl" >
<head>
    @include('Task.layouts.frontend.style')
</head>
<body onload="startTime()" class="rtl">
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('Task.layouts.parts.header')
    <div class="page-body-wrapper">
        @include('Task.layouts.parts.sidebar')
        @include('Task.layouts.parts.content')
        @include('Task.layouts.parts.footer')
    </div>
</div>
@include('Task.layouts.frontend.script')
</body>
</html>
