<?php

class no_adblock_class
{
    private $act;
    private $addon_info;

    function __construct($act,$addon_info)
    {
        $this->act = $act;
        $this->addon_info = $addon_info;
    }



    public function proc()
    {

        // 우선적으로 CSRF체크
        if(checkCSRF() == false)
        {
            Context::close();
            exit('CSRF');
        }


        //act에 따라서 함수 CAll 또는 종료.
        if($this->act === 'procNo_adblock_addon_getTester')
        {
            $this->getTester();
        }
        elseif($this->act === 'procNo_adblock_addon_not_blocked')
        {
            if($_SESSION['no_adblock_addon']['token'] === Context::get('token'))
            {
                unset($_SESSION['no_adblock_addon']['token']);
                $_SESSION['no_adblock_addon']['status'] = true;
                Context::close();
                exit('OK');
            }
            else
            {
                Context::close();
                exit('incorrect');
            }

        }

    }


    private function getTester()
    {

        // 세션을 끝내기 전에 token을 가져옵니다.
        $token = $this->getToken();
        Context::close();

        // google analytics를 통한 로깅 여부
        $log_script = '';
        if($this->addon_info->log === 'Y'){
            $log_script = "if(typeof ga !=='undefined') ga('send', 'event', 'adblock', 'blocked');";
        }


        // 광고 차단시 할 행동.
        $block_detect_script = '';
        if($this->addon_info->block_detect_action === 'none')
        {
            $block_detect_script = '"none"';
        }
        elseif($this->addon_info->block_detect_action === 'modal')
        {

            $message= $this->addon_info->block_detect_action_var;

            $block_detect_script = <<<STRING
            var d = document.createElement('div');
            var a = String.fromCharCode(parseInt((Math.random()*1000+97)%26 + 97))+Math.random().toString().substring(2)
            var c = '<style> .'+a+' { position:fixed !important; } </style> ';

            jQuery('body').append(c).append(d)
            jQuery(d).html('$message')
            .dialog({
            'modal': true,
            'title' : '광고차단 이용 안내',
                buttons: {
                    '재접속' : function() {
                     document.location.reload();
                    }
                  },
            'dialogClass': c
            });

STRING;
        }
        elseif($this->addon_info->block_detect_action === 'custom')
        {
            $block_detect_script = $this->addon_info->block_detect_action_var;
        }


        /**
         * https://github.com/sitexw/FuckAdBlock
         * window 객체에 instance를 두지 않도록 수정함.
         * v3.3.1 https://github.com/sitexw/FuckAdBlock/commit/1a29bed9f29da3811f6f5518b1bd6d9d827160a9 commit
         */
        $fuck_ad_blcok = <<<STRING
(function(){

var i = {};
(function(d,e){var b=function(a){this._options={checkOnLoad:!1,resetOnEnd:!1,loopCheckTime:50,loopMaxNumber:5,baitClass:"pub_300x250 pub_300x250m pub_728x90 text-ad textAd text_ad text_ads text-ads text-ad-links",baitStyle:"width: 1px !important; height: 1px !important; position: absolute !important; left: -10000px !important; top: -1000px !important;"};this._var={version:"3.1.1",bait:null,checking:!1,loop:null,loopNumber:0,event:{detected:[],notDetected:[]}};void 0!==a&&this.setOption(a);var c=this;
a=function(){setTimeout(function(){!0===c._options.checkOnLoad&&(null===c._var.bait&&c._creatBait(),setTimeout(function(){c.check()},1))},1)};void 0!==d.addEventListener?d.addEventListener("load",a,!1):d.attachEvent("onload",a)};b.prototype._options=null;b.prototype._var=null;b.prototype._bait=null;b.prototype.setOption=function(a,c){if(void 0!==c){var b=a;a={};a[b]=c}for(var d in a)this._options[d]=a[d];return this};b.prototype._creatBait=function(){var a=document.createElement("div");a.setAttribute("class",
this._options.baitClass);a.setAttribute("style",this._options.baitStyle);this._var.bait=d.document.body.appendChild(a);this._var.bait.offsetParent;this._var.bait.offsetHeight;this._var.bait.offsetLeft;this._var.bait.offsetTop;this._var.bait.offsetWidth;this._var.bait.clientHeight;this._var.bait.clientWidth};b.prototype._destroyBait=function(){d.document.body.removeChild(this._var.bait);this._var.bait=null};b.prototype.check=function(a){void 0===a&&(a=!0);if(!0===this._var.checking)return!1;this._var.checking=
!0;null===this._var.bait&&this._creatBait();var c=this;this._var.loopNumber=0;!0===a&&(this._var.loop=setInterval(function(){c._checkBait(a)},this._options.loopCheckTime));this._checkBait(a);return!0};b.prototype._checkBait=function(a){var c=!1;null===this._var.bait&&this._creatBait();if(null!==d.document.body.getAttribute("abp")||null===this._var.bait.offsetParent||0==this._var.bait.offsetHeight||0==this._var.bait.offsetLeft||0==this._var.bait.offsetTop||0==this._var.bait.offsetWidth||0==this._var.bait.clientHeight||
0==this._var.bait.clientWidth)c=!0;if(void 0!==d.getComputedStyle){var b=d.getComputedStyle(this._var.bait,null);if("none"==b.getPropertyValue("display")||"hidden"==b.getPropertyValue("visibility"))c=!0}!0===a&&(this._var.loopNumber++,this._var.loopNumber>=this._options.loopMaxNumber&&(clearInterval(this._var.loop),this._var.loop=null,this._var.loopNumber=0));if(!0===c)!0===a&&(this._var.checking=!1),this._destroyBait(),this.emitEvent(!0);else if(null===this._var.loop||!1===a)!0===a&&(this._var.checking=
!1),this._destroyBait(),this.emitEvent(!1)};b.prototype.emitEvent=function(a){a=this._var.event[!0===a?"detected":"notDetected"];for(var b in a)if(a.hasOwnProperty(b))a[b]();!0===this._options.resetOnEnd&&this.clearEvent();return this};b.prototype.clearEvent=function(){this._var.event.detected=[];this._var.event.notDetected=[]};b.prototype.on=function(a,b){this._var.event[!0===a?"detected":"notDetected"].push(b);return this};b.prototype.onDetected=function(a){return this.on(!0,a)};b.prototype.onNotDetected=
function(a){return this.on(!1,a)};e.FuckAdBlock=b;void 0===e.fuckAdBlock&&(e.fuckAdBlock=new b({checkOnLoad:!0,resetOnEnd:!0}))})(window,i);


i.fuckAdBlock.onDetected(function(){
    $log_script;
    $block_detect_script
});
i.fuckAdBlock.onNotDetected(function(){
    jQuery.ajax({
        'method' : 'POST',
        'url' : request_uri,
        'data' : {
            'act' : 'procNo_adblock_addon_not_blocked',
            'token' : '$token'
        }
    });
});
i.fuckAdBlock.check();

})();

STRING;

        // 스크립트 출력
        echo '<script>'.$fuck_ad_blcok.'</script>';
        exit();

    }




    private function getToken()
    {

        if(isset($_SESSION['no_adblock_addon']['token']) === false )
        {
            if(class_exists('Password'))
            {
                $password = new Password();
                $token = $password->createSecureSalt(16,'hex');
            }
            else
            {
                $token = session_id().microtime();
                for($i=0; $i<10; $i++ ){  $token =  md5(rand().mt_rand().$token.$i);   }
            }
            $_SESSION['no_adblock_addon']['token'] = $token;
        }
        return $_SESSION['no_adblock_addon']['token'];
    }


}