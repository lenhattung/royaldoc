<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$h = Url::base();
?>
<h3 style="text-align: center"><?= Yii::t('app',  'REGULATION') ?></h3>
<hr/>

<?php if (Yii::$app->language == 'vi') { ?>

    <p align="justify">
        <b>RoyalSK</b> là dự án theo dõi sức khỏe miễn phí cho cộng đồng người Việt Nam tại Ba Lan và các quốc gia khác.
        Dù
        biết rằng bạn rất dễ bỏ qua những Điều khoản dịch vụ này, nhưng chúng tôi cần phải nêu rõ trách nhiệm của chúng
        tôi
        cũng như trách nhiệm của bạn trong quá trình bạn sử dụng các dịch vụ của RoyalSK:
        <br/>
    <p align="justify">1. <b>Trách nhiệm của chúng tôi</b>: Đây là phần mô tả cách chúng tôi cung cấp và phát triển các
        dịch vụ của mình.</p>
    <p align="justify">2. <b>Trách nhiệm của bạn</b>: Phần này nêu ra một số quy tắc mà bạn phải tuân theo khi sử dụng
        các dịch vụ của chúng
        tôi.</p>
    <p align="justify">3. <b>Các dịch vụ của RoyalSK</b>: Phần này mô tả quyền sở hữu trí tuệ đối với nội dung mà bạn
        thấy trong các
        dịch vụ của chúng tôi, bất kể nội dung đó thuộc về bạn, RoyalSK hay người khác.</p>
    <p align="justify">4. <b>Trong trường hợp xảy ra vấn đề hoặc bất đồng</b>: Phần này mô tả các quyền hợp pháp khác mà
        bạn có và những điều bạn
        nên biết trong trường hợp có người vi phạm các điều khoản này.</p>
    <p align="justify">Việc hiểu rõ các điều khoản này là rất quan trọng vì bạn phải đồng ý với các điều khoản này thì
        mới được sử dụng các
        dịch vụ của chúng tôi.</p>
    <p align="justify"> Bên cạnh các điều khoản này, chúng tôi cũng ban hành <b>Chính sách quyền riêng tư</b>. Đây là
        một chính sách bạn nên đọc để
        hiểu rõ hơn cách bạn có thể cập nhật, quản lý, xuất và xóa thông tin của mình.</p>
<?php } ?>

<?php if (Yii::$app->language == 'pl') { ?>

    <p align="justify">
        <b>RoyalSK</b> to bezpłatny projekt monitorowania zdrowia społeczności wietnamskiej w Polsce i innych krajach. Wiedząc, że łatwo jest zignorować niniejsze Warunki świadczenia usług, musimy jasno określić nasze obowiązki, a także obowiązki związane z korzystaniem z usług RoyalSK:
        <br/>
    <p align="justify">1. <b>Nasza odpowiedzialność</b>: To jest opis tego, w jaki sposób świadczymy i rozwijamy nasze usługi.</p>
    <p align="justify">2. <b>Twoja odpowiedzialność</b>: Ta sekcja przedstawia niektóre zasady, których należy przestrzegać podczas korzystania z naszych usług.</p>
    <p align="justify">3. <b>Usługi RoyalSK</b>:
        W tej sekcji opisano prawa własności intelektualnej do treści, które widzisz w naszych usługach, niezależnie od tego, czy należą one do Ciebie, RoyalSK czy innych..</p>
    <p align="justify">4. <b>W przypadku problemu lub nieporozumienia</b>:
        W tej sekcji opisano inne przysługujące Ci prawa oraz to, co powinieneś wiedzieć, jeśli ktoś naruszy te warunki..</p>
    <p align="justify">Zrozumienie tych warunków jest ważne, ponieważ aby móc korzystać z naszych usług, musisz wyrazić na nie zgodę.</p>
    <p align="justify"> Oprócz niniejszych warunków wydajemy również <b> Politykę prywatności </b>. To jest
        zasady, z którymi należy się zapoznać
        lepiej zrozumieć, jak możesz aktualizować, zarządzać, eksportować i usuwać swoje informacje.</p>
<?php } ?>

<?php if (Yii::$app->language == 'en') { ?>

    <p align="justify">
        <b>RoyalSK</b>
        is a free health monitoring project for the Vietnamese community in Poland and other countries. While knowing
        that it is easy to ignore these Terms of Service, we need to clearly state our responsibilities as well as your
        responsibilities in your use of RoyalSK's services:
        <br/>
    <p align="justify">1. <b>Our responsibility</b>:
        This is a description of how we provide and develop our services..</p>
    <p align="justify">2. <b>Your Responsibility</b>:
        This section outlines some of the rules you must follow when using our services.</p>
    <p align="justify">3. <b>Services of RoyalSK</b>:
        This section describes the intellectual property rights to content that you see in our services, whether that content belongs to you, RoyalSK or others.</p>
    <p align="justify">4. <b>
            In the event of a problem or disagreement</b>:
        This section describes other legal rights you have and what you should know in the event that someone violates these terms..</p>
    <p align="justify">
        It is important to understand these terms as you must agree to them in order to use our services.</p>
    <p align="justify"> In addition to these terms, we also issue a <b> Privacy Policy </b>. This is
        a policy you should read to
        better understand how you can update, manage, export and delete your information.</p>
<?php } ?>


<A class="btn btn-block btn-primary" href="<?= $h ?>/regulation-confirmation/o-k"><?=Yii::t('app',  'Agree and create an account')?> &raquo;</A>
</p>

