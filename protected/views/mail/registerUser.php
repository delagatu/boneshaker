Salut <?php echo $user->getFullName(); ?>,

<p>Te-ai inregistrat cu success in sistemul boneshaker.ro. </p>
    <p> Nume utilizator: <b><?php echo $user->username; ?> </b> </p>

<p> Te rugam sa-ti confirmi adresa de email accesand link-ul de mai jos: </p>

    <p>
    <?php
        $baseUrl = Yii::app()->getBaseUrl(true);
        $url = Yii::app()->controller->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' .ControllerPagePartial::PAGE_SITE_CONFIRM_ACCOUNT, array('c' => $user->confirmation_code));
        echo $baseUrl . $url;
    ?>
</p>

<p> Daca nu ai intentionat sa creezi un cont in sistemul boneshaker.ro, te rugam sa accesezi urmatorul link: </p>
<p>
    <?php
    $url = Yii::app()->controller->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' .ControllerPagePartial::PAGE_SITE_WRONG_REGISTER, array('c' => $user->confirmation_code));
    echo $baseUrl . $url;
    ?>
</p>



<p> Iti multumim pentru interesul acordat. </p>
<p> Cu Stima,  </p>
<p> Echipa boneshaker.ro  </p>