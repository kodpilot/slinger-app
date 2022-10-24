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
                            <strong>Sipariş Hakkında</strong>
                        </div>
                        <div style="padding-bottom: 30px">{{$id}}. siparişinizin kargo durumu aşağıdaki gibi güncellenmiştir.</div>
                        <div style="padding-bottom: 40px; text-align:center;">
                            @if ($status == 'Bekleniyor')
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#eff2f5;background-color:#181c32;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @elseif($status == 'Hazırlanıyor')
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#fff8dd;background-color:#ffc700;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @elseif($status == 'Kargoya Verildi')
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#f1faff;background-color:#009ef7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @elseif($status == 'Tamamlandı')
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#e8fff3;background-color:#50cd89;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @elseif($status == 'İptal Edildi')
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#fff5f8;background-color:#f1416c;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @else
                                <a rel="noopener"
                                    style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#fff5f8;background-color:#f1416c;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle">{{ $status }}</a>
                            @endif
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
