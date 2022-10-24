@extends('themes.'.getInfos()->theme.'.layouts.master2')
@section('content')
    <!-- About -->
    <br>
    <div class="section-about ">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <blockquote class="style1 margin-bottom-10">
                        <p>ÇEREZ POLİTİKASI</p>
                        <p style="text-align&#58;justify;">Sizleri web sitemizde kullanılan çerez türleri, çerezlerin kullanım amaçları ve bu çerezlerin ayarları, yönetilmesi ve silinmesi hakkında bilgilendirmek isteriz.</p><p style="text-align&#58;justify;">Web sitemizi şahsi herhangi bir bilgi vermeden ziyaret edebilir, ürünlerimiz ve servislerimiz hakkında bilgi alarak ihtiyaçlarınızı karşılayabilirsiniz. Ziyaretlerde site kullanımına ilişkin bilgi toplamak için bazı çerezler kullanılmaktadır. Buradaki amacımız; web sitemizi ziyaret eden kullanıcıya kolaylık sağlamak ve işleyişi daha iyiye taşıyabilmektir.</p><p style="text-align&#58;justify;">
                            <strong>Çerez Nedir?</strong></p><p style="text-align&#58;justify;">Çerez, bir siteyi ziyaret ettiğinizde tarayıcınız aracılığıyla bilgisayarınıza veya mobil cihazınıza kaydedilen küçük boyutlu bir metin dosyasıdır. Çerezler bir sitenin daha verimli çalışmasının yanı sıra  kişisel ihtiyaçlarınıza daha uygun ve hızlı bir ziyaret deneyimi yaşatmak için kişiselleştirilmiş sayfaların sunulabilmesine olanak vermektedir. Çerezler sadece internet ortamındaki ziyaret geçmişinize dair bilgiler içermekte olup, bilgisayarınızda veya mobil cihazınızda depolanmış dosyalara dair herhangi bir bilgi toplamamaktadır.</p><p style="text-align&#58;justify;">
                            <strong>Çerez Türleri ve Kullanım Amaçları</strong></p><p style="text-align&#58;justify;">Geçerlilik sürelerine göre Kalıcı Çerez ve Geçici Çerez olarak iki çerez tipi bulunmaktadır. Geçici çerezler internet sitesini ziyaret ettiğiniz esnada oluşur ve sadece tarayıcınızı kapatıncaya kadar geçerlidir. Kalıcı çerezler ise internet sitesini ziyaret ettiğinizde oluşur ve siz silinceye veya süreleri doluncaya kadar kalır. Ayarlarınız ile uyumlu kişiselleştirilmiş bir deneyim sunma gibi işlemler için kalıcı çerezler kullanılır.</p><p style="text-align&#58;justify;">Çerez türleri ve kullanım amaçları aşağıda açıklanmaktadır.</p> 
                         <br> 
                         <table class="table2 tac"><tbody><tr><td>
                                     <strong>Zorunlu Çerezler</strong></td><td>Web sitemizin doğru biçimde çalışması için zorunludur. Örneğin, kimlik doğrulama, mevcut oturumunuz ile ilgili bilgilerin kaybolmaması gibi amaçlarla zorunlu çerezler kullanılmaktadır. Bu çerezler güvenlik ve doğrulama gibi amaçlar için kullanılmakta olup, herhangi bir pazarlama amacı doğrultusunda kullanılmaz.</td></tr><tr><td> 
                                     <strong>İşlevsellik İçin Gerekli Olan Çerezler</strong></td><td>Web sitemizi ziyaret eden kullanıcıların tercihlerini hatırlamasına olanak sağlayan çerezlerdir. Örneğin ziyaretçinin dil tercihi veya metin font boyu seçiminin hatırlanmasını sağlar. Bu tür çerezlerin kullanımına izin verilmemesi size özel bir özelliğin kullanılmamasına neden olabilir ve tercihlerinizi hatırlamasını engeller.</td></tr><tr><td> 
                                     <strong>Performans ve Analiz İçin Gerekli Olan Çerezler</strong></td><td>Web sitemizin geliştirilmesine yardımcı olan çerezlerdir. Bu tür çerezler, ziyaretçilerin site kullanımları hakkında bilgiler toplar, sitenin gerektiği gibi çalışıp çalışmadığının denetiminde ve alınan hataların tespitinde kullanılır. </td></tr><tr><td> 
                                     <strong>Hedefleme ve Reklam Çerezleri</strong></td><td>Bu çerezler web sitemizde veya sitemiz haricindeki mecralarda ürün ve hizmet tanıtımını yapmak, iş birliği yaptığımız ortaklarımızla birlikte  size ilgili ve kişiselleştirilmiş reklamlar göstermek, reklam kampanyalarının etkinliğini ölçmek için kullanılır.</td></tr></tbody></table>
                         <br>
                         <p style="text-align&#58;justify;">
                            <strong>Çerezler Nasıl Toplanır?</strong></p><p style="text-align&#58;justify;">Veriler tarayıcılara eriştiğiniz cihazlarınız aracılığıyla toplanır. Toplanan bu bilgiler cihazlara özeldir. İstenildiği zaman kullanıcı tarafından silinebilmekte ve bilgilere erişim kapatılabilmektedir.</p><p style="text-align&#58;justify;">
                            <strong>Gizlilik Politikamız</strong></p><p style="text-align&#58;justify;">Gizliliğiniz bizim için önemlidir, gizlilik ve güvenlik haklarınız temel prensibimizdir.<br></p><p style="text-align&#58;justify;">Bu kapsamda, kişisel verilerin korunmasına dair aydınlatma metnimize 
                            <a href="{{route('privacyPolicy')}}" target="_blank">buradan</a> ulaşabilirsiniz.</p><p style="text-align&#58;justify;">
                            <strong>Çerezleri nasıl kontrol edebilirsiniz?</strong></p><p style="text-align&#58;justify;">Bilgisayarınızda halihazırda bulunan çerezleri silebilir ve internet gezgininize çerez kaydedilmesini/yerleştirilmesini engelleyebilirsiniz.</p><p style="text-align&#58;justify;">İnternet tarayıcıları çerezleri otomatik olarak kabul edecek şekilde ön tanımlıdır. Çerezleri yönetmek tarayıcıdan tarayıcıya farklılık gösterdiğinden ayrıntılı bilgi almak için tarayıcının veya uygulamanın yardım menüsüne bakabilirsiniz.</p><p style="text-align&#58;justify;">Örnek olarak,<br><strong>&quot;Google Chrome -&gt; Ayarlar -&gt; Gelişmiş -&gt; Gizlilik ve Güvenlik -&gt; Site Ayarları -&gt; Çerezler ve Site Verileri -&gt; Sitelerin çerez verilerini kaydetmelerine ve okumalarına izin ver&quot;</strong> seçeneği ile yönetebilirsiniz. </p><p style="text-align&#58;justify;">
                            <strong>&quot;Internet Explorer -&gt; Ayarlar -&gt; İnternet Seçenekleri -&gt; Gizlilik -&gt; Gelişmiş ayarlar&quot;</strong> menüsünden yönetebilirsiniz. </p><p style="text-align&#58;justify;">Çoğu Internet gezgini aşağıdakileri yapmanıza olanak tanır&#58; </p><ul class="list" style="text-align&#58;justify;"><li>Kaydedilmiş çerezleri görüntüleme ve dilediklerinizi silme</li><li>Üçüncü taraf çerezleri engelleme</li><li>Belli sitelerden çerezleri engelleme</li><li>Tüm çerezleri engelleme</li><li>Internet gezginini kapattığınızda tüm çerezleri silme</li></ul><p style="text-align&#58;justify;">Çerezleri silmeyi tercih ederseniz ilgili web sitesindeki tercihleriniz silinecektir. Ayrıca, çerezleri tamamen engellemeyi tercih ederseniz web sitemiz ve dijital platform düzgün çalışmayabilir.</p><p style="text-align&#58;justify;">
                            <strong>Mobil Cihazınızda Çerezleri Kontrol etmek için ;</strong></p><p style="text-align&#58;justify;">Apple Cihazlarda;</p><ul class="list" style="text-align&#58;justify;"><li>
                               <strong>&quot;Ayarlar -&gt; Safari -&gt; Geçmişi ve Web Sitesi Verilerini Sil&quot;</strong> adımları ile tarama geçmişinizi ve çerezleri temizleyebilirsiniz..</li><li>
                               <strong>Çerezleri silip geçmişinizi tutmak için &quot;Ayarlar -&gt; Safari -&gt; İleri Düzey -&gt; Web Sitesi Verileri -&gt; Tüm Web Sitesi Verilerini Sil&quot;</strong> adımlarını izleyebilirsiniz.</li><li>Siteleri ziyaret ederken geçmiş verilerinin tutulmasını istemiyorsanız; 
                               <ul><li>
                                     <strong>&quot;Safari -&gt; 
                                         -&gt; Özel -&gt; Bitti&quot;&#160;</strong>adımlarını izleyerek özel dolaşımı aktif hale getirebilirsiniz.</li></ul></li><li>
                               <strong>&quot;Ayarlar -&gt; Safari -&gt; Tüm Çerezleri Engelle&quot;</strong> adımları ile çerezleri engelleyebilirsiniz. Ancak; çerezleri engellediğinizde bazı web siteleri ve özellikler düzgün çalışmayabilir.</li></ul><p style="text-align&#58;justify;">Android Cihazlarda;</p><ul class="list" style="text-align&#58;justify;"><li>
                               <strong>&quot;Chrome uygulaması -&gt; Ayarlar -&gt; Gizlilik -&gt; Tarama verilerini temizle -&gt; Çerezler, medya lisansları ve site verileri -&gt; Verileri Temizle&quot;</strong> seçeneği ile çerezkerinizi temizleyebilirsiniz.</li><li>
                               <strong>&quot;Chrome Uygulaması -&gt; Ayarlar -&gt; Site Ayarları -&gt; Çerezler&quot;</strong> seçeneği ile çerezlere izin verebilir veya engelleyebilirsiniz.<br></li></ul>
                         <br>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
    <!-- About -->
@endsection
