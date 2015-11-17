@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css/norm.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>
@stop
@section('norm')
    data-main="1"
@stop
@section('content')
        <div class="norm shadow">
            <h3 class="norm_h">我来提名</h3>            
            @if(!$errors->info->isEmpty())
                {{$errors->info->all()[0]}}
            @endif
            <div class="container">
            	<!--错误-->
                <span class="norm_err">
                	@if(!Auth::check())
                		请先登录后提名
            		@endif
                </span>
                <form id="norm_form" action="{{route('nominate')}}" method="post">
                    <h5 class="norm_title">被提名人信息</h5>
                    <div class="norm_team">
                        <label for="norm_name">姓<span class="lab_ju">名</span></label>
                        <input id="norm_name" name="norm_name" type="text" value="被提名人姓名"/>
                    </div>
                    <div class="norm_team">
                        <label for="norm_part">所在单位</label>
                        <input id="norm_part" name="norm_part" type="text" value="被提名人所在单位"/>
                    </div>
                    <div class="norm_team norm_eara">
                        <label for="norm_rea">提名理由</label>
                        <textarea name="norm_rea" id="norm_rea" cols="58" rows="7">请输入提名推荐理由</textarea>
                    </div>
                    <h5 class="norm_title">提名人信息</h5>
                    <div class="norm_team">
                        <label for="name">姓<span class="lab_ju">名</span></label>
                        <input id="name" name="name" type="text" value="提名人姓名"/>
                    </div>
                    <div class="norm_team">
                        <label for="part">所在单位</label>
                        <input id="part" name="part" type="text" value="提名人所在单位（班级或学院）"/>
                    </div>
                    {{csrf_field()}}
                    <input class="norm_sub" type="submit" value="提交"/>
                </form>
            </div>
            <!-- 提交成功 -->
            <div class="norm_suc">
                <h3 class="norm_h norm_suc_h">提交成功！</h3>
                <p class="norm_suc_p">您的提名已成功提交</p>
                <button class="norm_sub norm_suc_sub">确定</button>
            </div>    
        </div>

 @stop