<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="initial-scale=1.0">    <!-- So that mobile webkit will display zoomed in -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Three columns with images</title>

  <style type="text/css">
body {
  margin: 0;
  padding: 0;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

table {
  border-spacing: 0;
}

table td {
  border-collapse: collapse;
}

.ExternalClass {
  width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}

.ReadMsgBody {
  width: 100%;
  background-color: #ebebeb;
}

table {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}

img {
  -ms-interpolation-mode: bicubic;
}

.yshortcuts a {
  border-bottom: none !important;
}

@media screen and (max-width: 599px) {
  table[class="force-row"],
  table[class="container"] {
    width: 100% !important;
    max-width: 100% !important;
  }
}
@media screen and (max-width: 400px) {
  td[class*="container-padding"] {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }
}
.ios-footer a {
  color: #aaaaaa !important;
  text-decoration: underline;
}

@media screen and (max-width: 599px) {
  td[class="col"] {
    width: 100% !important;
    border-top: 1px solid #eee;
  }
   td[class="col1"] {
      width: 100% !important;
   }

  td[class="cols-wrapper"] {
    padding-top: 18px;
  }

  img[class="image"] {
    float: right;
    max-width: 40% !important;
    height: auto !important;
    margin-left: 12px;
  }
  img[class="image2"] {
      float: center;
      max-width: 100% !important;
      height: auto !important;
    }

  img[class="banner"] {
    height: auto !important;
  }

  div[class="subtitle"] {
    margin-top: 0 !important;
  }
    div[class="subtitle2"] {
      margin-top: 0 !important;
      float: left;
    }

}
@media screen and (max-width: 400px) {
  td[class="cols-wrapper"] {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }

  td[class="content-wrapper"] {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }

}
</style>

</head>
<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
  <tr>
    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

      <br>

      <!-- 600px container (white background) -->

      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px;box-shadow: 0 0 15px 2px #A6A5A5">

        <tr>
          <td class="content" align="left" style="padding-top:0px;padding-bottom:12px;background-color:#ffffff">

<table width="600" border="0" cellpadding="0" cellspacing="0" class="force-row" style="width: 600px;">
  <tr>
    <td class="content-wrapper" style="padding-left:24px;padding-right:24px">
      <br>
      <img src="http://www.futf.se/img/nyhetsbrev/topbanner.gif" border="0" alt="Logo" width="700" height="90" hspace="0" vspace="0" style="max-width:100%; " class="banner">
    </td>
  </tr>
    <tr>
      <td align = "center" class="content-wrapper" style="padding-left:24px;padding-right:24px">
        <br>
        <div class="subtitle" style="font-family:Tahoma, Arial, sans-serif;font-size:30px;font-weight:600;color:#000000;margin-top:18px">{{$mainHeader}}</div>
      </td>
    </tr>


  <tr>
    <td class="cols-wrapper" style="padding-left:12px;padding-right:12px">


        {{--Start Big Column--}}

          <table border="0" width="576" cellpadding="0" cellspacing="0" style="width: 576px;">
          <tr><td width="576" style="width: 576px;" valign="top">


        <table width="576" border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 576px;">

        <br>
        @foreach($bigColumns as $bigColumn)
          <tr>
            <td class="col1" valign="top"  style="padding-left:12px;padding-right:12px;padding-top:10px;padding-bottom:1px">
                @if($bigColumn->pictureUrl != "")
                <tr>
                    <td valign="top" align = "center"  style="padding-left:12px;padding-right:12px; padding-bottom:20px">
                    <img src= "{{URL::to('/')}}/{{$bigColumn->pictureUrl}}" border="0" alt="Styrelsen hälsar" width="576" height="auto" hspace="0" vspace="0" style="max-width:100%; " class="image2">
                    </td>
                </tr>
                @endif
                <tr>
                    <td valign="top"  style="padding-left:12px;padding-right:12px; padding-bottom: 12px">
                    <div class="subtitle" style="font-family:Tahoma, Arial, sans-serif;font-size:16px;font-weight:600;color:#FFB300;margin-top:0px">{{$bigColumn->header}}</div>
                    <div class="col-copy" style="font-family:Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;text-align:left;color:#333333;margin-top:12px">{{$bigColumn->content}}</div>
                    </td>
                </tr>
                  <br>

            </td>
          </tr>
          @endforeach
        </table>

        {{--End big Column--}}

        {{--Start left Column--}}
        <!--[if mso]></td><td width="288" style="width: 288px;" valign="top"><![endif]-->

        <table width="288" border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 288px;">
        @foreach($leftColumns as $leftColumn)
          <tr>
            <td class="col" valign="top"  style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:12px;border-top: 2px solid #eee">
                @if($leftColumn->pictureUrl != "")
                <tr>
                    <td valign="top" align = "center"  style="padding-left:12px;padding-right:12px; padding-bottom:20px">
                    <img src= "{{URL::to('/')}}/{{$leftColumn->pictureUrl}}" border="0" alt="Styrelsen hälsar" width="576" height="auto" hspace="0" vspace="0" style="max-width:100%; " class="image2">
                    </td>
                </tr>
                @endif
                <tr>
                    <td valign="top"  style="padding-left:12px;padding-right:12px; padding-bottom: 12px">
                    <div class="subtitle" style="font-family:Tahoma, Arial, sans-serif;font-size:16px;font-weight:600;color:#FFB300;margin-top:0px">{{$leftColumn->header}}</div>
                    <div class="col-copy" style="font-family:Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;text-align:left;color:#333333;margin-top:12px">{{$leftColumn->content}}</div>
                    </td>
                </tr>
                  <br>

            </td>
          </tr>
        @endforeach
        </table>
        {{--End left Column--}}

        {{--Start right Column--}}
          <!--[if mso]></td><td width="288" style="width: 288px;" valign="top"><![endif]-->


        <table width="288" border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 288px;">

        @foreach($rightColumns as $rightColumn)
          <tr>
            <td class="col" valign="top"  style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:12px;border-top: 2px solid #eee">
                @if($rightColumn->pictureUrl != "")
                <tr>
                    <td valign="top" align = "center"  style="padding-left:12px;padding-right:12px; padding-bottom:20px">
                    <img src= "{{URL::to('/')}}/{{$rightColumn->pictureUrl}}" border="0" alt="Styrelsen hälsar" width="576" height="auto" hspace="0" vspace="0" style="max-width:100%; " class="image2">
                    </td>
                </tr>
                @endif
                <tr>
                    <td valign="top"  style="padding-left:12px;padding-right:12px; padding-bottom: 12px">
                    <div class="subtitle" style="font-family:Tahoma, Arial, sans-serif;font-size:16px;font-weight:600;color:#FFB300;margin-top:0px">{{$rightColumn->header}}</div>
                    <div class="col-copy" style="font-family:Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;text-align:left;color:#333333;margin-top:12px">{{$rightColumn->content}}</div>
                    </td>
                </tr>
                  <br>

            </td>
          </tr>
        @endforeach
        </table>
        {{--End right Column--}}
 {{--Start bottom Column--}}
        <!--[if mso]>
          <table border="0" width="576" cellpadding="0" cellspacing="0" style="width: 576px;">
          <tr><td width="576" style="width: 576px;" valign="top"><![endif]-->


        <table width="576" border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 576px;">
          <tr>
            <td class="col" valign="top"  style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:12px; border-top: 2px solid #eee">
                <tr>
                    <td valign="top"  style="padding-left:12px;padding-right:12px; padding-bottom: 12px">
                    <div class="subtitle" style="font-family:Tahoma, Arial, sans-serif;font-size:16px;font-weight:600;color:#FFB300;margin-top:0px">Kontakt</div>
                    <div class="col-copy" style="font-family:Tahoma, Arial, sans-serif;font-size:13px;line-height:20px;text-align:left;color:#333333;margin-top:12px">Har du frågor eller idéer så tveka inte att skicka ett <a href = "http://www.futf.se/kontakt">mail</a> till någon i styrelsen.<br> Är du intresserad av att få information från de olika utskotten så registrera din mailadress <a href = "http://www.futf.se/nyhetsbrev">här</a>. <br>När händer saker? Prenumerera på <a href = "http://www.futf.se/student/kalender">futf-kalendern!</a></div>
                    </td>
                </tr>
                  <br>

            </td>
          </tr>
        </table>

        {{--End Bottom Column--}}

    </td>
  </tr>
</table>

          </td>
        </tr>
        <tr>
          <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
            <br><br>
            Du får detta mailsom inskriven student på Civilingenjörsprogrammet i Teknisk Fysik. Om du vill sluta få mail ifrån Föreningen Uppsala Tekniska Fysiker kan du höra av dig till <a href="mailto:it@futf.se" style="color:#aaaaaa">it@futf.se</a>
            <br><br>

            <strong>Föreningen Uppsala Tekniska Fysiker</strong><br>
            <span class="ios-footer">
              Uthgård<br>
              75237 Uppsala<br>
            </span>
            <a href="http://www.futf.se" style="color:#aaaaaa">www.futf.se</a><br>

            <br><br>

          </td>
        </tr>
      </table>

<!--/600px container -->


    </td>
  </tr>
</table>
<!--/100% background wrapper-->

</body>
</html>
