<HTML>
<HEAD>
<TITLE>���ⷿ</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">

<link href="style/mycss.css" rel="stylesheet" type="text/css" />
<link href="style/texts.css" rel="stylesheet" type="text/css" />
<link href="style/btn.css" rel="stylesheet" type="text/css" />
<script lang="javascript">
	function pass(){
		var pass = false;
		if( document.myForm.uname.value =="" ){
			alert("�û�������Ϊ��");
			pass= false;
		}else if(document.myForm.upass.value == ""){
			alert("���벻��Ϊ��");
			pass = false;
		} else if(document.myForm.upass.value != document.myForm.upass1.value){
			alert("�������벻һ��");
			pass = false;
		}  else {
			pass = true;
		}
		return pass;
	}
</script>
</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>

<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5"><img src="images/top.jpg" width="780" height="213"></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/middle1.jpg" width="780" height="47"></td>
  </tr>
  <tr>
    <td width="38" background="images/middle2.jpg">&nbsp;</td>
    <td width="172">
	<table align="center">
		<tr>
		  <td><a href="index.htm">������ҳ</a></td>
		</tr>
		<tr>
		  <td><a href="login_form.htm">�û���½</a></td>
		</tr>
	</table>
	</td>
    <td width="35" background="images/layout_24.gif">&nbsp;</td>
    <td width="495">
	<form action="index.htm" method="post" name="myForm" onsubmit="return pass()">
		<table align="center">
			<tr>
				<td>�û�ע�᣺</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2"><hr/></td>
			</tr>
			<tr>
				<td>�û�����</td>
				<td><input type="text" name="uname"></td>
			<tr>
				<td>���룺</td>
				<td><input type="password" name="upass"></td>
			<tr>
			<tr>
				<td>�ظ����룺</td>
				<td><input type="password" name="upass1"></td>
			<tr>
				<td><input type="submit" value="ע��" class="btn">&nbsp;</td>
				<td><input type="reset" value="����" class="btn"></td>
			</tr>
		</table>
	</form>
	</td>
    <td width="40" background="images/middle4.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/bottom.jpg" width="780" height="82"></td>
  </tr>
</table>
<!-- β�� -->
<br />
<div align="center">
<p>��Ȩ���У�<a href="http://www.xaygc.com" target="_blank">����ΰ</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ַ������ʡ�����ҡ�����绰��15398081655</P>
</div>
</BODY>
</HTML>