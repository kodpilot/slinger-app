<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    html,
    body {
        padding: 0;
        margin: 0;
    }

</style>
<div
    style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding: 40px">
                    <a href="{{ url('/') }}" rel="noopener" target="_blank">
                        <img style="width: 200px" alt="Logo"
                            src="{{ url('/assets/images/logos/' . getinfos()->logo) }}" />
                    </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="center">
                    <div
                        style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                        <!--begin:Email content-->
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Yorum Hakkında</strong>
                        </div>
                        
                            {{$product}}. ID'li ürüne yorum gelmiştir. Yorumu yapan kişinin ismi {{$user}}.
                        
                        <div style="padding-bottom: 30px"></div>
                        <div style="padding-bottom: 40px; text-align:center;">
                            <a rel="noopener"
                                style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#e8fff3;background-color:#50cd89;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $description }}</a>
                        </div>


                        </div>
                        <!--end:Email content-->
                        <div style="padding-bottom: 10px">Saygılarımızla,
                            <br>{{ url('/') }}
            <tr>
                <td align="center" valign="center"
                    style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                    <p>{{ getInfos()->address1 }} {{ getInfos()->address2 }}</p>
                    <p>Copyright ©
                        <a href="https://www.kodpilot.com" rel="noopener" target="_blank">Kodpilot</a>.
                    </p>
                </td>
            </tr></br>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
