<?php

if(!defined('__XE__'))	exit();




// 애드온 설정이 되어 있지 않으면 기본 설정을 적용합니다.
if(empty($addon_info->log) === true){
    $addon_info->log = 'N';
}
if(empty($addon_info->block_detect_action) === true)
{
    $addon_info->block_detect_action = 'none';
}

if(empty($addon_info->block_detect_action_var) === true)
{

    if($addon_info->block_detect_action === 'modal')
    {
        $addon_info->block_detect_action_var = '<p>본 사이트에서는 무료로 서비스를 제공하기 위해 광고를 이용하고 있습니다.</p> <p>사이트를 이용하시려면 광고를 차단 기능을 해재 하셔야 합니다</p> <p> 광고차단기능을 비활성하신후 아래의 재접속 버튼을 누르시기 바랍니다.</p>';
    }
    elseif($addon_info->block_detect_action === 'none')
    {
        $addon_info->block_detect_action_var = '"none"';
    }
    elseif($addon_info->block_detect_action === 'custom')
    {
        $addon_info->block_detect_action_var = '"custom"';
    }

}





// 다음과 같은 act일 경우에는 act로 넘겨줍니다.
if($called_position === 'before_module_init'
    && in_array(Context::get('act'), array('procNo_adblock_addon_getTester', 'procNo_adblock_addon_not_blocked')))
{

    require_once(_XE_PATH_.'addons/no_adblock/no_adblock.class.php');
    $no_adblock_class = new no_adblock_class(Context::get('act'), $addon_info);
    $no_adblock_class->proc();

}
elseif ($called_position === 'before_display_content')
{

    // jQuery UI 플러그인은 필요하므로 로딩합니다.
    Context::loadJavascriptPlugin('ui');


    // 관리자는 항상 종료합니다.
    if(Context::get('is_logged') === true && Context::get('logged_info')->is_admin === 'Y')
    {
        return;
    }

    // 이미 체크 된 경우 return 하지만, 10% 확률로 다시 체크합니다.(애드블럭 일시 중지후 다시 켜는것 방지)
    if($_SESSION['no_adblock_addon']['status'] === true)
    {
        $_SESSION['no_adblock_addon']['status'] = (mt_rand(0, 4) !== 0) ? true : false;
        return;
    }
    $request_uri_x = Context::getRequestUri();

    // adblock script를 가져옵니다.
    $get_script = <<<EOT
<script>
jQuery.ajax({
    'method' : 'POST',
    'url' : '$request_uri_x',
    'data' : {
        'act' : 'procNo_adblock_addon_getTester'
    },
    'success' : function(data){
        jQuery('body').append(data);
    }
})
</script>
EOT;

    Context::addHtmlHeader($get_script);


}