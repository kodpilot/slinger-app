{{-- <div>
    İsim: {{$name}}
</div>
<div>
    Email: {{$mail}}
</div>
<div>
    Telefon: {{$tel}}
</div>
<div>
    Mesaj: {!!$messages!!}
</div> --}}


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="{{route('index')}}" rel="noopener" target="_blank">
						<img alt="Logo" src="{{ url('assets/images/logos/' . getInfos()->logo) }}" />
					</a>
				</td>
			</tr>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 30px">İsim:     {{$name}}</div>
						<div style="padding-bottom: 30px">Email:    {{$mail}}</div>
                        <div style="padding-bottom: 30px">Telefon:  {{$tel}}</div>
                        <div style="padding-bottom: 30px">Mesaj:    {!!$messages!!}</div>
						
						<!--end:Email content-->
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>