<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="Home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="Home/css/NewGlobal.css" rel="stylesheet" />
        <script type="text/javascript" src="Home/js/zepto.js"></script>

    </head>

    <body>
        <div class="header">
            @include('home.home_head')
            <div class="title" id="titleString">注册</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <form name="aspnetForm" method="post" action="reg_pro"  id="aspnetForm" class="form-horizontal" enctype="multipart/form-data">
                <div class="control-group">
                    <input name="u_name" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="真实姓名" onblur="checkna()" required/><span class="tips" id="divname"></span>
                </div>
                <div class="control-group">
                    <input name="u_pwd" type="password" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="密码" onblur="checkpsd1()" required/><span class="tips" id="divpassword1"></span>
                </div>
                <div class="control-group">
                    <input name="u_email" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="邮件" onblur="checkmail()" required/><span class="tips" id="divmail"></span>
                </div>
                <div class="control-group">
                    <input name="u_phone" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入手机号" onblur="checkna1()" required/><span class="tips" id="divphone"></span>
                </div>
                <div class="control-group">
                    <input name="u_card" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入身份证号码" onblur="checkca()" required/><span class="tips" id="divcard"></span>
                </div>
                <div class="control-group">
                    <input name="u_nickname" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="昵称" onblur="checkni()" required/><span class="tips" id="divni"></span>
                </div>
                <div class="control-group">
                    <input name="u_address" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="地址" onblur="checkaddre()" required/><span class="tips" id="divaddre"></span>
                </div>
                <div class="control-group">
                    <input name="u_integral" type="hidden" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="积分" />
                </div>
                <div class="control-group">
                    <input name="u_img" type="file" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="用户头像" />
                </div>
                
                <div class="control-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button onclick="__doPostBack('ctl00$ContentPlaceHolder1$btnOK','')" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">立即注册</button>
                </div>
                <div class="control-group">已有账号？
                    <a href="login" id="ctl00_ContentPlaceHolder1_RegBtn">立即登录</a></div>
                <div class="control-group">或者使用合作账号一键登录：
                    <br />
                    <a class="servIco ico_qq" href="qlogin.aspx"></a>
                    <a class="servIco ico_sina" href="default.htm"></a>
                </div>
            </form>
        </div>
        @include('home.home_footer')
    </body>
<script  type="text/javascript">
    // 验证用户名
    function checkna(){
        na=aspnetForm.u_name.value;
        if( na.length <1 || na.length >12)  
        {   
            divname.innerHTML='<font class="tips_false">长度是1~12个字符</font>';
             
        }else{  
            divname.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    }
    //验证密码 
    function checkpsd1(){    
        psd1=aspnetForm.u_pwd.value;  
        var flagZM=false ;
        var flagSZ=false ; 
        var flagQT=false ;
        if(psd1.length<6 || psd1.length>12)
        {   
            divpassword1.innerHTML='<font class="tips_false">长度错误</font>';
        }else
        {   
          for(i=0;i < psd1.length;i++)   
            {    
                if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z')) 
                {   
                    flagZM=true;
                }
                else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')    
                { 
                    flagSZ=true;
                }else    
                { 
                    flagQT=true;
                }   
            }   
            if(!flagZM||!flagSZ||flagQT){
            divpassword1.innerHTML='<font class="tips_false">密码必须是字母数字的组合</font>'; 
             
            }else{
                
            divpassword1.innerHTML='<font class="tips_true">输入正确</font>';
             
            }  
         
        }   
    }
    //验证邮箱
    function checkmail(){
        apos=aspnetForm.u_email.value.indexOf("@");
        dotpos=aspnetForm.u_email.value.lastIndexOf(".");
        if (apos<1||dotpos-apos<2) 
          {
            divmail.innerHTML='<font class="tips_false">输入错误 例：1000000000@qq.com</font>' ;
          }
        else {
            divmail.innerHTML='<font class="tips_true">输入正确</font>' ;
        }
    }
    // 验证手机号
    function checkna1(){
        na=aspnetForm.u_phone.value;
        if( na.length!=11)  
        {   
            divphone.innerHTML='<font class="tips_false">手机号为11个数字</font>';
             
        }else{  
            divphone.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    }
    // 验证身份证号
    function checkca(){
        na=aspnetForm.u_card.value;
        if( na.length!=18)  
        {   
            divcard.innerHTML='<font class="tips_false">身份证为18为数字</font>';
             
        }else{  
            divcard.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    }
    // 验证昵称
    function checkni(){
        na=aspnetForm.u_nickname.value;
        if( na.length <1 || na.length >=5)  
        {   
            divni.innerHTML='<font class="tips_false">长度是1~5个字符</font>';
             
        }else{  
            divni.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    }
    // 验证地址
    function checkaddre(){
        na=aspnetForm.u_address.value;
        if( na.length <1 || na.length >=8)  
        {   
            divaddre.innerHTML='<font class="tips_false">长度是1~8个汉字</font>';
             
        }else{  
            divaddre.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    }
</script>
</html>
