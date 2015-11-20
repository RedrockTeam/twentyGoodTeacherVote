/**
 * Created by zxy on 2015/11/16.
 */
;(function($){

    $(document).ready(function(){
        //禁用已投票表单
        $('.vote_form').each(function(){
            var _$form = $(this);
            var voted = _$form.data('voted');
            if(voted){
                _$form.find('.vote_v').each(function(){
                    var _$check = $(this).next(),
                        _len = voted.length;
                    for(var i = 0;i<_len;i++){
                        if(_$check.val() == voted[i]){
//                            console.log(1);
                            $(this).addClass('vote_ved').html('&#xe660;');
                            break;
                        }
                    }

                });
                _$form.find('.vote_sub').addClass('vote_subed').val('已投票');
            }
        });
        //定位分页
        var _hash = document.location.hash;
        if(!_hash){
            return;
        }
        var _$nav = $("[href*="+_hash+"]").children();
//        console.log(_hash);
        _$nav.addClass('vote_nav_li_sel');
        switch_page(_$nav);


    });

    //vote切换分页
    function switch_page($ele){
//        $ele.on('click',function(){
            var _$seled = $('.vote_nav_li_sel');
            var _$select = $ele;
            var _hash = _$select.parent().attr('href');
            if(_$seled === _$select){
                return;
            }
            _$seled.removeClass('vote_nav_li_sel');
            _$select.addClass('vote_nav_li_sel');
            $('.vote_container').addClass('vote_container_hide');
            $(_hash).removeClass('vote_container_hide');
//        })
    }
    $('.vote_nav_li').on('click',function(){
        switch_page($(this));
    });
//    switch_page($('.vote_nav_li'));
    //投票部分
    var $vote = $('.vote_v');
    $vote.on('mouseenter',function(){
        if($(this).next().prop('checked')||$(this).parents('form').data('voted')){
            return false;
        }
        $(this).css({
            width:'30px',
            height:'30px',
            right:'0'
        });
    });
    $vote.on('mouseleave',function(){
        if($(this).next().prop('checked')||$(this).parents('form').data('voted')){
            return false;
        }
        $(this).css({
            width:'20px',
            height:'20px',
            right:'5px'
        });
    });
    $vote.on('click',function(){
        var _$vote = $(this),
            _$check = _$vote.next();
        if(_$vote.parents('form').data('voted')){
            return false;
        }
        if(_$check.prop('checked')){
            _$vote.css({
                borderWidth:'2px',
                right:'0px'
            }).html('');
            _$check.prop('checked',false);
        }
        else{
            _$vote.css({
                borderWidth:'0px',
                width:'30px',
                height:'30px',
                right:'2px'
            }).html('&#xe660;');
            _$check.prop('checked',true);
        }
    });
    $('.vote_form').on('submit',function(){
        var _$form = $(this),
            _checked = [],
            _obj = {},
            _type;
        if(_$form.data('voted')){
            return false;
        }
        _$form.find('.vote_v_in').each(function(){
            var _$in = $(this);
            if(_$in.prop('checked')){
                _checked.push(_$in.val());
            }
        });
        var _len = _checked.length;
        if(_len === 0){
            alert('请先选择候选人再投票');
            return false;
        }
        if(_len>6&&_len<11){
            _type = _$form.find('.vote_v_in').prop('name');
            if(_type === 'nor'){
                _obj.type = 1;
            }else{
                _obj.type = 2;
            }
            _obj.data = _checked;
            _obj._token = _token;
            _obj = JSON.stringify(_obj);
            console.log(typeof _obj,_obj);
            var _$sub = _$form.find('.vote_sub'),
                _vote_b = false;
            _$sub.addClass('vote_subed').val('正在奋力帮您投票.');
            function vote_ani(){
                if(!_vote_b){
                    var _$val = _$sub.val();
                    if(_$val.length < 13){
                        _$sub.val(_$val+'.');
                    }else{
                        _$sub.val('正在奋力帮您投票.');
                    }
                    setTimeout(vote_ani,500);
                }
            }
            setTimeout(vote_ani,500);
//            alert(1);
            $.ajax({
                type:"POST",
                url:url,
                data:_obj,
                dataType:"json",
                success:function(data){
                    var _res = JSON.parse(data);
                    var _status = _res.status,
                        _info = _res.info;
                    if(_status === 403){
                        _$sub.removeClass('vote_subed').val('投票');
                        alert(_info);
                    }else{
                        _$sub.val('已投票');
                        alert('投票成功！');
                    }
                    _vote_b = true;
                },
                error:function(){
                    _$sub.removeClass('vote_subed').val('投票');
                    alert('投票失败');
                    _vote_b = true;
                }
            });

//            _checked = JSON.stringify(_checked);
//            console.log(typeof _obj,_obj,JSON.parse(_obj));
        }else{
            alert('每次只能投给7-10位候选人哦');
            return false;
        }
//        console.log(this);
        return false;
    });

//data:'nor'1 'yth'2
//
//    status:403 200
//    info:'dasdasd'


}(jQuery));